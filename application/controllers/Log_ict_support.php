<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log_ict_support extends CI_Controller {

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
		
		$data['title'] = "Log Support ICT";
		$nik_baru = users('nik_baru');
		$tahun = date('Y');
		$data['listdata'] = $this->M_query->getLog_support_ict(array('nik'=>$nik_baru, 'YEAR(tanggal)'=>$tahun))->result_array();
		$this->load->view('admin/log_visit/support_ict/index', $data);
	}

	public function tambah()
	{
		$data['title'] = "Form Log Support";
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['aplikasi'] = $this->M_admin->data_aplikasi()->result();
		$data['kategori'] = $this->M_admin->data_kategori()->result();
		$this->load->view('admin/log_visit/support_ict/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Update Log Support (".$id.")";
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['aplikasi'] = $this->M_admin->data_aplikasi()->result();
		$data['kategori'] = $this->M_admin->data_kategori()->result();
		$data['edit'] = $this->M_query->getLog_support_ict(array('a.`id`'=>$id))->row_array();
		$this->load->view('admin/log_visit/support_ict/edit', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik'] = $this->input->post('nik_baru');
			$input['issue'] = $this->input->post('issue');
			$input['depo'] = $this->input->post('lokasi');
			$input['tanggal'] = $this->input->post('tanggal');
			$input['jam'] = $this->input->post('jam');
			$input['solving'] = $this->input->post('solving');
			$input['aplikasi'] = $this->input->post('aplikasi');
			$input['kategori'] = $this->input->post('kategori');
			$input['status'] = $this->input->post('status');

			$save 		= $this->M_query->insert_data('tbl_log_ict_support', $input);
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
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['issue'] = $this->input->post('issue');
			$input['depo'] = $this->input->post('lokasi');
			$input['tanggal'] = $this->input->post('tanggal');
			$input['jam'] = $this->input->post('jam');
			$input['solving'] = $this->input->post('solving');
			$input['aplikasi'] = $this->input->post('aplikasi');
			$input['kategori'] = $this->input->post('kategori');
			$input['status'] = $this->input->post('status');

			$where = array('id'=>$id);
			$save = $this->M_query->update_data('tbl_log_ict_support', $input, $where);
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
	    $file = './/uploads/log_ict_support/'.$fileinfo['dokumen'];
	    force_download($file, NULL);
	}	

}