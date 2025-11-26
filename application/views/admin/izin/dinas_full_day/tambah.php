<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('dinas_full_day/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-dinas_full_day" method="post" action="<?php echo site_url('dinas_full_day/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_full_day" class="form-control" placeholder="Enter Id full_day" readonly="">
                                <input type="hidden" name="nik_full_day" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_full_day" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_full_day" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Mulai Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="start_full_day_dn[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('-3 days', strtotime(date('Y-m-d')))); ?>">
                            </div>
                            <div class="col-md-1">
                                <button type="button" name="add_anak_dn" id="add_anak_dn" class="btn btn-success">+</button>
                            </div>
                        </div>

                        <div id="dynamic_field_anak_dn">
                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Karyawan yang menggantikan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="karyawan_pengganti" class="bs-select form-control" data-live-search="true" data-size="8" required="">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->nama_karyawan_struktur'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Agenda Dinas
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_tambahan" class="form-control" required=""></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('dinas_full_day/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/dinas_full_day.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.DINAS_FULL_DAY.handleSendData();
    window.DINAS_FULL_DAY.handleBootstrapSelect();

    // Data Anak
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_keluarga')?>";
      var i=1;  


      $('#add_anak_dn').click(function(){  
           i++;  
           $('#dynamic_field_anak_dn').append('<div class="form-group dynamic-added_anak" id="row'+i+'"><label class="col-md-3 control-label">Tanggal<span class="font-red">*</span></label><div class="col-md-4"><input type="date" name="start_full_day_dn[]" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('-3 days', strtotime(date('Y-m-d')))); ?>"></div><div class="col-md-4"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div>');  
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

    function myFunction_dn() {
        var checkBox = document.getElementById("myCheck_dn");
        var text = document.getElementById("text_dn");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>