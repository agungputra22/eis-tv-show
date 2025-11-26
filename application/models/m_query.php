<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Author Agung Saputra
*/
class M_query extends CI_Model
{
	public function download($id){
	  $query = $this->db2->get_where('tbl_izin_full_day',array('id_full_day'=>$id));
	  return $query->row_array();
	}	

	public function download_log($id){
	  $query = $this->db2->get_where('tbl_log_visit_hr',array('id'=>$id));
	  return $query->row_array();
	}	

	function tampil_mutasi($nik_baru){
		$hsl=$this->db2->query("SELECT * FROM tbl_karyawan_struktur 
			LEFT JOIN tbl_jabatan_karyawan 
			ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan.`no_jabatan_karyawan`
			LEFT JOIN tbl_level_jabatan
			ON `tbl_jabatan_karyawan`.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
		WHERE nik_baru='$nik_baru' 
		ORDER BY id_struktur ASC"
		);
		return $hsl;
	}

	function dinas_full_day($nik_baru){
		$hsl=$this->db2->query("SELECT *
				, absensi_new.`tbl_izin_full_day`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline
			FROM
			absensi_new.`tbl_izin_full_day`
			WHERE absensi_new.`tbl_izin_full_day`.`nik_full_day` = '$nik_baru'
			AND absensi_new.`tbl_izin_full_day`.`jenis_full_day` = 'DN'"
		);
		return $hsl;
	}

	function dinas_non_full_day($nik_baru){
		$hsl=$this->db2->query("SELECT *
				, absensi_new.`tbl_izin_non_full`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline
			FROM
			absensi_new.`tbl_izin_non_full`
			WHERE absensi_new.`tbl_izin_non_full`.`nik_non_full` = '$nik_baru'
			AND absensi_new.`tbl_izin_non_full`.`jenis_non_full` = 'DN'"
		);
		return $hsl;
	}

