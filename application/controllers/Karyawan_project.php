<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_project extends CI_Controller {

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
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_project', array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/karyawan_project/index', $data);
	}

	public function index_tkbm()
	{
		$data['title'] = "Data Karyawan Perbantuan TKBM";
		$nik_baru = users('nik_baru');
		$lokasi = users('lokasi_struktur');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_project_tkbm', array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/karyawan_project/index_tkbm', $data);
	}

	public function index_pusat()
	{
		$data['title'] = "Data Karyawan Project";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_project', array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/karyawan_project/index_pusat', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Karyawan Project";
		$jabatan = users('jabatan_struktur');
		if ($jabatan == '303') {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->M_query->index_karyawan_project()->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '319') {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '256') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->M_query->index_karyawan_project_snd($jabatan_snd)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '425') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '316') {
			$jabatan_snd = users('jabatan_struktur');
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '266') {
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} elseif ($jabatan == '253') {
			$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		} else {
			$lokasi = users('lokasi_struktur');
			$data['data_karyawan'] = $this->M_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
			$data['depo'] = $this->M_admin->data_depo()->result();
			$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		}
		$this->load->view('admin/karyawan_project/tambah', $data);
	}

	public function tambah_pusat()
	{
		$data['title'] = "Tambah Karyawan Project";
		$lokasi = users('lokasi_struktur');
		$jabatan = users('jabatan_struktur');
		$data['data_karyawan'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result();
		$data['depo'] = $this->M_admin->data_depo()->result();
		$this->load->view('admin/karyawan_project/tambah_pusat', $data);
	}

	public function tambah_tkbm()
	{
		$data['title'] = "Tambah Karyawan Perbantuan TKBM";
		$lokasi = users('lokasi_struktur');
		// $data['data_karyawan'] = $this->M_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$data['data_karyawan'] = $this->M_query->all_karyawan_tkbm(array('d.`perusahaan_status`'=>'4', 'a.`status_karyawan`'=>'0', 'lokasi_hrd'=>$lokasi), null, 'TKBM')->result();
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['jabatan'] = $this->M_admin->data_detail_jabatan()->result();
		$this->load->view('admin/karyawan_project/tambah_tkbm', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_pengajuan', 'nik_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$submit_date  = $this->input->post('submit_date');
			$nik_pengajuan  = $this->input->post('nik_pengajuan');
			$start_date  = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$nik_karyawan = $this->input->post('nik_karyawan');
			$depo_karyawan = $this->input->post('depo_karyawan');
			$lokasi_awal = $this->input->post('lokasi_awal');
			$kode_jabatan_awal = $this->input->post('kode_jabatan_awal');
			$jabatan_akhir = $this->input->post('jabatan_akhir');

			for ($i=0; $i < count($nik_karyawan); $i++) { 
				# code...
				$input['submit_date'] = $submit_date;
				$input['nik_pengajuan'] = $nik_pengajuan;
				$input['start_date'] = $start_date[$i];
				$input['end_date'] = $end_date[$i];
				$input['nik_karyawan'] = $nik_karyawan[$i];
				$input['depo_karyawan'] = $depo_karyawan[$i];
				$input['depo_awal'] = $lokasi_awal[$i];
				$input['jabatan_awal'] = $kode_jabatan_awal[$i];
				$input['jabatan_akhir'] = $jabatan_akhir[$i];

				$save 		= $this->M_query->insert_data('tbl_karyawan_project', $input);

				$nik_baru = $nik_karyawan[$i];
				$input2['lokasi_hrd'] = $depo_karyawan[$i];
				$input2['jabatan_hrd'] = $jabatan_akhir[$i];
				$input2['status_hrd'] = '3';

				$where = array('nik_baru'=>$nik_baru);
				$save = $this->M_query->update_data('tbl_karyawan_struktur', $input2, $where);
				
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

	function getFormDataKaryawan()
    {
        $nik_absen = $this->input->post('nik_absen');
        $data = $this->M_query->getFormDataKaryawan(array('ks.nik_baru'=>$nik_absen))->result();
        echo json_encode($data);
    }

	function getFormDataKaryawan_tkbm()
    {
        $nik_absen = $this->input->post('nik_absen');
        $data = $this->M_query->getFormDataKaryawan_tkbm(array('ks.nik_baru'=>$nik_absen))->result();
        echo json_encode($data);
    }

	public function doInput_tkbm()
	{
		$this->form_validation->set_rules('nik_pengajuan', 'nik_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$submit_date  = $this->input->post('submit_date');
			$nik_pengajuan  = $this->input->post('nik_pengajuan');
			$start_date  = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$nik_karyawan = $this->input->post('nik_karyawan');
			$depo_karyawan = $this->input->post('depo_karyawan');
			$lokasi_awal = $this->input->post('lokasi_awal');
			// $kode_jabatan_awal = $this->input->post('kode_jabatan_awal');
			// $jabatan_akhir = $this->input->post('jabatan_akhir');

			for ($i=0; $i < count($nik_karyawan); $i++) { 
				# code...
				$input['submit_date'] = $submit_date;
				$input['nik_pengajuan'] = $nik_pengajuan;
				$input['start_date'] = $start_date[$i];
				$input['end_date'] = $end_date[$i];
				$input['nik_karyawan'] = $nik_karyawan[$i];
				$input['depo_karyawan'] = $depo_karyawan[$i];
				$input['depo_awal'] = $lokasi_awal[$i];
				// $input['jabatan_awal'] = $kode_jabatan_awal[$i];
				// $input['jabatan_akhir'] = $jabatan_akhir[$i];

				$save 		= $this->M_query->insert_data('tbl_karyawan_project_tkbm', $input);

				$nik_baru = $nik_karyawan[$i];
				$input2['lokasi_hrd'] = $depo_karyawan[$i];
				// $input2['jabatan_hrd'] = $jabatan_akhir[$i];
				$input2['status_hrd'] = '3';

				$where = array('nik_baru'=>$nik_baru);
				$save = $this->M_query->update_data('tbl_karyawan_struktur', $input2, $where);
				
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