<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual_book extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Pengajuan Izin";
		$this->load->view('admin/manual_book/pengajuan_izin', $data);
	}

	public function absen()
	{
		$data['title'] = "Pengecekan Absensi";
		$this->load->view('admin/manual_book/pengecekan_absen', $data);
	}

	public function approval()
	{
		$data['title'] = "Approval";
		$this->load->view('admin/manual_book/approval', $data);
	}

	public function shifting()
	{
		$data['title'] = "Shifting";
		$this->load->view('admin/manual_book/shifting', $data);
	}

	public function survey()
	{
		$data['title'] = "Survey Kepuasan Karyawan";
		$this->load->view('admin/manual_book/survey', $data);
	}

	public function assessment()
	{
		$data['title'] = "Survey Kepuasan Karyawan";
		$this->load->view('admin/manual_book/assessment', $data);
	}

	public function ketentuan()
	{
		$data['title'] = "Ketentuan HRD & IM";
		$this->load->view('admin/manual_book/ketentuan_im/index', $data);
	}

	public function get_in_get_out()
	{
		$data['title'] = "Get IN & Get OUT Backup";
		$this->load->view('admin/manual_book/ketentuan_im/get_in_get_out', $data);
	}

}