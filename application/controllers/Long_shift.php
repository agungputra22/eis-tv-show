<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Long_shift extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
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
		
		$data['title'] = "Data Long Shift";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->select_row_data('*', 'tbl_long_shift', array('nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/long_shift/index', $data);
	}

	public function index_atasan()
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
			
			$data['title'] = "Data Team Long Shift";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_long_shift($nik_baru)->result_array();
			$this->load->view('admin/long_shift/index_atasan', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Team Long Shift";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_long_shift($nik_baru)->result_array();
			$this->load->view('admin/long_shift/index_atasan', $data);
		}
	}

	public function tambah()
	{
		$data['title'] = "Form Long Shift";
		$lokasi = users('lokasi_struktur');
		// $data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$jabatan = users('jabatan_struktur');
		if ($jabatan == '303') {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->m_query->index_karyawan_project()->result();
		} elseif ($jabatan == '319') {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result();
		} elseif ($jabatan == '256') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->m_query->index_karyawan_project_snd($jabatan_snd)->result();
		} elseif ($jabatan == '425') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result();
		} elseif ($jabatan == '316') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result();
		} elseif ($jabatan == '266') {
			$data['data_karyawan'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result();
		} else {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		}
		$this->load->view('admin/long_shift/tambah', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$badgenumber = $this->input->post('nik_tampil');
			$shift_day = $this->input->post('tanggal');
			$input2['attendance_date_longshift'] = $this->input->post('jam');
			$where2 = array('shift_day'=>$shift_day, 'badgenumber'=>$badgenumber);
			$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);

			$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
			$input['submit_date'] = $this->input->post('submit_date');
			$input['nik_baru'] = $this->input->post('nik_tampil');
			$input['jabatan'] = $this->input->post('jabatan_karyawan_shift');
			$input['tanggal'] = $this->input->post('tanggal');
			$input['jam'] = $this->input->post('jam');
			$input['keterangan'] = $this->input->post('keterangan');

			$save 		= $this->m_query->insert_data('tbl_long_shift', $input);
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