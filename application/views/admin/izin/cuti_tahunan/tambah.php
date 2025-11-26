<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_tahunan/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-cuti_tahunan" method="post" action="<?php echo site_url('cuti_tahunan/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_cuti_tahunan" class="form-control" placeholder="Enter Id " readonly="">
                                <input type="hidden" name="nik_cuti_tahunan" class="form-control" placeholder="Enter Id " value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_cuti_tahunan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_tahunan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Opsi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" name="opsi" id="myCheck_urgent" onclick="myFunction_urgent()" data-toggle="collapse" data-target="#urgent" aria-expanded="false" aria-controls="urgent" value="Urgent"> Urgent
                                <input type="checkbox" name="opsi" data-toggle="collapse" data-target="#terencana" aria-expanded="false" aria-controls="terencana" value="Terencana"> Terencana
                            </div>
                        </div>

                        <div class="form-group" id="text_urgent" style="display:none">
                            <label class="col-md-3 control-label">Mulai Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="start_full_day_cd_urgent[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d'); ?>">
                            </div>
                            <div class="col-md-1">
                                <button type="button" name="add_anak_cd_urgent" id="add_anak_cd_urgent" class="btn btn-success">+</button>
                            </div>
                        </div>

                        <div class="collapse" id="terencana">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mulai Tanggal
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="start_full_day_cd_terencana[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>">
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" name="add_anak_cd_terencana" id="add_anak_cd_terencana" class="btn btn-success">+</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="dynamic_field_anak">
                            
                        </div>

                        <div id="dynamic_field_anak_cd_urgent">
                            
                        </div>

                        <div id="dynamic_field_anak_cd_terencana">
                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_tambahan_tahunan" class="form-control" required=""></textarea>
                            </div>
                        </div>

                        <div class="collapse" id="urgent">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Upload Dokumen
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="file" name="dok_cuti_tahunan" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                    </label>
                                    <div class="col-md-6">
                                        <span class="font-red">*</span> Lampirkan dokumen dan Hubungi HR Excutive
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('cuti_tahunan/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/cuti_tahunan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_TAHUNAN.handleSendData();

    // Data Anak
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_keluarga')?>";
      var i=1;  

      $('#add_anak').click(function(){  
           i++;  
           $('#dynamic_field_anak').append('<div class="form-group dynamic-added_anak" id="row'+i+'"><label class="col-md-3 control-label">Tanggal<span class="font-red">*</span></label><div class="col-md-4"><input type="date" name="start_full_day[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('-3 days', strtotime(date('Y-m-d')))); ?>"></div><div class="col-md-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
      });

      $('#add_anak_cd_urgent').click(function(){  
           i++;  
           $('#dynamic_field_anak_cd_urgent').append('<div class="form-group dynamic-added_anak" id="row'+i+'"><label class="col-md-3 control-label">Tanggal<span class="font-red">*</span></label><div class="col-md-4"><input type="date" name="start_full_day_cd_urgent[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d'); ?>"></div><div class="col-md-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
      });

      $('#add_anak_cd_terencana').click(function(){  
           i++;  
           $('#dynamic_field_anak_cd_terencana').append('<div class="form-group dynamic-added_anak" id="row'+i+'"><label class="col-md-3 control-label">Tanggal<span class="font-red">*</span></label><div class="col-md-4"><input type="date" name="start_full_day_cd_terencana[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('+7 days', strtotime(date('Y-m-d')))); ?>"></div><div class="col-md-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      }); 


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_keluarga').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_anak').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    function myFunction_urgent() {
        var checkBox = document.getElementById("myCheck_urgent");
        var text = document.getElementById("text_urgent");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    function myFunction_cd() {
        var checkBox = document.getElementById("myCheck_cd");
        var text = document.getElementById("text_cd");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>