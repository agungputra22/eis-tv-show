<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual_absen extends CI_Controller {

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
		
		$data['title'] = "Data Absen Manual Masuk";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->select_row_data('*', 'tbl_karyawan_absen_manual', array('nik_absen'=>$nik_baru))->result_array();
		$this->load->view('admin/izin/manual_absen/index', $data);
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
			
			$data['title'] = "Data Approval Absen Manual";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_manual_absen_approve_level1($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_manual_absen_approve_level1($jabatan);
			$this->load->view('admin/izin/manual_absen/approve', $data);
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
			
			$data['title'] = "Data Approval Absen Manual";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->approve_manual_absen_approve_level1($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_manual_absen_approve_level1($jabatan);
			$this->load->view('admin/izin/manual_absen/approve', $data);
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
			
			$data['title'] = "Data Approval Absen Manual";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->approve_manual_absen_approve_level1($jabatan);
			$data['not_approve'] = $this->m_admin->not_approve_manual_absen_approve_level1($jabatan);
			$this->load->view('admin/izin/manual_absen/approve', $data);
		}
	}

	public function approve_level_2()
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
			
			$data['title'] = "Data Approval Manual Absen";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->manual_absen_approve_level2($jabatan);
			$data['not_approve'] = $this->m_admin->manual_absen_not_approve_level2($jabatan);
			$this->load->view('admin/izin/manual_absen/approve_level_2', $data);
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
			
			$data['title'] = "Data Approval Manual Absen";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->m_admin->manual_absen_approve_level2($jabatan);
			$data['not_approve'] = $this->m_admin->manual_absen_not_approve_level2($jabatan);
			$this->load->view('admin/izin/manual_absen/approve_level_2', $data);
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
			
			$data['title'] = "Data Approval Manual Absen";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_manual_absen_level_2($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->m_admin->manual_absen_approve_level2($jabatan);
			$data['not_approve'] = $this->m_admin->manual_absen_not_approve_level2($jabatan);
			$this->load->view('admin/izin/manual_absen/approve_level_2', $data);
		}
	}

	public function tambah()
	{
		$data['title'] = "Form Absen Manual";
		$data['lokasi'] = $this->m_admin->getdepo_sn()->result();
		$this->load->view('admin/izin/manual_absen/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Approval Absen Manual (".$id.")";
		$data['edit'] = $this->m_admin->izin_manual_absen($id)->row_array();
		$this->load->view('admin/izin/manual_absen/tindakan', $data);
	}

	public function edit_level_2($id)
	{
		$data['title'] = "Approval Absen Manual (".$id.")";
		$data['edit'] = $this->m_admin->izin_manual_absen($id)->row_array();
		$this->load->view('admin/izin/manual_absen/tindakan_level_2', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_absen', 'nik_absen', 'required');
		if($this->form_validation->run()===TRUE) {
			$jenis_absen = $this->input->post('jenis_absen');
			if ($jenis_absen == 'IN' OR $jenis_absen == 'OUT') {
				# code...
				// $input['userid'] = $this->input->post('userid');
				$input['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
				$input['nik_absen'] = $this->input->post('nik_absen');
				$input['jabatan_absen'] = $this->input->post('jabatan_absen');
				$input['lokasi_absen'] = $this->input->post('lokasi_absen');
				$input['jenis_absen'] = $this->input->post('jenis_absen');
				$input['tanggal_absen'] = $this->input->post('tanggal_absen');
				$input['waktu_absen'] = $this->input->post('waktu_absen');
				$input['ket_absen'] = $this->input->post('ket_absen');
				$input['status'] = "0";
				$input['status_2'] = "0";

				$save 		= $this->m_query->insert_data('tbl_karyawan_absen_manual', $input);
			} 
			if ($jenis_absen == 'IN & OUT') {
				// $userid = $this->input->post('userid');
				$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
				$nik_absen = $this->input->post('nik_absen');
				$jabatan_absen = $this->input->post('jabatan_absen');
				$lokasi_absen = $this->input->post('lokasi_absen');
				$jenis_absen = $this->input->post('jenis_absen');
				$tanggal_absen = $this->input->post('tanggal_absen_2');
				$waktu_absen = $this->input->post('waktu_in_out');
				$ket_absen = $this->input->post('ket_absen');
				$status = "0";
				$status_2 = "0";

					for ($i=0; $i < count($waktu_absen); $i++) { 
					# code...
					// $input['userid'] = $userid;
					$input['tanggal_pengajuan'] = $tanggal_pengajuan;
					$input['nik_absen'] = $nik_absen;
					$input['jabatan_absen'] = $jabatan_absen;
					$input['lokasi_absen'] = $lokasi_absen;
					$input['jenis_absen'] = $jenis_absen;
					$input['tanggal_absen'] = $tanggal_absen;
					$input['waktu_absen'] = $waktu_absen[$i];
					$input['ket_absen'] = $ket_absen;
					$input['status'] = $status;
					$input['status_2'] = $status_2;

					$save 		= $this->m_query->insert_data('tbl_karyawan_absen_manual', $input);
					
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
				'message'	=> 'Akses gagal',
				'status'	=> 'warning'
			];
		}
		output_json($response);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_absen', 'nik_absen', 'required');
		if($this->form_validation->run()===TRUE) {
			$tindakan = $this->input->post('status');

			if ($tindakan == '1') {
				$status = $this->input->post('jenis_absen');
				if ($status == 'IN') {
					$badgenumber = $this->input->post('nik_absen');
					$shift_day = $this->input->post('tanggal_absen');
					$input2['in_manual'] = $this->input->post('waktu_absen');
					$where2 = array('shift_day'=>$shift_day, 'badgenumber'=>$badgenumber);
					$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);
				}
				if ($status == 'OUT') {
					$badgenumber = $this->input->post('nik_absen');
					$shift_day = $this->input->post('tanggal_absen');
					$input2['out_manual'] = $this->input->post('waktu_absen');
					$where2 = array('shift_day'=>$shift_day, 'badgenumber'=>$badgenumber);
					$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);
				}

				$id = $this->input->post('id_absen');
				$input['status'] = $this->input->post('status');
				$input['tanggal'] = $this->input->post('tanggal');

				$where = array('id_absen'=>$id);
				$save = $this->m_query->update_data('tbl_karyawan_absen_manual', $input, $where);

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
			} elseif ($tindakan == '2') {
				$id = $this->input->post('id_absen');
				$input['status'] = $this->input->post('status');
				$input['tanggal'] = $this->input->post('tanggal');

				$where = array('id_absen'=>$id);
				$save2 = $this->m_query->update_data('tbl_karyawan_absen_manual', $input, $where);

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

	public function doUpdate_level_2()
	{
		$this->form_validation->set_rules('nik_absen', 'nik_absen', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_absen');
			$input['status'] = $this->input->post('status_2');
			$input['status_2'] = $this->input->post('status_2');
			$input['tanggal_2'] = $this->input->post('tanggal_2');

			$where = array('id_absen'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_absen_manual', $input, $where);
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
		
		$data['title'] = "Data Approved Manual Absen";
		$nik_baru = users('nik_baru');
		$jabatan = users('jabatan_struktur');
		$data['listdata'] = $this->m_admin->index_manual_absen_approve_level1($jabatan)->result_array();
		$this->load->view('admin/izin/manual_absen/view_approve_level_1', $data);
	}

	public function view_not_approve_level_1()
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
		
		$data['title'] = "Data Not Approved Manual Absen";
		$nik_baru = users('nik_baru');
		$jabatan = users('jabatan_struktur');
		$data['listdata'] = $this->m_admin->index_manual_absen_not_approve_level1($jabatan)->result_array();
		$this->load->view('admin/izin/manual_absen/view_not_approve_level_1', $data);
	}

	public function view_approve_level_2()
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
		
		$data['title'] = "Data Approved Manual Absen";
		$nik_baru = users('nik_baru');
		$jabatan = users('jabatan_struktur');
		$data['listdata'] = $this->m_admin->index_approve_manual_absen_level_2($jabatan)->result_array();
		$this->load->view('admin/izin/manual_absen/view_approve_level_2', $data);
	}

	public function view_not_approve_level_2()
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
		
		$data['title'] = "Data Not Approved Manual Absen";
		$nik_baru = users('nik_baru');
		$jabatan = users('jabatan_struktur');
		$data['listdata'] = $this->m_admin->index_not_approve_manual_absen_level_2($jabatan)->result_array();
		$this->load->view('admin/izin/manual_absen/view_not_approve_level_2', $data);
	}

}