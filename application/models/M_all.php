<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Author Agung Saputra
*/
class M_all extends CI_Model
{
    function approve_ptk($id, $tanggal){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_ptk SET status_atasan='1', tanggal_approve = '$tanggal' WHERE id='$id'");
        return $hsl;
    }

    function approve_sk($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_sk SET status_atasan='1' WHERE id='$id'");
        return $hsl;
    }

    function close($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_clearance_sheet SET status_clearance_sheet='Close' WHERE id_clearance='$id'");
        return $hsl;
    }

    function approve_lembur($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_lembur SET status='1' WHERE id_karyawan_lembur='$id'");
        return $hsl;
    }

    function reject_lembur($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_lembur SET status='2' WHERE id_karyawan_lembur='$id'");
        return $hsl;
    }

    function payed_lembur($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_lembur SET status_2='1' WHERE id_karyawan_lembur='$id'");
        return $hsl;
    }

    function tanda_terima($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_clearance_sheet SET dok_tanda_terima='Sudah Upload' WHERE id_clearance='$id'");
        return $hsl;
    }

    function dok_violance($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_historical_violance SET status_dokumen='Complete' WHERE id_historical_violance='$id'");
        return $hsl;
    }

    function update_cuti_khusus($start, $end, $nik, $jenis_cuti){
        $hsl=$this->db2->query("UPDATE absensi_new.`tarikan_absen_adms` SET jenis_cuti_khusus = '$jenis_cuti' WHERE shift_day >= '$start' AND shift_day <= '$end' AND badgenumber = '$nik'");
        return $hsl;
    }

    function get_paklaring($id_clearance){
		$hsl=$this->db2->query("SELECT * FROM tbl_karyawan_clearance_sheet
			WHERE id_clearance='$id_clearance'
			ORDER BY id_clearance ASC"
		);
		return $hsl;
	}

    function approve_mutasi($id){
        $hsl=$this->db2->query("UPDATE tbl_karyawan_historical_mutasi SET status_historical='1' WHERE id_mutasi_rotasi='$id'");
        return $hsl;
    }

    function kurang_cuti($hak_cuti, $nik_sisa_cuti, $tahun){
        $hsl=$this->db2->query("UPDATE `absensi_new`.`tbl_hak_cuti`
            SET `hak_cuti_utuh` = '$hak_cuti'-1
            WHERE `nik_sisa_cuti` = '$nik_sisa_cuti'
            AND tahun = '$tahun'");
        return $hsl;
    }

    function kurang_cuti_not($hak_cuti, $nik_sisa_cuti, $tahun){
        $hsl=$this->db2->query("UPDATE `absensi_new`.`tbl_hak_cuti`
            SET `hak_cuti_utuh` = '$hak_cuti'-0
            WHERE `nik_sisa_cuti` = '$nik_sisa_cuti'
            AND tahun = '$tahun'");
        return $hsl;
    }

    function login_masuk($where='') {
        $this->db->select('*');
        $this->db->from('userinfo u');
        $this->db->join('absensi_new.tbl_karyawan_struktur ks', 'u.badgenumber = ks.nik_baru', 'left');
        $this->db->join('absensi_new.tbl_jabatan_karyawan jk', 'ks.jabatan_hrd = jk.no_jabatan_karyawan', 'left');
        $this->db->where($where);

        $get = $this->db->get();
        return $get;
    }

    function login_masuk_new($username, $password)
    {
        $tanggal_sekarang = date('Y-m-20');
        $tanggal_awal = date('Y-m-21', strtotime('-1 month', strtotime($tanggal_sekarang)));
        $hsl=$this->db2->query("SELECT 
            absensi_new.`tbl_karyawan_struktur`.`no_urut`
            , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            , absensi_new.`tbl_karyawan_struktur`.`password`
            , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , absensi_new.`tbl_level_jabatan`.`level_jabatan`
            , absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
            , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
            , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
            , absensi_new.`tbl_departement`.`departement_id`
            , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
            , absensi_new.`tbl_karyawan_struktur`.`perusahaan_struktur`
            , absensi_new.`tbl_karyawan_struktur`.`nama_atasan_struktur`
            , absensi_new.`tbl_jabatan_karyawan`.`area`
            , adms_db.`userinfo`.`userid`
            , absensi_new.`tbl_karyawan_struktur`.`status_update`
        FROM absensi_new.`tbl_karyawan_struktur`
        LEFT JOIN adms_db.`userinfo`
            ON adms_db.`userinfo`.`badgenumber` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
        LEFT JOIN absensi_new.`tbl_jabatan_karyawan`
            ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
        LEFT JOIN absensi_new.`tbl_level_jabatan`
            ON absensi_new.`tbl_jabatan_karyawan`.`level_jabatan_karyawan` = absensi_new.`tbl_level_jabatan`.`id_level_jabatan`
        LEFT JOIN absensi_new.`tbl_resign`
            ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_resign`.`nik_resign`
        LEFT JOIN absensi_new.`tbl_departement`
            ON absensi_new.`tbl_karyawan_struktur`.`dept_struktur` = absensi_new.`tbl_departement`.`nama_departement`
        WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$username'
        AND absensi_new.`tbl_karyawan_struktur`.`password` = '$password'
        AND (absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
        OR (absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '1'
        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '$tanggal_awal'
        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` <= '$tanggal_sekarang'))"
        );
        return $hsl;
    }

