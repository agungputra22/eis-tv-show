<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptk extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
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
		
		$data['title'] = "Data Permintaan Tenaga Kerja";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_admin->index_karyawan_ptk(array('nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/ptk/index', $data);
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
			
			$data['title'] = "Data Approval Permintaan Tenaga Kerja";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_ptk_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/ptk/approve', $data);
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
			
			$data['title'] = "Data Approval Permintaan Tenaga Kerja";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_ptk_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/ptk/approve', $data);
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
			
			$data['title'] = "Data Approval Permintaan Tenaga Kerja";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_ptk_approve($jabatan, $lokasi)->result_array();
			$this->load->view('admin/ptk/approve', $data);
		}
		
	}

	public function tambah()
	{
		$data['title'] = "Form Permintaan Tenaga Kerja";
		$nik = users('nik_baru');
		$dept = users('dept_struktur');
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['depo'] = $this->m_admin->data_depo()->result();
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_ptk();
		if ($nik == '0100001000') {
			$data['jabatan'] = $this->m_query->index_jabatan_ptk_case()->result();
		} elseif ($nik == '0100000200') {
			$data['jabatan'] = $this->m_query->index_jabatan_ptk_permintaan()->result();
		} elseif ($nik == '0100001800') {
			$data['jabatan'] = $this->m_query->index_jabatan_ptk_gm()->result();
		} else {
			$data['jabatan'] = $this->m_query->index_jabatan_ptk($dept)->result();
		}
		$this->load->view('admin/ptk/tambah', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_pengajuan', 'nik_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['no_urut'] = $this->input->post('no_urut');
			$input['no_pengajuan'] = $this->input->post('no_pengajuan');
			$input['nik_pengajuan'] = $this->input->post('nik_pengajuan');
			$input['jabatan_karyawan'] = $this->input->post('jabatan_karyawan');
			$input['jabatan_ptk'] = $this->input->post('jabatan_ptk');
			$input['depo_ptk'] = $this->input->post('depo_ptk');
			$input['dept_ptk'] = $this->input->post('dept_ptk');
			$input['analisa'] = $this->input->post('analisa');
			$input['tenaga_kerja'] = $this->input->post('tenaga_kerja');
			$input['status_atasan'] = '0';
			$input['status_hrd'] = '0';
			$save 		= $this->m_query->insert_data('tbl_karyawan_ptk', $input);
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

	public function edit($id)
	{
		$data['title'] = "Approval PTK (".$id.")";
		$data['edit'] = $this->m_admin->edit_ptk(array('id' => $id))->row_array();
		$this->load->view('admin/ptk/edit_approve', $data);
	}

	public function index_work_load()
	{		
		$data['title'] = "Data Jabatan Departement";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_admin->index_work_load_jabatan($dept)->result_array();
		$this->load->view('admin/ptk/index_work_load', $data);
	}

	public function index_work_load_manager()
	{		
		$data['title'] = "Data Jabatan Departement";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_admin->index_work_load_jabatan_manager($dept)->result_array();
		$this->load->view('admin/ptk/index_work_load_manager', $data);
	}

	public function edit_work_load($id)
	{
		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/ptk/edit_work_load', $data);
	}

	public function edit_work_load_manager($id)
	{
		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load_manager(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		// $data['edit'] = $this->m_query->select_row_data('*', 'tbl_jabatan_karyawan', array('no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/ptk/edit_work_load_manager', $data);
	}

	public function edit_histori_work_load($id)
	{
		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		$data['deskripsi'] = $this->m_query->select_row_data('*', 'tbl_jabatan_deskripsi', array('no_jabatan_karyawan'=>$id), null)->row_array();
		$data['jabatan_proses'] = $this->m_query->select_row_data('*', 'tbl_jabatan_proses', array('no_jabatan_karyawan'=>$id), null)->result_array();
		$data['beban_daily'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'1'), null)->result_array();
		$data['beban_weakly'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'2'), null)->result_array();
		$data['beban_monthly'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'3'), null)->result_array();
		$data['resiko'] = $this->m_query->select_row_data('*', 'tbl_jabatan_resiko', array('no_jabatan_karyawan'=>$id), null)->result_array();
		$this->load->view('admin/ptk/edit_histori_work_load', $data);
	}

	public function print_jabatan($id)
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

		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$data['edit'] = $this->m_admin->index_work_load_detail(array('no_jabatan_karyawan'=>$id))->row_array();
		$data['deskripsi'] = $this->m_query->select_row_data('*', 'tbl_jabatan_deskripsi', array('no_jabatan_karyawan'=>$id))->row_array();
		$data['proses'] = $this->m_query->select_row_data('*', 'tbl_jabatan_proses', array('no_jabatan_karyawan'=>$id))->result_array();
		$data['analisa_1'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'1'))->result_array();
		$data['analisa_1_sum'] = $this->m_query->select_row_data('sum(tbl_jabatan_analisa.jam)*25 as sum_1', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'1'))->row_array();

		$data['analisa_2'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'2'))->result_array();
		$data['analisa_2_sum'] = $this->m_query->select_row_data('sum(tbl_jabatan_analisa.jam)*4 as sum_2', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'2'))->row_array();

		$data['analisa_3'] = $this->m_query->select_row_data('*', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'3'))->result_array();
		$data['analisa_3_sum'] = $this->m_query->select_row_data('sum(tbl_jabatan_analisa.jam)*1 as sum_3', 'tbl_jabatan_analisa', array('no_jabatan_karyawan'=>$id, 'status'=>'3'))->row_array();

		$data['resiko'] = $this->m_query->select_row_data('*', 'tbl_jabatan_resiko', array('no_jabatan_karyawan'=>$id))->result_array();
		$this->load->view('admin/ptk/print_jabatan', $data);
	}

	public function doInput_work_load()
	{
		$this->form_validation->set_rules('no_jabatan_karyawan', 'no_jabatan_karyawan', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_jabatan_karyawan = $this->input->post('no_jabatan_karyawan');
			$deskripsi = $this->input->post('deskripsi');
			$input = $this->input->post('input');
			$proses = $this->input->post('proses');
			$output = $this->input->post('output');
			$detail_deskripsi = $this->input->post('detail_deskripsi');
			$jam = $this->input->post('jam');
			$keterangan = $this->input->post('keterangan');
			$status = $this->input->post('status');
			$nama_penyakit = $this->input->post('nama_penyakit');
			$penyebab = $this->input->post('penyebab');

			if (!empty($input)) {
				for ($i=0; $i < count($input); $i++) { 
					# code...
					$input2['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input2['input'] = $input[$i];
					$input2['proses'] = $proses[$i];
					$input2['output'] = $output[$i];

					$this->m_query->insert_data('tbl_jabatan_proses', $input2);
				}
			}

			if (!empty($detail_deskripsi)) {
				for ($i=0; $i < count($detail_deskripsi); $i++) { 
					# code...
					$input3['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input3['detail_deskripsi'] = $detail_deskripsi[$i];
					$input3['jam'] = $jam[$i];
					$input3['keterangan'] = $keterangan[$i];
					$input3['status'] = $status[$i];

					$this->m_query->insert_data('tbl_jabatan_analisa', $input3);
				}
			}

			if (!empty($nama_penyakit)) {
				for ($i=0; $i < count($nama_penyakit); $i++) { 
					# code...
					$input4['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input4['nama_penyakit'] = $nama_penyakit[$i];
					$input4['penyebab'] = $penyebab[$i];

					$this->m_query->insert_data('tbl_jabatan_resiko', $input4);
				}
			}

			$input5['no_jabatan_karyawan'] = $this->input->post('no_jabatan_karyawan');
			$input5['deskripsi'] = $this->input->post('deskripsi');
			$save = $this->m_query->insert_data('tbl_jabatan_deskripsi', $input5);

			$input6['status_wla'] = '1';

			$where = array('no_jabatan_karyawan'=>$no_jabatan_karyawan);
			$save2 = $this->m_query->update_data('tbl_jabatan_karyawan', $input6, $where);
			
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

	public function doUpdate_work_load()
	{
		$this->form_validation->set_rules('no_jabatan_karyawan', 'no_jabatan_karyawan', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_jabatan_karyawan = $this->input->post('no_jabatan_karyawan');
			$deskripsi = $this->input->post('deskripsi');
			$id_proses = $this->input->post('id_proses');
			$input = $this->input->post('input');
			$proses = $this->input->post('proses');
			$output = $this->input->post('output');
			$id_analisa = $this->input->post('id_analisa');
			$detail_deskripsi = $this->input->post('detail_deskripsi');
			$jam = $this->input->post('jam');
			$keterangan = $this->input->post('keterangan');
			$status = $this->input->post('status');
			$id_resiko = $this->input->post('id_resiko');
			$nama_penyakit = $this->input->post('nama_penyakit');
			$penyebab = $this->input->post('penyebab');

			if (!empty($input)) {
				for ($i=0; $i < count($input); $i++) { 
					# code...
					$id2 = $id_proses[$i];
					$input2['input'] = $input[$i];
					$input2['proses'] = $proses[$i];
					$input2['output'] = $output[$i];

					$where2 = array('id'=>$id2);
					$this->m_query->update_data('tbl_jabatan_proses', $input2, $where2);
				}
			}

			if (!empty($detail_deskripsi)) {
				for ($i=0; $i < count($detail_deskripsi); $i++) { 
					# code...
					$id3 = $id_analisa[$i];
					$input3['detail_deskripsi'] = $detail_deskripsi[$i];
					$input3['jam'] = $jam[$i];
					$input3['keterangan'] = $keterangan[$i];
					$input3['status'] = $status[$i];

					$where3 = array('id'=>$id3);
					$this->m_query->update_data('tbl_jabatan_analisa', $input3, $where3);
				}
			}

			if (!empty($nama_penyakit)) {
				for ($i=0; $i < count($nama_penyakit); $i++) { 
					# code...
					$id4 = $id_resiko[$i];
					$input4['nama_penyakit'] = $nama_penyakit[$i];
					$input4['penyebab'] = $penyebab[$i];

					$where4 = array('id'=>$id4);
					$this->m_query->update_data('tbl_jabatan_resiko', $input4, $where4);
				}
			}

			$input_tambah = $this->input->post('input_tambah');
			$proses_tambah = $this->input->post('proses_tambah');
			$output_tambah = $this->input->post('output_tambah');
			$detail_deskripsi_tambah = $this->input->post('detail_deskripsi_tambah');
			$jam_tambah = $this->input->post('jam_tambah');
			$keterangan_tambah = $this->input->post('keterangan_tambah');
			$status_tambah = $this->input->post('status_tambah');
			$nama_penyakit_tambah = $this->input->post('nama_penyakit_tambah');
			$penyebab_tambah = $this->input->post('penyebab_tambah');

			if (!empty($input_tambah)) {
				for ($i=0; $i < count($input_tambah); $i++) { 
					# code...
					$input2['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input2['input'] = $input_tambah[$i];
					$input2['proses'] = $proses_tambah[$i];
					$input2['output'] = $output_tambah[$i];

					$this->m_query->insert_data('tbl_jabatan_proses', $input2);
				}
			}

			if (!empty($detail_deskripsi_tambah)) {
				for ($i=0; $i < count($detail_deskripsi_tambah); $i++) { 
					# code...
					$input3['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input3['detail_deskripsi'] = $detail_deskripsi_tambah[$i];
					$input3['jam'] = $jam_tambah[$i];
					$input3['keterangan'] = $keterangan_tambah[$i];
					$input3['status'] = $status_tambah[$i];

					$this->m_query->insert_data('tbl_jabatan_analisa', $input3);
				}
			}

			if (!empty($nama_penyakit_tambah)) {
				for ($i=0; $i < count($nama_penyakit_tambah); $i++) { 
					# code...
					$input4['no_jabatan_karyawan'] = $no_jabatan_karyawan;
					$input4['nama_penyakit'] = $nama_penyakit_tambah[$i];
					$input4['penyebab'] = $penyebab_tambah[$i];

					$this->m_query->insert_data('tbl_jabatan_resiko', $input4);
				}
			}

			$id5 = $this->input->post('no_jabatan_karyawan');
			$input5['deskripsi'] = $this->input->post('deskripsi');
			$where5 = array('id'=>$id5);
			$save2 = $this->m_query->update_data('tbl_jabatan_deskripsi', $input5, $where5);
			
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

	public function edit_ptk($id)
	{
		$data['title'] = "Saldo PTK";
		$data['edit'] = $this->m_admin->edit_jabatan_ptk($id)->row_array();
		$this->load->view('admin/ptk/edit_ptk', $data);
	}

	public function doInput_ptk()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$no_jabatan = $this->input->post('no_jabatan');
			$saldo = $this->input->post('saldo');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			for ($i=0; $i < count($saldo); $i++) { 
				# code...
				$input['nik_submit'] = $nik_baru;
				$input['no_jabatan_karyawan'] = $no_jabatan;
				$input['saldo'] = $saldo[$i];
				$input['bulan'] = $bulan[$i];
				$input['tahun'] = $tahun[$i];
				$input['jenis'] = '0';

				$save9 		= $this->m_query->insert_data('tbl_jabatan_ptk', $input);
				
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

	public function edit_resign($id)
	{
		$data['title'] = "Saldo PTK (".$id.")";
		$data['edit'] = $this->m_admin->edit_jabatan_ptk($id)->row_array();
		$this->load->view('admin/ptk/edit_resign', $data);
	}

	public function doInput_resign()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$no_jabatan = $this->input->post('no_jabatan');
			$saldo = $this->input->post('saldo');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			for ($i=0; $i < count($saldo); $i++) { 
				# code...
				$input['nik_submit'] = $nik_baru;
				$input['no_jabatan_karyawan'] = $no_jabatan;
				$input['saldo'] = $saldo[$i];
				$input['bulan'] = $bulan[$i];
				$input['tahun'] = $tahun[$i];
				$input['jenis'] = '1';

				$save9 		= $this->m_query->insert_data('tbl_jabatan_ptk', $input);
				
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
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['tanggal_approve'] = date('Y-m-d');
			$input['status_atasan'] = $this->input->post('status_atasan');
			$input['ket_atasan'] = $this->input->post('ket_atasan');

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_ptk', $input, $where);
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

	public function index_jobdesc()
	{		
		$data['title'] = "Data Jabatan Departement";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_admin->index_work_load_jabatan($dept)->result_array();
		$this->load->view('admin/ptk/index_jobdesc', $data);
	}

	public function index_kpi()
	{		
		$data['title'] = "Data Jabatan Departement";
		$dept = users('dept_struktur');
		$data['listdata'] = $this->m_admin->index_work_load_jabatan($dept)->result_array();
		$this->load->view('admin/ptk/index_kpi', $data);
	}

	public function edit_jobdesc($id)
	{
		$data['title'] = "Detail JobDesc Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/ptk/edit_jobdesc', $data);
	}

	public function doInput_jobdesc()
	{
		$this->form_validation->set_rules('no_jabatan_karyawan', 'no_jabatan_karyawan', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik = users('nik_baru');
			$jabatan = $this->input->post('no_jabatan_karyawan');
			$tugas = $this->input->post('tugas');
			$keterangan_wewenang = $this->input->post('keterangan_wewenang');
			$pihak = $this->input->post('pihak');
			$tujuan = $this->input->post('tujuan');
			$status = $this->input->post('status');
			$keterangan = $this->input->post('keterangan');
			$level = $this->input->post('level');
			$status_kompetensi = $this->input->post('status_kompetensi');

			if (!empty($tugas)) {
				for ($i=0; $i < count($tugas); $i++) { 
					# code...
					$input2['nik'] = $nik;
					$input2['jabatan'] = $jabatan;
					$input2['tugas'] = $tugas[$i];

					$this->m_query->insert_data('tbl_jobdesc_tugas', $input2);
				}
			}

			if (!empty($keterangan_wewenang)) {
				for ($i=0; $i < count($keterangan_wewenang); $i++) { 
					# code...
					$input3['nik'] = $nik;
					$input3['jabatan'] = $jabatan;
					$input3['keterangan'] = $keterangan_wewenang[$i];

					$this->m_query->insert_data('tbl_jobdesc_wewenang', $input3);
				}
			}

			if (!empty($pihak)) {
				for ($i=0; $i < count($pihak); $i++) { 
					# code...
					$input4['nik'] = $nik;
					$input4['jabatan'] = $jabatan;
					$input4['pihak'] = $pihak[$i];
					$input4['tujuan'] = $tujuan[$i];
					$input4['status'] = $status[$i];

					$this->m_query->insert_data('tbl_jobdesc_hubungan_kerja', $input4);
				}
			}

			if (!empty($keterangan)) {
				for ($i=0; $i < count($keterangan); $i++) { 
					# code...
					$input7['nik'] = $nik;
					$input7['jabatan'] = $jabatan;
					$input7['keterangan'] = $keterangan[$i];
					$input7['level'] = $level[$i];
					$input7['status'] = $status_kompetensi[$i];

					$this->m_query->insert_data('tbl_jobdesc_kompetensi', $input7);
				}
			}

			$input5['nik'] = users('nik_baru');
			$input5['jabatan'] = $this->input->post('no_jabatan_karyawan');
			$input5['laporan_harian'] = $this->input->post('laporan_harian');
			$input5['kepada_harian'] = $this->input->post('kepada_harian');
			$input5['laporan_bulanan'] = $this->input->post('laporan_bulanan');
			$input5['kepada_bulanan'] = $this->input->post('kepada_bulanan');
			$input5['laporan_tahunan'] = $this->input->post('laporan_tahunan');
			$input5['kepada_tahunan'] = $this->input->post('kepada_tahunan');

			$this->m_query->insert_data('tbl_jobdesc_pelaporan', $input5);

			$input6['nik'] = users('nik_baru');
			$input6['jabatan'] = $this->input->post('no_jabatan_karyawan');
			$input6['pendidikan'] = $this->input->post('pendidikan');
			$input6['nilai'] = $this->input->post('nilai');
			$input6['pengalaman_lulus'] = $this->input->post('pengalaman_lulus');
			$input6['pengalaman_sesuai'] = $this->input->post('pengalaman_sesuai');
			$input6['pengalaman_tidak_sesuai'] = $this->input->post('pengalaman_tidak_sesuai');
			$input6['jenis_kelamin'] = $this->input->post('jenis_kelamin');
			$input6['usia'] = $this->input->post('usia');
			$input6['keahlian'] = $this->input->post('keahlian');

			$this->m_query->insert_data('tbl_jobdesc_spesifikasi', $input6);

			$input['status_jobdesc'] = '1';

			$where = array('no_jabatan_karyawan'=>$jabatan);
			$save2 = $this->m_query->update_data('tbl_jabatan_karyawan', $input, $where);
			
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

	public function edit_histori_jobdesc($id)
	{
		$data['title'] = "Detail JobDesc Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		$data['tugas'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_tugas', array('jabatan'=>$id), null)->result_array();
		$data['wewenang'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_wewenang', array('jabatan'=>$id), null)->result_array();
		$data['kerja_internal'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_hubungan_kerja', array('jabatan'=>$id, 'status'=>'1'), null)->result_array();
		$data['kerja_eksternal'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_hubungan_kerja', array('jabatan'=>$id, 'status'=>'2'), null)->result_array();
		$data['pelaporan'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_pelaporan', array('jabatan'=>$id), null)->row_array();
		$data['spesifikasi'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_spesifikasi', array('jabatan'=>$id), null)->row_array();
		$data['kompetensi_hard'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_kompetensi', array('jabatan'=>$id, 'status'=>'1'), null)->result_array();
		$data['kompetensi_soft'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_kompetensi', array('jabatan'=>$id, 'status'=>'2'), null)->result_array();
		$this->load->view('admin/ptk/edit_histori_jobdesc', $data);
	}

	public function doUpdate_jobdesc()
	{
		$this->form_validation->set_rules('no_jabatan_karyawan', 'no_jabatan_karyawan', 'required');
		if($this->form_validation->run()===TRUE) {
			$no_jabatan_karyawan = $this->input->post('no_jabatan_karyawan');
			$id_tugas = $this->input->post('id_tugas');
			$tugas_edit = $this->input->post('tugas_edit');
			$id_wewenang = $this->input->post('id_wewenang');
			$keterangan_wewenang_edit = $this->input->post('keterangan_wewenang_edit');
			$id_hubungan_kerja = $this->input->post('id_hubungan_kerja');
			$pihak_edit = $this->input->post('pihak_edit');
			$tujuan_edit = $this->input->post('tujuan_edit');
			$status_edit = $this->input->post('status_edit');
			$id_kompetensi = $this->input->post('id_kompetensi');
			$keterangan_edit = $this->input->post('keterangan_edit');
			$level_edit = $this->input->post('level_edit');
			$status_kompetensi_edit = $this->input->post('status_kompetensi_edit');

			if (!empty($tugas_edit)) {
				for ($i=0; $i < count($tugas_edit); $i++) { 
					# code...
					$id = $id_tugas[$i];
					$input['tugas'] = $tugas_edit[$i];

					$where = array('id'=>$id);
					$this->m_query->update_data('tbl_jobdesc_tugas', $input, $where);
				}
			}

			if (!empty($keterangan_wewenang_edit)) {
				for ($i=0; $i < count($keterangan_wewenang_edit); $i++) { 
					# code...
					$id2 = $id_wewenang[$i];
					$input2['keterangan'] = $keterangan_wewenang_edit[$i];

					$where2 = array('id'=>$id2);
					$this->m_query->update_data('tbl_jobdesc_wewenang', $input2, $where2);
				}
			}

			if (!empty($pihak_edit)) {
				for ($i=0; $i < count($pihak_edit); $i++) { 
					# code...
					$id3 = $id_hubungan_kerja[$i];
					$input3['pihak'] = $pihak_edit[$i];
					$input3['tujuan'] = $tujuan_edit[$i];
					$input3['status'] = $status_edit[$i];

					$where3 = array('id'=>$id3);
					$this->m_query->update_data('tbl_jobdesc_hubungan_kerja', $input3, $where3);
				}
			}

			if (!empty($keterangan_edit)) {
				for ($i=0; $i < count($keterangan_edit); $i++) { 
					# code...
					$id6 = $id_kompetensi[$i];
					$input6['keterangan'] = $keterangan_edit[$i];
					$input6['level'] = $level_edit[$i];
					$input6['status'] = $status_kompetensi_edit[$i];

					$where6 = array('id'=>$id6);
					$this->m_query->update_data('tbl_jobdesc_kompetensi', $input6, $where6);
				}
			}

			$nik = users('nik_baru');
			$jabatan = $this->input->post('no_jabatan_karyawan');
			$tugas = $this->input->post('tugas');
			$keterangan_wewenang = $this->input->post('keterangan_wewenang');
			$pihak = $this->input->post('pihak');
			$tujuan = $this->input->post('tujuan');
			$status = $this->input->post('status');
			$keterangan = $this->input->post('keterangan');
			$level = $this->input->post('level');
			$status_kompetensi = $this->input->post('status_kompetensi');

			if (!empty($tugas)) {
				for ($i=0; $i < count($tugas); $i++) { 
					# code...
					$input7['nik'] = $nik;
					$input7['jabatan'] = $jabatan;
					$input7['tugas'] = $tugas[$i];

					$this->m_query->insert_data('tbl_jobdesc_tugas', $input7);
				}
			}

			if (!empty($keterangan_wewenang)) {
				for ($i=0; $i < count($keterangan_wewenang); $i++) { 
					# code...
					$input8['nik'] = $nik;
					$input8['jabatan'] = $jabatan;
					$input8['keterangan'] = $keterangan_wewenang[$i];

					$this->m_query->insert_data('tbl_jobdesc_wewenang', $input8);
				}
			}

			if (!empty($pihak)) {
				for ($i=0; $i < count($pihak); $i++) { 
					# code...
					$input9['nik'] = $nik;
					$input9['jabatan'] = $jabatan;
					$input9['pihak'] = $pihak[$i];
					$input9['tujuan'] = $tujuan[$i];
					$input9['status'] = $status[$i];

					$this->m_query->insert_data('tbl_jobdesc_hubungan_kerja', $input9);
				}
			}

			if (!empty($keterangan)) {
				for ($i=0; $i < count($keterangan); $i++) { 
					# code...
					$input10['nik'] = $nik;
					$input10['jabatan'] = $jabatan;
					$input10['keterangan'] = $keterangan[$i];
					$input10['level'] = $level[$i];
					$input10['status'] = $status_kompetensi[$i];

					$this->m_query->insert_data('tbl_jobdesc_kompetensi', $input10);
				}
			}

			$id_pelaporan = $this->input->post('id_pelaporan');
			$input4['laporan_harian'] = $this->input->post('laporan_harian_edit');
			$input4['kepada_harian'] = $this->input->post('kepada_harian_edit');
			$input4['laporan_bulanan'] = $this->input->post('laporan_bulanan_edit');
			$input4['kepada_bulanan'] = $this->input->post('kepada_bulanan_edit');
			$input4['laporan_tahunan'] = $this->input->post('laporan_tahunan_edit');
			$input4['kepada_tahunan'] = $this->input->post('kepada_tahunan_edit');

			$where4 = array('id'=>$id_pelaporan);
			$this->m_query->update_data('tbl_jobdesc_pelaporan', $input4, $where4);

			$id_spesifikasi = $this->input->post('id_spesifikasi');
			$input5['pendidikan'] = $this->input->post('pendidikan_edit');
			$input5['nilai'] = $this->input->post('nilai_edit');
			$input5['pengalaman_lulus'] = $this->input->post('pengalaman_lulus_edit');
			$input5['pengalaman_sesuai'] = $this->input->post('pengalaman_sesuai_edit');
			$input5['pengalaman_tidak_sesuai'] = $this->input->post('pengalaman_tidak_sesuai_edit');
			$input5['jenis_kelamin'] = $this->input->post('jenis_kelamin_edit');
			$input5['usia'] = $this->input->post('usia_edit');
			$input5['keahlian'] = $this->input->post('keahlian_edit');

			$where5 = array('id'=>$id_spesifikasi);
			$save2 = $this->m_query->update_data('tbl_jobdesc_spesifikasi', $input5, $where5);
			
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

	public function edit_kpi($id)
	{
		$data['title'] = "Detail KPI Jabatan (".$id.")";
		$dept = users('dept_struktur');
		$data['edit'] = $this->m_admin->index_work_load(array('nama_departement'=>$dept, 'status'=>'0', 'tbl_jabatan_karyawan.`no_jabatan_karyawan'=>$id))->row_array();
		$this->load->view('admin/ptk/edit_kpi', $data);
	}

	public function doInput_kpi_all()
	{
		$this->form_validation->set_rules('no_jabatan_karyawan', 'no_jabatan_karyawan', 'required');
		if($this->form_validation->run()===TRUE) {
			$jabatan = $this->input->post('no_jabatan_karyawan');

			$input['status_kpi'] = '1';

			$where = array('no_jabatan_karyawan'=>$jabatan);
			$save2 = $this->m_query->update_data('tbl_jabatan_karyawan', $input, $where);
			
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

	public function data_all_kpi(){
		$no_jabatan_karyawan = $this->input->get('no_jabatan_karyawan');
		$query = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kuantitatif', array('jabatan'=>$no_jabatan_karyawan), null);
		$data = $query->result();
		echo json_encode($data);
	}

	public function doInput_kpi() {
		$input['nik'] = users('nik_baru');
		$input['jabatan'] = $this->input->post('jabatan');
		$input['deskripsi'] = $this->input->post('deskripsi');
		$input['evaluasi'] = $this->input->post('evaluasi');
		$input['bobot'] = $this->input->post('bobot');
		$input['target'] = $this->input->post('target');
		$data = $this->m_query->insert_data('tbl_jabatan_kpi_kuantitatif', $input);
		echo json_encode($data);
	}

	public function get_detail_kpi() {
		$id = $this->input->get('id');
		$data = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kuantitatif', array('id'=>$id), null)->row_array();
		echo json_encode($data);
	}

	public function doUpdate_kpi() {
		$id=$this->input->post('id');
		$input['deskripsi'] = $this->input->post('deskripsi');
		$input['evaluasi'] = $this->input->post('evaluasi');
		$input['bobot'] = $this->input->post('bobot');
		$input['target'] = $this->input->post('target');
		$where = array('id'=>$id);
		$data = $this->m_query->update_data('tbl_jabatan_kpi_kuantitatif', $input, $where);
		echo json_encode($data);
	}

	public function hapus_detail_kpi() {
		$id = $this->input->post('id');
		$where = array('id'=>$id);
		$data = $this->m_query->delete_data('tbl_jabatan_kpi_kuantitatif', $where);
		echo json_encode($data);
	}

	public function data_all_kpi_kual(){
		$no_jabatan_karyawan = $this->input->get('no_jabatan_karyawan');
		$query = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kualitatif', array('jabatan'=>$no_jabatan_karyawan), null);
		$data = $query->result();
		echo json_encode($data);
	}

	public function doInput_kpi_kual() {
		$input['nik'] = users('nik_baru');
		$input['jabatan'] = $this->input->post('jabatan');
		$input['deskripsi'] = $this->input->post('deskripsi');
		$data = $this->m_query->insert_data('tbl_jabatan_kpi_kualitatif', $input);
		echo json_encode($data);
	}

	public function get_detail_kpi_kual() {
		$id = $this->input->get('id');
		$data = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kualitatif', array('id'=>$id), null)->row_array();
		echo json_encode($data);
	}

	public function doUpdate_kpi_kual() {
		$id=$this->input->post('id');
		$input['deskripsi'] = $this->input->post('deskripsi');
		$where = array('id'=>$id);
		$data = $this->m_query->update_data('tbl_jabatan_kpi_kualitatif', $input, $where);
		echo json_encode($data);
	}

	public function hapus_detail_kpi_kual() {
		$id = $this->input->post('id');
		$where = array('id'=>$id);
		$data = $this->m_query->delete_data('tbl_jabatan_kpi_kualitatif', $where);
		echo json_encode($data);
	}

	public function print_jobdesc($id)
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

		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$data['edit'] = $this->m_admin->index_work_load_detail(array('no_jabatan_karyawan'=>$id))->row_array();
		$data['tugas'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_tugas', array('jabatan'=>$id))->result_array();
		$data['wewenang'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_wewenang', array('jabatan'=>$id))->result_array();
		$data['internal'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_hubungan_kerja', array('jabatan'=>$id, 'status'=>'1'))->result_array();
		$data['eksternal'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_hubungan_kerja', array('jabatan'=>$id, 'status'=>'2'))->result_array();
		$data['pelaporan'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_pelaporan', array('jabatan'=>$id))->row_array();
		$data['spesifikasi'] = $this->m_query->select_row_data('*', 'tbl_jobdesc_spesifikasi', array('jabatan'=>$id))->row_array();
		$this->load->view('admin/ptk/print_jobdesc', $data);
	}

	public function print_kpi($id)
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

		$data['title'] = "Detail Work Load Jabatan (".$id.")";
		$data['edit'] = $this->m_admin->index_work_load_detail(array('no_jabatan_karyawan'=>$id))->row_array();
		$data['kuantitatif'] = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kuantitatif', array('jabatan'=>$id))->result_array();
		$data['kualitatif'] = $this->m_query->select_row_data('*', 'tbl_jabatan_kpi_kualitatif', array('jabatan'=>$id))->result_array();
		$this->load->view('admin/ptk/print_kpi', $data);
	}

	// =============== Start Approval PTK HR ===================

	public function indexApprovalHr()
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

		$data['title'] = "Data Permintaan Tenaga Kerja";
		$data['listdata'] = $this->m_admin->queryListPtkHr(array('absensi_new.`tbl_karyawan_ptk`.`status_atasan`'=>'1', 'absensi_new.`tbl_karyawan_ptk`.`status_manager`'=>'0'))->result_array();
		$this->load->view('admin/ptk/approval/index', $data);
	}

	public function editApprovalHr($id)
	{
		$data['title'] = "Edit Permintaan Tenaga Kerja (".$id.")";
		$data['edit'] = $this->m_admin->queryListPtkHr(array('id'=>$id))->row_array();
		$this->load->view('admin/ptk/approval/edit', $data);
	}

	public function doUpdateApprovalHr()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['status_manager'] = $this->input->post('status_manager');
			$input['tanggal_manager'] = date('Y-m-d H:i:s');
			$input['ket_manager'] = $this->input->post('ket_manager');

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_ptk', $input, $where);

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

	public function indexAcclHr()
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

		$data['title'] = "Data Approve Permintaan Tenaga Kerja";
		$data['listdata'] = $this->m_admin->queryListPtkHr(array('absensi_new.`tbl_karyawan_ptk`.`status_atasan`'=>'1', 'absensi_new.`tbl_karyawan_ptk`.`status_manager`'=>'1'))->result_array();
		$this->load->view('admin/ptk/approval/index_approve', $data);
	}

	// =============== End Approval PTK HR ===================

}