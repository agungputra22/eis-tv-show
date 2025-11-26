<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keterangan extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin', 'M_all'));
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
		
		$data['title'] = "Data Permintaan SK";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_sk', array('nik_baru'=>$nik_baru), null)->result_array();
		$this->load->view('admin/surat_keterangan/index', $data);
	}

	public function approve()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Approval Surat Keterangan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_surat_keterangan_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/surat_keterangan/approve', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Surat Keterangan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_surat_keterangan_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/surat_keterangan/approve', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Surat Keterangan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_surat_keterangan_approve($jabatan, $lokasi)->result_array();
			$this->load->view('admin/surat_keterangan/approve', $data);
		}
		
	}

	public function tambah()
	{
		$data['title'] = "Form Surat Keterangan";
		$data['pengajuan']=$this->M_admin->get_no_pengajuan_surat_keterangan();
		$this->load->view('admin/surat_keterangan/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Approval Izin Full Day (".$id.")";
		$data['edit'] = $this->M_admin->izin_full_day($id)->row_array();
		$this->load->view('admin/izin/full_day/tindakan', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['no_urut'] = $this->input->post('no_urut');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['jabatan_karyawan'] = $this->input->post('jabatan_karyawan');
			$input['keperluan'] = $this->input->post('keperluan');
			$input['analisa'] = $this->input->post('analisa');
			$input['status_atasan'] = '0';
			$input['status_hrd'] = '0';
			$save 		= $this->M_query->insert_data('tbl_karyawan_sk', $input);
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

	function tindakan_atasan_1(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id'=>$id);

			$save = $this->M_all->approve_sk($id);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di close',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
					'status'	=> 'error'
				];
			}
		}
		output_json($response);
	}

}