	function cuti_tahunan($nik_baru){
		$hsl=$this->db2->query("SELECT *
				, absensi_new.`tbl_karyawan_cuti_tahunan`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline
			FROM
			absensi_new.`tbl_karyawan_cuti_tahunan`
			WHERE absensi_new.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` = '$nik_baru'"
		);
		return $hsl;
	}

	function cuti_khusus($nik_baru){
		$hsl=$this->db2->query("SELECT *
				, absensi_new.`tbl_karyawan_cuti_khusus`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline
			FROM
			absensi_new.`tbl_karyawan_cuti_khusus`
			WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = '$nik_baru'"
		);
		return $hsl;
	}

	function getMasuk($where='', $order='') {
		$this->db->select('*');
		$this->db->from('userinfo');
		$this->db->join('checkinout', 'userinfo.userid=checkinout.userid');
		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function getMaster_karyawan_sd($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_induk ki');
		$this->db2->join('tbl_karyawan_struktur ks','ki.nik_baru=ks.nik_baru');
		$this->db2->join('tbl_jabatan_karyawan jk', 'jk.no_jabatan_karyawan=ks.jabatan_hrd');

        if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getLaporan_jabatan($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_jabatan_karyawan');
		$this->db2->join('tbl_departement', 'tbl_jabatan_karyawan.dept_jabatan_karyawan=tbl_departement.departement_id');
		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getKaryawan_all($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('view_karyawan_detail kd');
		$this->db2->join('view_karyawan_detail_2 kd2', 'kd.nik_baru=kd2.nik_baru');
		$this->db2->join('view_karyawan_detail_3 kd3', 'kd.nik_baru=kd3.nik_baru');
		$this->db2->join('view_karyawan_detail_4 kd4', 'kd.nik_baru=kd4.nik_baru');
		$this->db2->join('tbl_karyawan_pengalaman_organisasi kpo', 'kd.nik_baru=kpo.nik_baru');
		$this->db2->join('tbl_karyawan_pengalaman_kerja kpk', 'kd.nik_baru=kpk.nik_baru');
		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	// function getMaster_karyawan($where) {
	// 	$this->db2->select('*');
	// 	$this->db2->from('tbl_karyawan_induk ki');
	// 	$this->db2->join('tbl_karyawan_struktur ks','ki.nik_baru=ks.nik_baru');
	// 	$this->db2->join('tbl_jabatan_karyawan jk', 'jk.no_jabatan_karyawan=ks.jabatan_hrd');
	// 	$this->db2->where('ks.nik_baru = ', $where);

 //        $get = $this->db2->get();
 //        return $get;
	// }

	function getMaster_karyawan($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_induk ki');
		$this->db2->join('tbl_karyawan_struktur ks','ki.nik_baru=ks.nik_baru');
		$this->db2->join('tbl_jabatan_karyawan jk', 'jk.no_jabatan_karyawan=ks.jabatan_hrd');
		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getSeragam_karyawan($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_seragam');
		$this->db2->join('tbl_seragam', 
			'tbl_karyawan_seragam.nama_seragam=tbl_seragam.id_seragam');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getIndex_refund($where='', $order='', $group='') {
		$this->db2->select('*');
		$this->db2->from('absensi_new.`tbl_karyawan_refund`');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur`', 
			'absensi_new.`tbl_karyawan_refund`.`nik` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`', 'left');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 
			'absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`', 'inner');
		$this->db2->join('absensi_new.`tbl_depo`', 
			'absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = absensi_new.`tbl_depo`.`depo_nama`', 'left');
		$this->db2->order_by('absensi_new.`tbl_karyawan_refund`.`submit_date` DESC');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		if(!empty($group)) {
			$this->db2->group_by($group);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getSeragam_kembali_karyawan($where='', $order='') {
		$this->db2->select('absensi_new.`tbl_karyawan_seragam_kembali`.`id`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`submit_date`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`no_pengajuan`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`nik_pengajuan`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`ket_pengajuan`
			, b.`nik_baru`
			, b.`nama_karyawan_struktur`
			, absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
			, b.`lokasi_hrd`
			, b.`dept_struktur`
			, b.`join_date_struktur`
			, absensi_new.`tbl_seragam`.`id_seragam`
			, absensi_new.`tbl_seragam`.`kode_seragam`
			, absensi_new.`tbl_seragam`.`nama_seragam`
			, absensi_new.`tbl_seragam`.`masa_seragam`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`qty_seragam`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`harga_satuan`
			, (absensi_new.`tbl_karyawan_seragam_kembali`.`qty_seragam` * absensi_new.`tbl_karyawan_seragam_kembali`.`harga_satuan`) AS total
			, absensi_new.`tbl_karyawan_seragam_kembali`.`tanggal_pengembalian`
			, absensi_new.`tbl_karyawan_seragam_kembali`.`ket_tambahan`');
		$this->db2->from('absensi_new.`tbl_karyawan_seragam_kembali`');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` a', 
			'absensi_new.`tbl_karyawan_seragam_kembali`.`nik_pengajuan` = a.`nik_baru`', 'left');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` b', 
			'absensi_new.`tbl_karyawan_seragam_kembali`.`nik_baru` = b.`nik_baru`', 'left');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 
			'absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = b.`jabatan_hrd`', 'inner');
		$this->db2->join('absensi_new.`tbl_seragam`', 
			'absensi_new.`tbl_seragam`.`id_seragam` = absensi_new.`tbl_karyawan_seragam_kembali`.`id_seragam`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getClearance_sheet($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_clearance_sheet kcs', 
			'ks.nik_baru=kcs.nik_baru');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getViolance($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_historical_violance khv', 
			'ks.nik_baru=khv.nik_baru');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'khv.jabatan_historical_violance=jk.no_jabatan_karyawan');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function investigasi_mutasi_tanggal($where='', $order='') {
		$this->db2->select('
				absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi`
				, a.`nik_baru` AS nik_pengajuan
				, a.`nama_karyawan_struktur`
				, f.`jabatan_karyawan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_lama`
				, absensi_new.`tbl_depo`.`kode_nik_depo`
				, absensi_new.`tbl_perusahaan`.`kode_perusahaan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nama_karyawan_mutasi`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`pt_awal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dept_awal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`lokasi_awal`
				, b.`jabatan_karyawan` AS jabatan_awal
				, d.`level_jabatan` AS level_awal
				, absensi_new.`tbl_karyawan_historical_mutasi`.`permintaan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`opsi`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`pt_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dept_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`lokasi_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_baru` as kode_jabatan_baru
				, c.`jabatan_karyawan` AS jabatan_baru
				, c.`no_jabatan_karyawan`
				, e.`level_jabatan` AS level_baru
				, absensi_new.`tbl_karyawan_historical_mutasi`.`rekomendasi_tanggal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_fa`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_sk`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_im`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_pjs`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_atasan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_approval`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_1`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_dokumen`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_penugasan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_pjs`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_keterangan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_lama`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_pengajuan`
			');
		$this->db2->from('absensi_new.`tbl_karyawan_historical_mutasi`');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` b', 
			'absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_awal` = b.`no_jabatan_karyawan`', 'left');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` c', 
			'absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_baru` = c.`no_jabatan_karyawan`', 'left');
		$this->db2->join('absensi_new.`tbl_level_jabatan` d', 
			'b.`level_jabatan_karyawan` = d.`id_level_jabatan`', 'left');
		$this->db2->join('absensi_new.`tbl_level_jabatan` e', 
			'c.`level_jabatan_karyawan` = e.`id_level_jabatan`', 'left');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` a', 
			'a.`nik_baru` = absensi_new.`tbl_karyawan_historical_mutasi`.`nik_pengajuan`', 'left');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` f', 
			'f.`no_jabatan_karyawan` = a.`jabatan_hrd`', 'left');
		$this->db2->join('absensi_new.`tbl_perusahaan`', 
			'absensi_new.`tbl_perusahaan`.`perusahaan_nama` = absensi_new.`tbl_karyawan_historical_mutasi`.`pt_baru`', 'left');
		$this->db2->join('absensi_new.`tbl_depo`', 
			'absensi_new.`tbl_depo`.`depo_nama` = absensi_new.`tbl_karyawan_historical_mutasi`.`lokasi_baru`', 'left');
		$this->db2->order_by('absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan` ASC');
		// $this->db2->group_by('absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan`');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function investigasi_mutasi($where='', $order='') {
		$this->db2->select('
				absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nama_karyawan_mutasi`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`pt_awal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dept_awal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`lokasi_awal`
				, b.`jabatan_karyawan` AS jabatan_awal
				, d.`level_jabatan` AS level_awal
				, absensi_new.`tbl_karyawan_historical_mutasi`.`permintaan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`pt_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`dept_baru`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`lokasi_baru`
				, c.`jabatan_karyawan` AS jabatan_baru
				, e.`level_jabatan` AS level_baru
				, absensi_new.`tbl_karyawan_historical_mutasi`.`rekomendasi_tanggal`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_fa`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_atasan`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_approval`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_1`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_dokumen`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_im`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_pjs`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`tanggal_efektif_sk`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`nik_lama`
				, absensi_new.`tbl_karyawan_historical_mutasi`.`status_pengajuan`
			');
		$this->db2->from('absensi_new.`tbl_karyawan_historical_mutasi`');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` b', 
			'absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_awal` = b.`no_jabatan_karyawan`', 'left');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` c', 
			'absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_baru` = c.`no_jabatan_karyawan`', 'left');
		$this->db2->join('absensi_new.`tbl_level_jabatan` d', 
			'b.`level_jabatan_karyawan` = d.`id_level_jabatan`', 'left');
		$this->db2->join('absensi_new.`tbl_level_jabatan` e', 
			'c.`level_jabatan_karyawan` = e.`id_level_jabatan`', 'left');
		$this->db2->group_by('absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan`');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getPer_detail_absen($where='', $order='') {
		$this->db->select('*');
		$this->db->from('userinfo ui');
		$this->db->join('checkinout cio', 
			'ui.userid=cio.userid');

		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function index_histori_kontrak($where='', $order='') {
		$this->db->select('*');
		$this->db->from('absensi_new.`tbl_karyawan_kontrak`');
		$this->db->join('absensi_new.`tbl_karyawan_struktur`', 
			'absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`', 'left');
		$this->db->order_by('absensi_new.`tbl_karyawan_kontrak`.`kontrak` ASC');

		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function index_karyawan_project($where='', $order='') {
		$this->db->select('*');
		$this->db->from('absensi_new.`tbl_karyawan_struktur`');
		$this->db->order_by('absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur` ASC');

		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function index_karyawan_project_snd($jabatan){
		$hsl=$this->db2->query("SELECT
			`tbl_karyawan_struktur`.`nik_baru`
			, `tbl_karyawan_struktur`.`nik_lama`
			, `tbl_karyawan_struktur`.`nama_karyawan_struktur`
			, `tbl_jabatan_karyawan`.`jabatan_karyawan`
			, `tbl_karyawan_struktur`.`lokasi_hrd`
			, `tbl_karyawan_struktur`.`perusahaan_struktur`
			, `tbl_karyawan_struktur`.`level_struktur`
			, `tbl_karyawan_struktur`.`dept_struktur`
			, `tbl_karyawan_struktur`.`join_date_struktur`
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		WHERE `tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		OR (`tbl_karyawan_struktur`.`jabatan_hrd` = '275'
		OR `tbl_karyawan_struktur`.`jabatan_hrd` = '281'
		OR `tbl_karyawan_struktur`.`jabatan_hrd` = '277'
		OR `tbl_karyawan_struktur`.`jabatan_hrd` = '278')
		ORDER BY `tbl_karyawan_struktur`.`nama_karyawan_struktur` ASC"
		);
		return $hsl;
	}

	function index_karyawan_project_wop($jabatan){
		$hsl=$this->db2->query("SELECT
			`tbl_karyawan_struktur`.`nik_baru`
			, `tbl_karyawan_struktur`.`nik_lama`
			, `tbl_karyawan_struktur`.`nama_karyawan_struktur`
			, `tbl_jabatan_karyawan`.`jabatan_karyawan`
			, `tbl_karyawan_struktur`.`lokasi_hrd`
			, `tbl_karyawan_struktur`.`perusahaan_struktur`
			, `tbl_karyawan_struktur`.`level_struktur`
			, `tbl_karyawan_struktur`.`dept_struktur`
			, `tbl_karyawan_struktur`.`join_date_struktur`
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		WHERE `tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND `tbl_karyawan_struktur`.`dept_struktur` = 'Warehouse'
		ORDER BY `tbl_karyawan_struktur`.`nama_karyawan_struktur` ASC"
		);
		return $hsl;
	}

	function index_ba_refund($nik){
		$hsl=$this->db2->query("SELECT
			tbl_refund.`no_pengajuan`
			, tbl_refund.`nik_pengajuan`
			, tbl_refund.`status_ba`
			, (SELECT COUNT(absensi_new.`tbl_karyawan_refund`.`nik`)
			FROM absensi_new.`tbl_karyawan_refund`
			WHERE absensi_new.`tbl_karyawan_refund`.`nik_pengajuan` = tbl_refund.`nik_pengajuan`
			AND absensi_new.`tbl_karyawan_refund`.`no_pengajuan` = tbl_refund.`no_pengajuan`) AS jumlah_refund
		FROM (SELECT 
			absensi_new.`tbl_karyawan_refund`.`submit_date`
			, absensi_new.`tbl_karyawan_refund`.`no_pengajuan`
			, absensi_new.`tbl_karyawan_refund`.`nik_pengajuan`
			, absensi_new.`tbl_karyawan_refund`.`status_ba`
		FROM absensi_new.`tbl_karyawan_refund`
		WHERE absensi_new.`tbl_karyawan_refund`.`nik_pengajuan` = '$nik'
		GROUP BY absensi_new.`tbl_karyawan_refund`.`no_pengajuan`) tbl_refund
		ORDER BY tbl_refund.`no_pengajuan` DESC "
		);
		return $hsl;
	}

	function persentase_performance($where='', $order='') {
		$this->db->select('*');
		$this->db->from('absensi_new.`tbl_karyawan_master_performance`');
		$this->db->group_by('absensi_new.`tbl_karyawan_master_performance`.`nik_baru`');

		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function persentase_performance_perbulan($where='', $order='') {
		$this->db->select('*');
		$this->db->from('absensi_new.`tbl_karyawan_histori_performance`');
		$this->db->group_by('absensi_new.`tbl_karyawan_histori_performance`.`nik_baru`');

		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get();

		return $get;
	}

	function getPengajuanDinas($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('absensi_new.`tbl_izin_full_day`');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur`',
			'absensi_new.`tbl_izin_full_day`.`nik_full_day` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getFar_piutang($where='', $order='') {
		$this->db2->select('a.`id`
			, a.`nik`
			, a.`submit_date`
			, a.`no_pengajuan`
			, a.`tanggal_far`
			, b.`nik_baru`
			, b.`nama_karyawan_struktur`
			, c.`jabatan_karyawan`
			, b.`lokasi_hrd`
			, b.`perusahaan_struktur`
			, b.`join_date_struktur`
			, a.`nominal`
			, a.`type`
			, a.`keterangan`
			, a.`status_far`
			, a.`status_fa` ');
		$this->db2->from('absensi_new.`tbl_piutang_far` a');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` b',
			'a.`nik` = b.`nik_baru`', 'inner');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` c',
			'b.`jabatan_hrd` = c.`no_jabatan_karyawan`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getFar_piutang_detail($where='', $order='') {
		$this->db2->select('a.`id`
			, a.`no_far`
			, b.`nik_baru`
			, b.`nama_karyawan_struktur`
			, c.`jabatan_karyawan`
			, b.`lokasi_hrd`
			, b.`perusahaan_struktur`
			, b.`join_date_struktur`
			, a.`piutang`
			, a.`cicilan` ');
		$this->db2->from('absensi_new.`tbl_piutang_far_detail` a');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` b',
			'a.`nik` = b.`nik_baru`', 'inner');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan` c',
			'b.`jabatan_hrd` = c.`no_jabatan_karyawan`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getLog_support_ict($where='', $order='') {
		$this->db2->select('a.`id`
			, a.`submit_date`
			, b.`nik_baru`
			, b.`nama_karyawan_struktur`
			, a.`issue`
			, a.`depo`
			, e.`depo_nama`
			, a.`tanggal`
			, a.`jam`
			, a.`solving`
			, c.`nama_aplikasi`
			, a.`aplikasi`
			, d.`nama_kategori`
			, a.`kategori`
			, a.`status` ');
		$this->db2->from('absensi_new.`tbl_log_ict_support` a');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` b',
			'a.`nik` = b.`nik_baru`', 'inner');
		$this->db2->join('absensi_new.`tbl_log_support_aplikasi` c',
			'a.`aplikasi` = c.`id`', 'inner');
		$this->db2->join('absensi_new.`tbl_log_support_kategori` d',
			'a.`kategori` = d.`id`', 'inner');
		$this->db2->join('absensi_new.`tbl_depo` e',
			'a.`depo` = e.`depo_id`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getHasil_covid($where='', $order='') {
		$this->db2->select('IFNULL(SUM(b.`bobot`), 0) AS hasil');
		$this->db2->from('absensi_new.`tbl_self_covid` a');
		$this->db2->join('absensi_new.`tbl_jawaban_covid` b',
			'a.`id_jawaban` = b.`id`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getData_kpi($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('absensi_new.`tbl_kpi` a');
		$this->db2->join('absensi_new.`tbl_departement` b',
			'a.`dept` = b.`departement_id`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getData_ipp($where='', $order='') {
		$this->db2->select('a.`id
			, a.`submit_date`
			, a.`nik_baru`
			, a.`jabatan`
			, a.`task`
			, a.`evaluasi`
			, a.`bobot`
			, a.`target`
			, b.`keterangan`
			, b.`persentase`
			, a.`kode`
			, a.`status`
			');
		$this->db2->from('absensi_new.`tbl_karyawan_master_performance` a');
		$this->db2->join('absensi_new.`tbl_kpi` b',
			'a.`kpi` = b.`id`', 'left');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getData_ipp_histori($where='', $order='') {
		$this->db2->select('a.`id
			, a.`submit_date`
			, a.`nik_baru`
			, a.`jabatan`
			, a.`task`
			, a.`evaluasi`
			, a.`bobot`
			, a.`target`
			, b.`keterangan` AS ket_kpi
			, b.`persentase`
			, a.`kode`
			, a.`status_performance`
			, a.`persentase_atasan`
			, a.`persentase_user`
			, a.`keterangan`
			, a.`bulan`
			, a.`tahun`
			');
		$this->db2->from('absensi_new.`tbl_karyawan_histori_performance` a');
		$this->db2->join('absensi_new.`tbl_kpi` b',
			'a.`kpi` = b.`id`', 'left');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getData_Refund($where='', $order='') {
		$this->db2->select('a.`id`
		, a.`no_pengajuan`
		, a.`nik`
		, a.`nik_pengajuan`
		, b.`nama_karyawan_struktur`
		, a.`tanggal_absen`
		, a.`absen_awal`
		, a.`absen_akhir`
		, a.`ket`
		, a.`dokumen`
		, a.`status_pengajuan`
			');
		$this->db2->from('absensi_new.`tbl_karyawan_refund` a');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur` b',
			'a.`nik` = b.`nik_baru`', 'inner');
		$this->db2->order_by('a.`id` ASC');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function select_row_data($select, $table, $where='', $order='') {
		$this->db2->select($select);
		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order);
		}
		$get = $this->db2->get($table);

		return $get;
	}

	function select_row_data_all($select, $table, $where='', $order='') {
		$this->db2->select($select);
		if(!empty($where)) {
			$this->db2->where_in('id_cuti_khusus', $where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get($table);

		return $get;
	}

	function select_row_data_daily($select, $table, $where='', $order='') {
		$this->db2->select($select);
		if(!empty($where)) {
			$this->db2->where_in('id', $where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get($table);

		return $get;
	}

	function select_row_data_absen($select, $table, $where='', $order='') {
		$this->db3->select($select);
		if(!empty($where)) {
			$this->db3->where($where);
		}
		if(!empty($order)) {
			$this->db3->order_by($order);
		}
		$get = $this->db3->get($table);

		return $get;
	}

    function insert_data($table, $data) {
		$this->db2->insert($table, $data);
		return true;
	}

    function update_data($table, $data, $where) {
		$this->db2->where($where);
		$this->db2->update($table, $data);
		return true;
	}

	function update_data_all($table, $data, $where) {
		$this->db2->where_in('id_cuti_khusus', $where);
		$this->db2->update($table, $data);
		return true;
	}

	function delete_data($table, $where)
	{
		$this->db2->where($where);
		$this->db2->delete($table);
		return true;
	}

	function delete_data_all($table, $where)
	{
		$this->db2->where_in('id', $where);
		$this->db2->delete($table);
		return true;
	}

	function data_events()
    {
        return $this->db2->get('events');
    }

	function data_depo()
    {
        return $this->db2->get('tbl_depo');
    }

    function data_departement()
    {
        return $this->db2->get('tbl_departement');
    }

    function data_jabatan()
    {
        return $this->db2->get('tbl_jabatan');
    }

    function data_karyawan()
    {
        return $this->db2->get('tbl_karyawan');
    }

    function data_golongan()
    {
        return $this->db2->get('tbl_golongan');
    }

    function unggah_historical($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './uploads/historical_mutasi_rotasi/'.$path;
		$config['allowed_types'] = 'pdf|docx|xlsx|jpg|jpeg|gif|png';
		$config['max_size'] = '5000';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

	function unggah($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './uploads/data_induk/'.$path;
		$config['allowed_types'] = 'pdf|docx|xlsx|jpg|jpeg|gif|png';
		$config['max_size'] = '2600';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

	function unggah_violance($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'pdf|docx|xlsx|jpg|jpeg|gif|png';
		$config['max_size'] = '2600';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

	function unggah_out_source($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'pdf|docx|xlsx|jpg|jpeg|gif|png|xls';
		$config['max_size'] = '10000000';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

	function unggah_resign($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'pdf|jpg|jpeg|png';
		$config['max_size'] = '10000000';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

	function unggah_row_data($path=null,$name=null,$rename=null,$id)
	{
		$config['upload_path'] = './uploads/'.$path;
		$config['allowed_types'] = 'pdf|docx|xlsx|jpg|jpeg|gif|png|xls';
		$config['max_size'] = '10000000';
		if($rename!=null) {
			$config['file_name'] = $rename;
		}
		$this->load->library('upload',$config);

		$this->upload->initialize($config);
		if(!$this->upload->do_upload($name)) {
			return false;
		} else {
			return true;
		}
	}

    public function upload_file($filename){
		$this->load->library('upload'); // Load librari upload
		
		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;
	
		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple($table, $data){
		$this->db2->insert_batch($table, $data);
		return true;
	}

    function jenis_pelanggaran(){
        $query = $this->db2->query("SELECT * FROM tbl_karyawan_jenis_pelanggaran WHERE type_pelanggaran = 'Surat Teguran' OR type_pelanggaran = 'Surat Peringatan 1' OR type_pelanggaran = 'Surat Peringatan 2' ");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function input_ipp_tt($nik_baru, $bulan, $tahun){
		$hsl=$this->db2->query("INSERT INTO absensi_new.`tbl_karyawan_histori_performance`
			(`nik_baru`,`jabatan`,`task`,`evaluasi`,`bobot`,`target`,`kpi`,`kode`,`status_performance`,`bulan`,`tahun`)
			(SELECT 
				absensi_new.`tbl_karyawan_master_performance`.`nik_baru`
				, absensi_new.`tbl_karyawan_master_performance`.`jabatan`
				, absensi_new.`tbl_karyawan_master_performance`.`task`
				, absensi_new.`tbl_karyawan_master_performance`.`evaluasi`
				, absensi_new.`tbl_karyawan_master_performance`.`bobot`
				, absensi_new.`tbl_karyawan_master_performance`.`target`
				, absensi_new.`tbl_karyawan_master_performance`.`kpi`
				, absensi_new.`tbl_karyawan_master_performance`.`kode`
				, absensi_new.`tbl_karyawan_master_performance`.`status`
				, '$bulan'
				, '$tahun'
			FROM absensi_new.`tbl_karyawan_master_performance`
			WHERE absensi_new.`tbl_karyawan_master_performance`.`nik_baru` = '$nik_baru')"
		);
		return $hsl;
	}

    function index_jabatan_ptk($dept){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan`
			INNER JOIN absensi_new.`tbl_departement`
				ON absensi_new.`tbl_jabatan_karyawan`.`dept_jabatan_karyawan` = absensi_new.`tbl_departement`.`departement_id`
			WHERE absensi_new.`tbl_departement`.`nama_departement` = '$dept'"
		);
		return $hsl;
	}

	function index_jabatan_ptk_gm(){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan`
			INNER JOIN absensi_new.`tbl_departement`
				ON absensi_new.`tbl_jabatan_karyawan`.`dept_jabatan_karyawan` = absensi_new.`tbl_departement`.`departement_id`
			WHERE absensi_new.`tbl_jabatan_karyawan`.`area` = '1'
			AND absensi_new.`tbl_jabatan_karyawan`.`level_jabatan_karyawan` >= '7'"
		);
		return $hsl;
	}

	function index_jabatan_ptk_permintaan(){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan`
			INNER JOIN absensi_new.`tbl_departement`
				ON absensi_new.`tbl_jabatan_karyawan`.`dept_jabatan_karyawan` = absensi_new.`tbl_departement`.`departement_id`
			WHERE absensi_new.`tbl_departement`.`nama_departement` = 'Fleet'
			OR absensi_new.`tbl_departement`.`nama_departement` = 'General Affair' "
		);
		return $hsl;
	}

	function index_jabatan_ptk_case(){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan`
			INNER JOIN absensi_new.`tbl_departement`
				ON absensi_new.`tbl_jabatan_karyawan`.`dept_jabatan_karyawan` = absensi_new.`tbl_departement`.`departement_id`
			WHERE absensi_new.`tbl_departement`.`nama_departement` = 'Fleet'
			OR absensi_new.`tbl_departement`.`nama_departement` = 'General Affair' "
		);
		return $hsl;
	}

    function tampil($nik_baru){
		$hsl=$this->db2->query("SELECT * FROM tbl_karyawan_struktur 
			INNER JOIN tbl_jabatan_karyawan 
			ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan.`no_jabatan_karyawan`
		WHERE nik_baru='$nik_baru' 
		ORDER BY id_struktur ASC"
		);
		return $hsl;
	}

	function tampil_ket_resign($alasan_resign){
		$hsl=$this->db2->query("SELECT * FROM tbl_alasan_resign
			WHERE alasan_resign='$alasan_resign'
			ORDER BY id_alasan_resign ASC"
		);
		return $hsl;
	}

	function tampil_adms($nik_baru){
		$hsl=$this->db->query("SELECT * FROM adms_db.`userinfo`
		WHERE adms_db.`userinfo`.`badgenumber` = '$nik_baru' "
		);
		return $hsl;
	}

	function tampil_atasan($dept_struktur){
		$hsl=$this->db2->query("SELECT * FROM tbl_departement
			WHERE nama_departement='$dept_struktur'
			ORDER BY departement_id ASC"
		);
		return $hsl;
	}

	function tampil_kode_perusahaan($perusahaan_struktur){
		$hsl=$this->db2->query("SELECT * FROM tbl_perusahaan
			WHERE perusahaan_nama='$perusahaan_struktur'
			ORDER BY perusahaan_id ASC"
		);
		return $hsl;
	}

	function tampil_kode_lokasi($lokasi_hrd){
		$hsl=$this->db2->query("SELECT * FROM tbl_depo
			WHERE depo_nama='$lokasi_hrd'
			ORDER BY depo_id ASC"
		);
		return $hsl;
	}

	function tampil_kode_dept($dept_baru){
		$hsl=$this->db2->query("SELECT * FROM tbl_departement
			WHERE nama_departement='$dept_baru'
			ORDER BY departement_id ASC"
		);
		return $hsl;
	}

	function tampil_kode_jabatan($jabatan_karyawan){
		$hsl=$this->db2->query("SELECT * FROM tbl_jabatan_karyawan
		LEFT JOIN tbl_level_jabatan ON tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
		WHERE tbl_jabatan_karyawan.`no_jabatan_karyawan`='$jabatan_karyawan'
		ORDER BY tbl_jabatan_karyawan.`no_jabatan_karyawan` ASC"
		);
		return $hsl;
	}

	function tampil_seragam($id_seragam){
		$hsl=$this->db2->query("SELECT * FROM tbl_seragam
			WHERE id_seragam='$id_seragam'
			ORDER BY id_seragam ASC"
		);
		return $hsl;
	}

	function tampil_pelanggaran($pelanggaran_historical_violance){
		$hsl=$this->db2->query("SELECT * FROM tbl_karyawan_jenis_pelanggaran
			WHERE jenis_pelanggaran='$pelanggaran_historical_violance'
			ORDER BY id_jenis_pelanggaran ASC"
		);
		return $hsl;
	}

	function tampil_hari($kondisi){
		$hsl=$this->db2->query("SELECT * FROM tbl_cuti_khusus
			WHERE kondisi_cuti_khusus='$kondisi'
			ORDER BY id_cuti ASC"
		);
		return $hsl;
	}

	function insert_daily($where){
		$hsl=$this->db2->query("INSERT INTO `absensi_new`.`tbl_daily_activity` (`waktu_submit`, `nik`,`status_lokasi`,`lokasi`,`keterangan`,`lat`,`lon`)
			SELECT `submit_date`, `nik`, `status_lokasi`, `lokasi`, `keterangan`, `lat`, `lon`
			FROM absensi_new.`tmp_daily_activity`
			WHERE `id` IN ($where)"
		);
		return $hsl;
	}

	function delete_daily($where){
		$hsl=$this->db2->query("DELETE FROM absensi_new.`tmp_daily_activity`
			WHERE absensi_new.`tmp_daily_activity`.`id` IN ($where)"
		);
		return $hsl;
	}

	function update_cuti_all($where, $tanggal){
		$hsl=$this->db2->query("UPDATE `absensi_new`.`tbl_karyawan_cuti_khusus`
			SET `status_cuti_khusus` = '1', `tanggal_approval_cuti_khusus` = '$tanggal', `feedback_cuti_khusus` = 'Ok ACC Cuti (Approval All)'
			WHERE `id_cuti_khusus` IN ($where)"
		);
		return $hsl;
	}

	function index_clearance_sheet_pusat($dept){
		if ($dept == 'Finance Accounting and Purchasing') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_fa` = '0'";
		}
		if ($dept == 'General Affair') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_ga` = '0'";
		}
		if ($dept == 'Human Resource Development') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_hrd` = '0'";
		}
		if ($dept == 'Information Communication and Technology') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_ict` = '0'";
		}
		if ($dept == 'Internal Audit and Quality Management System') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_qms` = '0'";
		}
		if ($dept == 'Warehouse Operation') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_wop` = '0'";
		}

		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_karyawan_resign`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_resign`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan`
			ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
		WHERE (absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = 'Pusat'
		OR absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '255')
		AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan_2` = '1'
		$where"
		);
		return $hsl;
	}

	function detail_clearance_sheet_pusat($dept, $id){
		if ($dept == 'Finance Accounting and Purchasing') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_fa` = '0'";
		}
		if ($dept == 'General Affair') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_ga` = '0'";
		}
		if ($dept == 'Human Resource Development') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_hrd` = '0'";
		}
		if ($dept == 'Information Communication and Technology') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_ict` = '0'";
		}
		if ($dept == 'Internal Audit and Quality Management System') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_qms` = '0'";
		}
		if ($dept == 'Warehouse Operation') {
			$where = "AND absensi_new.`tbl_karyawan_resign`.`status_wop` = '0'";
		}

		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_karyawan_resign`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_resign`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan`
			ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
		WHERE (absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = 'Pusat'
		OR absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '255')
		AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan_2` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`id` = '$id'
		$where"
		);
		return $hsl;
	}

