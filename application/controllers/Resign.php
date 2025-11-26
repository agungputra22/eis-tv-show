<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resign extends CI_Controller {

	function __construct() 
	{
		parent::__construct();
		$this->load->helper(array('Exportpdf', 'download'));
		$this->load->library('datatables');

		$this->db = $this->load->database('default', TRUE);
		$this->db2 = $this->load->database('db2', TRUE);

		$this->load->model(array('m_query', 'm_admin'));
		if($this->session->userdata('nik_baru')=='') {
			redirect('welcome');
		}
	}

	public function index()
	{
		$data['title'] = "Pengajuan Resign Karyawan";
		$nik_baru = users('nik_baru');
		$data['submit'] = $this->m_query->select_row_data('*', 'tbl_karyawan_resign', array('nik_baru'=>$nik_baru))->result_array();
		$data['alasan'] = $this->m_admin->pengajuan_resign_alasan()->result();
		$data['pengajuan']=$this->m_admin->get_no_pengajuan_resign();
		$this->load->view('admin/resign/index', $data);
	}

	public function tampil_ket_resign(){
		$alasan_resign=$this->input->post('alasan_resign');
		$query=$this->m_query->tampil_ket_resign($alasan_resign);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_nik_baru(){
		$nik_baru=$this->input->post('nik_baru');
		$query=$this->m_query->tampil_adms($nik_baru);
		$result=$query->result();
		echo json_encode($result);
	}

	public function tampil_nik_lama(){
		$nik_lama=$this->input->post('nik_lama');
		$query=$this->m_query->tampil_adms($nik_lama);
		$result=$query->result();
		echo json_encode($result);
	}

	public function index_histori()
	{
		function DateToIndo($date) {
		$BulanIndo = array("Jan", "Feb", "Mar", "Apr",
		"Mei", "Jun", "Jul", "Agust", "Sept", "Okt",
		"Nov", "Des");

		// memisahkan format tahun menggunakan substring
		$tahun = substr($date, 0, 4);

		// memisahkan format bulan menggunakan substring
		$bulan = substr($date, 5, 2);

		// memisahkan format tanggal menggunakan substring
		$tgl = substr($date, 8, 2);

		$result = $tgl . " " . $BulanIndo[(int)$bulan-1];

		return($result);
		}

		function DateToIndo_new($date) {
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

		$data['title'] = "Histori Resign Karyawan";
		$nik_baru = users('nik_baru');
		$data['submit'] = $this->m_query->select_row_data('*', 'tbl_karyawan_resign', array('nik_baru'=>$nik_baru))->result_array();
		$this->load->view('admin/resign/index_histori', $data);
	}

	public function index_serah_terima()
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
		$data['title'] = "Data Serah Terima";
		$nik_baru = users('nik_baru');
		$data['listdata'] = $this->m_admin->index_penerima_serah_terima($nik_baru)->result_array();
		$this->load->view('admin/resign/form_penerima_serah_terima', $data);
	}

	public function doInput()
	{
		$this->form_validation->set_rules('tanggal_resign', 'tanggal_resign', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['no_pengajuan'] = $this->input->post('no_pengajuan');
			$input['nik_baru'] = users('nik_baru');
			$input['jabatan'] = users('jabatan_struktur');
			$input['status_atasan'] = '0';
			$input['status_atasan_2'] = '0';
			$input['status_fa'] = '0';
			$input['status_wop'] = '0';
			$input['status_hrd'] = '0';
			$input['status_ict'] = '0';
			$input['status_ga'] = '0';
			$input['status_qms'] = '0';
			$input['status_pengajuan'] = '0';
			$input['status_cuti'] = '0';
			// $klarifikasi_resign = $this->input->post('klarifikasi_resign');
			// if ($klarifikasi_resign == 'Non Case') {
			// 	$input['status_kuisioner'] = '0';
			// } else {
			// 	$input['status_kuisioner'] = '1';
			// }
			$input['status_kuisioner'] = '0';
			$input['status_exit'] = '0';
			$input['status_serah_terima'] = '0';
			$input['status_clearance'] = '0';
			$input['tanggal_pengajuan'] = $this->input->post('tanggal_resign');
			$input['alasan_resign'] = $this->input->post('alasan_resign');
			$input['klarifikasi_resign'] = $this->input->post('tipikal_resign');
			$input['ket_resign'] = $this->input->post('ketarangan');

			$no_pengajuan = $this->input->post('no_pengajuan');
			$nik_baru = users('nik_baru');

			if (!empty($_FILES['dokumen']['name'])) {
				# code...
				$path = 'resign/';
				$name = 'dokumen';
				$pecah = explode(".", $_FILES['dokumen']['name']);
				$ext = end($pecah);
				$rename = url_title(strtolower($no_pengajuan.'_'.$nik_baru)).'.'.$ext;
				// $rename = url_title($input['foto'], 'dash', TRUE);

				$upload = $this->m_query->unggah_resign($path, $name, $rename);
				if ($upload == true) {
					# code...
					$input['dokumen_resign'] = $rename;
					// $this->m_query->insert_data('tbl_karyawan_induk', $input);
				} else {
					$response = [
						'message'	=> 'Data gagal disimpan',
						'status'	=> 'error'
					];
					redirect('full_day/doInput');
				}
				
			}

			$save 		= $this->m_query->insert_data('tbl_karyawan_resign', $input);
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

	public function approve()
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan_pusat($jabatan)->result_array();
			$this->load->view('admin/resign/approve', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan_pusat($jabatan)->result_array();
			$this->load->view('admin/resign/approve', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan($jabatan, $lokasi)->result_array();
			$this->load->view('admin/resign/approve', $data);
		}
		
	}

	public function tindakan($id)
	{
		$data['title'] = "Approval Resign (".$id.")";
		$data['edit'] = $this->m_admin->pengajuan_resign($id)->row_array();
		$this->load->view('admin/resign/tindakan', $data);
	}

	public function doUpdate()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {		
			$nik_baru = $this->input->post('nik_baru');
			$jabatan = $this->input->post('jabatan_struktur');
			$lokasi = $this->input->post('lokasi_struktur');
			$tanggal_efektif_resign = $this->input->post('tanggal_efektif_resign');
			$tanggal_waktu = date("d/m/Y h:i:s");

			$status = $this->input->post('status_atasan');
			if ($status == 1) {
				$data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
				foreach ($data_karyawan as $row_karyawan) {
					if ($row_karyawan['jabatan_struktur'] == '255') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
										<b>Update approval level 2 </b><br>
										Status : OPEN<br>
										Waktu : <br><br>
				                    </body>

				                </html>
				            ';
			            }
			            $this->email->message($formatedMessag);

			            $this->email->send();
					} elseif ($row_karyawan['lokasi_struktur'] == 'Pusat') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign_atasan(array('absensi_new.`tbl_karyawan_struktur`.nik_baru'=>$nik_baru, 'absensi_new.`tbl_karyawan_struktur`.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_efektif_resign.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$row_karyawan['alasan_resign'].'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$row_karyawan['ket_resign'].'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
				}
				$id = $this->input->post('id');
				$input['tanggal'] = date('Y-m-d');
				$input['status_atasan'] = $this->input->post('status_atasan');
				$input['tanggal_efektif_resign'] = $this->input->post('tanggal_efektif_resign');

				$where = array('id'=>$id);
				$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
			} else {
				$data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
				foreach ($data_karyawan as $row_karyawan) {
					if ($row_karyawan['jabatan_struktur'] == '255') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
										<b>Update approval level 2 </b><br>
										Status : OPEN<br>
										Waktu : <br><br>
				                    </body>

				                </html>
				            ';
			            }
			            $this->email->message($formatedMessag);

			            $this->email->send();
					} elseif ($row_karyawan['lokasi_struktur'] == 'Pusat') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign_atasan(array('absensi_new.`tbl_karyawan_struktur`.nik_baru'=>$nik_baru, 'absensi_new.`tbl_karyawan_struktur`.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_efektif_resign.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$row_karyawan['alasan_resign'].'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$row_karyawan['ket_resign'].'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 1 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
				}
				$id = $this->input->post('id');
				$input['tanggal'] = date('Y-m-d');
				$input['status_atasan'] = $this->input->post('status_atasan');
				$input['tanggal_efektif_resign'] = $this->input->post('tanggal_efektif_resign');

				$where = array('id'=>$id);
				$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);
			}
			
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

	public function approve_level_2()
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan_2_pusat($jabatan)->result_array();
			$this->load->view('admin/resign/approve_level_2', $data);
		}
		if ($lokasi == 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan_2_pusat($jabatan)->result_array();
			$this->load->view('admin/resign/approve_level_2', $data);
		}
		if ($lokasi != 'Pusat' and $lokasi != 'Rancamaya') {
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
			
			$data['title'] = "Data Approval Resign";
			$nik_baru = users('nik_baru');
			$jabatan = users('jabatan_struktur');
			$lokasi = users('lokasi_struktur');
			$data['listdata'] = $this->m_admin->index_resign_atasan_2($jabatan, $lokasi)->result_array();
			$this->load->view('admin/resign/approve_level_2', $data);
		}
		
	}

	public function tindakan_2($id)
	{
		$data['title'] = "Approval Resign (".$id.")";
		$data['edit'] = $this->m_admin->pengajuan_resign($id)->row_array();
		$this->load->view('admin/resign/tindakan_2', $data);
	}

	public function doUpdate_atasan_2()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$jabatan = $this->input->post('jabatan_struktur');
			$lokasi = $this->input->post('lokasi_struktur');
			$tanggal_efektif_resign = $this->input->post('tanggal_efektif_resign');
			$tanggal_waktu = date("d/m/Y h:i:s");

			$status = $this->input->post('status_atasan_2');
			if ($status == 1) {
				$data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
				foreach ($data_karyawan as $row_karyawan) {
					if ($row_karyawan['jabatan_struktur'] == '255') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
										<b>Update approval level 2 </b><br>
										Status : OPEN<br>
										Waktu : <br><br>
				                    </body>

				                </html>
				            ';
			            }
			            $this->email->message($formatedMessag);

			            $this->email->send();
					} elseif ($row_karyawan['lokasi_struktur'] == 'Pusat') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign_atasan(array('absensi_new.`tbl_karyawan_struktur`.nik_baru'=>$nik_baru, 'absensi_new.`tbl_karyawan_struktur`.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_efektif_resign.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$row_karyawan['alasan_resign'].'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$row_karyawan['ket_resign'].'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
				}
			} else {
				$data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
				foreach ($data_karyawan as $row_karyawan) {
					if ($row_karyawan['jabatan_struktur'] == '255') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
										<b>Update approval level 2 </b><br>
										Status : OPEN<br>
										Waktu : <br><br>
				                    </body>

				                </html>
				            ';
			            }
			            $this->email->message($formatedMessag);

			            $this->email->send();
					} elseif ($row_karyawan['lokasi_struktur'] == 'Pusat') {
						$config['protocol']    = 'smtp';
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_pusat_atasan2($jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign_atasan(array('absensi_new.`tbl_karyawan_struktur`.nik_baru'=>$nik_baru, 'absensi_new.`tbl_karyawan_struktur`.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_efektif_resign.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$row_karyawan['alasan_resign'].'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$row_karyawan['ket_resign'].'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
			            $config['smtp_host']    = 'ssl://smtp.gmail.com';
			            $config['smtp_port']    = '465';
			            $config['smtp_timeout'] = '7';
			            $config['smtp_user']    = 'hr.absensi@tvip.co.id';
			            $config['smtp_pass']    = 'Vascal903';
			            $config['charset']    = 'utf-8';
			            $config['newline']    = "\r\n";
			            $config['mailtype'] = 'html'; // or html
			            $config['validation'] = TRUE; // bool whether to validate email or not      

			            $this->email->initialize($config);

			            $this->email->from('hr.absensi@tvip.co.id', 'HR Absensi');

			            $status_email = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->num_rows();
			            if ($status_email>0) {
			            	$email_karyawan = $this->m_query->karyawan_email_depo_atasan2($lokasi, $jabatan)->result_array();
			            	foreach ($email_karyawan as $row_email) {
			            		$this->email->to($row_email['email']);
			            		$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            	}
			            } else {
			            	$this->email->to('HR.Personnel@tvip.co.id');
			            	$this->email->cc('HR.Personnel@tvip.co.id', 'HR.Spv.Personnel@tvip.co.id', 'hr.spv.odir@tvip.co.id');
			            }

			            $this->email->subject('Update Approval Level 2 : Pengunduran Diri Karyawan');

			            $data_karyawan = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$nik_baru, 'ks.status_karyawan'=>'0'))->result_array();
			            foreach ($data_karyawan as $row_karyawan) {
			            	$formatedMessag = 
				            '
				                <html>
				                    <body>
				                        Semangat Pagi,<br><br>
				                        Kepada Bapak / Ibu <br><br>
				                        Sesuai dengan adanya pengajuan terkait <b>Pengunduran Diri Karyawan</b>, maka bersama email ini kami sampaikan adanya tim Bapak / Ibu yang mengajukan pengunduran diri dengan data berikut :<br><br>
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
										Mengajukan pengunduran diri pada :<br><br>
										<table>
										    <tr>
										        <td>TANGGAL EFEKTIF RESIGN</td> <td>:</td>
										        <td>'.$tanggal_pengajuan.'</td>
										    </tr>
										    <tr>
										        <td>ALASAN PENGUNDURAN DIRI	</td> <td>:</td>
										        <td>'.$alasan_resign.'</td>
										    </tr>
										    <tr>
										        <td>KETERANGAN TAMBAHAN </td> <td>:</td>
										        <td>'.$ket_resign.'</td>
										    </tr>
										</table><br><br>
										Untuk melakukan proses approval lebih lanjut, Bapak / Ibu dapat mengakses dengan klik link / icon berikut : http://hrd.tvip.co.id/eis/<br><br>
										Proses approval dapat dilakukan maksimal 3 hari kalender setelah email ini diterima. Jika approval belum dilakukan, maka proses pengajuan pengunduran diri karyawan dianggap batal.<br><br>
										Demikian yang dapat disampaikan, terima kasih<br><br>
										<b>Update approval level 1 </b><br>
										Status : NOT APPROVED<br>
										Waktu : '.$tanggal_waktu.'<br><br>
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
				}
			}

            $id = $this->input->post('id');
			$input['tanggal_2'] = date('Y-m-d');
			$input['status_atasan_2'] = $this->input->post('status_atasan_2');

			$where = array('id'=>$id);
			$save = $this->m_query->update_data('tbl_karyawan_resign', $input, $where);

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

	public function form_kuisioner($id)
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

		$data['title'] = "Form Kuisioner (".$id.")";
		$data['edit'] = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$id))->row_array();
		$data['soal_1'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'1'))->result_array();
		$data['soal_2'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'2'))->result_array();
		$data['soal_3'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'3'))->result_array();
		$data['soal_4'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'4'))->result_array();
		$data['soal_5'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'5'))->result_array();
		$data['soal_6'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'6'))->result_array();
		$data['soal_7'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'7'))->result_array();
		$data['soal_8'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'8'))->result_array();
		$data['soal_9'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'9'))->result_array();
		$data['soal_10'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'10'))->result_array();
		$data['soal_11'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'11'))->result_array();
		$data['soal_12'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'12'))->result_array();
		$data['soal_13'] = $this->m_query->select_row_data('*', 'tbl_soal_kuisioner', array('type_soal'=>'13'))->result_array();
		$this->load->view('admin/resign/form_kuisioner', $data);
	}

	public function exit_clearance($id)
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

		$data['title'] = "Form Exit Clearance (".$id.")";
		$data['edit'] = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$id))->row_array();
		$data['soal'] = $this->m_query->select_row_data('*', 'tbl_soal_exit', null, null)->result_array();
		$this->load->view('admin/resign/exit_clearance', $data);
	}

	public function exit_clearance_2($id)
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

		$data['title'] = "Form Exit Clearance (".$id.")";
		$data['edit'] = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$id))->row_array();
		$data['soal'] = $this->m_query->select_row_data('*', 'tbl_soal_exit', null, null)->result_array();
		$this->load->view('admin/resign/exit_clearance_level_2', $data);
	}

	public function form_serah_terima($id)
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

		$data['title'] = "Form Serah Terima (".$id.")";
		$data['edit'] = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$id))->row_array();
		$data['data_karyawan'] = $this->m_app->select_row_data('*', 'userinfo', null, null)->result();
		$this->load->view('admin/resign/form_serah_terima', $data);
	}

	public function setting_cuti($id)
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

		$data['title'] = "Form Setting Cuti (".$id.")";
		$tahun = date('Y')-1;
		$data['edit'] = $this->m_query->query_index_resign($id)->row_array();
		$data['cuti'] = $this->m_query->select_row_data('*', 'tbl_hak_cuti', array('nik_sisa_cuti'=>$id, 'tahun'=>$tahun), null)->row_array();
		$this->load->view('admin/resign/setting_cuti', $data);
	}

	public function doUpdate_cuti()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$tahun = $this->input->post('tahun_cuti');
			$input['hak_cuti_utuh'] = $this->input->post('hak_cuti') + $this->input->post('saldo_cuti');

			$where = array('nik_sisa_cuti'=>$nik_baru, 'tahun'=>$tahun);
			$save = $this->m_query->update_data('tbl_hak_cuti', $input, $where);

			$input2['status_cuti'] = '1';

			$where2 = array('nik_baru'=>$nik_baru);
			$save2 = $this->m_query->update_data('tbl_karyawan_resign', $input2, $where2);
			if($save2) {
				$response = [
					'message'	=> 'Data Berhasil diubah',
					'status'	=> 'success'
				];
			} else {
				$response = [
					'message'	=> 'Data Gagal diubah',
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

	public function doInputSerahTerima()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$input['nik_baru'] = $this->input->post('nik_baru');
			$input['nik_penerima_1'] = $this->input->post('nik_tampil_lama');
			$input['status_penerima_1'] = '0';
			$input['nik_penerima_2'] = $this->input->post('nik_tampil_baru');
			$input['status_penerima_2'] = '0';
			$input['status_atasan'] = '0';
			$input['status_atasan_2'] = '0';
			$input['status_serah_terima'] = '0';

			$nik_baru = $this->input->post('nik_baru');
			$alat_kerja = $this->input->post('alat_kerja');
			$jumlah_alat_kerja = $this->input->post('jumlah_alat_kerja');
			$satuan_alat_kerja = $this->input->post('satuan_alat_kerja');
			$kondisi_alat_kerja = $this->input->post('kondisi_alat_kerja');
			$keterangan_alat_kerja = $this->input->post('keterangan_alat_kerja');
			for ($i=0; $i < count($alat_kerja); $i++) { 
				# code...
				$input2['nik_baru'] = $nik_baru;
				$input2['alat_kerja'] = $alat_kerja[$i];
				$input2['jumlah_alat_kerja'] = $jumlah_alat_kerja[$i];
				$input2['satuan_alat_kerja'] = $satuan_alat_kerja[$i];
				$input2['kondisi_alat_kerja'] = $kondisi_alat_kerja[$i];
				$input2['keterangan_alat_kerja'] = $keterangan_alat_kerja[$i];

				$this->m_query->insert_data('tbl_serah_terima_alat_kerja', $input2);
				
			}

			$nik_baru_2 = $this->input->post('nik_baru');
			$nama_hardcopy = $this->input->post('nama_hardcopy');
			$jumlah_hardcopy = $this->input->post('jumlah_hardcopy');
			$satuan_hardcopy = $this->input->post('satuan_hardcopy');
			$tempat_hardcopy = $this->input->post('tempat_hardcopy');
			$keterangan_hardcopy = $this->input->post('keterangan_hardcopy');
			for ($i=0; $i < count($nama_hardcopy); $i++) { 
				# code...
				$input3['nik_baru'] = $nik_baru_2;
				$input3['nama_hardcopy'] = $nama_hardcopy[$i];
				$input3['jumlah_hardcopy'] = $jumlah_hardcopy[$i];
				$input3['satuan_hardcopy'] = $satuan_hardcopy[$i];
				$input3['tempat_hardcopy'] = $tempat_hardcopy[$i];
				$input3['keterangan_hardcopy'] = $keterangan_hardcopy[$i];

				$this->m_query->insert_data('tbl_serah_terima_hardcopy', $input3);
				
			}

			$nik_baru_4 = $this->input->post('nik_baru');
			$nama_softcopy = $this->input->post('nama_softcopy');
			$no_software = $this->input->post('no_software');
			$jenis_software = $this->input->post('jenis_software');
			$keterangan_software = $this->input->post('keterangan_software');
			for ($i=0; $i < count($nama_softcopy); $i++) { 
				# code...
				$input4['nik_baru'] = $nik_baru_4;
				$input4['nama_softcopy'] = $nama_softcopy[$i];
				$input4['no_software'] = $no_software[$i];
				$input4['jenis_software'] = $jenis_software[$i];
				$input4['keterangan_software'] = $keterangan_software[$i];

				$this->m_query->insert_data('tbl_serah_terima_softcopy', $input4);
				
			}

			$nik_baru_5 = $this->input->post('nik_baru');
			$nama_project = $this->input->post('nama_project');
			$sdm_project = $this->input->post('sdm_project');
			$hasil_project = $this->input->post('hasil_project');
			$outstanding_project = $this->input->post('outstanding_project');
			$deadline_project = $this->input->post('deadline_project');
			for ($i=0; $i < count($nama_project); $i++) { 
				# code...
				$input5['nik_baru'] = $nik_baru_5;
				$input5['nama_project'] = $nama_project[$i];
				$input5['sdm_project'] = $sdm_project[$i];
				$input5['hasil_project'] = $hasil_project[$i];
				$input5['outstanding_project'] = $outstanding_project[$i];
				$input5['deadline_project'] = $deadline_project[$i];

				$this->m_query->insert_data('tbl_serah_terima_project', $input5);
				
			}

			$nik_baru_6 = $this->input->post('nik_baru');
			$jabatan_sdm = $this->input->post('jabatan_sdm');
			$jumlah_sdm = $this->input->post('jumlah_sdm');
			$jenis_kelamin_sdm = $this->input->post('jenis_kelamin_sdm');
			$promosi_sdm = $this->input->post('promosi_sdm');
			$mutasi_sdm = $this->input->post('mutasi_sdm');
			$demosi_sdm = $this->input->post('demosi_sdm');
			$sp1_sdm = $this->input->post('sp1_sdm');
			$sp2_sdm = $this->input->post('sp2_sdm');
			$sp3_sdm = $this->input->post('sp3_sdm');
			$keterangan_sdm = $this->input->post('keterangan_sdm');
			for ($i=0; $i < count($jabatan_sdm); $i++) { 
				# code...
				$input6['nik_baru'] = $nik_baru_6;
				$input6['jabatan_sdm'] = $jabatan_sdm[$i];
				$input6['jumlah_sdm'] = $jumlah_sdm[$i];
				$input6['jenis_kelamin_sdm'] = $jenis_kelamin_sdm[$i];
				$input6['promosi_sdm'] = $promosi_sdm[$i];
				$input6['mutasi_sdm'] = $mutasi_sdm[$i];
				$input6['demosi_sdm'] = $demosi_sdm[$i];
				$input6['sp1_sdm'] = $sp1_sdm[$i];
				$input6['sp2_sdm'] = $sp2_sdm[$i];
				$input6['sp3_sdm'] = $sp3_sdm[$i];
				$input6['keterangan_sdm'] = $keterangan_sdm[$i];

				$this->m_query->insert_data('tbl_serah_terima_sdm', $input6);
				
			}

			$nik_resign = $this->input->post('nik_baru');
			$input7['status_serah_terima'] = 1;

			$where7 = array('nik_baru'=>$nik_resign);
			$this->m_query->update_data('tbl_karyawan_resign', $input7, $where7);

			$save 		= $this->m_query->insert_data('tbl_karyawan_serah_terima', $input);

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

	public function doInputKusioner()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_soal_1 = $this->input->post('id_soal_1');
			$jawaban_soal_1 = $this->input->post('jawaban_soal_1');
			for ($i=0; $i < count($id_soal_1); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_1[$i];
				$input['jawaban'] = $jawaban_soal_1[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_2 = $this->input->post('id_soal_2');
			$jawaban_soal_2 = $this->input->post('jawaban_soal_2');
			for ($i=0; $i < count($id_soal_2); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_2[$i];
				$input['jawaban'] = $jawaban_soal_2[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_3 = $this->input->post('id_soal_3');
			$jawaban_soal_3 = $this->input->post('jawaban_soal_3');
			for ($i=0; $i < count($id_soal_3); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_3[$i];
				$input['jawaban'] = $jawaban_soal_3[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_4 = $this->input->post('id_soal_4');
			$jawaban_soal_4 = $this->input->post('jawaban_soal_4');
			for ($i=0; $i < count($id_soal_4); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_4[$i];
				$input['jawaban'] = $jawaban_soal_4[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_5 = $this->input->post('id_soal_5');
			$jawaban_soal_5 = $this->input->post('jawaban_soal_5');
			for ($i=0; $i < count($id_soal_5); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_5[$i];
				$input['jawaban'] = $jawaban_soal_5[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_6 = $this->input->post('id_soal_6');
			$jawaban_soal_6 = $this->input->post('jawaban_soal_6');
			for ($i=0; $i < count($id_soal_6); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_6[$i];
				$input['jawaban'] = $jawaban_soal_6[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_7 = $this->input->post('id_soal_7');
			$jawaban_soal_7 = $this->input->post('jawaban_soal_7');
			for ($i=0; $i < count($id_soal_7); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_7[$i];
				$input['jawaban'] = $jawaban_soal_7[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_8 = $this->input->post('id_soal_8');
			$jawaban_soal_8 = $this->input->post('jawaban_soal_8');
			for ($i=0; $i < count($id_soal_8); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_8[$i];
				$input['jawaban'] = $jawaban_soal_8[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_9 = $this->input->post('id_soal_9');
			$jawaban_soal_9 = $this->input->post('jawaban_soal_9');
			for ($i=0; $i < count($id_soal_9); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_9[$i];
				$input['jawaban'] = $jawaban_soal_9[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_10 = $this->input->post('id_soal_10');
			$jawaban_soal_10 = $this->input->post('jawaban_soal_10');
			for ($i=0; $i < count($id_soal_10); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_10[$i];
				$input['jawaban'] = $jawaban_soal_10[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_11 = $this->input->post('id_soal_11');
			$jawaban_soal_11 = $this->input->post('jawaban_soal_11');
			for ($i=0; $i < count($id_soal_11); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_11[$i];
				$input['jawaban'] = $jawaban_soal_11[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_12 = $this->input->post('id_soal_12');
			$jawaban_soal_12 = $this->input->post('jawaban_soal_12');
			for ($i=0; $i < count($id_soal_12); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_12[$i];
				$input['jawaban'] = $jawaban_soal_12[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$id_soal_13 = $this->input->post('id_soal_13');
			$jawaban_soal_13 = $this->input->post('jawaban_soal_13');
			for ($i=0; $i < count($id_soal_13); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal_13[$i];
				$input['jawaban'] = $jawaban_soal_13[$i];

				$save = $this->m_query->insert_data('tbl_karyawan_kuisioner', $input);
			}

			$nik_resign = $this->input->post('nik_baru');
			$input7['status_kuisioner'] = 1;

			$where7 = array('nik_baru'=>$nik_resign);
			$this->m_query->update_data('tbl_karyawan_resign', $input7, $where7);

			$input2['nik_baru'] = $this->input->post('nik_baru');
			$input2['nilai_keseluruhan'] = $this->input->post('nilai_keseluruhan');
			$input2['kategori_resign'] = $this->input->post('kategori_resign');
			$input2['alasan_resign'] = $this->input->post('alasan_resign');
			$input2['saran_masukan'] = $this->input->post('saran_masukan');

			$save = $this->m_query->insert_data('tbl_karyawan_kuisioner_final', $input2);

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

	public function view_serah_terima($id)
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

		$data['title'] = "Form Serah Terima (".$id.")";
		$data['edit'] = $this->m_query->getMaster_karyawan_resign(array('ks.nik_baru'=>$id))->row_array();
		$nik_baru = users('nik_baru');
		$data['resign'] = $this->m_admin->index_penerima_serah_terima($nik_baru)->row_array();
		$data['serah_terima1'] = $this->m_query->select_row_data('*', 'tbl_serah_terima_alat_kerja', array('nik_baru'=>$id))->result_array();
		$data['serah_terima2'] = $this->m_query->select_row_data('*', 'tbl_serah_terima_hardcopy', array('nik_baru'=>$id))->result_array();
		$data['serah_terima3'] = $this->m_query->select_row_data('*', 'tbl_serah_terima_softcopy', array('nik_baru'=>$id))->result_array();
		$data['serah_terima4'] = $this->m_query->select_row_data('*', 'tbl_serah_terima_project', array('nik_baru'=>$id))->result_array();
		$data['serah_terima5'] = $this->m_query->select_row_data('*', 'tbl_serah_terima_sdm', array('nik_baru'=>$id))->result_array();
		$this->load->view('admin/resign/view_serah_terima', $data);
	}

	public function doUpdate_serah_terima()
	{
		$this->form_validation->set_rules('id', 'id', 'required');
		if($this->form_validation->run()===TRUE) {
			$id = $this->input->post('id');
			$level_role = $this->input->post('level_role');
			$status_penerima = $this->input->post('status_penerima');

			if ($level_role == 1) {
				$input['status_penerima_1'] = $this->input->post('status');
				$input['tanggal_penerima_1'] = date('Y-m-d');
				$where = array('id'=>$id);
				$save = $this->m_query->update_data('tbl_karyawan_serah_terima', $input, $where);
			} elseif ($level_role == 2) {
				$input['status_penerima_2'] = $this->input->post('status');
				$input['tanggal_penerima_2'] = date('Y-m-d');
				$where = array('id'=>$id);
				$save = $this->m_query->update_data('tbl_karyawan_serah_terima', $input, $where);
			}

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

	public function doUpdateExit()
	{
		$this->form_validation->set_rules('nik_baru', 'nik_baru', 'required');
		if($this->form_validation->run()===TRUE) {
			$nik_baru = $this->input->post('nik_baru');
			$id_soal = $this->input->post('id_soal');
			$jawaban_soal = $this->input->post('jawaban_soal');
			$keterangan = $this->input->post('keterangan');
			for ($i=0; $i < count($id_soal); $i++) { 
				# code...
				$input['nik_baru'] = $nik_baru;
				$input['id_soal'] = $id_soal[$i];
				$input['jawaban_soal'] = $jawaban_soal[$i];
				$input['keterangan'] = $keterangan[$i];

				$this->m_query->insert_data('tbl_karyawan_exit', $input);
			}

			$nomor_saran = $this->input->post('nomor_saran');
			$saran = $this->input->post('saran');
			for ($i=0; $i < count($nomor_saran); $i++) { 
				# code...
				$input2['nik_baru'] = $nik_baru;
				$input2['nomor_saran'] = $nomor_saran[$i];
				$input2['saran'] = $saran[$i];

				$this->m_query->insert_data('tbl_karyawan_exit_saran', $input2);
			}

			$input3['nik_baru'] = $this->input->post('nik_baru');
			$input3['alasan_exit'] = $this->input->post('alasan_exit');
			$input3['tambahan_exit'] = $this->input->post('tambahan_exit');
			$input3['ketidaksesuai_exit'] = $this->input->post('ketidaksesuai_exit');

			$save3 = $this->m_query->insert_data('tbl_karyawan_exit_final', $input3);

			$nik_resign = $this->input->post('nik_baru');
			$input4['status_exit'] = 1;

			$where4 = array('nik_baru'=>$nik_resign);
			$save4 = $this->m_query->update_data('tbl_karyawan_resign', $input4, $where4);

			if($save4) {
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

	function get_sub_resign(){
        $category_id = $this->input->post('id',TRUE);
        $data = $this->m_query->select_row_data('*', 'tbl_alasan_resign', array('ket_resign'=>$category_id, 'status'=>'0'))->result();
        echo json_encode($data);
    }

}