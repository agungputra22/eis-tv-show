<div class="row">
    <div class="col-md-12">
    <!-- Begin: Datatable -->
    <div class="portlet light portlet-fit portlet-datatable">
    <div class="portlet-title">
        <div class="caption">
            <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-container">
            <div class="row">
                <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" action="#">
                    <div class="portlet">
                        <div class="portlet-body">
                            <div class="tabbable-bordered">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_lihat_shift" data-toggle="tab"> Lihat Shift </a>
                                    </li>
                                    <li>
                                        <a href="#tab_shift_tanggal" data-toggle="tab"> Membuat Shift Tanggal Tertentu</a>
                                    </li>
                                    <li>
                                        <a href="#tab_shift_range" data-toggle="tab"> Membuat Shift Range </a>
                                    </li>
                                    <li>
                                        <a href="#tab_revisi" data-toggle="tab"> Revisi Shift
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_lihat_shift">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <!-- Begin: Datatable -->
                                                <div class="portlet light portlet-fit portlet-datatable">
                                                    <div class="portlet-body">
                                                        <div class="table-container">
                                                            <div id="rootwizard">
                                                                <div class="navbar">
                                                                  <div class="navbar-inner">
                                                                    <div class="container">
                                                                <ul>
                                                                    <li><a href="#tab1_lihat_shift" data-toggle="tab">First</a></li>
                                                                    <li><a href="#tab2_lihat_shift" data-toggle="tab">Second</a></li>
                                                                    <li><a href="#tab3_lihat_shift" data-toggle="tab">Third</a></li>
                                                                </ul>
                                                                 </div>
                                                                  </div>
                                                                </div>
                                                                <div id="bar" class="progress">
                                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane" id="tab1_lihat_shift">
                                                                        <span class="caption-subject font-dark sbold">Bukalah menu shift karyawan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/lihat_shift/step_1.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab2_lihat_shift">
                                                                        <span class="caption-subject font-dark sbold">Kliklah menu lihat shift</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/lihat_shift/step_2.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab3_lihat_shift">
                                                                        <span class="caption-subject font-dark sbold">Shift yang ditampilkan adalah shift anda yang telah diatur oleh atasan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/lihat_shift/step_3.png"/>
                                                                    </div>
                                                                    <ul class="pager wizard">
                                                                        <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                                        <li class="previous"><a href="#">Previous</a></li>
                                                                        <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                                        <li class="next"><a href="#">Next</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End: Datatable -->
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                                                    var $total = navigation.find('li').length;
                                                    var $current = index+1;
                                                    var $percent = ($current/$total) * 100;
                                                    $('#rootwizard .progress-bar').css({width:$percent+'%'});
                                                }});
                                            });
                                        </script>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_shift_tanggal">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <!-- Begin: Datatable -->
                                                <div class="portlet light portlet-fit portlet-datatable">
                                                    <div class="portlet-body">
                                                        <div class="table-container">
                                                            <div id="rootwizard_shift_tanggal">
                                                                <div class="navbar">
                                                                  <div class="navbar-inner">
                                                                    <div class="container">
                                                                <ul>
                                                                    <li><a href="#tab1_shift_tanggal" data-toggle="tab">First</a></li>
                                                                    <li><a href="#tab2_shift_tanggal" data-toggle="tab">Second</a></li>
                                                                    <li><a href="#tab3_shift_tanggal" data-toggle="tab">Third</a></li>
                                                                    <li><a href="#tab4_shift_tanggal" data-toggle="tab">Forth</a></li>
                                                                    <li><a href="#tab5_shift_tanggal" data-toggle="tab">Fifth</a></li>
                                                                </ul>
                                                                 </div>
                                                                  </div>
                                                                </div>
                                                                <div id="bar" class="progress">
                                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane" id="tab1_shift_tanggal">
                                                                        <span class="caption-subject font-dark sbold">Bukalah menu shift karyawan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_tertentu/step_1.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab2_shift_tanggal">
                                                                        <span class="caption-subject font-dark sbold">Kliklah menu buat shift => wajib</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_tertentu/step_2.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab3_shift_tanggal">
                                                                        <span class="caption-subject font-dark sbold">Carilah NIK / Nama yang akan dibuatkan shift, pilih tanggal shift dan setelah selesai klik tombol simpan draft</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_tertentu/step_3.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab4_shift_tanggal">
                                                                        <span class="caption-subject font-dark sbold">Klik tombol refresh dan data yang anda simpan ke dalam draft akan muncul, lalu pilihlah jam kerja di kolom keterangan apabila telah di set maka klik tombol simpan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_tertentu/step_4.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab5_shift_tanggal">
                                                                        <span class="caption-subject font-dark sbold">Data sudah berhasil disimpan, lalu klik tombol refresh untuk membersihkan draft</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_tertentu/step_5.png"/>
                                                                    </div>
                                                                    <ul class="pager wizard">
                                                                        <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                                        <li class="previous"><a href="#">Previous</a></li>
                                                                        <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                                        <li class="next"><a href="#">Next</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End: Datatable -->
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#rootwizard_shift_tanggal').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                                                    var $total = navigation.find('li').length;
                                                    var $current = index+1;
                                                    var $percent = ($current/$total) * 100;
                                                    $('#rootwizard_shift_tanggal .progress-bar').css({width:$percent+'%'});
                                                }});
                                            });
                                        </script>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_shift_range">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <!-- Begin: Datatable -->
                                                <div class="portlet light portlet-fit portlet-datatable">
                                                    <div class="portlet-body">
                                                        <div class="table-container">
                                                            <div id="rootwizard_shift_range">
                                                                <div class="navbar">
                                                                  <div class="navbar-inner">
                                                                    <div class="container">
                                                                <ul>
                                                                    <li><a href="#tab1_shift_range" data-toggle="tab">First</a></li>
                                                                    <li><a href="#tab2_shift_range" data-toggle="tab">Second</a></li>
                                                                    <li><a href="#tab3_shift_range" data-toggle="tab">Third</a></li>
                                                                    <li><a href="#tab4_shift_range" data-toggle="tab">Forth</a></li>
                                                                </ul>
                                                                 </div>
                                                                  </div>
                                                                </div>
                                                                <div id="bar" class="progress">
                                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane" id="tab1_shift_range">
                                                                        <span class="caption-subject font-dark sbold">Bukalah menu shift karyawan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_range/step_1.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab2_shift_range">
                                                                        <span class="caption-subject font-dark sbold">Kliklah menu buat shift => wajib</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_range/step_2.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab3_shift_range">
                                                                        <span class="caption-subject font-dark sbold">Kliklah tombol Beberapa Tanggal</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_range/step_3.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab4_shift_range">
                                                                        <span class="caption-subject font-dark sbold">Carilah NIK / Nama yang akan dibuatkan shift, pilih tanggal awal dan tanggal akhir, lalu pilih jam kerja dan setelah selesai klik tombol simpan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/tanggal_range/step_4.png"/>
                                                                    </div>
                                                                    <ul class="pager wizard">
                                                                        <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                                        <li class="previous"><a href="#">Previous</a></li>
                                                                        <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                                        <li class="next"><a href="#">Next</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End: Datatable -->
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#rootwizard_shift_range').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                                                    var $total = navigation.find('li').length;
                                                    var $current = index+1;
                                                    var $percent = ($current/$total) * 100;
                                                    $('#rootwizard_shift_range .progress-bar').css({width:$percent+'%'});
                                                }});
                                            });
                                        </script>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_revisi">
                                        <div class="form-body">
                                            <div class="row">
                                            <div class="col-md-12">
                                                <!-- Begin: Datatable -->
                                                <div class="portlet light portlet-fit portlet-datatable">
                                                    <div class="portlet-body">
                                                        <div class="table-container">
                                                            <div id="rootwizard_revisi">
                                                                <div class="navbar">
                                                                  <div class="navbar-inner">
                                                                    <div class="container">
                                                                <ul>
                                                                    <li><a href="#tab1_revisi" data-toggle="tab">First</a></li>
                                                                    <li><a href="#tab2_revisi" data-toggle="tab">Second</a></li>
                                                                    <li><a href="#tab3_revisi" data-toggle="tab">Third</a></li>
                                                                    <li><a href="#tab4_revisi" data-toggle="tab">Forth</a></li>
                                                                    <li><a href="#tab5_revisi" data-toggle="tab">Fifth</a></li>
                                                                    <li><a href="#tab6_revisi" data-toggle="tab">Sixth</a></li>
                                                                </ul>
                                                                 </div>
                                                                  </div>
                                                                </div>
                                                                <div id="bar" class="progress">
                                                                  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                                                                </div>
                                                                <div class="tab-content">
                                                                    <div class="tab-pane" id="tab1_revisi">
                                                                        <span class="caption-subject font-dark sbold">Bukalah menu shift karyawan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_1.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab2_revisi">
                                                                        <span class="caption-subject font-dark sbold">Kliklah menu buat shift => revisi</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_2.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab3_revisi">
                                                                        <span class="caption-subject font-dark sbold">Carilah nik / nama yang akan di lihat shift, lalu klik view shift</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_3.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab4_revisi">
                                                                        <span class="caption-subject font-dark sbold">Anda bisa melakukan edit atau hapus shift</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_4.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab5_revisi">
                                                                        <span class="caption-subject font-dark sbold">Apabila anda melakukan edit maka hanya jam kerja saja yang bisa anda lakukan perubahan, lalu klik simpan</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_5.png"/>
                                                                    </div>
                                                                    <div class="tab-pane" id="tab6_revisi">
                                                                        <span class="caption-subject font-dark sbold">Apabila anda melakukan hapus maka akan ada notifikasi untuk mengingatkan apakah benar-benar ingin di hapus atau tidak</span>
                                                                        &nbsp;
                                                                        <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengajuan_shift/revisi_shift/step_6.png"/>
                                                                    </div>
                                                                    <ul class="pager wizard">
                                                                        <li class="previous first" style="display:none;"><a href="#">First</a></li>
                                                                        <li class="previous"><a href="#">Previous</a></li>
                                                                        <li class="next last" style="display:none;"><a href="#">Last</a></li>
                                                                        <li class="next"><a href="#">Next</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End: Datatable -->
                                            </div>
                                        </div>
                                        <script type="text/javascript">
                                            $(document).ready(function() {
                                                $('#rootwizard_revisi').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                                                    var $total = navigation.find('li').length;
                                                    var $current = index+1;
                                                    var $percent = ($current/$total) * 100;
                                                    $('#rootwizard_revisi .progress-bar').css({width:$percent+'%'});
                                                }});
                                            });
                                        </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End: Datatable -->
    </div>
</div>