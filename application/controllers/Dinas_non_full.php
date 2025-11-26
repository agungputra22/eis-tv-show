<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dinas_non_full extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper('Exportpdf');
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
		
		$data['title'] = "Data Dinas Non Full Day";
		$nik_baru = users('nik_baru');
		// $data['listdata'] = $this->M_query->select_row_data('*', 'tbl_izin_non_full', array('nik_non_full'=>$nik_baru, 'jenis_non_full'=>'DN'))->result_array();
		$data['listdata'] = $this->M_query->dinas_non_full_day($nik_baru)->result_array();
		$this->load->view('admin/izin/dinas_non_full/index', $data);
	}

	public function tambah()
	{
		$data['title'] = "Form Dinas Non Full Day";
		$data['pengajuan']=$this->M_admin->get_no_pengajuan_non_full();
		$this->load->view('admin/izin/dinas_non_full/tambah', $data);
	}

	public function edit($id)
	{
		$data['title'] = "Approval Izin Non Full Day (".$id.")";
		$data['edit'] = $this->M_admin->izin_non_full_day($id)->row_array();
		$this->load->view('admin/izin/dinas_non_full/tindakan', $data);
	}

	public function edit_level_2($id)
	{
		$data['title'] = "Approval Izin Non Full Day (".$id.")";
		$data['edit'] = $this->M_admin->izin_non_full_day($id)->row_array();
		$this->load->view('admin/izin/dinas_non_full/tindakan_level_2', $data);
	}

	public function approve()
	{
		$lokasi = users('lokasi_struktur');
		$nik = users('nik_baru');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_pusat($jabatan)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level1_pusat($jabatan);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level1_pusat($jabatan);
			$data['hangus'] = $this->M_query->hangus_dinas_non_full_day_level1_pusat($jabatan);
			$this->load->view('admin/izin/dinas_non_full/approve', $data);
		}
		elseif ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_pusat($jabatan)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level1_pusat($jabatan);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level1_pusat($jabatan);
			$data['hangus'] = $this->M_query->hangus_dinas_non_full_day_level1_pusat($jabatan);
			$this->load->view('admin/izin/dinas_non_full/approve', $data);
		}
		elseif ($nik == '1908000101') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_case($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level1($jabatan, $lokasi);
			$data['hangus'] = $this->M_query->hangus_dinas_non_full_day_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/dinas_non_full/approve', $data);
		}
		elseif ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level1($jabatan, $lokasi);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level1($jabatan, $lokasi);
			$data['hangus'] = $this->M_query->hangus_dinas_non_full_day_level1($jabatan, $lokasi);
			$this->load->view('admin/izin/dinas_non_full/approve', $data);
		}
	}

	public function approve_level_2()
	{
		$lokasi = users('lokasi_struktur');
		$jabatan = users('jabatan_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level2_pusat($jabatan);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level2_pusat($jabatan);
			$this->load->view('admin/izin/dinas_non_full/approve_level_2', $data);
		}
		elseif ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_level_2_pusat($jabatan)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level2_pusat($jabatan);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level2_pusat($jabatan);
			$this->load->view('admin/izin/dinas_non_full/approve_level_2', $data);
		}
		elseif ($jabatan == '255' and $lokasi == 'Pandeglang') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_level_2_case($lokasi)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level2($jabatan, $lokasi);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level2($jabatan, $lokasi);
			$this->load->view('admin/izin/dinas_non_full/approve_level_2', $data);
		}
		elseif ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_level_2($jabatan, $lokasi)->result_array();
			$data['approve'] = $this->M_query->approve_dinas_non_full_day_level2($jabatan, $lokasi);
			$data['not_approve'] = $this->M_query->not_approve_dinas_non_full_day_level2($jabatan, $lokasi);
			$this->load->view('admin/izin/dinas_non_full/approve_level_2', $data);
		}
	}

	public function doInput()
	{
		$this->form_validation->set_rules('nik_non_full', 'nik_non_full', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['id_non_full'] = $this->input->post('id_non_full');
			$input['tanggal_pengajuan'] = $this->input->post('tanggal_pengajuan');
			$input['no_pengajuan_non_full'] = $this->input->post('no_pengajuan_non_full');
			$input['nik_non_full'] = $this->input->post('nik_non_full');
			$input['jabatan_non_full'] = $this->input->post('jabatan_non_full');
			$input['jenis_non_full'] = 'DN';
			$input['tanggal_non_full'] = $this->input->post('tanggal_non_full');
			$input['ket_tambahan_non_full'] = $this->input->post('ket_tambahan_non_full');
			$input['status_non_full'] = "0";
			$input['status_non_full_2'] = "0";

			if (!empty($_FILES['upload_non_full']['name'])) {
				# code...
				$path = 'izin/non_full_day/';
				$name = 'upload_non_full';
				$pecah = explode(".", $_FILES['upload_non_full']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($input['nik_non_full'])).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->M_query->unggah_out_source($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['upload_non_full'] = $rename;
					// $this->M_query->insert_data('tbl_karyawan_induk', $input);

					
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
					redirect('full_day/doInput');
				}
				
			}

			$tanggal_izin = $this->input->post('tanggal_non_full');
			$ket_tambahan = $this->input->post('ket_tambahan_non_full');
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			if ($jabatan == '255') {
				$config['protocol']    = 'smtp';
	            $config['smtp_host']    = '192.168.4.100';
	            $config['smtp_port']    = '25';
	            $config['smtp_timeout'] = '7';
	            $config['smtp_user']    = 'hr.notifikasi@tvip.co.id';
	            $config['charset']    = 'utf-8';
	            $config['newline']    = "\r\n";
	            $config['mailtype'] = 'html'; // or html
	            $config['validation'] = TRUE; // bool whether to validate email or not      

	            $this->email->initialize($config);

	            $this->email->from('hr.notifikasi@tvip.co.id', 'HR Notifikasi');

	            $status_email = $this->M_query->karyawan_email_pusat($jabatan)->num_rows();
	            if ($status_email>0) {
	            	$email_karyawan = $this->M_query->karyawan_email_pusat($jabatan)->result_array();
	            	foreach ($email_karyawan as $row_email) {
	            		$this->email->to($row_email['email']);
	            	}
	            } else {
	            	$this->email->to(array('HR.Personnel@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            }

	            $status_email_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->num_rows();
	            if ($status_email_2>0) {
	            	$email_karyawan_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->result_array();
	            	foreach ($email_karyawan_2 as $row_email_2) {
	            		$this->email->cc(array($row_email_2['email'], 'HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            	}
	            }

	            $this->email->subject('Informasi Pengajuan Dinas Non Full Day Karyawan');

	            $data_karyawan = $this->M_query->getMaster_karyawan_email(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
	            foreach ($data_karyawan as $row_karyawan) {
	            	$formatedMessag = 
		            '
		                <html>
		                    <body>
		                        Semangat Pagi,<br><br>
		                        Kepada Bapak / Ibu <br><br>
		                        Sesuai dengan adanya pengajuan terkait <b>Dinas Luar Non Full Day</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan izin dengan data berikut :<br><br>
		                        <table>
								    <tr>
								        <td>NAMA</td> <td>:</td>
								        <td>'.$row_karyawan['nama_karyawan_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>NIK</td> <td>:</td>
								        <td>'.$row_karyawan['nik_baru'].'</td>
								    </tr>
								    <tr>
								        <td>JABATAN</td> <td>:</td>
								        <td>'.$row_karyawan['jabatan_karyawan'].'</td>
								    </tr>
								    <tr>
								        <td>LOKASI</td> <td>:</td>
								        <td>'.$row_karyawan['lokasi_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>DEPARTEMENT</td> <td>:</td>
								        <td>'.$row_karyawan['dept_struktur'].'</td>
								    </tr>
								</table><br><br>
								Mengajukan izin pada :<br><br>
								<table>
								    <tr>
								        <td>TANGGAL DINAS</td> <td>:</td>
								        <td>'.$tanggal_izin.'</td>
								    </tr>
								    <tr>
								        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
								        <td>'.$ket_tambahan.'</td>
								    </tr>
								</table><br><br>
								Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
								Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan izin karyawan dianggap batal.<br><br>
								Demikian yang dapat disampaikan, terima kasih<br><br>
								<b>Update approval level 1 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
								<b>Update approval level 2 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
		                    </body>

		                </html>
		            ';
	            }
	            $this->email->message($formatedMessag);

	            $this->email->send();
			} elseif ($lokasi == 'Pusat') {
				$config['protocol']    = 'smtp';
	            $config['smtp_host']    = '192.168.4.100';
	            $config['smtp_port']    = '25';
	            $config['smtp_timeout'] = '7';
	            $config['smtp_user']    = 'hr.notifikasi@tvip.co.id';
	            $config['charset']    = 'utf-8';
	            $config['newline']    = "\r\n";
	            $config['mailtype'] = 'html'; // or html
	            $config['validation'] = TRUE; // bool whether to validate email or not      

	            $this->email->initialize($config);

	            $this->email->from('hr.notifikasi@tvip.co.id', 'HR Notifikasi');

	            $status_email = $this->M_query->karyawan_email_pusat($jabatan)->num_rows();
	            if ($status_email>0) {
	            	$email_karyawan = $this->M_query->karyawan_email_pusat($jabatan)->result_array();
	            	foreach ($email_karyawan as $row_email) {
	            		$this->email->to($row_email['email']);
	            	}
	            } else {
	            	$this->email->to(array('HR.Personnel@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            }

	            $status_email_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->num_rows();
	            if ($status_email_2>0) {
	            	$email_karyawan_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->result_array();
	            	foreach ($email_karyawan_2 as $row_email_2) {
	            		$this->email->cc(array($row_email_2['email'], 'HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            	}
	            }

	            $this->email->subject('Informasi Pengajuan Dinas Non Full Day Karyawan');

	            $data_karyawan = $this->M_query->getMaster_karyawan_email(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
	            foreach ($data_karyawan as $row_karyawan) {
	            	$formatedMessag = 
		            '
		                <html>
		                    <body>
		                        Semangat Pagi,<br><br>
		                        Kepada Bapak / Ibu <br><br>
		                        Sesuai dengan adanya pengajuan terkait <b>Dinas Luar Non Full Day</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan izin dengan data berikut :<br><br>
		                        <table>
								    <tr>
								        <td>NAMA</td> <td>:</td>
								        <td>'.$row_karyawan['nama_karyawan_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>NIK</td> <td>:</td>
								        <td>'.$row_karyawan['nik_baru'].'</td>
								    </tr>
								    <tr>
								        <td>JABATAN</td> <td>:</td>
								        <td>'.$row_karyawan['jabatan_karyawan'].'</td>
								    </tr>
								    <tr>
								        <td>LOKASI</td> <td>:</td>
								        <td>'.$row_karyawan['lokasi_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>DEPARTEMENT</td> <td>:</td>
								        <td>'.$row_karyawan['dept_struktur'].'</td>
								    </tr>
								</table><br><br>
								Mengajukan izin pada :<br><br>
								<table>
								    <tr>
								        <td>TANGGAL DINAS</td> <td>:</td>
								        <td>'.$tanggal_izin.'</td>
								    </tr>
								    <tr>
								        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
								        <td>'.$ket_tambahan.'</td>
								    </tr>
								</table><br><br>
								Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
								Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan izin karyawan dianggap batal.<br><br>
								Demikian yang dapat disampaikan, terima kasih<br><br>
								<b>Update approval level 1 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
								<b>Update approval level 2 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
		                    </body>

		                </html>
		            ';
	            }
	            $this->email->message($formatedMessag);

	            $this->email->send();
			} elseif ($jabatan == '275' OR $jabatan == '276' OR $jabatan == '279' OR $jabatan == '304' OR $jabatan == '275' OR $jabatan == '310' OR $jabatan == '311' OR $jabatan == '326' OR $jabatan == '327' OR $jabatan == '333' OR $jabatan == '334' OR $jabatan == '419' OR $jabatan == '420' OR $jabatan == '421' OR $jabatan == '422' OR $jabatan == '423' OR $jabatan == '425' OR $jabatan == '426' OR $jabatan == '438' OR $jabatan == '439' OR $jabatan == '440' OR $jabatan == '441' OR $jabatan == '442') {
				$config['protocol']    = 'smtp';
	            $config['smtp_host']    = '192.168.4.100';
	            $config['smtp_port']    = '25';
	            $config['smtp_timeout'] = '7';
	            $config['smtp_user']    = 'hr.notifikasi@tvip.co.id';
	            $config['charset']    = 'utf-8';
	            $config['newline']    = "\r\n";
	            $config['mailtype'] = 'html'; // or html
	            $config['validation'] = TRUE; // bool whether to validate email or not      

	            $this->email->initialize($config);

	            $this->email->from('hr.notifikasi@tvip.co.id', 'HR Notifikasi');

	            $status_email = $this->M_query->karyawan_email_pusat($jabatan)->num_rows();
	            if ($status_email>0) {
	            	$email_karyawan = $this->M_query->karyawan_email_pusat($jabatan)->result_array();
	            	foreach ($email_karyawan as $row_email) {
	            		$this->email->to($row_email['email']);
	            	}
	            } else {
	            	$this->email->to(array('HR.Personnel@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            }

	            $status_email_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->num_rows();
	            if ($status_email_2>0) {
	            	$email_karyawan_2 = $this->M_query->karyawan_email_pusat_2($jabatan)->result_array();
	            	foreach ($email_karyawan_2 as $row_email_2) {
	            		$this->email->cc(array($row_email_2['email'], 'HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            	}
	            }

	            $this->email->subject('Informasi Pengajuan Dinas Non Full Day Karyawan');

	            $data_karyawan = $this->M_query->getMaster_karyawan_email(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
	            foreach ($data_karyawan as $row_karyawan) {
	            	$formatedMessag = 
		            '
		                <html>
		                    <body>
		                        Semangat Pagi,<br><br>
		                        Kepada Bapak / Ibu <br><br>
		                        Sesuai dengan adanya pengajuan terkait <b>Dinas Luar Non Full Day</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan izin dengan data berikut :<br><br>
		                        <table>
								    <tr>
								        <td>NAMA</td> <td>:</td>
								        <td>'.$row_karyawan['nama_karyawan_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>NIK</td> <td>:</td>
								        <td>'.$row_karyawan['nik_baru'].'</td>
								    </tr>
								    <tr>
								        <td>JABATAN</td> <td>:</td>
								        <td>'.$row_karyawan['jabatan_karyawan'].'</td>
								    </tr>
								    <tr>
								        <td>LOKASI</td> <td>:</td>
								        <td>'.$row_karyawan['lokasi_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>DEPARTEMENT</td> <td>:</td>
								        <td>'.$row_karyawan['dept_struktur'].'</td>
								    </tr>
								</table><br><br>
								Mengajukan izin pada :<br><br>
								<table>
								    <tr>
								        <td>TANGGAL DINAS</td> <td>:</td>
								        <td>'.$tanggal_izin.'</td>
								    </tr>
								    <tr>
								        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
								        <td>'.$ket_tambahan.'</td>
								    </tr>
								</table><br><br>
								Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
								Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan izin karyawan dianggap batal.<br><br>
								Demikian yang dapat disampaikan, terima kasih<br><br>
								<b>Update approval level 1 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
								<b>Update approval level 2 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
		                    </body>

		                </html>
		            ';
	            }
	            $this->email->message($formatedMessag);

	            $this->email->send();
			} else {
				$config['protocol']    = 'smtp';
	            $config['smtp_host']    = '192.168.4.100';
	            $config['smtp_port']    = '25';
	            $config['smtp_timeout'] = '7';
	            $config['smtp_user']    = 'hr.notifikasi@tvip.co.id';
	            $config['charset']    = 'utf-8';
	            $config['newline']    = "\r\n";
	            $config['mailtype'] = 'html'; // or html
	            $config['validation'] = TRUE; // bool whether to validate email or not      

	            $this->email->initialize($config);

	            $this->email->from('hr.notifikasi@tvip.co.id', 'HR Notifikasi');

	            $status_email = $this->M_query->karyawan_email_depo($lokasi, $jabatan)->num_rows();
	            if ($status_email>0) {
	            	$email_karyawan = $this->M_query->karyawan_email_depo($lokasi, $jabatan)->result_array();
	            	foreach ($email_karyawan as $row_email) {
	            		$this->email->to($row_email['email']);
	            	}
	            } else {
	            	$this->email->to(array('HR.Personnel@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            }

	            $status_email_2 = $this->M_query->karyawan_email_depo_2($lokasi, $jabatan)->num_rows();
	            if ($status_email_2>0) {
	            	$email_karyawan_2 = $this->M_query->karyawan_email_depo_2($lokasi, $jabatan)->result_array();
	            	foreach ($email_karyawan_2 as $row_email_2) {
	            		$this->email->cc(array($row_email_2['email'], 'HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id', 'hr.absensi@tvip.co.id'));
	            	}
	            }

	            $this->email->subject('Informasi Pengajuan Dinas Non Full Day Karyawan');

	            $data_karyawan = $this->M_query->getMaster_karyawan_email(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
	            foreach ($data_karyawan as $row_karyawan) {
	            	$formatedMessag = 
		            '
		                <html>
		                    <body>
		                        Semangat Pagi,<br><br>
		                        Kepada Bapak / Ibu <br><br>
		                        Sesuai dengan adanya pengajuan terkait <b>Dinas Luar Non Full Day</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan izin dengan data berikut :<br><br>
		                        <table>
								    <tr>
								        <td>NAMA</td> <td>:</td>
								        <td>'.$row_karyawan['nama_karyawan_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>NIK</td> <td>:</td>
								        <td>'.$row_karyawan['nik_baru'].'</td>
								    </tr>
								    <tr>
								        <td>JABATAN</td> <td>:</td>
								        <td>'.$row_karyawan['jabatan_karyawan'].'</td>
								    </tr>
								    <tr>
								        <td>LOKASI</td> <td>:</td>
								        <td>'.$row_karyawan['lokasi_struktur'].'</td>
								    </tr>
								    <tr>
								        <td>DEPARTEMENT</td> <td>:</td>
								        <td>'.$row_karyawan['dept_struktur'].'</td>
								    </tr>
								</table><br><br>
								Mengajukan izin pada :<br><br>
								<table>
								    <tr>
								        <td>TANGGAL DINAS</td> <td>:</td>
								        <td>'.$tanggal_izin.'</td>
								    </tr>
								    <tr>
								        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
								        <td>'.$ket_tambahan.'</td>
								    </tr>
								</table><br><br>
								Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
								Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan izin karyawan dianggap batal.<br><br>
								Demikian yang dapat disampaikan, terima kasih<br><br>
								<b>Update approval level 1 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
								<b>Update approval level 2 </b><br>
								Status : OPEN<br>
								Waktu : <br><br>
		                    </body>

		                </html>
		            ';
	            }
	            $this->email->message($formatedMessag);

	            $this->email->send();
			}

			$save 		= $this->M_query->insert_data('tbl_izin_non_full', $input);

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
		$this->form_validation->set_rules('nik_non_full', 'nik_non_full', 'required');
		if($this->form_validation->run()===TRUE) {
			$status = $this->input->post('status_non_full');
			if ($status == 1) {
				$badgenumber = $this->input->post('nik_non_full');
				$shift_day = $this->input->post('tanggal_non_full');
				$input2['jenis_non_full_day'] = $this->input->post('jenis_non_full');
				$where2 = array('shift_day'=>$shift_day, 'badgenumber'=>$badgenumber);
				$this->M_query->update_data('tarikan_absen_adms', $input2, $where2);
			}
			
			$id = $this->input->post('id_non_full');
			$input['status_non_full'] = $this->input->post('status_non_full');
			$input['tanggal_approval_non_full'] = $this->input->post('tanggal_approval_non_full');
			$input['feedback_non_full'] = $this->input->post('feedback_non_full');

			$where = array('id_non_full'=>$id);
			$save = $this->M_query->update_data('tbl_izin_non_full', $input, $where);
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

	public function doUpdate_level_2()
	{
		$this->form_validation->set_rules('nik_non_full', 'nik_non_full', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id_non_full');
			// $input['status_non_full'] = "1";
			$input['status_non_full_2'] = $this->input->post('status_non_full_2');
			$input['tanggal_approval_non_full_2'] = $this->input->post('tanggal_approval_non_full_2');
			$input['feedback_non_full_2'] = $this->input->post('feedback_non_full_2');

			$where = array('id_non_full'=>$id);
			$save = $this->M_query->update_data('tbl_izin_non_full', $input, $where);
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

	public function view_approve_level_1()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_approve_level_1', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_approve($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_approve_level_1', $data);
		}
	}

	public function view_not_approve_level_1()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Not Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_not_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_not_approve_level_1', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Not Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_not_approve($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_not_approve_level_1', $data);
		}
	}

	public function view_hangus_level_1()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Hangus Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_hangus_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/dinas_non_full/hangus_level_1', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Hangus Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_1_hangus($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/dinas_non_full/hangus_level_1', $data);
		}
	}

	public function view_approve_level_2()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_2_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_approve_level_2', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_2_approve($jabatan, $lokasi)->result_array();
			$this->load->view('admin/izin/dinas_non_full/view_approve_level_2', $data);
		}
	}

	public function view_not_approve_level_2()
	{
		$lokasi = users('lokasi_struktur');

		if ($lokasi == 'Pusat') {
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
			
			$data['title'] = "Data Not Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_2_not_approve_pusat($jabatan)->result_array();
			$this->load->view('admin/izin/non_full_day/view_not_approve_level_2', $data);
		}
		if ($lokasi != 'Pusat') {
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
			
			$data['title'] = "Data Not Approved Dinas Non Full Day";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->M_admin->index_dinas_non_full_day_level_2_not_approve($jabatan)->result_array();
			$this->load->view('admin/izin/non_full_day/view_not_approve_level_2', $data);
		}
	}

	function approve_hangus(){
		$query	= "
			SELECT 
				absensi_new.`tbl_izin_non_full`.`id_non_full`
				, absensi_new.`tbl_izin_non_full`.`tanggal_pengajuan`
				, absensi_new.`tbl_izin_non_full`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline
				, absensi_new.`tbl_izin_non_full`.`status_non_full`
				, absensi_new.`tbl_izin_non_full`.`status_non_full_2`
			FROM absensi_new.`tbl_izin_non_full`
			WHERE absensi_new.`tbl_izin_non_full`.`status_non_full` = 0";
		$sql  = $this->db2->query($query)->result();
		foreach ($sql as $row){
			$id_non_full=$row->id_non_full;
			$deadline=$row->tanggal_deadline;
			$today=date("Y-m-d H:i:s", now());

			$diffInSeconds = strtotime($deadline) - strtotime($today);
			if($diffInSeconds<0){
				//kondisi melebihi deadline_dir
				$query	= "UPDATE absensi_new.`tbl_izin_non_full` SET absensi_new.`tbl_izin_non_full`.`status_non_full` = 3 WHERE absensi_new.`tbl_izin_non_full`.`id_non_full` = $id_non_full";
				$this->db2->query($query);
				echo ($id_non_full);
			}
		}
	}

}