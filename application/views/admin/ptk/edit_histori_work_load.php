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
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doUpdate_work_load') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Departemen</label>
                            <div class="col-md-4">
                                <input type="hidden" class="form-control input-circle" name="no_jabatan_karyawan" placeholder="Enter text" required readonly="" value="<?php echo $edit['no_jabatan_karyawan'] ?>">
                                <input type="text" class="form-control input-circle" name="nama_departement" placeholder="Enter text" required readonly="" value="<?php echo $edit['nama_departement'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" required readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Level Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" required readonly="" value="<?php echo $edit['level_jabatan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Job Summary (Ikhtisar Jabatan) </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="deskripsi" placeholder="Detail Jabatan" rows="5"><?php echo $deskripsi['deskripsi'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>Alur Proses per Jabatan</b></label> <br><br>
                            <div class="col-md-2">
                                <button type="button" name="add_anak" id="add_anak" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_anak">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> INPUT </th>
                                    <th> PROSES </th>
                                    <th> OUTPUT </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($jabatan_proses as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="input[]" placeholder="Enter" rows="3"><?php echo $row['input'] ?></textarea> <input type="hidden" name="id_proses[]" value="<?php echo $row['id'] ?>"> </td>
                                <td> <textarea class="form-control" name="proses[]" placeholder="Enter" rows="3"><?php echo $row['proses'] ?></textarea> </td>
                                <td> <textarea class="form-control" name="output[]" placeholder="Enter" rows="3"><?php echo $row['output'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>Analisa Beban Kerja (DAILY BASIC)</b></label> <br><br>
                            <div class="col-md-2">
                                <button type="button" name="add_analisa" id="add_analisa" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> Detail Job Description </th>
                                    <th> Hour </th>
                                    <th> Remarks </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($beban_daily as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="detail_deskripsi[]" placeholder="Enter" rows="3"><?php echo $row['detail_deskripsi'] ?></textarea> <input type="hidden" name="id_analisa[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status[]" value="<?php echo $row['status'] ?>"> </td>
                                <td> <textarea class="form-control" name="jam[]" placeholder="Enter" rows="3"><?php echo $row['jam'] ?></textarea> </td>
                                <td> <textarea class="form-control" name="keterangan[]" placeholder="Enter" rows="3"><?php echo $row['keterangan'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>Analisa Beban Kerja (WEEKLY BASIC)</b></label> <br><br>
                            <div class="col-md-2">
                                <button type="button" name="add_analisa_mingguan" id="add_analisa_mingguan" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_mingguan">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> Detail Job Description </th>
                                    <th> Hour </th>
                                    <th> Remarks </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($beban_weakly as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="detail_deskripsi[]" placeholder="Enter" rows="3"><?php echo $row['detail_deskripsi'] ?></textarea> <input type="hidden" name="id_analisa[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status[]" value="<?php echo $row['status'] ?>"> </td>
                                <td> <textarea class="form-control" name="jam[]" placeholder="Enter" rows="3"><?php echo $row['jam'] ?></textarea> </td>
                                <td> <textarea class="form-control" name="keterangan[]" placeholder="Enter" rows="3"><?php echo $row['keterangan'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>Analisa Beban Kerja (MONTYLY BASIC)</b></label> <br><br>
                            <div class="col-md-2">
                                <button type="button" name="add_analisa_bulanan" id="add_analisa_bulanan" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_bulanan">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> Detail Job Description </th>
                                    <th> Hour </th>
                                    <th> Remarks </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($beban_monthly as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="detail_deskripsi[]" placeholder="Enter" rows="3"><?php echo $row['detail_deskripsi'] ?></textarea> <input type="hidden" name="id_analisa[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status[]" value="<?php echo $row['status'] ?>"> </td>
                                <td> <textarea class="form-control" name="jam[]" placeholder="Enter" rows="3"><?php echo $row['jam'] ?></textarea> </td>
                                <td> <textarea class="form-control" name="keterangan[]" placeholder="Enter" rows="3"><?php echo $row['keterangan'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>Resiko Kerja</b></label> <br><br>
                            <div class="col-md-2">
                                <button type="button" name="add_resiko_kerja" id="add_resiko_kerja" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_resiko_kerja">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> Nama Penyakit / Jenis Kecelakaan Kerja </th>
                                    <th> Saat melakukan mobile recruitment </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($resiko as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="nama_penyakit[]" placeholder="Enter" rows="3"><?php echo $row['nama_penyakit'] ?></textarea> <input type="hidden" name="id_resiko[]" value="<?php echo $row['id'] ?>"> </td>
                                <td> <textarea class="form-control" name="penyebab[]" placeholder="Enter" rows="3"><?php echo $row['penyebab'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <br><br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('ptk/index_work_load') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleSendData();

    // Data Anak
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_anak').click(function(){  
           i++;  
           $('#dynamic_field_anak').append('<tr id="row_anak'+i+'" class="dynamic-added_anak"><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_anak">X</button></div></td><td><textarea class="form-control" name="input_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="proses_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="output_tambah[]" placeholder="Enter" rows="3"></textarea></td></tr>');  
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

    // Data Analisa Harian
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_analisa').click(function(){  
           i++;  
           $('#dynamic_field_analisa').append('<tr id="row_analisa'+i+'" class="dynamic-added_analisa"><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_harian">X</button></div></td><td><textarea class="form-control" name="detail_deskripsi_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="jam_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="keterangan_tambah[]" placeholder="Enter" rows="3"></textarea><input type="hidden" name="status_tambah[]" value="1"></td></tr>');  
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

    // Data Analisa Mingguan
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_analisa_mingguan').click(function(){  
           i++;  
           $('#dynamic_field_analisa_mingguan').append('<tr id="row_mingguan'+i+'" class="dynamic-added_analisa_mingguan"><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_mingguan">X</button></div></td><td><textarea class="form-control" name="detail_deskripsi_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="jam_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="keterangan_tambah[]" placeholder="Enter" rows="3"></textarea><input type="hidden" name="status_tambah[]" value="2"></td></tr>');  
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

    // Data Analisa Bulanan
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_analisa_bulanan').click(function(){  
           i++;  
           $('#dynamic_field_analisa_bulanan').append('<tr id="row_bulanan'+i+'" class="dynamic-added_analisa_bulanan"><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_bulanan">X</button></div></td><td><textarea class="form-control" name="detail_deskripsi_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="jam_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="keterangan_tambah[]" placeholder="Enter" rows="3"></textarea></td><input type="hidden" name="status_tambah[]" value="3"></tr>');  
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

    // Data Resiko Kerja
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_resiko_kerja').click(function(){  
           i++;  
           $('#dynamic_field_resiko_kerja').append('<tr id="row_resiko_kerja'+i+'" class="dynamic-added_resiko_kerja"><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_resiko_kerja">X</button></div></td><td><textarea class="form-control" name="nama_penyakit_tambah[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="penyebab_tambah[]" placeholder="Enter" rows="3"></textarea></td></tr>');  
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