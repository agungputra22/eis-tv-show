<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembinaan_karyawan extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		$this->db4 = $this->load->database('db4', TRUE);

		$this->load->model(array('m_query', 'm_admin', 'm_app', 'm_all'));
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

		$data['title'] = "Data Pembinaan Karyawan";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/pembinaan_karyawan/index', $data);
	}

	public function index_karyawan_sd()
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

		$dept = users('dept_struktur');
		$data['title'] = "Departement $dept";
		$data['listdata'] = $this->m_query->getMaster_karyawan_sd(array('dept_struktur'=>$dept))->result_array();
		$this->load->view('admin/pembinaan_karyawan/index_karyawan_sd', $data);
	}

	public function detail($id)
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

		$data['title'] = "Data Pembinaan Karyawan";
		$data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('nik_baru'=>$id))->result_array();
		$this->load->view('admin/pembinaan_karyawan/detail_histori', $data);
	}

	public function index_tilang()
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

		$data['title'] = "Data E-Tilang";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->indexTilangCCTV($nik_baru)->result_array();
		$this->load->view('admin/pembinaan_karyawan/index_cctv_tilang', $data);
	}

}