    function absensi_masuk($nik, $tanggal1, $tanggal2){
        // $tgl_awal = $this->absensi_masuk->escape_str($tanggal1);
        // $tgl_akhir = $this->absensi_masuk->escape_str($tanggal2);
        // $badgenumber = $this->db->escape_str($nik);

        $hsl=$this->db->query("SELECT u.userid,
        u.badgenumber, 
        u.name,
        YEAR(checktime) as year, 
        MONTH(checktime) as month,  
        DAY(checktime) as day,  
        MIN(checktime) as F1, 
        MAX(checktime) as F4 

        FROM checkinout cio
        LEFT JOIN userinfo u ON 
        cio.userid = u.userid WHERE u.badgenumber = '$nik' AND cio.checktime
        BETWEEN '$tanggal1' AND '$tanggal2'

        GROUP BY u.badgenumber, 
        YEAR(checktime),
        MONTH(checktime),
        DAY(checktime)
        ORDER BY F1 DESC, F4 DESC"
        );
        return $hsl;
    }

    function hak_cuti($nik_baru){
        $hsl=$this->db2->query("SELECT TIMESTAMPDIFF(MONTH, join_date_struktur, NOW()) AS hak_cuti FROM tbl_karyawan_struktur WHERE nik_baru = $nik_baru");
        return $hsl;
    }

    function sisa_cuti($nik_baru){
        $hsl=$this->db2->query("SELECT * FROM tbl_hak_cuti WHERE nik_sisa_cuti = $nik_baru AND tahun = 2022");
        return $hsl;
    }

    function sisa_cuti_berikut($nik_baru){
        $hsl=$this->db2->query("SELECT * FROM tbl_hak_cuti WHERE nik_sisa_cuti = $nik_baru AND tahun = 2023");
        return $hsl;
    }

