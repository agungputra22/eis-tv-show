<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');
		$this->load->model('m_surat');
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Help";
		$this->load->view('help/index', $data);
	}

}