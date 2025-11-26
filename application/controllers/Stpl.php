<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stpl extends CI_Controller {

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
		$this->load->view('admin/stpl/index', $data);
	}

    public function excel($birth_date, $name)
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=print_stpl.xls");

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
		$data['tanggal'] = $birth_date;
		$data['lokasi'] = users('lokasi_struktur');
		$data['kegiatan'] = $name;
		$lokasi = users('lokasi_struktur');
		$dept = users('lokasi_struktur');
        // header("Pragma : no-cache");
        // header("Expires : 0")
        // $data['record']=$this->M_query->data_jabatan();
		$data['record'] = $this->M_query->karyawan_lembur_fa($birth_date, $lokasi)->result_array();
		$data['record_2'] = $this->M_query->karyawan_lembur_ga($birth_date, $lokasi)->result_array();
		$data['record_3'] = $this->M_query->karyawan_lembur_sc($birth_date, $lokasi)->result_array();
		$data['record_4'] = $this->M_query->karyawan_lembur_sd($birth_date, $lokasi)->result_array();
		$data['record_5'] = $this->M_query->karyawan_lembur_wo($birth_date, $lokasi)->result_array();
        // $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_jabatan', null)->result_array();
        $this->load->view('admin/stpl/spl/cetak_excel_spl',$data); 
    }

    public function dokumen_stpl()
	{
		$data['title'] = "Upload Tanda Terima";
		$this->load->view('admin/stpl/upload_dokumen', $data);
	}

	function doInput_tanda_terima(){
		//Upload Dokumen
		$nama = $this->input->post('tanda_terima');
		if (!empty($_FILES['tanda_terima']['name'])) {
			# code...
			$path = 'dokumen_stpl/';
			$name = 'tanda_terima';
			$pecah = explode(".", $_FILES['tanda_terima']['name']);
			$ext = end($pecah);
			// $rename = url_title(strtolower($nama)).'.'.$ext;
			// $rename = url_title($input['foto'], 'dash', TRUE);

			$upload = $this->M_query->unggah_out_source($path, $name);
			if ($upload == true) {
				# code...
				$response = [
				'message'	=> 'Dokumen berhasil di upload',
				'status'	=> 'success'
				];	
			} else {
				$response = [
					'message'	=> 'Data gagal disimpan ktp',
					'status'	=> 'error'
				];
				redirect('clearance_sheet/doInput');
			}
			
		}
		output_json($response);
	}

}