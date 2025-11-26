<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historical_mutasi extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin', 'm_all'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function tampil_kode_lokasi_promosi(){
		$lokasi_struktur=$this->input->post('lokasi_struktur');
		$query=$this->m_query->tampil_kode_lokasi($lokasi_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_lokasi_demosi(){
		$lokasi_struktur=$this->input->post('lokasi_struktur_2');
		$query=$this->m_query->tampil_kode_lokasi($lokasi_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_lokasi_rotasi(){
		$lokasi_struktur=$this->input->post('lokasi_struktur_3');
		$query=$this->m_query->tampil_kode_lokasi($lokasi_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_lokasi_mutasi(){
		$lokasi_struktur=$this->input->post('lokasi_struktur_4');
		$query=$this->m_query->tampil_kode_lokasi($lokasi_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_perusahaan_promosi(){
		$perusahaan_struktur=$this->input->post('perusahaan_struktur');
		$query=$this->m_query->tampil_kode_perusahaan($perusahaan_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_perusahaan_demosi(){
		$perusahaan_struktur=$this->input->post('perusahaan_struktur_2');
		$query=$this->m_query->tampil_kode_perusahaan($perusahaan_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_perusahaan_rotasi(){
		$perusahaan_struktur=$this->input->post('perusahaan_struktur_3');
		$query=$this->m_query->tampil_kode_perusahaan($perusahaan_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_perusahaan_mutasi(){
		$perusahaan_struktur=$this->input->post('perusahaan_struktur_4');
		$query=$this->m_query->tampil_kode_perusahaan($perusahaan_struktur);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_dept_promosi(){
		$dept_baru=$this->input->post('dept_baru_promosi');
		$query=$this->m_query->tampil_kode_dept($dept_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_dept_demosi(){
		$dept_baru=$this->input->post('dept_baru_demosi');
		$query=$this->m_query->tampil_kode_dept($dept_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_dept_rotasi(){
		$dept_baru=$this->input->post('dept_baru_rotasi');
		$query=$this->m_query->tampil_kode_dept($dept_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_kode_dept_mutasi(){
		$dept_baru=$this->input->post('dept_baru_mutasi');
		$query=$this->m_query->tampil_kode_dept($dept_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_jabatan_promosi(){
		$jabatan_karyawan=$this->input->post('jabatan_baru_promosi');
		$query=$this->m_query->tampil_kode_jabatan($jabatan_karyawan);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_jabatan_demosi(){
		$jabatan_karyawan=$this->input->post('jabatan_baru_demosi');
		$query=$this->m_query->tampil_kode_jabatan($jabatan_karyawan);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_jabatan_rotasi(){
		$jabatan_karyawan=$this->input->post('jabatan_baru_rotasi');
		$query=$this->m_query->tampil_kode_jabatan($jabatan_karyawan);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_jabatan_mutasi(){
		$jabatan_karyawan=$this->input->post('jabatan_baru_mutasi');
		$query=$this->m_query->tampil_kode_jabatan($jabatan_karyawan);
		$result=$query->result();
		echo json_encode($result);
	}

	public function edit($id)
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

		$data['title'] = "Approval Mutasi dan Rotasi (".$id.")";
		$data['edit'] = $this->m_admin->izin_mutasi_rotasi($id)->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/tindakan', $data);
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

		$data['title'] = "Data Historical Mutasi dan Rotasi";
		$nik_baru = users('nik_baru');
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_mutasi', null)->result_array();
		$data['listdata'] = $this->m_query->investigasi_mutasi(array('nik_pengajuan'=>$nik_baru))->result_array();
		$this->load->view('admin/historical/mutasi_rotasi/index', $data);
	}

	public function index_approve()
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

		$data['title'] = "Data Approve Mutasi dan Rotasi";
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_mutasi', null)->result_array();
		$data['listdata'] = $this->m_query->investigasi_mutasi(array('status_1'=>'1'))->result_array();
		$this->load->view('admin/historical/mutasi_rotasi/index_approve', $data);
	}

	public function index_reject()
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

		$data['title'] = "Data Reject Mutasi dan Rotasi";
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_mutasi', null)->result_array();
		$data['listdata'] = $this->m_query->investigasi_mutasi(array('status_1'=>'2'))->result_array();
		$this->load->view('admin/historical/mutasi_rotasi/index_reject', $data);
	}

	public function approve()
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
			
			$data['title'] = "Data Approval Mutasi dan Rotasi";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_mutasi_level_2_pusat($jabatan)->result_array();
			// $data['approve'] = $this->m_query->approve_full_day_level2($jabatan);
			// $data['not_approve'] = $this->m_query->not_approve_full_day_level2($jabatan);
			$this->load->view('admin/historical/mutasi_rotasi/approve', $data);
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
			
			$data['title'] = "Data Approval Mutasi dan Rotasi";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_mutasi_level_2($jabatan, $lokasi)->result_array();
			// $data['approve'] = $this->m_query->approve_full_day_level2($jabatan);
			// $data['not_approve'] = $this->m_query->not_approve_full_day_level2($jabatan);
			$this->load->view('admin/historical/mutasi_rotasi/approve', $data);
		}
		
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->m_query->tampil_mutasi($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Historical Mutasi dan Rotasi";
		$lokasi = users('lokasi_struktur');
		$data['pengajuan']=$this->m_admin->get_no_pengajuan();
		$data['perusahaan'] = $this->m_admin->perusahaan()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['jabatan'] = $this->m_admin->data_detail_jabatan()->result();
		$data['nik_baru'] = $this->m_admin->induk()->result();
		$data['dept'] = $this->m_admin->data_departement()->result();
		$jabatan = users('jabatan_struktur');
		if ($jabatan == 268) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 253) {
			$data['data_karyawan'] = $this->m_admin->absensi_am_cm($jabatan)->result();
		} elseif ($jabatan == 303) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 316) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 319) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 266) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 256) {
			$data['data_karyawan'] = $this->m_query->index_karyawan_project_snd($jabatan)->result();
		} elseif ($jabatan == 425) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 389) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 255) {
			$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		} elseif ($jabatan == 302) {
			$data['data_karyawan'] = $this->m_query->index_karyawan_project_wop($jabatan)->result();
		} else {
			$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi))->result();
		}
		
		$this->load->view('admin/historical/mutasi_rotasi/tambah', $data);
	}

	public function set_data($id)
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

		$data['title'] = "Data Update Karyawan";
		$data['edit'] = $this->m_query->investigasi_mutasi(array('id_mutasi_rotasi'=>$id))->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/set_data', $data);
	}

	public function identifikasi($id)
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

		$data['title'] = "Identifikasi Historical Mutasi dan Rotasi (".$id.")";
		$data['nik_baru'] = $this->m_admin->induk()->result();
		$nik_baru = '0100018600';
		$data['absen'] = $this->m_admin->historical_absen($nik_baru)->row_array();
		// $data['edit'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_mutasi', array('id_mutasi_rotasi'=>$id))->row_array();
		$data['edit'] = $this->m_query->investigasi_mutasi(array('id_mutasi_rotasi'=>$id))->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/identifikasi', $data);
	}

	public function tindakan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$tindakan = $this->input->post('tindakan');

			if ($tindakan == '1') {
				$id = $this->input->post('id_mutasi_rotasi');
				$input['tanggal_efektif'] = $this->input->post('tanggal_efektif');
				$input['status_1'] = "1";

				$end_pkwt = $this->input->post('tanggal_efektif');
				$date_pkwt = date($end_pkwt);
				$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
				$date_pkwt = date("Y-m-d",$date_pkwt);

				$date = strtotime($date_pkwt);
				$date = date("l", $date);
				$date = strtolower($date);

				if ($date == "sunday") {
					$end_pkwt = $this->input->post('tanggal_efektif');
					$date_pkwt = date($end_pkwt);
					$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days" . " +1 days");
					$date_pkwt = date("Y-m-d",$date_pkwt);
					$input['tanggal_efektif_fa'] = $date_pkwt;
				} else {
					$date_pkwt = date($end_pkwt);
					$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
					$date_pkwt = date("Y-m-d",$date_pkwt);
					$input['tanggal_efektif_fa'] = $date_pkwt;
				}

				$where = array('id_mutasi_rotasi'=>$id);

				$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);

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
			if ($tindakan == '2') {
				$nik_baru = $this->input->post('nik_baru');
				$input['status_1'] = "2";
				$where = array('nik_baru'=>$nik_baru);
				$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);

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

	public function reject()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_mutasi_rotasi');
			$input['status_1'] = "2";
			$input['nik_baru'] = $this->input->post('nik_baru');

			$where = array('id_mutasi_rotasi'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);
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

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			$lokasi_awal = $this->input->post('lokasi_awal');
			$lokasi_baru = $this->input->post('lokasi_baru');

			if ($lokasi_awal == $lokasi_baru) {
				$jabatan_pengajuan = users('jabatan_struktur');
				$input['no_urut'] = $this->input->post('no_urut');
				$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
				$input['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
				$input['jabatan_pengajuan'] = $jabatan_pengajuan;
				$input['no_pengajuan'] = $this->input->post('no_pengajuan');
				$input['opsi'] = $this->input->post('opsi');
				$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
				$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
				$nik_baru_otomatis = $this->input->post('hasil_no_nik');
				$nik_mutasi = $this->input->post('hasil_mutasi_nik');
				$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$nik_baru_otomatis.$nik_mutasi;
				$input['nama_karyawan_mutasi'] = $this->input->post('nama_karyawan_mutasi');
				$input['lokasi_awal'] = $this->input->post('lokasi_awal');
				$input['pt_awal'] = $this->input->post('pt_awal');
				$input['dept_awal'] = $this->input->post('dept_awal');
				$input['jabatan_awal'] = $this->input->post('jabatan_awal');
				$input['level_awal'] = $this->input->post('level_awal');
				$input['permintaan'] = $this->input->post('permintaan');
				$input['lokasi_baru'] = $this->input->post('lokasi_baru');
				$input['pt_baru'] = $this->input->post('pt_baru');
				$input['dept_baru'] = $this->input->post('dept_baru');
				$input['jabatan_baru'] = $this->input->post('jabatan_baru');
				$input['level_baru'] = $this->input->post('level_baru');

				// Promosi
				$rekomendasi_tanggal_promosi = $this->input->post('rekomendasi_tanggal_promosi');

				// Demosi
				$rekomendasi_tanggal_demosi = $this->input->post('rekomendasi_tanggal_demosi');

				// Rotasi
				$rekomendasi_tanggal_rotasi = $this->input->post('rekomendasi_tanggal_rotasi');

				// Mutasi
				$rekomendasi_tanggal_mutasi = $this->input->post('rekomendasi_tanggal_mutasi');

				$input['rekomendasi_tanggal'] = $rekomendasi_tanggal_promosi.$rekomendasi_tanggal_demosi.$rekomendasi_tanggal_rotasi.$rekomendasi_tanggal_mutasi;

				$input['status_atasan'] = "0";
				$input['status_1'] = "0";
				$input['status_dokumen'] = "0";
				$input['status_pengajuan'] = "0";
				$input['nik_lama'] = $this->input->post('nik_baru');

				$save 		= $this->m_query->insert_data('tbl_karyawan_historical_mutasi', $input);
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
			elseif ($lokasi_awal != $lokasi_baru) {
				$jabatan_pengajuan = users('jabatan_struktur');
				$input['no_urut'] = $this->input->post('no_urut');
				$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
				$input['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
				$input['jabatan_pengajuan'] = $jabatan_pengajuan;
				$input['no_pengajuan'] = $this->input->post('no_pengajuan');
				$input['opsi'] = $this->input->post('opsi');
				$nik_lokasi = $this->input->post('hasil_lokasi_struktur');
				$nik_perusahaan = $this->input->post('hasil_perusahaan_struktur');
				$nik_baru_otomatis = $this->input->post('hasil_no_nik');
				$nik_mutasi = ((int)$this->input->post('hasil_mutasi_nik'))+1;
				$kd = sprintf("%02s", $nik_mutasi);

				$kode_nik_urut = $this->m_admin->get_no_karyawan_struktur($nik_lokasi, $nik_perusahaan);

				$input['nik_baru'] = $nik_lokasi.$nik_perusahaan.$kode_nik_urut.$kd;
				$input['nama_karyawan_mutasi'] = $this->input->post('nama_karyawan_mutasi');
				$input['lokasi_awal'] = $this->input->post('lokasi_awal');
				$input['pt_awal'] = $this->input->post('pt_awal');
				$input['dept_awal'] = $this->input->post('dept_awal');
				$input['jabatan_awal'] = $this->input->post('jabatan_awal');
				$input['level_awal'] = $this->input->post('level_awal');
				$input['permintaan'] = $this->input->post('permintaan');
				$input['lokasi_baru'] = $this->input->post('lokasi_baru');
				$input['pt_baru'] = $this->input->post('pt_baru');
				$input['dept_baru'] = $this->input->post('dept_baru');
				$input['jabatan_baru'] = $this->input->post('jabatan_baru');
				$input['level_baru'] = $this->input->post('level_baru');

				// Promosi
				$rekomendasi_tanggal_promosi = $this->input->post('rekomendasi_tanggal_promosi');
				$remunerasi_baru_promosi = $this->input->post('remunerasi_baru_promosi');

				// Demosi
				$rekomendasi_tanggal_demosi = $this->input->post('rekomendasi_tanggal_demosi');
				$remunerasi_baru_demosi = $this->input->post('remunerasi_baru_demosi');

				// Rotasi
				$rekomendasi_tanggal_rotasi = $this->input->post('rekomendasi_tanggal_rotasi');
				$remunerasi_baru_rotasi = $this->input->post('remunerasi_baru_rotasi');

				// Mutasi
				$rekomendasi_tanggal_mutasi = $this->input->post('rekomendasi_tanggal_mutasi');
				$remunerasi_baru_mutasi = $this->input->post('remunerasi_baru_mutasi');

				$input['rekomendasi_tanggal'] = $rekomendasi_tanggal_promosi.$rekomendasi_tanggal_demosi.$rekomendasi_tanggal_rotasi.$rekomendasi_tanggal_mutasi;
				// $input['remunerasi_baru'] = $remunerasi_baru_promosi.$remunerasi_baru_demosi.$remunerasi_baru_rotasi.$remunerasi_baru_mutasi;

				$input['status_atasan'] = "0";
				$input['status_1'] = "0";
				$input['status_dokumen'] = "0";
				$input['nik_lama'] = $this->input->post('nik_baru');

				$save 		= $this->m_query->insert_data('tbl_karyawan_historical_mutasi', $input);
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

	public function penugasan($id_mutasi_rotasi)
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
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
		}

		$data['title'] = "Print Surat Penugasan (".$id_mutasi_rotasi.")";
		// $data['edit'] = $this->m_query->select_row_data('*', 'tbl_karyawan_historical_mutasi', array('id_mutasi_rotasi'=>$id_mutasi_rotasi))->row_array();
		$data['edit'] = $this->m_query->investigasi_mutasi_tanggal(array('id_mutasi_rotasi'=>$id_mutasi_rotasi))->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/print/surat_penugasan', $data);
	}

	public function penunjukan($id_mutasi_rotasi)
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
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
		}

		$data['title'] = "Print Surat Penunjukan (".$id_mutasi_rotasi.")";
		$data['edit'] = $this->m_query->investigasi_mutasi_tanggal(array('id_mutasi_rotasi'=>$id_mutasi_rotasi))->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/print/surat_penunjukan', $data);
	}

	public function keterangan($id_mutasi_rotasi)
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
                    return "I";
                    break;
                case 2:
                    return "II";
                    break;
                case 3:
                    return "III";
                    break;
                case 4:
                    return "IV";
                    break;
                case 5:
                    return "V";
                    break;
                case 6:
                    return "VI";
                    break;
                case 7:
                    return "VII";
                    break;
                case 8:
                    return "VIII";
                    break;
                case 9:
                    return "IX";
                    break;
                case 10:
                    return "X";
                    break;
                case 11:
                    return "XI";
                    break;
                case 12:
                    return "XII";
                    break;
            }
		}

		$data['title'] = "Print Surat Keterangan (".$id_mutasi_rotasi.")";
		$data['edit'] = $this->m_query->investigasi_mutasi_tanggal(array('id_mutasi_rotasi'=>$id_mutasi_rotasi))->row_array();
		$this->load->view('admin/historical/mutasi_rotasi/print/surat_keterangan', $data);
	}

	public function set_tanggal()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_mutasi_rotasi');
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['tanggal_efektif'] = $this->input->post('tanggal_efektif');

			$end_pkwt = $this->input->post('tanggal_efektif');
			$date_pkwt = date($end_pkwt);
			$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
			$date_pkwt = date("Y-m-d",$date_pkwt);

			$date = strtotime($date_pkwt);
			$date = date("l", $date);
			$date = strtolower($date);

			if ($date == "sunday") {
				$end_pkwt = $this->input->post('tanggal_efektif');
				$date_pkwt = date($end_pkwt);
				$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days" . " +1 days");
				$date_pkwt = date("Y-m-d",$date_pkwt);
				$input['tanggal_efektif_fa'] = $date_pkwt;
			} else {
				$date_pkwt = date($end_pkwt);
				$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
				$date_pkwt = date("Y-m-d",$date_pkwt);
				$input['tanggal_efektif_fa'] = $date_pkwt;
			}

			$where = array('id_mutasi_rotasi'=>$id);

			$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);

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

	public function doUpdate_tanggal()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');

			$input['tanggal_efektif'] = $this->input->post('tanggal_efektif');

			$end_pkwt = $this->input->post('tanggal_efektif');
			$date_pkwt = date($end_pkwt);
			$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
			$date_pkwt = date("Y-m-d",$date_pkwt);

			$date = strtotime($date_pkwt);
			$date = date("l", $date);
			$date = strtolower($date);

			if ($date == "sunday") {
				$end_pkwt = $this->input->post('tanggal_efektif');
				$date_pkwt = date($end_pkwt);
				$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days" . " +1 days");
				$date_pkwt = date("Y-m-d",$date_pkwt);
				$input['tanggal_efektif_fa'] = $date_pkwt;
			} else {
				$date_pkwt = date($end_pkwt);
				$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +60 days");
				$date_pkwt = date("Y-m-d",$date_pkwt);
				$input['tanggal_efektif_fa'] = $date_pkwt;
			}

			$where = array('id_mutasi_rotasi'=>$id);

			$save = $this->m_query->update_data('tbl_karyawan_historical_mutas', $input, $where);

			if($save) {
				$response = [
					'message'	=> 'Data berhasil dihapus',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
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

	public function close()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_mutasi_rotasi');
			$input['status_pengajuan'] = '1';
			$where = array('id_mutasi_rotasi'=>$id);

			$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);

			// $save = $this->m_all->close_mutasi($id);
			// // Surat Penugasan
			// if (!empty($_FILES['dokumen_penugasan']['name'])) {
			// 	# code...
			// 	$path = 'dokumen_penugasan/';
			// 	$name = 'dokumen_penugasan';
			// 	$pecah = explode(".", $_FILES['dokumen_penugasan']['name']);
			// 	$ext = end($pecah);
			// 	$rename = url_title(strtolower($input['nik_baru'])).'.'.$ext;
			// 	// $rename = url_title($input['foto'], 'dash', TRUE);

			// 	$upload = $this->m_query->unggah_historical($path, $name, $rename);
			// 	if ($upload == true) {
			// 		# code...
			// 		$input['dokumen_penugasan'] = $rename;
			// 		// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
			// 	} else {
			// 		$response = [
			// 			'message'	=> 'Data gagal disimpan ktp',
			// 			'status'	=> 'error'
			// 		];
			// 		redirect('historical_mutasi_rotasi/approve');
			// 	}
				
			// }

			// // Surat PJS
			// if (!empty($_FILES['dokumen_pjs']['name'])) {
			// 	# code...
			// 	$path = 'dokumen_pjs/';
			// 	$name = 'dokumen_pjs';
			// 	$pecah = explode(".", $_FILES['dokumen_pjs']['name']);
			// 	$ext = end($pecah);
			// 	$rename = url_title(strtolower($input['nik_baru'])).'.'.$ext;
			// 	// $rename = url_title($input['foto'], 'dash', TRUE);

			// 	$upload = $this->m_query->unggah_historical($path, $name, $rename);
			// 	if ($upload == true) {
			// 		# code...
			// 		$input['dokumen_pjs'] = $rename;
			// 		// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
			// 	} else {
			// 		$response = [
			// 			'message'	=> 'Data gagal disimpan ktp',
			// 			'status'	=> 'error'
			// 		];
			// 		redirect('historical_mutasi_rotasi/approve');
			// 	}
				
			// }

			// // Surat Keterangan
			// if (!empty($_FILES['dokumen_keterangan']['name'])) {
			// 	# code...
			// 	$path = 'dokumen_keterangan/';
			// 	$name = 'dokumen_keterangan';
			// 	$pecah = explode(".", $_FILES['dokumen_keterangan']['name']);
			// 	$ext = end($pecah);
			// 	$rename = url_title(strtolower($input['nik_baru'])).'.'.$ext;
			// 	// $rename = url_title($input['foto'], 'dash', TRUE);

			// 	$upload = $this->m_query->unggah_historical($path, $name, $rename);
			// 	if ($upload == true) {
			// 		# code...
			// 		$input['dokumen_keterangan'] = $rename;
			// 		// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
			// 	} else {
			// 		$response = [
			// 			'message'	=> 'Data gagal disimpan ktp',
			// 			'status'	=> 'error'
			// 		];
			// 		redirect('historical_mutasi_rotasi/approve');
			// 	}
				
			// }
			// $save30 = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);

			// Where All
			$nik_lama = $this->input->post('nik_lama');
			$input2['nik_baru'] = $this->input->post('nik_baru');
			$input3['nik_sisa_cuti'] = $this->input->post('nik_baru');
			$input4['nik_full_day'] = $this->input->post('nik_baru');
			$input5['nik_non_full'] = $this->input->post('nik_baru');
			$input6['nik_absen'] = $this->input->post('nik_baru');
			$input7['nik_cuti_khusus'] = $this->input->post('nik_baru');
			$input8['nik_shift'] = $this->input->post('nik_baru');
			$where_nik = array('nik_baru'=>$nik_lama);
			$where_sisa_cuti = array('nik_sisa_cuti'=>$nik_lama);
			$where_full_day = array('nik_full_day'=>$nik_lama);
			$where_non_full = array('nik_non_full'=>$nik_lama);
			$where_manual_absen = array('nik_absen'=>$nik_lama);
			$where_cuti_khusus = array('nik_cuti_khusus'=>$nik_lama);
			$where_shift = array('nik_shift'=>$nik_lama);
			$save2 = $this->m_query->update_data('tbl_karyawan_struktur', $input2, $where_nik);
			$save3 = $this->m_query->update_data('tbl_karyawan_induk', $input2, $where_nik);
			$save4 = $this->m_query->update_data('tbl_karyawan_detail', $input2, $where_nik);
			$save4 = $this->m_query->update_data('tbl_karyawan_keluarga', $input2, $where_nik);
			$save5 = $this->m_query->update_data('tbl_karyawan_anak', $input2, $where_nik);
			$save6 = $this->m_query->update_data('tbl_karyawan_susunan_keluarga', $input2, $where_nik);
			$save7 = $this->m_query->update_data('tbl_karyawan_saudara', $input2, $where_nik);
			$save8 = $this->m_query->update_data('tbl_karyawan_darurat', $input2, $where_nik);
			$save9 = $this->m_query->update_data('tbl_karyawan_pendidikan', $input2, $where_nik);
			$save10 = $this->m_query->update_data('tbl_karyawan_pelatihan', $input2, $where_nik);
			$save11 = $this->m_query->update_data('tbl_karyawan_bahasa', $input2, $where_nik);
			$save12 = $this->m_query->update_data('tbl_karyawan_keahlian', $input2, $where_nik);
			$save13 = $this->m_query->update_data('tbl_karyawan_hobi', $input2, $where_nik);
			$save14 = $this->m_query->update_data('tbl_karyawan_pengalaman_kerja', $input2, $where_nik);
			$save15 = $this->m_query->update_data('tbl_karyawan_pengalaman_organisasi', $input2, $where_nik);
			$save16 = $this->m_query->update_data('tbl_karyawan_minat', $input2, $where_nik);
			$save17 = $this->m_query->update_data('tbl_atribut_payroll', $input2, $where_nik);
			$save18 = $this->m_query->update_data('tbl_hak_cuti', $input3, $where_sisa_cuti);
			$save19 = $this->m_query->update_data('tbl_izin_full_day', $input4, $where_full_day);
			$save20 = $this->m_query->update_data('tbl_izin_non_full', $input5, $where_non_full);
			$save21 = $this->m_query->update_data('tbl_karyawan_absen_manual', $input6, $where_manual_absen);
			$save22 = $this->m_query->update_data('tbl_karyawan_backup', $input2, $where_nik);
			$save23 = $this->m_query->update_data('tbl_karyawan_clearance_sheet', $input2, $where_nik);
			$save24 = $this->m_query->update_data('tbl_karyawan_cuti_khusus', $input7, $where_cuti_khusus);
			$save25 = $this->m_query->update_data('tbl_karyawan_cuti_tahunan', $input3, $where_sisa_cuti);
			$save26 = $this->m_query->update_data('tbl_karyawan_historical', $input2, $where_nik);
			$save27 = $this->m_query->update_data('tbl_karyawan_historical_violance', $input2, $where_nik);
			$save28 = $this->m_query->update_data('tmp_hak_cuti', $input3, $where_sisa_cuti);
			$save29 = $this->m_query->update_data('tmp_karyawan_shift', $input8, $where_shift);

			if($save) {
				$response = [
					'message'	=> 'Data berhasil dihapus',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
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

	public function approve_atasan()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_mutasi_rotasi');
			$input['status_atasan'] = "1";
			$input['tanggal_approval'] = $this->input->post('tanggal_approval');

			$where = array('id_mutasi_rotasi'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_historical_mutasi', $input, $where);
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

	function update_project(){
		$hariini = date('Y-m-d');
		$query	= "SELECT 
			absensi_new.`tbl_karyawan_struktur`.`nik_baru`
			, absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`lokasi_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
			, absensi_new.`tbl_karyawan_struktur`.`jabatan_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
			, absensi_new.`tbl_karyawan_project`.`start_date`
			, absensi_new.`tbl_karyawan_project`.`end_date`
			, absensi_new.`tbl_karyawan_project`.`end_date` AS end_date_tambah
		FROM absensi_new.`tbl_karyawan_project`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_project`.`nik_karyawan` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		WHERE (absensi_new.`tbl_karyawan_project`.`end_date`) = '$hariini'";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$nik=$row->nik_baru;
			$end=$row->end_date;
			$deadline=$row->end_date_tambah;
			$lokasi_lama=$row->lokasi_struktur;
			$jabatan_lama=$row->jabatan_struktur;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_karyawan_struktur` SET absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi_lama', absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '$jabatan_lama', absensi_new.`tbl_karyawan_struktur`.`status_hrd` = NULL  WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik' ";
				$this->db2->query($query);

				$query2	= "UPDATE `absensi_new`.`tbl_karyawan_project` SET `status_project` = '1'
				WHERE `nik_karyawan` = '$nik' and `end_date` = '$end'";
				$this->db2->query($query2);

				echo ($nik);
			}
		}
	}

	function update_start_tkbm(){
		$hariini = date('Y-m-d');
		$query	= "SELECT 
			*
		FROM absensi_new.`tbl_karyawan_tkbm`
		WHERE absensi_new.`tbl_karyawan_tkbm`.`start_date` = '$hariini'";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$nik=$row->nik;
			$start=$row->start_date;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($start) - strtotime($today);
			if($diffInSeconds<0){

				$query2	= "UPDATE `absensi_new`.`tbl_karyawan_tkbm` SET `status` = '1'
				WHERE `nik` = '$nik' and `start_date` = '$start'";
				$this->db2->query($query2);

				echo ($nik);
			}
		}
	}

	function update_end_tkbm(){
		$hariini = date('Y-m-d');
		$query	= "SELECT 
			*
			, absensi_new.`tbl_karyawan_tkbm`.`end_date` + INTERVAL 1 DAY AS tanggal_deadline
		FROM absensi_new.`tbl_karyawan_tkbm`
		WHERE absensi_new.`tbl_karyawan_tkbm`.`end_date` = '$hariini'";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$nik=$row->nik;
			$end=$row->tanggal_deadline;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($end) - strtotime($today);
			if($diffInSeconds<0){

				$query2	= "UPDATE `absensi_new`.`tbl_karyawan_tkbm` SET `status` = '2'
				WHERE `nik` = '$nik' and `status` = '1'";
				$this->db2->query($query2);

				echo ($nik);
			}
		}
	}

	function hangus_mutasi_rotasi(){
		$query	= "
			SELECT 
				absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_pengajuan` + INTERVAL 14 DAY AS tanggal_deadline
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_1`
			FROM absensi_new.`tbl_karyawan_historical_mutasi`
			WHERE absensi_new.`tbl_karyawan_historical_mutasi`.`status_1` = 0";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$id_mutasi_rotasi=$row->id_mutasi_rotasi;
			$deadline=$row->tanggal_deadline;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_karyawan_historical_mutasi` SET absensi_new.`tbl_karyawan_historical_mutasi`.`status_1` = 3 WHERE absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi` = $id_mutasi_rotasi";
				$this->db2->query($query);
				echo ($id_mutasi_rotasi);
			}
		}
	}

	function update_project_tkbm(){
		$hariini = date('Y-m-d');
		$query	= "SELECT 
			absensi_new.`tbl_karyawan_struktur`.`nik_baru`
			, absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`lokasi_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
			, absensi_new.`tbl_karyawan_struktur`.`jabatan_struktur`
			, absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
			, absensi_new.`tbl_karyawan_project_tkbm`.`start_date`
			, absensi_new.`tbl_karyawan_project_tkbm`.`end_date`
			, absensi_new.`tbl_karyawan_project_tkbm`.`end_date` AS end_date_tambah
		FROM absensi_new.`tbl_karyawan_project_tkbm`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_project_tkbm`.`nik_karyawan` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		WHERE (absensi_new.`tbl_karyawan_project_tkbm`.`end_date`) = '$hariini'";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$nik=$row->nik_baru;
			$end=$row->end_date;
			$deadline=$row->end_date_tambah;
			$lokasi_lama=$row->lokasi_struktur;
			$jabatan_lama=$row->jabatan_struktur;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_karyawan_struktur` SET absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi_lama', absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '$jabatan_lama', absensi_new.`tbl_karyawan_struktur`.`status_hrd` = NULL  WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik' ";
				$this->db2->query($query);

				$query2	= "UPDATE `absensi_new`.`tbl_karyawan_project_tkbm` SET `status_project` = '1'
				WHERE `nik_karyawan` = '$nik' and `end_date` = '$end'";
				$this->db2->query($query2);

				echo ($nik);
			}
		}
	}

}