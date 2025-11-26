<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan_lembur extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin', 'M_all'));
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
		
		$data['title'] = "Tanggal Lemburan";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'events')->result_array();
		$this->load->view('admin/pengajuan_lembur/index', $data);
	}

	public function event_pembayaran()
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
		
		$data['title'] = "Tanggal Lemburan";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'events')->result_array();
		$this->load->view('admin/pengajuan_lembur/index_fa', $data);
	}

	public function approve($birth_date)
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
		
		$data['title'] = "Data Approval Karyawan Lembur";
		$lokasi = users('lokasi_struktur');
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_lembur', array('tanggal_lembur'=>$birth_date))->result_array();
		$data['listdata'] = $this->M_admin->pengajuan_lembur($birth_date, $lokasi)->result_array();
		$this->load->view('admin/pengajuan_lembur/approve', $data);
	}

	public function approve_fa($birth_date)
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
		
		$data['title'] = "Data Approval Karyawan Lembur";
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_lembur', array('tanggal_lembur'=>$birth_date))->result_array();
		$data['listdata'] = $this->M_admin->pengajuan_lembur_fa($birth_date)->result_array();
		$this->load->view('admin/pengajuan_lembur/approve_fa', $data);
	}

	function approved(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_lembur'=>$id);

			$save = $this->M_all->approve_lembur($id);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di close',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
					'status'	=> 'error'
				];
			}
		}
		output_json($response);
	}

	function reject(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_lembur'=>$id);

			$save = $this->M_all->reject_lembur($id);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di close',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
					'status'	=> 'error'
				];
			}
		}
		output_json($response);
	}

	function payed(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_lembur'=>$id);

			$save = $this->M_all->payed_lembur($id);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di close',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data gagal dihapus',
					'status'	=> 'error'
				];
			}
		}
		output_json($response);
	}

	public function index_pengajuan_lembur()
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
		
		$data['title'] = "Tanggal Lemburan";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->select_row_data('*', 'events')->result_array();
		$this->load->view('admin/pengajuan_lembur/index_pengajuan_lembur', $data);
	}

	public function input_lembur($birth_date)
	{
		$dept = users('dept_struktur');
		$lokasi = users('lokasi_struktur');
		$tgl = $birth_date;
		$data['tanggal'] = $birth_date;
		$data['listdata'] = $this->M_query->select_row_data('*', 'tmp_karyawan_shift', array('lokasi_karyawan_shift'=>$lokasi, 'tanggal_shift'=>$tgl))->result_array();
		$data['title'] = "Input Karyawan Lembur";
		$data['jam_kerja'] = $this->M_admin->data_jam_kerja()->result();
		$this->load->view('admin/pengajuan_lembur/input_lembur', $data);
	}

	public function view_lembur($birth_date)
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
		
		$data['title'] = "Data Approval Karyawan Lembur";
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_karyawan_lembur', array('tanggal_lembur'=>$birth_date))->result_array();
		$lokasi = users('lokasi_struktur');
		$data['listdata'] = $this->M_admin->pengajuan_lembur($birth_date, $lokasi)->result_array();
		$this->load->view('admin/pengajuan_lembur/view_lembur', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {

			$data = array(
				'id'      => 'sku_'.rand(0000,9999),
				'qty'     => 1,
				'price'   => 39.95,
				'name'    => $this->input->post('nik_baru'),
				'tanggal'    => $this->input->post('tanggal_lembur'),
				'jam'	  => '123',
				'options' => array(
					'submit_date' => $this->input->post('submit_date'), 
					'user_submit' => $this->input->post('user_submit'), 
					'nama_karyawan_lembur' => $this->input->post('nama_karyawan_lembur'), 
					'jabatan_karyawan_lembur' => $this->input->post('jabatan_karyawan_lembur'),
					'dept_karyawan_lembur' => $this->input->post('dept_karyawan_lembur'),
					'lokasi_karyawan_lembur' => $this->input->post('lokasi_karyawan_lembur1'),
					'keterangan_lembur' => $this->input->post('keterangan_lembur'),
					'no_co_lembur' => $this->input->post('no_co_lembur')
				)
			);

			$save = $this->cart->insert($data);

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

	public function tabel_lembur()
	{
		function DateToIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}

		// $data['listdata'] = $this->M_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();

		$data['events'] = $this->M_query->select_row_data('*', 'events', null)->result();
		$data['tanggal'] = $this->M_query->mandatori_shift()->result_array();
		$data['jam_kerja'] = $this->M_admin->data_jam_kerja()->result();
		$this->load->view('admin/pengajuan_lembur/tabel_lembur', $data);
	}

	public function doInput_karyawan_lembur_all()
	{
		$this->form_validation->set_rules('rowid[]', 'rowid', 'required');
		if($this->form_validation->run()===TRUE) {

			$rowid = $this->input->post('rowid');
			$jam = $this->input->post('jam_kerja1');
			for ($i=0; $i<count($rowid); $i++) {
				# code...
				$data[$i] = array(
					'rowid'      => $rowid[$i],
					'jam'	  => $jam[$i],
				);
			}
			// print_r($data);

			$save = $this->cart->update($data);
			// $save = $this->cart->destroy();
			if($save) {
				foreach ($this->cart->contents() as $row) {
					$nm = array();
	                if ($this->cart->has_options($row['rowid']) == TRUE):
	                    foreach ($this->cart->product_options($row['rowid']) as $option_name => $value):
	                        $nm[$option_name] = $value;
	                    endforeach;
	                endif;
					$input['nik_lembur'] = $row['name'];
					$input['submit_date'] = $nm['submit_date'];
					$input['user_submit'] = $nm['user_submit'];
					$input['nama_karyawan_lembur'] = $nm['nama_karyawan_lembur'];
					$input['jabatan_karyawan_lembur'] = $nm['jabatan_karyawan_lembur'];
					$input['dept_karyawan_lembur'] = $nm['dept_karyawan_lembur'];
					$input['lokasi_karyawan_lembur'] = $nm['lokasi_karyawan_lembur'];
					$input['keterangan_lembur'] = $nm['keterangan_lembur'];
					$input['no_co_lembur'] = $nm['no_co_lembur'];
					$input['jam_kerja'] = $row['jam'];
					$input['tanggal_lembur'] = $row['tanggal'];
					$input['status'] = "0";
					$input['status_2'] = "0";

					$this->M_query->insert_data('tbl_karyawan_lembur', $input);
				}

				$this->cart->destroy();
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