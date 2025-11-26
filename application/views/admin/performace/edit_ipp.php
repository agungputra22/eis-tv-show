<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-performance" method="post" action="<?php echo site_url('performance/doInput_ipp') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Departemen</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['dept_struktur'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">NIK Karyawan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" name="nik_baru" placeholder="Enter text" readonly value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Karyawan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['jabatan_karyawan'] ?>">
                                <input type="hidden" class="form-control input-circle" name="jabatan_struktur" placeholder="Enter text" readonly value="<?php echo $edit['jabatan_struktur'] ?>">
                            </div>
                        </div>
                        &nbsp; &nbsp;
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>A. Activity Plan Deployment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_a" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_anak">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_anak" id="add_anak" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>B. Routine Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_b" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_analisa" id="add_analisa" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>C. Improvement Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_c" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_mingguan">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_analisa_mingguan" id="add_analisa_mingguan" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>D. Supervisory Rules</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_d" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_bulanan">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_analisa_bulanan" id="add_analisa_bulanan" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>E. Kaderisasi</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_e" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_resiko_kerja">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_resiko_kerja" id="add_resiko_kerja" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>F. Special Assignment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_f" class="form-control input-circle" placeholder="" required min="0">
                                </div>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_assignment">
                            <tr role="row" class="bg-primary">
                                <td align="center"> URAIAN </td>
                                <td align="center"> EVALUASI PERIODE </td>
                                <td align="center"> TARGET </td>
                                <td align="center"> <button type="button" name="add_assignment" id="add_assignment" class="btn btn-success">+</button> </td>
                            </tr>
                        </table>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('performance/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/performance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PERFORMANCE.handleSendData();

    // Data Activity Plan Deployment
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_anak').click(function(){  
           i++;  
           $('#dynamic_field_anak').append('<tr id="row_anak'+i+'" class="dynamic-added_anak"><td><textarea class="form-control" name="uraian_a[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_a[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_a[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_anak">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_anak', function(){  
           var button_id = $(this).attr("id");   
           $('#row_anak'+button_id+'').remove();  
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

    // Data Routine Program
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_analisa').click(function(){  
           i++;  
           $('#dynamic_field_analisa').append('<tr id="row_analisa'+i+'" class="dynamic-added_analisa"><td><textarea class="form-control" name="uraian_b[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_b[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_b[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_harian">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_harian', function(){  
           var button_id = $(this).attr("id");   
           $('#row_analisa'+button_id+'').remove();  
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
                    $('.dynamic-added_analisa').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Improvement Program
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_analisa_mingguan').click(function(){  
           i++;  
           $('#dynamic_field_analisa_mingguan').append('<tr id="row_mingguan'+i+'" class="dynamic-added_analisa_mingguan"><td><textarea class="form-control" name="uraian_c[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_c[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_c[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_mingguan">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_mingguan', function(){  
           var button_id = $(this).attr("id");   
           $('#row_mingguan'+button_id+'').remove();  
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
                    $('.dynamic-added_analisa_mingguan').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Supervisory Rules
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_analisa_bulanan').click(function(){  
           i++;  
           $('#dynamic_field_analisa_bulanan').append('<tr id="row_bulanan'+i+'" class="dynamic-added_analisa_bulanan"><td><textarea class="form-control" name="uraian_d[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_d[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_d[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_bulanan">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_bulanan', function(){  
           var button_id = $(this).attr("id");   
           $('#row_bulanan'+button_id+'').remove();  
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
                    $('.dynamic-added_analisa_bulanan').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Kaderisasi
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_resiko_kerja').click(function(){  
           i++;  
           $('#dynamic_field_resiko_kerja').append('<tr id="row_resiko_kerja'+i+'" class="dynamic-added_resiko_kerja"><td><textarea class="form-control" name="uraian_e[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_e[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_e[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_resiko_kerja">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_resiko_kerja', function(){  
           var button_id = $(this).attr("id");   
           $('#row_resiko_kerja'+button_id+'').remove();  
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
                    $('.dynamic-added_resiko_kerja').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Special Assignment
    $(document).ready(function(){      
      var postURL = "<?=base_url('performance/doInput_ipp')?>";
      var i=1;  


      $('#add_assignment').click(function(){  
           i++;  
           $('#dynamic_field_assignment').append('<tr id="row_assignment'+i+'" class="dynamic-added_resiko_kerja"><td><textarea class="form-control" name="uraian_f[]" placeholder="Enter" rows="3"></textarea></td><td><select class="form-control" name="evaluasi_f[]"><option value="">-- Pilih Periode --</option><option value="Harian">Harian</option><option value="Mingguan">Mingguan</option><option value="Bulanan">Bulanan</option><option value="3 Bulan">3 Bulan</option><option value="6 Bulan">6 Bulan</option><option value="Tahunan">Tahunan</option><option value="Sesuai Jadwal">Sesuai Jadwal</option><option value="By Case">By Case</option></select></td><td><textarea class="form-control" name="target_f[]" placeholder="Enter" rows="3"></textarea></td><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_assignment">X</button></div></td></tr>');  
      });


      $(document).on('click', '.btn_remove_assignment', function(){  
           var button_id = $(this).attr("id");   
           $('#row_assignment'+button_id+'').remove();  
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
                    $('.dynamic-added_resiko_kerja').remove();
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
</script>