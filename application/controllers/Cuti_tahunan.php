<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_tahunan extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin', 'm_all'));
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
		
		$data['title'] = "Data Cuti Tahunan";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->cuti_tahunan($nik_baru)->result_array();
		$data['cuti'] = $this->m_all->sisa_cuti($nik_baru)->row_array();
		$data['cuti_berikutnya'] = $this->m_all->sisa_cuti_berikut($nik_baru)->row_array();
		$this->load->view('admin/izin/cuti_tahunan/index', $data);
	}

	public function approve()
	{
		$lokasi = users('lokasi_struktur');
		$nik = users('nik_baru');

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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level1_pusat($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level1_pusat($jabatan);
			$data['hangus'] = $this->m_admin->hangus_cuti_tahunan_level1_pusat($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve', $data);
		}
		elseif ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level1_pusat($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level1_pusat($jabatan);
			$data['hangus'] = $this->m_admin->hangus_cuti_tahunan_level1_pusat($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve', $data);
		}
		elseif ($nik == '1908000101') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_case($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level1($jabatan, $lokasi);
			$data['hangus'] = $this->m_admin->hangus_cuti_tahunan_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/cuti_tahunan/approve', $data);
		}
		elseif ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level1($jabatan, $lokasi);
			$data['hangus'] = $this->m_admin->hangus_cuti_tahunan_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/cuti_tahunan/approve', $data);
		}
	}

	public function approve_level_2()
	{
		$lokasi = users('lokasi_struktur');
		$jabatan = users('jabatan_struktur');

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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level2($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve_level_2', $data);
		}
		elseif ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level2($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve_level_2', $data);
		}
		elseif ($jabatan == '255' and $lokasi == 'Pandeglang') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_level_2_case($lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level2($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve_level_2', $data);
		}
		elseif ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_level_2($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_tahunan_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_tahunan_level2($jabatan);
			$this->load->view('admin/izin/cuti_tahunan/approve_level_2', $data);
		}
	}

	public function tambah()
	{
		$data['title'] = "Form Cuti Tahunan";
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_cuti_tahunan();
		$this->load->view('admin/izin/cuti_tahunan/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Approval Cuti Tahunan (".$id.")";
		$data['edit'] = $this->m_admin->izin_cuti_tahunan($id)->row_array();
		$this->load->view('admin/izin/cuti_tahunan/tindakan', $data);
	}

	public function edit_level_2($id)
	{
		$data['title'] = "Approval Cuti Tahunan (".$id.")";
		$data['edit'] = $this->m_admin->izin_cuti_tahunan($id)->row_array();
		$this->load->view('admin/izin/cuti_tahunan/tindakan_level_2', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_cuti_tahunan', 'nik_cuti_tahunan', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_pengajuan_tahunan = $this->input->post('no_pengajuan_tahunan');
			$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
			$nik_sisa_cuti = $this->input->post('nik_cuti_tahunan');
			$jabatan_cuti_tahunan = $this->input->post('jabatan_cuti_tahunan');
			$opsi_cuti_tahunan = $this->input->post('opsi');

			if ($opsi_cuti_tahunan == 'Urgent') {
				$start_cuti_tahunan = $this->input->post('start_full_day_cd_urgent');
			}
			elseif ($opsi_cuti_tahunan == 'Terencana') {
				$start_cuti_tahunan = $this->input->post('start_full_day_cd_terencana');
			}
			$ket_tambahan_tahunan = $this->input->post('ket_tambahan_tahunan');
			$status_cuti_tahunan = "0";
			$status_cuti_tahunan_2 = "0";
			$hak_cuti_utuh = "1";

			if (!empty($_FILES['dok_cuti_tahunan']['name'])) {
				# code...
				$path = 'cuti_tahunan/';
				$name = 'dok_cuti_tahunan';
				$pecah = explode(".", $_FILES['dok_cuti_tahunan']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($no_pengajuan_tahunan)).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['dok_cuti_tahunan'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
					redirect('full_day/doInput');
				}
				
			}

			for ($i=0; $i < count($start_cuti_tahunan); $i++) { 
				# code...
				$input['no_pengajuan_tahunan'] = $no_pengajuan_tahunan;
				$input['tanggal_pengajuan'] = $tanggal_pengajuan;
				$input['nik_sisa_cuti'] = $nik_sisa_cuti;
				$input['jabatan_cuti_tahunan'] = $jabatan_cuti_tahunan;
				$input['opsi_cuti_tahunan'] = $opsi_cuti_tahunan;
				$input['start_cuti_tahunan'] = $start_cuti_tahunan[$i];
				$input['ket_tambahan_tahunan'] = $ket_tambahan_tahunan;
				$input['status_cuti_tahunan'] = $status_cuti_tahunan;
				$input['status_cuti_tahunan_2'] = $status_cuti_tahunan_2;
				$input['hak_cuti_utuh'] = $hak_cuti_utuh;

				$save9 		= $this->m_query->insert_data('tbl_karyawan_cuti_tahunan', $input);
				
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

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_sisa_cuti', 'nik_sisa_cuti', 'required');
		if($this->form_validation->run()===TRUE) {
			$status = $this->input->post('status_cuti_tahunan');
			if ($status == 1) {
				$badgenumber = $this->input->post('nik_sisa_cuti');
				$shift_day = $this->input->post('start_cuti_tahunan');
				$input2['opsi_cuti_tahunan'] = $this->input->post('opsi_cuti_tahunan');
				$where2 = array('shift_day'=>$shift_day, 'badgenumber'=>$badgenumber);
				$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);
			}

			$id = $this->input->post('id_sisa_cuti');

			$tindakan = $this->input->post('status_cuti_tahunan');
			if ($tindakan == 1) {
				$tahun = date('Y',strtotime($this->input->post('start_cuti_tahunan')))-1;
				$nik_sisa_cuti = $this->input->post('nik_sisa_cuti');
				$hak_cuti = $this->input->post('hak_cuti_utuh');

				$this->m_all->kurang_cuti($hak_cuti, $nik_sisa_cuti,$tahun);
			} elseif ($tindakan == 2) {
				$tahun = date('Y',strtotime($this->input->post('start_cuti_tahunan')))-1;
				$nik_sisa_cuti = $this->input->post('nik_sisa_cuti');
				$hak_cuti = $this->input->post('hak_cuti_utuh');

				$this->m_all->kurang_cuti_not($hak_cuti, $nik_sisa_cuti, $tahun);
			} 

			$input['status_cuti_tahunan'] = $this->input->post('status_cuti_tahunan');
			$input['tanggal_cuti_tahunan'] = $this->input->post('tanggal_cuti_tahunan');
			$input['feedback_cuti_tahunan'] = $this->input->post('feedback_cuti_tahunan');

			$where = array('id_sisa_cuti'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_cuti_tahunan', $input, $where);
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

	public function doUpdate_level_2()
	{
		$this->form_validation->set_rules('nik_sisa_cuti', 'nik_sisa_cuti', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_sisa_cuti');
			// $input['status_cuti_tahunan'] = $this->input->post('status_cuti_tahunan_2');
			$input['status_cuti_tahunan_2'] = $this->input->post('status_cuti_tahunan_2');
			$input['tanggal_cuti_tahunan_2'] = $this->input->post('tanggal_cuti_tahunan_2');
			$input['feedback_cuti_tahunan_2'] = $this->input->post('feedback_cuti_tahunan_2');

			$where = array('id_sisa_cuti'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_cuti_tahunan', $input, $where);
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

	public function view_approve_level_1()
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_1', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_1', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_1', $data);
		}
	}

	public function view_not_approve_level_1()
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_1', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_1', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_1', $data);
		}
	}

	public function view_hangus_level_1()
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_hangus_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/hangus_level_1', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_hangus_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/hangus_level_1', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_hangus_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/hangus_level_1', $data);
		}
	}

	public function view_approve_level_2()
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_2', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_2', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_approve_level2($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_approve_level_2', $data);
		}
	}

	public function view_not_approve_level_2()
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_2', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_2', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Not Approved Cuti Tahunan";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_tahunan_not_approve_level2($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_tahunan/view_not_approve_level_2', $data);
		}
	}

	function approve_hangus(){
		$query	= "
			SELECT 
				absensi_new.`tbl_karyawan_cuti_tahunan`.`id_sisa_cuti`
				, absensi_new.`tbl_karyawan_cuti_tahunan`.`tanggal_pengajuan`
				, absensi_new.`tbl_karyawan_cuti_tahunan`.`tanggal_pengajuan` + INTERVAL 2 DAY AS tanggal_deadline
				, absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan`
				, absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan_2`
			FROM absensi_new.`tbl_karyawan_cuti_tahunan`
			WHERE absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = 0";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$id_sisa_cuti=$row->id_sisa_cuti;
			$deadline=$row->tanggal_deadline;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_karyawan_cuti_tahunan` SET absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = 3 WHERE absensi_new.`tbl_karyawan_cuti_tahunan`.`id_sisa_cuti` = $id_sisa_cuti";
				$this->db2->query($query);
				echo ($id_sisa_cuti);
			}
		}
	}

}