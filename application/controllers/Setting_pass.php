<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_pass extends CI_Controller {

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
		$nik_baru = users('nik_baru');
		$data['title'] = "Reset Password Karyawan (".$nik_baru.")";
		$data['edit'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('nik_baru'=>$nik_baru))->row_array();
		$this->load->view('admin/reset_password/index', $data);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_struktur');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['password'] = md5($this->input->post('password'));

			$where = array('id_struktur'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_struktur', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Password Berhasil diubah',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Password Gagal diubah',
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