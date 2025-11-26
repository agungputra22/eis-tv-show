<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarikan_absen extends CI_Controller {

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
		$data['title'] = "Tarikan Absensi";
		$data['lokasi'] = $this->M_admin->data_depo()->result();
		$dept = users('dept_struktur');
		$data['jabatan'] = $this->M_query->getLaporan_jabatan(array('nama_departement'=>$dept))->result();
		$data['listdata'] =  $this->M_query->getMaster_karyawan_sd(array('dept_struktur'=>$dept))->result_array();
		$this->load->view('admin/tarikan_absen/absensi_masuk/index', $data);
	}

	public function tambah()
	{
		$data['title'] = "Tambah User";
		$this->load->view('admin/user/tambah', $data);
	}

	public function detail_absen($id)
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
		
		$data['title'] = "Detail Absen (".$id.")";
		$data['listdata'] = $this->M_app->absensi_masuk($id)->result_array();
		// $data['listdata'] = $this->M_app->absensi_masuk_darurat($id)->result_array();
		$this->load->view('admin/tarikan_absen/absensi_masuk/detail', $data);
	}

	public function excel_detail_absen($id)
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_per".$id.".xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $data['record'] = $this->M_app->query_per_id($id)->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/tarikan_absen/absensi_masuk/per_id',$data); 
    }

	public function tarikan_absen_harian()
	{
		$data['title'] = "Tarikan Absen Harian";
		$data['dept'] = $this->M_admin->data_departement()->result();
		$data['depo'] = $this->M_admin->data_depo()->result();
		$data['jabatan'] = $this->M_admin->data_jabatan()->result();
		$this->load->view('admin/tarikan_absen/absensi_masuk/harian', $data);
	}

	function query_harian()
	{
		$data['title'] = "Tarikan Absen Harian";

		$depo = $this->input->post('lokasi_struktur');
		$jabatan = $this->input->post('jabatan_struktur');
		$dept = $this->input->post('dept_struktur');
		$nik = $this->input->post('nik_karyawan');
		$tanggal1 = date("Y-m-d", strtotime($this->input->post('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->post('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		// $data['listdata'] = $this->M_app->query_per_id($nik, $tanggal1, $tanggal2)->result_array();
		$data['listdata'] = $this->M_all->new_absensi_masuk($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();
		// $data['listdata'] = $this->M_all->new_absensi_masuk($where)->result_array();
		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
		$this->load->view('admin/tarikan_absen/absensi_masuk/harian/hasil_harian', $data);
	}

	public function tarikan_absen_excel_harian()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_absen_harian.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
        $depo = $this->input->get('depo');
		$jabatan = $this->input->get('jabatan');
		$dept = $this->input->get('dept');
		$nik = $this->input->get('nik');
		$tanggal1 = date("Y-m-d", strtotime($this->input->get('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->get('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		$data['record'] = $this->M_all->new_absensi_masuk($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();
		// $data['record'] = $this->M_all->new_absensi_masuk($where)->result_array();
		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/tarikan_absen/absensi_masuk/harian/per_harian',$data); 
    }

    function query_bulanan()
	{
		$data['title'] = "Laporan Tarikan Absen Bulanan";

		$depo = $this->input->post('lokasi_struktur');
		$jabatan = $this->input->post('jabatan_struktur');
		$dept = $this->input->post('dept_struktur');
		$nik = $this->input->post('nik_karyawan');
		$tanggal1 = date("Y-m-d", strtotime($this->input->post('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->post('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		// $data['listdata'] = $this->M_app->query_per_id($nik, $tanggal1, $tanggal2)->result_array();
		$data['listdata'] = $this->M_all->new_absensi_masuk($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();
		// $data['listdata'] = $this->M_all->new_absensi_masuk($where)->result_array();
		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
		$this->load->view('admin/tarikan_absen/absensi_masuk/bulanan/hasil_bulanan', $data);
	}

	public function tarikan_absen_excel_bulanan()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_absen_bulanan.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
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

        $depo = $this->input->get('depo');
		$jabatan = $this->input->get('jabatan');
		$dept = $this->input->get('dept');
		$nik = $this->input->get('nik');
		$tanggal1 = date("Y-m-d", strtotime($this->input->get('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->get('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		$data['record'] = $this->M_all->new_absensi_masuk_bulanan($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();
		// $data['record'] = $this->M_all->new_absensi_masuk_bulanan($where)->result_array();

		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
		
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/tarikan_absen/absensi_masuk/bulanan/per_bulanan',$data); 
    }

    function query_rekap_absensi()
	{
		$data['title'] = "Tarikan Rekap Absen";

		$depo = $this->input->post('lokasi_struktur');
		$jabatan = $this->input->post('jabatan_struktur');
		$dept = $this->input->post('dept_struktur');
		$nik = $this->input->post('nik_karyawan');
		$tanggal1 = date("Y-m-d", strtotime($this->input->post('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->post('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		// $data['listdata'] = $this->M_app->query_per_id($nik, $tanggal1, $tanggal2)->result_array();
		$data['listdata'] = $this->M_all->new_absensi_masuk($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();
		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
		$this->load->view('admin/tarikan_absen/absensi_masuk/rekap/hasil_rekap_absensi', $data);
	}

	public function tarikan_absen_excel_rekap_absen()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_rekap_absen.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
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

        $depo = $this->input->get('depo');
		$jabatan = $this->input->get('jabatan');
		$dept = $this->input->get('dept');
		$nik = $this->input->get('nik');
		$tanggal1 = date("Y-m-d", strtotime($this->input->get('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->get('tanggal2')));

		$where = [];
		if ($nik) {
			$where['userinfo.badgenumber'] = $nik;
		}
		if ($tanggal1) {
			$where['tbl_date.`date` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tbl_date.`date` <='] = $tanggal2;
		}
		if ($depo) {
			$where['absensi_new.tbl_karyawan_struktur.lokasi_struktur'] = $depo;
		}
		if ($jabatan) {
			$where['absensi_new.tbl_karyawan_struktur.jabatan_struktur'] = $jabatan;
		}
		if ($dept) {
			$where['absensi_new.tbl_karyawan_struktur.dept_struktur'] = $dept;
		}

		$data['record'] = $this->M_all->new_absensi_masuk_rekap($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)->result_array();

		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/tarikan_absen/absensi_masuk/rekap/per_rekap_absen',$data); 
    }

    public function doChange()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('nik_baru');
			$input['password'] = md5($this->config->item('default_password_karyawan'));

			$where = array('nik_baru'=>$id);
			$save = $this->M_query->update_data('tbl_karyawan_struktur', $input, $where);
			if($save) {
				$response = [
					'message'	=> 'Password berhasil dirubah menjadi <b>'.$this->config->item('default_password_karyawan').'</b>',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Password gagal dirubah',
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