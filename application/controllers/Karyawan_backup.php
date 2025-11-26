<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_backup extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
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
		$data['title'] = "Data karyawan BackUp";
		// $nik_baru = users('nik_baru');
		$lokasi = users('lokasi_struktur');
		$tahun = date('Y');
		// $data['listdata'] = $this->m_admin->karyawan_backup(array('nik_karyawan_pengajuan'=>$nik_baru))->result_array();
		$data['listdata'] = $this->m_admin->karyawan_backup(array("ks.lokasi_hrd"=>$lokasi, "YEAR(kb.tanggal_backup) = '$tahun'"))->result_array();
		$this->load->view('admin/karyawan_backup/index', $data);
	}

	public function tampil_karyawan(){
		$lokasi = users('lokasi_struktur');
		$data = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_struktur'=>$lokasi))->result();
        echo json_encode($data);
	}

	public function index_security()
	{
		$data['title'] = "Absen karyawan BackUp";
		// $lokasi = users('lokasi_struktur');
		$lokasi = "Lodan";
		$data['listdata'] = $this->m_admin->karyawan_backup_security($lokasi)->result_array();
		$this->load->view('admin/karyawan_backup/index_security', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Karyawan Backup";
		$lokasi = users('lokasi_struktur');
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_struktur'=>$lokasi))->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		// $data['no_urut']=$this->m_admin->get_no_karyawan_backup();
		$this->load->view('admin/karyawan_backup/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Edit Kantor Cabang (".$id.")";
		$data['edit'] = $this->m_query->select_row_data('*', 'tbl_Karyawan_backup', array('id_karyawan_backup'=>$id))->row_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/Karyawan_backup/edit', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('tanggal_pengajuan', 'tanggal_pengajuan', 'required');
		if($this->form_validation->run()===TRUE) {
			$tanggal_pengajuan = $this->input->post('tanggal_pengajuan');
			$nik_karyawan_pengajuan  = $this->input->post('nik_karyawan_pengajuan');
			$nik_baru  = $this->input->post('nik_baru');
			$nama_backup = $this->input->post('nama_backup');
			$alamat_backup = $this->input->post('alamat_backup');
			$no_ktp_backup = $this->input->post('no_ktp_backup');
			$no_telp_backup = $this->input->post('no_telp_backup');
			$jam_kerja = $this->input->post('jam_kerja');
			$tanggal_backup = $this->input->post('tanggal_backup');

			if (!empty($_FILES['upload_dokumen']['name'])) {
				# code...
				$path = 'karyawan_backup/';
				$name = 'upload_dokumen';
				$pecah = explode(".", $_FILES['upload_dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($nik_karyawan_pengajuan)).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$upload_dokumen = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan_backup/doInput');
				}
				
			}

			for ($i=0; $i < count($nik_baru); $i++) { 
				# code...
				$input['tanggal_pengajuan'] = $tanggal_pengajuan;
				$input['nik_karyawan_pengajuan'] = $nik_karyawan_pengajuan;
				$input['nik_baru'] = $nik_baru[$i];
				$input['nama_backup'] = $nama_backup[$i];
				$input['alamat_backup'] = $alamat_backup[$i];
				$input['no_ktp_backup'] = $no_ktp_backup[$i];
				$input['no_telp_backup'] = $no_telp_backup[$i];
				$input['tanggal_backup'] = $tanggal_backup[$i];
				$input['jam_kerja'] = $jam_kerja[$i];
				$input['upload_dokumen'] = $upload_dokumen;

				$save 		= $this->m_query->insert_data('tbl_Karyawan_backup', $input);
				
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
		$this->form_validation->set_rules('nik_karyawan_backup', 'nik_karyawan_backup', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_karyawan_backup');
			$input['nik_karyawan_backup'] = $this->input->post('nik_karyawan_backup');
			$input['nama_karyawan_backup'] = $this->input->post('nama_karyawan_backup');
			$input['alamat_karyawan_backup'] = $this->input->post('alamat_karyawan_backup');
			$input['dok_ktp_backup'] = $this->input->post('dok_ktp_backup');

			$where = array('id_karyawan_backup'=>$id);
			$save = $this->m_query->update_data('tbl_Karyawan_backup', $input, $where);
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
			$where = array('id_karyawan_backup'=>$id);
			$save = $this->m_query->delete_data('tbl_Karyawan_backup', $where);
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

	function f1(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_backup'=>$id);
			$input['in'] = date('Y-m-d H:i:s');
			$input['nik_in'] = users('nik_baru');
			// $save = $this->m_all->close($id);
			$save = $this->m_query->update_data('tbl_Karyawan_backup', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di simpan',
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

	function f4(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_backup'=>$id);
			$input['out'] = date('Y-m-d H:i:s');
			$input['nik_out'] = users('nik_baru');
			// $save = $this->m_all->close($id);
			$save = $this->m_query->update_data('tbl_Karyawan_backup', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di simpan',
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

	function verif(){

		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$where = array('id_karyawan_backup'=>$id);
			$input['status_backup'] = '1';
			// $save = $this->m_all->close($id);
			$save = $this->m_query->update_data('tbl_Karyawan_backup', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Data berhasil di simpan',
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

}