	function index_clearance_sheet($lokasi){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_karyawan_resign`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_resign`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan`
			ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
		WHERE absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan_2` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_fa` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_wop` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_hrd` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_ict` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_ga` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_qms` = '0'
		AND absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'"
		);
		return $hsl;
	}

	function detail_clearance_sheet($lokasi, $id){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_karyawan_resign`
		INNER JOIN absensi_new.`tbl_karyawan_struktur`
			ON absensi_new.`tbl_karyawan_resign`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan`
			ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
		WHERE absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_atasan_2` = '1'
		AND absensi_new.`tbl_karyawan_resign`.`status_fa` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_wop` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_hrd` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_ict` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_ga` = '0'
		AND absensi_new.`tbl_karyawan_resign`.`status_qms` = '0'
		AND absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'
		AND absensi_new.`tbl_karyawan_resign`.`id` = '$id'"
		);
		return $hsl;
	}

	function getMaster_karyawan_email($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_induk ki ', 
			'ki.nik_baru=ks.nik_baru', 'inner');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'jk.no_jabatan_karyawan=ks.jabatan_hrd', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function karyawan_email_pusat($jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_1` = b.`jabatan_hrd`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan` c
			ON b.`jabatan_hrd` = c.`no_jabatan_karyawan`
		WHERE a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		AND b.`email` IS NOT NULL
		GROUP BY b.`nik_baru`
		LIMIT 1"
		);
		return $hsl;
	}

	function karyawan_email_pusat_atasan2($jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_2` = b.`jabatan_hrd`
		WHERE a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		AND b.`email` IS NOT NULL
		GROUP BY b.`nik_baru`
		LIMIT 1"
		);
		return $hsl;
	}

	function karyawan_email_pusat_2($jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_2` = b.`jabatan_hrd`
		WHERE a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		AND b.`email` IS NOT NULL
		GROUP BY b.`nik_baru`
		LIMIT 1"
		);
		return $hsl;
	}

	function karyawan_email_depo($lokasi, $jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_1` = b.`jabatan_hrd`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan` c
			ON b.`jabatan_hrd` = c.`no_jabatan_karyawan`
		WHERE b.`lokasi_hrd` = '$lokasi'
		AND a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		GROUP BY b.`nik_baru`"
		);
		return $hsl;
	}

	function karyawan_email_depo_atasan2($lokasi, $jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_2` = b.`jabatan_hrd`
		WHERE b.`lokasi_hrd` = '$lokasi'
		AND a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		GROUP BY b.`nik_baru`"
		);
		return $hsl;
	}

	function karyawan_email_depo_2($lokasi, $jabatan){
		$hsl=$this->db2->query("SELECT * FROM absensi_new.`tbl_jabatan_karyawan_approval` a
		LEFT JOIN absensi_new.`tbl_karyawan_struktur` b
			ON a.`no_jabatan_karyawan_atasan_2` = b.`jabatan_hrd`
		WHERE b.`lokasi_hrd` = '$lokasi'
		AND a.`no_jabatan_karyawan` = '$jabatan'
		AND b.`status_karyawan` = '0'
		GROUP BY b.`nik_baru`"
		);
		return $hsl;
	}

	function getMaster_karyawan_resign($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_induk ki ', 
			'ki.nik_baru=ks.nik_baru', 'inner');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'jk.no_jabatan_karyawan=ks.jabatan_hrd', 'inner');
		$this->db2->join('tbl_karyawan_resign kr', 
			'kr.nik_baru=ks.nik_baru', 'left');
		$this->db2->join('tbl_departement d', 
			'd.nama_departement=ks.dept_struktur', 'left');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getMaster_karyawan_resign_atasan($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('absensi_new.`tbl_karyawan_resign`');
		$this->db2->join('absensi_new.`tbl_karyawan_struktur`', 
			'absensi_new.`tbl_karyawan_resign`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`', 'inner');
		$this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 
			'absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`', 'inner');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	public function hitungJumlahKaryawan()
	{
	   	$non_aktif = $this->db2->query("SELECT COUNT( * ) as total FROM tbl_karyawan_historical WHERE `karyawan_status` = 'Non Aktif'
                 GROUP BY id_historical");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function non_aktif()
	{
	   	$non_aktif = $this->db2->query("SELECT * FROM `tbl_karyawan_historical` WHERE `karyawan_status` = 'Non Aktif'");
		return $non_aktif;
	}

	public function investigasi()
	{
	   	$non_aktif = $this->db2->query("SELECT * FROM `tbl_karyawan_historical_mutasi` WHERE `status_historical` = '0'");
		return $non_aktif;
	}

	public function index_approve()
	{
	   	$non_aktif = $this->db2->query("SELECT * FROM `tbl_karyawan_historical_mutasi` WHERE `status_historical` = '1'");
		return $non_aktif;
	}

	public function index_reject()
	{
	   	$non_aktif = $this->db2->query("SELECT * FROM `tbl_karyawan_historical_mutasi` WHERE `status_historical` = '2'");
		return $non_aktif;
	}

	public function hitung_critical_renew_mou()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_renew`, current_date()) - 1 as jangka_waktu from tbl_renew_mou GROUP BY `id_renew` HAVING jangka_waktu <= 15");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_warning_renew_mou()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_renew`, current_date()) - 1 as jangka_waktu from tbl_renew_mou GROUP BY `id_renew` HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function critical_renew_mou()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_renew`, `nama_renew`, `no_renew`, `upload_renew_mou`, `start_renew`, `end_renew`, current_date() as tgl_sekarang, datediff(`end_renew`, current_date()) - 1 as jangka_waktu from tbl_renew_mou HAVING jangka_waktu <= 15");
	   	return $non_aktif;
	}

	public function warning_renew_mou()
	{
		$non_aktif = $this->db2->query("Select `id_renew`, `nama_renew`, `no_renew`, `upload_renew_mou`, `start_renew`, `end_renew`, current_date() as tgl_sekarang, datediff(`end_renew`, current_date()) - 1 as jangka_waktu from tbl_renew_mou HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	   	return $non_aktif;
	}

	public function hitung_critical_mou()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_mou`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen GROUP BY `id_upload` HAVING jangka_waktu <= 15");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_warning_mou()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_mou`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen GROUP BY `id_upload` HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function critical_mou()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_upload`, `nama_lembaga`, `no_mou`, `upload_mou`, `start_mou`, `end_mou`, current_date() as tgl_sekarang, datediff(`end_mou`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen HAVING jangka_waktu <= 15");
	   	return $non_aktif;
	}

	public function warning_mou()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_upload`, `nama_lembaga`, `no_mou`, `upload_mou`, `start_mou`, `end_mou`, current_date() as tgl_sekarang, datediff(`end_mou`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	   	return $non_aktif;
	}

	public function hitung_critical_adendum()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_adendum`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen GROUP BY `id_upload` HAVING jangka_waktu <= 15");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_warning_adendum()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_adendum`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen GROUP BY `id_upload` HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function critical_adendum()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_upload`, `nama_lembaga`, `no_adendum`, `upload_adendum`, `start_adendum`, `end_adendum`, current_date() as tgl_sekarang, datediff(`end_adendum`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen HAVING jangka_waktu <= 15");
	   	return $non_aktif;
	}

	public function warning_adendum()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_upload`, `nama_lembaga`, `no_adendum`, `upload_adendum`, `start_adendum`, `end_adendum`, current_date() as tgl_sekarang, datediff(`end_adendum`, current_date()) - 1 as jangka_waktu from tbl_upload_dokumen HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	   	return $non_aktif;
	}

	public function hitung_critical_violance()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`tanggal_notif`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical_violance GROUP BY `id_historical_violance` HAVING jangka_waktu <= 15");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_warning_violance()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`tanggal_notif`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical_violance GROUP BY `id_historical_violance` HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function critical_violance()
	{	    
	   	$non_aktif = $this->db2->query("Select khv.id_historical_violance, khv.nik_baru, khv.nama_karyawan_violance, khv.jabatan_historical_violance, khv.rekomondasi_historical_violance, khv.pelanggaran_historical_violance, khv.punishment_historical_violance, khv.tanggal_surat, khv.warning_start_historical_violance, khv.warning_end_historical_violance, khv.tanggal_notif, khv.warning_note_historical_violance, khv.dokumen_historical_violance, ks.perusahaan_struktur, current_date() as tgl_sekarang, datediff(khv.tanggal_notif, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical_violance khv LEFT JOIN tbl_karyawan_struktur ks ON khv.nik_baru = ks.nik_baru HAVING jangka_waktu <= 15");
	   	return $non_aktif;
	}

	public function warning_violance()
	{	    
	   	$non_aktif = $this->db2->query("Select khv.id_historical_violance, khv.nik_baru, khv.nama_karyawan_violance, khv.jabatan_historical_violance, khv.rekomondasi_historical_violance, khv.pelanggaran_historical_violance, khv.punishment_historical_violance, khv.tanggal_surat, khv.warning_start_historical_violance, khv.warning_end_historical_violance, khv.tanggal_notif, khv.warning_note_historical_violance, khv.dokumen_historical_violance, ks.perusahaan_struktur, current_date() as tgl_sekarang, datediff(khv.tanggal_notif, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical_violance khv LEFT JOIN tbl_karyawan_struktur ks ON khv.nik_baru = ks.nik_baru HAVING jangka_waktu >= 16 && jangka_waktu <= 30");
	   	return $non_aktif;
	}

	public function hitung_critical_kontrak()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical GROUP BY `id_historical` HAVING jangka_waktu <= 30");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_warning_kontrak()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical GROUP BY `id_historical` HAVING jangka_waktu >= 31 && jangka_waktu <= 45");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hitung_normal_kontrak()
	{
	   	$non_aktif = $this->db2->query("Select COUNT( * ) as total, current_date() AS tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical GROUP BY `id_historical` HAVING jangka_waktu >= 46 && jangka_waktu <= 60");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function critical_kontrak()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_historical`, `nik_baru`, `nama_karyawan_historical`, `jabatan_historical`, `status_karyawan_pkwt`, `karyawan_status`, `start_pkwt_1`, `end_pkwt_1`, `dokumen_pkwt_1`, current_date() as tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical HAVING jangka_waktu <= 30");
	   	return $non_aktif;
	}

	public function warning_kontrak()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_historical`, `nik_baru`, `nama_karyawan_historical`, `jabatan_historical`, `status_karyawan_pkwt`, `karyawan_status`, `start_pkwt_1`, `end_pkwt_1`, `dokumen_pkwt_1`, current_date() as tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical HAVING jangka_waktu >= 31 && jangka_waktu <= 45");
	   	return $non_aktif;
	}

	public function normal_kontrak()
	{	    
	   	$non_aktif = $this->db2->query("Select `id_historical`, `nik_baru`, `nama_karyawan_historical`, `jabatan_historical`, `status_karyawan_pkwt`, `karyawan_status`, `start_pkwt_1`, `end_pkwt_1`, `dokumen_pkwt_1`, current_date() as tgl_sekarang, datediff(`end_pkwt_1`, current_date()) - 1 as jangka_waktu from tbl_karyawan_historical HAVING jangka_waktu >= 46 && jangka_waktu <= 60");
	   	return $non_aktif;
	}

	public function karyawan_lembur_fa($birth_date, $lokasi)
	{	    
	   	$spl = $this->db2->query("SELECT * 
			FROM tbl_karyawan_lembur
			LEFT JOIN tbl_shifting ON tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting
			LEFT JOIN tbl_jabatan_karyawan ON tbl_jabatan_karyawan.`no_jabatan_karyawan`=tbl_karyawan_lembur.`jabatan_karyawan_lembur`
			LEFT JOIN tbl_karyawan_struktur ON tbl_karyawan_struktur.`nik_baru`=tbl_karyawan_lembur.`nik_lembur`
			WHERE lokasi_karyawan_lembur = '$lokasi' 
			AND tanggal_lembur = '$birth_date' 
			AND STATUS = '1' 
			AND status_2 = '1' 
			AND dept_struktur = 'Finance Accounting & Purchasing'");
	   	return $spl;
	}

	public function karyawan_lembur_ga($birth_date, $lokasi)
	{	    
	   	$spl = $this->db2->query("SELECT * 
			FROM tbl_karyawan_lembur
			LEFT JOIN tbl_shifting ON tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting
			LEFT JOIN tbl_jabatan_karyawan ON tbl_jabatan_karyawan.`no_jabatan_karyawan`=tbl_karyawan_lembur.`jabatan_karyawan_lembur`
			LEFT JOIN tbl_karyawan_struktur ON tbl_karyawan_struktur.`nik_baru`=tbl_karyawan_lembur.`nik_lembur`
			WHERE lokasi_karyawan_lembur = '$lokasi' 
			AND tanggal_lembur = '$birth_date' 
			AND STATUS = '1' 
			AND status_2 = '1' 
			AND dept_struktur = 'General Affair'");
	   	return $spl;
	}

	public function karyawan_lembur_sc($birth_date, $lokasi)
	{	    
	   	$spl = $this->db2->query("SELECT * 
			FROM tbl_karyawan_lembur
			LEFT JOIN tbl_shifting ON tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting
			LEFT JOIN tbl_jabatan_karyawan ON tbl_jabatan_karyawan.`no_jabatan_karyawan`=tbl_karyawan_lembur.`jabatan_karyawan_lembur`
			LEFT JOIN tbl_karyawan_struktur ON tbl_karyawan_struktur.`nik_baru`=tbl_karyawan_lembur.`nik_lembur`
			WHERE lokasi_karyawan_lembur = '$lokasi' 
			AND tanggal_lembur = '$birth_date' 
			AND STATUS = '1' 
			AND status_2 = '1' 
			AND dept_struktur = 'Supply Chain'");
	   	return $spl;
	}

	public function karyawan_lembur_sd($birth_date, $lokasi)
	{	    
	   	$spl = $this->db2->query("SELECT * 
			FROM tbl_karyawan_lembur
			LEFT JOIN tbl_shifting ON tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting
			LEFT JOIN tbl_jabatan_karyawan ON tbl_jabatan_karyawan.`no_jabatan_karyawan`=tbl_karyawan_lembur.`jabatan_karyawan_lembur`
			LEFT JOIN tbl_karyawan_struktur ON tbl_karyawan_struktur.`nik_baru`=tbl_karyawan_lembur.`nik_lembur`
			WHERE lokasi_karyawan_lembur = '$lokasi' 
			AND tanggal_lembur = '$birth_date' 
			AND STATUS = '1' 
			AND status_2 = '1' 
			AND dept_struktur = 'Sales & Distribution'");
	   	return $spl;
	}

	public function karyawan_lembur_wo($birth_date, $lokasi)
	{	    
	   	$spl = $this->db2->query("SELECT * 
			FROM tbl_karyawan_lembur
			LEFT JOIN tbl_shifting ON tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting
			LEFT JOIN tbl_jabatan_karyawan ON tbl_jabatan_karyawan.`no_jabatan_karyawan`=tbl_karyawan_lembur.`jabatan_karyawan_lembur`
			LEFT JOIN tbl_karyawan_struktur ON tbl_karyawan_struktur.`nik_baru`=tbl_karyawan_lembur.`nik_lembur`
			WHERE lokasi_karyawan_lembur = '$lokasi' 
			AND tanggal_lembur = '$birth_date' 
			AND STATUS = '1' 
			AND status_2 = '1' 
			AND dept_struktur = 'Warehouse Operation'");
	   	return $spl;
	}

    public function approve_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '1' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '1' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '1' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '1' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '2' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '2' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '2' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '3' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '3' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '2' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_dinas_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '3' 
		    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_dinas_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_full_day`
		    ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		WHERE tbl_izin_full_day.`status_full_day` = '3' 
		    AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_izin_full_day.`status_full_day_2` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_izin_full_day.`status_full_day_2` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_izin_full_day.`status_full_day_2` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '1' 
			    AND tbl_izin_full_day.`status_full_day_2` = '1' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_izin_full_day.`status_full_day_2` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_izin_full_day.`status_full_day_2` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_izin_full_day.`status_full_day_2` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		    INNER JOIN `tbl_jabatan_karyawan` 
			ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_izin_full_day`
			ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		    INNER JOIN `tbl_karyawan_struktur`
			ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
		    WHERE (
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
			OR( 
			    tbl_izin_full_day.`status_full_day` = '2' 
			    AND tbl_izin_full_day.`status_full_day_2` = '2' 
			    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
			    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
			)
		GROUP BY tbl_izin_full_day.`id_full_day`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_dinas_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '3' 
		    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
		    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_non_full_day_level1_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function hangus_dinas_non_full_day_level1($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN'
        GROUP BY tbl_izin_non_full.`id_non_full`");
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_non_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_non_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_non_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_non_full_day_level2_pusat($jabatan)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_non_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '1' 
			and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function approve_dinas_non_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '1' 
			and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_non_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '2' 
			and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function not_approve_dinas_non_full_day_level2($jabatan, $lokasi)
	{
	   	$non_aktif = $this->db2->query("SELECT
		    COUNT( * ) AS total
		FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
		INNER JOIN `tbl_jabatan_karyawan` 
		    ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_izin_non_full`
		    ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
		INNER JOIN `tbl_karyawan_struktur`
		    ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
		WHERE tbl_izin_non_full.`status_non_full` = '2' 
			and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
			AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
		    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
		    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
		    GROUP BY tbl_izin_non_full.`id_non_full`" );
	    $total = $non_aktif->num_rows();
		return $total;
	}

	public function mandatori_shift()
	{
	   	$non_aktif = $this->db2->query("SELECT * FROM `tmp_karyawan_shift` GROUP BY start_periode AND end_periode");
		return $non_aktif;
	}

	public function query_insert_range($submit_date,$user_submit,$nik_shift,$nama_karyawan_shift,$jabatan_karyawan_shift,$dept_karyawan_shift,$lokasi_karyawan_shift,$jam_kerja,$tanggal_awal,$tanggal_akhir)
	{
	   	$sql = $this->db2->query("INSERT INTO tmp_karyawan_shift (submit_date,user_submit,nik_shift,nama_karyawan_shift,jabatan_karyawan_shift,dept_karyawan_shift,lokasi_karyawan_shift,jam_kerja,start_periode,end_periode,tanggal_shift,keterangan_shift,no_co_shift)
		SELECT '$submit_date','$user_submit','$nik_shift','$nama_karyawan_shift','$jabatan_karyawan_shift','$dept_karyawan_shift','$lokasi_karyawan_shift','$jam_kerja','0000-00-00','0000-00-00',shift_day,'',''
		FROM calendar_shift WHERE shift_day >= DATE '$tanggal_awal' AND shift_day <= DATE '$tanggal_akhir';
	   		");
	}

	public function query_update_range_tarikan($nik_shift,$jam_kerja,$tanggal_awal,$tanggal_akhir)
	{
	   	$sql = $this->db2->query("UPDATE `absensi_new`.`tarikan_absen_adms` SET `waktu_shift` = '$jam_kerja'
			WHERE `shift_day` >= '$tanggal_awal' AND `shift_day` <= '$tanggal_akhir' AND `badgenumber` = '$nik_shift'
	   		");
	}

	function query_index_resign($nik_baru) {
		$hasil = $this->db2->query("
			SELECT 
				absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				, absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
				, absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
				, absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
				, absensi_new.`tbl_karyawan_struktur`.`perusahaan_struktur`
				, absensi_new.`tbl_departement`.`kode_departement`
				, absensi_new.`tbl_departement`.`nama_departement`
				, absensi_new.`tbl_karyawan_struktur`.`join_date_struktur`
				, absensi_new.`tbl_karyawan_resign`.`tanggal_efektif_resign`
				, (SELECT absensi_new.`tbl_karyawan_kontrak`.`tanggal_kontrak`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				GROUP BY absensi_new.`tbl_karyawan_kontrak`.`nik_baru`) AS tanggal_kontrak
				, (SELECT absensi_new.`tbl_karyawan_kontrak`.`start_date`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				ORDER BY absensi_new.`tbl_karyawan_kontrak`.`kontrak` DESC
				LIMIT 1) AS start_date
				, (SELECT absensi_new.`tbl_karyawan_kontrak`.`end_date`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				ORDER BY absensi_new.`tbl_karyawan_kontrak`.`kontrak` DESC
				LIMIT 1) AS end_date
				, (SELECT absensi_new.`tbl_karyawan_kontrak`.`kontrak`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				ORDER BY absensi_new.`tbl_karyawan_kontrak`.`kontrak` DESC
				LIMIT 1) AS kontrak
				, DATEDIFF(
				(SELECT absensi_new.`tbl_karyawan_kontrak`.`end_date`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				ORDER BY absensi_new.`tbl_karyawan_kontrak`.`kontrak` DESC
				LIMIT 1)
				, (SELECT absensi_new.`tbl_karyawan_kontrak`.`tanggal_kontrak`
				FROM absensi_new.`tbl_karyawan_kontrak`
				WHERE absensi_new.`tbl_karyawan_kontrak`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
				GROUP BY absensi_new.`tbl_karyawan_kontrak`.`nik_baru`)) AS selisih
			FROM absensi_new.`tbl_karyawan_struktur`
			INNER JOIN absensi_new.`tbl_karyawan_induk`
				ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_induk`.`nik_baru`
			INNER JOIN absensi_new.`tbl_jabatan_karyawan`
				ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
			LEFT JOIN absensi_new.`tbl_karyawan_resign`
				ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_resign`.`nik_baru`
			LEFT JOIN absensi_new.`tbl_departement`
				ON absensi_new.`tbl_karyawan_struktur`.`dept_struktur` = absensi_new.`tbl_departement`.`nama_departement`
			WHERE absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0' 
			AND absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru'
		");

		return $hasil;
	}

	public function awal_surat_tugas($nik, $no)
	{
	   	$query = $this->db2->query("SELECT * FROM absensi_new.`tbl_izin_full_day`
		WHERE absensi_new.`tbl_izin_full_day`.`no_pengajuan_full_day` = '$no'
		AND absensi_new.`tbl_izin_full_day`.`nik_full_day` = '$nik'
		ORDER BY absensi_new.`tbl_izin_full_day`.`start_full_day` ASC
		LIMIT 0, 1 ");
		return $query;
	}

	public function akhir_surat_tugas($nik, $no)
	{
	   	$query = $this->db2->query("SELECT * FROM absensi_new.`tbl_izin_full_day`
		WHERE absensi_new.`tbl_izin_full_day`.`no_pengajuan_full_day` = '$no'
		AND absensi_new.`tbl_izin_full_day`.`nik_full_day` = '$nik'
		ORDER BY absensi_new.`tbl_izin_full_day`.`start_full_day` DESC
		LIMIT 0, 1 ");
		return $query;
	}

	public function pengajuan_cuti_khusus_all($nik, $no)
	{
	   	$query = $this->db2->query("SELECT 
			a.`nik_cuti_khusus` AS nik
			, a.`jenis_cuti_khusus` AS jenis
			, (select b.`start_cuti_khusus`
			from absensi_new.`tbl_karyawan_cuti_khusus` b
			where b.`no_pengajuan_khusus` = a.`no_pengajuan_khusus`
			AND b.`nik_cuti_khusus` = a.`nik_cuti_khusus`
			order by b.`start_cuti_khusus` asc
			limit 0, 1) as start_date
			, (SELECT c.`start_cuti_khusus`
			FROM absensi_new.`tbl_karyawan_cuti_khusus` c
			WHERE c.`no_pengajuan_khusus` = a.`no_pengajuan_khusus`
			AND c.`nik_cuti_khusus` = a.`nik_cuti_khusus`
			ORDER BY c.`start_cuti_khusus` desc
			LIMIT 0, 1) AS end_date
		FROM absensi_new.`tbl_karyawan_cuti_khusus` a
		WHERE a.`no_pengajuan_khusus` = '$no'
		AND a.`nik_cuti_khusus` = '$nik'
		limit 0, 1");
		return $query;
	}

	function update_cuti_khusus_all($nik, $start, $end, $jenis){
		$hsl=$this->db2->query("UPDATE `absensi_new`.`tarikan_absen_adms`
		SET `jenis_cuti_khusus` = '$jenis'
		WHERE `badgenumber` = '$nik'
		AND `shift_day` >= '$start'
		AND `shift_day` <= '$end' "
		);
		return $hsl;
	}

	function getFormDataKaryawan($where='', $order='') {
		$this->db2->select('ks.nik_baru
			, ks.nama_karyawan_struktur
			, ks.lokasi_hrd
			, ks.jabatan_hrd
			, jk.jabatan_karyawan
			, kp.end_date
			, CASE
			WHEN kp.end_date IS NOT NULL
			THEN kp.end_date + INTERVAL 1 DAY
			ELSE DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 1 DAY
			END AS end_date_final
			, CASE
			WHEN kp.end_date IS NOT NULL
			THEN kp.end_date + INTERVAL 1 DAY
			ELSE DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 90 DAY
			END AS lock_end_date_final
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") AS date_now
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 1 DAY AS date_now_1
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 90 DAY AS lock_date_now_1');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_induk ki ', 
			'ki.nik_baru=ks.nik_baru', 'inner');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'jk.no_jabatan_karyawan=ks.jabatan_hrd', 'inner');
		$this->db2->join('tbl_karyawan_project kp', 
			'ks.nik_baru = kp.nik_karyawan', 'left');
		$this->db2->order_by('kp.end_date DESC');
		$this->db2->limit(1);

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	public function getVaksinKaryawan($nik_baru)
	{
	   	$query = $this->db2->query("SELECT
			a.`nik_baru`
			, a.`nama_karyawan_struktur`
			, c.`jabatan_karyawan`
			, a.`lokasi_hrd`
			, a.`dept_struktur`
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`tanggal_vaksin`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '1'
			LIMIT 0,1) AS dosis_1
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`dokumen`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '1'
			LIMIT 0,1) AS dokumen_1
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`tanggal_vaksin`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '2'
			LIMIT 0,1) AS dosis_2
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`dokumen`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '2'
			LIMIT 0,1) AS dokumen_2
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`tanggal_vaksin`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '3'
			LIMIT 0,1) AS dosis_3
			, (SELECT
				absensi_new.`tbl_karyawan_vaksin`.`dokumen`
			FROM absensi_new.`tbl_karyawan_vaksin`
			WHERE absensi_new.`tbl_karyawan_vaksin`.`nik` = a.`nik_baru`
			AND absensi_new.`tbl_karyawan_vaksin`.`type` = '3'
			LIMIT 0,1) AS dokumen_3
		FROM absensi_new.`tbl_karyawan_struktur` a
		INNER JOIN absensi_new.`tbl_karyawan_induk` b
			ON a.`nik_baru` = b.`nik_baru`
		INNER JOIN absensi_new.`tbl_jabatan_karyawan` c
			ON a.`jabatan_hrd` = c.`no_jabatan_karyawan`
		WHERE a.`status_karyawan` = '0'
		AND (a.`nik_baru` NOT LIKE '%.%'
		AND a.`nik_baru` <> '12345'
		AND a.`nik_baru` <> 'victor') 
		AND a.`nik_baru` = '$nik_baru' ");
		return $query;
	}

	function all_karyawan_tkbm($where='', $order='', $perusahaan)
    {
        $this->db2->select('a.`nik_baru`
            , a.`nama_karyawan_struktur`
            , c.`jabatan_karyawan`
            , a.`lokasi_hrd`
            , a.`perusahaan_struktur`
            , a.`join_date_struktur`
            , a.`status_karyawan`');
        $this->db2->from('absensi_new.`tbl_karyawan_struktur` a');
        $this->db2->join('absensi_new.`tbl_karyawan_induk` b', 'a.`nik_baru` = b.`nik_baru`', 'inner');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan` c', 'a.`jabatan_hrd` = c.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('absensi_new.`tbl_perusahaan` d', 'a.`perusahaan_struktur` = d.`perusahaan_nama`', 'inner');
        $this->db2->like('a.`perusahaan_struktur`', $perusahaan);
        
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

	function getFormDataKaryawan_tkbm($where='', $order='') {
		$this->db2->select('ks.nik_baru
			, ks.nama_karyawan_struktur
			, ks.lokasi_hrd
			, ks.jabatan_hrd
			, jk.jabatan_karyawan
			, kp.end_date
			, CASE
			WHEN kp.end_date IS NOT NULL
			THEN kp.end_date + INTERVAL 1 DAY
			ELSE DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 1 DAY
			END AS end_date_final
			, CASE
			WHEN kp.end_date IS NOT NULL
			THEN kp.end_date + INTERVAL 1 DAY
			ELSE DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 90 DAY
			END AS lock_end_date_final
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") AS date_now
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 1 DAY AS date_now_1
			, DATE_FORMAT(CURDATE(), "%Y-%m-%d") + INTERVAL 90 DAY AS lock_date_now_1
			, DATE_ADD(DATE_ADD(CURDATE(), INTERVAL  - WEEKDAY(CURDATE())-1 DAY), INTERVAL 7 DAY) LastDayOfWeek
			');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_induk ki ', 
			'ki.nik_baru=ks.nik_baru', 'inner');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'jk.no_jabatan_karyawan=ks.jabatan_hrd', 'inner');
		$this->db2->join('tbl_karyawan_project_tkbm kp', 
			'ks.nik_baru = kp.nik_karyawan', 'left');
		$this->db2->order_by('kp.end_date DESC');
		$this->db2->limit(1);

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function indexTilangCCTV($nik){
		$hsl=$this->db4->query("SELECT
			a.pid AS 'id',
			a.nik AS 'nik',
			a.nama AS 'nama',        
			a.jabatan AS 'jabatan',
			b. id_level AS 'level',
			c.point,
			DATE(a.`submit_date`) AS tanggal,
			a.`jam_kejadian` AS jam,
			a.`ketentuan`,
			a.`kat_fasal`,
			a.`item`			
		FROM cek_monitor a
		INNER JOIN item_kategori b 
			ON b.item = a.item
		LEFT JOIN tbl_point c 
			ON b.id_level= c.id_level
		WHERE a.nik NOT IN ('0')
		AND a.ketentuan NOT IN ('0', 'Pilih Ketentuan')
		AND a.item NOT IN ('0', 'Pilih Pelanggaran')
		AND a.operator NOT IN ('')
		AND a.status = '0' 
		AND a.nik = '$nik'
		ORDER BY a.submit_date DESC
	");
		return $hsl;
	}

	public function getHistoryPunishment($nik, $id)
	{
	   	$query = $this->db2->query("SELECT
			*
		FROM `tbl_karyawan_historical_violance` a
		WHERE a.`nik_baru` = '$nik'
		AND a.`no_surat` IS NOT NULL
		AND a.`id_historical_violance` < '$id'
		ORDER BY a.`id_historical_violance` DESC
		LIMIT 1");
		return $query;
	}

	// =========================== Start Versi 2 ==============================
	function getViolanceV2($where='', $order='') {
		$this->db2->select('khv.`id_historical_violance`,
			khv.`no_surat`,
			ks.`no_urut`,
			ks.`nik_baru`,
			ks.`nama_karyawan_struktur`,
			jk.`jabatan_karyawan`,
			ks.`lokasi_hrd`,
			ks.`perusahaan_struktur`,
			khv.`punishment_historical_violance`,
			khv.`pelanggaran_historical_violance`,
			khv.`warning_start_historical_violance`,
			khv.`tanggal_notif`,
			khv.`warning_end_historical_violance`,
			khv.`warning_note_historical_violance`,
			khv.`status_dokumen`,
			khv.`dokumen_historical_violance`,
			khv.`status_hr_manager`,
			khv.`note_hr_manager`
		');
		$this->db2->from('tbl_karyawan_struktur ks');
		$this->db2->join('tbl_karyawan_historical_violance khv', 
			'ks.nik_baru=khv.nik_baru', 'inner');
		$this->db2->join('tbl_jabatan_karyawan jk', 
			'khv.jabatan_historical_violance = jk.no_jabatan_karyawan', 'inner');
		$this->db2->where('khv.`status_hr_manager` IS NOT NULL');
		$this->db2->order_by('khv.`id_historical_violance` DESC');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}

	function getDataHistoryPunishment($where='', $order='') {
		$this->db2->select('*');
		$this->db2->from('absensi_new.`tbl_karyawan_historical_violance` a');

		if(!empty($where)) {
			$this->db2->where($where);
		}
		if(!empty($order)) {
			$this->db2->order_by($order[0], $order[1]);
		}
		$get = $this->db2->get();

		return $get;
	}
	// =========================== End Versi 2 ==============================

}