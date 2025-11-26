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
                    <div id="rootwizard">
                        <div class="navbar">
                          <div class="navbar-inner">
                            <div class="container">
                        <ul>
                            <li><a href="#tab1" data-toggle="tab">First</a></li>
                            <li><a href="#tab2" data-toggle="tab">Second</a></li>
                            <li><a href="#tab3" data-toggle="tab">Third</a></li>
                        </ul>
                         </div>
                          </div>
                        </div>
                        <div id="bar" class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <span class="caption-subject font-dark sbold">Bukalah menu personal</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengecekan_absen/step_1.png"/>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <span class="caption-subject font-dark sbold">Untuk pengecekan absen kliklah menu absensi</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengecekan_absen/step_2.png"/>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <span class="caption-subject font-dark sbold">
                                    Keterangan absen : <br>
                                    - HD = Hadir <br>
                                    - CD = Cuti Diluar Tanggungan <br>
                                    - SA = Sakit <br>
                                    - DN = Dinas <br>
                                    - DT = Datang Telat <br>
                                    - PC = Pulang Cepat <br>
                                    - KK = Keluar Kantor <br>
                                    - CK = Cuti Khusus <br>
                                    - CU = Cuti Tahunan <br>
                                    - BU = Back Up <br>
                                    - LI = Libur <br></span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/pengecekan_absen/step_3.png"/>
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