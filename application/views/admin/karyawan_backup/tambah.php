<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_backup/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form name="input_bahasa" id="input_bahasa" role="form" class="form-horizontal form-karyawan_backup" method="post" action="<?php echo site_url('karyawan_backup/doInput') ?>" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped shadow bahasa" >
                                <table class="table table-bordered" id="dynamic_field_bahasa">
                                    <tr>
                                        <th> Karyawan Berhalangan </th>
                                        <th> Nama Karyawan Backup </th>
                                        <th> Alamat Karyawan Backup </th>
                                        <th> No. KTP / No. SIM </th>
                                        <th> No. Telp </th>
                                        <th> Tanggal </th>
                                        <th> Jam Kerja </th>
                                        <th> Aksi </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="nik_karyawan_pengajuan" class="form-control" placeholder="Enter No Urut" value="<?php echo users('nik_baru'); ?>">
                                            <select name="nik_baru[]" class="bs-select form-control" data-live-search="true">
                                                <option value="">-- Pilih Karyawan --</option>
                                                <?php
                                                foreach ($data_karyawan as $k)
                                                {
                                                    echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="nama_backup[]" class="form-control" placeholder="Enter Nama" >
                                        </td>
                                        <td>
                                            <textarea name="alamat_backup[]" class="form-control" placeholder="Enter Alamat"></textarea>
                                        </td>
                                        <td>
                                            <input type="text" name="no_ktp_backup[]" class="form-control" placeholder="Enter No KTP" >
                                        </td>
                                        <td>
                                            <input type="text" name="no_telp_backup[]" class="form-control" placeholder="Enter No Telp" >
                                        </td>
                                        <td>
                                            <input type="date" name="tanggal_backup[]" class="form-control" placeholder="Enter No Telp" >
                                        </td>
                                        <td>
                                            <select name="jam_kerja[]" class="form-control">
                                            <option value="">-- Pilih Shift --</option>
                                                <?php
                                                foreach ($jam_kerja as $k)
                                                {
                                                    echo "<option value='$k->id_shifting'>$k->waktu_masuk - $k->waktu_keluar</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="button" name="add_bahasa" id="add_bahasa" class="btn btn-success">+</button>
                                        </td>
                                </table>
                            </table>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Upload Dokumen Absen 
                                <span class="font-red">*</span>
                                </label>
                                <div class="col-md-4">
                                    <input type="file" name="upload_dokumen" class="form-control" placeholder="Enter No. Telephone" required="required">
                                    <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                </div>
                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_backup.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_BACKUP.handleSendData();

    // Data Bahasa
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan_backup/doInput')?>";
      var i=1; 
      var b=1;         

      $('#add_bahasa').click(function(){  
           i++;  
           var oplopp = '<option value="">-- Pilih Karyawan --</option>';

           var oplopp_2 = '<option value="">-- Pilih Shift --</option>';
           
           var select = '<select name="nik_baru[]" class="bs-select form-control select'+i+'" data-live-search="true">'+oplopp+'</select>';

           var jam = '<select name="jam_kerja[]" class="bs-select form-control select'+b+'" data-live-search="true">'+oplopp_2+'</select>';

           var html = '<tr id="row'+i+'" class="dynamic-added_bahasa">';
           html += '<td>'+select+'</td>';
           html += '<td><input type="text" name="nama_backup[]" class="form-control" placeholder="Enter Nama" ></td>';
           html += '<td><textarea name="alamat_backup[]" class="form-control" placeholder="Enter Alamat"></textarea></td>';
           html += '<td><input type="text" name="no_ktp_backup[]" class="form-control" placeholder="Enter No KTP" ></td>';
           html += '<td><input type="text" name="no_telp_backup[]" class="form-control" placeholder="Enter No Telp" ></td>';
           html += '<td><input type="date" name="tanggal_backup[]" class="form-control" placeholder="Enter No Telp" ></td>';
           html += '<td>'+jam+'</td>';
           html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>';
           html += '</tr>';
           $('#dynamic_field_bahasa').append(html);  


           $.ajax({
                url: "<?=base_url('karyawan_backup/tampil_karyawan')?>",
                method: "POST",
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $('.select'+i).append('<option value="'+value.nik_baru+'">'+value.nama_karyawan_struktur+'</option>');
                    });
                },
            });

           $.ajax({
                url: "<?=base_url('karyawan_backup/tampil_jam_kerja')?>",
                method: "POST",
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $('.select'+b).append('<option value="'+value.id_shifting+'">'+value.waktu_masuk+' - '+value.waktu_keluar+'</option>');
                    });
                }
            });
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_bahasa').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_bahasa').remove();
                    $('#input_bahasa')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });
</script>