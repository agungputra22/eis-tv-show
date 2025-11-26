<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seragam extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin'));
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
		
		$data['title'] = "Data Pengajuan Seragam";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->getSeragam_karyawan(array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/seragam/index', $data);
	}

	public function index_crl()
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
		
		$data['title'] = "Data Pengajuan Seragam";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->getSeragam_karyawan(array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/seragam/index_crl', $data);
	}

	public function index_pengembalian()
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
		
		$data['title'] = "Data Pengembalian Seragam";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->getSeragam_kembali_karyawan(array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/seragam/index_pengembalian', $data);
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->m_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_seragam(){
		$id_seragam=$this->input->post('id_seragam');
		$query=$this->m_query->tampil_seragam($id_seragam);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tambah()
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Form Pengajuan Seragam";
		$data['nik_baru'] = $this->m_admin->induk()->result();
		$data['jenis_seragam'] = $this->m_admin->jenis_seragam()->result();
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_seragam();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/seragam/tambah', $data);
	}

	public function tambah_crl()
	{
		$jabatan = users('jabatan_struktur');
		$data['title'] = "Form Pengajuan Seragam";
		$data['nik_baru'] = $this->m_admin->induk()->result();
		$data['jenis_seragam'] = $this->m_admin->jenis_seragam()->result();
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_seragam();
		$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		$this->load->view('admin/seragam/tambah_crl', $data);
	}

	public function tambah_pengembalian()
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Form Pengembalian Seragam";
		$data['nik_baru'] = $this->m_admin->induk()->result();
		$data['jenis_seragam'] = $this->m_admin->jenis_seragam()->result();
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_seragam_kembali();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_struktur'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/seragam/tambah_pengembalian', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['submit_date'] = $this->input->post('submit_date');
			$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
			$input['no_pengajuan'] = $this->input->post('no_pengajuan');
			$input['ket_pengajuan'] = $this->input->post('ket_pengajuan');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['nama_karyawan_seragam'] = $this->input->post('nama_karyawan_seragam');
			$input['jabatan_karyawan_seragam'] = $this->input->post('jabatan_karyawan_seragam');
			$input['dept_karyawan_seragam'] = $this->input->post('dept_karyawan_seragam');
			$input['lokasi_karyawan_seragam'] = $this->input->post('lokasi_karyawan_seragam');
			$input['kode_seragam'] = $this->input->post('kode_seragam');
			$input['nama_seragam'] = $this->input->post('nama_seragam');
			$input['harga_satuan'] = $this->input->post('harga_satuan');
			$input['status_realisasi'] = "0";
			$input['status_distribusi'] = "0";
			$input['qty_seragam'] = $this->input->post('qty_seragam');

			$save 		= $this->m_query->insert_data('tbl_karyawan_seragam', $input);
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

	public function doInput_pengembalian()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$ket_pengajuan = $this->input->post('ket_pengajuan');
			$input['no_pengajuan'] = $this->input->post('no_pengajuan');
			$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
			$input['ket_pengajuan'] = $this->input->post('ket_pengajuan');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['id_seragam'] = $this->input->post('nama_seragam');
			$input['qty_seragam'] = $this->input->post('qty_seragam');
			if ($ket_pengajuan == 'Seragam Hilang' or $ket_pengajuan == 'Seragam Rusak') {
				$input['harga_satuan'] = $this->input->post('harga_satuan');
			} else {
				$input['harga_satuan'] = '0';
			}
			$input['tanggal_pengembalian'] = $this->input->post('tanggal_pengembalian');
			$input['ket_tambahan'] = $this->input->post('ket_tambahan');

			$save 		= $this->m_query->insert_data('tbl_karyawan_seragam_kembali', $input);
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

}