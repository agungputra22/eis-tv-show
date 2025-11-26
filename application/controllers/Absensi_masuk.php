<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi_masuk extends CI_Controller {

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

		$data['title'] = "Laporan Absensi";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->M_app->absensi_masuk($nik_baru)->result_array();
		$this->load->view('admin/laporan/absensi_masuk/index', $data);
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

			$data['title'] = "Laporan Absensi";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result_array();
			$this->load->view('admin/laporan/absensi_masuk/index_bawahan', $data);
		}
		if ($lokasi == 'Rancamaya') {
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

			$data['title'] = "Laporan Absensi";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_app->absensi_bawahan_pusat($jabatan)->result_array();
			$this->load->view('admin/laporan/absensi_masuk/index_bawahan', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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

			$data['title'] = "Laporan Absensi";
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_app->absensi_bawahan($jabatan, $lokasi)->result_array();
			$this->load->view('admin/laporan/absensi_masuk/index_bawahan', $data);
		}
		
	}

	public function detail_absen($nik_baru)
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
		
		$data['title'] = "Detail Absen (".$nik_baru.")";
		$data['listdata'] = $this->M_app->absensi_masuk($nik_baru)->result_array();
		// $data['listdata'] = $this->M_app->absensi_masuk_darurat($id)->result_array();
		$this->load->view('admin/laporan/absensi_masuk/detail', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah User";
		$this->load->view('admin/user/tambah', $data);
	}

	public function excel_detail_absen()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_detail_absen.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $data['record'] = $this->M_app->query_per_id()->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/laporan/absensi_masuk/per_detail',$data); 
    }

    public function excel_per_hari()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_detail_absen.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $data['record'] = $this->M_app->absensi_masuk()->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/laporan/absensi_masuk/per_hari',$data); 
    }

    public function excel_per_bulan()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_detail_absen.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $data['record'] = $this->M_app->absensi_masuk()->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/laporan/absensi_masuk/per_bulan',$data); 
    }

	public function laporan_harian()
	{
		$data['title'] = "Laporan Harian";
		$data['dept'] = $this->M_admin->data_departement()->result();
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['jabatan'] = $this->M_admin->data_jabatan()->result();
		$this->load->view('admin/laporan/absensi_masuk/harian', $data);
	}

	function query_harian()
	{
		$data['title'] = "Laporan Tarikan Absen";

		$depo = $this->input->post('lokasi_struktur');
		$jabatan = $this->input->post('jabatan_struktur');
		$dept = $this->input->post('dept_struktur');
		$nik = $this->input->post('nik_karyawan');
		$tanggal1 = date("Y-m-d", strtotime($this->input->post('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->post('tanggal2').'+1 day'));

		$data['listdata'] = $this->M_all->absensi_masuk($nik, $tanggal1, $tanggal2)->result_array();
		$this->load->view('admin/laporan/absensi_masuk/hasil_harian', $data);
	}

	public function laporan_excel_harian()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_absen.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $data['record'] = $this->M_all->absensi_masuk($nik, $tanggal1, $tanggal2)->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/laporan/absensi_masuk/per_harian',$data); 
    }
}