<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Author Agung Saputra
*/
class M_admin extends CI_Model
{
    function log_visit($where='', $order='')
    {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_struktur ks');
        $this->db2->join('tbl_log_visit_hr l', 'ks.`nik_baru` = l.`nik_baru`', 'inner');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }
    
    function karyawan_backup($where='', $order='')
    {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_backup kb');
        $this->db2->join('tbl_shifting s', 'kb.`jam_kerja` = s.`id_shifting`', 'inner');
        $this->db2->join('tbl_karyawan_struktur ks', 'ks.`nik_baru` = kb.`nik_baru`', 'inner');
        $this->db2->order_by('kb.tanggal_pengajuan DESC');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function office($where='', $order='') {
        $this->db2->select('*');
        $this->db2->from('tbl_depo');
        $this->db2->join('tbl_office', 'tbl_depo.office_id=tbl_office.office_id');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function jabatan($where='', $order='') {
        $this->db2->select('*');
        $this->db2->from('tbl_jabatan');
        $this->db2->join('tbl_office', 'tbl_jabatan.office_id=tbl_office.office_id');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function getMaster_karyawan($where='', $order='') {
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->join('surat_keluar', 'petugas.id=surat_keluar.id');
        $this->db->join('jenis_surat', 'surat_keluar.id_jenis=jenis_surat.id_jenis');
        if(!empty($where)) {
            $this->db->where($where);
        }
        if(!empty($order)) {
            $this->db->order_by($order[0], $order[1]);
        }
        $get = $this->db->get();

        return $get;
    }

    function karyawan_shift($where='', $order='') {
        $this->db2->select('ks.`id_karyawan_shift`, ks.`nik_shift`, ks.`nama_karyawan_shift`, ks.`tanggal_shift`, s.`waktu_masuk`, s.`waktu_keluar`');
        $this->db2->from('tmp_karyawan_shift ks');
        $this->db2->join('tbl_shifting s', 'ks.jam_kerja=s.id_shifting');
        $this->db2->order_by('ks.tanggal_shift', 'desc');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function print_stpl() {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_lembur');
        $this->db2->join('tbl_shifting', 'tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting');

        $get = $this->db2->get();
        return $get;
    }

    function pengajuan_lembur($birth_date, $lokasi) {
        $this->db2->select('tbl_karyawan_lembur.*, tbl_shifting.*');
        $this->db2->from('tbl_karyawan_lembur');
        $this->db2->join('tbl_shifting', 'tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting');
        $this->db2->join('tbl_jabatan_karyawan', 'tbl_karyawan_lembur.jabatan_karyawan_lembur=tbl_jabatan_karyawan.no_jabatan_karyawan');
        $this->db2->where('tbl_karyawan_lembur.tanggal_lembur', $birth_date);
        $this->db2->where('tbl_karyawan_lembur.lokasi_karyawan_lembur', $lokasi);

        $get = $this->db2->get();
        return $get;
    }

    function pengajuan_lembur_fa($birth_date) {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_lembur');
        $this->db2->join('tbl_shifting', 'tbl_karyawan_lembur.jam_kerja=tbl_shifting.id_shifting');
        $this->db2->where('tbl_karyawan_lembur.status', '1');
        $this->db2->where('tbl_karyawan_lembur.tanggal_lembur', $birth_date);

        $get = $this->db2->get();
        return $get;
    }

    function view_karyawan_shift($where='', $order='') {
        $this->db2->select('*');
        $this->db2->from('tmp_karyawan_shift');
        $this->db2->join('tbl_jabatan_karyawan', 'tmp_karyawan_shift.`jabatan_karyawan_shift` = tbl_jabatan_karyawan.`no_jabatan_karyawan`');
        $this->db2->join('tbl_shifting', 'tmp_karyawan_shift.jam_kerja=tbl_shifting.id_shifting');
        $this->db2->group_by('tmp_karyawan_shift.`nik_shift`');
        $this->db2->order_by('tmp_karyawan_shift.`nama_karyawan_shift`', 'ASC');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function view_shift($where='', $order='') {
        $this->db2->select('ks.`id_karyawan_shift`,
            str.`nik_baru`,
            str.`nama_karyawan_struktur`,
            jk.`jabatan_karyawan`,
            d.`kode_departement`,
            ks.`tanggal_shift`,
            s.`waktu_masuk`,
            s.`waktu_keluar`
        ');
        $this->db2->from('`tmp_karyawan_shift` ks');
        $this->db2->join('`tbl_shifting` s', 'ks.`jam_kerja` = s.`id_shifting`', 'inner');
        $this->db2->join('`tbl_karyawan_struktur` str', 'ks.`nik_shift` = str.`nik_baru`', 'inner');
        $this->db2->join('`tbl_jabatan_karyawan` jk', 'str.`jabatan_hrd` = jk.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('`tbl_departement` d', 'jk.`dept_jabatan_karyawan` = d.`departement_id`', 'inner');
        $this->db2->order_by('ks.`tanggal_shift`', 'desc');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function login_masuk_2($where='', $order='') {
        $this->db->select('*');
        $this->db->from('userinfo u');
        $this->db->join('absensi_new.tbl_karyawan_struktur ks', 'u.badgenumber = ks.nik_baru', 'left');
        $this->db->join('absensi_new.tbl_jabatan_karyawan jk', 'ks.jabatan_hrd = jk.no_jabatan_karyawan', 'left');

        if(!empty($where)) {
            $this->db->where($where);
        }
        if(!empty($order)) {
            $this->db->order_by($order[0], $order[1]);
        }
        $get = $this->db->get();

        return $get;
    }

    function login_masuk_new($where='', $order='') {
        $this->db->select('ks.`nik_baru`
            , ks.`no_urut`
            , ks.`password`
            , ks.`nama_karyawan_struktur`
            , lj.`level_jabatan`
            , ks.`jabatan_hrd` AS jabatan_struktur
            , ks.`lokasi_hrd` AS lokasi_struktur
            , jk.`jabatan_karyawan`
            , d.`departement_id`
            , d.`nama_departement` as dept_struktur
            , ks.`perusahaan_struktur`
            , ks.`nama_atasan_struktur`
            , jk.`area`
            , u.`userid`');
        $this->db->from('absensi_new.`tbl_karyawan_struktur` ks');
        $this->db->join('adms_db.`userinfo` u', 'ks.`nik_baru` = u.`badgenumber`', 'left');
        $this->db->join('absensi_new.`tbl_jabatan_karyawan` jk', 'ks.`jabatan_hrd` = jk.`no_jabatan_karyawan`', 'left');
        $this->db->join('absensi_new.`tbl_level_jabatan` lj', 'jk.`level_jabatan_karyawan` = lj.`id_level_jabatan`', 'left');
        $this->db->join('absensi_new.`tbl_departement` d', 'jk.`dept_jabatan_karyawan` = d.`departement_id`', 'left');

        if(!empty($where)) {
            $this->db->where($where);
        }
        if(!empty($order)) {
            $this->db->order_by($order[0], $order[1]);
        }
        $get = $this->db->get();

        return $get;
    }

    function filter_karyawan_shift($where)
    {
        $this->db2->select('tmp_karyawan_shift.`id_karyawan_shift`
            ,tmp_karyawan_shift.`nik_shift`
            ,tmp_karyawan_shift.`nama_karyawan_shift`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tmp_karyawan_shift.`dept_karyawan_shift`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tmp_karyawan_shift.`tanggal_shift`
            ,tmp_karyawan_shift.`jam_kerja`
            ,tbl_shifting.`waktu_masuk`
            ,tbl_shifting.`waktu_keluar`');
        $this->db2->from('tbl_karyawan_struktur');
        $this->db2->join('tmp_karyawan_shift', 'tbl_karyawan_struktur.`nik_baru` = tmp_karyawan_shift.`nik_shift`', 'inner');
        $this->db2->join('tbl_jabatan_karyawan', 'tmp_karyawan_shift.`jabatan_karyawan_shift` = tbl_jabatan_karyawan.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('tbl_shifting', 'tmp_karyawan_shift.`jam_kerja` = tbl_shifting.`id_shifting`', 'inner');
        $this->db2->where($where);

        $get = $this->db2->get();
        return $get;
    }

    function detail_karyawan_shift($where='', $order='') {
        $this->db2->select('*');
        $this->db2->from('`tmp_karyawan_shift` ks');
        $this->db2->join('`tbl_shifting` s', 'ks.`jam_kerja` = s.`id_shifting`', 'inner');
        $this->db2->join('`tbl_karyawan_struktur` str', 'ks.`nik_shift` = str.`nik_baru`', 'inner');
        $this->db2->join('`tbl_jabatan_karyawan` jk', 'str.`jabatan_hrd` = jk.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('`tbl_departement` d', 'jk.`dept_jabatan_karyawan` = d.`departement_id`', 'inner');
        $this->db2->order_by('ks.`tanggal_shift`', 'DESC');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function index_karyawan_ptk($where='', $order='') {
        $this->db2->select('
            absensi_new.`tbl_karyawan_ptk`.`id`
            , absensi_new.`tbl_karyawan_ptk`.`no_pengajuan`
            , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
            , absensi_new.`tbl_departement`.`nama_departement`
            , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
            , absensi_new.`tbl_level_jabatan`.`level_jabatan`
            , absensi_new.`tbl_karyawan_ptk`.`depo_ptk`
            , absensi_new.`tbl_karyawan_ptk`.`dept_ptk`
            , absensi_new.`tbl_karyawan_ptk`.`analisa`
            , absensi_new.`tbl_karyawan_ptk`.`tenaga_kerja`
            , absensi_new.`tbl_karyawan_ptk`.`status_atasan`
            , absensi_new.`tbl_karyawan_ptk`.`status_hrd`
            ');
        $this->db2->from('absensi_new.`tbl_karyawan_ptk`');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 'absensi_new.`tbl_karyawan_ptk`.`jabatan_ptk` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('absensi_new.`tbl_level_jabatan`', 'absensi_new.`tbl_level_jabatan`.`id_level_jabatan` = absensi_new.`tbl_jabatan_karyawan`.`level_jabatan_karyawan`', 'inner');
        $this->db2->join('absensi_new.`tbl_departement`', 'absensi_new.`tbl_departement`.`departement_id` = absensi_new.`tbl_jabatan_karyawan`.`dept_jabatan_karyawan`', 'inner');
        $this->db2->join('absensi_new.`tbl_karyawan_struktur`', 'absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_ptk`.`nik_pengajuan`', 'inner');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function depo_sn($where)
    {
        $this->db2->select('*');
        $this->db2->from('tbl_depo d');
        $this->db2->join('sn_depo sn', 'd.`depo_id` = sn.`depo_id`', 'inner');

        $get = $this->db2->get();
        return $get;
    }

    function index_work_load($where='', $order='')
    {
        $this->db2->select('tbl_jabatan_karyawan.`no_jabatan_karyawan`
            , tbl_departement.`nama_departement`
            , tbl_departement.`kode_departement`
            , tbl_jabatan_karyawan.`jabatan_karyawan`
            , tbl_office.`tempat`
            , tbl_jabatan_karyawan.`mpp`
            , tbl_level_jabatan.`level_jabatan`
            , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
            , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
            , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
            , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
            , tbl_jabatan_karyawan.`status`');
        $this->db2->from('tbl_jabatan_karyawan');
        $this->db2->join('tbl_departement', 'tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`');
        $this->db2->join('tbl_level_jabatan', 'tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`');
        $this->db2->join('tbl_office', 'tbl_jabatan_karyawan.`area` = tbl_office.`office_id`');
        $this->db2->join('tbl_jabatan_karyawan_approval', 'tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`');
        $this->db2->where("(tbl_level_jabatan.`level_jabatan` <> 'Manager'
        AND tbl_level_jabatan.`level_jabatan` <> 'Assistant Manager')");
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function index_work_load_manager($where='', $order='')
    {
        $this->db2->select('tbl_jabatan_karyawan.`no_jabatan_karyawan`
            , tbl_departement.`nama_departement`
            , tbl_departement.`kode_departement`
            , tbl_jabatan_karyawan.`jabatan_karyawan`
            , tbl_office.`tempat`
            , tbl_jabatan_karyawan.`mpp`
            , tbl_level_jabatan.`level_jabatan`
            , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
            , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
            , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
            , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
            , tbl_jabatan_karyawan.`status`');
        $this->db2->from('tbl_jabatan_karyawan');
        $this->db2->join('tbl_departement', 'tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`');
        $this->db2->join('tbl_level_jabatan', 'tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`');
        $this->db2->join('tbl_office', 'tbl_jabatan_karyawan.`area` = tbl_office.`office_id`');
        $this->db2->join('tbl_jabatan_karyawan_approval', 'tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`');
        $this->db2->where("tbl_level_jabatan.`level_jabatan` <> 'Manager'");
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function index_work_load_detail($where='', $order='')
    {
        $this->db2->select('tbl_jabatan_karyawan.`no_jabatan_karyawan`
            , tbl_departement.`nama_departement`
            , tbl_departement.`kode_departement`
            , tbl_jabatan_karyawan.`jabatan_karyawan`
            , tbl_jabatan_karyawan.`mpp`
            , tbl_level_jabatan.`level_jabatan`
            , tbl_jabatan_karyawan.`status`');
        $this->db2->from('tbl_jabatan_karyawan');
        $this->db2->join('tbl_departement', 'tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`');
        $this->db2->join('tbl_level_jabatan', 'tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function get_no_karyawan(){
        $q = $this->db2->query("SELECT SUBSTRING(nik_baru, -6, 4) AS kd_max FROM tbl_karyawan_induk WHERE userid");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_karyawan_backup(){
        $q = $this->db2->query("SELECT SUBSTRING(nik_karyawan_backup, -6, 4) AS kd_max FROM tbl_karyawan_backup WHERE id_karyawan_backup");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function getdepo_sn($where='', $order='') {
        $this->db2->select('*');
        $this->db2->from('sn_depo sn');
        $this->db2->join('tbl_depo d', 'sn.depo_id=d.depo_id', 'left');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function edit_ptk($where='', $order='')
    {
        $this->db2->select('*');
        $this->db2->from('absensi_new.`tbl_karyawan_ptk`');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 'absensi_new.`tbl_karyawan_ptk`.`jabatan_ptk` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`', 'inner');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    function index_work_load_jabatan($dept)
    {
        $hsl=$this->db2->query("SELECT 
                tbl_mpp_jabatan.`no_jabatan_karyawan`
                , tbl_mpp_jabatan.`nama_departement`
                , tbl_mpp_jabatan.`kode_departement`
                , tbl_mpp_jabatan.`jabatan_karyawan`
                , tbl_mpp_jabatan.`tempat`
                , tbl_mpp_jabatan.`MPP_WLA`
                , tbl_mpp_jabatan.`MPP_ACC`
                , tbl_mpp_jabatan.`DR`
                , tbl_mpp_jabatan.`MPP_ACT` - tbl_mpp_jabatan.`DR` AS MPA
                , tbl_mpp_jabatan.`MPP_ACC` - tbl_mpp_jabatan.`MPP_ACT` AS PTK
                , tbl_mpp_jabatan.`level_jabatan`
                , tbl_mpp_jabatan.`atasan_1_jabatan_karyawan`
                , tbl_mpp_jabatan.`atasan_2_jabatan_karyawan`
                , tbl_mpp_jabatan.`no_jabatan_karyawan_atasan_1`
                , tbl_mpp_jabatan.`no_jabatan_karyawan_atasan_2`
                , tbl_mpp_jabatan.`status`
                , tbl_mpp_jabatan.`status_mpp`
                , tbl_mpp_jabatan.`keterangan`
                , tbl_mpp_jabatan.`status_wla`
                , tbl_mpp_jabatan.`status_jobdesc`
                , tbl_mpp_jabatan.`status_kpi`
            FROM (SELECT
                tbl_work_load.`no_jabatan_karyawan`
                , tbl_work_load.`nama_departement`
                , tbl_work_load.`kode_departement`
                , tbl_work_load.`jabatan_karyawan`
                , tbl_work_load.`tempat`
                , (select 
                    tbl_mpp_jabatan.`MPP`
                from (select
                    tbl_work_load.`no_jabatan_karyawan`
                    , tbl_work_load.`nama_departement`
                    , tbl_work_load.`kode_departement`
                    , tbl_work_load.`jabatan_karyawan`
                    , tbl_work_load.`tempat`
                    , round(((select sum(absensi_new.`tbl_jabatan_analisa`.`jam`) * 25
                    from absensi_new.`tbl_jabatan_analisa`
                    where absensi_new.`tbl_jabatan_analisa`.`status` = '1'
                    and absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) +
                    
                    (SELECT SUM(absensi_new.`tbl_jabatan_analisa`.`jam`) * 4
                    FROM absensi_new.`tbl_jabatan_analisa`
                    WHERE absensi_new.`tbl_jabatan_analisa`.`status` = '2'
                    AND absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) +
                    
                    (SELECT SUM(absensi_new.`tbl_jabatan_analisa`.`jam`) * 1
                    FROM absensi_new.`tbl_jabatan_analisa`
                    WHERE absensi_new.`tbl_jabatan_analisa`.`status` = '3'
                    AND absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`)) / 176 ) as MPP
                    
                    , (SELECT COUNT(absensi_new.`tbl_karyawan_resign`.`nik_baru`)
                    FROM absensi_new.`tbl_karyawan_resign`
                    WHERE absensi_new.`tbl_karyawan_resign`.`jabatan` = tbl_work_load.`no_jabatan_karyawan`
                    AND absensi_new.`tbl_karyawan_resign`.`status_pengajuan` = '0') AS DR
                    
                    , (SELECT COUNT(absensi_new.`tbl_karyawan_struktur`.`nik_baru`)
                    FROM absensi_new.`tbl_karyawan_struktur`
                    WHERE absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = tbl_work_load.`no_jabatan_karyawan`
                    AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
                    AND (absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%.%'
                    and absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%12345%')) AS MPA
                    , tbl_work_load.`level_jabatan`
                    , tbl_work_load.`atasan_1_jabatan_karyawan`
                    , tbl_work_load.`atasan_2_jabatan_karyawan`
                    , tbl_work_load.`no_jabatan_karyawan_atasan_1`
                    , tbl_work_load.`no_jabatan_karyawan_atasan_2`
                    , tbl_work_load.`status`
                from (select 
                        tbl_jabatan_karyawan.`no_jabatan_karyawan`
                        , tbl_departement.`nama_departement`
                        , tbl_departement.`kode_departement`
                        , tbl_jabatan_karyawan.`jabatan_karyawan`
                        , tbl_office.`tempat`
                        , tbl_level_jabatan.`level_jabatan`
                        , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
                        , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
                        , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
                        , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
                        , tbl_jabatan_karyawan.`status`
                from tbl_jabatan_karyawan
                inner join tbl_departement
                    on tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`
                inner join tbl_level_jabatan
                    on tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
                inner join tbl_office
                    on tbl_jabatan_karyawan.`area` = tbl_office.`office_id`
                inner join tbl_jabatan_karyawan_approval
                    on tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
                where absensi_new.`tbl_jabatan_karyawan`.`area` = '1'
                and tbl_jabatan_karyawan.`status` = '0'
                ORDER BY absensi_new.`tbl_departement`.`kode_departement`, absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan` ASC) 
                tbl_work_load ) tbl_mpp_jabatan
                where tbl_mpp_jabatan.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) as MPP_WLA
                
                , tbl_work_load.`mpp` as MPP_ACC
                
                , (SELECT COUNT(absensi_new.`tbl_karyawan_resign`.`nik_baru`)
                FROM absensi_new.`tbl_karyawan_resign`
                WHERE absensi_new.`tbl_karyawan_resign`.`jabatan` = tbl_work_load.`no_jabatan_karyawan`
                AND absensi_new.`tbl_karyawan_resign`.`status_pengajuan` = '0') AS DR
                
                , (SELECT COUNT(absensi_new.`tbl_karyawan_struktur`.`nik_baru`)
                FROM absensi_new.`tbl_karyawan_struktur`
                WHERE absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = tbl_work_load.`no_jabatan_karyawan`
                AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
                AND (absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%.%'
                AND absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%12345%')) AS MPP_ACT
                , tbl_work_load.`level_jabatan`
                , tbl_work_load.`atasan_1_jabatan_karyawan`
                , tbl_work_load.`atasan_2_jabatan_karyawan`
                , tbl_work_load.`no_jabatan_karyawan_atasan_1`
                , tbl_work_load.`no_jabatan_karyawan_atasan_2`
                , tbl_work_load.`status`
                , tbl_work_load.`status_mpp`
                , tbl_work_load.`keterangan`
                , tbl_work_load.`status_wla`
                , tbl_work_load.`status_jobdesc`
                , tbl_work_load.`status_kpi`
            FROM (SELECT 
                tbl_jabatan_karyawan.`no_jabatan_karyawan`
                , tbl_departement.`nama_departement`
                , tbl_departement.`kode_departement`
                , tbl_jabatan_karyawan.`jabatan_karyawan`
                , tbl_office.`tempat`
                , tbl_level_jabatan.`level_jabatan`
                , tbl_jabatan_karyawan.`mpp`
                , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
                , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
                , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
                , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
                , tbl_jabatan_karyawan.`status`
                , tbl_jabatan_karyawan.`status_mpp`
                , tbl_jabatan_karyawan.`keterangan`
                , tbl_jabatan_karyawan.`status_wla`
                , tbl_jabatan_karyawan.`status_jobdesc`
                , tbl_jabatan_karyawan.`status_kpi`
            FROM tbl_jabatan_karyawan
            INNER JOIN tbl_departement
                ON tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`
            INNER JOIN tbl_level_jabatan
                ON tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
            INNER JOIN tbl_office
                ON tbl_jabatan_karyawan.`area` = tbl_office.`office_id`
            INNER JOIN tbl_jabatan_karyawan_approval
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            WHERE (tbl_level_jabatan.`level_jabatan` <> 'Manager'
            AND tbl_level_jabatan.`level_jabatan` <> 'Assistant Manager'
            AND tbl_jabatan_karyawan.`status` = '0')
            AND tbl_departement.`nama_departement` = '$dept'
            -- AND tbl_jabatan_karyawan.`status` = '0' 
            ) tbl_work_load ) tbl_mpp_jabatan"
        );
        return $hsl;
    }

    function index_work_load_jabatan_manager($dept)
    {
        $hsl=$this->db2->query("SELECT 
                tbl_mpp_jabatan.`no_jabatan_karyawan`
                , tbl_mpp_jabatan.`nama_departement`
                , tbl_mpp_jabatan.`kode_departement`
                , tbl_mpp_jabatan.`jabatan_karyawan`
                , tbl_mpp_jabatan.`tempat`
                , tbl_mpp_jabatan.`MPP_WLA`
                , tbl_mpp_jabatan.`MPP_ACC`
                , tbl_mpp_jabatan.`DR`
                , tbl_mpp_jabatan.`MPP_ACT` - tbl_mpp_jabatan.`DR` AS MPA
                , tbl_mpp_jabatan.`MPP_ACC` - tbl_mpp_jabatan.`MPP_ACT` AS PTK
                , tbl_mpp_jabatan.`level_jabatan`
                , tbl_mpp_jabatan.`atasan_1_jabatan_karyawan`
                , tbl_mpp_jabatan.`atasan_2_jabatan_karyawan`
                , tbl_mpp_jabatan.`no_jabatan_karyawan_atasan_1`
                , tbl_mpp_jabatan.`no_jabatan_karyawan_atasan_2`
                , tbl_mpp_jabatan.`status`
                , tbl_mpp_jabatan.`status_mpp`
                , tbl_mpp_jabatan.`keterangan`
                , tbl_mpp_jabatan.`status_wla`
            FROM (SELECT
                tbl_work_load.`no_jabatan_karyawan`
                , tbl_work_load.`nama_departement`
                , tbl_work_load.`kode_departement`
                , tbl_work_load.`jabatan_karyawan`
                , tbl_work_load.`tempat`
                , (select 
                    tbl_mpp_jabatan.`MPP`
                from (select
                    tbl_work_load.`no_jabatan_karyawan`
                    , tbl_work_load.`nama_departement`
                    , tbl_work_load.`kode_departement`
                    , tbl_work_load.`jabatan_karyawan`
                    , tbl_work_load.`tempat`
                    , round(((select sum(absensi_new.`tbl_jabatan_analisa`.`jam`) * 25
                    from absensi_new.`tbl_jabatan_analisa`
                    where absensi_new.`tbl_jabatan_analisa`.`status` = '1'
                    and absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) +
                    
                    (SELECT SUM(absensi_new.`tbl_jabatan_analisa`.`jam`) * 4
                    FROM absensi_new.`tbl_jabatan_analisa`
                    WHERE absensi_new.`tbl_jabatan_analisa`.`status` = '2'
                    AND absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) +
                    
                    (SELECT SUM(absensi_new.`tbl_jabatan_analisa`.`jam`) * 1
                    FROM absensi_new.`tbl_jabatan_analisa`
                    WHERE absensi_new.`tbl_jabatan_analisa`.`status` = '3'
                    AND absensi_new.`tbl_jabatan_analisa`.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`)) / 176 ) as MPP
                    
                    , (SELECT COUNT(absensi_new.`tbl_karyawan_resign`.`nik_baru`)
                    FROM absensi_new.`tbl_karyawan_resign`
                    WHERE absensi_new.`tbl_karyawan_resign`.`jabatan` = tbl_work_load.`no_jabatan_karyawan`
                    AND absensi_new.`tbl_karyawan_resign`.`status_pengajuan` = '0') AS DR
                    
                    , (SELECT COUNT(absensi_new.`tbl_karyawan_struktur`.`nik_baru`)
                    FROM absensi_new.`tbl_karyawan_struktur`
                    WHERE absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = tbl_work_load.`no_jabatan_karyawan`
                    AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
                    AND (absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%.%'
                    and absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%12345%')) AS MPA
                    , tbl_work_load.`level_jabatan`
                    , tbl_work_load.`atasan_1_jabatan_karyawan`
                    , tbl_work_load.`atasan_2_jabatan_karyawan`
                    , tbl_work_load.`no_jabatan_karyawan_atasan_1`
                    , tbl_work_load.`no_jabatan_karyawan_atasan_2`
                    , tbl_work_load.`status`
                from (select 
                        tbl_jabatan_karyawan.`no_jabatan_karyawan`
                        , tbl_departement.`nama_departement`
                        , tbl_departement.`kode_departement`
                        , tbl_jabatan_karyawan.`jabatan_karyawan`
                        , tbl_office.`tempat`
                        , tbl_level_jabatan.`level_jabatan`
                        , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
                        , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
                        , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
                        , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
                        , tbl_jabatan_karyawan.`status`
                from tbl_jabatan_karyawan
                inner join tbl_departement
                    on tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`
                inner join tbl_level_jabatan
                    on tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
                inner join tbl_office
                    on tbl_jabatan_karyawan.`area` = tbl_office.`office_id`
                inner join tbl_jabatan_karyawan_approval
                    on tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
                where absensi_new.`tbl_jabatan_karyawan`.`area` = '1'
                and tbl_jabatan_karyawan.`status` = '0'
                ORDER BY absensi_new.`tbl_departement`.`kode_departement`, absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan` ASC) 
                tbl_work_load ) tbl_mpp_jabatan
                where tbl_mpp_jabatan.`no_jabatan_karyawan` = tbl_work_load.`no_jabatan_karyawan`) as MPP_WLA
                
                , tbl_work_load.`mpp` as MPP_ACC
                
                , (SELECT COUNT(absensi_new.`tbl_karyawan_resign`.`nik_baru`)
                FROM absensi_new.`tbl_karyawan_resign`
                WHERE absensi_new.`tbl_karyawan_resign`.`jabatan` = tbl_work_load.`no_jabatan_karyawan`
                AND absensi_new.`tbl_karyawan_resign`.`status_pengajuan` = '0') AS DR
                
                , (SELECT COUNT(absensi_new.`tbl_karyawan_struktur`.`nik_baru`)
                FROM absensi_new.`tbl_karyawan_struktur`
                WHERE absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = tbl_work_load.`no_jabatan_karyawan`
                AND absensi_new.`tbl_karyawan_struktur`.`status_karyawan` = '0'
                AND (absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%.%'
                AND absensi_new.`tbl_karyawan_struktur`.`nik_baru` NOT LIKE '%12345%')) AS MPP_ACT
                , tbl_work_load.`level_jabatan`
                , tbl_work_load.`atasan_1_jabatan_karyawan`
                , tbl_work_load.`atasan_2_jabatan_karyawan`
                , tbl_work_load.`no_jabatan_karyawan_atasan_1`
                , tbl_work_load.`no_jabatan_karyawan_atasan_2`
                , tbl_work_load.`status`
                , tbl_work_load.`status_mpp`
                , tbl_work_load.`keterangan`
                , tbl_work_load.`status_wla`
            FROM (SELECT 
                tbl_jabatan_karyawan.`no_jabatan_karyawan`
                , tbl_departement.`nama_departement`
                , tbl_departement.`kode_departement`
                , tbl_jabatan_karyawan.`jabatan_karyawan`
                , tbl_office.`tempat`
                , tbl_level_jabatan.`level_jabatan`
                , tbl_jabatan_karyawan.`mpp`
                , tbl_jabatan_karyawan.`atasan_1_jabatan_karyawan`
                , tbl_jabatan_karyawan.`atasan_2_jabatan_karyawan`
                , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`
                , tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`
                , tbl_jabatan_karyawan.`status`
                , tbl_jabatan_karyawan.`status_mpp`
                , tbl_jabatan_karyawan.`keterangan`
                , tbl_jabatan_karyawan.`status_wla`
            FROM tbl_jabatan_karyawan
            INNER JOIN tbl_departement
                ON tbl_jabatan_karyawan.`dept_jabatan_karyawan` = tbl_departement.`departement_id`
            INNER JOIN tbl_level_jabatan
                ON tbl_jabatan_karyawan.`level_jabatan_karyawan` = tbl_level_jabatan.`id_level_jabatan`
            INNER JOIN tbl_office
                ON tbl_jabatan_karyawan.`area` = tbl_office.`office_id`
            INNER JOIN tbl_jabatan_karyawan_approval
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            WHERE tbl_level_jabatan.`level_jabatan` <> 'Manager'
            AND tbl_departement.`nama_departement` = '$dept'
            AND tbl_jabatan_karyawan.`status` = '0' ) tbl_work_load ) tbl_mpp_jabatan"
        );
        return $hsl;
    }

    function edit_jabatan_ptk($id)
    {
        $hsl=$this->db2->query(" SELECT * FROM view_jabatan
            where view_jabatan.`no_jabatan_karyawan` = '$id'
        ");
        return $hsl;
    }

    function full_day_non_dn($nik_baru)
    {
        $hsl=$this->db2->query("SELECT *, absensi_new.`tbl_izin_full_day`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline FROM absensi_new.`tbl_izin_full_day`
            WHERE absensi_new.`tbl_izin_full_day`.`nik_full_day` = '$nik_baru'
            AND absensi_new.`tbl_izin_full_day`.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function non_full_day_non_dn($nik_baru)
    {
        $hsl=$this->db2->query("SELECT *, absensi_new.`tbl_izin_non_full`.`tanggal_pengajuan` + INTERVAL 1 DAY AS tanggal_deadline FROM absensi_new.`tbl_izin_non_full`
            WHERE absensi_new.`tbl_izin_non_full`.`nik_non_full` = '$nik_baru'
            AND absensi_new.`tbl_izin_non_full`.`jenis_non_full` <> 'DN'"
        );
        return $hsl;
    }

    function index_long_shift($nik_baru)
    {
        $hsl=$this->db2->query("SELECT
            tbl_long_shift.`id_long_shift`
            ,tbl_long_shift.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_struktur.`dept_struktur`
            ,tbl_long_shift.`tanggal`
            ,tbl_long_shift.`jam`
            ,tbl_long_shift.`keterangan`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_long_shift`
            ON tbl_long_shift.`jabatan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_long_shift.`nik_baru`
        WHERE tbl_long_shift.`nik_pengajuan` = '$nik_baru'"
        );
        return $hsl;
    }

    function view_karyawan_shift_pusat($jabatan) {
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
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function view_karyawan_shift_new($jabatan, $lokasi) {
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
                AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
                AND `tbl_karyawan_struktur`.`status_karyawan` = '0'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function index_cuti_tahunan_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_cuti_tahunan($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_cuti_tahunan_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')"
        );
        return $hsl;
    }

    function index_cuti_tahunan_approve_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_tahunan_approve_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_cuti_tahunan_not_approve_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_tahunan_hangus_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '3' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_tahunan_not_approve_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_cuti_tahunan_hangus_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '3' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    public function approve_cuti_tahunan_level1_pusat($jabatan)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    public function approve_cuti_tahunan_level1($jabatan, $lokasi)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    public function not_approve_cuti_tahunan_level1($jabatan, $lokasi)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    public function hangus_cuti_tahunan_level1($jabatan, $lokasi)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '3' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    public function not_approve_cuti_tahunan_level1_pusat($jabatan)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    public function hangus_cuti_tahunan_level1_pusat($jabatan)
    {
        $non_aktif = $this->db2->query("SELECT 
            COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '3' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` ");
        $total = $non_aktif->num_rows();
        return $total;
    }

    function index_cuti_tahunan_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
            , CASE 
                WHEN (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
                    AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_tahunan`
                ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            WHERE (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                )
                OR( 
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
                    AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                )
        ");
        return $hsl;
    }

    function index_cuti_tahunan_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
            , CASE 
                WHEN (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
                    AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_tahunan`
                ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            WHERE (
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                )
                OR( 
                    tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
                    AND tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                )
        ");
        return $hsl;
    }

    function index_cuti_tahunan_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_tahunan.`id_sisa_cuti`
            ,tbl_karyawan_cuti_tahunan.`no_pengajuan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_tahunan.`start_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`ket_tambahan_tahunan`
            ,tbl_karyawan_cuti_tahunan.`opsi_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`dok_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan`
            ,tbl_karyawan_cuti_tahunan.`status_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`tanggal_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`feedback_cuti_tahunan_2`
            ,tbl_karyawan_cuti_tahunan.`hak_cuti_utuh`
            , '1' AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '0' 
        AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
        OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair')
        AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        ");
        return $hsl;
    }

    function index_cuti_tahunan_approve_level2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function index_cuti_tahunan_approve_level2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *          
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            and tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' 
            and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function index_cuti_tahunan_not_approve_level2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function index_cuti_tahunan_not_approve_level2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            and tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' 
            and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function approve_cuti_tahunan_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
           COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '1' and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function not_approve_cuti_tahunan_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
           COUNT( * ) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_tahunan`
            ON tbl_karyawan_cuti_tahunan.`jabatan_cuti_tahunan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_tahunan.`nik_sisa_cuti`
        WHERE tbl_karyawan_cuti_tahunan.`status_cuti_tahunan` = '2' and (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            or tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_tahunan.`id_sisa_cuti` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_violance($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_historical_violance.`id_historical_violance`
            ,tbl_karyawan_historical_violance.`submit_date`
            ,tbl_karyawan_historical_violance.`user_submit`
            ,tbl_karyawan_historical_violance.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_struktur.`perusahaan_struktur`
            ,tbl_karyawan_historical_violance.`punishment_historical_violance`
            ,tbl_karyawan_historical_violance.`pelanggaran_historical_violance`
            ,tbl_karyawan_historical_violance.`tanggal_surat`
            ,tbl_karyawan_historical_violance.`warning_start_historical_violance`
            ,tbl_karyawan_historical_violance.`tanggal_notif`
            ,tbl_karyawan_historical_violance.`warning_end_historical_violance`
            ,tbl_karyawan_historical_violance.`warning_note_historical_violance`
            ,tbl_karyawan_historical_violance.`status_dokumen`
            ,tbl_karyawan_historical_violance.`dokumen_historical_violance`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_historical_violance`
            ON tbl_karyawan_historical_violance.`jabatan_historical_violance` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_historical_violance.`nik_baru`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND `tbl_karyawan_struktur`.`status_karyawan` = '0'"
        );
        return $hsl;
    }

    function index_violance_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_historical_violance.`id_historical_violance`
            ,tbl_karyawan_historical_violance.`submit_date`
            ,tbl_karyawan_historical_violance.`user_submit`
            ,tbl_karyawan_historical_violance.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_struktur.`perusahaan_struktur`
            ,tbl_karyawan_historical_violance.`punishment_historical_violance`
            ,tbl_karyawan_historical_violance.`pelanggaran_historical_violance`
            ,tbl_karyawan_historical_violance.`tanggal_surat`
            ,tbl_karyawan_historical_violance.`warning_start_historical_violance`
            ,tbl_karyawan_historical_violance.`tanggal_notif`
            ,tbl_karyawan_historical_violance.`warning_end_historical_violance`
            ,tbl_karyawan_historical_violance.`warning_note_historical_violance`
            ,tbl_karyawan_historical_violance.`status_dokumen`
            ,tbl_karyawan_historical_violance.`dokumen_historical_violance`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_historical_violance`
            ON tbl_karyawan_historical_violance.`jabatan_historical_violance` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_historical_violance.`nik_baru`
        WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND `tbl_karyawan_struktur`.`status_karyawan` = '0'"
        );
        return $hsl;
    }

    function index_dinas_full_day($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` = 'DN' "
        );
        return $hsl;
    }

    function index_dinas_full_day_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')
            AND tbl_izin_full_day.`jenis_full_day` = 'DN' "
        );
        return $hsl;
    }

    function index_full_day($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            ,tbl_izin_full_day.`upload_full_day`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_full_day_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            ,tbl_izin_full_day.`upload_full_day`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            ,tbl_izin_full_day.`upload_full_day`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_hangus_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '3' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_hangus_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '3' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_1_hangus($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_1_hangus($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_2_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') 
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_2_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') 
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_2_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_2_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_2_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_2_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_full_day_level_2_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_full_day_level_2_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
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
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'"
        );
        return $hsl;
    }

    function index_non_full_day_level_1_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
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
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
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
            AND tbl_izin_non_full.`jenis_non_full` = 'DN'"
        );
        return $hsl;
    }

    function index_non_full_day_level_1_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan' 
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN'"
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan' 
            AND tbl_izin_non_full.`jenis_non_full` = 'DN'"
        );
        return $hsl;
    }

    function index_non_full_day_level_1_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_1_hangus_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_hangus_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_1_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_1_hangus($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_1_hangus($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '3' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_2_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_2_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_2_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_2_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_2_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_2_not_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_day_level_2_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_day_level_2_not_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT *
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '2' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_full_day_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , CASE 
            WHEN (
                tbl_izin_full_day.`status_full_day` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
            ) THEN '1'
            WHEN (
                tbl_izin_full_day.`status_full_day` = '1' 
                AND tbl_izin_full_day.`status_full_day_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
            WHERE (
                tbl_izin_full_day.`status_full_day` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
            )
            OR( 
                tbl_izin_full_day.`status_full_day` = '1' 
                AND tbl_izin_full_day.`status_full_day_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
            )
        ");
        return $hsl;
    }

    function index_dinas_full_day_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , CASE 
            WHEN (
                tbl_izin_full_day.`status_full_day` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` = 'DN'
            ) THEN '1'
            WHEN (
                tbl_izin_full_day.`status_full_day` = '1' 
                AND tbl_izin_full_day.`status_full_day_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` = 'DN'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
            WHERE (
                tbl_izin_full_day.`status_full_day` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` = 'DN'
            )
            OR( 
                tbl_izin_full_day.`status_full_day` = '1' 
                AND tbl_izin_full_day.`status_full_day_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                AND tbl_izin_full_day.`jenis_full_day` = 'DN'
            )
        ");
        return $hsl;
    }

    function index_full_day_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , CASE 
                WHEN (
                    tbl_izin_full_day.`status_full_day` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_full_day.`status_full_day` = '1' 
                    AND tbl_izin_full_day.`status_full_day_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_full_day`
                ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
            WHERE (
                    tbl_izin_full_day.`status_full_day` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
                )
                OR( 
                    tbl_izin_full_day.`status_full_day` = '1' 
                    AND tbl_izin_full_day.`status_full_day_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
                )
        ");
        return $hsl;
    }

    function index_full_day_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , '1' AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_full_day`
            ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
        WHERE tbl_izin_full_day.`status_full_day` = '0' 
        AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
        OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair'
        OR tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation')
        AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        AND tbl_izin_full_day.`jenis_full_day` <> 'DN'
        ");
        return $hsl;
    }

    function index_dinas_full_day_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , CASE 
                WHEN (
                    tbl_izin_full_day.`status_full_day` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_full_day.`status_full_day` = '1' 
                    AND tbl_izin_full_day.`status_full_day_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_full_day`
                ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
            WHERE (
                    tbl_izin_full_day.`status_full_day` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
                )
                OR( 
                    tbl_izin_full_day.`status_full_day` = '1' 
                    AND tbl_izin_full_day.`status_full_day_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_full_day.`jenis_full_day` = 'DN'
                )
        ");
        return $hsl;
    }

    function index_dinas_full_day_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_full_day.`id_full_day`
            ,tbl_izin_full_day.`no_pengajuan_full_day`
            ,tbl_izin_full_day.`tanggal_pengajuan`
            ,tbl_izin_full_day.`nik_full_day`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_full_day.`jenis_full_day`
            ,tbl_izin_full_day.`start_full_day`
            ,tbl_izin_full_day.`karyawan_pengganti`
            ,tbl_izin_full_day.`ket_tambahan`
            ,tbl_izin_full_day.`status_full_day`
            ,tbl_izin_full_day.`feedback_full_day`
            ,tbl_izin_full_day.`tanggal_approval`
            ,tbl_izin_full_day.`status_full_day_2`
            ,tbl_izin_full_day.`feedback_full_day_2`
            ,tbl_izin_full_day.`tanggal_approval_2`
            , '1' AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_full_day`
                ON tbl_izin_full_day.`jabatan_full_day` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_full_day.`nik_full_day`
            WHERE tbl_izin_full_day.`status_full_day` = '0' 
            AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
            OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair'
            OR tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation')
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_izin_full_day.`jenis_full_day` = 'DN'
        ");
        return $hsl;
    }

    function index_non_full_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_non_full_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')
            and tbl_izin_non_full.`jenis_non_full` <> 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            and tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_dinas_non_full_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_izin_non_full`
            ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
        WHERE tbl_izin_non_full.`status_non_full` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')
            and tbl_izin_non_full.`jenis_non_full` = 'DN' "
        );
        return $hsl;
    }

    function index_non_full_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , CASE 
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                )
                OR( 
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                )
        ");
        return $hsl;
    }

    function index_dinas_non_full_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , CASE 
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                )
                OR( 
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                )
        ");
        return $hsl;
    }

    function index_non_full_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , CASE 
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                )
                OR( 
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                )
        ");
        return $hsl;
    }

    function index_non_full_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , '1' AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE  tbl_izin_non_full.`status_non_full` = '0' 
                AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
                OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair')
                AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                AND tbl_izin_non_full.`jenis_non_full` <> 'DN'
                
        ");
        return $hsl;
    }

    function index_dinas_non_full_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , CASE 
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                ) THEN '1'
                WHEN (
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE (
                    tbl_izin_non_full.`status_non_full` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                )
                OR( 
                    tbl_izin_non_full.`status_non_full` = '1' 
                    AND tbl_izin_non_full.`status_non_full_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                    AND tbl_izin_non_full.`jenis_non_full` = 'DN'
                )
        ");
        return $hsl;
    }

    function index_dinas_non_full_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_izin_non_full.`id_non_full`
            ,tbl_izin_non_full.`no_pengajuan_non_full`
            ,tbl_izin_non_full.`tanggal_pengajuan`
            ,tbl_izin_non_full.`nik_non_full`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_izin_non_full.`jenis_non_full`
            ,tbl_izin_non_full.`tanggal_non_full`
            ,tbl_izin_non_full.`ket_tambahan_non_full`
            ,tbl_izin_non_full.`status_non_full`
            ,tbl_izin_non_full.`tanggal_approval_non_full`
            ,tbl_izin_non_full.`feedback_non_full`
            ,tbl_izin_non_full.`status_non_full_2`
            ,tbl_izin_non_full.`tanggal_approval_non_full_2`
            ,tbl_izin_non_full.`feedback_non_full_2` 
            , '1' AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_izin_non_full`
                ON tbl_izin_non_full.`jabatan_non_full` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_izin_non_full.`nik_non_full`
            WHERE tbl_izin_non_full.`status_non_full` = '0' 
            AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
            OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair')
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND tbl_izin_non_full.`jenis_non_full` = 'DN'
        ");
        return $hsl;
    }

    function index_mutasi_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi`
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
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_penugasan`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_pjs`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_keterangan`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`nik_lama`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`status_pengajuan`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_historical_mutasi`
            ON tbl_karyawan_historical_mutasi.`jabatan_pengajuan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_historical_mutasi.`nik_pengajuan`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` b
            ON absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_awal` = b.`no_jabatan_karyawan`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` c
            ON absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_baru` = c.`no_jabatan_karyawan`
            INNER JOIN absensi_new.`tbl_level_jabatan` d
            ON b.`level_jabatan_karyawan` = d.`id_level_jabatan`
            INNER JOIN absensi_new.`tbl_level_jabatan` e
            ON c.`level_jabatan_karyawan` = e.`id_level_jabatan`
            WHERE (
                tbl_karyawan_historical_mutasi.`status_atasan` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            )
            OR( 
                tbl_karyawan_historical_mutasi.`status_atasan` = '1' 
                AND tbl_karyawan_historical_mutasi.`status_atasan` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            )
        ");
        return $hsl;
    }

    function index_mutasi_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            absensi_new.`tbl_karyawan_historical_mutasi`.`id_mutasi_rotasi`
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
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_penugasan`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_pjs`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`dokumen_keterangan`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`nik_lama`
            , absensi_new.`tbl_karyawan_historical_mutasi`.`status_pengajuan`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_historical_mutasi`
            ON tbl_karyawan_historical_mutasi.`jabatan_pengajuan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_historical_mutasi.`nik_pengajuan`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` b
            ON absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_awal` = b.`no_jabatan_karyawan`
            INNER JOIN absensi_new.`tbl_jabatan_karyawan` c
            ON absensi_new.`tbl_karyawan_historical_mutasi`.`jabatan_baru` = c.`no_jabatan_karyawan`
            INNER JOIN absensi_new.`tbl_level_jabatan` d
            ON b.`level_jabatan_karyawan` = d.`id_level_jabatan`
            INNER JOIN absensi_new.`tbl_level_jabatan` e
            ON c.`level_jabatan_karyawan` = e.`id_level_jabatan`
            WHERE (
                tbl_karyawan_historical_mutasi.`status_atasan` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            )
            OR( 
                tbl_karyawan_historical_mutasi.`status_atasan` = '1' 
                AND tbl_karyawan_historical_mutasi.`status_atasan` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            )
        ");
        return $hsl;
    }

    function index_cuti_khusus_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (SELECT
            absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            FROM absensi_new.`tbl_karyawan_cuti_khusus`
            WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            AND absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ORDER BY absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` DESC
            LIMIT 0,1) AS end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
        FROM (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
        AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
        OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus` ) tbl_fix_cuti_khusus"
        );
        return $hsl;
    }

    function index_cuti_khusus($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (SELECT
            absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            FROM absensi_new.`tbl_karyawan_cuti_khusus`
            WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            AND absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ORDER BY absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` DESC
            LIMIT 0,1) AS end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
        FROM (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
        AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
        OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus` ) tbl_fix_cuti_khusus"
        );
        return $hsl;
    }

    function index_cuti_khusus_case($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (SELECT
            absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            FROM absensi_new.`tbl_karyawan_cuti_khusus`
            WHERE absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            AND absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ORDER BY absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` DESC
            LIMIT 0,1) AS end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
        FROM (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
        AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='306' 
        OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='306')
        GROUP BY tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus` ) tbl_fix_cuti_khusus"
        );
        return $hsl;
    }

    function index_cuti_khusus_approve_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_khusus_approve_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function approve_cuti_khusus_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function approve_cuti_khusus_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_cuti_khusus_not_approve_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_khusus_hangus_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '3' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
        );
        return $hsl;
    }

    function index_cuti_khusus_hangus_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '3' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_approve_cuti_khusus_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_khusus`
                ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            WHERE (tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' OR tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '1') 
                AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        ");
        return $hsl;
    }

    function index_cuti_khusus_not_approve_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function not_approve_cuti_khusus_level1($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function not_approve_cuti_khusus_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function hangus_cuti_khusus_level1($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '3' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function hangus_cuti_khusus_level1_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '3' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_cuti_khusus_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("select
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (select
                absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            from absensi_new.`tbl_karyawan_cuti_khusus`
            where absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            and absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            order by absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` desc
            limit 0,1) as end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`level_role`
        from (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            , CASE 
                WHEN (
                tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            ) THEN '1'
                WHEN (
                tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
                AND tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_cuti_khusus
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE (
            tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
        )
        OR( 
            tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            AND tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        ) 
        group by tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus`) tbl_fix_cuti_khusus
        ");
        return $hsl;
    }

    function index_cuti_khusus_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("select
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (select
                absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            from absensi_new.`tbl_karyawan_cuti_khusus`
            where absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            and absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            order by absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` desc
            limit 0,1) as end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`level_role`
        from (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            , CASE 
                WHEN (
                tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            ) THEN '1'
                WHEN (
                tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
                AND tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '0' 
                AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_cuti_khusus
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE (
            tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        )
        OR( 
            tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            AND tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        ) 
        group by tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus`) tbl_fix_cuti_khusus
        ");
        return $hsl;
    }

    function index_cuti_khusus_level_2_case($lokasi)
    {
        $hsl=$this->db2->query("select
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (select
                absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            from absensi_new.`tbl_karyawan_cuti_khusus`
            where absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            and absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            order by absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` desc
            limit 0,1) as end_cuti_khusus
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`level_role`
        from (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            , '1' AS `level_role`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_cuti_khusus
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '0' 
        AND (tbl_karyawan_struktur.`dept_struktur` = 'Sales Operation'
        OR tbl_karyawan_struktur.`dept_struktur` = 'General Affair')
        AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        group by tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus`) tbl_fix_cuti_khusus
        ");
        return $hsl;
    }

    function index_approve_cuti_khusus_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1' 
            OR tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '1') 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
        ");
        return $hsl;
    }

    function approve_cuti_khusus_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_khusus`
                ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '1'
                AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_not_approve_cuti_khusus_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_cuti_khusus`
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        WHERE (tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' 
            OR tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '2') 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function index_not_approve_cuti_khusus_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
                tbl_karyawan_cuti_khusus.`id_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
                ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
                ,tbl_karyawan_struktur.`nama_karyawan_struktur`
                ,tbl_jabatan_karyawan.`jabatan_karyawan`
                ,tbl_karyawan_struktur.`lokasi_hrd`
                ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`kondisi`
                ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`end_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
                ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
                ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
                ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
                ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_khusus`
                ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            WHERE tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                AND (tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2' 
                OR tbl_karyawan_cuti_khusus.`status_cuti_khusus_2` = '2') 
                AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function not_approve_cuti_khusus_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_cuti_khusus`
                ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            WHERE tbl_karyawan_cuti_khusus.`status_cuti_khusus` = '2'
                AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                    OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            GROUP BY tbl_karyawan_cuti_khusus.`id_cuti_khusus` "
        );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_manual_absen_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`tanggal_pengajuan`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
                );
        return $hsl;
    }

    function index_manual_absen($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`tanggal_pengajuan`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '0' 
            and tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
                );
        return $hsl;
    }

    function index_manual_absen_approve_level1($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '1' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
                );
        return $hsl;
    }

    function approve_manual_absen_approve_level1($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '1' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            GROUP BY tbl_karyawan_absen_manual.`id_absen`"
            );
        $total = $hsl->num_rows();
        return $total;
    }

    function not_approve_manual_absen_approve_level1($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            GROUP BY tbl_karyawan_absen_manual.`id_absen`"
            );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_manual_absen_not_approve_level1($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status` = '2' AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'"
                );
        return $hsl;
    }

    function index_manual_absen_level_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`tanggal_pengajuan`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
            , CASE 
                WHEN (
                    tbl_karyawan_absen_manual.`status` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                    tbl_karyawan_absen_manual.`status` = '1' 
                    AND tbl_karyawan_absen_manual.`status_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_absen_manual`
                ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
            WHERE (
                    tbl_karyawan_absen_manual.`status` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                )
                OR( 
                    tbl_karyawan_absen_manual.`status` = '1' 
                    AND tbl_karyawan_absen_manual.`status_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                )   
        ");
        return $hsl;
    }

    function index_manual_absen_level_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`tanggal_pengajuan`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
            , CASE 
                WHEN (
                    tbl_karyawan_absen_manual.`status` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                ) THEN '1'
                WHEN (
                    tbl_karyawan_absen_manual.`status` = '1' 
                    AND tbl_karyawan_absen_manual.`status_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                ) THEN '2'
                ELSE '0'
            END AS `level_role`
            FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
            INNER JOIN `tbl_jabatan_karyawan` 
                ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_absen_manual`
                ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
            INNER JOIN `tbl_karyawan_struktur`
                ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
            WHERE (
                    tbl_karyawan_absen_manual.`status` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                )
                OR( 
                    tbl_karyawan_absen_manual.`status` = '1' 
                    AND tbl_karyawan_absen_manual.`status_2` = '0' 
                    AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
                    AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
                )   
        ");
        return $hsl;
    }

    function index_approve_manual_absen_level_2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status_2` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function manual_absen_approve_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status_2` = '1' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            GROUP BY tbl_karyawan_absen_manual.`id_absen`"
            );
        $total = $hsl->num_rows();
        return $total;
    }

    function manual_absen_not_approve_level2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            COUNT(*) AS total
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen`
        WHERE tbl_karyawan_absen_manual.`status_2` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            GROUP BY tbl_karyawan_absen_manual.`id_absen`"
            );
        $total = $hsl->num_rows();
        return $total;
    }

    function index_not_approve_manual_absen_level_2($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_absen_manual.`id_absen`
            ,tbl_karyawan_absen_manual.`nik_absen`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_absen_manual.`jenis_absen`
            ,tbl_karyawan_absen_manual.`tanggal_absen`
            ,tbl_karyawan_absen_manual.`waktu_absen`
            ,tbl_karyawan_absen_manual.`ket_absen`
            ,tbl_karyawan_absen_manual.`status`
            ,tbl_karyawan_absen_manual.`tanggal`
            ,tbl_karyawan_absen_manual.`status_2`
            ,tbl_karyawan_absen_manual.`tanggal_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_absen_manual`
            ON tbl_karyawan_absen_manual.`jabatan_absen` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_absen_manual.`nik_absen` 
        WHERE tbl_karyawan_absen_manual.`status_2` = '2' AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan') "
        );
        return $hsl;
    }

    function absensi_spv_crl($jabatan) {
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
            WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
                OR `tbl_karyawan_struktur`.`jabatan_hrd` = '$jabatan'
                AND `tbl_karyawan_struktur`.`status_karyawan` = '0'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function absensi_am_cm($jabatan) {
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
            WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
                OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            OR `tbl_karyawan_struktur`.`jabatan_hrd` = '$jabatan'
            OR `tbl_karyawan_struktur`.`jabatan_hrd` = '222'
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function izin_manual_absen($id)
    {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_struktur ks');
        $this->db2->join('tbl_karyawan_absen_manual kam', 'ks.`nik_baru` = kam.`nik_absen`', 'inner');
        $this->db2->join('tbl_jabatan_karyawan jk', 'kam.`jabatan_absen` = jk.`no_jabatan_karyawan`', 'inner');
        $this->db2->where('kam.`id_absen`', $id);

        $get = $this->db2->get();
        return $get;
    }

    function karyawan_backup_security($lokasi) {
        $sql = "
            SELECT 
                kb.`id_karyawan_backup`
                , kb.`tanggal_pengajuan`
                , kb.`nik_karyawan_pengajuan`
                , kb.`nik_baru`
                , ks.`lokasi_hrd`
                , kb.`nama_backup`
                , kb.`alamat_backup`
                , kb.`no_ktp_backup`
                , kb.`no_telp_backup`
                , kb.`tanggal_backup`
                , kb.`in`
                , kb.`nik_in`
                , s.`waktu_masuk`
                , kb.`out`
                , kb.`nik_out`
                , s.`waktu_keluar`
                , kb.`upload_dokumen`
            FROM tbl_karyawan_backup kb
            INNER JOIN tbl_karyawan_struktur ks
                ON ks.`nik_baru` = kb.`nik_baru`
            INNER JOIN tbl_shifting s
                ON kb.`jam_kerja` = s.`id_shifting`
            WHERE (kb.in IS NULL 
            OR kb.out IS NULL)
            AND ks.`lokasi_hrd` = '$lokasi'
            ORDER BY kb.`tanggal_backup` DESC
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function pengajuan_resign($id)
    {
        $this->db2->select('absensi_new.`tbl_karyawan_resign`.`id`
            , absensi_new.`tbl_karyawan_resign`.`submit_date`
            , absensi_new.`tbl_karyawan_resign`.`no_pengajuan`
            , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
            , absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
            , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
            , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
            , absensi_new.`tbl_karyawan_resign`.`tanggal_pengajuan`
            , absensi_new.`tbl_karyawan_resign`.`tanggal_efektif_resign`
            , absensi_new.`tbl_karyawan_resign`.`alasan_resign`
            , absensi_new.`tbl_karyawan_resign`.`klarifikasi_resign`
            , absensi_new.`tbl_karyawan_resign`.`ket_resign`
            , absensi_new.`tbl_karyawan_resign`.`status_atasan`
            , absensi_new.`tbl_karyawan_resign`.`tanggal`
            , absensi_new.`tbl_karyawan_resign`.`status_atasan_2`
            , absensi_new.`tbl_karyawan_resign`.`tanggal_2`');
        $this->db2->from('absensi_new.`tbl_karyawan_resign`');
        $this->db2->join('absensi_new.`tbl_karyawan_struktur`', 'absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_resign`.`nik_baru`', 'left');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 'absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_resign`.`jabatan`', 'left');
        $this->db2->where('absensi_new.`tbl_karyawan_resign`.`id`', $id);

        $get = $this->db2->get();
        return $get;
    }

    function izin_full_day($id)
    {
        $this->db2->select('*');
        $this->db2->from('absensi_new.`tbl_izin_full_day`');
        $this->db2->join('absensi_new.`tbl_karyawan_struktur`', 'absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_izin_full_day`.`nik_full_day`', 'inner');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 'absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd` = absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan`', 'inner');
        $this->db2->join('absensi_new.`tbl_departement`', 'absensi_new.`tbl_karyawan_struktur`.`dept_struktur` = absensi_new.`tbl_departement`.`nama_departement`', 'left');
        $this->db2->where('absensi_new.`tbl_izin_full_day`.`id_full_day`', $id);

        $get = $this->db2->get();
        return $get;
    }

    function izin_non_full_day($id)
    {
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_struktur ks');
        $this->db2->join('tbl_izin_non_full nf', 'ks.`nik_baru` = nf.`nik_non_full`', 'inner');
        $this->db2->where('nf.`id_non_full`', $id);

        $get = $this->db2->get();
        return $get;
    }

    function izin_cuti_khusus($id)
    {
        $hsl=$this->db2->query("select
            tbl_fix_cuti_khusus.`id_cuti_khusus`
            ,tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_pengajuan`
            ,tbl_fix_cuti_khusus.`nik_cuti_khusus`
            ,tbl_fix_cuti_khusus.`nama_karyawan_struktur`
            ,tbl_fix_cuti_khusus.`jabatan_karyawan`
            ,tbl_fix_cuti_khusus.`lokasi_hrd`
            ,tbl_fix_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_fix_cuti_khusus.`kondisi`
            ,tbl_fix_cuti_khusus.`start_cuti_khusus`
            , (select
                absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus`
            from absensi_new.`tbl_karyawan_cuti_khusus`
            where absensi_new.`tbl_karyawan_cuti_khusus`.`no_pengajuan_khusus` = tbl_fix_cuti_khusus.`no_pengajuan_khusus`
            and absensi_new.`tbl_karyawan_cuti_khusus`.`nik_cuti_khusus` = tbl_fix_cuti_khusus.`nik_cuti_khusus`
            order by absensi_new.`tbl_karyawan_cuti_khusus`.`start_cuti_khusus` desc
            limit 0,1) as end_cuti_khusus
            , (SELECT absensi_new.`tbl_cuti_khusus`.`hari_cuti_khusus`
            FROM absensi_new.`tbl_cuti_khusus`
            WHERE absensi_new.`tbl_cuti_khusus`.`kondisi_cuti_khusus` = tbl_fix_cuti_khusus.`kondisi`) AS jumlah_hari
            ,tbl_fix_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_fix_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_fix_cuti_khusus.`feedback_cuti_khusus_2`
        from (SELECT
            tbl_karyawan_cuti_khusus.`id_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_pengajuan`
            ,tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_cuti_khusus.`jenis_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`kondisi`
            ,tbl_karyawan_cuti_khusus.`start_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`ket_tambahan_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus`
            ,tbl_karyawan_cuti_khusus.`status_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`tanggal_approval_cuti_khusus_2`
            ,tbl_karyawan_cuti_khusus.`feedback_cuti_khusus_2`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_cuti_khusus
            ON tbl_karyawan_cuti_khusus.`jabatan_cuti_khusus` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_cuti_khusus.`nik_cuti_khusus`
        where tbl_karyawan_cuti_khusus.`id_cuti_khusus` = '$id'
        group by tbl_karyawan_cuti_khusus.`no_pengajuan_khusus`, tbl_karyawan_cuti_khusus.`nik_cuti_khusus`) tbl_fix_cuti_khusus
        ");
        return $hsl;
    }

    function izin_cuti_tahunan($id)
    {
        $tahun = date('Y') - 1;
        $this->db2->select('*');
        $this->db2->from('tbl_karyawan_struktur ks');
        $this->db2->join('tbl_karyawan_cuti_tahunan kct', 'ks.`nik_baru` = kct.`nik_sisa_cuti`', 'inner');
        $this->db2->join('tbl_hak_cuti hc', 'ks.`nik_baru` = hc.`nik_sisa_cuti`', 'inner');
        $this->db2->where('kct.`id_sisa_cuti`', $id);
        $this->db2->where('hc.`tahun`', $tahun);

        $get = $this->db2->get();
        return $get;
    }

    function izin_mutasi_rotasi($id)
    {
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
        $this->db2->where('absensi_new.`tbl_karyawan_historical_mutasi`.id_mutasi_rotasi', $id);
        $this->db2->group_by('absensi_new.`tbl_karyawan_historical_mutasi`.`no_pengajuan`');

        $get = $this->db2->get();
        return $get;
    }

    function data_detail_jabatan()
    {
        $this->db2->select('*');
        $this->db2->from('absensi_new.`tbl_jabatan_karyawan` a');
        $this->db2->join('absensi_new.`tbl_office` b', 'a.`area` = b.`office_id`', 'inner');
        $this->db2->where("a.`status` = '0'");

        $get = $this->db2->get();
        return $get;
    }

    function data_jabatan()
    {
        return $this->db2->get('tbl_jabatan_karyawan');
    }
    
    function data_jam_kerja()
    {
        return $this->db2->get('tbl_shifting');
    }

    function data_divisi()
    {
        return $this->db2->get('tbl_divisi');
    }

    function data_pengalaman_kerja()
    {
        return $this->db2->get('tmp_pengalaman_kerja');
    }

    function data_depo()
    {
        return $this->db2->get('tbl_depo');
    }

    function data_departement()
    {
        return $this->db2->get('tbl_departement');
    }

    function data_level_jabatan()
    {
        return $this->db2->get('tbl_level_jabatan');
    }

    function data_hobi()
    {
        return $this->db2->get('tbl_hobi');
    }

    function tempat()
    {
        return $this->db2->get('tbl_office');
    }

    function golongan()
    {
        return $this->db2->get('tbl_golongan');
    }

    function perusahaan()
    {
        return $this->db2->get('tbl_perusahaan');
    }

    function coba()
    {
        return $this->db2->get('tbl_karyawan_detail');
    }

    function induk()
    {
        return $this->db2->get('tbl_karyawan_induk');
    }

    function jenis_seragam()
    {
        return $this->db2->get('tbl_seragam');
    }

    function alasan_resign()
    {
        return $this->db2->get('tbl_alasan_resign');
    }

    function nama_lembaga()
    {
        return $this->db2->get('tbl_upload_dokumen');
    }

    function cuti_khusus()
    {
        return $this->db2->get('tbl_cuti_khusus');
    }

    function data_karyawan()
    {
        return $this->db2->get('tbl_karyawan_struktur');
    }

    function data_aplikasi()
    {
        return $this->db2->get('tbl_log_support_aplikasi');
    }

    function data_kategori()
    {
        return $this->db2->get('tbl_log_support_kategori');
    }

    function get_data(){
        $query = $this->db->query("SELECT * FROM auth_user");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function surat_teguran(){
        $query = $this->db2->query("SELECT * FROM `tbl_karyawan_jenis_pelanggaran` WHERE `type_pelanggaran` = 'Surat Teguran'");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function pengajuan_resign_alasan(){
        $hsl=$this->db2->query("SELECT * FROM `tbl_alasan_resign` WHERE `id_alasan_resign` >= '3'"
                );
        return $hsl;
    }

    function pindah_karyawan_lembur(){
        $hsl=$this->db2->query("INSERT INTO tbl_karyawan_lembur 
            (tbl_karyawan_lembur.`nik_lembur`
            , tbl_karyawan_lembur.`nama_karyawan_lembur`
            , tbl_karyawan_lembur.`jabatan_karyawan_lembur`
            , tbl_karyawan_lembur.`dept_karyawan_lembur`
            , tbl_karyawan_lembur.`lokasi_karyawan_lembur`
            , tbl_karyawan_lembur.`jam_kerja`
            , tbl_karyawan_lembur.`tanggal_lembur`
            , tbl_karyawan_lembur.`keterangan_lembur`
            , tbl_karyawan_lembur.`no_co_lembur`) 
        SELECT tmp_karyawan_shift.`nik_shift`
            , tmp_karyawan_shift.`nama_karyawan_shift`
            , tmp_karyawan_shift.`jabatan_karyawan_shift`
            , tmp_karyawan_shift.`dept_karyawan_shift`
            , tmp_karyawan_shift.`lokasi_karyawan_shift`
            , tmp_karyawan_shift.`jam_kerja`
            , tmp_karyawan_shift.`tanggal_shift`
            , tmp_karyawan_shift.`keterangan_shift`
            , tmp_karyawan_shift.`no_co_shift`
        FROM tmp_karyawan_shift WHERE tmp_karyawan_shift.`jabatan_karyawan_shift` = 'Admin SPV'"
                );
        return $hsl;
    }

    function pindah_pengalaman_kerja(){
        $hsl=$this->db2->query("INSERT INTO tbl_karyawan_pengalaman_kerja (nik_baru, nama_perusahaan, jabatan_awal, jabatan_awal_start, jabatan_awal_end, jabatan_akhir, jabatan_akhir_start, jabatan_akhir_end, tahun_keluar, alasan_keluar, gaji_terakhir, no_telp_perusahaan, nama_atasan, nama_referensi, no_kontak_referensi, upload_paklaring) SELECT nik_baru, nama_perusahaan, jabatan_awal, jabatan_awal_start, jabatan_awal_end, jabatan_akhir, jabatan_akhir_start, jabatan_akhir_end, tahun_keluar, alasan_keluar, gaji_terakhir, no_telp_perusahaan, nama_atasan, nama_referensi, no_kontak_referensi, upload_paklaring FROM tmp_pengalaman_kerja"
        );
        return $hsl;
    }

    function pindah_karyawan_shift(){
        $hsl=$this->db2->query("INSERT INTO tbl_karyawan_shift (nik_shift, nama_karyawan_shift, jabatan_karyawan_shift, dept_karyawan_shift, jam_kerja, start_periode, end_periode, tanggal_shift) SELECT nik_shift, nama_karyawan_shift, jabatan_karyawan_shift, dept_karyawan_shift, jam_kerja, start_periode, end_periode, tanggal_shift FROM tmp_karyawan_shift"
        );
        return $hsl;
    }

    function hapus_pengalaman_kerja() {
        $this->db2->truncate('tmp_pengalaman_kerja');
        return true;
    }

    function get_no_pengajuan_ptk(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_ptk WHERE id");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_surat_keterangan(){
        $q = $this->db2->query("SELECT SUBSTRING(no_urut, 1) AS kd_max FROM tbl_karyawan_sk WHERE id");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_full_day(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan_full_day, 1) AS kd_max FROM tbl_izin_full_day WHERE id_full_day");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_non_full(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan_non_full, 1) AS kd_max FROM tbl_izin_non_full WHERE id_non_full");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_historical_mutasi WHERE id_mutasi_rotasi
            ORDER BY no_pengajuan ASC");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_cuti_khusus(){
        $q = $this->db2->query("SELECT SUBSTRING(`no_pengajuan_khusus`, 1) AS kd_max FROM tbl_karyawan_cuti_khusus WHERE `id_cuti_khusus`");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_cuti_tahunan(){
        $q = $this->db2->query("SELECT SUBSTRING(`no_pengajuan_tahunan`, 1) AS kd_max FROM tbl_karyawan_cuti_tahunan WHERE `id_sisa_cuti`");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_seragam(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_seragam WHERE id_karyawan_seragam");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_seragam_kembali(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_seragam_kembali WHERE id");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_resign(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_resign WHERE id");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_pengajuan_refund(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 1) AS kd_max FROM tbl_karyawan_refund WHERE id");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function get_no_far_piutang(){
        $q = $this->db2->query("SELECT SUBSTRING(no_pengajuan, 13) AS kd_max FROM `tbl_piutang_far` WHERE no_pengajuan LIKE '%FAR-PIUTANG-%' ORDER BY id ASC");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function cuti_khusus_direncanakan(){
        $hsl=$this->db2->query("SELECT * FROM `tbl_cuti_khusus` WHERE `keterangan_cuti_khusus` = 'Tidak Direncanakan'"
        );
        return $hsl;
    }

    function cuti_khusus_tidak_direncanakan(){
        $hsl=$this->db2->query("SELECT * FROM `tbl_cuti_khusus` WHERE `keterangan_cuti_khusus` = 'Direncanakan'"
        );
        return $hsl;
    }

    function historical_absen($nik_baru) {
        $sql = "
            SELECT
            (SELECT 
                COUNT(`ket_absensi`)
            FROM (SELECT
                tbl_final.`shift_day`
                , tbl_final.`badgenumber`
                , tbl_final.`name`
                , tbl_final.`jabatan_karyawan`
                , tbl_final.`lokasi_hrd`
                , tbl_final.`dept_struktur`
                , tbl_final.`join_date_struktur`
                , tbl_final.minimum_in
                , tbl_final.f1 AS `F1`
                , tbl_final.waktu_masuk
                , tbl_final.waktu_keluar
                , tbl_final.f4 AS `F4`
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
                WHEN tbl_final.`shift_day` BETWEEN '2020-04-21'
                        AND (SELECT absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` FROM absensi_new.`tbl_karyawan_struktur`
                        WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru' 
                        AND absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` >= '2020-04-21')
                        THEN 'NEW'
                        WHEN tbl_final.`shift_day` BETWEEN (SELECT absensi_new.`tbl_resign`.`tanggal_efektif_resign` FROM absensi_new.`tbl_resign`
                        WHERE absensi_new.`tbl_resign`.`nik_resign` = '$nik_baru' 
                        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '2020-04-21') AND '2020-05-21'
                        THEN 'RESIGN'
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
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '00:00:01'
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '08:00:00'
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
                        WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '9' 
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
                        , absensi_new.`events`.`birth_date`
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
                    LEFT JOIN absensi_new.`events`
                    ON absensi_new.`events`.`birth_date` = absensi_new.`tarikan_absen_adms`.`shift_day`
                    WHERE absensi_new.`tarikan_absen_adms`.`shift_day` >= (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))
                    AND absensi_new.`tarikan_absen_adms`.`shift_day` <= CURDATE()
                    AND absensi_new.`tarikan_absen_adms`.`badgenumber` = '$nik_baru'
                    ) tbl_final
                ) tbl_final_absen
                where ket_absensi = 'LI'
                GROUP BY tbl_final_absen.`badgenumber`, tbl_final_absen.`ket_absensi`) AS alpha
            ,
            (SELECT 
                COUNT(`ket_absensi`)
            FROM (SELECT
                tbl_final.`shift_day`
                , tbl_final.`badgenumber`
                , tbl_final.`name`
                , tbl_final.`jabatan_karyawan`
                , tbl_final.`lokasi_hrd`
                , tbl_final.`dept_struktur`
                , tbl_final.`join_date_struktur`
                , tbl_final.minimum_in
                , tbl_final.f1 AS `F1`
                , tbl_final.waktu_masuk
                , tbl_final.waktu_keluar
                , tbl_final.f4 AS `F4`
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
                WHEN tbl_final.`shift_day` BETWEEN '2020-04-21'
                        AND (SELECT absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` FROM absensi_new.`tbl_karyawan_struktur`
                        WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru' 
                        AND absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` >= '2020-04-21')
                        THEN 'NEW'
                        WHEN tbl_final.`shift_day` BETWEEN (SELECT absensi_new.`tbl_resign`.`tanggal_efektif_resign` FROM absensi_new.`tbl_resign`
                        WHERE absensi_new.`tbl_resign`.`nik_resign` = '$nik_baru' 
                        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '2020-04-21') AND '2020-05-21'
                        THEN 'RESIGN'
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
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '00:00:01'
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '08:00:00'
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
                        WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '9' 
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
                        , absensi_new.`events`.`birth_date`
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
                    LEFT JOIN absensi_new.`events`
                    ON absensi_new.`events`.`birth_date` = absensi_new.`tarikan_absen_adms`.`shift_day`
                    WHERE absensi_new.`tarikan_absen_adms`.`shift_day` >= (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))
                    AND absensi_new.`tarikan_absen_adms`.`shift_day` <= CURDATE()
                    AND absensi_new.`tarikan_absen_adms`.`badgenumber` = '$nik_baru'
                    ) tbl_final
                ) tbl_final_absen
                where ket_absensi = 'SA'
                GROUP BY tbl_final_absen.`badgenumber`, tbl_final_absen.`ket_absensi`) AS sakit
            ,
            (SELECT 
                COUNT(`ket_absensi`)
            FROM (SELECT
                tbl_final.`shift_day`
                , tbl_final.`badgenumber`
                , tbl_final.`name`
                , tbl_final.`jabatan_karyawan`
                , tbl_final.`lokasi_hrd`
                , tbl_final.`dept_struktur`
                , tbl_final.`join_date_struktur`
                , tbl_final.minimum_in
                , tbl_final.f1 AS `F1`
                , tbl_final.waktu_masuk
                , tbl_final.waktu_keluar
                , tbl_final.f4 AS `F4`
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
                WHEN tbl_final.`shift_day` BETWEEN '2020-04-21'
                        AND (SELECT absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` FROM absensi_new.`tbl_karyawan_struktur`
                        WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru' 
                        AND absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` >= '2020-04-21')
                        THEN 'NEW'
                        WHEN tbl_final.`shift_day` BETWEEN (SELECT absensi_new.`tbl_resign`.`tanggal_efektif_resign` FROM absensi_new.`tbl_resign`
                        WHERE absensi_new.`tbl_resign`.`nik_resign` = '$nik_baru' 
                        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '2020-04-21') AND '2020-05-21'
                        THEN 'RESIGN'
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
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '00:00:01'
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '08:00:00'
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
                        WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '9' 
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
                        , absensi_new.`events`.`birth_date`
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
                    LEFT JOIN absensi_new.`events`
                    ON absensi_new.`events`.`birth_date` = absensi_new.`tarikan_absen_adms`.`shift_day`
                    WHERE absensi_new.`tarikan_absen_adms`.`shift_day` >= (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))
                    AND absensi_new.`tarikan_absen_adms`.`shift_day` <= CURDATE()
                    AND absensi_new.`tarikan_absen_adms`.`badgenumber` = '$nik_baru'
                    ) tbl_final
                ) tbl_final_absen
                where ket_absensi = 'CD'
                GROUP BY tbl_final_absen.`badgenumber`, tbl_final_absen.`ket_absensi`) AS cdt
            ,
            (SELECT 
                COUNT(`ket_absensi`)
            FROM (SELECT
                tbl_final.`shift_day`
                , tbl_final.`badgenumber`
                , tbl_final.`name`
                , tbl_final.`jabatan_karyawan`
                , tbl_final.`lokasi_hrd`
                , tbl_final.`dept_struktur`
                , tbl_final.`join_date_struktur`
                , tbl_final.minimum_in
                , tbl_final.f1 AS `F1`
                , tbl_final.waktu_masuk
                , tbl_final.waktu_keluar
                , tbl_final.f4 AS `F4`
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
                WHEN tbl_final.`shift_day` BETWEEN '2020-04-21'
                        AND (SELECT absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` FROM absensi_new.`tbl_karyawan_struktur`
                        WHERE absensi_new.`tbl_karyawan_struktur`.`nik_baru` = '$nik_baru' 
                        AND absensi_new.`tbl_karyawan_struktur`.`join_date_struktur` >= '2020-04-21')
                        THEN 'NEW'
                        WHEN tbl_final.`shift_day` BETWEEN (SELECT absensi_new.`tbl_resign`.`tanggal_efektif_resign` FROM absensi_new.`tbl_resign`
                        WHERE absensi_new.`tbl_resign`.`nik_resign` = '$nik_baru' 
                        AND absensi_new.`tbl_resign`.`tanggal_efektif_resign` >= '2020-04-21') AND '2020-05-21'
                        THEN 'RESIGN'
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
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` >= '00:00:01'
                        AND absensi_new.`tarikan_absen_adms`.`out_manual` <= '08:00:00'
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
                        WHEN absensi_new.`tarikan_absen_adms`.`waktu_shift` = '9' 
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
                        , absensi_new.`events`.`birth_date`
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
                    LEFT JOIN absensi_new.`events`
                    ON absensi_new.`events`.`birth_date` = absensi_new.`tarikan_absen_adms`.`shift_day`
                    WHERE absensi_new.`tarikan_absen_adms`.`shift_day` >= (DATE_SUB(CURDATE(), INTERVAL 6 MONTH))
                    AND absensi_new.`tarikan_absen_adms`.`shift_day` <= CURDATE()
                    AND absensi_new.`tarikan_absen_adms`.`badgenumber` = '$nik_baru'
                    ) tbl_final
                ) tbl_final_absen
                where ket_absensi = 'TL'
                GROUP BY tbl_final_absen.`badgenumber`, tbl_final_absen.`ket_absensi`) AS tl
        ";
        $hasil = $this->db2->query($sql);
        return $hasil;
    }

    function get_no_karyawan_struktur($nik_lokasi, $nik_perusahaan){
        $q = $this->db2->query("SELECT SUBSTRING(MAX(nik_baru), -6, 4) AS maxNIK FROM tbl_karyawan_struktur WHERE nik_baru LIKE '$nik_lokasi$nik_perusahaan%'");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->maxNIK)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return $kd;
    }

    function index_penerima_serah_terima($nik_baru)
    {
        $hsl=$this->db2->query("SELECT 
            tbl_karyawan.`id`
            , tbl_karyawan.`nik_baru`
            , tbl_karyawan.`nama_karyawan_struktur`
            , tbl_karyawan.`jabatan_karyawan`
            , tbl_karyawan.`lokasi_hrd`
            , tbl_karyawan.`dept_struktur`
            , tbl_karyawan.`join_date_struktur`
            , tbl_karyawan.`level_role`
            , CASE
            WHEN tbl_karyawan.`level_role` = '1'
            THEN tbl_karyawan.`status_penerima_1`
            WHEN tbl_karyawan.`level_role` = '2'
            THEN tbl_karyawan.`status_penerima_2`
            ELSE '3'
            END AS status_penerima
        FROM (SELECT 
            absensi_new.`tbl_karyawan_serah_terima`.`id`
            , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
            , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
            , absensi_new.`tbl_karyawan_struktur`.`dept_struktur`
            , absensi_new.`tbl_karyawan_struktur`.`join_date_struktur`
            , absensi_new.`tbl_karyawan_serah_terima`.`status_penerima_1`
            , absensi_new.`tbl_karyawan_serah_terima`.`status_penerima_2`
            , CASE 
            WHEN (
            absensi_new.`tbl_karyawan_serah_terima`.`nik_penerima_1` = '$nik_baru'
            ) THEN '1'
            WHEN (
            absensi_new.`tbl_karyawan_serah_terima`.`nik_penerima_2` = '$nik_baru'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
        FROM absensi_new.`tbl_karyawan_serah_terima`
        INNER JOIN absensi_new.`tbl_karyawan_struktur`
            ON absensi_new.`tbl_karyawan_struktur`.`nik_baru` = absensi_new.`tbl_karyawan_serah_terima`.`nik_baru`
        INNER JOIN absensi_new.`tbl_jabatan_karyawan`
            ON absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_struktur`.`jabatan_hrd`
        WHERE absensi_new.`tbl_karyawan_serah_terima`.`nik_penerima_1` = '$nik_baru'
        OR absensi_new.`tbl_karyawan_serah_terima`.`nik_penerima_2` = '$nik_baru') tbl_karyawan"
        );
        return $hsl;
    }

    function index_surat_keterangan_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            `tbl_karyawan_sk`.id
            , tbl_karyawan_sk.`no_urut`
            , tbl_karyawan_sk.`nik_baru`
            , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , `tbl_jabatan_karyawan`.`jabatan_karyawan`
            , `tbl_karyawan_struktur`.`lokasi_hrd`
            , tbl_karyawan_sk.`keperluan`
            , tbl_karyawan_sk.`analisa`
            , tbl_karyawan_sk.`status_atasan`
            , tbl_karyawan_sk.`status_hrd`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_sk
            ON tbl_karyawan_sk.`jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_sk.`nik_baru`
        WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_surat_keterangan_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            `tbl_karyawan_sk`.id
            , tbl_karyawan_sk.`no_urut`
            , tbl_karyawan_sk.`nik_baru`
            , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , `tbl_jabatan_karyawan`.`jabatan_karyawan`
            , `tbl_karyawan_struktur`.`lokasi_hrd`
            , tbl_karyawan_sk.`keperluan`
            , tbl_karyawan_sk.`analisa`
            , tbl_karyawan_sk.`status_atasan`
            , tbl_karyawan_sk.`status_hrd`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_sk
            ON tbl_karyawan_sk.`jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_sk.`nik_baru`
        WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'"
        );
        return $hsl;
    }

    function index_ptk_approve_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_ptk.`id`
            , tbl_karyawan_ptk.`submit_date`
            , tbl_karyawan_ptk.`no_pengajuan`
            , tbl_karyawan_ptk.`nik_pengajuan`
            , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , `tbl_jabatan_karyawan`.`jabatan_karyawan`
            , jabatan_ptk.`jabatan_karyawan` AS ptk_jabatan
            , `tbl_karyawan_struktur`.`lokasi_hrd`
            , tbl_karyawan_ptk.`depo_ptk`
            , tbl_karyawan_ptk.`dept_ptk`
            , tbl_karyawan_ptk.`analisa`
            , tbl_karyawan_ptk.`tenaga_kerja`
            , tbl_karyawan_ptk.`status_atasan`
            , tbl_karyawan_ptk.`status_hrd`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan`
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_ptk
            ON tbl_karyawan_ptk.`jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_jabatan_karyawan` jabatan_ptk
            ON tbl_karyawan_ptk.`jabatan_ptk` = jabatan_ptk.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_ptk.`nik_pengajuan`
        WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_ptk_approve($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_ptk.`id`
            , tbl_karyawan_ptk.`submit_date`
            , tbl_karyawan_ptk.`no_pengajuan`
            , tbl_karyawan_ptk.`nik_pengajuan`
            , `tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , `tbl_jabatan_karyawan`.`jabatan_karyawan`
            , jabatan_ptk.`jabatan_karyawan` AS ptk_jabatan
            , `tbl_karyawan_struktur`.`lokasi_hrd`
            , tbl_karyawan_ptk.`depo_ptk`
            , tbl_karyawan_ptk.`dept_ptk`
            , tbl_karyawan_ptk.`analisa`
            , tbl_karyawan_ptk.`tenaga_kerja`
            , tbl_karyawan_ptk.`status_atasan`
            , tbl_karyawan_ptk.`status_hrd`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan`
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN tbl_karyawan_ptk
            ON tbl_karyawan_ptk.`jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_jabatan_karyawan` jabatan_ptk
            ON tbl_karyawan_ptk.`jabatan_ptk` = jabatan_ptk.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_ptk.`nik_pengajuan`
        WHERE (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')
            AND `tbl_karyawan_struktur`.`lokasi_hrd` = '$lokasi'"
        );
        return $hsl;
    }

    function index_resign_atasan_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_resign.`id`
            ,tbl_karyawan_resign.`no_pengajuan`
            ,tbl_karyawan_resign.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_resign.`tanggal_pengajuan`
            ,tbl_karyawan_resign.`tanggal_efektif_resign`
            ,tbl_karyawan_resign.`alasan_resign`
            ,tbl_karyawan_resign.`klarifikasi_resign`
            ,tbl_karyawan_resign.`ket_resign`
            ,tbl_karyawan_resign.`status_atasan`
            ,tbl_karyawan_resign.`tanggal`
            ,tbl_karyawan_resign.`status_atasan_2`
            ,tbl_karyawan_resign.`tanggal_2`
            ,tbl_karyawan_resign.`status_exit`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_resign`
            ON tbl_karyawan_resign.`jabatan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_resign.`nik_baru`
        WHERE tbl_karyawan_resign.`status_pengajuan` = '0' 
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_resign_atasan($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_resign.`id`
            ,tbl_karyawan_resign.`no_pengajuan`
            ,tbl_karyawan_resign.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_resign.`tanggal_pengajuan`
            ,tbl_karyawan_resign.`tanggal_efektif_resign`
            ,tbl_karyawan_resign.`alasan_resign`
            ,tbl_karyawan_resign.`klarifikasi_resign`
            ,tbl_karyawan_resign.`ket_resign`
            ,tbl_karyawan_resign.`status_atasan`
            ,tbl_karyawan_resign.`tanggal`
            ,tbl_karyawan_resign.`status_atasan_2`
            ,tbl_karyawan_resign.`tanggal_2`
            ,tbl_karyawan_resign.`status_exit`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_resign`
            ON tbl_karyawan_resign.`jabatan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_resign.`nik_baru`
        WHERE tbl_karyawan_resign.`status_pengajuan` = '0' 
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            AND (tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan' 
            OR tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan')"
        );
        return $hsl;
    }

    function index_resign_atasan_2_pusat($jabatan)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_resign.`id`
            ,tbl_karyawan_resign.`no_pengajuan`
            ,tbl_karyawan_resign.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_resign.`tanggal_pengajuan`
            ,tbl_karyawan_resign.`tanggal_efektif_resign`
            ,tbl_karyawan_resign.`alasan_resign`
            ,tbl_karyawan_resign.`klarifikasi_resign`
            ,tbl_karyawan_resign.`ket_resign`
            ,tbl_karyawan_resign.`status_atasan`
            ,tbl_karyawan_resign.`tanggal`
            ,tbl_karyawan_resign.`status_atasan_2`
            ,tbl_karyawan_resign.`tanggal_2`
            , CASE 
            WHEN (
            tbl_karyawan_resign.`status_atasan` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            ) THEN '1'
            WHEN (
            tbl_karyawan_resign.`status_atasan` = '1' 
            AND tbl_karyawan_resign.`status_atasan_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
            ,tbl_karyawan_resign.`status_exit`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_resign`
            ON `tbl_karyawan_resign`.`jabatan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_resign.`nik_baru`
        WHERE (
            `tbl_karyawan_resign`.`status_atasan` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
        )
        OR( 
            `tbl_karyawan_resign`.`status_atasan` = '1' 
            AND `tbl_karyawan_resign`.`status_atasan_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
        )
        ");
        return $hsl;
    }

    function index_resign_atasan_2($jabatan, $lokasi)
    {
        $hsl=$this->db2->query("SELECT
            tbl_karyawan_resign.`id`
            ,tbl_karyawan_resign.`no_pengajuan`
            ,tbl_karyawan_resign.`nik_baru`
            ,tbl_karyawan_struktur.`nama_karyawan_struktur`
            ,tbl_jabatan_karyawan.`jabatan_karyawan`
            ,tbl_karyawan_struktur.`lokasi_hrd`
            ,tbl_karyawan_resign.`tanggal_pengajuan`
            ,tbl_karyawan_resign.`tanggal_efektif_resign`
            ,tbl_karyawan_resign.`alasan_resign`
            ,tbl_karyawan_resign.`klarifikasi_resign`
            ,tbl_karyawan_resign.`ket_resign`
            ,tbl_karyawan_resign.`status_atasan`
            ,tbl_karyawan_resign.`tanggal`
            ,tbl_karyawan_resign.`status_atasan_2`
            ,tbl_karyawan_resign.`tanggal_2`
            , CASE 
            WHEN (
            tbl_karyawan_resign.`status_atasan` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            ) THEN '1'
            WHEN (
            tbl_karyawan_resign.`status_atasan` = '1' 
            AND tbl_karyawan_resign.`status_atasan_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
            ) THEN '2'
            ELSE '0'
            END AS `level_role`
            ,tbl_karyawan_resign.`status_exit`
        FROM `absensi_new`.`tbl_jabatan_karyawan_approval`
        INNER JOIN `tbl_jabatan_karyawan` 
            ON tbl_jabatan_karyawan.`no_jabatan_karyawan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_resign`
            ON `tbl_karyawan_resign`.`jabatan` = tbl_jabatan_karyawan_approval.`no_jabatan_karyawan`
        INNER JOIN `tbl_karyawan_struktur`
            ON tbl_karyawan_struktur.`nik_baru` = tbl_karyawan_resign.`nik_baru`
        WHERE (
            `tbl_karyawan_resign`.`status_atasan` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_1`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        )
        OR( 
            `tbl_karyawan_resign`.`status_atasan` = '1' 
            AND `tbl_karyawan_resign`.`status_atasan_2` = '0' 
            AND tbl_jabatan_karyawan_approval.`no_jabatan_karyawan_atasan_2`='$jabatan'
            AND tbl_karyawan_struktur.`lokasi_hrd` = '$lokasi'
        )
        ");
        return $hsl;
    }

    // =============== Start Approval PTK HR ===================

    function queryListPtkHr($where='', $order='')
    {
        $this->db2->select('
            absensi_new.`tbl_karyawan_ptk`.`id`
            , absensi_new.`tbl_karyawan_ptk`.`submit_date`
            , absensi_new.`tbl_karyawan_ptk`.`no_pengajuan`
            , absensi_new.`tbl_karyawan_ptk`.`no_ptk`
            , absensi_new.`tbl_karyawan_struktur`.`no_urut`
            , absensi_new.`tbl_karyawan_struktur`.`nik_baru`
            , absensi_new.`tbl_karyawan_struktur`.`nama_karyawan_struktur`
            , absensi_new.`tbl_jabatan_karyawan`.`jabatan_karyawan`
            , absensi_new.`tbl_karyawan_ptk`.`jabatan_ptk`
            , absensi_new.`tbl_karyawan_struktur`.`lokasi_hrd`
            , jabatan_ptk.`jabatan_karyawan` AS ptk_jabatan
            , absensi_new.`tbl_karyawan_ptk`.`depo_ptk`
            , absensi_new.`tbl_karyawan_ptk`.`dept_ptk`
            , jabatan_ptk.`level_jabatan_karyawan`
            , absensi_new.`tbl_karyawan_ptk`.`analisa`
            , absensi_new.`tbl_karyawan_ptk`.`tenaga_kerja`
            , absensi_new.`tbl_karyawan_ptk`.`status_atasan`
            , absensi_new.`tbl_karyawan_ptk`.`tanggal_approve`
            , absensi_new.`tbl_karyawan_ptk`.`status_manager`
            , absensi_new.`tbl_karyawan_ptk`.`tanggal_manager`
            , absensi_new.`tbl_karyawan_ptk`.`status_hrd`
            , absensi_new.`tbl_karyawan_ptk`.`keterangan`
            , absensi_new.`tbl_karyawan_ptk`.`status_pengajuan`
            , absensi_new.`tbl_karyawan_ptk`.`status_permintaan`
            , absensi_new.`tbl_karyawan_ptk`.`nik_karyawan`
            , absensi_new.`tbl_karyawan_ptk`.`nama_karyawan`
            , absensi_new.`tbl_karyawan_ptk`.`tanggal_join`
            , absensi_new.`tbl_karyawan_ptk`.`tanggal_close`');
        $this->db2->from('absensi_new.`tbl_karyawan_ptk`');
        $this->db2->join('absensi_new.`tbl_karyawan_struktur`', 'absensi_new.`tbl_karyawan_struktur`.`no_urut` = absensi_new.`tbl_karyawan_ptk`.`no_urut`', 'left');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan`', 'absensi_new.`tbl_jabatan_karyawan`.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_ptk`.`jabatan_karyawan`', 'left');
        $this->db2->join('absensi_new.`tbl_jabatan_karyawan` jabatan_ptk', 'jabatan_ptk.`no_jabatan_karyawan` = absensi_new.`tbl_karyawan_ptk`.`jabatan_ptk`', 'left');
        $this->db2->where("(YEAR(absensi_new.`tbl_karyawan_ptk`.`submit_date`) = '2023' OR YEAR(absensi_new.`tbl_karyawan_ptk`.`submit_date`) = '2024') ");
        $this->db2->order_by('absensi_new.`tbl_karyawan_ptk`.`no_pengajuan` ASC');
        if(!empty($where)) {
            $this->db2->where($where);
        }
        if(!empty($order)) {
            $this->db2->order_by($order[0], $order[1]);
        }
        $get = $this->db2->get();

        return $get;
    }

    // =============== End Approval PTK HR ===================

}