<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_bko extends CI_Controller {

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
		$data['title'] = "Data Karyawan Project";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_bko', array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/karyawan_bko/index', $data);
	}

	public function tampil_perusahaan(){
		$data = $this->M_query->select_row_data('*', 'tbl_perusahaan', null)->result();
        echo json_encode($data);
	}

	public function tampil_depo(){
		$data = $this->M_query->select_row_data('*', 'tbl_depo', null)->result();
        echo json_encode($data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Karyawan Project";
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['perusahaan'] = $this->M_admin->perusahaan()->result();
		$this->load->view('admin/karyawan_bko/tambah', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_pengajuan', 'nik_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$perusahaan_karyawan  = $this->input->post('perusahaan_karyawan');
			$tanggal_pengajuan  = $this->input->post('tanggal_pengajuan');
			$nik_pengajuan  = $this->input->post('nik_pengajuan');
			$start_date  = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$nama_karyawan = $this->input->post('nama_karyawan');
			$no_identitas = $this->input->post('no_identitas');
			$depo_karyawan = $this->input->post('depo_karyawan');

			if (!empty($_FILES['upload_dokumen']['name'])) {
				# code...
				$path = 'karyawan_bko/';
				$name = 'upload_dokumen';
				$pecah = explode(".", $_FILES['upload_dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($nik_pengajuan)).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$upload_dokumen = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan_bko/doInput');
				}
				
			}

			for ($i=0; $i < count($nama_karyawan); $i++) { 
				# code...
				$input['tanggal_pengajuan'] = $tanggal_pengajuan;
				$input['nik_pengajuan'] = $nik_pengajuan;
				$input['start_date'] = $start_date[$i];
				$input['end_date'] = $end_date[$i];
				$input['nama_karyawan'] = $nama_karyawan[$i];
				$input['no_identitas'] = $no_identitas[$i];
				$input['depo_karyawan'] = $depo_karyawan[$i];
				$input['perusahaan_karyawan'] = $perusahaan_karyawan[$i];
				$input['upload_dokumen'] = $upload_dokumen;

				$save 		= $this->M_query->insert_data('tbl_karyawan_bko', $input);
				
			}

			$response = [
				'message'	=> 'Data berhasil disimpan',
				'status'	=> 'success'
			];
		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

}