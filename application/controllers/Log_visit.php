<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_visit extends CI_Controller {

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
		
		$data['title'] = "Log Visit";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_log_visit_hr', array('nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/log_visit/index', $data);
	}

	public function index_admin()
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
		
		$data['title'] = "Log Visit Admin";
		$data['listdata'] = $this->M_admin->log_visit()->result_array();
		$this->load->view('admin/log_visit/index_admin', $data);
	}

	public function tambah()
	{
		$data['title'] = "Form Log Visit";
		$this->load->view('admin/log_visit/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Update Log Visit (".$id.")";
		$data['edit'] = $this->M_admin->log_visit(array('id'=>$id))->row_array();
		$this->load->view('admin/log_visit/edit', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_log_visit', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['submit_date'] = $this->input->post('submit_date');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['tanggal'] = $this->input->post('tanggal');
			$input['issue'] = $this->input->post('issue');
			$input['status'] = "0";

			if (!empty($_FILES['dokumen']['name'])) {
				# code...
				$path = 'log_visit/';
				$name = 'dokumen';
				$pecah = explode(".", $_FILES['dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input['nik_baru'].'_'.$input['submit_date'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['dokumen'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
					redirect('log_visit/doInput');
				}
				
			}

			$save 		= $this->M_query->insert_data('tbl_log_visit_hr', $input);
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

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['solusi'] = $this->input->post('solusi');
			$input['status'] = "1";
			$input['date_update'] = $this->input->post('date_update');

			$where = array('id'=>$id);
			$save = $this->M_query->update_data('tbl_log_visit_hr', $input, $where);
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

	public function download($id){
	    $fileinfo = $this->M_query->download_log($id);
	    $file = './/uploads/log_visit/'.$fileinfo['dokumen'];
	    force_download($file, NULL);
	}	

}