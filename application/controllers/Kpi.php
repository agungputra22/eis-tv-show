<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kpi extends CI_Controller {

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

		$data['title'] = "Data Master KPI";
		$dept = users('departement_id');
		$data['listdata'] = $this->M_query->getData_kpi(array('a.dept'=>$dept))->result_array();
		$this->load->view('admin/kpi/index', $data);
	}

	public function tambah()
	{
		$data['title'] = "Form KPI";
		$this->load->view('admin/kpi/tambah', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik'] = users('nik_baru');
			$input['dept'] = users('departement_id');
			$input['keterangan'] = $this->input->post('keterangan');
			$input['kategori'] = $this->input->post('kategori');
			$input['pengukuran'] = $this->input->post('pengukuran');
			$input['persentase'] = $this->input->post('persentase');
			$input['tahun'] = $this->input->post('tahun');
			$input['status'] = '1';

			$save 		= $this->M_query->insert_data('tbl_kpi', $input);
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
		$data['title'] = "Update KPI (".$id.")";
		$data['edit'] = $this->M_query->getData_kpi(array('id'=>$id))->row_array();
		$this->load->view('admin/kpi/edit', $data);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$input['keterangan'] = $this->input->post('keterangan');
			$input['kategori'] = $this->input->post('kategori');
			$input['pengukuran'] = $this->input->post('pengukuran');
			$input['persentase'] = $this->input->post('persentase');
			$input['status'] = $this->input->post('status');

			$where = array('id'=>$id);
			$save = $this->M_query->update_data('tbl_kpi', $input, $where);
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
			$input['status'] = '3';

			$where = array('id'=>$id);
			$save = $this->M_query->update_data('tbl_kpi', $input, $where);
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