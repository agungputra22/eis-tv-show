<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daily_activity extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin', 'M_app', 'M_all'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		function namahari($tanggal){
		    
		    $tgl=substr($tanggal,8,2);
		    $bln=substr($tanggal,5,2);
		    $thn=substr($tanggal,0,4);
		 
		    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
		    
		    switch($info){
		        case '0': return "Minggu"; break;
		        case '1': return "Senin"; break;
		        case '2': return "Selasa"; break;
		        case '3': return "Rabu"; break;
		        case '4': return "Kamis"; break;
		        case '5': return "Jumat"; break;
		        case '6': return "Sabtu"; break;
		    };
		    
		}

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

		$data['title'] = "Daily Activity";
		$nik_baru = users('nik_baru');
		$tanggal = date('Y-m-d');
		$data['listdata'] = $this->M_query->select_row_data('*', 'tmp_daily_activity', array('nik'=>$nik_baru, 'DATE(submit_date)'=>$tanggal), 'submit_date DESC')->result_array();
		$data['submit'] = $this->M_query->select_row_data('*', 'tmp_daily_activity', array('nik'=>$nik_baru, 'DATE(submit_date)'=>$tanggal))->result_array();
		$this->load->view('admin/daily_activity/index', $data);
	}

	public function index_bawahan()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
			function namahari($tanggal){
		    
			    $tgl=substr($tanggal,8,2);
			    $bln=substr($tanggal,5,2);
			    $thn=substr($tanggal,0,4);
			 
			    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
			    
			    switch($info){
			        case '0': return "Minggu"; break;
			        case '1': return "Senin"; break;
			        case '2': return "Selasa"; break;
			        case '3': return "Rabu"; break;
			        case '4': return "Kamis"; break;
			        case '5': return "Jumat"; break;
			        case '6': return "Sabtu"; break;
			    };
			    
			}

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

			$data['title'] = "Laporan Daily Activity";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_app->daily_bawahan_pusat($jabatan)->result_array();
			$this->load->view('admin/daily_activity/index_bawahan', $data);
		}
		if ($lokasi != 'Pusat') {
			function namahari($tanggal){
		    
			    $tgl=substr($tanggal,8,2);
			    $bln=substr($tanggal,5,2);
			    $thn=substr($tanggal,0,4);
			 
			    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
			    
			    switch($info){
			        case '0': return "Minggu"; break;
			        case '1': return "Senin"; break;
			        case '2': return "Selasa"; break;
			        case '3': return "Rabu"; break;
			        case '4': return "Kamis"; break;
			        case '5': return "Jumat"; break;
			        case '6': return "Sabtu"; break;
			    };
			    
			}

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

			$data['title'] = "Laporan Daily Activity";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_app->daily_bawahan($jabatan, $lokasi)->result_array();
			$this->load->view('admin/daily_activity/index_bawahan', $data);
		}
		
	}

	public function detail_activity($nik_baru)
	{
		function namahari($tanggal){
		    
		    $tgl=substr($tanggal,8,2);
		    $bln=substr($tanggal,5,2);
		    $thn=substr($tanggal,0,4);
		 
		    $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
		    
		    switch($info){
		        case '0': return "Minggu"; break;
		        case '1': return "Senin"; break;
		        case '2': return "Selasa"; break;
		        case '3': return "Rabu"; break;
		        case '4': return "Kamis"; break;
		        case '5': return "Jumat"; break;
		        case '6': return "Sabtu"; break;
		    };
		    
		}

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
		
		$data['title'] = "Detail Activity (".$nik_baru.")";
		$data['listdata'] = $this->M_query->select_row_data('*', 'tbl_daily_activity', array('nik'=>$nik_baru), 'submit_date DESC')->result_array();
		$this->load->view('admin/daily_activity/detail', $data);
	}

	public function tambah()
	{
		$data['title'] = "Form Daily Activity";
		$data['lokasi'] = $this->M_admin->getdepo_sn()->result();
		$this->load->view('admin/daily_activity/tambah', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik'] = $this->input->post('nik_baru');
			$input['status_lokasi'] = $this->input->post('status_lokasi');
			$status_lokasi = $this->input->post('status_lokasi');
			if ($status_lokasi == '0') {
				$input['lokasi'] = $this->input->post('lokasi_external');
			} elseif($status_lokasi == '1') {
				$input['lokasi'] = $this->input->post('lokasi_internal');
			}
			$input['keterangan'] = $this->input->post('keterangan');

			$save 		= $this->M_query->insert_data('tmp_daily_activity', $input);
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
		$data['title'] = "Update Daily Activity (".$id.")";
		$data['edit'] = $this->M_query->select_row_data('*', 'tmp_daily_activity', array('id'=>$id), 'submit_date DESC')->row_array();
		$this->load->view('admin/daily_activity/edit', $data);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik', 'nik', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['keterangan'] = $this->input->post('keterangan');

			$where = array('id'=>$id);
			$save = $this->M_query->update_data('tmp_daily_activity', $input, $where);
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

	public function doDelete()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id'=>$id);

			$save = $this->M_query->delete_data('tmp_daily_activity', $where);
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

	public function doUpdate_all()
	{
		$where = $this->input->post('id_daily');

		$this->M_query->insert_daily($where);

		$save = $this->M_query->delete_daily($where);
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

}