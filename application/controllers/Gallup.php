<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallup extends CI_Controller {

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
		$data['title'] = "Form Survey Kepuasan Karyawan";
		// $tahun = date('Y');
		$tahun = '2024';
		$nik_baru = users('nik_baru');
		$data['pertanyaan'] = $this->m_query->select_row_data('*', 'tbl_pertanyaan_gallup', array('tahun'=>$tahun))->row_array();
		$data['jawaban'] = $this->m_query->select_row_data('*', 'tbl_karyawan_gallup', array('nik_baru'=>$nik_baru, 'tahun'=>$tahun))->result_array();
		$this->load->view('admin/gallup/index', $data);
	}

	public function index_essay()
	{
		$data['title'] = "Form Assesment Jobdesk & KPI";
		// $tahun = date('Y');
		$tahun = '2024';
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->select_row_data('*', 'tbl_pertanyaan_gallup_essay', array('tahun'=>$tahun))->result_array();
		$data['jawaban'] = $this->m_query->select_row_data('*', 'tbl_karyawan_gallup_essay', array('tahun'=>$tahun, 'nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/gallup/index_essay', $data);
	}

	public function index_essay_spv()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
			$data['title'] = "Data Assesment Jobdesk & KPI";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_app->gallup_bawahan_pusat($jabatan)->result_array();
			$this->load->view('admin/gallup/index_bawahan', $data);
		}
		if ($lokasi != 'Pusat') {
			$data['title'] = "Data Assesment Jobdesk & KPI";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_app->gallup_bawahan($jabatan, $lokasi)->result_array();
			$this->load->view('admin/gallup/index_bawahan', $data);
		}
	}

	public function detail_jawaban_essay($nik_baru)
	{		
		$data['title'] = "Data Assesment Jobdesk & KPI $nik_baru";
		$tahun = date('Y');
		$data['listdata'] = $this->m_app->detail_jawaban_essay($nik_baru, $tahun)->result_array();
		$data['penilaian'] = $this->m_query->select_row_data('angka_mutu_atasan', 'tbl_karyawan_gallup_essay', array('tahun'=>$tahun, 'nik_baru'=>$nik_baru, 'pertanyaan'=>'1'))->row_array();
		$this->load->view('admin/gallup/detail_jawaban_essay', $data);
	}

	public function detail_jawaban_essay_2($nik_baru)
	{		
		$data['title'] = "Data Assesment Jobdesk & KPI $nik_baru";
		$tahun = date('Y');
		$data['listdata'] = $this->m_app->detail_jawaban_essay($nik_baru)->result_array();
		$data['penilaian'] = $this->m_query->select_row_data('angka_mutu_atasan', 'tbl_karyawan_gallup_essay', array('tahun'=>$tahun, 'nik_baru'=>$nik_baru, 'pertanyaan'=>'1'))->row_array();
		$this->load->view('admin/gallup/detail_jawaban_essay_2', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			// $tahun = date('Y');
			$nik = $this->m_query->select_row_data('*', 'tbl_karyawan_gallup', array('nik_baru'=>$nik_baru, 'tahun'=>'2024'))->result_array();
			if (empty($nik)) {
				$input['no_urut'] = users('no_urut');
				$input['nik_baru'] = $this->input->post('nik_baru');
				$input['jawaban_1'] = $this->input->post('jawaban_1');
				$input['jawaban_2'] = $this->input->post('jawaban_2');
				$input['jawaban_3'] = $this->input->post('jawaban_3');
				$input['jawaban_4'] = $this->input->post('jawaban_4');
				$input['jawaban_5'] = $this->input->post('jawaban_5');
				$input['jawaban_6'] = $this->input->post('jawaban_6');
				$input['jawaban_7'] = $this->input->post('jawaban_7');
				$input['jawaban_8'] = $this->input->post('jawaban_8');
				$input['jawaban_9'] = $this->input->post('jawaban_9');
				$input['jawaban_10'] = $this->input->post('jawaban_10');
				$input['jawaban_11'] = $this->input->post('jawaban_11');
				$input['jawaban_12'] = $this->input->post('jawaban_12');
				$input['tahun'] = '2024';
				$save 		= $this->m_query->insert_data('tbl_karyawan_gallup', $input);

				$no_urut = users('no_urut');
				$nik_baru = $this->input->post('nik_baru');
				$nomor_saran = $this->input->post('nomor_saran');
				$saran = $this->input->post('saran');

				for ($i=0; $i < count($nomor_saran); $i++) { 
					# code...
					$input2['no_urut'] = $no_urut;
					$input2['nik_baru'] = $nik_baru;
					$input2['nomor_saran'] = $nomor_saran[$i];
					$input2['saran'] = $saran[$i];
					$input2['tahun'] = '2024';

					$save9 		= $this->m_query->insert_data('tbl_karyawan_gallup_saran', $input2);
					
				}

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
						'message'	=> 'Anda telah melakukan gallup',
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

	function doInput_essay()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$nik_baru = $this->input->post('nik_baru');
			$jabatan = $this->input->post('jabatan');
			$jawaban = $this->input->post('jawaban');

			for ($i=0; $i < count($id); $i++) { 
				# code...
				$input['pertanyaan'] = $id[$i];
				$input['nik_baru'] = $nik_baru;
				$input['jabatan_karyawan'] = $jabatan;
				$input['jawaban'] = $jawaban[$i];
				$input['tahun'] = '2024';

				$save = $this->m_query->insert_data('tbl_karyawan_gallup_essay', $input);
				
			}

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

	public function doInput_penilaian_essay()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$angka_mutu_atasan = $this->input->post('angka_mutu_atasan');

			for ($i=0; $i < count($id); $i++) { 
				# code...
				$input['angka_mutu_atasan'] = $angka_mutu_atasan[$i];

				$where = array('id'=>$id[$i]);
				$save = $this->m_query->update_data('tbl_karyawan_gallup_essay', $input, $where);
				
			}

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

	public function doInput_penilaian_essay_2()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$angka_mutu_atasan = $this->input->post('angka_mutu_atasan');

			for ($i=0; $i < count($id); $i++) { 
				# code...
				$input['angka_mutu_atasan_2'] = $angka_mutu_atasan[$i];

				$where = array('id'=>$id[$i]);
				$save = $this->m_query->update_data('tbl_karyawan_gallup_essay', $input, $where);
				
			}

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

}