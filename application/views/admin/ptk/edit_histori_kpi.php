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
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doUpdate_kpi') ?>">
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
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>KUANTITATIF</b></label> &nbsp; <button type="button" name="add_kuantitatif" id="add_kuantitatif" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi sasaran / target dari pemegang jabatan yang harus dicapai dalam melakukan aktivitas pekerjaannya dan dilakukan pengukuran secara periodik
                        </div>
                        <table class="table table-bordered" id="dynamic_field_kuantitatif">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th width="25" align="center"> NO. </th>
                                    <th align="center"> Uraian </th>
                                    <th align="center" width="100"> Bobot* </th>
                                    <th align="center"> Rumus </th>
                                    <th align="center" width="100"> Target </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kuantitatif as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="deskripsi_kuan_edit[]" placeholder="Enter" rows="3"><?php echo $row['deskripsi'] ?></textarea> <input type="hidden" name="id_kuan[]" value="<?php echo $row['id'] ?>"> </td>
                                <td> <input type="number" name="bobot_edit[]" class="form-control" min="0" max="100" value="<?php echo $row['bobot'] ?>"> </td>
                                <td> <textarea class="form-control" name="rumus_edit[]" placeholder="Enter" rows="3"><?php echo $row['rumus'] ?></textarea> </td>
                                <td> <input type="number" name="target_edit[]" class="form-control" min="0" max="100" value="<?php echo $row['target'] ?>"> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; Keterangan : * = bila menggunakan bobot
                        </div>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>KUALITATIF</b></label> &nbsp; <button type="button" name="add_kualitif" id="add_kualitif" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi sasaran / target dari pemegang jabatan yang perlu dilakukan dalam meminimalisir / mengantisifasi atas ketidaksesuaian.
                        </div>
                        <table class="table table-bordered" id="dynamic_field_kualitif">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th width="25" align="center"> NO. </th>
                                    <th align="center"> Keterangan </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kualitatif as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="deskripsi_kual_edit[]" placeholder="Enter" rows="3"><?php echo $row['deskripsi'] ?></textarea> <input type="hidden" name="id_kual[]" value="<?php echo $row['id'] ?>"> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('ptk/index_kpi') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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

    // Data Kuantitatif
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_kpi')?>";
      var i=1;  


      $('#add_kuantitatif').click(function(){  
           i++;  
           $('#dynamic_field_kuantitatif').append('<tr id="row_kuantitatif'+i+'" class="dynamic-added_kuantitatif"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_kuantitatif">X</button></div></td><td><textarea class="form-control" name="deskripsi_kuan[]" required placeholder="Enter"></textarea></td><td><input type="number" name="bobot[]" class="form-control" min="0" max="100" required placeholder="Enter"></td><td><textarea class="form-control" name="rumus[]" required placeholder="Enter"></textarea></td><td><input type="number" name="target[]" class="form-control" min="0" max="100" required placeholder="Enter"></td></tr>');  
      });


      $(document).on('click', '.btn_remove_kuantitatif', function(){  
           var button_id = $(this).attr("id");   
           $('#row_kuantitatif'+button_id+'').remove();  
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
                    $('.dynamic-added_kuantitatif').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Analisa Harian
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_kpi')?>";
      var i=1;  


      $('#add_kualitif').click(function(){  
           i++;  
           $('#dynamic_field_kualitif').append('<tr id="row_kualitif'+i+'" class="dynamic-added_kualitif"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_kualitif">X</button></div></td><td><textarea class="form-control" name="deskripsi_kual[]" placeholder="Enter"></textarea></td></tr>');  
      });


      $(document).on('click', '.btn_remove_kualitif', function(){  
           var button_id = $(this).attr("id");   
           $('#row_kualitif'+button_id+'').remove();  
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
                    $('.dynamic-added_kualitif').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

</script>