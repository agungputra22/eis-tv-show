<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin', 'm_app'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function tampil_atasan(){
		$dept_struktur=$this->input->post('dept_struktur');
		$query=$this->m_query->tampil_atasan($dept_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_perusahaan(){
		$perusahaan_struktur=$this->input->post('perusahaan_struktur');
		$query=$this->m_query->tampil_kode_perusahaan($perusahaan_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_lokasi(){
		$lokasi_struktur=$this->input->post('lokasi_struktur');
		$query=$this->m_query->tampil_kode_lokasi($lokasi_struktur);
		$result=$query->result();
		echo json_encode($result);
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
		
		$id = users('nik_baru');
		$where = users('nik_baru');
		$data['listdata'] = $this->m_query->getMaster_karyawan(array('ks.nik_baru'=>$where))->result_array();
		$data['title'] = "Biodata Karyawan (FRM.HRD.03)";
		$data['view_struktur'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('nik_baru'=>$id))->row_array();
		$data['view_induk'] = $this->m_query->select_row_data('*', 'tbl_karyawan_induk', array('nik_baru'=>$id))->row_array();
		$data['view_detail'] = $this->m_query->select_row_data('*', 'tbl_karyawan_detail', array('nik_baru'=>$id))->row_array();
		$data['view_suami_istri'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_anak'] = $this->m_query->select_row_data('*', 'tbl_karyawan_anak', array('nik_baru'=>$id))->result_array();
		$data['view_susunan_keluarga'] = $this->m_query->select_row_data('*', 'tbl_karyawan_susunan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_saudara'] = $this->m_query->select_row_data('*', 'tbl_karyawan_saudara', array('nik_baru'=>$id))->result_array();
		$data['view_darurat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_darurat', array('nik_baru'=>$id))->row_array();
		$data['view_pendidikan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pendidikan', array('nik_baru'=>$id))->row_array();
		$data['view_pelatihan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pelatihan', array('nik_baru'=>$id))->result_array();
		$data['view_bahasa'] = $this->m_query->select_row_data('*', 'tbl_karyawan_bahasa', array('nik_baru'=>$id))->result_array();
		$data['view_keahlian'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keahlian', array('nik_baru'=>$id))->row_array();
		$data['view_hobi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_hobi', array('nik_baru'=>$id))->row_array();
		$data['view_pengalaman_kerja'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_kerja', array('nik_baru'=>$id))->result_array();
		$data['view_pengalaman_organisasi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_organisasi', array('nik_baru'=>$id))->result_array();
		$data['view_minat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_minat', array('nik_baru'=>$id))->row_array();
		$this->load->view('admin/karyawan/index', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Karyawan";
		$data['invoice']=$this->m_admin->get_no_karyawan();
		$data['divisi'] = $this->m_admin->data_divisi()->result();
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['level_jabatan'] = $this->m_admin->data_level_jabatan()->result();
		$data['hobi'] = $this->m_admin->data_hobi()->result();
		$data['perusahaan'] = $this->m_admin->perusahaan()->result();
		$data['jabatan'] = $this->m_admin->data_jabatan()->result();
		$data['listdata'] = $this->m_query->select_row_data('*', 'tmp_pengalaman_kerja', null)->result_array();
		$this->load->view('admin/karyawan/tambah', $data);
	}

	public function edit($id)
	{
		$data['invoice']=$this->m_admin->get_no_karyawan();
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['level_jabatan'] = $this->m_admin->data_level_jabatan()->result();
		$data['hobi'] = $this->m_admin->data_hobi()->result();
		$data['perusahaan'] = $this->m_admin->perusahaan()->result();
		$data['jabatan'] = $this->m_admin->data_jabatan()->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();

		$data['title'] = "Edit Biodata Karyawan (".$id.")";
		$data['view_struktur'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('nik_baru'=>$id))->row_array();
		$data['view_induk'] = $this->m_query->select_row_data('*', 'tbl_karyawan_induk', array('nik_baru'=>$id))->row_array();
		$data['view_detail'] = $this->m_query->select_row_data('*', 'tbl_karyawan_detail', array('nik_baru'=>$id))->row_array();
		$data['view_suami_istri'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_anak'] = $this->m_query->select_row_data('*', 'tbl_karyawan_anak', array('nik_baru'=>$id))->result_array();
		$data['view_susunan_keluarga'] = $this->m_query->select_row_data('*', 'tbl_karyawan_susunan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_saudara'] = $this->m_query->select_row_data('*', 'tbl_karyawan_saudara', array('nik_baru'=>$id))->result_array();
		$data['view_darurat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_darurat', array('nik_baru'=>$id))->row_array();
		$data['view_pendidikan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pendidikan', array('nik_baru'=>$id))->row_array();
		$data['view_pelatihan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pelatihan', array('nik_baru'=>$id))->result_array();
		$data['view_bahasa'] = $this->m_query->select_row_data('*', 'tbl_karyawan_bahasa', array('nik_baru'=>$id))->result_array();
		$data['view_keahlian'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keahlian', array('nik_baru'=>$id))->row_array();
		$data['view_hobi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_hobi', array('nik_baru'=>$id))->row_array();
		$data['view_pengalaman_kerja'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_kerja', array('nik_baru'=>$id))->result_array();
		$data['view_pengalaman_organisasi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_organisasi', array('nik_baru'=>$id))->result_array();
		$data['view_minat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_minat', array('nik_baru'=>$id))->row_array();
		$this->load->view('admin/karyawan/edit', $data);
	}

	public function edit_detail()
	{
		$id = $this->session->userdata('nik_baru');
		$data['invoice']=$this->m_admin->get_no_karyawan();
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['level_jabatan'] = $this->m_admin->data_level_jabatan()->result();
		$data['hobi'] = $this->m_admin->data_hobi()->result();
		$data['perusahaan'] = $this->m_admin->perusahaan()->result();
		$data['jabatan'] = $this->m_admin->data_jabatan()->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();

		$data['title'] = "Edit Biodata Karyawan (".$id.")";
		$data['view_struktur'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('nik_baru'=>$id))->row_array();
		$data['view_induk'] = $this->m_query->select_row_data('*', 'tbl_karyawan_induk', array('nik_baru'=>$id))->row_array();
		$data['view_detail'] = $this->m_query->select_row_data('*', 'tbl_karyawan_detail', array('nik_baru'=>$id))->row_array();
		$data['view_suami_istri'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_anak'] = $this->m_query->select_row_data('*', 'tbl_karyawan_anak', array('nik_baru'=>$id))->result_array();
		$data['view_susunan_keluarga'] = $this->m_query->select_row_data('*', 'tbl_karyawan_susunan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_saudara'] = $this->m_query->select_row_data('*', 'tbl_karyawan_saudara', array('nik_baru'=>$id))->result_array();
		$data['view_darurat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_darurat', array('nik_baru'=>$id))->row_array();
		$data['view_pendidikan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pendidikan', array('nik_baru'=>$id))->row_array();
		$data['view_pelatihan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pelatihan', array('nik_baru'=>$id))->result_array();
		$data['view_bahasa'] = $this->m_query->select_row_data('*', 'tbl_karyawan_bahasa', array('nik_baru'=>$id))->result_array();
		$data['view_keahlian'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keahlian', array('nik_baru'=>$id))->row_array();
		$data['view_hobi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_hobi', array('nik_baru'=>$id))->row_array();
		$data['view_pengalaman_kerja'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_kerja', array('nik_baru'=>$id))->result_array();
		$data['view_pengalaman_organisasi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_organisasi', array('nik_baru'=>$id))->result_array();
		$data['view_minat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_minat', array('nik_baru'=>$id))->row_array();
		$this->load->view('admin/karyawan/edit_detail', $data);
	}

	public function detail($id)
	{
		$data['invoice']=$this->m_admin->get_no_karyawan();
		$data['divisi'] = $this->m_admin->data_divisi()->result();
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['level_jabatan'] = $this->m_admin->data_level_jabatan()->result();
		$data['hobi'] = $this->m_admin->data_hobi()->result();
		$data['perusahaan'] = $this->m_admin->perusahaan()->result();
		$data['jabatan'] = $this->m_admin->data_jabatan()->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();

		$data['title'] = "Detail Karyawan (".$id.")";
		$data['view_struktur'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('nik_baru'=>$id))->row_array();
		$data['view_induk'] = $this->m_query->select_row_data('*', 'tbl_karyawan_induk', array('nik_baru'=>$id))->row_array();
		$data['view_detail'] = $this->m_query->select_row_data('*', 'tbl_karyawan_detail', array('nik_baru'=>$id))->row_array();
		$data['view_suami_istri'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_anak'] = $this->m_query->select_row_data('*', 'tbl_karyawan_anak', array('nik_baru'=>$id))->result_array();
		$data['view_susunan_keluarga'] = $this->m_query->select_row_data('*', 'tbl_karyawan_susunan_keluarga', array('nik_baru'=>$id))->row_array();
		$data['view_saudara'] = $this->m_query->select_row_data('*', 'tbl_karyawan_saudara', array('nik_baru'=>$id))->result_array();
		$data['view_darurat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_darurat', array('nik_baru'=>$id))->row_array();
		$data['view_pendidikan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pendidikan', array('nik_baru'=>$id))->row_array();
		$data['view_pelatihan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pelatihan', array('nik_baru'=>$id))->result_array();
		$data['view_bahasa'] = $this->m_query->select_row_data('*', 'tbl_karyawan_bahasa', array('nik_baru'=>$id))->result_array();
		$data['view_keahlian'] = $this->m_query->select_row_data('*', 'tbl_karyawan_keahlian', array('nik_baru'=>$id))->row_array();
		$data['view_hobi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_hobi', array('nik_baru'=>$id))->row_array();
		$data['view_pengalaman_kerja'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_kerja', array('nik_baru'=>$id))->result_array();
		$data['view_pengalaman_organisasi'] = $this->m_query->select_row_data('*', 'tbl_karyawan_pengalaman_organisasi', array('nik_baru'=>$id))->result_array();
		$data['view_minat'] = $this->m_query->select_row_data('*', 'tbl_karyawan_minat', array('nik_baru'=>$id))->row_array();
		$this->load->view('admin/karyawan/detail', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Data Induk
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input['userid'] = $this->input->post('userid');
			$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			// $input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input['nik_lama'] = $this->input->post('nik_lama');
			$input['nama_lengkap'] = $this->input->post('nama_lengkap');
			$input['digit_ktp'] = $this->input->post('digit_ktp');
			$input['digit_npwp'] = $this->input->post('digit_npwp');
			$input['digit_bpjs_ket'] = $this->input->post('digit_bpjs_ket');
			$input['digit_bpjs_kes'] = $this->input->post('digit_bpjs_kes');
			$input['digit_bpjs_kes_suami_istri'] = $this->input->post('digit_bpjs_kes_suami_istri');
			$input['digit_bpjs_kes_anak_1'] = $this->input->post('digit_bpjs_kes_anak_1');
			$input['digit_bpjs_kes_anak_2'] = $this->input->post('digit_bpjs_kes_anak_2');
			$input['digit_bpjs_kes_anak_3'] = $this->input->post('digit_bpjs_kes_anak_3');
			$input['digit_kk'] = $this->input->post('digit_kk');
			$input['digit_rekening'] = $this->input->post('digit_rekening');

			//Upload KTP
			if (!empty($_FILES['no_ktp']['name'])) {
				# code...
				$path = 'ktp/';
				$name = 'no_ktp';
				$pecah = explode(".", $_FILES['no_ktp']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['no_ktp'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Foto Terbaru
			if (!empty($_FILES['foto_terbaru']['name'])) {
				# code...
				$path_foto = 'foto/';
				$name_foto = 'foto_terbaru';
				$pecah_foto = explode(".", $_FILES['foto_terbaru']['name']);
				$ext_foto = end($pecah_foto);
				$rename_foto = url_title(strtolower($input['nik_baru'])).'.'.$ext_foto;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_foto, $name_foto, $rename_foto);
				if ($upload == true) {
					# code...
					$input['foto'] = $rename_foto;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload NPWP
			if (!empty($_FILES['npwp']['name'])) {
				# code...
				$path_npwp = 'npwp/';
				$name_npwp = 'npwp';
				$pecah_npwp = explode(".", $_FILES['npwp']['name']);
				$ext_npwp = end($pecah_npwp);
				$rename_npwp = url_title(strtolower($input['nik_baru'])).'.'.$ext_npwp;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_npwp, $name_npwp, $rename_npwp);
				if ($upload == true) {
					# code...
					$input['npwp'] = $rename_npwp;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Ketenagakerjaan
			if (!empty($_FILES['no_bpjs_ket']['name'])) {
				# code...
				$path_bpjs_ket = 'bpjs_ket/';
				$name_bpjs_ket = 'no_bpjs_ket';
				$pecah_bpjs_ket = explode(".", $_FILES['no_bpjs_ket']['name']);
				$ext_bpjs_ket = end($pecah_bpjs_ket);
				$rename_bpjs_ket = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_ket;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_ket, $name_bpjs_ket, $rename_bpjs_ket);
				if ($upload == true) {
					# code...
					$input['no_bpjs_ket'] = $rename_bpjs_ket;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Kesehatan Peserta
			if (!empty($_FILES['no_bpjs_kes']['name'])) {
				# code...
				$path_bpjs_kes = 'bpjs_kes/';
				$name_bpjs_kes = 'no_bpjs_kes';
				$pecah_bpjs_kes = explode(".", $_FILES['no_bpjs_kes']['name']);
				$ext_bpjs_kes = end($pecah_bpjs_kes);
				$rename_bpjs_kes = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_kes;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_kes, $name_bpjs_kes, $rename_bpjs_kes);
				if ($upload == true) {
					# code...
					$input['no_bpjs_kes'] = $rename_bpjs_kes;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Kesehatan Suami / Istri
			if (!empty($_FILES['no_bpjs_kes_suami_istri']['name'])) {
				# code...
				$path_bpjs_kes_suami_istri = 'bpjs_kes_suami_istri/';
				$name_bpjs_kes_suami_istri = 'no_bpjs_kes_suami_istri';
				$pecah_bpjs_kes_suami_istri = explode(".", $_FILES['no_bpjs_kes_suami_istri']['name']);
				$ext_bpjs_kes_suami_istri = end($pecah_bpjs_kes_suami_istri);
				$rename_bpjs_kes_suami_istri = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_kes_suami_istri;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_kes_suami_istri, $name_bpjs_kes_suami_istri, $rename_bpjs_kes_suami_istri);
				if ($upload == true) {
					# code...
					$input['no_bpjs_kes_suami_istri'] = $rename_bpjs_kes_suami_istri;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Kesehatan Anak 1
			if (!empty($_FILES['no_bpjs_kes_anak_1']['name'])) {
				# code...
				$path_bpjs_kes_anak_1 = 'bpjs_kes_anak_1/';
				$name_bpjs_kes_anak_1 = 'no_bpjs_kes_anak_1';
				$pecah_bpjs_kes_anak_1 = explode(".", $_FILES['no_bpjs_kes_anak_1']['name']);
				$ext_bpjs_kes_anak_1 = end($pecah_bpjs_kes_anak_1);
				$rename_bpjs_kes_anak_1 = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_kes_anak_1;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_kes_anak_1, $name_bpjs_kes_anak_1, $rename_bpjs_kes_anak_1);
				if ($upload == true) {
					# code...
					$input['no_bpjs_kes_anak_1'] = $rename_bpjs_kes_anak_1;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Kesehatan Anak 2
			if (!empty($_FILES['no_bpjs_kes_anak_2']['name'])) {
				# code...
				$path_bpjs_kes_anak_2 = 'bpjs_kes_anak_2/';
				$name_bpjs_kes_anak_2 = 'no_bpjs_kes_anak_2';
				$pecah_bpjs_kes_anak_2 = explode(".", $_FILES['no_bpjs_kes_anak_2']['name']);
				$ext_bpjs_kes_anak_2 = end($pecah_bpjs_kes_anak_2);
				$rename_bpjs_kes_anak_2 = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_kes_anak_2;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_kes_anak_2, $name_bpjs_kes_anak_2, $rename_bpjs_kes_anak_2);
				if ($upload == true) {
					# code...
					$input['no_bpjs_kes_anak_2'] = $rename_bpjs_kes_anak_2;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload BPJS Kesehatan Anak 3
			if (!empty($_FILES['no_bpjs_kes_anak_3']['name'])) {
				# code...
				$path_bpjs_kes_anak_3 = 'bpjs_kes_anak_3/';
				$name_bpjs_kes_anak_3 = 'no_bpjs_kes_anak_3';
				$pecah_bpjs_kes_anak_3 = explode(".", $_FILES['no_bpjs_kes_anak_3']['name']);
				$ext_bpjs_kes_anak_3 = end($pecah_bpjs_kes_anak_3);
				$rename_bpjs_kes_anak_3 = url_title(strtolower($input['nik_baru'])).'.'.$ext_bpjs_kes_anak_3;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_bpjs_kes_anak_3, $name_bpjs_kes_anak_3, $rename_bpjs_kes_anak_3);
				if ($upload == true) {
					# code...
					$input['no_bpjs_kes_anak_3'] = $rename_bpjs_kes_anak_3;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Kartu Keluarga
			if (!empty($_FILES['no_kk']['name'])) {
				# code...
				$path_kk = 'kartu_keluarga/';
				$name_kk = 'no_kk';
				$pecah_kk = explode(".", $_FILES['no_kk']['name']);
				$ext_kk = end($pecah_kk);
				$rename_kk = url_title(strtolower($input['nik_baru'])).'.'.$ext_kk;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_kk, $name_kk, $rename_kk);
				if ($upload == true) {
					# code...
					$input['no_kk'] = $rename_kk;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			//Upload Rekening
			if (!empty($_FILES['no_rekening']['name'])) {
				# code...
				$path = 'rekening/';
				$name = 'no_rekening';
				$pecah = explode(".", $_FILES['no_rekening']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['no_rekening'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Asuransi Swasta
			if (!empty($_FILES['no_asuransi']['name'])) {
				# code...
				$path_asuransi = 'asuransi_swasta/';
				$name_asuransi = 'no_asuransi';
				$pecah_asuransi = explode(".", $_FILES['no_asuransi']['name']);
				$ext_asuransi = end($pecah_asuransi);
				$rename_asuransi = url_title(strtolower($input['nik_baru'])).'.'.$ext_asuransi;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_asuransi, $name_asuransi, $rename_asuransi);
				if ($upload == true) {
					# code...
					$input['no_asuransi'] = $rename_asuransi;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim C
			if (!empty($_FILES['sim']['name'])) {
				# code...
				$path_sim_c = 'sim_c/';
				$name_sim_c = 'sim';
				$pecah_sim_c = explode(".", $_FILES['sim']['name']);
				$ext_sim_c = end($pecah_sim_c);
				$rename_sim_c = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_c;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_c, $name_sim_c, $rename_sim_c);
				if ($upload == true) {
					# code...
					$input['sim'] = $rename_sim_c;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim A
			if (!empty($_FILES['sim_a']['name'])) {
				# code...
				$path_sim_a = 'sim_a/';
				$name_sim_a = 'sim_a';
				$pecah_sim_a = explode(".", $_FILES['sim_a']['name']);
				$ext_sim_a = end($pecah_sim_a);
				$rename_sim_a = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_a;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_a, $name_sim_a, $rename_sim_a);
				if ($upload == true) {
					# code...
					$input['sim_a'] = $rename_sim_a;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim B
			if (!empty($_FILES['sim_b']['name'])) {
				# code...
				$path_sim_b = 'sim_b/';
				$name_sim_b = 'sim_b';
				$pecah_sim_b = explode(".", $_FILES['sim_b']['name']);
				$ext_sim_b = end($pecah_sim_b);
				$rename_sim_b = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_b;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_b, $name_sim_b, $rename_sim_b);
				if ($upload == true) {
					# code...
					$input['sim_b'] = $rename_sim_b;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim B1
			if (!empty($_FILES['sim_b1']['name'])) {

				// $get = $this->m_app->getData('asa')->row();
				// $namafile = $get->field;
				// @unlink('./uploads/aska/asa'.$namafile);
				# code...
				$path_sim_b1 = 'sim_b1/';
				$name_sim_b1 = 'sim_b1';
				$pecah_sim_b1 = explode(".", $_FILES['sim_b1']['name']);
				$ext_sim_b1 = end($pecah_sim_b1);
				$rename_sim_b1 = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_b1;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_b1, $name_sim_b1, $rename_sim_b1);
				if ($upload == true) {
					# code...
					$input['sim_b1'] = $rename_sim_b1;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim B1 Umum
			if (!empty($_FILES['sim_b1_umum']['name'])) {
				# code...
				$path_sim_b1_umum = 'sim_b1_umum/';
				$name_sim_b1_umum = 'sim_b1_umum';
				$pecah_sim_b1_umum = explode(".", $_FILES['sim_b1_umum']['name']);
				$ext_sim_b1_umum = end($pecah_sim_b1_umum);
				$rename_sim_b1_umum = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_b1_umum;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_b1_umum, $name_sim_b1_umum, $rename_sim_b1_umum);
				if ($upload == true) {
					# code...
					$input['sim_b1_umum'] = $rename_sim_b1_umum;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim B2
			if (!empty($_FILES['sim_b2']['name'])) {
				# code...
				$path_sim_b2 = 'sim_b2/';
				$name_sim_b2 = 'sim_b2';
				$pecah_sim_b2 = explode(".", $_FILES['sim_b2']['name']);
				$ext_sim_b2 = end($pecah_sim_b2);
				$rename_sim_b2 = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_b2;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_b2, $name_sim_b2, $rename_sim_b2);
				if ($upload == true) {
					# code...
					$input['sim_b2'] = $rename_sim_b2;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim B2 Umum
			if (!empty($_FILES['sim_b2_umum']['name'])) {
				# code...
				$path_sim_b2_umum = 'sim_b2_umum/';
				$name_sim_b2_umum = 'sim_b2_umum';
				$pecah_sim_b2_umum = explode(".", $_FILES['sim_b2_umum']['name']);
				$ext_sim_b2_umum = end($pecah_sim_b2_umum);
				$rename_sim_b2_umum = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_b2_umum;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_b2_umum, $name_sim_b2_umum, $rename_sim_b2_umum);
				if ($upload == true) {
					# code...
					$input['sim_b2_umum'] = $rename_sim_b2_umum;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			// Upload Sim SIO
			if (!empty($_FILES['sim_sio']['name'])) {
				# code...
				$path_sim_sio = 'sim_sio/';
				$name_sim_sio = 'sim_sio';
				$pecah_sim_sio = explode(".", $_FILES['sim_sio']['name']);
				$ext_sim_sio = end($pecah_sim_sio);
				$rename_sim_sio = url_title(strtolower($input['nik_baru'])).'.'.$ext_sim_sio;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah($path_sim_sio, $name_sim_sio, $rename_sim_sio);
				if ($upload == true) {
					# code...
					$input['sim_sio'] = $rename_sim_sio;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}
			$save 		= $this->m_query->insert_data('tbl_karyawan_induk', $input);

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

	public function doInput_detail()
	{
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Data Detail
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input2['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input2['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$input2['tempat_lahir'] = $this->input->post('tempat_lahir');
			$input2['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$input2['status_pernikahan'] = $this->input->post('status_pernikahan');
			$input2['gol_darah'] = $this->input->post('gol_darah');
			$input2['agama'] = $this->input->post('agama');
			$input2['suku'] = $this->input->post('suku');
			$input2['tinggi_badan'] = $this->input->post('tinggi_badan');
			$input2['berat_badan'] = $this->input->post('berat_badan');
			$input2['kewarganegaraan'] = $this->input->post('kewarganegaraan');
			$input2['alamat_ktp'] = $this->input->post('alamat_ktp');
			$input2['no_telp'] = $this->input->post('no_telp');
			$input2['no_hp'] = $this->input->post('no_hp');
			$input2['email'] = $this->input->post('email');
			$input2['alamat_domisili'] = $this->input->post('alamat_domisili');
			$save2 		= $this->m_query->insert_data('tbl_karyawan_detail', $input2);

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

	public function doInput_keluarga()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			//Insert Suami / Istri
			$input3['id_keluarga'] = $this->input->post('id_keluarga');
			$nik_lokasi3 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan3 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis3 = $this->input->post('hasil_no_nik');
			$nik_mutasi3 = $this->input->post('hasil_mutasi_nik');
			$input3['nik_baru'] = $nik_lokasi3.$nik_perusahaan3.$nik_baru_otomatis3.$nik_mutasi3;
			$input3['nama_keluarga'] = $this->input->post('nama_keluarga');
			$input3['no_ktp_keluarga'] = $this->input->post('no_ktp_keluarga');
			$input3['tanggal_lahir_keluarga'] = $this->input->post('tanggal_lahir_keluarga');
			$input3['tempat_lahir_keluarga'] = $this->input->post('tempat_lahir_keluarga');
			$input3['gol_darah_keluarga'] = $this->input->post('gol_darah_keluarga');
			$input3['agama_keluarga'] = $this->input->post('agama_keluarga');
			$input3['suku_keluarga'] = $this->input->post('suku_keluarga');
			$input3['kewarganegaraan_keluarga'] = $this->input->post('kewarganegaraan_keluarga');
			$input3['pendidikan_keluarga'] = $this->input->post('pendidikan_keluarga');
			$save3 		= $this->m_query->insert_data('tbl_karyawan_keluarga', $input3);

			// Insert Anak
			$nik_lokasi4 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan4 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis4 = $this->input->post('hasil_no_nik');
			$nik_mutasi4 = $this->input->post('hasil_mutasi_nik');
			$nik_baru4 = $nik_lokasi4.$nik_perusahaan4.$nik_baru_otomatis4.$nik_mutasi4;

			$urutan_anak = $this->input->post('urutan_anak');
			$nama_anak = $this->input->post('nama_anak');
			$no_ktp_anak = $this->input->post('no_ktp_anak');
			$tanggal_lahir_anak = $this->input->post('tanggal_lahir_anak');
			$tempat_lahir_anak = $this->input->post('tempat_lahir_anak');
			$gol_darah_anak = $this->input->post('gol_darah_anak');
			$agama_anak = $this->input->post('agama_anak');
			$suku_anak = $this->input->post('suku_anak');
			$kewarganegaraan_anak = $this->input->post('kewarganegaraan_anak');
			$pendidikan_anak = $this->input->post('pendidikan_anak');

			for ($i=0; $i < count($nama_anak); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru4;
				$input['urutan_anak'] = $urutan_anak[$i];
				$input['nama_anak'] = $nama_anak[$i];
				$input['no_ktp_anak'] = $no_ktp_anak[$i];
				$input['tanggal_lahir_anak'] = $tanggal_lahir_anak[$i];
				$input['tempat_lahir_anak'] = $tempat_lahir_anak[$i];
				$input['gol_darah_anak'] = $gol_darah_anak[$i];
				$input['agama_anak'] = $agama_anak[$i];
				$input['suku_anak'] = $suku_anak[$i];
				$input['kewarganegaraan_anak'] = $kewarganegaraan_anak[$i];
				$input['pendidikan_anak'] = $pendidikan_anak[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_anak', $input);
				
			}

			// Insert Susunan Keluarga
			$input5['id_susunan'] = $this->input->post('id_susunan');
			$nik_lokasi5 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan5 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis5 = $this->input->post('hasil_no_nik');
			$nik_mutasi5 = $this->input->post('hasil_mutasi_nik');
			$input5['nik_baru'] = $nik_lokasi5.$nik_perusahaan5.$nik_baru_otomatis5.$nik_mutasi5;
			$input5['nama_ayah'] = $this->input->post('nama_ayah');
			$input5['tanggal_lahir_ayah'] = $this->input->post('tanggal_lahir_ayah');
			$input5['jenis_kelamin_ayah'] = $this->input->post('jenis_kelamin_ayah');
			$input5['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');
			$input5['pendidikan_ayah'] = $this->input->post('pendidikan_ayah');
			$input5['nama_ibu'] = $this->input->post('nama_ibu');
			$input5['tanggal_lahir_ibu'] = $this->input->post('tanggal_lahir_ibu');
			$input5['jenis_kelamin_ibu'] = $this->input->post('jenis_kelamin_ibu');
			$input5['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');
			$input5['pendidikan_ibu'] = $this->input->post('pendidikan_ibu');
			$save5		= $this->m_query->insert_data('tbl_karyawan_susunan_keluarga', $input5);

			// Insert Saudara
			$nik_lokasi6 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan6 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis6 = $this->input->post('hasil_no_nik');
			$nik_mutasi6 = $this->input->post('hasil_mutasi_nik');
			$nik_baru3 = $nik_lokasi6.$nik_perusahaan6.$nik_baru_otomatis6.$nik_mutasi6;

			$urutan_saudara4 = $this->input->post('urutan_saudara');
			$nama_saudara4 = $this->input->post('nama_saudara');
			$tanggal_lahir_saudara4 = $this->input->post('tanggal_lahir_saudara');
			$jenis_kelamin_saudara4 = $this->input->post('jenis_kelamin_saudara');
			$pekerjaan_saudara4 = $this->input->post('pekerjaan_saudara');
			$pendidikan_saudara4 = $this->input->post('pendidikan_saudara');

			for ($i=0; $i < count($nama_saudara4); $i++) { 
				# code...
				$input4['nik_baru'] = $nik_baru3;
				$input4['urutan_saudara'] = $urutan_saudara4[$i];
				$input4['nama_saudara'] = $nama_saudara4[$i];
				$input4['tanggal_lahir_saudara'] = $tanggal_lahir_saudara4[$i];
				$input4['jenis_kelamin_saudara'] = $jenis_kelamin_saudara4[$i];
				$input4['pekerjaan_saudara'] = $pekerjaan_saudara4[$i];
				$input4['pendidikan_saudara'] = $pendidikan_saudara4[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_saudara', $input4);
				
			}

			// Insert Kontak Darurat
			$input6['id_darurat'] = $this->input->post('id_darurat');
			$nik_lokasi7 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan7 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis7 = $this->input->post('hasil_no_nik');
			$nik_mutasi7 = $this->input->post('hasil_mutasi_nik');
			$input6['nik_baru'] = $nik_lokasi7.$nik_perusahaan7.$nik_baru_otomatis7.$nik_mutasi7;
			$input6['nama_darurat'] = $this->input->post('nama_darurat');
			$input6['no_hp_darurat'] = $this->input->post('no_hp_darurat');
			$input6['alamat_darurat'] = $this->input->post('alamat_darurat');
			$save6 		= $this->m_query->insert_data('tbl_karyawan_darurat', $input6);

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

	public function doInput_pendidikan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			//Insert Pendidikan
			$input7['id_pendidikan'] = $this->input->post('id_pendidikan');
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input7['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input7['status_sd'] = $this->input->post('status_sd');
			$input7['nama_sd'] = $this->input->post('nama_sd');
			$input7['tahun_sd'] = $this->input->post('tahun_sd');
			$input7['ket_sd'] = $this->input->post('ket_sd');
			$input7['nilai_sd'] = $this->input->post('nilai_sd');
			$input7['status_smp'] = $this->input->post('status_smp');
			$input7['nama_smp'] = $this->input->post('nama_smp');
			$input7['tahun_smp'] = $this->input->post('tahun_smp');
			$input7['ket_smp'] = $this->input->post('ket_smp');
			$input7['nilai_smp'] = $this->input->post('nilai_smp');
			$input7['status_smk'] = $this->input->post('status_smk');
			$input7['nama_smk'] = $this->input->post('nama_smk');
			$input7['jurusan_smk'] = $this->input->post('jurusan_smk');
			$input7['tahun_smk'] = $this->input->post('tahun_smk');
			$input7['ket_smk'] = $this->input->post('ket_smk');
			$input7['nilai_smk'] = $this->input->post('nilai_smk');
			$input7['nama_st'] = $this->input->post('nama_st');
			$input7['jurusan_st'] = $this->input->post('jurusan_st');
			$input7['tahun_st'] = $this->input->post('tahun_st');
			$input7['ket_st'] = $this->input->post('ket_st');
			$input7['ipk_st'] = $this->input->post('ipk_st');
			$input7['tingkat_st'] = $this->input->post('tingkat_st');
			$input7['nama_s1'] = $this->input->post('nama_s1');
			$input7['jurusan_s1'] = $this->input->post('jurusan_s1');
			$input7['tahun_s1'] = $this->input->post('tahun_s1');
			$input7['ket_s1'] = $this->input->post('ket_s1');
			$input7['ipk_s1'] = $this->input->post('ipk_s1');
			$input7['tingkat_s1'] = $this->input->post('tingkat_s1');
			$input7['nama_s2'] = $this->input->post('nama_s2');
			$input7['jurusan_s2'] = $this->input->post('jurusan_s2');
			$input7['tahun_s2'] = $this->input->post('tahun_s2');
			$input7['ket_s2'] = $this->input->post('ket_s2');
			$input7['ipk_s2'] = $this->input->post('ipk_s2');
			$input7['tingkat_s2'] = $this->input->post('tingkat_s2');
			$input7['nama_s3'] = $this->input->post('nama_s3');
			$input7['jurusan_s3'] = $this->input->post('jurusan_s3');
			$input7['tahun_s3'] = $this->input->post('tahun_s3');
			$input7['ket_s3'] = $this->input->post('ket_s3');
			$input7['ipk_s3'] = $this->input->post('ipk_s3');
			$input7['tingkat_s3'] = $this->input->post('tingkat_s3');
			$save7		= $this->m_query->insert_data('tbl_karyawan_pendidikan', $input7);
			
			if($save7) {
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

	public function doInput_pelatihan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pelatihan
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$nama_pelatihan_lembaga = $this->input->post('nama_pelatihan_lembaga');
			$judul_pelatihan = $this->input->post('judul_pelatihan');
			$tahun_pelatihan = $this->input->post('tahun_pelatihan');
			$tempat_pelatihan = $this->input->post('tempat_pelatihan');
			$ket_pelatihan = $this->input->post('ket_pelatihan');

			for ($i=0; $i < count($nama_pelatihan_lembaga); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['nama_pelatihan_lembaga'] = $nama_pelatihan_lembaga[$i];
				$input['judul_pelatihan'] = $judul_pelatihan[$i];
				$input['tahun_pelatihan'] = $tahun_pelatihan[$i];
				$input['tempat_pelatihan'] = $tempat_pelatihan[$i];
				$input['ket_pelatihan'] = $ket_pelatihan[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_pelatihan', $input);
				
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

	public function doInput_bahasa()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()==TRUE) {

			// Insert Bahasa
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$nama_bahasa  = $this->input->post('nama_bahasa');
			$lisan = $this->input->post('lisan');
			$tulisan  = $this->input->post('tulisan');
			$baca = $this->input->post('baca');

			for ($i=0; $i < count($nama_bahasa); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['nama_bahasa'] = $nama_bahasa[$i];
				$input['lisan'] = $lisan[$i];
				$input['tulisan'] = $tulisan[$i];
				$input['baca'] = $baca[$i];

				$save9 		= $this->m_query->insert_data('tbl_karyawan_bahasa', $input);
				
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

	public function doInput_keahlian()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Keahlian
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input['id_keahlian'] = $this->input->post('id_keahlian');
			$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input10['deskripsi'] = $this->input->post('deskripsi');
			$save10		= $this->m_query->insert_data('tbl_karyawan_keahlian', $input10);
			
			if($save10) {
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

	public function doInput_hobi()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Hobi
			$input11['id_hobi'] = $this->input->post('id_hobi');
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input11['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input11['nama_hobi'] = $this->input->post('nama_hobi');
			$input11['ket_hobi'] = $this->input->post('ket_hobi');
			$input11['nama_hobi_2'] = $this->input->post('nama_hobi_2');
			$input11['ket_hobi_2'] = $this->input->post('ket_hobi_2');
			$input11['nama_hobi_3'] = $this->input->post('nama_hobi_3');
			$input11['ket_hobi_3'] = $this->input->post('ket_hobi_3');
			$save11		= $this->m_query->insert_data('tbl_karyawan_hobi', $input11);
			
			if($save11) {
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

	public function doInput_pengalaman_kerja()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pengalaman Kerja
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input12['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input12['nama_perusahaan'] = $this->input->post('nama_perusahaan');
			$input12['jabatan_awal'] = $this->input->post('jabatan_awal');
			$input12['jabatan_awal_start'] = $this->input->post('jabatan_awal_start');
			$input12['jabatan_awal_end'] = $this->input->post('jabatan_awal_end');
			$input12['jabatan_akhir'] = $this->input->post('jabatan_akhir');
			$input12['jabatan_akhir_start'] = $this->input->post('jabatan_akhir_start');
			$input12['jabatan_akhir_end'] = $this->input->post('jabatan_akhir_end');
			$input12['tahun_keluar'] = $this->input->post('tahun_keluar');
			$input12['alasan_keluar'] = $this->input->post('alasan_keluar');
			$input12['gaji_terakhir'] = $this->input->post('gaji_terakhir');
			$input12['no_telp_perusahaan'] = $this->input->post('no_telp_perusahaan');
			$input12['nama_atasan'] = $this->input->post('nama_atasan');
			$input12['nama_referensi'] = $this->input->post('nama_referensi');
			$input12['no_kontak_referensi'] = $this->input->post('no_kontak_referensi');

			// Upload upload_paklaring
			if (!empty($_FILES['upload_paklaring']['name'])) {
				# code...
				$path = 'upload_dokumen/upload_paklaring_sementara/';
				$name = 'upload_paklaring';
				$pecah = explode(".", $_FILES['upload_paklaring']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input12['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input12['upload_paklaring'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

				} else {
					$response = [
						'message'	=> 'Data gagal disimpan foto',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			$save12		= $this->m_query->insert_data('tmp_pengalaman_kerja', $input12);
			
			if($save12) {
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

	public function doInput_pengalaman_kerja_all()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			$save12		= $this->m_admin->pindah_pengalaman_kerja();
			
			if($save12) {
				$this->m_admin->hapus_pengalaman_kerja();
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

	public function doInput_organisasi()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pengalaman Organisasi
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$nama_organisasi = $this->input->post('nama_organisasi');
			$jabatan_awal_organisasi = $this->input->post('jabatan_awal_organisasi');
			$jabatan_akhir_organisasi = $this->input->post('jabatan_akhir_organisasi');
			$tahun_masuk_organisasi = $this->input->post('tahun_masuk_organisasi');
			$tahun_keluar_organisasi = $this->input->post('tahun_keluar_organisasi');
			$deskripsi_organisasi = $this->input->post('deskripsi_organisasi');

			for ($i=0; $i < count($nama_organisasi); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['nama_organisasi'] = $nama_organisasi[$i];
				$input['jabatan_awal_organisasi'] = $jabatan_awal_organisasi[$i];
				$input['jabatan_akhir_organisasi'] = $jabatan_akhir_organisasi[$i];
				$input['tahun_masuk_organisasi'] = $tahun_masuk_organisasi[$i];
				$input['tahun_keluar_organisasi'] = $tahun_keluar_organisasi[$i];
				$input['deskripsi_organisasi'] = $deskripsi_organisasi[$i];

				$save9 		= $this->m_query->insert_data('tbl_karyawan_pengalaman_organisasi', $input);
				
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

	public function doInput_minat()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Minat
			$input14['id_minat'] = $this->input->post('id_minat');
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input14['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input14['minat_1'] = $this->input->post('minat_1');
			$input14['minat_2'] = $this->input->post('minat_2');
			$input14['minat_3'] = $this->input->post('minat_3');
			$save14		= $this->m_query->insert_data('tbl_karyawan_minat', $input14);
			
			if($save14) {
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

	public function doInput_struktur()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Struktur
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input15['id_struktur'] = $this->input->post('id_struktur');
			$input15['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input15['nama_karyawan_struktur'] = $this->input->post('nama_karyawan_struktur');
			$input15['jabatan_struktur'] = $this->input->post('jabatan_struktur');
			$input15['lokasi_struktur'] = $this->input->post('lokasi_struktur');
			$input15['perusahaan_struktur'] = $this->input->post('perusahaan_struktur');
			$input15['level_struktur'] = $this->input->post('level_struktur');
			$input15['dept_struktur'] = $this->input->post('dept_struktur');
			$input15['join_date_struktur'] = $this->input->post('join_date_struktur');
			$input15['jam_kerja'] = $this->input->post('jam_kerja');
			$input15['start_date_struktur'] = $this->input->post('start_date_struktur');
			$input15['masa_kerja_struktur'] = $this->input->post('masa_kerja_struktur');
			$input15['status_karyawan_struktur'] = $this->input->post('status_karyawan_struktur');
			$input15['nama_atasan_struktur'] = $this->input->post('nama_atasan_struktur');
			$save15		= $this->m_query->insert_data('tbl_karyawan_struktur', $input15);

			$nik_lokasi2 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan2 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis2 = $this->input->post('hasil_no_nik');
			$nik_mutasi2 = $this->input->post('hasil_mutasi_nik');
			$input16['id_historical'] = $this->input->post('id_historical');
			$input16['nik_baru'] = $nik_lokasi2.$nik_perusahaan2.$nik_baru_otomatis2.$nik_mutasi2;
			$input16['nama_karyawan_historical'] = $this->input->post('nama_karyawan_struktur');
			$input16['jabatan_historical'] = $this->input->post('jabatan_struktur');
			$input16['status_karyawan_pkwt'] = $this->input->post('status_karyawan_struktur');
			$input16['karyawan_status'] = "Aktif";
			$input16['start_pkwt_1'] = $this->input->post('start_date_struktur');

			$end_pkwt = $this->input->post('start_date_struktur');
			$masa_kerja = $this->input->post('masa_kerja_struktur');
			$date_pkwt = date($end_pkwt);
			$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +$masa_kerja days");
			$date_pkwt = date("Y-m-d",$date_pkwt);
			$input16['end_pkwt_1'] = $date_pkwt;

			$input16['masa_kerja_2'] = $masa_kerja;

			$end_pkwt = $this->input->post('start_date_struktur');
			$masa_kerja = $this->input->post('masa_kerja_struktur');
			$date_pkwt = date($end_pkwt);
			$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +$masa_kerja days". " +1 days");
			$date_pkwt = date("Y-m-d",$date_pkwt);
			$input16['start_pkwt_2'] = $date_pkwt;

			$input16['status_dokumen_pkwt_1'] = "0";

			$save16		= $this->m_query->insert_data('tbl_karyawan_historical', $input16);

			// $nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			// $nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			// $nik_baru_otomatis = $this->input->post('hasil_no_nik');
			// $nik_mutasi = $this->input->post('hasil_mutasi_nik');
			// $input17['badgenumber'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			// $input17['name'] = $this->input->post('nama_karyawan_struktur');
			// $input17['defaultdeptid'] = "1";
			// $input17['SN'] = "AEYU182460575";
			// $input17['Privilege'] = "0";
			// $input17['AccGroup'] = "1";
			// $input17['RegisterOT'] = "1";
			// $input17['UTime'] = date('Y-m-d h:i:s');

			// $save17		= $this->m_app->insert_data_3('userinfo', $input17);

			// $input18['SN'] = "AEYU182460575";
			// $input18['admin'] = "0";
			// $input18['OP'] = "4";
			// $input18['OPTime'] = date('Y-m-d h:i:s');
			// $input18['Object'] = "5";
			// $input18['Param1'] = "0";
			// $input18['Param2'] = "0";
			// $input18['Param3'] = "0";

			// $save18		= $this->m_app->insert_data_3('iclock_oplog', $input18);

			// $nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			// $nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			// $nik_baru_otomatis = $this->input->post('hasil_no_nik');
			// $nik_mutasi = $this->input->post('hasil_mutasi_nik');
			// $nik = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			// $nama = $this->input->post('nama_karyawan_struktur');
			// $input19['time'] = date('Y-m-d h:i:s');
			// $input19['User_id'] = "1";
			// $input19['model'] = "employee";
			// $input19['action'] = "Create";
			// $input19['object'] = $nik. ' ' .$nama;
			// $input19['count'] = "1";

			// $save19		= $this->m_app->insert_data_3('iclock_adminlog', $input19);

			// $input20['SN_id'] = "AEYU182460575";
			// $input20['OP'] = "USERDATA";
			// $input20['Object'] = "None";
			// $input20['Cnt'] = "1";
			// $input20['ECnt'] = "0";
			// $input20['OpTime'] = date('Y-m-d h:i:s');

			// $save20		= $this->m_app->insert_data_3('devlog', $input20);

			// $input21['SN_id'] = "AEYU182460575";
			// $input21['CmdContent'] = "DATA USER PIN=".$nik."NAME=".$nama."Pri=2Grp=1";
			// $input21['CmdCommitTime'] = date('Y-m-d h:i:s');
			// $input21['CmdTransTime'] = date('Y-m-d h:i:s');
			// $input21['CmdOverTime'] = date('Y-m-d h:i:s');
			// $input21['CmdReturn'] = "0";

			// $save21		= $this->m_app->insert_data_3('devcmds', $input21);
			
			if($save15) {
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

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			// Insert Data Induk
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('userid');
			$no_urut = $this->input->post('no_urut');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input['nik_lama'] = $this->input->post('nik_lama');
			$input['nama_lengkap'] = $this->input->post('nama_lengkap');
			$input['digit_ktp'] = $this->input->post('digit_ktp');
			$input['digit_npwp'] = $this->input->post('digit_npwp');
			$input['digit_bpjs_ket'] = $this->input->post('digit_bpjs_ket');
			$input['digit_bpjs_kes'] = $this->input->post('digit_bpjs_kes');
			$input['digit_bpjs_kes_suami_istri'] = $this->input->post('digit_bpjs_kes_suami_istri');
			$input['digit_bpjs_kes_anak_1'] = $this->input->post('digit_bpjs_kes_anak_1');
			$input['digit_bpjs_kes_anak_2'] = $this->input->post('digit_bpjs_kes_anak_2');
			$input['digit_bpjs_kes_anak_3'] = $this->input->post('digit_bpjs_kes_anak_3');
			$input['digit_kk'] = $this->input->post('digit_kk');

			$bpjs_ket = $this->input->post('digit_bpjs_ket');
			if ($bpjs_ket != '' || $bpjs_ket == '-' || $bpjs_ket == '0') {
				$query_bpjs = $this->m_query->select_row_data('*', 'tbl_karyawan_bpjs', array('no_urut'=>$no_urut))->num_rows();
				if ($query_bpjs>0) {
					$input2['status_tk'] = '3';
					$input2['no_tk'] = $this->input->post('digit_bpjs_ket');
					$where2 = array('no_urut'=>$no_urut);

					$this->m_query->update_data('tbl_karyawan_bpjs', $input2, $where2);
				} else {
					$input2['no_urut'] = $no_urut;
					$input2['nik'] = $nik_baru;
					$input2['status_kes'] = '';
					$input2['no_kes'] = '';
					$input2['tanggal_kes'] = '0000-00-00';
					$input2['ket_kes'] = '';
					$input2['status_tk'] = '3';
					$input2['no_tk'] = $this->input->post('digit_bpjs_ket');
					$input2['tanggal_tk'] = '0000-00-00';
					$input2['ket_tk'] = '';

					$this->m_query->insert_data('tbl_karyawan_bpjs', $input2);
				}
			}

			$bpjs_kes = $this->input->post('digit_bpjs_kes');
			if ($bpjs_kes != '' || $bpjs_kes == '-' || $bpjs_kes == '0') {
				$query_bpjs = $this->m_query->select_row_data('*', 'tbl_karyawan_bpjs', array('no_urut'=>$no_urut))->num_rows();
				if ($query_bpjs>0) {
					$input3['status_kes'] = '3';
					$input3['no_kes'] = $this->input->post('digit_bpjs_kes');
					$where3 = array('no_urut'=>$no_urut);

					$this->m_query->update_data('tbl_karyawan_bpjs', $input3, $where3);
				} else {
					$input3['no_urut'] = $no_urut;
					$input3['nik'] = $nik_baru;
					$input3['status_kes'] = '3';
					$input3['no_kes'] = $this->input->post('digit_bpjs_kes');
					$input3['tanggal_kes'] = '0000-00-00';
					$input3['ket_kes'] = '';
					$input3['status_tk'] = '';
					$input3['no_tk'] = '';
					$input3['tanggal_tk'] = '0000-00-00';
					$input3['ket_tk'] = '';

					$this->m_query->insert_data('tbl_karyawan_bpjs', $input3);
				}
			}

			$where = array('userid'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_induk', $input, $where);
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

	public function doUpdate_detail()
	{
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Data Detail
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('id_detail');
			$input2['no_urut'] = $this->input->post('no_urut');
			$input2['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input2['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$input2['tempat_lahir'] = $this->input->post('tempat_lahir');
			$input2['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$input2['status_pernikahan'] = $this->input->post('status_pernikahan');
			$input2['gol_darah'] = $this->input->post('gol_darah');
			$input2['agama'] = $this->input->post('agama');
			$input2['suku'] = $this->input->post('suku');
			$input2['tinggi_badan'] = $this->input->post('tinggi_badan');
			$input2['berat_badan'] = $this->input->post('berat_badan');
			$input2['kewarganegaraan'] = $this->input->post('kewarganegaraan');
			$input2['alamat_ktp'] = $this->input->post('alamat_ktp');
			$input2['no_telp'] = $this->input->post('no_telp');
			$input2['no_hp'] = $this->input->post('no_hp');
			$input2['email'] = $this->input->post('email');
			$input2['alamat_domisili'] = $this->input->post('alamat_domisili');

			$where = array('id_detail'=>$id);

			if ($id == "") {
				# code...
				$save2 		= $this->m_query->insert_data('tbl_karyawan_detail', $input2);
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
			} elseif ($id <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_detail', $input2, $where);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_keluarga()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			//Insert Suami / Istri
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id_keluarga = $this->input->post('id_keluarga');
			$no_urut = $this->input->post('no_urut');
			$input3['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input3['no_urut'] = $this->input->post('no_urut');
			$input3['nama_keluarga'] = $this->input->post('nama_keluarga');
			$input3['no_ktp_keluarga'] = $this->input->post('no_ktp_keluarga');
			$input3['tanggal_lahir_keluarga'] = $this->input->post('tanggal_lahir_keluarga');
			$input3['tempat_lahir_keluarga'] = $this->input->post('tempat_lahir_keluarga');
			$input3['gol_darah_keluarga'] = $this->input->post('gol_darah_keluarga');
			$input3['agama_keluarga'] = $this->input->post('agama_keluarga');
			$input3['suku_keluarga'] = $this->input->post('suku_keluarga');
			$input3['kewarganegaraan_keluarga'] = $this->input->post('kewarganegaraan_keluarga');
			$input3['pendidikan_keluarga'] = $this->input->post('pendidikan_keluarga');

			$where = array('id_keluarga'=>$id_keluarga);

			if ($id_keluarga == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_keluarga', $input3);
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
			} elseif ($id_keluarga <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_keluarga', $input3, $where);
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
			}

			// Insert Anak
			$nik_lokasi4 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan4 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis4 = $this->input->post('hasil_no_nik');
			$nik_mutasi4 = $this->input->post('hasil_mutasi_nik');
			$nik_baru4 = $nik_lokasi4.$nik_perusahaan4.$nik_baru_otomatis4.$nik_mutasi4;

			$urutan_anak = $this->input->post('urutan_anak');
			$nama_anak = $this->input->post('nama_anak');
			$no_ktp_anak = $this->input->post('no_ktp_anak');
			$tanggal_lahir_anak = $this->input->post('tanggal_lahir_anak');
			$tempat_lahir_anak = $this->input->post('tempat_lahir_anak');
			$gol_darah_anak = $this->input->post('gol_darah_anak');
			$agama_anak = $this->input->post('agama_anak');
			$suku_anak = $this->input->post('suku_anak');
			$kewarganegaraan_anak = $this->input->post('kewarganegaraan_anak');
			$pendidikan_anak = $this->input->post('pendidikan_anak');

			for ($i=0; $i < count($nama_anak); $i++) { 
				# code...
				$input['no_urut'] = $no_urut;
				$input['nik_baru'] = $nik_baru4;
				$input['urutan_anak'] = $urutan_anak[$i];
				$input['nama_anak'] = $nama_anak[$i];
				$input['no_ktp_anak'] = $no_ktp_anak[$i];
				$input['tanggal_lahir_anak'] = $tanggal_lahir_anak[$i];
				$input['tempat_lahir_anak'] = $tempat_lahir_anak[$i];
				$input['gol_darah_anak'] = $gol_darah_anak[$i];
				$input['agama_anak'] = $agama_anak[$i];
				$input['suku_anak'] = $suku_anak[$i];
				$input['kewarganegaraan_anak'] = $kewarganegaraan_anak[$i];
				$input['pendidikan_anak'] = $pendidikan_anak[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_anak', $input);
				
			}

			// Insert Susunan Keluarga
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id_susunan = $this->input->post('id_susunan');
			$input5['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input5['no_urut'] = $this->input->post('no_urut');
			$input5['nama_ayah'] = $this->input->post('nama_ayah');
			$input5['tanggal_lahir_ayah'] = $this->input->post('tanggal_lahir_ayah');
			$input5['jenis_kelamin_ayah'] = $this->input->post('jenis_kelamin_ayah');
			$input5['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');
			$input5['pendidikan_ayah'] = $this->input->post('pendidikan_ayah');
			$input5['nama_ibu'] = $this->input->post('nama_ibu');
			$input5['tanggal_lahir_ibu'] = $this->input->post('tanggal_lahir_ibu');
			$input5['jenis_kelamin_ibu'] = $this->input->post('jenis_kelamin_ibu');
			$input5['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');
			$input5['pendidikan_ibu'] = $this->input->post('pendidikan_ibu');

			$where2 = array('id_susunan'=>$id_susunan);

			if ($id_susunan == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_susunan_keluarga', $input5);
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
			} elseif ($id_susunan <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_susunan_keluarga', $input5, $where2);
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
			}

			// Insert Saudara
			$nik_lokasi6 = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan6 = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis6 = $this->input->post('hasil_no_nik');
			$nik_mutasi6 = $this->input->post('hasil_mutasi_nik');
			$nik_baru3 = $nik_lokasi6.$nik_perusahaan6.$nik_baru_otomatis6.$nik_mutasi6;

			$urutan_saudara4 = $this->input->post('urutan_saudara');
			$nama_saudara4 = $this->input->post('nama_saudara');
			$tanggal_lahir_saudara4 = $this->input->post('tanggal_lahir_saudara');
			$jenis_kelamin_saudara4 = $this->input->post('jenis_kelamin_saudara');
			$pekerjaan_saudara4 = $this->input->post('pekerjaan_saudara');
			$pendidikan_saudara4 = $this->input->post('pendidikan_saudara');

			for ($i=0; $i < count($nama_saudara4); $i++) { 
				# code...
				$input4['no_urut'] = $no_urut;
				$input4['nik_baru'] = $nik_baru3;
				$input4['urutan_saudara'] = $urutan_saudara4[$i];
				$input4['nama_saudara'] = $nama_saudara4[$i];
				$input4['tanggal_lahir_saudara'] = $tanggal_lahir_saudara4[$i];
				$input4['jenis_kelamin_saudara'] = $jenis_kelamin_saudara4[$i];
				$input4['pekerjaan_saudara'] = $pekerjaan_saudara4[$i];
				$input4['pendidikan_saudara'] = $pendidikan_saudara4[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_saudara', $input4);
				
			}

			// Insert Kontak Darurat
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id_darurat = $this->input->post('id_darurat');
			$input6['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input6['no_urut'] = $this->input->post('no_urut');
			$input6['nama_darurat'] = $this->input->post('nama_darurat');
			$input6['no_hp_darurat'] = $this->input->post('no_hp_darurat');
			$input6['alamat_darurat'] = $this->input->post('alamat_darurat');

			$where3 = array('id_darurat'=>$id_darurat);

			if ($id_darurat == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_darurat', $input6);
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
			} elseif ($id_darurat <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_darurat', $input6, $where3);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_pendidikan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			//Insert Pendidikan
			$id = $this->input->post('id_pendidikan');
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$input7['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input7['no_urut'] = $this->input->post('no_urut');
			$input7['status_sd'] = $this->input->post('status_sd');
			$input7['nama_sd'] = $this->input->post('nama_sd');
			$input7['tahun_sd'] = $this->input->post('tahun_sd');
			$input7['ket_sd'] = $this->input->post('ket_sd');
			$input7['nilai_sd'] = $this->input->post('nilai_sd');
			$input7['status_smp'] = $this->input->post('status_smp');
			$input7['nama_smp'] = $this->input->post('nama_smp');
			$input7['tahun_smp'] = $this->input->post('tahun_smp');
			$input7['ket_smp'] = $this->input->post('ket_smp');
			$input7['nilai_smp'] = $this->input->post('nilai_smp');
			$input7['status_smk'] = $this->input->post('status_smk');
			$input7['nama_smk'] = $this->input->post('nama_smk');
			$input7['jurusan_smk'] = $this->input->post('jurusan_smk');
			$input7['tahun_smk'] = $this->input->post('tahun_smk');
			$input7['ket_smk'] = $this->input->post('ket_smk');
			$input7['nilai_smk'] = $this->input->post('nilai_smk');
			$input7['nama_st'] = $this->input->post('nama_st');
			$input7['jurusan_st'] = $this->input->post('jurusan_st');
			$input7['tahun_st'] = $this->input->post('tahun_st');
			$input7['ket_st'] = $this->input->post('ket_st');
			$input7['ipk_st'] = $this->input->post('ipk_st');
			$input7['tingkat_st'] = $this->input->post('tingkat_st');
			$input7['nama_s1'] = $this->input->post('nama_s1');
			$input7['jurusan_s1'] = $this->input->post('jurusan_s1');
			$input7['tahun_s1'] = $this->input->post('tahun_s1');
			$input7['ket_s1'] = $this->input->post('ket_s1');
			$input7['ipk_s1'] = $this->input->post('ipk_s1');
			$input7['tingkat_s1'] = $this->input->post('tingkat_s1');
			$input7['nama_s2'] = $this->input->post('nama_s2');
			$input7['jurusan_s2'] = $this->input->post('jurusan_s2');
			$input7['tahun_s2'] = $this->input->post('tahun_s2');
			$input7['ket_s2'] = $this->input->post('ket_s2');
			$input7['ipk_s2'] = $this->input->post('ipk_s2');
			$input7['tingkat_s2'] = $this->input->post('tingkat_s2');
			$input7['nama_s3'] = $this->input->post('nama_s3');
			$input7['jurusan_s3'] = $this->input->post('jurusan_s3');
			$input7['tahun_s3'] = $this->input->post('tahun_s3');
			$input7['ket_s3'] = $this->input->post('ket_s3');
			$input7['ipk_s3'] = $this->input->post('ipk_s3');
			$input7['tingkat_s3'] = $this->input->post('tingkat_s3');

			$where = array('id_pendidikan'=>$id);
			
			if ($id == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_pendidikan', $input7);
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
			} elseif ($id <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_pendidikan', $input7, $where);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_pelatihan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pelatihan
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$no_urut = $this->input->post('no_urut');
			$nama_pelatihan_lembaga = $this->input->post('nama_pelatihan_lembaga');
			$judul_pelatihan = $this->input->post('judul_pelatihan');
			$tahun_pelatihan = $this->input->post('tahun_pelatihan');
			$tempat_pelatihan = $this->input->post('tempat_pelatihan');
			$ket_pelatihan = $this->input->post('ket_pelatihan');

			for ($i=0; $i < count($nama_pelatihan_lembaga); $i++) { 
				# code...
				$input['no_urut'] = $no_urut;
				$input['nik_baru'] = $nik_baru;
				$input['nama_pelatihan_lembaga'] = $nama_pelatihan_lembaga[$i];
				$input['judul_pelatihan'] = $judul_pelatihan[$i];
				$input['tahun_pelatihan'] = $tahun_pelatihan[$i];
				$input['tempat_pelatihan'] = $tempat_pelatihan[$i];
				$input['ket_pelatihan'] = $ket_pelatihan[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_pelatihan', $input);
				
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

	public function doUpdate_bahasa()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$nama_bahasa  = $this->input->post('nama_bahasa');
			$lisan = $this->input->post('lisan');
			$tulisan  = $this->input->post('tulisan');
			$baca = $this->input->post('baca');

			for ($i=0; $i < count($nama_bahasa); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['nama_bahasa'] = $nama_bahasa[$i];
				$input['lisan'] = $lisan[$i];
				$input['tulisan'] = $tulisan[$i];
				$input['baca'] = $baca[$i];

				$save9 		= $this->m_query->insert_data('tbl_karyawan_bahasa', $input);
				
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

	public function doUpdate_keahlian()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Keahlian
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('id_keahlian');
			$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input['deskripsi'] = $this->input->post('deskripsi');
			
			$where = array('id_keahlian'=>$id);

			if ($id == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_keahlian', $input);
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
			} elseif ($id <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_keahlian', $input, $where);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_hobi()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Hobi
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('id_hobi');
			$input11['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input11['nama_hobi'] = $this->input->post('nama_hobi');
			$input11['ket_hobi'] = $this->input->post('ket_hobi');
			$input11['nama_hobi_2'] = $this->input->post('nama_hobi_2');
			$input11['ket_hobi_2'] = $this->input->post('ket_hobi_2');
			$input11['nama_hobi_3'] = $this->input->post('nama_hobi_3');
			$input11['ket_hobi_3'] = $this->input->post('ket_hobi_3');
			
			$where11 = array('id_hobi'=>$id);

			if ($id == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_hobi', $input11);
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
			} elseif ($id <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_hobi', $input11, $where11);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_pengalaman_kerja()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pengalaman Kerja
			$id = $this->input->post("id_pengalaman_kerja");
			$nik = $this->input->post('nik_baru');
			$input12['nama_perusahaan'] = $this->input->post('nama_perusahaan');
			$input12['jabatan_awal'] = $this->input->post('jabatan_awal');
			$input12['jabatan_awal_start'] = $this->input->post('jabatan_awal_start');
			$input12['jabatan_awal_end'] = $this->input->post('jabatan_awal_end');
			$input12['jabatan_akhir'] = $this->input->post('jabatan_akhir');
			$input12['jabatan_akhir_start'] = $this->input->post('jabatan_akhir_start');
			$input12['jabatan_akhir_end'] = $this->input->post('jabatan_akhir_end');
			$input12['tahun_keluar'] = $this->input->post('tahun_keluar');
			$input12['alasan_keluar'] = $this->input->post('alasan_keluar');
			$input12['gaji_terakhir'] = $this->input->post('gaji_terakhir');
			$input12['no_telp_perusahaan'] = $this->input->post('no_telp_perusahaan');
			$input12['nama_atasan'] = $this->input->post('nama_atasan');
			$input12['nama_referensi'] = $this->input->post('nama_referensi');
			$input12['no_kontak_referensi'] = $this->input->post('no_kontak_referensi');

			$where12 = array('id_pengalaman_kerja'=>$id);
			$save12 = $this->m_query->update_data('tbl_karyawan_pengalaman_kerja', $input12, $where12);

			if($save12) {
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

	public function doUpdate_organisasi()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Pengalaman Organisasi
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$nik_baru = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;

			// $nik_baru  = $this->input->post('nik_baru');
			$nama_organisasi = $this->input->post('nama_organisasi');
			$jabatan_awal_organisasi = $this->input->post('jabatan_awal_organisasi');
			$jabatan_akhir_organisasi = $this->input->post('jabatan_akhir_organisasi');
			$tahun_masuk_organisasi = $this->input->post('tahun_masuk_organisasi');
			$tahun_keluar_organisasi = $this->input->post('tahun_keluar_organisasi');
			$deskripsi_organisasi = $this->input->post('deskripsi_organisasi');

			for ($i=0; $i < count($nama_organisasi); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['nama_organisasi'] = $nama_organisasi[$i];
				$input['jabatan_awal_organisasi'] = $jabatan_awal_organisasi[$i];
				$input['jabatan_akhir_organisasi'] = $jabatan_akhir_organisasi[$i];
				$input['tahun_masuk_organisasi'] = $tahun_masuk_organisasi[$i];
				$input['tahun_keluar_organisasi'] = $tahun_keluar_organisasi[$i];
				$input['deskripsi_organisasi'] = $deskripsi_organisasi[$i];

				$save9 		= $this->m_query->insert_data('tbl_karyawan_pengalaman_organisasi', $input);
				
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

	public function doUpdate_minat()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Minat
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('id_minat');
			$input14['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input14['minat_1'] = $this->input->post('minat_1');
			$input14['minat_2'] = $this->input->post('minat_2');
			$input14['minat_3'] = $this->input->post('minat_3');
			
			$where14 = array('id_minat'=>$id);

			if ($id == "") {
				# code...
				$save 		= $this->m_query->insert_data('tbl_karyawan_minat', $input14);
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
			} elseif ($id <> "") {
				$save = $this->m_query->update_data('tbl_karyawan_minat', $input14, $where14);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_struktur()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Struktur
			$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
			$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
			$nik_baru_otomatis = $this->input->post('hasil_no_nik');
			$nik_mutasi = $this->input->post('hasil_mutasi_nik');
			$id = $this->input->post('id_struktur');
			$input15['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
			$input15['nama_karyawan_struktur'] = $this->input->post('nama_karyawan_struktur');
			$input15['jabatan_struktur'] = $this->input->post('jabatan_struktur');
			$input15['lokasi_struktur'] = $this->input->post('lokasi_struktur');
			$input15['perusahaan_struktur'] = $this->input->post('perusahaan_struktur');
			$input15['level_struktur'] = $this->input->post('level_struktur');
			$input15['dept_struktur'] = $this->input->post('dept_struktur');
			$input15['join_date_struktur'] = $this->input->post('join_date_struktur');
			$input15['jam_kerja'] = $this->input->post('jam_kerja');
			$input15['start_date_struktur'] = $this->input->post('start_date_struktur');
			$input15['masa_kerja_struktur'] = $this->input->post('masa_kerja_struktur');
			$input15['status_karyawan_struktur'] = $this->input->post('status_karyawan_struktur');
			// $input15['start_pkwt_struktur'] = $this->input->post('start_pkwt_struktur');
			// $input15['end_pkwt_struktur'] = $this->input->post('end_pkwt_struktur');
			$input15['nama_atasan_struktur'] = $this->input->post('nama_atasan_struktur');
			
			$where15 = array('id_struktur'=>$id);
			$save15 = $this->m_query->update_data('tbl_karyawan_struktur', $input15, $where15);

			if($save15) {
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

	public function tabel_pengalaman_kerja()
	{
		$data['listdata'] = $this->m_query->select_row_data('*', 'tmp_pengalaman_kerja', null)->result_array();
		$this->load->view('admin/karyawan/tabel_pengalaman_kerja', $data);
	}

	public function doUpdate_periode()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			// Insert Data Induk
			$nik_baru = $this->input->post('nik_baru');
			$input['digit_ktp'] = $this->input->post('digit_ktp');
			$input['digit_npwp'] = $this->input->post('digit_npwp');
			$input['digit_bpjs_ket'] = $this->input->post('digit_bpjs_ket');
			$input['digit_bpjs_kes'] = $this->input->post('digit_bpjs_kes');
			$input['digit_kk'] = $this->input->post('digit_kk');

			$bpjs_ket = $this->input->post('digit_bpjs_ket');
			if ($bpjs_ket != '' || $bpjs_ket == '-' || $bpjs_ket == '0') {
				$query_bpjs = $this->m_query->select_row_data('*', 'tbl_karyawan_bpjs', array('nik'=>$nik_baru))->num_rows();
				if ($query_bpjs>0) {
					$input2['status_tk'] = '3';
					$input2['no_tk'] = $this->input->post('digit_bpjs_ket');
					$where2 = array('nik'=>$nik_baru);

					$this->m_query->update_data('tbl_karyawan_bpjs', $input2, $where2);
				} else {
					$input2['nik'] = $nik_baru;
					$input2['status_kes'] = '';
					$input2['no_kes'] = '';
					$input2['tanggal_kes'] = '0000-00-00';
					$input2['ket_kes'] = '';
					$input2['status_tk'] = '3';
					$input2['no_tk'] = $this->input->post('digit_bpjs_ket');
					$input2['tanggal_tk'] = '0000-00-00';
					$input2['ket_tk'] = '';

					$this->m_query->insert_data('tbl_karyawan_bpjs', $input2);
				}
			}

			$bpjs_kes = $this->input->post('digit_bpjs_kes');
			if ($bpjs_kes != '' || $bpjs_kes == '-' || $bpjs_kes == '0') {
				$query_bpjs = $this->m_query->select_row_data('*', 'tbl_karyawan_bpjs', array('nik'=>$nik_baru))->num_rows();
				if ($query_bpjs>0) {
					$input3['status_kes'] = '3';
					$input3['no_kes'] = $this->input->post('digit_bpjs_kes');
					$where3 = array('nik'=>$nik_baru);

					$this->m_query->update_data('tbl_karyawan_bpjs', $input3, $where3);
				} else {
					$input3['nik'] = $nik_baru;
					$input3['status_kes'] = '3';
					$input3['no_kes'] = $this->input->post('digit_bpjs_kes');
					$input3['tanggal_kes'] = '0000-00-00';
					$input3['ket_kes'] = '';
					$input3['status_tk'] = '';
					$input3['no_tk'] = '';
					$input3['tanggal_tk'] = '0000-00-00';
					$input3['ket_tk'] = '';

					$this->m_query->insert_data('tbl_karyawan_bpjs', $input3);
				}
			}

			//Upload Ulang Id Card
			$where_foto = ['nik_baru' => $nik_baru];
			$getdata = $this->m_query->select_row_data('*', 'tbl_karyawan_induk', $where_foto);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/data_induk/ktp/'.$rows['no_ktp']);
				
				// Upload Ulang
				$path = 'ktp/';
				$name = 'no_ktp';
				$pecah = explode(".", $_FILES['no_ktp']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($nik_baru)).'.'.$ext;

				$upload = $this->m_query->unggah($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['no_ktp'] = $rename;					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
				}
				
			}

			$where = array('nik_baru'=>$nik_baru);
			$save = $this->m_query->update_data('tbl_karyawan_induk', $input, $where);
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

	public function doUpdate_detail_periode()
	{
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required');
		if($this->form_validation->run()===TRUE) {

			// Insert Data Detail
			$nik_baru = $this->input->post('nik_baru');
			$input2['nik_baru'] = $this->input->post('nik_baru_fix');
			$input2['tanggal_lahir'] = $this->input->post('tanggal_lahir');
			$input2['tempat_lahir'] = $this->input->post('tempat_lahir');
			$input2['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$input2['status_pernikahan'] = $this->input->post('status_pernikahan');
			$input2['alamat_ktp'] = $this->input->post('alamat_ktp');
			$input2['no_telp'] = $this->input->post('no_telp');
			$input2['no_hp'] = $this->input->post('no_hp');
			$input2['email'] = $this->input->post('email');
			$input2['alamat_domisili'] = $this->input->post('alamat_domisili');

			$where = array('nik_baru'=>$nik_baru);

			$nik_baru = $this->input->post('nik_baru');
			$query_detail = $this->m_query->select_row_data('*', 'tbl_karyawan_detail', array('nik_baru'=>$nik_baru))->num_rows();
			if ($query_detail>0) {
				$save = $this->m_query->update_data('tbl_karyawan_detail', $input2, $where);
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
				$save2 		= $this->m_query->insert_data('tbl_karyawan_detail', $input2);
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
			}
		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_keluarga_periode()
	{
		$this->form_validation->set_rules('nama_darurat', 'nama_darurat', 'required');
		if($this->form_validation->run()===TRUE) {
			//Insert Suami / Istri
			$id_keluarga = $this->input->post('id_keluarga');
			$nik_baru_keluarga = $this->input->post('nik_baru');
			$no_urut = $this->input->post('no_urut');
			$input3['no_urut'] = $this->input->post('no_urut');
			$input3['nik_baru'] = $this->input->post('nik_baru_fix');
			$input3['nama_keluarga'] = $this->input->post('nama_keluarga');
			$input3['no_ktp_keluarga'] = $this->input->post('no_ktp_keluarga');
			$input3['tanggal_lahir_keluarga'] = $this->input->post('tanggal_lahir_keluarga');
			$input3['tempat_lahir_keluarga'] = $this->input->post('tempat_lahir_keluarga');
			$input3['gol_darah_keluarga'] = $this->input->post('gol_darah_keluarga');
			$input3['agama_keluarga'] = $this->input->post('agama_keluarga');
			$input3['suku_keluarga'] = $this->input->post('suku_keluarga');
			$input3['kewarganegaraan_keluarga'] = $this->input->post('kewarganegaraan_keluarga');
			$input3['pendidikan_keluarga'] = $this->input->post('pendidikan_keluarga');

			$where = array('no_urut'=>$no_urut);

			$nik_baru = $this->input->post('nik_baru');
			$query_keluarga = $this->m_query->select_row_data('*', 'tbl_karyawan_keluarga', array('no_urut'=>$no_urut))->num_rows();
			if ($query_keluarga>0) {
				$save = $this->m_query->update_data('tbl_karyawan_keluarga', $input3, $where);
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
				$save 		= $this->m_query->insert_data('tbl_karyawan_keluarga', $input3);
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
			}

			// Insert Anak
			$nik_baru4 = $this->input->post('nik_baru_fix');

			$urutan_anak = $this->input->post('urutan_anak');
			$nama_anak = $this->input->post('nama_anak');
			$no_ktp_anak = $this->input->post('no_ktp_anak');
			$tanggal_lahir_anak = $this->input->post('tanggal_lahir_anak');
			$tempat_lahir_anak = $this->input->post('tempat_lahir_anak');
			$gol_darah_anak = $this->input->post('gol_darah_anak');
			$agama_anak = $this->input->post('agama_anak');
			$suku_anak = $this->input->post('suku_anak');
			$kewarganegaraan_anak = $this->input->post('kewarganegaraan_anak');
			$pendidikan_anak = $this->input->post('pendidikan_anak');

			for ($i=0; $i < count($nama_anak); $i++) { 
				# code...
				$input['no_urut'] = $no_urut;
				$input['nik_baru'] = $nik_baru4;
				$input['urutan_anak'] = $urutan_anak[$i];
				$input['nama_anak'] = $nama_anak[$i];
				$input['no_ktp_anak'] = $no_ktp_anak[$i];
				$input['tanggal_lahir_anak'] = $tanggal_lahir_anak[$i];
				$input['tempat_lahir_anak'] = $tempat_lahir_anak[$i];
				$input['gol_darah_anak'] = $gol_darah_anak[$i];
				$input['agama_anak'] = $agama_anak[$i];
				$input['suku_anak'] = $suku_anak[$i];
				$input['kewarganegaraan_anak'] = $kewarganegaraan_anak[$i];
				$input['pendidikan_anak'] = $pendidikan_anak[$i];

				$save 		= $this->m_query->insert_data('tbl_karyawan_anak', $input);
				
			}

			// Insert Susunan Keluarga
			$id_susunan = $this->input->post('id_susunan');
			$nik_baru_susunan_keluarga = $this->input->post('nik_baru_susunan_keluarga');
			$input5['nik_baru'] = $this->input->post('nik_baru_fix');
			$input5['nama_ayah'] = $this->input->post('nama_ayah');
			$input5['tanggal_lahir_ayah'] = $this->input->post('tanggal_lahir_ayah');
			$input5['jenis_kelamin_ayah'] = $this->input->post('jenis_kelamin_ayah');
			$input5['pekerjaan_ayah'] = $this->input->post('pekerjaan_ayah');
			$input5['pendidikan_ayah'] = $this->input->post('pendidikan_ayah');
			$input5['nama_ibu'] = $this->input->post('nama_ibu');
			$input5['tanggal_lahir_ibu'] = $this->input->post('tanggal_lahir_ibu');
			$input5['jenis_kelamin_ibu'] = $this->input->post('jenis_kelamin_ibu');
			$input5['pekerjaan_ibu'] = $this->input->post('pekerjaan_ibu');
			$input5['pendidikan_ibu'] = $this->input->post('pendidikan_ibu');

			$where2 = array('no_urut'=>$no_urut);

			$nik_baru = $this->input->post('nik_baru');
			$query_susunan_keluarga = $this->m_query->select_row_data('*', 'tbl_karyawan_susunan_keluarga', array('no_urut'=>$no_urut))->num_rows();
			if ($query_susunan_keluarga>0) {
				$save = $this->m_query->update_data('tbl_karyawan_susunan_keluarga', $input5, $where2);
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
				$save 		= $this->m_query->insert_data('tbl_karyawan_susunan_keluarga', $input5);
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
			}

			// Insert Kontak Darurat
			$id_darurat = $this->input->post('id_darurat');
			$nik_baru_darurat = $this->input->post('nik_baru_darurat');
			$input6['nik_baru'] = $this->input->post('nik_baru_fix');
			$input6['nama_darurat'] = $this->input->post('nama_darurat');
			$input6['no_hp_darurat'] = $this->input->post('no_hp_darurat');
			$input6['alamat_darurat'] = $this->input->post('alamat_darurat');

			$where3 = array('no_urut'=>$no_urut);

			$nik_baru = $this->input->post('nik_baru');
			$query_darurat = $this->m_query->select_row_data('*', 'tbl_karyawan_darurat', array('no_urut'=>$no_urut))->num_rows();
			if ($query_darurat>0) {
				$save = $this->m_query->update_data('tbl_karyawan_darurat', $input6, $where3);
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
				$save 		= $this->m_query->insert_data('tbl_karyawan_darurat', $input6);
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
			}

		} else {
			$response = [
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate_pendidikan_periode()
	{
		$this->form_validation->set_rules('nik_baru_fix', 'nik_baru_fix', 'required');
		if($this->form_validation->run()===TRUE) {
			//Insert Pendidikan
			$id_pendidikan = $this->input->post('id_pendidikan');
			$nik_baru_pendidikan = $this->input->post('nik_baru');
			$nik_update = $this->input->post('nik_baru_fix');
			$no_urut = $this->input->post('no_urut');
			$input7['no_urut'] = $this->input->post('no_urut');
			$input7['nik_baru'] = $this->input->post('nik_baru_fix');
			$input7['status_sd'] = $this->input->post('status_sd');
			$input7['nama_sd'] = $this->input->post('nama_sd');
			$input7['tahun_sd'] = $this->input->post('tahun_sd');
			$input7['ket_sd'] = $this->input->post('ket_sd');
			$input7['nilai_sd'] = $this->input->post('nilai_sd');
			$input7['status_smp'] = $this->input->post('status_smp');
			$input7['nama_smp'] = $this->input->post('nama_smp');
			$input7['tahun_smp'] = $this->input->post('tahun_smp');
			$input7['ket_smp'] = $this->input->post('ket_smp');
			$input7['nilai_smp'] = $this->input->post('nilai_smp');
			$input7['status_smk'] = $this->input->post('status_smk');
			$input7['nama_smk'] = $this->input->post('nama_smk');
			$input7['jurusan_smk'] = $this->input->post('jurusan_smk');
			$input7['tahun_smk'] = $this->input->post('tahun_smk');
			$input7['ket_smk'] = $this->input->post('ket_smk');
			$input7['nilai_smk'] = $this->input->post('nilai_smk');
			$input7['nama_st'] = $this->input->post('nama_st');
			$input7['jurusan_st'] = $this->input->post('jurusan_st');
			$input7['tahun_st'] = $this->input->post('tahun_st');
			$input7['ket_st'] = $this->input->post('ket_st');
			$input7['ipk_st'] = $this->input->post('ipk_st');
			$input7['tingkat_st'] = $this->input->post('tingkat_st');
			$input7['nama_s1'] = $this->input->post('nama_s1');
			$input7['jurusan_s1'] = $this->input->post('jurusan_s1');
			$input7['tahun_s1'] = $this->input->post('tahun_s1');
			$input7['ket_s1'] = $this->input->post('ket_s1');
			$input7['ipk_s1'] = $this->input->post('ipk_s1');
			$input7['tingkat_s1'] = $this->input->post('tingkat_s1');
			$input7['nama_s2'] = $this->input->post('nama_s2');
			$input7['jurusan_s2'] = $this->input->post('jurusan_s2');
			$input7['tahun_s2'] = $this->input->post('tahun_s2');
			$input7['ket_s2'] = $this->input->post('ket_s2');
			$input7['ipk_s2'] = $this->input->post('ipk_s2');
			$input7['tingkat_s2'] = $this->input->post('tingkat_s2');
			$input7['nama_s3'] = $this->input->post('nama_s3');
			$input7['jurusan_s3'] = $this->input->post('jurusan_s3');
			$input7['tahun_s3'] = $this->input->post('tahun_s3');
			$input7['ket_s3'] = $this->input->post('ket_s3');
			$input7['ipk_s3'] = $this->input->post('ipk_s3');
			$input7['tingkat_s3'] = $this->input->post('tingkat_s3');

			$where = array('no_urut'=>$no_urut);
			$where_update = array('nik_baru'=>$nik_update);

			$input8['status_update'] = '1';
			$input8['datetime_update'] = date('Y-m-d h:i:s');
			$where = array('nik_baru'=>$nik_update);
			$this->m_query->update_data('tbl_karyawan_struktur', $input8, $where_update);
			
			$query_pendidikan = $this->m_query->select_row_data('*', 'tbl_karyawan_pendidikan', array('no_urut'=>$no_urut))->num_rows();
			if ($query_pendidikan>0) {
				$save = $this->m_query->update_data('tbl_karyawan_pendidikan', $input7, $where);
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
				$save 		= $this->m_query->insert_data('tbl_karyawan_pendidikan', $input7);
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