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
                            <li><a href="#tab4" data-toggle="tab">Forth</a></li>
                            <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
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
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/approval/step_1.png"/>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <span class="caption-subject font-dark sbold">Untuk melakukan approval anda bisa ke menu yang anda akan lakukan approval</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/approval/step_2.png"/>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <span class="caption-subject font-dark sbold">Klik lah link approval</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/approval/step_3.png"/>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <span class="caption-subject font-dark sbold">Lakukan tindakan yang akan dilakukan (Approved / Not Approved), lalu klik tombol pengajuan</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/approval/step_4.png"/>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <span class="caption-subject font-dark sbold">Apabila sudah dilakukan pengajuan akan pindah ke halaman yang anda lakukan tindakan (Approved / Not Approved / Hangus)</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/approval/step_5.png"/>
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