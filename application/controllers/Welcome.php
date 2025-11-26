<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin', 'm_all'));
		if($this->session->userdata('nik_baru')!='') {
			redirect('admin');
		}

	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function doLogin()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$u = $this->input->post('nik_baru');
			$p =  md5($this->input->post('password'));
			$status = "0";
			$where = array('nik_baru'=>$u, 'ks.password'=>$p, 'ks.status_karyawan'=>$status);
			$login = $this->m_all->login_masuk_new($u, $p);
			// $login = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', $where);
			// $login = $db1->select($where)->get('auth_user');
			if($login->num_rows()==1) {
				$row = $login->row_array();
				$userdata = array(
					'nik_baru'=>$u,
					'password'=>$p,
					'no_urut'=>$row['no_urut'],
					'nama_karyawan_struktur'=>$row['nama_karyawan_struktur'],
					'level_struktur'=>$row['level_jabatan'],
					'jabatan_struktur'=>$row['jabatan_hrd'],
					'jabatan_karyawan'=>$row['jabatan_karyawan'],
					'lokasi_struktur'=>$row['lokasi_hrd'],
					'id_dept'=>$row['departement_id'],
					'dept_struktur'=>$row['dept_struktur'],
					'perusahaan_struktur'=>$row['perusahaan_struktur'],
					'nama_atasan_struktur'=>$row['nama_atasan_struktur'],
					'area'=>$row['area'],
					'userid'=>$row['userid'],
					'status_update'=>$row['status_update']
					
					);
				$this->session->set_userdata($userdata);

				$response = [
					'message'	=> 'Berhasil login',
					'status'	=> 'success'
				];
				output_json($response);
			} else {
				$response = [
					'message'	=> 'Gagal login, user atau password salah',
					'status'	=> 'error'
				];
				output_json($response);
			}
		} else {
			redirect('welcome');
		}
	}
}
