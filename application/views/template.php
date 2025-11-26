<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>User - <?php echo $this->config->item('title_site') ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" /> -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
        <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
        <style>
            .select2-container .select2-selection--single {
                height: 2.5em !important;
            }

            .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 2.5em !important;
            }
        </style>
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url() ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url() ?>assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url() ?>assets/layouts/layout2/css/themes/grey.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url() ?>assets/apps/css/custom.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
        <script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        window.APP = {
            siteUrl :"<?php echo site_url() ?>",
            baseUrl : "<?php echo base_url() ?>"
        }
        </script>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo" style="background-color: black;">
                    <a href="">  
                       <img width="155" height="68" src="<?php echo base_url($this->config->item('img_path').'logo_eis_halaman.png') ?>" alt="" />
                    </a>
                    <!-- <div class="menu-toggler sidebar-toggler">
                        DOC: Remove the above "hide" to enable the sidebar toggler button on header
                    </div> -->                
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <!-- <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form> -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <!-- <img alt="" class="img-circle" src="<?php echo base_url($this->config->item('img_path').users('foto')) ?>" /> -->
                                    <span class="username username-hide-on-mobile"> 
                                    <?php echo users('nama_karyawan_struktur') ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link ajaxify" data-toggle="modal" data-target="#ModalaAdd">
                                            <i class="icon-lock"></i> Change Password </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <!-- <li>
                                        <a href="<?php echo site_url('settings/lock') ?>">
                                            <i class="icon-lock"></i> Lock Screen </a>
                                    </li> -->
                                    <li>
                                        <a href="<?php echo site_url('logout') ?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile">
                                    <div class="date-time">
                                        <span id="time"></span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container" style="background-color: #337ab7;">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper" style="background-color: #337ab7;">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse" style="background-color: #337ab7;">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu" data-keep-expand="false" data-auto-scroll="true" data-slide-speed="200" style="    background-color: #337ab7;">
                        <li class="nav-item start">
                            <a href="<?php echo site_url('admin/dashboard') ?>" class="nav-link ajaxify">
                                <i class="icon-home"></i>
                                <span class="title">Index</span>
                            </a>
                        </li>
                        
                        <?php

                        if ($this->session->userdata('status_update')=='0') {
                            echo menu_detail_karyawan(); 
                        } else {
                            if ($this->session->userdata('level_struktur')=='Operator' and ($this->session->userdata('perusahaan_struktur')=='KBKM - TKBM' or $this->session->userdata('perusahaan_struktur')=='MPB PAKET - TKBM') ) {
                                echo menu_master_tkbm();     
                            } elseif ($this->session->userdata('level_struktur')=='Operator' and ($this->session->userdata('lokasi_struktur')=='Alam Sutera' or $this->session->userdata('lokasi_struktur')=='Cinangka') ) {
                                echo menu_master();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Operator') {
                                echo menu_master();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('nik_baru')=='0100026300') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_target_terukur();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('nik_baru')=='0100018600') {
                                echo menu_master_pusat();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_ipp();
                                echo menu_log_support_ict();
                                echo menu_security();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('jabatan_struktur')=='176') {
                                echo menu_master_pusat();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_log_visit_hr();
                                echo menu_clearance_sheet_hrd();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('jabatan_struktur')=='239') {
                                echo menu_master();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_lembur_stpl();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('jabatan_struktur')=='282') {
                                echo menu_master_pusat();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_pengaturan_sd();
                                echo menu_punishmnet_sd();
                                echo tarikan_absen();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('jabatan_struktur')=='322') {
                                echo menu_master_mechanical();   
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('jabatan_struktur')=='225') {
                                echo menu_master();          
                                echo menu_gallup();                  
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_clearance_sheet_fa();
                                echo menu_kontak();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('area')=='1' and $this->session->userdata('nik_baru')=='0100026300') {
                                echo menu_master_pusat();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_target_terukur();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='447') {
                                echo menu_master_pusat();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_log_support_ict();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and $this->session->userdata('area')=='1') {
                                echo menu_master_pusat();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff' and ($this->session->userdata('lokasi_struktur')=='Alam Sutera' or $this->session->userdata('lokasi_struktur')=='Cinangka') ) {
                                echo menu_master();                            
                                echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Staff') {
                                echo menu_master();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Staff' and $this->session->userdata('area')=='1') {
                                echo menu_master_pusat();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Staff') {
                                echo menu_master();                            
                                // echo menu_absen_manual();
                                echo menu_surat_keterangan_kerja();
                                echo menu_gallup();
                                echo menu_kalender();
                                echo menu_view_shift();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Junior Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='187') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Junior Supervisor' and $this->session->userdata('area')=='1') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Junior Supervisor' and $this->session->userdata('area')=='2') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Junior Supervisor' and $this->session->userdata('area')=='3') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Junior Supervisor') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='266') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam_crl();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan_pusat();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_spv_crl();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='267') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_sd();
                                echo menu_pengaturan_on_off();
                                echo menu_punishmnet_sd();
                                echo menu_refund();
                                echo tarikan_absen();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='268') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_spv_crl();
                                echo menu_pengaturan_on_off();
                                echo menu_punishmnet_sd();
                                echo menu_kebutuhan_karyawan_pusat();
                                echo menu_refund();
                                echo tarikan_absen();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1'  and $this->session->userdata('jabatan_struktur')=='169') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_performance();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_log_visit_admin();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='320') {
                                // echo menu_team_security();
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_permintaan();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('jabatan_struktur')=='395') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='168') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_performance();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='319') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam_crl();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_spv_crl();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_clearance_sheet_ga();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='165') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_clearance_sheet_qms();
                                echo menu_kontak();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='197') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_clearance_sheet_ict();
                                echo menu_kontak();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='2' and $this->session->userdata('jabatan_struktur')=='222') {
                                echo menu_master_spv_admin();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam_spvadmin();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='2' and $this->session->userdata('jabatan_struktur')=='305') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan_wuh();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='1') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor' and $this->session->userdata('area')=='2') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Supervisor') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_lembur_level_1();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Supervisor' and $this->session->userdata('area')=='1' and $this->session->userdata('nik_baru')=='0100000300') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan_permintaan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Supervisor' and $this->session->userdata('area')=='1') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Supervisor') {
                                echo menu_master_spv();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_refund();
                                echo menu_lembur_level_1();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='184') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='195') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_performance();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan_permintaan();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='207') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_3();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='209') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_kebutuhan_karyawan_pusat();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_far_piutang();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='255') {
                                echo menu_master_ass_man();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_refund();
                                echo menu_lembur_level_2();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='256') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_kebutuhan_karyawan();
                                echo menu_pengaturan();
                                echo menu_pengaturan_sd();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_punishmnet_sd();
                                echo tarikan_absen();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('jabatan_struktur')=='303') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_kebutuhan_karyawan();
                                echo menu_pengaturan_spv_crl();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_clearance_sheet_wop();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('area')=='1' and $this->session->userdata('jabatan_struktur')=='164') {
                                echo menu_master_spv_pusat();
                                echo menu_absen_manual_1();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_performance();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_lembur_level_1();
                                echo menu_log_visit_admin();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            }elseif ($this->session->userdata('level_struktur')=='Assistant Manager' and $this->session->userdata('area')=='1') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_kebutuhan_karyawan();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_kalender();
                                echo menu_pengaturan_on_off();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Assistant Manager') {
                                echo menu_master_ass_man();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_asman();
                                echo menu_refund();
                                echo menu_kalender();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='206') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_lembur_level_3();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='249') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='250') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_pengaturan();
                                echo menu_gallup_spv();
                                echo menu_pengaturan_on_off();
                                echo menu_mutasi_rotasi();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='251') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='252') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='253') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_kebutuhan_karyawan_pusat();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off_am();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='162') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_gallup_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_pengaturan_on_off_am();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_approval_hr();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('jabatan_struktur')=='194') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager' and $this->session->userdata('area')=='1') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_pengaturan_on_off();
                                echo menu_kebutuhan_karyawan();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Manager') {
                                echo menu_master_ass_man();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_pengaturan_on_off();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Manager' and $this->session->userdata('jabatan_struktur')=='248') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_pengaturan();
                                echo menu_pengaturan_on_off();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Senior Manager') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_kontak();
                                echo menu_ketentuan();
                            } elseif ($this->session->userdata('level_struktur')=='Direksi') {
                                echo menu_master_ass_man_pusat();
                                echo menu_absen_manual_2();
                                echo menu_surat_keterangan_kerja_spv();
                                echo menu_pengajuan_seragam();
                                echo menu_mutasi_rotasi();
                                echo menu_gallup_spv();
                                echo menu_permintan_tenaga_kerja_manager();
                                echo menu_kalender();
                                echo menu_refund();
                                echo menu_lembur_level_3();
                                echo menu_kontak();
                                echo menu_ketentuan();
                                // echo menu_master_direksi();
                                // echo menu_kontak();
                            }  else {
                                "Tidah Ada Halaman";
                            }
                        }

                        ?>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <h1 class="page-title"> <?php echo $this->config->item('welcome') ?>
                        <small>di <?php echo $this->config->item('name_modust') ?></small>
                    </h1>
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content-body">
                        <h5 align="center"><b>INFORMASI BERLANJUT DENGAN DI KLIK</b></h5>
                        <div class='slide'>
                          <input type='radio' name='radio-set' checked='checked'/>
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_1.jpg'/>

                          <input type='radio' name='radio-set'/>
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_2.png'/>

                          <input type='radio' name='radio-set'/>
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_3.png'/>

                          <!-- <input type='radio' name='radio-set'/>
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/SayNoToFraud.png'/> -->

                          <input type='radio' name='radio-set' />
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_4.jpg'/>

                          <!-- <input type='radio' name='radio-set' />
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_5.jpg'/> -->

                          <!-- <input type='radio' name='radio-set' />
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_6.jpg'/> -->

                          <!-- <input type='radio' name='radio-set' />
                          <img src='<?php echo base_url() ?>assets/apps/img/lowongan/covid_6.jpg'/> -->

                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer" style="background-color: black;">
            <div class="page-footer-inner">
            <?php
                $tahun = date ('Y');
                echo $tahun;
            ?> 
            <?php echo $this->config->item('copyright') ?>
                - Version <?php echo $this->config->item('app_version') ?>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
        </div>
        <!-- END FOOTER -->
        <!-- MODAL ADD -->
        <div class="modal fade" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Reset Password</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body"> 
                    <div class="form-group">
                        <label class="control-label col-xs-4" >NIK Karyawan</label>
                        <div class="col-xs-8">
                            <input name="nik_baru" id="nik_baru" class="form-control" type="text" value="<?php echo users('nik_baru') ?>" placeholder="No. Pesanan" required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Nama Karyawan</label>
                        <div class="col-xs-8">
                            <input name="nama_karyawan_struktur" id="nama_karyawan_struktur" class="form-control" type="text" value="<?php echo users('nama_karyawan_struktur') ?>" placeholder="No. Pesanan" required readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Password Lama</label>
                        <div class="col-xs-8">
                            <input type="text" name="" class="form-control" placeholder="Password Lama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Password Baru</label>
                        <div class="col-xs-8">
                            <input type="password" name="" class="form-control" placeholder="Password Baru" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-4" >Ulangi Password Baru</label>
                        <div class="col-xs-8">
                            <input type="password" name="password" class="form-control" placeholder="Ulangi Password Baru" required>
                        </div>
                    </div>

                    <div id="message">
                      <h3>Password must contain the following:</h3>
                      <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                      <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                      <p id="number" class="invalid">A <b>number</b></p>
                      <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>  

                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>assets/global/plugins/respond.min.js"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/excanvas.min.js"></script> 
        <script src="<?php echo base_url() ?>assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('bower_components/jquery-form/dist/jquery.form.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/scripts/datatable.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?php echo base_url() ?>assets/layouts/layout/scripts/layout.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
            // Approve Full Day
            var auto_refresh= setInterval(
            function (){
                $.get("<?=base_url('full_day/approve_hangus')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Approve Non Full Day
            var auto_refresh_non_full= setInterval(
            function (){
                $.get("<?=base_url('non_full_day/approve_hangus')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Approve Cuti Khusus
            var auto_refresh_cuti_khusus= setInterval(
            function (){
                $.get("<?=base_url('cuti_khusus/approve_hangus')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Approve Cuti Tahunan
            var auto_refresh_cuti_tahunan= setInterval(
            function (){
                $.get("<?=base_url('cuti_tahunan/approve_hangus')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Update Project
            var auto_refresh_karyawan_project= setInterval(
            function (){
                $.get("<?=base_url('historical_mutasi/update_project')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Update End TKBM
            var auto_refresh_karyawan_end_tkbm= setInterval(
            function (){
                $.get("<?=base_url('historical_mutasi/update_end_tkbm')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Update Start TKBM
            var auto_refresh_karyawan_start_tkbm= setInterval(
            function (){
                $.get("<?=base_url('historical_mutasi/update_start_tkbm')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Update Mutasi Rotasu
            var auto_refresh_mutasi_rotasi= setInterval(
            function (){
                $.get("<?=base_url('historical_mutasi/hangus_mutasi_rotasi')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);

            // Update Project TKBM
            var auto_refresh_karyawan_project_tkbm= setInterval(
            function (){
                $.get("<?=base_url('historical_mutasi/update_project_tkbm')?>", function(data,status){
                    document.getElementById('lblButton'+data).innerHTML='Auto Approved'; 
                    document.getElementById('lblButton'+data).classList.add("label-info"); 
                });
            }, 60000);
        </script>

        <script>
            var span = document.getElementById('time');

            function time() {
                var weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                var d = new Date();
                var s = d.getSeconds();
                var m = d.getMinutes();
                var h = d.getHours();
                var dat = d.getDate();
                var mon = d.getMonth();
                var yea = d.getFullYear();
                var days = d.getDay();
                span.textContent =
                    (weekdays[days]) + ", " + ("0" + dat).substr(-2) + " " + (months[mon]) + " " + (yea) + "  " + ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
            }

            setInterval(time, 1000);
        </script>
    </body>

</html>