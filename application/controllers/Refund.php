<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Refund extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		$this->db3 = $this->load->database('db3', TRUE);

		$this->load->model(array('M_query', 'M_admin'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}
		
		$data['title'] = "Data Karyawan Refund";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->getIndex_refund(array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/refund/index', $data);
	}

	public function index_ba()
	{
		function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}
		
		$data['title'] = "BA Karyawan Refund";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->index_ba_refund($nik_baru)->result_array();
		$this->load->view('admin/refund/index_ba', $data);
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->M_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tambah()
	{
		$lokasi = users('lokasi_struktur');
		$data['pengajuan']=$this->M_admin->get_no_pengajuan_refund();
		$data['title'] = "Form Pengajuan Refund";
		if ($lokasi == 'Pusat') {
			$jabatan = users('jabatan_struktur');
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
		}
		if ($lokasi != 'Pusat') {
			$jabatan = users('jabatan_struktur');
			$data['data_karyawan'] = $this->M_app->absensi_bawahan($jabatan, $lokasi)->result();
		}
		$this->load->view('admin/refund/tambah', $data);
	}

	public function tampil_karyawan(){
		$lokasi = users('lokasi_struktur');
		if ($lokasi == 'Pusat') {
			$jabatan = users('jabatan_struktur');
			$data = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
		}
		if ($lokasi != 'Pusat') {
			$jabatan = users('jabatan_struktur');
			$data = $this->M_app->absensi_bawahan($jabatan, $lokasi)->result();
		}
        echo json_encode($data);
	}

	public function data_pengajuan_refund(){
		$nik_baru = $this->input->get('nik_baru');
		$no_pengajuan = $this->input->get('no_pengajuan');
		$query = $this->M_query->getData_Refund(array('a.nik_pengajuan'=>$nik_baru, 'a.no_pengajuan'=>$no_pengajuan));
		$data = $query->result();
		echo json_encode($data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_pengajuan', 'nik_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['no_pengajuan']  = $this->input->post('no_pengajuan');
			$input['nik_pengajuan']  = $this->input->post('nik_pengajuan');
			$input['nik']  = $this->input->post('nik');
			$input['tanggal_absen'] = $this->input->post('tanggal_absen');
			$input['absen_awal'] = $this->input->post('absen_awal');
			$input['absen_akhir'] = $this->input->post('absen_akhir');
			$input['ket'] = $this->input->post('ket');
			$input['status_refund'] = '0';
			$input['status_ba'] = '0';
			$input['status_pengajuan'] = '0';

			$no_pengajuan  = $this->input->post('no_pengajuan');
			$nik  = $this->input->post('nik');
			$tanggal_absen = $this->input->post('tanggal_absen');

			if (!empty($_FILES['dokumen']['name'])) {
				# code...
				$path = 'karyawan_refund/';
				$name = 'dokumen';
				$pecah = explode(".", $_FILES['dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($no_pengajuan.'_'.$nik.'_'.$tanggal_absen)).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				$input['dokumen'] = $rename;
			}

			$save 		= $this->M_query->insert_data('tbl_karyawan_refund', $input);

			if($save) {
				$response = [
					'message'	=> 'Data berhasil disimpan',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal disimpan',
					'status'	=> 'error'
				];
			}
		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function form_ba($id)
	{
		function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}

		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
		}

		$nik_baru = users('nik_baru');
		$data['title'] = "Form Berita Acara (".$id.")";
		$data['record'] = $this->M_query->getIndex_refund(array('nik_pengajuan'=>$nik_baru, 'no_pengajuan'=>$id))->result_array();
		$data['edit'] = $this->M_query->getIndex_refund(array('nik_pengajuan'=>$nik_baru, 'no_pengajuan'=>$id), null, 'nik_pengajuan')->row_array();
		$this->load->view('admin/refund/edit_ba', $data);
	}

	public function doUpdate_ba()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik = $this->input->post('nik_baru');
			$no_pengajuan = $this->input->post('no_pengajuan');
			$input['no_ba'] = $this->input->post('no_ba');
			$input['tanggal_ba'] = date('Y-m-d');
			$input['status_ba'] = '1';

			$where = array('nik_pengajuan'=>$nik, 'no_pengajuan'=>$no_pengajuan);
			$save = $this->M_query->update_data('tbl_karyawan_refund', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil disimpan',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal disimpan',
					'status'	=> 'error'
				];
			}
		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	function getAbsen()
    {
        $nik_absen = $this->input->post('nik_absen');
        $tanggal_absen = $this->input->post('tanggal_absen');
        $data = $this->M_query->select_row_data_absen('*', 'rd_ket_absen', array('badgenumber'=>$nik_absen, 'shift_day'=>$tanggal_absen))->result();
        echo json_encode($data);
    }

}