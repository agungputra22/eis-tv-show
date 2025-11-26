<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Self_covid extends CI_Controller {

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
		$data['title'] = "Self Assessment Risiko COVID-19";
		$tanggal = date('Y-m-d');
		$nik_baru = users('nik_baru');
		$data['jawaban'] = $this->M_query->select_row_data('*', 'tbl_self_covid', array('nik_baru'=>$nik_baru, 'DATE(submit_date)'=>$tanggal))->result_array();
		$data['tes'] = $this->M_query->getHasil_covid(array('a.nik_baru'=>$nik_baru, 'DATE(a.submit_date)'=>$tanggal))->row_array();
		$this->load->view('admin/gallup/covid/index', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$tanggal = date('Y-m-d');
			$nik = $this->M_query->select_row_data('*', 'tbl_self_covid', array('nik_baru'=>$nik_baru, 'DATE(submit_date)'=>$tanggal))->result_array();
			if (empty($nik)) {
				$input['nik_baru'] = $this->input->post('nik_baru');
				$input['pertanyaan'] = '1';
				$input['id_jawaban'] = $this->input->post('jawaban_1');
				$this->M_query->insert_data('tbl_self_covid', $input);

				$input2['nik_baru'] = $this->input->post('nik_baru');
				$input2['pertanyaan'] = '2';
				$input2['id_jawaban'] = $this->input->post('jawaban_2');
				$this->M_query->insert_data('tbl_self_covid', $input2);

				$input3['nik_baru'] = $this->input->post('nik_baru');
				$input3['pertanyaan'] = '3';
				$input3['id_jawaban'] = $this->input->post('jawaban_3');
				$this->M_query->insert_data('tbl_self_covid', $input3);

				$input4['nik_baru'] = $this->input->post('nik_baru');
				$input4['pertanyaan'] = '4';
				$input4['id_jawaban'] = $this->input->post('jawaban_4');
				$this->M_query->insert_data('tbl_self_covid', $input4);

				$input5['nik_baru'] = $this->input->post('nik_baru');
				$input5['pertanyaan'] = '5';
				$input5['id_jawaban'] = $this->input->post('jawaban_5');
				$this->M_query->insert_data('tbl_self_covid', $input5);

				$input6['nik_baru'] = $this->input->post('nik_baru');
				$input6['pertanyaan'] = '6';
				$input6['id_jawaban'] = $this->input->post('jawaban_6');
				$this->M_query->insert_data('tbl_self_covid', $input6);

				$input7['nik_baru'] = $this->input->post('nik_baru');
				$input7['pertanyaan'] = '7';
				$input7['id_jawaban'] = $this->input->post('jawaban_7');
				$save = $this->M_query->insert_data('tbl_self_covid', $input7);

				$nik_baru = $this->input->post('nik_baru');
				$pertanyaan = '8';
				$bobot = $this->input->post('jawaban_8');

				if (!empty($bobot)) {
					for ($i=0; $i < count($bobot); $i++) { 
						# code...
						$input8['nik_baru'] = $nik_baru;
						$input8['pertanyaan'] = $pertanyaan;
						$input8['id_jawaban'] = $bobot[$i];

						$this->M_query->insert_data('tbl_self_covid', $input8);
						
					}
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

	public function index_vaksin()
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

		$data['title'] = "Sertifikat Vaksin";
		$nik_baru = users('nik_baru');
		$data['vaksin'] = $this->M_query->getVaksinKaryawan($nik_baru)->row_array();
		$this->load->view('admin/gallup/vaksin/index', $data);
	}

	public function tambah_sertifikat()
	{
		$data['title'] = "Form Upload Sertifikat";
		$nik = users('nik_baru');
		$data['vaksin'] = $this->M_query->getVaksinKaryawan($nik)->row_array();
		$this->load->view('admin/gallup/vaksin/tambah_sertifikat', $data);
	}

	public function doInput_vaksin()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik'] = $this->input->post('nik_baru');
			$input['type'] = $this->input->post('status');
			$input['tanggal_vaksin'] = $this->input->post('tanggal_vaksin');
			$nik = $this->input->post('nik_baru');
			$type = $this->input->post('status');
			if (!empty($_FILES['dokumen']['name'])) {
				# code...
				$path = 'vaksin/';
				$name = 'dokumen';
				$pecah = explode(".", $_FILES['dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($nik.'_'.$type)).'.'.$ext;
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
					redirect('self_covid/doInput_vaksin');
				}
				
			}

			$save 		= $this->M_query->insert_data('tbl_karyawan_vaksin', $input);
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