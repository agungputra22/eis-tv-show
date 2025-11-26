<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historical_pkwt extends CI_Controller {
	private $filename = "import_data";

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin'));
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
		
		$data['title'] = "Data Historical Kontrak";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_query->index_histori_kontrak(array('absensi_new.`tbl_karyawan_struktur`.`nik_baru`'=>$nik_baru))->result_array();
		$this->load->view('admin/historical/pkwt/index', $data);
	}

	public function critical()
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
		
		$data['title'] = "Data Historical Kontrak Critical";
		$data['listdata'] = $this->M_query->critical_kontrak()->result_array();
		$this->load->view('admin/historical/pkwt/notifikasi', $data);
	}

	public function warning()
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
		
		$data['title'] = "Data Historical Kontrak Warning";
		$data['listdata'] = $this->M_query->warning_kontrak()->result_array();
		$this->load->view('admin/historical/pkwt/notifikasi', $data);
	}

	public function normal()
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
		
		$data['title'] = "Data Historical Kontrak Normal";
		$data['listdata'] = $this->M_query->normal_kontrak()->result_array();
		$this->load->view('admin/historical/pkwt/notifikasi', $data);
	}

	public function non_aktif()
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
		
		$data['title'] = "Data Karyawan Non Aktif";
		$data['listdata'] = $this->M_query->non_aktif()->result_array();
		$this->load->view('admin/historical/pkwt/non_aktif', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Historical Kontrak";
		$data['nik_baru'] = $this->M_admin->induk()->result();
		$this->load->view('admin/historical/pkwt/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Edit Historical Kontrak (".$id.")";
		$data['nik_baru'] = $this->M_admin->induk()->result();
		$data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical', array('id_historical'=>$id))->row_array();
		$this->load->view('admin/historical/pkwt/edit', $data);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_historical');
			$input16['nik_baru'] = $this->input->post('nik_baru');
			$input16['nama_karyawan_historical'] = $this->input->post('nama_karyawan_historical_edit');
			$input16['jabatan_historical'] = $this->input->post('jabatan_historical_edit');
			$input16['status_karyawan_pkwt'] = $this->input->post('status_karyawan_pkwt');
			$input16['karyawan_status'] = $this->input->post('karyawan_status');
			$input16['start_pkwt_1'] = $this->input->post('start_pkwt_1');
			$input16['end_pkwt_1'] = $this->input->post('end_pkwt_1');
			$input16['status_dokumen_pkwt_1'] = "1";

			//Upload Ulang Kontrak 1
			$where = ['id_historical' => $id];
			$getdata = $this->M_query->select_row_data('*', 'tbl_karyawan_historical', $where);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/historical_kontrak/kontrak_1/'.$rows['dokumen_pkwt_1']);
				
				// Upload Ulang
				$path = 'historical_kontrak/kontrak_1';
				$name = 'dokumen_pkwt_1';
				$pecah = explode(".", $_FILES['dokumen_pkwt_1']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input16['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input16['dokumen_pkwt_1'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			$input16['start_pkwt_2'] = $this->input->post('start_pkwt_2');
			$input16['masa_kerja_2'] = $this->input->post('masa_kerja_2');

			$end_pkwt = $this->input->post('start_pkwt_2');
			$masa_kerja = $this->input->post('masa_kerja_2');
			$date_pkwt = date($end_pkwt);
			$date_pkwt = strtotime(date($end_pkwt, strtotime($date_pkwt)) . " +$masa_kerja days");
			$date_pkwt = date("Y-m-d",$date_pkwt);
			$input16['end_pkwt_2'] = $date_pkwt;
			$input16['status_dokumen_pkwt_2'] = "1";

			//Upload Ulang Kontrak 2
			$getdata = $this->M_query->select_row_data('*', 'tbl_karyawan_historical', $where);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/historical_kontrak/kontrak_2/'.$rows['dokumen_pkwt_2']);
				
				// Upload Ulang
				$path = 'historical_kontrak/kontrak_2';
				$name = 'dokumen_pkwt_2';
				$pecah = explode(".", $_FILES['dokumen_pkwt_2']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input16['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input16['dokumen_pkwt_2'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			$input16['start_date_historical'] = $this->input->post('start_date_historical');
			$input16['status_dokumen_pkwt'] = "1";

			//Upload Ulang Karyawan Tetap
			$where = ['id_historical' => $id];
			$getdata = $this->M_query->select_row_data('*', 'tbl_karyawan_historical', $where);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/historical_kontrak/tetap/'.$rows['dokumen_pkwt']);
				
				// Upload Ulang
				$path = 'historical_kontrak/tetap/';
				$name = 'dokumen_pkwt';
				$pecah = explode(".", $_FILES['dokumen_pkwt']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input16['nik_baru'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input16['dokumen_pkwt'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('karyawan/doInput');
				}
				
			}

			$where = array('id_historical'=>$id);
			$save = $this->M_query->update_data('tbl_karyawan_historical', $input16, $where);
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
			$where = array('id_historical'=>$id);
			$getdata = $this->M_query->select_row_data('*', 'tbl_karyawan_historical', $where);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/historical_kontrak/'.$rows['dokumen_pkwt']);
			}
			$save = $this->M_query->delete_data('tbl_karyawan_historical', $where);
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

	public function excel()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_historical_Kontrak.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        $data['record']=$this->M_query->data_historical_Kontrak();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_depo', null)->result_array();
        $this->load->view('admin/historical_Kontrak/laporan_excel',$data); 
    }

    public function pdf()
	{
		$this->load->helper('exportpdf');
		$data['title'] = "Cetak Data historical_Kontrak";
		$row_data = $this->M_query->select_row_data('*', 'tbl_historical_Kontrak')->result_array();
		if (count($row_data) > 0) {
			$data['listdata'] = $row_data;
			$view = $this->load->view('admin/historical_Kontrak/cetak', $data, true);
			generate_pdf($view, 'data_historical_Kontrak.pdf', true, 'a4', 'landscape');
			// $this->load->view('register/cetak', $data);
		} else {
			redirect('admin/historical_Kontrak');
		}
		
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->M_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

}