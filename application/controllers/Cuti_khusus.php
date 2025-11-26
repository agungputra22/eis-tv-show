<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuti_khusus extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'cuti'));
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
		
		$data['title'] = "Data Cuti Khusus";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->cuti_khusus($nik_baru)->result_array();
		$this->load->view('admin/izin/cuti_khusus/index', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level1_pusat($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level1($jabatan);
			$data['hangus'] = $this->m_admin->hangus_cuti_khusus_level1_pusat($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level1_pusat($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level1($jabatan);
			$data['hangus'] = $this->m_admin->hangus_cuti_khusus_level1_pusat($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_case($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level1($jabatan, $lokasi);
			$data['hangus'] = $this->m_admin->hangus_cuti_khusus_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/cuti_khusus/approve', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level1($jabatan, $lokasi);
			$data['hangus'] = $this->m_admin->hangus_cuti_khusus_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/cuti_khusus/approve', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level2($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve_level_2', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level2($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve_level_2', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_level_2_case($lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level2($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve_level_2', $data);
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
			
			$data['title'] = "Data Approval Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_level_2($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_cuti_khusus_level2($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_cuti_khusus_level2($jabatan);
			$this->load->view('admin/izin/cuti_khusus/approve_level_2', $data);
		}
	}

	public function tambah()
	{
		$data['title'] = "Form Cuti Khusus";
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_cuti_khusus();
		$data['kondisi'] = $this->m_admin->cuti_khusus()->result();
		$this->load->view('admin/izin/cuti_khusus/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Approval Cuti Khusus (".$id.")";
		$data['edit'] = $this->m_admin->izin_cuti_khusus($id)->row_array();
		$this->load->view('admin/izin/cuti_khusus/tindakan', $data);
	}

	public function edit_level_2($id)
	{
		$data['title'] = "Approval Cuti Khusus (".$id.")";
		$data['edit'] = $this->m_admin->izin_cuti_khusus($id)->row_array();
		$this->load->view('admin/izin/cuti_khusus/tindakan_level_2', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_cuti_khusus', 'nik_cuti_khusus', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['no_pengajuan_khusus'] = $this->input->post('no_pengajuan_khusus');
			$input['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
			$input['nik_cuti_khusus'] = $this->input->post('nik_cuti_khusus');
			$input['jabatan_cuti_khusus'] = $this->input->post('jabatan_cuti_khusus');
			$input['jenis_cuti_khusus'] = $this->input->post('jenis_cuti_khusus');
			$input['kondisi'] = $this->input->post('kondisi');

			$input['ket_tambahan_khusus'] = $this->input->post('ket_tambahan_khusus');
			$input['status_cuti_khusus'] = "0";	
			$input['status_cuti_khusus_2'] = "0";					

			if (!empty($_FILES['dokumen_cuti_khusus']['name'])) {
				# code...
				$path = 'izin/cuti/';
				$name = 'dokumen_cuti_khusus';
				$pecah = explode(".", $_FILES['dokumen_cuti_khusus']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input['no_pengajuan_khusus'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['dokumen_cuti_khusus'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
				}
				
			}

			$tanggal = $this->input->post('start_cuti_khusus');
			$masa_kerja = $this->input->post('end_cuti_khusus');

			$this->looping_tanggal($tanggal, $masa_kerja, $input);
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
		$this->form_validation->set_rules('nik_cuti_khusus', 'nik_cuti_khusus', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_pengajuan = $this->input->post('no_pengajuan');
			$nik_cuti_khusus = $this->input->post('nik_cuti_khusus');
			$input['status_cuti_khusus'] = $this->input->post('status_cuti_khusus');
			$input['tanggal_approval_cuti_khusus'] = $this->input->post('tanggal_approval_cuti_khusus');
			$input['feedback_cuti_khusus'] = $this->input->post('feedback_cuti_khusus');

			$where = array('no_pengajuan_khusus'=>$no_pengajuan, 'nik_cuti_khusus'=>$nik_cuti_khusus);
			$save = $this->m_query->update_data('tbl_karyawan_cuti_khusus', $input, $where);

			$status = $this->input->post('status_cuti_khusus');
			if ($status == 1) {
				$tanggal = $this->input->post('start_cuti_khusus');
				$masa_kerja = $this->input->post('jumlah_hari');
				$nik = $this->input->post('nik_cuti_khusus');
				$input2['jenis_cuti_khusus'] = $this->input->post('jenis_cuti_khusus');
				$this->looping_tanggal_update($tanggal, $masa_kerja, $nik, $input2);
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

	public function doUpdate_level_2()
	{
		$this->form_validation->set_rules('nik_cuti_khusus', 'nik_cuti_khusus', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_pengajuan = $this->input->post('no_pengajuan');
			$nik_cuti_khusus = $this->input->post('nik_cuti_khusus');
			$input['status_cuti_khusus_2'] = $this->input->post('status_cuti_khusus_2');
			$input['tanggal_approval_cuti_khusus_2'] = $this->input->post('tanggal_approval_cuti_khusus_2');
			$input['feedback_cuti_khusus_2'] = $this->input->post('feedback_cuti_khusus_2');

			$where = array('no_pengajuan_khusus'=>$no_pengajuan, 'nik_cuti_khusus'=>$nik_cuti_khusus);
			$save = $this->m_query->update_data('tbl_karyawan_cuti_khusus', $input, $where);
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

	public function tampil_hari(){
		$kondisi=$this->input->post('kondisi');
		$query=$this->m_query->tampil_hari($kondisi);
		$result=$query->result();
		echo json_encode($result);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_1', $data);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_1', $data);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_approve_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_1', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_not_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_1', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_not_approve_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_1', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_not_approve_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_1', $data);
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
			
			$data['title'] = "Data Hangus Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_hangus_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/hangus_level_1', $data);
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
			
			$data['title'] = "Data Hangus Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_hangus_level1_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/hangus_level_1', $data);
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
			
			$data['title'] = "Data Hangus Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_cuti_khusus_hangus_level1($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_khusus/hangus_level_1', $data);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_approve_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_2', $data);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_approve_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_2', $data);
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
			
			$data['title'] = "Data Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_approve_cuti_khusus_level_2($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_approve_level_2', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_not_approve_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_2', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_not_approve_cuti_khusus_level_2_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_2', $data);
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
			
			$data['title'] = "Data Not Approved Cuti Khusus";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_not_approve_cuti_khusus_level_2($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/cuti_khusus/view_not_approve_level_2', $data);
		}
	}


	private function looping_tanggal($starttime, $longtime, $data)
	{
		$end = date('Y-m-d', strtotime("+ ".$longtime." days", strtotime($starttime)));

		$minggu = checkSunday($starttime, $end);
		$finalend = date('Y-m-d', strtotime("+ $minggu days", strtotime($end)));
		$start = $starttime;

		$i = 1;
		$interval = selisihHari($start, $end);
		while (strtotime($start) < strtotime($finalend)) {
			$hari = date('l', strtotime($start));

			if ($interval > 3) {
				// $html .= "$i - $start ($hari)<br>";
				// simpan
				$data['start_cuti_khusus'] = $start;
				$this->m_query->insert_data('tbl_karyawan_cuti_khusus', $data);
				// print_r($data);
			} else {
				if ($hari != 'Sunday') {
					// $html .= "$i - $start ($hari)<br>";
					// simpan
					$data['start_cuti_khusus'] = $start;
					$this->m_query->insert_data('tbl_karyawan_cuti_khusus', $data);
					// print_r($data);
				}
			}
			
			$start = date("Y-m-d", strtotime("+1 days", strtotime($start)));
			$i++;
		}
	}

	public function doUpdate_all()
	{
		$where = $this->input->post('id_daily');
		$tanggal = date("Y-m-d");

		$this->m_query->update_cuti_all($where, $tanggal);

		$cuti_approve = $this->m_query->select_row_data_all('*', 'tbl_karyawan_cuti_khusus', $where)->num_rows();
		if ($cuti_approve>0) {
			$query_cuti_approve = $this->m_query->select_row_data_all('*', 'tbl_karyawan_cuti_khusus', $where)->result_array();
			foreach ($query_cuti_approve as $row_cuti) {
				$nik = $row_cuti['nik_cuti_khusus'];
				$no = $row_cuti['no_pengajuan_khusus'];
				$query_fix = $this->m_query->pengajuan_cuti_khusus_all($nik, $no)->result_array();
				foreach ($query_fix as $row_fix) {
					$nik_fix = $row_fix['nik'];
					$start = $row_fix['start_date'];
					$end = $row_fix['end_date'];
					$jenis = $row_fix['jenis'];
					$this->m_query->update_cuti_khusus_all($nik, $start, $end, $jenis);
				}
			}
		}

		redirect('admin');

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
		output_json($response);
	}

	function approve_hangus(){
		$query	= "
			SELECT 
				absensi_new.`tbl_karyawan_cuti_khusus`.`id_cuti_khusus`
				, absensi_new.`tbl_karyawan_cuti_khusus`.`tanggal_pengajuan`
				, absensi_new.`tbl_karyawan_cuti_khusus`.`tanggal_pengajuan` + INTERVAL 2 DAY AS tanggal_deadline
				, absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus`
				, absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus_2`
			FROM absensi_new.`tbl_karyawan_cuti_khusus`
			WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = 0";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$id_cuti_khusus=$row->id_cuti_khusus;
			$deadline=$row->tanggal_deadline;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_karyawan_cuti_khusus` SET absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = 3 WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`id_cuti_khusus` = $id_cuti_khusus";
				$this->db2->query($query);
				echo ($id_cuti_khusus);
			}
		}
	}

	private function looping_tanggal_update($starttime, $longtime, $nik, $data)
	{
		$end = date('Y-m-d', strtotime("+ ".$longtime." days", strtotime($starttime)));

		$minggu = checkSunday($starttime, $end);
		$finalend = date('Y-m-d', strtotime("+ $minggu days", strtotime($end)));
		$start = $starttime;

		$i = 1;
		$interval = selisihHari($start, $end);
		while (strtotime($start) < strtotime($finalend)) {
			$hari = date('l', strtotime($start));

			if ($interval > 3) {
				// $html .= "$i - $start ($hari)<br>";
				// simpan
				$tanggal = $start;
				$nik_baru = $nik;
				$where = array('shift_day'=>$tanggal, 'badgenumber'=>$nik_baru);
				$this->m_query->update_data('tarikan_absen_adms', $data, $where);
				// print_r($data);
			} else {
				if ($hari != 'Sunday') {
					// $html .= "$i - $start ($hari)<br>";
					// simpan
					$tanggal = $start;
					$nik_baru = $nik;
					$where = array('shift_day'=>$tanggal, 'badgenumber'=>$nik_baru);
					$this->m_query->update_data('tarikan_absen_adms', $data, $where);
					// print_r($data);
				}
			}
			
			$start = date("Y-m-d", strtotime("+1 days", strtotime($start)));
			$i++;
		}
	}
}