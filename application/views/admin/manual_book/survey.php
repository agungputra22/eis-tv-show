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
                                <span class="caption-subject font-dark sbold">Pilih menu Survey & Assesment -> lalu pilih menu Survey Kepuasan Karyawan</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/survey/step_1.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab2">
                                <span class="caption-subject font-dark sbold">Terdapat 12 Form Survey kepuasan karyawan yang terdiri dari kategori : Sangat memahami, Memahami, Kurang memahami,  & Tidak Memahami</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/survey/step_2.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <span class="caption-subject font-dark sbold">Pilihlah jawaban yang sesuai kondisi anda dalam lingkungan bekerja dari no 1-12 </span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/survey/step_3.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab4">
                                <span class="caption-subject font-dark sbold">Berikan saran & masukan sesuai dengan pertanyaan di atas, dengan memilih minimal 1 point dan maksimal 3 point dari 12 pertanyaan tersebut</span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/survey/step_4.jpg"/>
                            </div>
                            <div class="tab-pane" id="tab5">
                                <span class="caption-subject font-dark sbold">Setelah selesai mengisi form pertanyaan Pilihan dari 1-12 akan muncul dialog box <b>"Sudah Melakukan Survey"</b></span>
                                &nbsp;
                                <img width="100%" height="500" height="200" src="<?php echo base_url() ?>uploads/ketentuan_sop/survey/step_5.jpg"/>&nbsp;
                                <span class="caption-subject font-dark sbold">Survey hanya bisa di lakukan sekali</span>
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