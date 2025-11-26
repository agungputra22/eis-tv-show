<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resign_clearance extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index_spv_admin()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$lokasi = users('lokasi_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet($lokasi)->result_array();
		$this->load->view('admin/resign_clearance/index_spv_admin', $data);
	}

	public function edit_spv_admin($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$lokasi = users('lokasi_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet($lokasi, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_spv_admin', $data);
	}

	public function doUpdate_spv_admin()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$pinjaman_fa = $this->input->post('pinjaman_fa');
			$esco_fa = $this->input->post('esco_fa');
			$pembebanan_op = $this->input->post('pembebanan_op');
			$seragam_hrd = $this->input->post('seragam_hrd');
			$mis_laptop = $this->input->post('mis_laptop');
			$mis_komputer = $this->input->post('mis_komputer');
			$mis_hp = $this->input->post('mis_hp');
			$mis_mouse = $this->input->post('mis_mouse');
			$kendaraan_ga = $this->input->post('kendaraan_ga');
			$id_card_ga = $this->input->post('id_card_ga');
			$ketetapan_qo = $this->input->post('ketetapan_qo');
			$action_plan = $this->input->post('action_plan');
			$laporan_qo = $this->input->post('laporan_qo');
			$dokumen_smm = $this->input->post('dokumen_smm');

			if ($pinjaman_fa == 1) {
				$input['pinjaman_fa'] = 1;
			} else{
				$input['pinjaman_fa'] = 0;
			}

			if ($esco_fa == 1) {
				$input['esco_fa'] = 1;
			} else{
				$input['esco_fa'] = 0;
			}

			if ($pembebanan_op == 1) {
				$input['pembebanan_op'] = 1;
			} else{
				$input['pembebanan_op'] = 0;
			}

			if ($seragam_hrd == 1) {
				$input['seragam_hrd'] = 1;
			} else{
				$input['seragam_hrd'] = 0;
			}

			if ($mis_laptop == 1) {
				$input['mis_laptop'] = 1;
			} else{
				$input['mis_laptop'] = 0;
			}

			if ($mis_komputer == 1) {
				$input['mis_komputer'] = 1;
			}
			else {
				$input['mis_komputer'] = 0;
			}

			if ($mis_hp == 1) {
				$input['mis_hp'] = 1;
			}
			else {
				$input['mis_hp'] = 0;
			}

			if ($mis_mouse == 1) {
				$input['mis_mouse'] = 1;
			}
			else {
				$input['mis_mouse'] = 0;
			}

			if ($kendaraan_ga == 1) {
				$input['kendaraan_ga'] = 1;
			} else{
				$input['kendaraan_ga'] = 0;
			}

			if ($id_card_ga == 1) {
				$input['id_card_ga'] = 1;
			} else{
				$input['id_card_ga'] = 0;
			}

			if ($ketetapan_qo == 1) {
				$input['ketetapan_qo'] = 1;
			} else{
				$input['ketetapan_qo'] = 0;
			}

			if ($action_plan == 1) {
				$input['action_plan'] = 1;
			} else{
				$input['action_plan'] = 0;
			}

			if ($laporan_qo == 1) {
				$input['laporan_qo'] = 1;
			} else{
				$input['laporan_qo'] = 0;
			}

			if ($dokumen_smm == 1) {
				$input['dokumen_smm'] = 1;
			} else{
				$input['dokumen_smm'] = 0;
			}

			$input['besar_pinjaman_fa'] = $this->input->post('besar_pinjaman_fa');
			$input['tanggal_pinjaman_fa'] = $this->input->post('tanggal_pinjaman_fa');
			$input['no_esco_fa'] = $this->input->post('no_esco_fa');
			$input['status_fa'] = 1;
			$input['besar_pembebanan_op'] = $this->input->post('besar_pembebanan_op');
			$input['tanggal_pembebanan_op'] = $this->input->post('tanggal_pembebanan_op');
			$input['status_wop'] = 1;
			$input['kembali_seragam'] = $this->input->post('kembali_seragam');
			$input['qty_seragam'] = $this->input->post('qty_seragam');
			$input['status_hrd'] = 1;
			$input['pass_komputer'] = $this->input->post('pass_komputer');
			$input['pass_email'] = $this->input->post('pass_email');
			$input['status_ict'] = 1;
			$input['jenis_kendaraan'] = $this->input->post('jenis_kendaraan');
			$input['tanggal_kembali_kendaraan'] = $this->input->post('tanggal_kembali_kendaraan');
			$input['kondisi_kendaraan'] = $this->input->post('kondisi_kendaraan');
			$input['tanggal_kembali_id_card'] = $this->input->post('tanggal_kembali_id_card');
			$input['kondisi_id_card'] = $this->input->post('kondisi_id_card');
			$input['status_ga'] = 1;
			$input['status_qms'] = 1;
			// $input['status_pengajuan'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);

			$nik_resign = $this->input->post('nik_baru');
			$input4['status_clearance'] = 1;

			$where4 = array('nik_baru'=>$nik_resign);
			$save4 = $this->m_query->update_data('tbl_karyawan_resign', $input4, $where4);

			if($save4) {
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

	public function index_ict()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_ict', $data);
	}

	public function edit_ict($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_ict', $data);
	}

	public function doUpdate_ict()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$mis_laptop = $this->input->post('mis_laptop');
			$mis_komputer = $this->input->post('mis_komputer');
			$mis_hp = $this->input->post('mis_hp');
			$mis_mouse = $this->input->post('mis_mouse');

			if ($mis_laptop == 1) {
				$input['mis_laptop'] = 1;
			} else{
				$input['mis_laptop'] = 0;
			}

			if ($mis_komputer == 1) {
				$input['mis_komputer'] = 1;
			}
			else {
				$input['mis_komputer'] = 0;
			}

			if ($mis_hp == 1) {
				$input['mis_hp'] = 1;
			}
			else {
				$input['mis_hp'] = 0;
			}

			if ($mis_mouse == 1) {
				$input['mis_mouse'] = 1;
			}
			else {
				$input['mis_mouse'] = 0;
			}

			$input['pass_komputer'] = $this->input->post('pass_komputer');
			$input['pass_email'] = $this->input->post('pass_email');
			$input['status_ict'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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

	public function index_fa()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_fa', $data);
	}

	public function edit_fa($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_fa', $data);
	}

	public function doUpdate_fa()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$pinjaman_fa = $this->input->post('pinjaman_fa');
			$esco_fa = $this->input->post('esco_fa');

			if ($pinjaman_fa == 1) {
				$input['pinjaman_fa'] = 1;
			} else{
				$input['pinjaman_fa'] = 0;
			}

			if ($esco_fa == 1) {
				$input['esco_fa'] = 1;
			} else{
				$input['esco_fa'] = 0;
			}

			$input['besar_pinjaman_fa'] = $this->input->post('besar_pinjaman_fa');
			$input['tanggal_pinjaman_fa'] = $this->input->post('tanggal_pinjaman_fa');
			$input['no_esco_fa'] = $this->input->post('no_esco_fa');
			$input['status_fa'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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

	public function index_wop()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_wop', $data);
	}

	public function edit_wop($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_wop', $data);
	}

	public function doUpdate_wop()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$pembebanan_op = $this->input->post('pembebanan_op');

			if ($pembebanan_op == 1) {
				$input['pembebanan_op'] = 1;
			} else{
				$input['pembebanan_op'] = 0;
			}

			$input['besar_pembebanan_op'] = $this->input->post('besar_pembebanan_op');
			$input['tanggal_pembebanan_op'] = $this->input->post('tanggal_pembebanan_op');
			$input['status_wop'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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

	public function index_hrd()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_hrd', $data);
	}

	public function edit_hrd($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_hrd', $data);
	}

	public function doUpdate_hrd()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$seragam_hrd = $this->input->post('seragam_hrd');

			if ($seragam_hrd == 1) {
				$input['seragam_hrd'] = 1;
			} else{
				$input['seragam_hrd'] = 0;
			}

			$input['kembali_seragam'] = $this->input->post('kembali_seragam');
			$input['qty_seragam'] = $this->input->post('qty_seragam');
			$input['status_hrd'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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

	public function index_ga()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_ga', $data);
	}

	public function edit_ga($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_ga', $data);
	}

	public function doUpdate_ga()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$kendaraan_ga = $this->input->post('kendaraan_ga');
			$id_card_ga = $this->input->post('id_card_ga');

			if ($kendaraan_ga == 1) {
				$input['kendaraan_ga'] = 1;
			} else{
				$input['kendaraan_ga'] = 0;
			}

			if ($id_card_ga == 1) {
				$input['id_card_ga'] = 1;
			} else{
				$input['id_card_ga'] = 0;
			}

			$input['jenis_kendaraan'] = $this->input->post('jenis_kendaraan');
			$input['tanggal_kembali_kendaraan'] = $this->input->post('tanggal_kembali_kendaraan');
			$input['kondisi_kendaraan'] = $this->input->post('kondisi_kendaraan');
			$input['tanggal_kembali_id_card'] = $this->input->post('tanggal_kembali_id_card');
			$input['kondisi_id_card'] = $this->input->post('kondisi_id_card');
			$input['status_ga'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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

	public function index_qms()
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
		
		$data['title'] = "Karyawan Resign (Clearance Sheet)";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_query->index_clearance_sheet_pusat($dept)->result_array();
		$this->load->view('admin/resign_clearance/index_qms', $data);
	}

	public function edit_qms($id)
	{
		$data['title'] = "Karyawan Resign (Clearance Sheet) (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_query->detail_clearance_sheet_pusat($dept, $id)->row_array();
		$this->load->view('admin/resign_clearance/edit_qms', $data);
	}

	public function doUpdate_qms()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$ketetapan_qo = $this->input->post('ketetapan_qo');
			$action_plan = $this->input->post('action_plan');
			$laporan_qo = $this->input->post('laporan_qo');
			$dokumen_smm = $this->input->post('dokumen_smm');

			if ($ketetapan_qo == 1) {
				$input['ketetapan_qo'] = 1;
			} else{
				$input['ketetapan_qo'] = 0;
			}

			if ($action_plan == 1) {
				$input['action_plan'] = 1;
			} else{
				$input['action_plan'] = 0;
			}

			if ($laporan_qo == 1) {
				$input['laporan_qo'] = 1;
			} else{
				$input['laporan_qo'] = 0;
			}

			if ($dokumen_smm == 1) {
				$input['dokumen_smm'] = 1;
			} else{
				$input['dokumen_smm'] = 0;
			}

			$input['status_qms'] = 1;

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
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