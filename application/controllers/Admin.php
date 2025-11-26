<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->model('m_admin');
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$x['data']=$this->m_admin->get_data();
		$this->load->view('template', $x);
		// $this->load->view('template');
	}

	// public function dashboard()
	// {
	// 	$this->load->view('dashboard');
	// }

	function dashboard(){
		$x['data']=$this->m_admin->get_data();
		$this->load->view('dashboard',$x);
	}

}