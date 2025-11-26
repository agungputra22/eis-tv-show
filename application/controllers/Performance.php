<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Performance extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin', 'M_app'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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

			$data['title'] = "Data Master Performace";
			$jabatan = users('jabatan_struktur');
			$nik_baru = users('nik_baru');
			$data['listdata'] = $this->M_app->performace_bawahan_pusat($jabatan, $nik_baru)->result_array();
			$this->load->view('admin/performace/index_data_master', $data);
		}
		if ($lokasi != 'Pusat') {
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

			$data['title'] = "Data Master Performace";
			$jabatan = users('jabatan_struktur');
			$nik_baru = users('nik_baru');
			$data['listdata'] = $this->M_app->performace_bawahan($jabatan, $lokasi, $nik_baru)->result_array();
			$this->load->view('admin/performace/index_data_master', $data);
		}
	}

	public function edit_ipp($id)
	{
		$data['title'] = "Detail Form IPP (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_jabatan_karyawan', array('no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/performace/edit_ipp', $data);
	}

	public function edit_tt($id)
	{
		$data['title'] = "Detail Form IPP (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_jabatan_karyawan', array('no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/performace/edit_tt', $data);
	}

	public function doInput_ipp()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$jabatan_struktur = $this->input->post('jabatan_struktur');
			$persentase_a = $this->input->post('persentase_a');
			$uraian_a = $this->input->post('uraian_a');
			$evaluasi_a = $this->input->post('evaluasi_a');
			$target_a = $this->input->post('target_a');
			$persentase_b = $this->input->post('persentase_b');
			$uraian_b = $this->input->post('uraian_b');
			$evaluasi_b = $this->input->post('evaluasi_b');
			$target_b = $this->input->post('target_b');
			$persentase_c = $this->input->post('persentase_c');
			$uraian_c = $this->input->post('uraian_c');
			$evaluasi_c = $this->input->post('evaluasi_c');
			$target_c = $this->input->post('target_c');
			$persentase_d = $this->input->post('persentase_d');
			$uraian_d = $this->input->post('uraian_d');
			$evaluasi_d = $this->input->post('evaluasi_d');
			$target_d = $this->input->post('target_d');
			$persentase_e = $this->input->post('persentase_e');
			$uraian_e = $this->input->post('uraian_e');
			$evaluasi_e = $this->input->post('evaluasi_e');
			$target_e = $this->input->post('target_e');
			$persentase_f = $this->input->post('persentase_f');
			$uraian_f = $this->input->post('uraian_f');
			$evaluasi_f = $this->input->post('evaluasi_f');
			$target_f = $this->input->post('target_f');

			if ($persentase_a != 0) {
				for ($i=0; $i < count($uraian_a); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_a[$i];
					$input2['evaluasi'] = $evaluasi_a[$i];
					$input2['bobot'] = $persentase_a;
					$input2['target'] = $target_a[$i];
					$input2['kode'] = '1';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_b != 0) {
				for ($i=0; $i < count($uraian_b); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_b[$i];
					$input2['evaluasi'] = $evaluasi_b[$i];
					$input2['bobot'] = $persentase_b;
					$input2['target'] = $target_b[$i];
					$input2['kode'] = '2';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_c != 0) {
				for ($i=0; $i < count($uraian_c); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_c[$i];
					$input2['evaluasi'] = $evaluasi_c[$i];
					$input2['bobot'] = $persentase_c;
					$input2['target'] = $target_c[$i];
					$input2['kode'] = '3';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_d != 0) {
				for ($i=0; $i < count($uraian_d); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_d[$i];
					$input2['evaluasi'] = $evaluasi_d[$i];
					$input2['bobot'] = $persentase_d;
					$input2['target'] = $target_d[$i];
					$input2['kode'] = '4';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_e != 0) {
				for ($i=0; $i < count($uraian_e); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_e[$i];
					$input2['evaluasi'] = $evaluasi_e[$i];
					$input2['bobot'] = $persentase_e;
					$input2['target'] = $target_e[$i];
					$input2['kode'] = '5';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_f != 0) {
				for ($i=0; $i < count($uraian_f); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_f[$i];
					$input2['evaluasi'] = $evaluasi_f[$i];
					$input2['bobot'] = $persentase_f;
					$input2['target'] = $target_f[$i];
					$input2['kode'] = '6';
					$input2['status'] = '1';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
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

	public function doInput_tt()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$jabatan_struktur = $this->input->post('jabatan_struktur');
			$persentase_a = $this->input->post('persentase_a');
			$uraian_a = $this->input->post('uraian_a');
			$evaluasi_a = $this->input->post('evaluasi_a');
			$target_a = $this->input->post('target_a');
			$persentase_b = $this->input->post('persentase_b');
			$uraian_b = $this->input->post('uraian_b');
			$evaluasi_b = $this->input->post('evaluasi_b');
			$target_b = $this->input->post('target_b');
			$persentase_c = $this->input->post('persentase_c');
			$uraian_c = $this->input->post('uraian_c');
			$evaluasi_c = $this->input->post('evaluasi_c');
			$target_c = $this->input->post('target_c');
			$persentase_f = $this->input->post('persentase_f');
			$uraian_f = $this->input->post('uraian_f');
			$evaluasi_f = $this->input->post('evaluasi_f');
			$target_f = $this->input->post('target_f');

			if ($persentase_a != 0) {
				for ($i=0; $i < count($uraian_a); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_a[$i];
					$input2['evaluasi'] = $evaluasi_a[$i];
					$input2['bobot'] = $persentase_a;
					$input2['target'] = $target_a[$i];
					$input2['kode'] = '1';
					$input2['status'] = '2';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_b != 0) {
				for ($i=0; $i < count($uraian_b); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_b[$i];
					$input2['evaluasi'] = $evaluasi_b[$i];
					$input2['bobot'] = $persentase_b;
					$input2['target'] = $target_b[$i];
					$input2['kode'] = '2';
					$input2['status'] = '2';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_c != 0) {
				for ($i=0; $i < count($uraian_c); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_c[$i];
					$input2['evaluasi'] = $evaluasi_c[$i];
					$input2['bobot'] = $persentase_c;
					$input2['target'] = $target_c[$i];
					$input2['kode'] = '3';
					$input2['status'] = '2';

					$this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}

			if ($persentase_f != 0) {
				for ($i=0; $i < count($uraian_f); $i++) { 
					# code...
					$input2['nik_baru'] = $nik_baru;
					$input2['jabatan'] = $jabatan_struktur;
					$input2['task'] = $uraian_f[$i];
					$input2['evaluasi'] = $evaluasi_f[$i];
					$input2['bobot'] = $persentase_f;
					$input2['target'] = $target_f[$i];
					$input2['kode'] = '6';
					$input2['status'] = '2';

					$save2 =  $this->M_query->insert_data('tbl_karyawan_master_performance', $input2);
					
				}
			}
			
			if($save2) {
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

	public function revisi_edit_ipp($id)
	{
		$data['title'] = "Detail Form IPP (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		$data['point_a'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'1'))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'1'))->row_array();

		$data['point_b'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'1'))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'1'))->row_array();

		$data['point_c'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'1'))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'1'))->row_array();

		$data['point_d'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'4', 'status'=>'1'))->result_array();
		$data['persentase_d'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'4', 'status'=>'1'))->row_array();

		$data['point_e'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'5', 'status'=>'1'))->result_array();
		$data['persentase_e'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'5', 'status'=>'1'))->row_array();

		$data['point_f'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'1'))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'1'))->row_array();

		$dept = users('departement_id');
		$data['data_kpi'] = $this->M_query->select_row_data('*', 'tbl_kpi', array('dept'=>$dept))->result();

		$this->load->view('admin/performace/revisi_edit_ipp', $data);
	}

	public function doUpdate_ipp()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			// // Update Data Master Performance
			$nik_baru = $this->input->post('nik_baru');

			// Update Persentase A
			$input['bobot'] = $this->input->post('persentase_a');
			$where = array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status'=>'1');
			$save = $this->M_query->update_data('tbl_karyawan_master_performance', $input, $where);

			// Update Persentase B
			$input7['bobot'] = $this->input->post('persentase_b');
			$where7 = array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status'=>'1');
			$save7 = $this->M_query->update_data('tbl_karyawan_master_performance', $input7, $where7);

			// Update Persentase C
			$input3['bobot'] = $this->input->post('persentase_c');
			$where3 = array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status'=>'1');
			$save3 = $this->M_query->update_data('tbl_karyawan_master_performance', $input3, $where3);

			// Update Persentase D
			$input4['bobot'] = $this->input->post('persentase_d');
			$where4 = array('nik_baru'=>$nik_baru, 'kode'=>'4', 'status'=>'1');
			$save4 = $this->M_query->update_data('tbl_karyawan_master_performance', $input4, $where4);

			// Update Persentase E
			$input5['bobot'] = $this->input->post('persentase_e');
			$where5 = array('nik_baru'=>$nik_baru, 'kode'=>'5', 'status'=>'1');
			$save5 = $this->M_query->update_data('tbl_karyawan_master_performance', $input5, $where5);

			// Update Persentase F
			$input6['bobot'] = $this->input->post('persentase_f');
			$where6 = array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status'=>'1');
			$save6 = $this->M_query->update_data('tbl_karyawan_master_performance', $input6, $where6);
			
			if($save6) {
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

	public function revisi_edit_tt($id)
	{
		$data['title'] = "Detail Form Target Terukur (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		$data['point_a'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'2'))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'2'))->row_array();

		$data['point_b'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'2'))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'2'))->row_array();

		$data['point_c'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'2'))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'2'))->row_array();

		$data['point_f'] = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'2'))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'2'))->row_array();

		$dept = users('departement_id');
		$data['data_kpi'] = $this->M_query->select_row_data('*', 'tbl_kpi', array('dept'=>$dept))->result();

		$this->load->view('admin/performace/revisi_edit_tt', $data);
	}

	public function doUpdate_tt()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			// Update Data Master Performance
			$nik_baru = $this->input->post('nik_baru');

			// Update Persentase A
			$input['bobot'] = $this->input->post('persentase_a');
			$where = array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status'=>'2');
			$save = $this->M_query->update_data('tbl_karyawan_master_performance', $input, $where);

			// Update Persentase B
			$input7['bobot'] = $this->input->post('persentase_b');
			$where7 = array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status'=>'2');
			$save7 = $this->M_query->update_data('tbl_karyawan_master_performance', $input7, $where7);

			// Update Persentase C
			$input3['bobot'] = $this->input->post('persentase_c');
			$where3 = array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status'=>'2');
			$save3 = $this->M_query->update_data('tbl_karyawan_master_performance', $input3, $where3);

			// Update Persentase F
			$input6['bobot'] = $this->input->post('persentase_f');
			$where6 = array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status'=>'2');
			$save6 = $this->M_query->update_data('tbl_karyawan_master_performance', $input6, $where6);
			
			if($save6) {
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

	public function detail_ipp($id)
	{
		$data['title'] = "Detail Form IPP (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		$data['point_a'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'1', 'a.status'=>'1'))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'1'))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'2', 'a.status'=>'1'))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'1'))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'3', 'a.status'=>'1'))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'1'))->row_array();

		$data['point_d'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'4', 'a.status'=>'1'))->result_array();
		$data['persentase_d'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'4', 'status'=>'1'))->row_array();

		$data['point_e'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'5', 'a.status'=>'1'))->result_array();
		$data['persentase_e'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'5', 'status'=>'1'))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'6', 'a.status'=>'1'))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'1'))->row_array();

		$this->load->view('admin/performace/detail_ipp', $data);
	}

	public function detail_tt($id)
	{
		$data['title'] = "Detail Form Target Terukur (".$id.")";
		$data['edit'] = $this->M_query->getMaster_karyawan(array('ks.nik_baru'=>$id))->row_array();
		$data['point_a'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'1', 'a.status'=>'2'))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'1', 'status'=>'2'))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'2', 'a.status'=>'2'))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'2', 'status'=>'2'))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'3', 'a.status'=>'2'))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'3', 'status'=>'2'))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp(array('a.nik_baru'=>$id, 'a.kode'=>'6', 'a.status'=>'2'))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance(array('nik_baru'=>$id, 'kode'=>'6', 'status'=>'2'))->row_array();

		$this->load->view('admin/performace/detail_tt', $data);
	}

	public function doInput_ipp_tt_perbulan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			$save = $this->M_query->input_ipp_tt($nik_baru, $bulan, $tahun);
			
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

	public function index_perbulan()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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

			$data['title'] = "Data Master Performace";
			$jabatan = users('jabatan_struktur');
			$nik_baru = users('nik_baru');
			$data['listdata'] = $this->M_app->performace_bawahan_pusat($jabatan, $nik_baru)->result_array();
			$this->load->view('admin/performace/perbulan/index', $data);
		}
		if ($lokasi != 'Pusat') {
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

			$data['title'] = "Data Master Performace";
			$jabatan = users('jabatan_struktur');
			$nik_baru = users('nik_baru');
			$data['listdata'] = $this->M_app->performace_bawahan($jabatan, $lokasi, $nik_baru)->result_array();
			$this->load->view('admin/performace/perbulan/index', $data);
		}
	}

	public function detail_all($id)
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

		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}

		$data['title'] = "Detail Performance (".$id.")";
		$data['listdata'] = $this->M_app->performace_detail_all($id)->result_array();

		$this->load->view('admin/performace/perbulan/detail_all', $data);
	}

	public function detail_all_tt()
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
			
		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}
		$nik_baru = $this->input->get('nik_baru');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data['title'] = "Detail Performance (".$nik_baru.")";
		$data['edit'] = $this->M_app->performace_detail_all_perbulan($nik_baru, $bulan, $tahun)->row_array();
		$data['point_a'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$this->load->view('admin/performace/perbulan/detail_all_tt', $data);
	}

	public function doUpdate_tt_perbulan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_a = $this->input->post('id_a');
			$persentase_atasan_a = $this->input->post('persentase_atasan_a');
			$keterangan_a = $this->input->post('keterangan_a');
			$id_b = $this->input->post('id_b');
			$persentase_atasan_b = $this->input->post('persentase_atasan_b');
			$keterangan_b = $this->input->post('keterangan_b');
			$id_c = $this->input->post('id_c');
			$persentase_atasan_c = $this->input->post('persentase_atasan_c');
			$keterangan_c = $this->input->post('keterangan_c');
			$id_f = $this->input->post('id_f');
			$persentase_atasan_f = $this->input->post('persentase_atasan_f');
			$keterangan_f = $this->input->post('keterangan_f');

			for ($i=0; $i < count($persentase_atasan_a); $i++) { 
				# code...
				$id = $id_a[$i];
				$input2['persentase_atasan'] = $persentase_atasan_a[$i];
				$input2['keterangan'] = $keterangan_a[$i];

				$where2 = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input2, $where2);
				
			}

			for ($i=0; $i < count($persentase_atasan_b); $i++) { 
				# code...
				$id = $id_b[$i];
				$input['persentase_atasan'] = $persentase_atasan_b[$i];
				$input['keterangan'] = $keterangan_b[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_c); $i++) { 
				# code...
				$id = $id_c[$i];
				$input['persentase_atasan'] = $persentase_atasan_c[$i];
				$input['keterangan'] = $keterangan_c[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_f); $i++) { 
				# code...
				$id = $id_f[$i];
				$input['persentase_atasan'] = $persentase_atasan_f[$i];
				$input['keterangan'] = $keterangan_f[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
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

	public function detail_all_ipp()
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
			
		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}
		$nik_baru = $this->input->get('nik_baru');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data['title'] = "Detail Performance (".$nik_baru.")";
		$data['edit'] = $this->M_app->performace_detail_all_perbulan($nik_baru, $bulan, $tahun)->row_array();
		$data['point_a'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_d'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'4', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_d'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'4', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_e'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'5', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_e'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'5', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$this->load->view('admin/performace/perbulan/detail_all_ipp', $data);
	}

	public function doUpdate_ipp_perbulan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_a = $this->input->post('id_a');
			$persentase_atasan_a = $this->input->post('persentase_atasan_a');
			$keterangan_a = $this->input->post('keterangan_a');
			$id_b = $this->input->post('id_b');
			$persentase_atasan_b = $this->input->post('persentase_atasan_b');
			$keterangan_b = $this->input->post('keterangan_b');
			$id_c = $this->input->post('id_c');
			$persentase_atasan_c = $this->input->post('persentase_atasan_c');
			$keterangan_c = $this->input->post('keterangan_c');
			$id_d = $this->input->post('id_d');
			$persentase_atasan_d = $this->input->post('persentase_atasan_d');
			$keterangan_d = $this->input->post('keterangan_d');
			$id_e = $this->input->post('id_e');
			$persentase_atasan_e = $this->input->post('persentase_atasan_e');
			$keterangan_e = $this->input->post('keterangan_e');
			$id_f = $this->input->post('id_f');
			$persentase_atasan_f = $this->input->post('persentase_atasan_f');
			$keterangan_f = $this->input->post('keterangan_f');

			for ($i=0; $i < count($persentase_atasan_a); $i++) { 
				# code...
				$id = $id_a[$i];
				$input2['persentase_atasan'] = $persentase_atasan_a[$i];
				$input2['keterangan'] = $keterangan_a[$i];

				$where2 = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input2, $where2);
				
			}

			for ($i=0; $i < count($persentase_atasan_b); $i++) { 
				# code...
				$id = $id_b[$i];
				$input['persentase_atasan'] = $persentase_atasan_b[$i];
				$input['keterangan'] = $keterangan_b[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_c); $i++) { 
				# code...
				$id = $id_c[$i];
				$input['persentase_atasan'] = $persentase_atasan_c[$i];
				$input['keterangan'] = $keterangan_c[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_d); $i++) { 
				# code...
				$id = $id_d[$i];
				$input['persentase_atasan'] = $persentase_atasan_d[$i];
				$input['keterangan'] = $keterangan_d[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_e); $i++) { 
				# code...
				$id = $id_e[$i];
				$input['persentase_atasan'] = $persentase_atasan_e[$i];
				$input['keterangan'] = $keterangan_e[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_atasan_f); $i++) { 
				# code...
				$id = $id_f[$i];
				$input['persentase_atasan'] = $persentase_atasan_f[$i];
				$input['keterangan'] = $keterangan_f[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
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

	public function index_target_terukur()
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

		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}


		$data['title'] = "Detail Form IPP";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_app->performace_detail_all($nik_baru)->result_array();

		$this->load->view('admin/performace/user/index_target_terukur', $data);
	}

	public function detail_target_terukur()
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
			
		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}
		$nik_baru = $this->input->get('nik_baru');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data['title'] = "Detail Performance (".$nik_baru.")";
		$data['edit'] = $this->M_app->performace_detail_all_perbulan($nik_baru, $bulan, $tahun)->row_array();
		$data['point_a'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status_performance'=>'2', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status_performance'=>'2', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$this->load->view('admin/performace/user/detail_target_terukur', $data);
	}

	public function doUpdate_tt_user()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_a = $this->input->post('id_a');
			$persentase_user_a = $this->input->post('persentase_user_a');
			$id_b = $this->input->post('id_b');
			$persentase_user_b = $this->input->post('persentase_user_b');
			$id_c = $this->input->post('id_c');
			$persentase_user_c = $this->input->post('persentase_user_c');
			$id_f = $this->input->post('id_f');
			$persentase_user_f = $this->input->post('persentase_user_f');

			for ($i=0; $i < count($persentase_user_a); $i++) { 
				# code...
				$id = $id_a[$i];
				$input2['persentase_user'] = $persentase_user_a[$i];

				$where2 = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input2, $where2);
				
			}

			for ($i=0; $i < count($persentase_user_b); $i++) { 
				# code...
				$id = $id_b[$i];
				$input['persentase_user'] = $persentase_user_b[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_c); $i++) { 
				# code...
				$id = $id_c[$i];
				$input['persentase_user'] = $persentase_user_c[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_f); $i++) { 
				# code...
				$id = $id_f[$i];
				$input['persentase_user'] = $persentase_user_f[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
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

	public function index_ipp()
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

		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}


		$data['title'] = "Detail Form IPP";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_app->performace_detail_all($nik_baru)->result_array();

		$this->load->view('admin/performace/user/index_ipp', $data);
	}

	public function detail_ipp_user()
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
			
		function getRomawi($bln){
            switch ($bln){
                case 1: 
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
		}
		$nik_baru = $this->input->get('nik_baru');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data['title'] = "Detail Performance (".$nik_baru.")";
		$data['edit'] = $this->M_app->performace_detail_all_perbulan($nik_baru, $bulan, $tahun)->row_array();
		$data['point_a'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_a'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'1', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_b'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_b'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'2', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_c'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_c'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'3', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_d'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'4', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_d'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'4', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_e'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'5', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_e'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'5', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$data['point_f'] = $this->M_query->getData_ipp_histori(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status_performance'=>'1', 'a.bulan'=>$bulan, 'a.tahun'=>$tahun))->result_array();
		$data['persentase_f'] = $this->M_query->persentase_performance_perbulan(array('nik_baru'=>$nik_baru, 'kode'=>'6', 'status_performance'=>'1', 'bulan'=>$bulan, 'tahun'=>$tahun))->row_array();

		$this->load->view('admin/performace/user/detail_ipp', $data);
	}

	public function doUpdate_ipp_user()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_a = $this->input->post('id_a');
			$persentase_user_a = $this->input->post('persentase_user_a');
			$id_b = $this->input->post('id_b');
			$persentase_user_b = $this->input->post('persentase_user_b');
			$id_c = $this->input->post('id_c');
			$persentase_user_c = $this->input->post('persentase_user_c');
			$id_d = $this->input->post('id_d');
			$persentase_user_d = $this->input->post('persentase_user_d');
			$id_e = $this->input->post('id_e');
			$persentase_user_e = $this->input->post('persentase_user_e');
			$id_f = $this->input->post('id_f');
			$persentase_user_f = $this->input->post('persentase_user_f');

			for ($i=0; $i < count($persentase_user_a); $i++) { 
				# code...
				$id = $id_a[$i];
				$input2['persentase_user'] = $persentase_user_a[$i];

				$where2 = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input2, $where2);
				
			}

			for ($i=0; $i < count($persentase_user_b); $i++) { 
				# code...
				$id = $id_b[$i];
				$input['persentase_user'] = $persentase_user_b[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_c); $i++) { 
				# code...
				$id = $id_c[$i];
				$input['persentase_user'] = $persentase_user_c[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_d); $i++) { 
				# code...
				$id = $id_d[$i];
				$input['persentase_user'] = $persentase_user_d[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_e); $i++) { 
				# code...
				$id = $id_e[$i];
				$input['persentase_user'] = $persentase_user_e[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
			}

			for ($i=0; $i < count($persentase_user_f); $i++) { 
				# code...
				$id = $id_f[$i];
				$input['persentase_user'] = $persentase_user_f[$i];

				$where = array('id'=>$id);
				$this->M_query->update_data('tbl_karyawan_histori_performance', $input, $where);
				
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

	public function doInput_ipp_revisi() {
		$input['nik_baru'] = $this->input->post('nik_baru');
		$input['jabatan'] = $this->input->post('jabatan');
		$input['task'] = $this->input->post('task');
		$input['evaluasi'] = $this->input->post('evaluasi');
		$input['bobot'] = $this->input->post('bobot');
		$input['target'] = $this->input->post('target');
		$input['kpi'] = $this->input->post('kpi');
		$input['kode'] = $this->input->post('kode');
		$input['status'] = $this->input->post('status');
		$data = $this->M_query->insert_data('tbl_karyawan_master_performance', $input);
		echo json_encode($data);
	}

	public function get_detail_ipp_revisi() {
		$id = $this->input->get('id');
		$data = $this->M_query->select_row_data('*', 'tbl_karyawan_master_performance', array('id'=>$id), null)->row_array();
		echo json_encode($data);
	}

	public function doUpdate_ipp_revisi() {
		$id=$this->input->post('id');
		$input['task'] = $this->input->post('task');
		$input['evaluasi'] = $this->input->post('evaluasi');
		$input['target'] = $this->input->post('target');
		$input['kpi'] = $this->input->post('kpi');
		$where = array('id'=>$id);
		$data = $this->M_query->update_data('tbl_karyawan_master_performance', $input, $where);
		echo json_encode($data);
	}

	public function hapus_detail_ipp_revisi() {
		$id = $this->input->post('id');
		$where = array('id'=>$id);
		$data = $this->M_query->delete_data('tbl_karyawan_master_performance', $where);
		echo json_encode($data);
	}

	public function data_all_ipp_a(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}		

	public function data_all_ipp_b(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_ipp_c(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_ipp_d(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'4', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_ipp_e(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'5', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_ipp_f(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status'=>'1'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_tt_a(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'1', 'a.status'=>'2'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_tt_b(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'2', 'a.status'=>'2'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_tt_c(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'3', 'a.status'=>'2'));
		$data = $query->result();
		echo json_encode($data);
	}

	public function data_all_tt_f(){
		$nik_baru = $this->input->get('nik_baru');
		$query = $this->M_query->getData_ipp(array('a.nik_baru'=>$nik_baru, 'a.kode'=>'6', 'a.status'=>'2'));
		$data = $query->result();
		echo json_encode($data);
	}

}