    function new_absensi_masuk($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)
    {
        $where = " `tbl_date`.`date` >= '$tanggal1' and `tbl_date`.`date` <= '$tanggal2'";
        if ($nik!='') {
            $where .= " and `userinfo`.`badgenumber` = '$nik'";
        }
        if ($depo!='') {
            $where .= "  and tbl_karyawan_struktur.lokasi_hrd = '$depo'";
        }
        if ($jabatan!='') {
            $where .= "  and tbl_karyawan_struktur.jabatan_hrd = '$jabatan'";
        }
        if ($dept!='') {
            $where .= "  and tbl_karyawan_struktur.dept_struktur = '$dept'";
        }

        $sql = "
            SELECT 
                tbl_absensi_final.userid
                , tbl_absensi_final.tanggal_absen
                , tbl_absensi_final.nik
                , tbl_absensi_final.name
                , tbl_absensi_final.jabatan_karyawan
                , tbl_absensi_final.lokasi_hrd
                , tbl_absensi_final.dept_struktur
                , tbl_absensi_final.join_date_struktur
                , tbl_absensi_final.minimum_in
                , tbl_absensi_final.f1 AS `F1`
                , tbl_absensi_final.waktu_masuk
                , tbl_absensi_final.waktu_keluar_awal
                , tbl_absensi_final.waktu_keluar
                , tbl_absensi_final.f4 AS `F4`
                , tbl_absensi_final.maximum_out
                , tbl_absensi_final.sn AS `SN`
                , tbl_absensi_final.shift_karyawan
                , CASE 
                WHEN tbl_absensi_final.ket_izin IS NOT NULL THEN tbl_absensi_final.ket_izin
                WHEN tbl_absensi_final.f1 = '0000-00-00 00:00:00'
                    AND tbl_absensi_final.f4 = '0000-00-00 00:00:00'
                THEN 'LI'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1<=tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'HD'
                WHEN tbl_absensi_final.f1 IS NULL
                    AND tbl_absensi_final.f4 IS NULL
                THEN 'TD HD'
                WHEN tbl_absensi_final.f1 IS NULL 
                THEN 'TD F1'
                WHEN tbl_absensi_final.f4 IS NULL 
                THEN 'TD F4'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4<tbl_absensi_final.waktu_keluar) 
                THEN 'F4 Tidak Sesuai'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'TL'
                ELSE 'Tidak Sesuai Jadwal'
                END AS `ket_absensi`
                , CASE 
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN TIMEDIFF( tbl_absensi_final.waktu_masuk, tbl_absensi_final.f1 )
                ELSE ''
                END  AS `waktu_telat`
                FROM (
                SELECT  
                userinfo.userid
                , tbl_date.date AS tanggal_absen
                , userinfo.badgenumber AS nik
                , userinfo.name
                , absensi_new.tbl_jabatan_karyawan.jabatan_karyawan
                , tbl_karyawan_struktur.lokasi_hrd
                , tbl_karyawan_struktur.dept_struktur
                , tbl_karyawan_struktur.join_date_struktur
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '7' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    ) 
                END AS minimum_in
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    WHEN absensi_new.in_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.in_absen.tanggal_absen, ' '
                    , absensi_new.in_absen.waktu_absen
                    ) AS DATETIME
                    )   
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_malem
                    WHERE masuk_malem.userid=userinfo.userid
                    AND masuk_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND masuk_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f1`
                , CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '08:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    END
                    ) AS DATETIME
                ) AS waktu_masuk
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar_awal
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00' THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    )
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN MAX(checktime) 
                    WHEN absensi_new.out_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.out_absen.tanggal_absen, ' '
                    , absensi_new.out_absen.waktu_absen
                    ) AS DATETIME
                    ) 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    )
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:01:00'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout keluar_malem
                    WHERE keluar_malem.userid=userinfo.userid
                    AND keluar_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND keluar_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f4`
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '9' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    WHEN absensi_new.tbl_shifting.id_shifting = '12' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '14' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                END AS maximum_out
                , checkinout.SN AS `sn`
                , CASE 
                    WHEN DATE(checkinout.checktime) = absensi_new.tmp_karyawan_shift.tanggal_shift AND tbl_karyawan_struktur.nik_baru=absensi_new.tmp_karyawan_shift.nik_shift THEN absensi_new.tmp_karyawan_shift.jam_kerja 
                    ELSE '1' 
                END AS shift_karyawan
                , CASE 
                    WHEN absensi_new.`tbl_karyawan_backup`.`nik_baru` IS NOT NULL THEN 'BU'
                    WHEN absensi_new.tbl_karyawan_cuti_khusus.nik_cuti_khusus IS NOT NULL THEN 'CK'
                    WHEN absensi_new.tbl_karyawan_cuti_tahunan.nik_sisa_cuti IS NOT NULL THEN 'CU'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL THEN absensi_new.tbl_izin_non_full.jenis_non_full 
                    WHEN absensi_new.tbl_izin_full_day.jenis_full_day IS NOT NULL THEN absensi_new.tbl_izin_full_day.jenis_full_day 
                    ELSE NULL
                END AS `ket_izin`
                FROM `absensi_new`.`tbl_karyawan_struktur`
                INNER JOIN (SELECT userinfo.`badgenumber` AS `nik`, DATE(checkinout.`checktime`) AS `date` FROM adms_db.checkinout
                    INNER JOIN adms_db.`userinfo` ON adms_db.`userinfo`.`userid`=adms_db.checkinout.`userid`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_full_day`.`nik_full_day` AS `nik`
                    , absensi_new.`tbl_izin_full_day`.`start_full_day` AS `date` 
                    FROM absensi_new.`tbl_izin_full_day`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_non_full`.`nik_non_full` AS `nik`
                    , absensi_new.`tbl_izin_non_full`.`tanggal_non_full` AS `date` 
                    FROM absensi_new.`tbl_izin_non_full`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_absen_manual`.`nik_absen` AS `nik`
                    , absensi_new.`tbl_karyawan_absen_manual`.`tanggal_absen` AS `date` 
                    FROM absensi_new.`tbl_karyawan_absen_manual`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_tahunan`.`start_cuti_tahunan` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_tahunan`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_khusus`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_backup`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_karyawan_backup`.`tanggal_backup` AS `date` 
                    FROM absensi_new.`tbl_karyawan_backup`
                    UNION ALL
                    SELECT absensi_new.`tmp_karyawan_shift`.`nik_shift` AS `nik`
                    , absensi_new.`tmp_karyawan_shift`.`tanggal_shift` AS `date`
                    FROM absensi_new.`tmp_karyawan_shift`
                    UNION ALL
                    SELECT absensi_new.`tbl_long_shift`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_long_shift`.`tanggal` AS `date`
                    FROM absensi_new.`tbl_long_shift`
                ) tbl_date ON `tbl_date`.`nik`=`tbl_karyawan_struktur`.`nik_baru`
                LEFT JOIN `userinfo` ON userinfo.`badgenumber`=absensi_new.tbl_karyawan_struktur.`nik_baru`
                LEFT JOIN `absensi_new`.`tbl_long_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_long_shift`.`nik_baru`
                    AND DATE(absensi_new.`tbl_long_shift`.`tanggal`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tmp_karyawan_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tmp_karyawan_shift`.`nik_shift` 
                    AND DATE(absensi_new.tmp_karyawan_shift.`tanggal_shift`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tbl_shifting` ON `absensi_new`.`tmp_karyawan_shift`.`jam_kerja`=`absensi_new`.`tbl_shifting`.`id_shifting`
                LEFT JOIN `absensi_new`.`tbl_jabatan_karyawan` ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.tbl_karyawan_struktur.`jabatan_hrd`
                LEFT JOIN `adms_db`.`checkinout` 
                    ON DATE(adms_db.checkinout.`checktime`)=tbl_date.`date` 
                    AND adms_db.checkinout.`userid`=userinfo.`userid`
                LEFT JOIN `absensi_new`.`tbl_izin_full_day` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_full_day`.`nik_full_day` 
                    AND DATE(absensi_new.tbl_izin_full_day.`start_full_day`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_full_day`.`status_full_day` = '1' 
                LEFT JOIN `absensi_new`.`tbl_izin_non_full` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_non_full`.`nik_non_full` 
                    AND DATE(absensi_new.tbl_izin_non_full.`tanggal_non_full`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_non_full`.`status_non_full` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `in_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`in_absen`.`nik_absen` 
                    AND DATE(absensi_new.`in_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`in_absen`.`status` = '1' 
                    AND absensi_new.`in_absen`.`jenis_absen` = 'IN' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `out_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`out_absen`.`nik_absen` 
                    AND DATE(absensi_new.`out_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`out_absen`.`status` = '1' 
                    AND absensi_new.`out_absen`.`jenis_absen` = 'OUT' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_tahunan` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_khusus` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_khusus.`start_cuti_khusus`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = '1' 
            WHERE $where
            GROUP BY `tbl_karyawan_struktur`.`nik_baru`, `tbl_date`.`date`
            ORDER BY `tbl_date`.`date` DESC, `tbl_karyawan_struktur`.`nik_baru` ASC
        ) tbl_absensi_final
        ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    function new_absensi_masuk_bulanan($tanggal1, $tanggal2, $nik, $depo, $jabatan, $dept)
    {
        $where = " `tbl_date`.`date` >= '$tanggal1' and `tbl_date`.`date` <= '$tanggal2'";
        if ($nik!='') {
            $where .= " and `userinfo`.`badgenumber` = '$nik'";
        }
        if ($depo!='') {
            $where .= "  and tbl_karyawan_struktur.lokasi_hrd = '$depo'";
        }
        if ($jabatan!='') {
            $where .= "  and tbl_karyawan_struktur.jabatan_hrd = '$jabatan'";
        }
        if ($dept!='') {
            $where .= "  and tbl_karyawan_struktur.dept_struktur = '$dept'";
        }

        $sql = "
            SELECT 
                tbl_absensi_final.userid
                , tbl_absensi_final.tanggal_absen
                , tbl_absensi_final.nik
                , tbl_absensi_final.name
                , tbl_absensi_final.jabatan_karyawan
                , tbl_absensi_final.lokasi_hrd
                , tbl_absensi_final.dept_struktur
                , tbl_absensi_final.join_date_struktur
                , tbl_absensi_final.minimum_in
                , tbl_absensi_final.f1 AS `F1`
                , tbl_absensi_final.waktu_masuk
                , tbl_absensi_final.waktu_keluar_awal
                , tbl_absensi_final.waktu_keluar
                , tbl_absensi_final.f4 AS `F4`
                , tbl_absensi_final.maximum_out
                , tbl_absensi_final.sn AS `SN`
                , tbl_absensi_final.shift_karyawan
                , CASE 
                WHEN tbl_absensi_final.ket_izin IS NOT NULL THEN tbl_absensi_final.ket_izin
                WHEN tbl_absensi_final.f1 = '0000-00-00 00:00:00'
                    AND tbl_absensi_final.f4 = '0000-00-00 00:00:00'
                THEN 'LI'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1<=tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'HD'
                WHEN tbl_absensi_final.f1 IS NULL
                    AND tbl_absensi_final.f4 IS NULL
                THEN 'TD HD'
                WHEN tbl_absensi_final.f1 IS NULL 
                THEN 'TD F1'
                WHEN tbl_absensi_final.f4 IS NULL 
                THEN 'TD F4'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4<tbl_absensi_final.waktu_keluar) 
                THEN 'F4 Tidak Sesuai'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'TL'
                ELSE 'Tidak Sesuai Jadwal'
                END AS `ket_absensi`
                , CASE 
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN TIMEDIFF( tbl_absensi_final.waktu_masuk, tbl_absensi_final.f1 )
                ELSE ''
                END  AS `waktu_telat`
                FROM (
                SELECT  
                userinfo.userid
                , tbl_date.date AS tanggal_absen
                , userinfo.badgenumber AS nik
                , userinfo.name
                , absensi_new.tbl_jabatan_karyawan.jabatan_karyawan
                , tbl_karyawan_struktur.lokasi_hrd
                , tbl_karyawan_struktur.dept_struktur
                , tbl_karyawan_struktur.join_date_struktur
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '7' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    ) 
                END AS minimum_in
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    WHEN absensi_new.in_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.in_absen.tanggal_absen, ' '
                    , absensi_new.in_absen.waktu_absen
                    ) AS DATETIME
                    )   
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_malem
                    WHERE masuk_malem.userid=userinfo.userid
                    AND masuk_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND masuk_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f1`
                , CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '08:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    END
                    ) AS DATETIME
                ) AS waktu_masuk
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar_awal
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00' THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    )
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN MAX(checktime) 
                    WHEN absensi_new.out_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.out_absen.tanggal_absen, ' '
                    , absensi_new.out_absen.waktu_absen
                    ) AS DATETIME
                    ) 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    )
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:01:00'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout keluar_malem
                    WHERE keluar_malem.userid=userinfo.userid
                    AND keluar_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND keluar_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f4`
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '9' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    WHEN absensi_new.tbl_shifting.id_shifting = '12' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '14' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                END AS maximum_out
                , checkinout.SN AS `sn`
                , CASE 
                    WHEN DATE(checkinout.checktime) = absensi_new.tmp_karyawan_shift.tanggal_shift AND tbl_karyawan_struktur.nik_baru=absensi_new.tmp_karyawan_shift.nik_shift THEN absensi_new.tmp_karyawan_shift.jam_kerja 
                    ELSE '1' 
                END AS shift_karyawan
                , CASE 
                    WHEN absensi_new.`tbl_karyawan_backup`.`nik_baru` IS NOT NULL THEN 'BU'
                    WHEN absensi_new.tbl_karyawan_cuti_khusus.nik_cuti_khusus IS NOT NULL THEN 'CK'
                    WHEN absensi_new.tbl_karyawan_cuti_tahunan.nik_sisa_cuti IS NOT NULL THEN 'CU'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL THEN absensi_new.tbl_izin_non_full.jenis_non_full 
                    WHEN absensi_new.tbl_izin_full_day.jenis_full_day IS NOT NULL THEN absensi_new.tbl_izin_full_day.jenis_full_day 
                    ELSE NULL
                END AS `ket_izin`
                FROM `absensi_new`.`tbl_karyawan_struktur`
                INNER JOIN (SELECT userinfo.`badgenumber` AS `nik`, DATE(checkinout.`checktime`) AS `date` FROM adms_db.checkinout
                    INNER JOIN adms_db.`userinfo` ON adms_db.`userinfo`.`userid`=adms_db.checkinout.`userid`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_full_day`.`nik_full_day` AS `nik`
                    , absensi_new.`tbl_izin_full_day`.`start_full_day` AS `date` 
                    FROM absensi_new.`tbl_izin_full_day`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_non_full`.`nik_non_full` AS `nik`
                    , absensi_new.`tbl_izin_non_full`.`tanggal_non_full` AS `date` 
                    FROM absensi_new.`tbl_izin_non_full`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_absen_manual`.`nik_absen` AS `nik`
                    , absensi_new.`tbl_karyawan_absen_manual`.`tanggal_absen` AS `date` 
                    FROM absensi_new.`tbl_karyawan_absen_manual`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_tahunan`.`start_cuti_tahunan` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_tahunan`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_khusus`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_backup`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_karyawan_backup`.`tanggal_backup` AS `date` 
                    FROM absensi_new.`tbl_karyawan_backup`
                    UNION ALL
                    SELECT absensi_new.`tmp_karyawan_shift`.`nik_shift` AS `nik`
                    , absensi_new.`tmp_karyawan_shift`.`tanggal_shift` AS `date`
                    FROM absensi_new.`tmp_karyawan_shift`
                    UNION ALL
                    SELECT absensi_new.`tbl_long_shift`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_long_shift`.`tanggal` AS `date`
                    FROM absensi_new.`tbl_long_shift`
                ) tbl_date ON `tbl_date`.`nik`=`tbl_karyawan_struktur`.`nik_baru`
                LEFT JOIN `userinfo` ON userinfo.`badgenumber`=absensi_new.tbl_karyawan_struktur.`nik_baru`
                LEFT JOIN `absensi_new`.`tbl_long_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_long_shift`.`nik_baru`
                    AND DATE(absensi_new.`tbl_long_shift`.`tanggal`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tmp_karyawan_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tmp_karyawan_shift`.`nik_shift` 
                    AND DATE(absensi_new.tmp_karyawan_shift.`tanggal_shift`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tbl_shifting` ON `absensi_new`.`tmp_karyawan_shift`.`jam_kerja`=`absensi_new`.`tbl_shifting`.`id_shifting`
                LEFT JOIN `absensi_new`.`tbl_jabatan_karyawan` ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.tbl_karyawan_struktur.`jabatan_hrd`
                LEFT JOIN `adms_db`.`checkinout` 
                    ON DATE(adms_db.checkinout.`checktime`)=tbl_date.`date` 
                    AND adms_db.checkinout.`userid`=userinfo.`userid`
                LEFT JOIN `absensi_new`.`tbl_izin_full_day` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_full_day`.`nik_full_day` 
                    AND DATE(absensi_new.tbl_izin_full_day.`start_full_day`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_full_day`.`status_full_day` = '1' 
                LEFT JOIN `absensi_new`.`tbl_izin_non_full` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_non_full`.`nik_non_full` 
                    AND DATE(absensi_new.tbl_izin_non_full.`tanggal_non_full`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_non_full`.`status_non_full` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `in_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`in_absen`.`nik_absen` 
                    AND DATE(absensi_new.`in_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`in_absen`.`status` = '1' 
                    AND absensi_new.`in_absen`.`jenis_absen` = 'IN' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `out_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`out_absen`.`nik_absen` 
                    AND DATE(absensi_new.`out_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`out_absen`.`status` = '1' 
                    AND absensi_new.`out_absen`.`jenis_absen` = 'OUT' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_tahunan` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_khusus` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_khusus.`start_cuti_khusus`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = '1' 
            WHERE $where
            GROUP BY `tbl_karyawan_struktur`.`nik_baru`
            ORDER BY `tbl_date`.`date` DESC, `tbl_karyawan_struktur`.`nik_baru` ASC
        ) tbl_absensi_final
        ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    function new_absensi_masuk_rekap($where)
    {
        $where = " `tbl_date`.`date` >= '$tanggal1' and `tbl_date`.`date` <= '$tanggal2'";
        if ($nik!='') {
            $where .= " and `userinfo`.`badgenumber` = '$nik'";
        }
        if ($depo!='') {
            $where .= "  and tbl_karyawan_struktur.lokasi_hrd = '$depo'";
        }
        if ($jabatan!='') {
            $where .= "  and tbl_karyawan_struktur.jabatan_hrd = '$jabatan'";
        }
        if ($dept!='') {
            $where .= "  and tbl_karyawan_struktur.dept_struktur = '$dept'";
        }

        $sql = "
            SELECT 
                tbl_absensi_final.userid
                , tbl_absensi_final.tanggal_absen
                , tbl_absensi_final.nik
                , tbl_absensi_final.name
                , tbl_absensi_final.jabatan_karyawan
                , tbl_absensi_final.lokasi_hrd
                , tbl_absensi_final.dept_struktur
                , tbl_absensi_final.join_date_struktur
                , tbl_absensi_final.minimum_in
                , tbl_absensi_final.f1 AS `F1`
                , tbl_absensi_final.waktu_masuk
                , tbl_absensi_final.waktu_keluar_awal
                , tbl_absensi_final.waktu_keluar
                , tbl_absensi_final.f4 AS `F4`
                , tbl_absensi_final.maximum_out
                , tbl_absensi_final.sn AS `SN`
                , tbl_absensi_final.shift_karyawan
                , CASE 
                WHEN tbl_absensi_final.ket_izin IS NOT NULL THEN tbl_absensi_final.ket_izin
                WHEN tbl_absensi_final.f1 = '0000-00-00 00:00:00'
                    AND tbl_absensi_final.f4 = '0000-00-00 00:00:00'
                THEN 'LI'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1<=tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'HD'
                WHEN tbl_absensi_final.f1 IS NULL
                    AND tbl_absensi_final.f4 IS NULL
                THEN 'TD HD'
                WHEN tbl_absensi_final.f1 IS NULL 
                THEN 'TD F1'
                WHEN tbl_absensi_final.f4 IS NULL 
                THEN 'TD F4'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4<tbl_absensi_final.waktu_keluar) 
                THEN 'F4 Tidak Sesuai'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'TL'
                ELSE 'Tidak Sesuai Jadwal'
                END AS `ket_absensi`
                , CASE 
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN TIMEDIFF( tbl_absensi_final.waktu_masuk, tbl_absensi_final.f1 )
                ELSE ''
                END  AS `waktu_telat`
                FROM (
                SELECT  
                userinfo.userid
                , tbl_date.date AS tanggal_absen
                , userinfo.badgenumber AS nik
                , userinfo.name
                , absensi_new.tbl_jabatan_karyawan.jabatan_karyawan
                , tbl_karyawan_struktur.lokasi_hrd
                , tbl_karyawan_struktur.dept_struktur
                , tbl_karyawan_struktur.join_date_struktur
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '7' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    ) 
                END AS minimum_in
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    WHEN absensi_new.in_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.in_absen.tanggal_absen, ' '
                    , absensi_new.in_absen.waktu_absen
                    ) AS DATETIME
                    )   
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_malem
                    WHERE masuk_malem.userid=userinfo.userid
                    AND masuk_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND masuk_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f1`
                , CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '08:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    END
                    ) AS DATETIME
                ) AS waktu_masuk
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar_awal
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00' THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    )
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN MAX(checktime) 
                    WHEN absensi_new.out_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.out_absen.tanggal_absen, ' '
                    , absensi_new.out_absen.waktu_absen
                    ) AS DATETIME
                    ) 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    )
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:01:00'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout keluar_malem
                    WHERE keluar_malem.userid=userinfo.userid
                    AND keluar_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND keluar_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f4`
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '9' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    WHEN absensi_new.tbl_shifting.id_shifting = '12' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '14' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                END AS maximum_out
                , checkinout.SN AS `sn`
                , CASE 
                    WHEN DATE(checkinout.checktime) = absensi_new.tmp_karyawan_shift.tanggal_shift AND tbl_karyawan_struktur.nik_baru=absensi_new.tmp_karyawan_shift.nik_shift THEN absensi_new.tmp_karyawan_shift.jam_kerja 
                    ELSE '1' 
                END AS shift_karyawan
                , CASE 
                    WHEN absensi_new.`tbl_karyawan_backup`.`nik_baru` IS NOT NULL THEN 'BU'
                    WHEN absensi_new.tbl_karyawan_cuti_khusus.nik_cuti_khusus IS NOT NULL THEN 'CK'
                    WHEN absensi_new.tbl_karyawan_cuti_tahunan.nik_sisa_cuti IS NOT NULL THEN 'CU'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL THEN absensi_new.tbl_izin_non_full.jenis_non_full 
                    WHEN absensi_new.tbl_izin_full_day.jenis_full_day IS NOT NULL THEN absensi_new.tbl_izin_full_day.jenis_full_day 
                    ELSE NULL
                END AS `ket_izin`
                FROM `absensi_new`.`tbl_karyawan_struktur`
                INNER JOIN (SELECT userinfo.`badgenumber` AS `nik`, DATE(checkinout.`checktime`) AS `date` FROM adms_db.checkinout
                    INNER JOIN adms_db.`userinfo` ON adms_db.`userinfo`.`userid`=adms_db.checkinout.`userid`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_full_day`.`nik_full_day` AS `nik`
                    , absensi_new.`tbl_izin_full_day`.`start_full_day` AS `date` 
                    FROM absensi_new.`tbl_izin_full_day`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_non_full`.`nik_non_full` AS `nik`
                    , absensi_new.`tbl_izin_non_full`.`tanggal_non_full` AS `date` 
                    FROM absensi_new.`tbl_izin_non_full`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_absen_manual`.`nik_absen` AS `nik`
                    , absensi_new.`tbl_karyawan_absen_manual`.`tanggal_absen` AS `date` 
                    FROM absensi_new.`tbl_karyawan_absen_manual`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_tahunan`.`start_cuti_tahunan` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_tahunan`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_khusus`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_backup`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_karyawan_backup`.`tanggal_backup` AS `date` 
                    FROM absensi_new.`tbl_karyawan_backup`
                    UNION ALL
                    SELECT absensi_new.`tmp_karyawan_shift`.`nik_shift` AS `nik`
                    , absensi_new.`tmp_karyawan_shift`.`tanggal_shift` AS `date`
                    FROM absensi_new.`tmp_karyawan_shift`
                    UNION ALL
                    SELECT absensi_new.`tbl_long_shift`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_long_shift`.`tanggal` AS `date`
                    FROM absensi_new.`tbl_long_shift`
                ) tbl_date ON `tbl_date`.`nik`=`tbl_karyawan_struktur`.`nik_baru`
                LEFT JOIN `userinfo` ON userinfo.`badgenumber`=absensi_new.tbl_karyawan_struktur.`nik_baru`
                LEFT JOIN `absensi_new`.`tbl_long_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_long_shift`.`nik_baru`
                    AND DATE(absensi_new.`tbl_long_shift`.`tanggal`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tmp_karyawan_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tmp_karyawan_shift`.`nik_shift` 
                    AND DATE(absensi_new.tmp_karyawan_shift.`tanggal_shift`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tbl_shifting` ON `absensi_new`.`tmp_karyawan_shift`.`jam_kerja`=`absensi_new`.`tbl_shifting`.`id_shifting`
                LEFT JOIN `absensi_new`.`tbl_jabatan_karyawan` ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.tbl_karyawan_struktur.`jabatan_hrd`
                LEFT JOIN `adms_db`.`checkinout` 
                    ON DATE(adms_db.checkinout.`checktime`)=tbl_date.`date` 
                    AND adms_db.checkinout.`userid`=userinfo.`userid`
                LEFT JOIN `absensi_new`.`tbl_izin_full_day` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_full_day`.`nik_full_day` 
                    AND DATE(absensi_new.tbl_izin_full_day.`start_full_day`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_full_day`.`status_full_day` = '1' 
                LEFT JOIN `absensi_new`.`tbl_izin_non_full` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_non_full`.`nik_non_full` 
                    AND DATE(absensi_new.tbl_izin_non_full.`tanggal_non_full`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_non_full`.`status_non_full` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `in_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`in_absen`.`nik_absen` 
                    AND DATE(absensi_new.`in_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`in_absen`.`status` = '1' 
                    AND absensi_new.`in_absen`.`jenis_absen` = 'IN' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `out_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`out_absen`.`nik_absen` 
                    AND DATE(absensi_new.`out_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`out_absen`.`status` = '1' 
                    AND absensi_new.`out_absen`.`jenis_absen` = 'OUT' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_tahunan` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_khusus` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_khusus.`start_cuti_khusus`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = '1' 
            WHERE $where
            GROUP BY `tbl_karyawan_struktur`.`nik_baru`
            ORDER BY `tbl_date`.`date` DESC, `tbl_karyawan_struktur`.`nik_baru` ASC
        ) tbl_absensi_final
        ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

    function getabsensi($nik, $tgl)
    {
        $sql = "
            SELECT 
                tbl_absensi_final.userid
                , tbl_absensi_final.tanggal_absen
                , tbl_absensi_final.nik
                , tbl_absensi_final.name
                , tbl_absensi_final.jabatan_karyawan
                , tbl_absensi_final.lokasi_hrd
                , tbl_absensi_final.dept_struktur
                , tbl_absensi_final.join_date_struktur
                , tbl_absensi_final.minimum_in
                , tbl_absensi_final.f1 AS `F1`
                , tbl_absensi_final.waktu_masuk
                , tbl_absensi_final.waktu_keluar_awal
                , tbl_absensi_final.waktu_keluar
                , tbl_absensi_final.f4 AS `F4`
                , tbl_absensi_final.maximum_out
                , tbl_absensi_final.sn AS `SN`
                , tbl_absensi_final.shift_karyawan
                , CASE 
                WHEN tbl_absensi_final.ket_izin IS NOT NULL THEN tbl_absensi_final.ket_izin
                WHEN tbl_absensi_final.f1 = '0000-00-00 00:00:00'
                    AND tbl_absensi_final.f4 = '0000-00-00 00:00:00'
                THEN 'LI'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1<=tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'HD'
                WHEN tbl_absensi_final.f1 IS NULL
                    AND tbl_absensi_final.f4 IS NULL
                THEN 'TD HD'
                WHEN tbl_absensi_final.f1 IS NULL 
                THEN 'TD F1'
                WHEN tbl_absensi_final.f4 IS NULL 
                THEN 'TD F4'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4<tbl_absensi_final.waktu_keluar) 
                THEN 'F4 Tidak Sesuai'
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN 'TL'
                ELSE 'Tidak Sesuai Jadwal'
                END AS `ket_absensi`
                , CASE 
                WHEN (tbl_absensi_final.f1>=tbl_absensi_final.minimum_in)
                    AND (tbl_absensi_final.f1>tbl_absensi_final.waktu_masuk) 
                    AND (tbl_absensi_final.f4<=tbl_absensi_final.maximum_out)
                    AND (tbl_absensi_final.f4>=tbl_absensi_final.waktu_keluar) 
                THEN TIMEDIFF( tbl_absensi_final.waktu_masuk, tbl_absensi_final.f1 )
                ELSE ''
                END  AS `waktu_telat`
                FROM (
                SELECT  
                userinfo.userid
                , tbl_date.date AS tanggal_absen
                , userinfo.badgenumber AS nik
                , userinfo.name
                , absensi_new.tbl_jabatan_karyawan.jabatan_karyawan
                , tbl_karyawan_struktur.lokasi_hrd
                , tbl_karyawan_struktur.dept_struktur
                , tbl_karyawan_struktur.join_date_struktur
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '7' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    ) 
                END AS minimum_in
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    WHEN absensi_new.in_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.in_absen.tanggal_absen, ' '
                    , absensi_new.in_absen.waktu_absen
                    ) AS DATETIME
                    )   
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:01'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MIN(checktime)
                    FROM adms_db.checkinout masuk_malem
                    WHERE masuk_malem.userid=userinfo.userid
                    AND masuk_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND masuk_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f1`
                , CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '08:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    END
                    ) AS DATETIME
                ) AS waktu_masuk
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar_awal
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 07:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00' THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL THEN CAST(
                    CONCAT(
                    absensi_new.`tbl_long_shift`.`tanggal`,' ',absensi_new.`tbl_long_shift`.`jam`
                    ) AS DATETIME  
                    )
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , CASE 
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL THEN '17:00:00'
                    ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    END
                    ) AS DATETIME
                    )
                END AS waktu_keluar
                , CASE 
                    WHEN absensi_new.tbl_shifting.id_shifting = '18' 
                    THEN '0000-00-00 00:00:00'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL
                    THEN MAX(checktime) 
                    WHEN absensi_new.out_absen.tanggal_pengajuan IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    absensi_new.out_absen.tanggal_absen, ' '
                    , absensi_new.out_absen.waktu_absen
                    ) AS DATETIME
                    ) 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.`tbl_long_shift`.`jam`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    )
                    WHEN absensi_new.tmp_karyawan_shift.id_karyawan_shift IS NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' 13:01:00'
                    ) AS DATETIME
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                    )
                    ELSE (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout keluar_malem
                    WHERE keluar_malem.userid=userinfo.userid
                    AND keluar_malem.checktime>=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR
                    AND keluar_malem.checktime<=CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    )
                    
                END AS `f4`
                , CASE
                    WHEN absensi_new.tbl_shifting.id_shifting = '9' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                    ) AS DATETIME
                    ) + INTERVAL 5 HOUR
                    WHEN absensi_new.tbl_shifting.id_shifting = '12' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '14' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '16' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '21' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '25' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '27' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.tbl_shifting.id_shifting = '28' 
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tbl_long_shift`.`id_long_shift` IS NOT NULL AND absensi_new.`tbl_long_shift`.`jam` > '00:00:01' AND absensi_new.`tbl_long_shift`.`jam` < '03:00:00'
                    THEN CAST(
                    CONCAT(
                    tbl_date.date, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    ELSE CAST(
                    CONCAT(
                    tbl_date.date, ' 23:59:59'
                    ) AS DATETIME
                    ) 
                END AS maximum_out
                , checkinout.SN AS `sn`
                , CASE 
                    WHEN DATE(checkinout.checktime) = absensi_new.tmp_karyawan_shift.tanggal_shift AND tbl_karyawan_struktur.nik_baru=absensi_new.tmp_karyawan_shift.nik_shift THEN absensi_new.tmp_karyawan_shift.jam_kerja 
                    ELSE '1' 
                END AS shift_karyawan
                , CASE 
                    WHEN absensi_new.`tbl_karyawan_backup`.`nik_baru` IS NOT NULL THEN 'BU'
                    WHEN absensi_new.tbl_karyawan_cuti_khusus.nik_cuti_khusus IS NOT NULL THEN 'CK'
                    WHEN absensi_new.tbl_karyawan_cuti_tahunan.nik_sisa_cuti IS NOT NULL THEN 'CU'
                    WHEN absensi_new.tbl_izin_non_full.jenis_non_full IS NOT NULL THEN absensi_new.tbl_izin_non_full.jenis_non_full 
                    WHEN absensi_new.tbl_izin_full_day.jenis_full_day IS NOT NULL THEN absensi_new.tbl_izin_full_day.jenis_full_day 
                    ELSE NULL
                END AS `ket_izin`
                FROM `absensi_new`.`tbl_karyawan_struktur`
                INNER JOIN (SELECT userinfo.`badgenumber` AS `nik`, DATE(checkinout.`checktime`) AS `date` FROM adms_db.checkinout
                    INNER JOIN adms_db.`userinfo` ON adms_db.`userinfo`.`userid`=adms_db.checkinout.`userid`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_full_day`.`nik_full_day` AS `nik`
                    , absensi_new.`tbl_izin_full_day`.`start_full_day` AS `date` 
                    FROM absensi_new.`tbl_izin_full_day`
                    UNION ALL
                    SELECT absensi_new.`tbl_izin_non_full`.`nik_non_full` AS `nik`
                    , absensi_new.`tbl_izin_non_full`.`tanggal_non_full` AS `date` 
                    FROM absensi_new.`tbl_izin_non_full`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_absen_manual`.`nik_absen` AS `nik`
                    , absensi_new.`tbl_karyawan_absen_manual`.`tanggal_absen` AS `date` 
                    FROM absensi_new.`tbl_karyawan_absen_manual`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_tahunan`.`start_cuti_tahunan` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_tahunan`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` AS `nik`
                    , absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` AS `date` 
                    FROM absensi_new.`tbl_karyawan_cuti_khusus`
                    UNION ALL
                    SELECT absensi_new.`tbl_karyawan_backup`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_karyawan_backup`.`tanggal_backup` AS `date` 
                    FROM absensi_new.`tbl_karyawan_backup`
                    UNION ALL
                    SELECT absensi_new.`tmp_karyawan_shift`.`nik_shift` AS `nik`
                    , absensi_new.`tmp_karyawan_shift`.`tanggal_shift` AS `date`
                    FROM absensi_new.`tmp_karyawan_shift`
                    UNION ALL
                    SELECT absensi_new.`tbl_long_shift`.`nik_baru` AS `nik`
                    , absensi_new.`tbl_long_shift`.`tanggal` AS `date`
                    FROM absensi_new.`tbl_long_shift`
                ) tbl_date ON `tbl_date`.`nik`=`tbl_karyawan_struktur`.`nik_baru`
                LEFT JOIN `userinfo` ON userinfo.`badgenumber`=absensi_new.tbl_karyawan_struktur.`nik_baru`
                LEFT JOIN `absensi_new`.`tbl_long_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_long_shift`.`nik_baru`
                    AND DATE(absensi_new.`tbl_long_shift`.`tanggal`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tmp_karyawan_shift` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tmp_karyawan_shift`.`nik_shift` 
                    AND DATE(absensi_new.tmp_karyawan_shift.`tanggal_shift`)=DATE(tbl_date.`date`)
                LEFT JOIN `absensi_new`.`tbl_shifting` ON `absensi_new`.`tmp_karyawan_shift`.`jam_kerja`=`absensi_new`.`tbl_shifting`.`id_shifting`
                LEFT JOIN `absensi_new`.`tbl_jabatan_karyawan` ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.tbl_karyawan_struktur.`jabatan_hrd`
                LEFT JOIN `adms_db`.`checkinout` 
                    ON DATE(adms_db.checkinout.`checktime`)=tbl_date.`date` 
                    AND adms_db.checkinout.`userid`=userinfo.`userid`
                LEFT JOIN `absensi_new`.`tbl_izin_full_day` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_full_day`.`nik_full_day` 
                    AND DATE(absensi_new.tbl_izin_full_day.`start_full_day`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_full_day`.`status_full_day` = '1' 
                LEFT JOIN `absensi_new`.`tbl_izin_non_full` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_izin_non_full`.`nik_non_full` 
                    AND DATE(absensi_new.tbl_izin_non_full.`tanggal_non_full`)=tbl_date.`date`  
                    AND absensi_new.`tbl_izin_non_full`.`status_non_full` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `in_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`in_absen`.`nik_absen` 
                    AND DATE(absensi_new.`in_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`in_absen`.`status` = '1' 
                    AND absensi_new.`in_absen`.`jenis_absen` = 'IN' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_absen_manual` `out_absen`
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`out_absen`.`nik_absen` 
                    AND DATE(absensi_new.`out_absen`.`tanggal_absen`)=tbl_date.`date` 
                    AND absensi_new.`out_absen`.`status` = '1' 
                    AND absensi_new.`out_absen`.`jenis_absen` = 'OUT' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_tahunan` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_tahunan`.`nik_sisa_cuti` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_tahunan`.`status_cuti_tahunan` = '1' 
                LEFT JOIN `absensi_new`.`tbl_karyawan_cuti_khusus` 
                    ON `tbl_karyawan_struktur`.`nik_baru`=`absensi_new`.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` 
                    AND DATE(absensi_new.tbl_karyawan_cuti_khusus.`start_cuti_khusus`)=tbl_date.`date` 
                    AND absensi_new.`tbl_karyawan_cuti_khusus`.`status_cuti_khusus` = '1' 
            WHERE `userinfo`.`badgenumber` = '$nik' and `tbl_date`.`date` like '%$tgl%'
            GROUP BY `tbl_karyawan_struktur`.`nik_baru`, `tbl_date`.`date`
            ORDER BY `tbl_date`.`date` DESC, `tbl_karyawan_struktur`.`nik_baru` ASC
        ) tbl_absensi_final
        ";
        $hasil = $this->db->query($sql);
        return $hasil;
    }

}