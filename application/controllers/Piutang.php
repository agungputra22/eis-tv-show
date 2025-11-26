<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutang extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);
		$this->db5 = $this->load->database('db5', TRUE);

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
		
		$data['title'] = "FAR Piutang";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->getFar_piutang(array('a.nik'=>$nik_baru))->result_array();
		$this->load->view('admin/piutang/index', $data);
	}

	public function tambah()
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Tambah FAR Piutang";
		$data['pengajuan'] = $this->m_admin->get_no_far_piutang();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/piutang/tambah', $data);
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->m_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function edit($id)
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Update FAR Piutang (".$id.")";
		$data['edit'] = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->row_array();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/piutang/edit', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('no_pengajuan', 'no_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik'] = users('nik_baru');
			$input['no_pengajuan'] = $this->input->post('no_pengajuan');
			$input['tanggal_far'] = $this->input->post('tanggal_far');
			$input['nominal'] = str_replace(".", "", $this->input->post('nominal'));
			$input['type'] = $this->input->post('type');
			$input['keterangan'] = $this->input->post('keterangan');
			$input['status_far'] = "0";
			$input['status_fa'] = "0";
			$input['ket_input'] = "USER";

			$save 		= $this->m_query->insert_data('tbl_piutang_far', $input);
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
		$this->form_validation->set_rules('no_pengajuan', 'no_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_piutang');
			$input['tanggal_far'] = $this->input->post('tanggal_far');
			$input['nominal'] = str_replace(".", "", $this->input->post('nominal'));
			$input['type'] = $this->input->post('type');
			$input['keterangan'] = $this->input->post('keterangan');

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_piutang_far', $input, $where);

			$no_far = $this->input->post('no_pengajuan');
			$input2['type'] = $this->input->post('type');
			$where2 = array('no_far'=>$no_far);
			$save2 = $this->m_query->update_data('tbl_piutang_far_detail', $input2, $where2);
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

	public function data_order_detail(){
		$no_far = $this->input->get('no_pengajuan');
		$query = $this->m_query->getFar_piutang_detail(array('no_far'=>$no_far));
		$data = $query->result();
		echo json_encode($data);
	}

	public function simpan_order_detail() {
		$input['no_far'] = $this->input->post('no_far');
		$input['nik'] = $this->input->post('nik');
		$input['piutang'] = str_replace(".", "", $this->input->post('piutang'));
		$input['type'] = $this->input->post('type');
		$input['cicilan'] = $this->input->post('cicilan');
		$data = $this->m_query->insert_data('tbl_piutang_far_detail', $input);
		echo json_encode($data);
	}

	public function get_order_detail() {
		$id = $this->input->get('id');
		$data = $this->m_query->getFar_piutang_detail(array('id'=>$id))->row_array();
		echo json_encode($data);
	}

	public function update_order_detail() {
		$id = $this->input->post('id');
		$input['piutang'] = str_replace(".", "", $this->input->post('piutang'));
		$input['cicilan'] = $this->input->post('cicilan');

		$where = array('id'=>$id);
		$data = $this->m_query->update_data('tbl_piutang_far_detail', $input, $where);
		echo json_encode($data);
	}

	public function hapus_order_detail() {
		$id = $this->input->post('id');
		$where = array('id'=>$id);
		$data = $this->m_query->delete_data('tbl_piutang_far_detail', $where);
		echo json_encode($data);
	}

	public function index_atasan()
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
		
		$data['title'] = "FAR Piutang";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_query->getFar_piutang()->result_array();
		$this->load->view('admin/piutang/index_atasan', $data);
	}

	public function edit_atasan($id)
	{
		$data['title'] = "FAR Piutang (".$id.")";
		$data['edit'] = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->row_array();
		$this->load->view('admin/piutang/edit_atasan', $data);
	}

	public function doUpdate_atasan()
	{
		$this->form_validation->set_rules('no_pengajuan', 'no_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_piutang');
			$input['status_far'] = $this->input->post('status');

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_piutang_far', $input, $where);

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

	public function print_far($id)
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

		function BulanPengajuan($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}

		function beda_waktu($date1, $date2, $format = false) 
		{
			$diff = date_diff( date_create($date1), date_create($date2) );
			if ($format)
				return $diff->format($format);
			
			return array('y' => $diff->y,
						'm' => $diff->m,
						'd' => $diff->d,
						'h' => $diff->h,
						'i' => $diff->i,
						's' => $diff->s
					);
		}

		$data['title'] = "Bukti Print (".$id.")";
		$data['edit'] = $this->m_query->getFar_piutang(array('id'=>$id))->row_array();
		$detail = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->num_rows();
		if ($detail > 0) {
			$query_far = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->result_array();

			foreach ($query_far as $row) {
				$data['listdata'] = $this->m_query->getFar_piutang_detail(array('no_far'=>$row['no_pengajuan']))->result_array();
			}
		}
		$this->load->view('admin/piutang/cetak_far', $data);
	}

	public function print_far_detail($id)
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

		function BulanPengajuan($date) {
		$BulanIndo = array("Januari", "Februari", "Maret", "April",
		"Mei", "Juni", "Juli", "Agustus", "September", "Oktober",
		"November", "Desember");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}

		function beda_waktu($date1, $date2, $format = false) 
		{
			$diff = date_diff( date_create($date1), date_create($date2) );
			if ($format)
				return $diff->format($format);
			
			return array('y' => $diff->y,
						'm' => $diff->m,
						'd' => $diff->d,
						'h' => $diff->h,
						'i' => $diff->i,
						's' => $diff->s
					);
		}

		$data['title'] = "Bukti Print (".$id.")";
		$data['edit'] = $this->m_query->getFar_piutang(array('id'=>$id))->row_array();
		$detail = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->num_rows();
		if ($detail > 0) {
			$query_far = $this->m_query->select_row_data('*', 'tbl_piutang_far', array('id'=>$id))->result_array();

			foreach ($query_far as $row) {
				$data['listdata'] = $this->m_query->getFar_piutang_detail(array('no_far'=>$row['no_pengajuan']))->result_array();
			}
		}
		$this->load->view('admin/piutang/cetak_far_detail', $data);
	}

}