<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_app extends CI_Model
{
	
	function select_row_data($select, $table, $where='', $order='') {
		$this->db->select($select);
		if(!empty($where)) {
			$this->db->where($where);
		}
		if(!empty($order)) {
			$this->db->order_by($order[0], $order[1]);
		}
		$get = $this->db->get($table);

		return $get;
	}


	function insert_data($table, $data) {
		$this->db->insert($table, $data);
		return true;
	}

	function update_data($table, $data, $where) {
		$this->db->where($where);
		$this->db->update($table, $data);
		return true;
	}

	function delete_data($table, $where) {
		$this->db->where($where);
		$this->db->delete($table);
		return true;
	}

	function unggah_gambar($path=null,$name=null,$rename=null,$thumb=false,$wm=false)
	{
		$config['upload_path'] = './assets/apps/img/'.$path;
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['max_size'] = '1600';
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

	function absensi_masuk($nik_baru) {
        $tanggal_hari_ini = date('Y-m-d');
        $tanggal_sekarang = date('Y-m-d', strtotime('+1 day', strtotime($tanggal_hari_ini)));
        $tanggal_awal = date('Y-m-01', strtotime('-2 month', strtotime($tanggal_sekarang)));

        $sql = "
            SELECT
                tbl_final.`shift_day`
                , tbl_final.`badgenumber`
                , tbl_final.`name`
                , tbl_final.`jabatan_karyawan`
                , tbl_final.`lokasi_hrd`
                , tbl_final.`dept_struktur`
                , tbl_final.`join_date_struktur`
                , tbl_final.minimum_in
                , tbl_final.f1 AS `F1`
                , tbl_final.depo_f1 AS `depo_f1`
                , tbl_final.waktu_masuk
                , tbl_final.waktu_keluar
                , tbl_final.f4 AS `F4`
                , tbl_final.depo_f4 AS `depo_f4`
                , tbl_final.maximum_out
                , CASE 
                WHEN tbl_final.`ket_izin` IS NOT NULL
                    THEN tbl_final.`ket_izin`
                WHEN tbl_final.f1 = 'OFF'
                    AND tbl_final.f4 = 'OFF'
                THEN 'LI'
                WHEN (tbl_final.f1>=tbl_final.minimum_in)
                    AND (tbl_final.f1<=tbl_final.waktu_masuk) 
                    AND (tbl_final.f4<=tbl_final.maximum_out)
                    AND (tbl_final.f4>=tbl_final.waktu_keluar) 
                THEN 'HD'
                WHEN (tbl_final.f1>=tbl_final.minimum_in)
                    AND (tbl_final.f1>tbl_final.waktu_masuk) 
                    AND (tbl_final.f4<=tbl_final.maximum_out)
                    AND (tbl_final.f4>=tbl_final.waktu_keluar) 
                THEN 'TL'
                WHEN (tbl_final.f1 IS NULL AND tbl_final.f4 IS NULL) and 
                    (tbl_final.`waktu_shift` is null and dayname(DATE(tbl_final.`shift_day`)) = 'Sunday')
                THEN 'LI'
                WHEN (tbl_final.f1 IS NULL AND tbl_final.f4 IS NULL) 
                AND (tbl_final.`waktu_shift` IS NULL AND DAYNAME(DATE(tbl_final.`shift_day`)) = 'Saturday')
                AND tbl_final.`jabatan_hrd` = '342'
                THEN 'LI'
                WHEN tbl_final.birth_date = tbl_final.`shift_day`
                    AND tbl_final.`waktu_shift` IS NULL
                THEN 'LI'
                WHEN (tbl_final.`shift_day` BETWEEN '2020-04-01' and '2020-05-31')
                AND DAYNAME(DATE(tbl_final.`shift_day`)) = 'Saturday'
                AND tbl_final.`area` = '1'
                THEN 'LI'
                WHEN (tbl_final.`shift_day` BETWEEN '2020-09-14' AND '2020-09-30')
                AND DAYNAME(DATE(tbl_final.`shift_day`)) = 'Saturday'
                AND tbl_final.`area` = '1'
                AND (tbl_final.`dept_struktur` <> 'Information Communication and Technology'
                OR tbl_final.`dept_struktur` <> 'Warehouse Operation')
                THEN 'LI'
                WHEN tbl_final.`shift_day` BETWEEN '$tanggal_awal'
                and (SELECT absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` FROM absensi_new.`tbl_karyawan_struktur`
                WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru' 
                AND absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` >= '$tanggal_awal')
                THEN 'NEW'
                when tbl_final.`shift_day` between (SELECT absensi_new.`tbl_resign`.`tanggal_efektif_resign` FROM absensi_new.`tbl_resign`
                where absensi_new.`tbl_resign`.`nik_resign` = '$nik_baru' 
                and absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '$tanggal_awal') and '$tanggal_sekarang'
                then 'RESIGN'
                WHEN tbl_final.f1 IS NULL
                    AND tbl_final.f4 IS NULL
                THEN 'AL'
                WHEN tbl_final.f1 IS NULL 
                THEN 'TD F1'
                WHEN tbl_final.f4 IS NULL 
                THEN 'TD F4'
                WHEN (tbl_final.f1>=tbl_final.minimum_in)
                    AND (tbl_final.f1>tbl_final.waktu_masuk) 
                    AND (tbl_final.f4<=tbl_final.maximum_out)
                    AND (tbl_final.f4<tbl_final.waktu_keluar) 
                THEN 'F4 Tidak Sesuai'
                ELSE 'Tidak Sesuai Jadwal'
                END AS `ket_absensi`
                , CASE 
                WHEN (tbl_final.f1>=tbl_final.minimum_in)
                    AND (tbl_final.f1>tbl_final.waktu_masuk) 
                    AND (tbl_final.f4<=tbl_final.maximum_out)
                    AND (tbl_final.f4>=tbl_final.waktu_keluar) 
                THEN TIMEDIFF( tbl_final.waktu_masuk, tbl_final.f1 )
                ELSE ''
                END  AS `waktu_telat`
                FROM (SELECT 
                absensi_new.`tarikan_absen_adms`.`shift_day`
                , absensi_new.`tarikan_absen_adms`.`badgenumber`
                , absensi_new.`tarikan_absen_adms`.`name`
                , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
                , absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
                , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
                , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
                , absensi_new.`tbl_karyawan_struktur`.`join_date_struktur`
                , CASE
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '7' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`) , ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25' 
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '28' 
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                    ) AS DATETIME
                    ) - INTERVAL 5 HOUR 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` is not null
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 5 HOUR 
                ELSE CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:01'
                ) AS DATETIME
                ) 
                END AS minimum_in
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '18' 
                THEN 'OFF'
                WHEN absensi_new.`tarikan_absen_adms`.`in_manual` IS NOT NULL 
                AND absensi_new.`tarikan_absen_adms`.`in_manual` >= '22:00:01'
                AND absensi_new.`tarikan_absen_adms`.`in_manual` <= '23:59:59'
                THEN  CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , absensi_new.`tarikan_absen_adms`.`in_manual`
                ) AS DATETIME
                ) - INTERVAL 1 DAY
                WHEN absensi_new.`tarikan_absen_adms`.`in_manual` IS NOT NULL
                    THEN  CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , absensi_new.`tarikan_absen_adms`.`in_manual`
                    ) AS DATETIME
                    )   
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL
                THEN (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_normal
                WHERE masuk_normal.userid=userinfo.userid
                AND masuk_normal.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:01'
                ) AS DATETIME
                )
                AND masuk_normal.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:59'
                ) AS DATETIME
                ) 
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21'
                THEN (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_malem
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '22:00:00')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '22:00:00')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24'
                THEN (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_malem
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '13:00:00')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '13:00:00')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25'
                THEN (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_malem
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30'
                THEN (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_malem
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '03:00:00')
                ) AS DATETIME
                ) + INTERVAL 1 day
                )
                ELSE (
                SELECT MIN(checktime)
                FROM adms_db.checkinout masuk_malem
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                )
                END AS `f1`
                , CASE  
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_normal
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_normal.userid=userinfo.userid
                AND masuk_normal.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:01'
                ) AS DATETIME
                )
                AND masuk_normal.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:59'
                ) AS DATETIME
                ) 
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21'
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '22:00:00')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '22:00:00')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24'
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '13:00:00')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '13:00:00')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25'
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30'
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '03:00:00')
                ) AS DATETIME
                ) + INTERVAL 1 day
                LIMIT 0, 1
                )
                ELSE (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_malem.userid=userinfo.userid
                AND masuk_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND masuk_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                LIMIT 0, 1
                )
                END AS `depo_f1`
                , CAST(
                CONCAT(
                case 
                when absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25' 
                    then DATE(absensi_new.`tarikan_absen_adms`.`shift_day`)
                else 
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`)
                end, ' '
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30' 
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' THEN '22:00:00'
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30' 
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24' THEN '13:00:00'
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` >= '2023-05-02' 
                AND absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '284' THEN '09:00:00' 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL THEN '08:00:00'
                ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_masuk, '%H:%i:%S')
                END
                ) AS DATETIME
                ) AS waktu_masuk
                , CASE
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '16' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 07:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 07:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30'
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 22:00:00'
                ) AS DATETIME  
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 06:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25' THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '27' THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '28' THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 06:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '29' THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30' THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '31' THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '35' THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '37' THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`shift_day` >= '2023-05-01' 
                    AND absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = '284' 
                    THEN CAST(
                        CONCAT(
                          DATE(
                            absensi_new.`tarikan_absen_adms`.`shift_day`
                          ),
                          ' 18:00:00'
                        ) AS DATETIME
                    ) 
                WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` > '00:00:01' 
                AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` < '03:00:00' THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`),' ',absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`),' ',absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`
                    ) AS DATETIME  
                    )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` BETWEEN '2020-03-26'
                AND '2020-05-31' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL THEN '16:00:00'
                ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                END
                ) AS DATETIME
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` BETWEEN '2020-09-18'
                AND '2020-09-30' 
                AND (absensi_new.`tbl_karyawan_struktur`.`dept_struktur` = 'Information Communication and Technology' 
                OR absensi_new.`tbl_karyawan_struktur`.`dept_struktur` = 'Warehouse Operation') 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL THEN '17:00:00'
                ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                END
                ) AS DATETIME
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` BETWEEN '2020-09-14'
                AND '2020-09-30' THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL THEN '16:00:00'
                ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                END
                ) AS DATETIME
                )
                ELSE CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL THEN '17:00:00'
                ELSE TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                END
                ) AS DATETIME
                )
                END AS waktu_keluar
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '18' 
                THEN 'OFF'
                WHEN absensi_new.`tarikan_absen_adms`.`out_manual` IS NOT NULL 
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '7'
                AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '08:00:00'
                AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '12:00:00'
                THEN  CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , absensi_new.`tarikan_absen_adms`.`out_manual`
                ) AS DATETIME
                )
                WHEN absensi_new.`tarikan_absen_adms`.`out_manual` IS NOT NULL 
                AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '00:00:01'
                AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '12:00:00'
                THEN  CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , absensi_new.`tarikan_absen_adms`.`out_manual`
                ) AS DATETIME
                ) + INTERVAL 1 DAY
                WHEN absensi_new.`tarikan_absen_adms`.`out_manual` IS NOT NULL
                THEN  CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , absensi_new.`tarikan_absen_adms`.`out_manual`
                ) AS DATETIME
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '16' 
                THEN (
                SELECT MAX(checktime)
                FROM adms_db.checkinout masuk_normal
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30' 
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24' 
                THEN (
                SELECT MAX(checktime)
                FROM adms_db.checkinout masuk_normal
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 18:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' 
                THEN (
                SELECT MAX(checktime)
                FROM adms_db.checkinout masuk_normal
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 10:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift`= '25' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 13:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '27' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '28' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '29' 
                    THEN (
                    SELECT max(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 21:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '31' 
                    THEN (
                    SELECT max(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '35' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 09:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '37' 
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` > '00:00:01' 
                AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` < '03:00:00'
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    absensi_new.`tarikan_absen_adms`.`shift_day`, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    absensi_new.`tarikan_absen_adms`.`shift_day`, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    )
                 WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL
                    THEN (
                    SELECT MAX(checktime)
                    FROM adms_db.checkinout masuk_normal
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL
                THEN (
                SELECT MAX(checktime)
                FROM adms_db.checkinout masuk_normal
                WHERE masuk_normal.userid=userinfo.userid
                AND masuk_normal.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:01:00'
                ) AS DATETIME
                )
                AND masuk_normal.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 23:59:59'
                ) AS DATETIME
                ) 
                )
                ELSE (
                SELECT MAX(checktime)
                FROM adms_db.checkinout keluar_malem
                WHERE keluar_malem.userid=userinfo.userid
                AND keluar_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND keluar_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                )
                END AS `f4`
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '16' 
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_normal
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`shift_day` <= '2020-05-30' 
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24' 
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_normal
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 18:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' 
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_normal
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 10:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                LIMIT 0, 1
                )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift`= '25' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 13:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '27' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 09:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '28' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '29' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 21:00:00'
                    ) AS DATETIME  
                    )
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '31' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '35' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 01:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 09:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '37' 
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 04:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` > '00:00:01' 
                AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` < '03:00:00'
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    absensi_new.`tarikan_absen_adms`.`shift_day`, ' 00:00:01'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    absensi_new.`tarikan_absen_adms`.`shift_day`, ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    LIMIT 0, 1
                    )
                 WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL
                    THEN (
                    SELECT absensi_new.`tbl_depo`.`depo_nama`
                    FROM adms_db.checkinout masuk_normal
                    LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                    LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                    WHERE masuk_normal.userid=userinfo.userid
                    AND masuk_normal.checktime>=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) - INTERVAL 5 hour 
                    AND masuk_normal.checktime<=CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                    , TIME_FORMAT(absensi_new.`tarikan_absen_adms`.`attendance_date_longshift`, '%H:%i:%S')
                    ) AS DATETIME  
                    ) + INTERVAL 5 hour 
                    LIMIT 0, 1
                    )
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` IS NULL
                THEN (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout masuk_normal
                LEFT JOIN absensi_new.`sn_depo`
                    ON masuk_normal.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE masuk_normal.userid=userinfo.userid
                AND masuk_normal.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:01:00'
                ) AS DATETIME
                )
                AND masuk_normal.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 23:59:59'
                ) AS DATETIME
                )
                LIMIT 0, 1 
                )
                ELSE (
                SELECT absensi_new.`tbl_depo`.`depo_nama`
                FROM adms_db.checkinout keluar_malem
                LEFT JOIN absensi_new.`sn_depo`
                    ON keluar_malem.`SN` = absensi_new.`sn_depo`.`SN`
                LEFT JOIN absensi_new.`tbl_depo`
                    ON absensi_new.`sn_depo`.`depo_id` = absensi_new.`tbl_depo`.`depo_id`
                WHERE keluar_malem.userid=userinfo.userid
                AND keluar_malem.checktime>=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) - INTERVAL 4 HOUR
                AND keluar_malem.checktime<=CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                LIMIT 0, 1
                )
                END AS `depo_f4`
                , CASE
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '9' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '50' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' '
                , TIME_FORMAT(absensi_new.tbl_shifting.waktu_keluar, '%H:%i:%S')
                ) AS DATETIME
                ) + INTERVAL 4 HOUR
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '12' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '14' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '16' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN DATE(absensi_new.`tarikan_absen_adms`.`shift_day`) <= '2020-05-30'
                and absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN DATE(absensi_new.`tarikan_absen_adms`.`shift_day`) <= '2020-05-30'
                AND absensi_new.`tarikan_absen_adms`.`waktu_shift` = '24' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 02:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '21' 
                THEN CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 10:00:00'
                ) AS DATETIME  
                ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '25' 
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + interval 1 day
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '27' 
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '28' 
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 11:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '29' 
                    THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 05:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '30' 
                    THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '31' 
                    THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 08:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '35' 
                    THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 09:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                    WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '37' 
                    THEN CAST(
                    CONCAT(
                    DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 12:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                WHEN absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` IS NOT NULL 
                AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` > '00:00:01' AND absensi_new.`tarikan_absen_adms`.`attendance_date_longshift` < '03:00:00'
                    THEN CAST(
                    CONCAT(
                    date(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 03:00:00'
                    ) AS DATETIME  
                    ) + INTERVAL 1 DAY 
                ELSE CAST(
                CONCAT(
                DATE(absensi_new.`tarikan_absen_adms`.`shift_day`), ' 23:59:59'
                ) AS DATETIME
                ) 
                END AS maximum_out
                , absensi_new.`tarikan_absen_adms`.`waktu_shift`
                , CASE 
                WHEN absensi_new.`tarikan_absen_adms`.`jenis_full_day` IS NOT NULL
                THEN absensi_new.`tarikan_absen_adms`.`jenis_full_day`
                WHEN absensi_new.`tarikan_absen_adms`.`jenis_non_full_day` IS NOT NULL
                THEN absensi_new.`tarikan_absen_adms`.`jenis_non_full_day`
                WHEN absensi_new.`tarikan_absen_adms`.`opsi_cuti_tahunan` IS NOT NULL
                THEN 'CU'
                WHEN absensi_new.`tarikan_absen_adms`.`jenis_cuti_khusus` IS NOT NULL
                THEN 'CK'
                END AS ket_izin
                , absensi_new.`tmp_events`.`birth_date`
                , absensi_new.`tbl_jabatan_karyawan`.`area`
            FROM absensi_new.`tarikan_absen_adms`
            LEFT JOIN absensi_new.`tbl_shifting`
                ON absensi_new.`tarikan_absen_adms`.`waktu_shift` = absensi_new.`tbl_shifting`.`id_shifting`
            INNER JOIN adms_db.`userinfo`
                ON absensi_new.`tarikan_absen_adms`.`userid` = adms_db.`userinfo`.`userid`
            INNER JOIN absensi_new.`tbl_karyawan_struktur`
                ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tarikan_absen_adms`.`badgenumber`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan`
                ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
            LEFT JOIN absensi_new.`tmp_events`
                ON absensi_new.`tmp_events`.`birth_date` = absensi_new.`tarikan_absen_adms`.`shift_day`
            WHERE absensi_new.`tarikan_absen_adms`.`shift_day` >= '$tanggal_awal' 
            AND absensi_new.`tarikan_absen_adms`.`shift_day` < '$tanggal_sekarang'
            AND absensi_new.`tarikan_absen_adms`.`badgenumber` = '$nik_baru'
            ) tbl_final
            ORDER BY tbl_final.`shift_day` DESC
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function absensi_bawahan_pusat($jabatan) {
        $sql = "
            SELECT
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
            ORDER BY `tbl_karyawan_struktur`.`join_date_struktur` ASC
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function absensi_bawahan($jabatan, $lokasi) {
        $sql = "
            SELECT
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
            WHERE `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'
            AND `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function performace_bawahan_pusat($jabatan, $nik_baru) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`jabatan_karyawan`
                , `tbl_karyawan_struktur`.`lokasi_hrd`
                , `tbl_karyawan_struktur`.`perusahaan_struktur`
                , `tbl_karyawan_struktur`.`level_struktur`
                , `tbl_jabatan_karyawan`.`level_jabatan_karyawan`
                , `tbl_karyawan_struktur`.`dept_struktur`
                , `tbl_karyawan_struktur`.`join_date_struktur`
                , (SELECT COUNT(absensi_new.`tbl_karyawan_master_performance`.`nik_baru`) FROM absensi_new.`tbl_karyawan_master_performance`
                WHERE absensi_new.`tbl_karyawan_master_performance`.`nik_baru` = `tbl_karyawan_struktur`.`nik_baru`) AS jumlah_performance
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            WHERE `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            OR `tbl_karyawan_struktur`.`nik_baru` = '$nik_baru')
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function performace_bawahan($jabatan, $lokasi, $nik_baru) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`jabatan_karyawan`
                , `tbl_karyawan_struktur`.`lokasi_hrd`
                , `tbl_karyawan_struktur`.`perusahaan_struktur`
                , `tbl_karyawan_struktur`.`level_struktur`
                , `tbl_jabatan_karyawan`.`level_jabatan_karyawan`
                , `tbl_karyawan_struktur`.`dept_struktur`
                , `tbl_karyawan_struktur`.`join_date_struktur`
                , (SELECT COUNT(absensi_new.`tbl_karyawan_master_performance`.`nik_baru`) FROM absensi_new.`tbl_karyawan_master_performance`
                WHERE absensi_new.`tbl_karyawan_master_performance`.`nik_baru` = `tbl_karyawan_struktur`.`nik_baru`) AS jumlah_performance
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            WHERE `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'
            AND `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            OR `tbl_karyawan_struktur`.`nik_baru` = '$nik_baru')
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function performace_detail_all($nik_baru) {
        $sql = "
            SELECT 
                absensi_new.`tbl_karyawan_struktur`.`nik_baru`
                , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
                , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
                , absensi_new.`tbl_karyawan_struktur`.`perusahaan_struktur`
                , absensi_new.`tbl_karyawan_struktur`.`level_struktur`
                , absensi_new.`tbl_jabatan_karyawan`.`level_jabatan_karyawan`
                , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
                , absensi_new.`tbl_karyawan_struktur`.`join_date_struktur`
                , absensi_new.`tbl_karyawan_histori_performance`.`bulan`
                , absensi_new.`tbl_karyawan_histori_performance`.`tahun`
            FROM absensi_new.`tbl_karyawan_histori_performance`
            INNER JOIN absensi_new.`tbl_karyawan_struktur`
                ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_histori_performance`.`nik_baru`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` 
                ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
            WHERE absensi_new.`tbl_karyawan_histori_performance`.`nik_baru` = '$nik_baru'
            GROUP BY absensi_new.`tbl_karyawan_histori_performance`.`nik_baru`, absensi_new.`tbl_karyawan_histori_performance`.`bulan`, absensi_new.`tbl_karyawan_histori_performance`.`tahun`
            ORDER BY absensi_new.`tbl_karyawan_histori_performance`.`bulan` ASC, absensi_new.`tbl_karyawan_histori_performance`.`tahun` ASC
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function performace_detail_all_perbulan($nik_baru, $bulan, $tahun) {
        $sql = "
            SELECT 
                absensi_new.`tbl_karyawan_struktur`.`nik_baru`
                , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
                , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
                , absensi_new.`tbl_karyawan_struktur`.`perusahaan_struktur`
                , absensi_new.`tbl_karyawan_struktur`.`level_struktur`
                , absensi_new.`tbl_jabatan_karyawan`.`level_jabatan_karyawan`
                , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
                , absensi_new.`tbl_karyawan_struktur`.`join_date_struktur`
                , absensi_new.`tbl_karyawan_histori_performance`.`bulan`
                , absensi_new.`tbl_karyawan_histori_performance`.`tahun`
            FROM absensi_new.`tbl_karyawan_histori_performance`
            INNER JOIN absensi_new.`tbl_karyawan_struktur`
                ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_histori_performance`.`nik_baru`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` 
                ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
            WHERE absensi_new.`tbl_karyawan_histori_performance`.`nik_baru` = '$nik_baru'
            AND absensi_new.`tbl_karyawan_histori_performance`.`bulan` = '$bulan'
            AND absensi_new.`tbl_karyawan_histori_performance`.`tahun` = '$tahun'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function gallup_bawahan_pusat($jabatan) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`jabatan_karyawan`
                , `tbl_karyawan_struktur`.`lokasi_hrd`
                , `tbl_karyawan_struktur`.`perusahaan_struktur`
                , `tbl_karyawan_struktur`.`level_struktur`
                , `tbl_karyawan_struktur`.`dept_struktur`
                , `tbl_karyawan_struktur`.`join_date_struktur`
                , CASE 
                WHEN (
                `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NULL
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NOT NULL
                AND `tbl_karyawan_gallup_essay`.`angka_mutu_atasan_2` IS NULL
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
                END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            LEFT JOIN `tbl_karyawan_gallup_essay`
                ON `tbl_karyawan_gallup_essay`.`nik_baru` = `tbl_karyawan_struktur`.`nik_baru`
            AND `tbl_karyawan_gallup_essay`.`pertanyaan` = '1'
            WHERE `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND (
            `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NULL
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            )
            OR( 
            `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NOT NULL
            AND `tbl_karyawan_gallup_essay`.`angka_mutu_atasan_2` IS NULL
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            )
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function gallup_bawahan($jabatan, $lokasi) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`jabatan_karyawan`
                , `tbl_karyawan_struktur`.`lokasi_hrd`
                , `tbl_karyawan_struktur`.`perusahaan_struktur`
                , `tbl_karyawan_struktur`.`level_struktur`
                , `tbl_karyawan_struktur`.`dept_struktur`
                , `tbl_karyawan_struktur`.`join_date_struktur`
                , CASE 
                WHEN (
                `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NULL
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NOT NULL
                AND `tbl_karyawan_gallup_essay`.`angka_mutu_atasan_2` IS NULL
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
                END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`jabatan_hrd` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            LEFT JOIN `tbl_karyawan_gallup_essay`
                ON `tbl_karyawan_gallup_essay`.`nik_baru` = `tbl_karyawan_struktur`.`nik_baru`
            AND `tbl_karyawan_gallup_essay`.`pertanyaan` = '1'
            WHERE `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'
            AND (
            `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NULL
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            )
            OR( 
            `tbl_karyawan_gallup_essay`.`angka_mutu_atasan` IS NOT NULL
            AND `tbl_karyawan_gallup_essay`.`angka_mutu_atasan_2` IS NULL
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            )
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function detail_jawaban_essay($nik_baru, $tahun) {
        $sql = "
            SELECT 
                absensi_new.`tbl_pertanyaan_gallup_essay`.`id`
                , absensi_new.`tbl_karyawan_gallup_essay`.`id` AS id_jawaban
                , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
                , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
                , absensi_new.`tbl_pertanyaan_gallup_essay`.`no_pertanyaan`
                , absensi_new.`tbl_pertanyaan_gallup_essay`.`pertanyaan`
                , absensi_new.`tbl_pertanyaan_gallup_essay`.`ket_pertanyaan`
                , absensi_new.`tbl_karyawan_gallup_essay`.`jawaban`
            FROM absensi_new.`tbl_pertanyaan_gallup_essay`
            LEFT JOIN absensi_new.`tbl_karyawan_gallup_essay`
                ON absensi_new.`tbl_pertanyaan_gallup_essay`.`no_pertanyaan` = absensi_new.`tbl_karyawan_gallup_essay`.`pertanyaan`
            INNER JOIN absensi_new.`tbl_karyawan_struktur`
                ON absensi_new.`tbl_karyawan_gallup_essay`.`nik_baru` = absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan`
                ON absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`
            WHERE absensi_new.`tbl_karyawan_gallup_essay`.`nik_baru` = '$nik_baru'
            AND absensi_new.`tbl_pertanyaan_gallup_essay`.`tahun` = '$tahun'
            ORDER BY absensi_new.`tbl_pertanyaan_gallup_essay`.`no_pertanyaan`  ASC
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function daily_bawahan_pusat($jabatan) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`level_jabatan_karyawan`
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
            AND `tbl_jabatan_karyawan`.`level_jabatan_karyawan` >= '4'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function daily_bawahan($jabatan, $lokasi) {
        $sql = "
            SELECT
                `tbl_karyawan_struktur`.`nik_baru`
                , `tbl_karyawan_struktur`.`nik_lama`
                , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
                , `tbl_jabatan_karyawan`.`level_jabatan_karyawan`
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
            WHERE `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'
            AND `tbl_karyawan_struktur`.`status_karyawan` = '0'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND `tbl_jabatan_karyawan`.`level_jabatan_karyawan` >= '4'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

}