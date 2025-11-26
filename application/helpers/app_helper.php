<?php
/*
* App helper
* author Agung Saputra
*/
function __construct() 
{
	$this->load->model('M_all');
	if($this->session->userdata('nik_baru')=='') {
		redirect('welcome');
	}
}

function convert_date($date) {
	$bln = array(
		'01'=>'Januari',
		'02'=>'Februari',
		'03'=>'Maret',
		'04'=>'April',
		'05'=>'Mei',
		'06'=>'Juni',
		'07'=>'Juli',
		'08'=>'Agustus',
		'09'=>'September',
		'10'=>'Oktober',
		'11'=>'November',
		'12'=>'Desember'
		);
	$p = explode("-", $date);
	$tgl_jadi = $p[2]." ".$bln[$p[1]]." ".$p[0];
	return $tgl_jadi;
}

function convert_datetime($date) {
	$exp = explode(" ", $date);
	$tgl = $exp[0];
	$wkt = $exp[1];
	$bln = array(
		'01'=>'Januari',
		'02'=>'Februari',
		'03'=>'Maret',
		'04'=>'April',
		'05'=>'Mei',
		'06'=>'Juni',
		'07'=>'Juli',
		'08'=>'Agustus',
		'09'=>'September',
		'10'=>'Oktober',
		'11'=>'November',
		'12'=>'Desember'
		);
	$p = explode("-", $tgl);
	$tgl_jadi = $p[2]." ".$bln[$p[1]]." ".$p[0]." - ".$wkt;
	return $tgl_jadi;
}

function output_json($array) {
	$ci =& get_instance();
	header('Content-Type: application/json');
	return $ci->output->set_output(json_encode($array));
}

/*
* get data users login
*/
function users($field) {
	$ci =& get_instance();
	$userid = $ci->session->userdata('nik_baru');
	// $get_data = $ci->db->get_where('absensi_new.tbl_karyawan_struktur ks', array('nik_baru'=>$userid))->result();
	$get_data = $ci->M_admin->login_masuk_new(array('nik_baru'=>$userid))->result();
	foreach ($get_data as $row) {
		# code...
		return $row->$field;
	}
}

function user_level($id) {
	$level = ['0'=>'Admin','1'=>'Petugas'];
	return ($id == null ? $level : $level[$id]);
}

function user_status($id) {
	$status = ['Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'];
	return ($id == null ? $status : $status[$id]);
}

function kategori_ipp($id) {
	$level = ['Harian'=>'Harian','Mingguan'=>'Mingguan','Bulanan'=>'Bulanan','3 Bulan'=>'3 Bulan','6 Bulan'=>'6 Bulan','Tahunan'=>'Tahunan','Sesuai Jadwal'=>'Sesuai Jadwal','By Case'=>'By Case'];
	return ($id == null ? $level : $level[$id]);
}

function level_jobdesc($id) {
	$status = ['Level 0' => 'Level 0', 'Level 1' => 'Level 1', 'Level 2' => 'Level 2', 'Level 3' => 'Level 3', 'Level 4' => 'Level 4'];
	return ($id == null ? $status : $status[$id]);
}

function type_piutang($id) {
	$status = ['Piutang Karyawan' => 'Piutang Karyawan', 'Selisih Opname' => 'Selisih Opname'];
	return ($id == null ? $status : $status[$id]);
}

function support_status($id) {
	$status = ['0' => 'Open', '1' => 'On Progress', '2' => 'Close'];
	return ($id == null ? $status : $status[$id]);
}

function status_kpi($id) {
	$status = ['0' => 'Lead', '1' => 'Lag'];
	return ($id == null ? $status : $status[$id]);
}

function user_grup($id=null) {
	$ci =& get_instance();
	if ($id == null) {
		$grup = $ci->db->get('grup');
		return $grup->result_array();
	} else {
		$grup = $ci->db->get_where('grup', array('grup_id'=>$id));
		$grup = $grup->row_array();
		return $grup['descrip'];
	}
}


