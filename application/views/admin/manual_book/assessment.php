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
                            <li><a href="#tab6" data-toggle="tab">sixth</a></li>
                            <li><a href="#tab7" data-toggle="tab">seventh</a></li>
                            <li><a href="#tab8" data-toggle="tab">eighth</a></li>
                        </ul>
                         </div>
                          </div>
                        </div>
                        <div id="bar" class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <span class="caption-subject font-dark sbold">DASHBOARD ASSESSMENT JOBDESK & KPI MENU EIS</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_1.jpg"/>&nbsp;
                                <span class="caption-subject font-dark sbold">Pilih menu Survey & Assesment -> lalu pilih menu Assessment Jobdesk & KPI</span>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <span class="caption-subject font-dark sbold">Terdapat 23 Pertanyaan di menu Jobdesk & KPI dan isi pertanyaan tersebut di kolom Jawaban Karyawan</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_2.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <span class="caption-subject font-dark sbold">Terdapat kolom status yang terdiri dari 2 opsi : SCORING & NO SCORING</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_3.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <span class="caption-subject font-dark sbold">Pertanyaan no 1 – 18 adalah pertanyaan berdasarkan tugas & tanggung jawab dalam bekerja dan akan mendapatkan penilaian dari atasan terkait (SCORING)</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_4.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <span class="caption-subject font-dark sbold">Pertanyaan di status No Scoring merupakan pendapat (opini) karyawan</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_5.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab6">
                                <span class="caption-subject font-dark sbold">Jika sudah mengisi Form pertanyaan dari no 1-23 silahkan pilih menu simpan</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_6.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab7">
                                <span class="caption-subject font-dark sbold">Setelah selesai mengisi form pertanyaan dari 1-23 akan muncul dialog box <b>" Sudah Melakukan Survey"</b></span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_7.jpg"/>&nbsp;
                                <span class="caption-subject font-dark sbold">Survey hanya bisa di lakukan sekali, dan hasil survey & Kepuasan karyawan akan masuk di dashboard EIS atasan terkait</span>
                            </div>
                            <div class="tab-pane" id="tab8">
                                <span class="caption-subject font-dark sbold">DASHBOARD MENU DATA ASSESMENT JOBDESK & KPI DI EIS ATASAN TERKAIT </span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/assessment/step_8.jpg"/>
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