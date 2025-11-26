<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Historical_violance extends CI_Controller {
	private $filename = "import_data";

	function __construct() 
	{
		parent::__construct();
		$this->load->library('datatables');

		$this->load->helper('app_helper');
		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('M_query', 'M_admin', 'M_all'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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

			$data['title'] = "Data Historical Violance";
			$jabatan = users("jabatan_struktur");
			$data['listdata'] = $this->M_admin->index_violance_pusat($jabatan)->result_array();
			$this->load->view('admin/historical/violance/index', $data);
		}
		if ($lokasi == 'Rancamaya') {
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

			$data['title'] = "Data Historical Violance";
			$jabatan = users("jabatan_struktur");
			$data['listdata'] = $this->M_admin->index_violance_pusat($jabatan)->result_array();
			$this->load->view('admin/historical/violance/index', $data);
		}
		if ($lokasi != 'Pusat' && $lokasi != 'Rancamaya') {
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

			$data['title'] = "Data Historical Violance";
			$jabatan = users("jabatan_struktur");
			$lokasi = users("lokasi_struktur");
			$data['listdata'] = $this->M_admin->index_violance($jabatan, $lokasi)->result_array();
			$this->load->view('admin/historical/violance/index', $data);
		}
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
		
		$data['title'] = "Data Critical Violance";
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_renew_mou', null)->result_array();
		$data['listdata'] = $this->M_query->critical_violance()->result_array();
		$this->load->view('admin/historical/violance/critical', $data);
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
		
		$data['title'] = "Data Warning Violance";
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_renew_mou', null)->result_array();
		$data['listdata'] = $this->M_query->warning_violance()->result_array();
		$this->load->view('admin/historical/violance/warning', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah Historical Violance";
		$data['nik_baru'] = $this->M_admin->induk()->result();
		$data['jenis_pelanggaran'] = $this->M_query->jenis_pelanggaran();
		$this->load->view('admin/historical/violance/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Edit Historical Violance (".$id.")";
		$data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id))->row_array();
		$data['nik_baru'] = $this->M_admin->induk()->result();
		$data['jenis_pelanggaran'] = $this->M_query->jenis_pelanggaran();
		$this->load->view('admin/historical/violance/edit', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik = $this->input->post('nik_baru');
			$input17['id_historical_violance'] = $this->input->post('id_historical_violance');
			$input17['submit_date'] = $this->input->post('submit_date');
			$input17['user_submit'] = $this->input->post('user_submit');
			$input17['nik_baru'] = $nik;
			$input17['nama_karyawan_violance'] = $this->input->post('nama_karyawan_violance');
			$input17['jabatan_historical_violance'] = $this->input->post('kode_jabatan');

			// Surat Teguran
			$ia = $this->input->post('ia');
			$user = $this->input->post('user');
			$indisipliner = $this->input->post('indisipliner');
			$input17['rekomondasi_historical_violance'] = $this->input->post('rekomondasi_historical_violance');
			$input17['pelanggaran_historical_violance'] = $this->input->post('pelanggaran_historical_violance');
			$input17['punishment_historical_violance'] = $this->input->post('punishment_historical_violance');

			$db_date2 = $this->input->post('tanggal_surat');
			$input17['tanggal_surat'] = date("Y-m-d", strtotime($db_date2));

			$db_date = $this->input->post('warning_start_historical_violance');
			$input17['warning_start_historical_violance'] = date("Y-m-d", strtotime($db_date));

			$jenis_sanksi = $this->input->post('punishment_historical_violance');
			if ($jenis_sanksi = "Surat Peringatan 3") {
				# code...
				$tanggal_end = $this->input->post('warning_start_historical_violance');
				$date = date($tanggal_end);
				$date = strtotime(date($tanggal_end, strtotime($date)) . " +6 month");
				$date = date("Y-m-d",$date);
				$input17['warning_end_historical_violance'] = $date;
			} elseif ($jenis_sanksi = "Surat Peringatan 2") {
				# code...
				$tanggal_end1 = $this->input->post('warning_start_historical_violance');
				$date1 = date($tanggal_end1);
				$date1 = strtotime(date($tanggal_end1, strtotime($date1)) . " +6 month");
				$date1 = date("Y-m-d",$date1);
				$input17['warning_end_historical_violance'] = $date1;
			} elseif ($jenis_sanksi = 'Surat Peringatan 1') {
				# code...
				$tanggal_end = $this->input->post('warning_start_historical_violance');
				$date = date($tanggal_end);
				$date = strtotime(date($tanggal_end, strtotime($date)) . " +6 month");
				$date = date("Y-m-d",$date);
				$input17['warning_end_historical_violance'] = $date;
			} elseif ($jenis_sanksi = 'Surat Teguran') {
				# code...
				$tanggal_end = $this->input->post('warning_start_historical_violance');
				$date = date($tanggal_end);
				$date = strtotime(date($tanggal_end, strtotime($date)) . " +3 month");
				$date = date("Y-m-d",$date);
				$input17['warning_end_historical_violance'] = $date;
			} 

			$notifikasi = $this->input->post('punishment_historical_violance');
			if ($notifikasi = "Surat Peringatan 3") {
				# code...
				$tanggal_end_notif = $this->input->post('warning_start_historical_violance');
				$date_notif = date($tanggal_end_notif);
				$date_notif = strtotime(date($tanggal_end_notif, strtotime($date_notif)) . " +6 month". " -7 days");
				$date_notif = date("Y-m-d",$date_notif);
				$input17['tanggal_notif'] = $date_notif;
			} elseif ($notifikasi = "Surat Peringatan 2") {
				# code...
				$tanggal_end_notif = $this->input->post('warning_start_historical_violance');
				$date_notif = date($tanggal_end_notif);
				$date_notif = strtotime(date($tanggal_end_notif, strtotime($date_notif)) . " +6 month". " -7 days");
				$date_notif = date("Y-m-d",$date_notif);
				$input17['tanggal_notif'] = $date_notif;
			} elseif ($notifikasi = 'Surat Peringatan 1') {
				# code...
				$tanggal_end_notif = $this->input->post('warning_start_historical_violance');
				$date_notif = date($tanggal_end_notif);
				$date_notif = strtotime(date($tanggal_end_notif, strtotime($date_notif)) . " +6 month". " -7 days");
				$date_notif = date("Y-m-d",$date_notif);
				$input17['tanggal_notif'] = $date_notif;
			} elseif ($notifikasi = 'Surat Teguran') {
				# code...
				$tanggal_end_notif = $this->input->post('warning_start_historical_violance');
				$date_notif = date($tanggal_end_notif);
				$date_notif = strtotime(date($tanggal_end_notif, strtotime($date_notif)) . " +3 month". " -7 days");
				$date_notif = date("Y-m-d",$date_notif);
				$input17['tanggal_notif'] = $date_notif;
			} 

			$input17['status_dokumen'] = "No Complete";

			$save17		= $this->M_query->insert_data('tbl_karyawan_historical_violance', $input17);
			if($save17) {
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
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_historical_violance');
			$where = array('id_historical_violance'=>$id);

			$nik = $this->input->post('nik_baru');
			$input17['nik_baru'] = $nik;
			$input17['nama_karyawan_violance'] = $this->input->post('nama_karyawan_violance');
			$input17['jabatan_historical_violance'] = $this->input->post('jabatan_historical_violance');

			// Surat Teguran
			$input17['pelanggaran_historical_violance'] = $this->input->post('pelanggaran_historical_violance');
			$input17['punishment_historical_violance'] = $this->input->post('punishment_historical_violance');
			$input17['tanggal_surat'] = $this->input->post('tanggal_surat');
			$input17['warning_start_historical_violance'] = $this->input->post('warning_start_historical_violance');

			$tanggal_end = $this->input->post('warning_start_historical_violance');
			$date = date($tanggal_end);
			$date = strtotime(date($tanggal_end, strtotime($date)) . " +3 month");
			$date = date("Y-m-d",$date);
			$input17['warning_end_historical_violance'] = $date;

			$tanggal_end_notif = $this->input->post('warning_start_historical_violance');
			$date_notif = date($tanggal_end_notif);
			$date_notif = strtotime(date($tanggal_end_notif, strtotime($date_notif)) . " +3 month". " -7 days");
			$date_notif = date("Y-m-d",$date_notif);
			$input17['tanggal_notif'] = $date_notif;

			$input17['warning_note_historical_violance'] = $this->input->post('warning_note_historical_violance');

			// Upload Dokumen Pelanggaran
			if (!empty($_FILES['dokumen_historical_violance']['name'])) {
				# code...
				$path = 'violance/dokumen_pelanggaran/';
				$name = 'dokumen_historical_violance';
				$pecah = explode(".", $_FILES['dokumen_historical_violance']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input17['nik_baru'].'_'.$input17['punishment_historical_violance'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_violance($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input17['dokumen_historical_violance'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan ktp',
						'status'	=> 'error'
					];
					redirect('historical_violance/doInput');
				}
				
			}

			$save = $this->M_query->update_data('tbl_karyawan_historical_violance', $input17, $where);
			$save2 = $this->M_all->dok_violance($id);
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
			$where = array('id_historical_violance'=>$id);

			$getdata = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', $where);
			if ($getdata->num_rows()==1) {
				# code...
				// Hapus foto yang lama
				$rows = $getdata->row_array();				
				@unlink('./uploads/violance/dokumen_pelanggaran/'.$rows['dokumen_historical_violance']);
			}

			$save = $this->M_query->delete_data('tbl_karyawan_historical_violance', $where);
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

	public function datalist()
	{
		$html = '<a href="'.site_url('historical_pkwt/edit').'/$1" class="text-primary"><i class="fa fa-pencil"></i></a> &nbsp;';
		$html .= '<a href="'.site_url('historical_pkwt/delete').'/$1" class="text-danger"><i class="fa fa-trash"></i></a> ';

		header('Content-Type: application/json');

        $this->datatables->select("id_historical, nama_karyawan_historical, jabatan_historical, start_pkwt_1, end_pkwt_1, start_pkwt_2, end_pkwt_2, start_pkwt_3, end_pkwt_3, start_date_historical");
        $this->datatables->from("tbl_karyawan_historical");
        $this->datatables->add_column('alat', $html, 'id_historical');

        echo $this->datatables->generate();
	}

	public function excel()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_historical_pkwt.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        $data['record']=$this->M_query->data_historical_pkwt();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_depo', null)->result_array();
        $this->load->view('admin/historical_pkwt/laporan_excel',$data); 
    }

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->M_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_pelanggaran(){
		$pelanggaran_historical_violance=$this->input->post('pelanggaran_historical_violance');
		$query=$this->M_query->tampil_pelanggaran($pelanggaran_historical_violance);
		$result=$query->result();
		echo json_encode($result);
	}

	public function violance_tvip($id_historical_violance)
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

		$data['title'] = "Historical Violance (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$this->load->view('admin/historical/violance/cetak_violance/violance_tvip', $data);
	}

	public function violance_asa($id_historical_violance)
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

		$data['title'] = "Historical Violance (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$this->load->view('admin/historical/violance/cetak_violance/violance_asa', $data);
	}

	// =============================== Start Versi 2 ==================================
	public function index_approval_v2()
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

		$data['title'] = "Data Approval Violation";
		// $data['hitung_critical'] = $this->M_query->hitung_critical_violance();
		// $data['hitung_warning'] = $this->M_query->hitung_warning_violance();
		$data['listdata'] = $this->M_query->getViolanceV2(array('khv.`status_hr_manager`' => '0'))->result_array();
		$this->load->view('admin/historical/violance/v2/index', $data);
	}

	public function approval_v2($id)
	{
		$data['title'] = "Action Violation (".$id.")";
		$data['edit'] =  $this->M_query->getViolance(array('id_historical_violance'=>$id))->row_array();
		$this->load->view('admin/historical/violance/v2/edit', $data);
	}

	public function doUpdate_v2()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_historical_violance');
			$where = array('id_historical_violance'=>$id);
			$input17['status_hr_manager'] = $this->input->post('status_hr_manager');
			$input17['note_hr_manager'] = $this->input->post('note_hr_manager');
			$input17['user_update'] = users('nik_baru');
			$input17['date_update'] = date("Y-m-d H:m:s");
			$nik = users('nik_baru');
			$status_hr_manager = $this->input->post('status_hr_manager');
			if ($status_hr_manager == '1') {
				$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
				$config['cacheable']    		= true; //boolean, the default is true
				$config['cachedir']             = './assets/'; //string, the default is application/cache/
				$config['errorlog']             = './assets/'; //string, the default is application/logs/
				$config['imagedir']             = './uploads/qr/violance/'; //direktori penyimpanan qr code
				$config['quality']              = true; //boolean, the default is true
				$config['size']                 = '1024'; //interger, the default is 1024
				$config['black']                = array(224,255,255); // array, default is array(255,255,255)
				$config['white']                = array(70,130,180); // array, default is array(0,0,0)
				$this->ciqrcode->initialize($config);

				$image_name = $id.'.png'; //buat name dari qr code sesuai dengan nim

				$params['data'] = $nik; //data yang akan di jadikan QR CODE
				$params['level'] = 'H'; //H=High
				$params['size'] = 10;
				$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
				$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

				$input17['ttd_qr'] = $image_name; //simpan ke database	
			}

			$save = $this->M_query->update_data('tbl_karyawan_historical_violance', $input17, $where);
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

	public function index_histori_approve_v2()
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

		$data['title'] = "Data Approve Violation";
		// $data['hitung_critical'] = $this->M_query->hitung_critical_violance();
		// $data['hitung_warning'] = $this->M_query->hitung_warning_violance();
		$data['listdata'] = $this->M_query->getViolanceV2(array('khv.`status_hr_manager`' => '1'))->result_array();
		$this->load->view('admin/historical/violance/v2/index_aprroved', $data);
	}

	public function index_histori_notapprove_v2()
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

		$data['title'] = "Data Not Approve Violation";
		// $data['hitung_critical'] = $this->M_query->hitung_critical_violance();
		// $data['hitung_warning'] = $this->M_query->hitung_warning_violance();
		$data['listdata'] = $this->M_query->getViolanceV2(array('khv.`status_hr_manager`' => '2'))->result_array();
		$this->load->view('admin/historical/violance/v2/index_notaprroved', $data);
	}

	public function violance_tvip_v2($id_historical_violance)
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

		$data['title'] = "Historical Violation (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$historyPunishment = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->result_array();
		foreach ($historyPunishment as $row) {
			$data['history'] = $this->M_query->getHistoryPunishment($row['nik_baru'], $row['id_historical_violance'])->row_array();
		}
		$this->load->view('admin/historical/violance/v2/cetak/cetak_tvip', $data);
	}

	public function violance_asa_v2($id_historical_violance)
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

		$data['title'] = "Historical Violation (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$historyPunishment = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->result_array();
		foreach ($historyPunishment as $row) {
			$data['history'] = $this->M_query->getHistoryPunishment($row['nik_baru'], $row['id_historical_violance'])->row_array();
		}
		$this->load->view('admin/historical/violance/v2/cetak/cetak_asa', $data);
	}

	public function violance_mrt_v2($id_historical_violance)
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

		$data['title'] = "Historical Violation (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$historyPunishment = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->result_array();
		foreach ($historyPunishment as $row) {
			$data['history'] = $this->M_query->getHistoryPunishment($row['nik_baru'], $row['id_historical_violance'])->row_array();
		}
		$this->load->view('admin/historical/violance/v2/cetak/cetak_mrt', $data);
	}

	public function violance_tbk_v2($id_historical_violance)
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

		$data['title'] = "Historical Violation (".$id_historical_violance.")";
		// $data['edit'] = $this->M_query->select_row_data('*', 'tbl_karyawan_historical_violance', array('id_historical_violance'=>$id_historical_violance))->row_array();
		$data['edit'] = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->row_array();
		$historyPunishment = $this->M_query->getViolance(array('id_historical_violance'=>$id_historical_violance))->result_array();
		foreach ($historyPunishment as $row) {
			$data['history'] = $this->M_query->getHistoryPunishment($row['nik_baru'], $row['id_historical_violance'])->row_array();
		}
		$this->load->view('admin/historical/violance/v2/cetak/cetak_tbk', $data);
	}

	// =============================== End Versi 2 ==================================

}