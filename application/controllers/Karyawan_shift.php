<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan_shift extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
		// $this->load->library('datatables');
		$this->load->library(array('datatables'));

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin'));
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

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;

		return($result);
		}
		
		$data['title'] = "Data Karyawan Shift";
		$data['dept'] = $this->m_admin->data_departement()->result();
		$data['lokasi'] = $this->m_admin->data_depo()->result();
		$data['jabatan'] = $this->m_admin->data_jabatan()->result();
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_admin->view_shift(array('nik_shift'=>$nik_baru))->result_array();
		$this->load->view('admin/karyawan_shift/index', $data);
	}

	public function index_import()
	{		
		$data['title'] = "Import Karyawan Shift";
		$this->load->view('admin/karyawan_shift/index_import', $data);
	}

	public function index_karyawan_shift()
	{
		$data['title'] = "Data Karyawan Shift";
		$lokasi = users('lokasi_struktur');
		$dept = users('dept_struktur');
		$jabatan = users('jabatan_struktur');
		// $data['listdata'] = $this->m_admin->view_karyawan_shift(array('lokasi_karyawan_shift'=>$lokasi, 'dept_karyawan_shift'=>$dept))->result_array();
		
		if ($lokasi == 'Pusat') {
			$data['listdata'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result_array();
		}
		if ($lokasi == 'Rancamaya') {
			$data['listdata'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result_array();
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
			$data['listdata'] = $this->m_app->absensi_bawahan($jabatan, $lokasi)->result_array();
		}
		
		$this->load->view('admin/karyawan_shift/index_karyawan_shift', $data);
	}

	public function index_karyawan_shift_permintaan()
	{
		$data['title'] = "Data Karyawan Shift";
		$lokasi = users('lokasi_struktur');
		$dept = users('dept_struktur');
		$jabatan = users('jabatan_struktur');
		// $data['listdata'] = $this->m_admin->view_karyawan_shift(array('lokasi_karyawan_shift'=>$lokasi, 'dept_karyawan_shift'=>$dept))->result_array();

		if ($lokasi == 'Pusat') {
			$data['listdata'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result_array();
		}
		if ($lokasi == 'Rancamaya') {
			$data['listdata'] = $this->m_app->absensi_bawahan_pusat($jabatan)->result_array();
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
			$data['listdata'] = $this->m_app->absensi_bawahan($jabatan, $lokasi)->result_array();
		}
		
		$this->load->view('admin/karyawan_shift/index_karyawan_shift_permintaan', $data);
	}

	public function index_karyawan_on_off()
	{
		$data['title'] = "Data Karyawan ON OFF";
		$lokasi = users('lokasi_struktur');
		$dept = users('dept_struktur');
		$jabatan = users('jabatan_struktur');
		$data['listdata'] = $this->m_admin->view_karyawan_shift_pusat($jabatan)->result_array();
		$this->load->view('admin/karyawan_shift/index_karyawan_on_off', $data);
	}

	public function index_karyawan_dept_sd()
	{
		$dept = users('dept_struktur');
		$data['title'] = "Departement $dept ";
		$data['listdata'] = $this->m_admin->view_karyawan_shift(array('dept_karyawan_shift'=>$dept))->result_array();
		$this->load->view('admin/karyawan_shift/index_karyawan_sd', $data);
	}

	public function index_karyawan_spv_crl()
	{
		$data['title'] = "data Karyawan Shift";
		$jabatan = users('jabatan_struktur');
		// $data['listdata'] = $this->m_admin->view_karyawan_shift(array('dept_karyawan_shift'=>$dept))->result_array();
		$data['listdata'] = $this->m_admin->absensi_spv_crl($jabatan)->result_array();
		$this->load->view('admin/karyawan_shift/index_shift_spv_crl', $data);
	}

	public function range_tanggal()
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Input Shift Karyawan Range";
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/karyawan_shift/range_tanggal', $data);
	}

	public function range_tanggal_permintaan()
	{
		$lokasi = users('lokasi_struktur');
		$data['title'] = "Input Shift Karyawan Range";
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$this->load->view('admin/karyawan_shift/range_tanggal_permintaan', $data);
	}

	public function range_tanggal_crl()
	{
		$lokasi = users('lokasi_struktur');
		$jabatan = users('jabatan_struktur');
		$data['title'] = "Input Shift Karyawan Range";
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		$this->load->view('admin/karyawan_shift/range_tanggal_crl', $data);
	}

	public function mandatori()
	{
		$lokasi = users('lokasi_struktur');
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();
		$data['title'] = "Input Shift Karyawan (Mandatori)";
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/mandatori', $data);
	}

	public function mandatori_permintaan()
	{
		$lokasi = users('lokasi_struktur');
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();
		$data['title'] = "Input Shift Karyawan (Mandatori)";
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/mandatori_permintaan', $data);
	}

	public function mandatori_on_off()
	{
		$lokasi = users('lokasi_struktur');
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();
		$data['data_karyawan'] = $this->m_query->select_row_data('*', 'tbl_karyawan_struktur', array('lokasi_hrd'=>$lokasi, 'status_karyawan'=>'0'))->result();
		$data['title'] = "Input ON OFF (Mandatori)";
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/mandatori_on_off', $data);
	}

	public function mandatori_spv_crl()
	{
		$dept = users('dept_struktur');
		$jabatan = users('jabatan_struktur');
		// $data['listdata'] = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();
		$data['title'] = "Input Shift Karyawan (Mandatori)";
		$data['data_karyawan'] = $this->m_admin->absensi_spv_crl($jabatan)->result();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/mandatori_spv_crl', $data);
	}

	public function tampil(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->m_query->tampil($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function detail_shift($id)
	{
		$data['title'] = "Detail Shift (".$id.")";
		$data['listdata'] = $this->m_admin->detail_karyawan_shift(array('nik_shift'=>$id))->result_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/karyawan_shift/detail_shift', $data);
	}

	public function detail_shift_permintaan($id)
	{
		$data['title'] = "Detail Shift (".$id.")";
		$data['listdata'] = $this->m_admin->detail_karyawan_shift(array('nik_shift'=>$id))->result_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/karyawan_shift/detail_shift_permintaan', $data);
	}

	public function detail_shift_sd($id)
	{
		$data['title'] = "Detail Shift (".$id.")";
		$data['listdata'] = $this->m_admin->detail_karyawan_shift(array('nik_shift'=>$id))->result_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/karyawan_shift/detail_shift_sd', $data);
	}

	public function detail_on_off($id)
	{
		$data['title'] = "Detail ON OFF (".$id.")";
		$data['listdata'] = $this->m_admin->detail_karyawan_shift(array('nik_shift'=>$id))->result_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/karyawan_shift/detail_on_off', $data);
	}

	public function detail_shift_spv_crl($id)
	{
		$data['title'] = "Detail Shift (".$id.")";
		$data['listdata'] = $this->m_admin->detail_karyawan_shift(array('nik_shift'=>$id))->result_array();
		$data['tempat'] = $this->m_admin->tempat()->result();
		$this->load->view('admin/karyawan_shift/detail_spv_crl', $data);
	}

	public function optional($id)
	{
		$data['title'] = "Edit Jam Kerja Karyawan (".$id.")";
		$data['edit'] = $this->m_admin->detail_karyawan_shift(array('id_karyawan_shift'=>$id))->row_array();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/optional', $data);
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
				'tanggal' => $this->input->post('tanggal_shift'),
				'jam'	  => '123',
				'options' => array(
					'submit_date' => $this->input->post('submit_date'), 
					'user_submit' => $this->input->post('user_submit'), 
					'nama_karyawan_shift' => addslashes($this->input->post('nama_karyawan_shift')), 
					'jabatan_karyawan_shift' => $this->input->post('jabatan_karyawan_shift'),
					'dept_karyawan_shift' => $this->input->post('dept_karyawan_shift'),
					'lokasi_karyawan_shift' => $this->input->post('lokasi_karyawan_shift1')
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

	public function doInput_optional()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['id_shift_optional'] = $this->input->post('id_shift_optional');
			$input['nik_shift_optional'] = $this->input->post('nik_baru');
			$input['nama_shift_optional'] = addslashes($this->input->post('nama_karyawan_shift'));
			$input['jabatan_shift_optional'] = $this->input->post('jabatan_karyawan_shift');
			$input['dept_shift_optional'] = $this->input->post('dept_karyawan_shift');
			$input['permintaan_shift_optional'] = $this->input->post('permintaan_shift_optional');

			$tanggal_terlambat = $this->input->post('tanggal_terlambat');
			$tanggal_ganti_libur = $this->input->post('tanggal_ganti_libur');
			$input['tanggal_shift_optional'] = $tanggal_terlambat.$tanggal_ganti_libur;

			$input['start_shift_optional'] = $this->input->post('start_shift_optional');
			$input['end_shift_optional'] = $this->input->post('end_shift_optional');

			$ket_terlambat = $this->input->post('ket_terlambat');
			$ket_ganti_libur = $this->input->post('ket_ganti_libur');
			$input['ket_shift_optional'] = $ket_terlambat.$ket_ganti_libur;

			$save 		= $this->m_query->insert_data('tbl_karyawan_shift_optional', $input);
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

	public function tabel_shift()
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

		// $data['listdata'] = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', null)->result_array();

		$data['events'] = $this->m_query->select_row_data('*', 'events', null)->result();
		$data['tanggal'] = $this->m_query->mandatori_shift()->result_array();
		$data['jam_kerja'] = $this->m_admin->data_jam_kerja()->result();
		$this->load->view('admin/karyawan_shift/tabel_shift', $data);
	}

	public function doInput_karyawan_shift_all()
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
					$input['nik_shift'] = $row['name'];
					$input['submit_date'] = $nm['submit_date'];
					$input['user_submit'] = $nm['user_submit'];
					$input['nama_karyawan_shift'] = $nm['nama_karyawan_shift'];
					$input['jabatan_karyawan_shift'] = $nm['jabatan_karyawan_shift'];
					$input['dept_karyawan_shift'] = $nm['dept_karyawan_shift'];
					$input['lokasi_karyawan_shift'] = $nm['lokasi_karyawan_shift'];
					$input['jam_kerja'] = $row['jam'];
					$input['tanggal_shift'] = $row['tanggal'];

					$nik = $row['name'];
					$tanggal = $row['tanggal'];
					$input2['waktu_shift'] = $row['jam'];
					$where2 = array('badgenumber'=>$nik, 'shift_day'=>$tanggal);
					$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);

					$this->m_query->insert_data('tmp_karyawan_shift', $input);
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

	function filter_shift()
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

		$data['title'] = "Filter Karyawan Shift";

		$depo = $this->input->post('lokasi_struktur');
		$jabatan = $this->input->post('jabatan_struktur');
		$dept = $this->input->post('dept_struktur');
		$nik = $this->input->post('nik_karyawan');
		$tanggal1 = date("Y-m-d", strtotime($this->input->post('tanggal1')));
		$tanggal2 = date("Y-m-d", strtotime($this->input->post('tanggal2')));

		$where = [];
		if ($nik) {
			$where['tmp_karyawan_shift.`nik_shift`'] = $nik;
		}
		if ($tanggal1) {
			$where['tmp_karyawan_shift.`tanggal_shift` >='] = $tanggal1;
		}
		if ($tanggal2) {
			$where['tmp_karyawan_shift.`tanggal_shift` <='] = $tanggal2;
		}
		if ($depo) {
			$where['tbl_karyawan_struktur.`lokasi_struktur`'] = $depo;
		}
		if ($jabatan) {
			$where['tbl_jabatan_karyawan.`jabatan_karyawan`'] = $jabatan;
		}
		if ($dept) {
			$where['tmp_karyawan_shift.`dept_karyawan_shift`'] = $dept;
		}

		// $data['listdata'] = $this->m_app->query_per_id($nik, $tanggal1, $tanggal2)->result_array();
		$data['listdata'] = $this->m_admin->filter_karyawan_shift($where)->result_array();
		$data['nik'] = $nik;
		$data['tanggal1'] = $tanggal1;
		$data['tanggal2'] = $tanggal2;
		$data['depo'] = $depo;
		$data['jabatan'] = $jabatan;
		$data['dept'] = $dept;
		$this->load->view('admin/karyawan_shift/filter_shift', $data);
	}

	public function excel()
    {
        header("content-type=application/vnd-ms-excel");
        header("content-disposition: attachment; filename=data_shift.xls");
        // header("Pragma : no-cache");
        // header("Expires : 0")
        $data['record'] = $this->m_admin->view_shift()->result_array();
        $this->load->view('admin/karyawan_shift/laporan_excel_shift',$data); 
    }

    public function doUpdate()
	{
		$this->form_validation->set_rules('nik_shift', 'nik_shift', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_karyawan_shift');
			$input['update_date'] = $this->input->post('update_date');
			$input['user_update'] = $this->input->post('user_update');
			$input['tanggal_shift'] = $this->input->post('tanggal_shift_edit');
			$input['jam_kerja'] = $this->input->post('jam_kerja_edit');

			$tanggal_awal = $this->input->post('tanggal_shift');
			$tanggal_akhir = $this->input->post('tanggal_shift_edit');
			if ($tanggal_awal != $tanggal_akhir) {
				$nik = $this->input->post('nik_shift');
				$tanggal = $this->input->post('tanggal_shift');
				$input2['waktu_shift'] = null;
				$where2 = array('badgenumber'=>$nik, 'shift_day'=>$tanggal);
				$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);

				$input3['waktu_shift'] = $this->input->post('jam_kerja_edit');
				$tanggal2 = $this->input->post('tanggal_shift_edit');
				$where3 = array('badgenumber'=>$nik, 'shift_day'=>$tanggal2);
				$this->m_query->update_data('tarikan_absen_adms', $input3, $where3);
			} else {
				$nik = $this->input->post('nik_shift');
				$tanggal = $this->input->post('tanggal_shift_edit');
				$input2['waktu_shift'] = $this->input->post('jam_kerja_edit');
				$where2 = array('badgenumber'=>$nik, 'shift_day'=>$tanggal);
				$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);
			}

			$where = array('id_karyawan_shift'=>$id);
			$save = $this->m_query->update_data('tmp_karyawan_shift', $input, $where);
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

	public function doInput_range()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_shift  = $this->input->post('nik_baru');
			$submit_date  = $this->input->post('submit_date');
			$user_submit  = $this->input->post('user_submit');
			$nama_karyawan_shift  = addslashes($this->input->post('nama_karyawan_shift'));
			$jabatan_karyawan_shift  = $this->input->post('jabatan_karyawan_shift');
			$dept_karyawan_shift = $this->input->post('dept_karyawan_shift');
			$lokasi_karyawan_shift = $this->input->post('lokasi_karyawan_shift1');
			$jam_kerja = $this->input->post('jam_kerja');
			$tanggal_awal = $this->input->post('tanggal_awal');
			$tanggal_akhir = $this->input->post('tanggal_akhir');

			$this->m_query->query_update_range_tarikan($nik_shift,$jam_kerja,$tanggal_awal,$tanggal_akhir);

			$this->m_query->query_insert_range($submit_date,$user_submit,$nik_shift,$nama_karyawan_shift,$jabatan_karyawan_shift,$dept_karyawan_shift,$lokasi_karyawan_shift,$jam_kerja,$tanggal_awal,$tanggal_akhir);

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

	public function doDelete()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');

			$shift_delete = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', array('id_karyawan_shift'=>$id))->num_rows();
			if ($shift_delete>0) {
				$query_shift_delete = $this->m_query->select_row_data('*', 'tmp_karyawan_shift', array('id_karyawan_shift'=>$id))->result_array();
				foreach ($query_shift_delete as $row_shift) {
					$nik = $row_shift['nik_shift'];
					$tanggal = $row_shift['tanggal_shift'];
					$input2['waktu_shift'] = null;
					$where2 = array('badgenumber'=>$nik, 'shift_day'=>$tanggal);
					$this->m_query->update_data('tarikan_absen_adms', $input2, $where2);
				}
			}

			$where = array('id_karyawan_shift'=>$id);
			$save = $this->m_query->delete_data('tmp_karyawan_shift', $where);
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

}

?>