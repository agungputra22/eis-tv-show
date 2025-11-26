<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_bko/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form name="input_bahasa" id="input_bahasa" role="form" class="form-horizontal form-karyawan_bko" method="post" action="<?php echo site_url('karyawan_bko/doInput') ?>" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped shadow bahasa" >
                                <table class="table table-bordered" id="dynamic_field_bahasa">
                                    <tr>
                                        <th> Perusahaan </th>
                                        <th> Tanggal Awal </th>
                                        <th> Tanggal Akhir </th>
                                        <th> Nama Karyawan </th>
                                        <th> No. KTP / No. SIM</th>
                                        <th> Depo</th>
                                        <th> Aksi </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="perusahaan_karyawan[]" class="form-control" id="perusahaan_karyawan">
                                            <option>-- Pilih Perusahaan --</option>
                                                <?php
                                                foreach ($perusahaan as $k)
                                                {
                                                    echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="start_date[]" class="form-control" placeholder="Enter Nama" >
                                        </td>
                                        <td>
                                            <input type="date" name="end_date[]" class="form-control" placeholder="Enter No KTP" >
                                        </td>
                                        <td>
                                            <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter No Urut" value="<?php echo users('nik_baru'); ?>">
                                            <input type="text" name="nama_karyawan[]" class="form-control" placeholder="Enter Nama" >
                                        </td>
                                        <td>
                                            <input type="text" name="no_identitas[]" class="form-control" placeholder="Enter No KTP" >
                                        </td>
                                        <td>
                                            <select name="depo_karyawan[]" class="form-control" id="depo_karyawan">
                                            <option>-- Pilih Kantor Cabang --</option>
                                                <?php
                                                foreach ($depo as $k)
                                                {
                                                    echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
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
                                <label class="col-md-3 control-label">Upload Dokumen 
                                <span class="font-red">*</span>
                                </label>
                                <div class="col-md-4">
                                    <input type="file" name="upload_dokumen" class="form-control" placeholder="Enter No. Telephone" required="required">
                                    <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d h:i:s'); ?>">
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan_bko.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_BKO.handleSendData();

    // Data Bahasa
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan_bko/doInput')?>";
      var i=1;  
      var b=1;

      $('#add_bahasa').click(function(){  
           i++;  
           var oplopp = '<option value="">-- Pilih Perusahaan --</option>';

           var oplopp_2 = '<option value="">-- Pilih Kantor Cabang --</option>';

           var select = '<select name="perusahaan_karyawan[]" class="bs-select form-control select'+i+'" data-live-search="true">'+oplopp+'</select>';

           var depo = '<select name="depo_karyawan[]" class="bs-select form-control select'+b+'" data-live-search="true">'+oplopp_2+'</select>';

           var html = '<tr id="row'+i+'" class="dynamic-added_bahasa">';
           html += '<td>'+select+'</td>';
           html += '<td><input type="date" name="start_date[]" class="form-control" placeholder="Enter No KTP" ></td>';
           html += '<td><input type="date" name="end_date[]" class="form-control" placeholder="Enter No KTP" ></td>';
           html += '<td><input type="text" name="nama_karyawan[]" class="form-control" placeholder="Enter Nama" ></td>';
            html += '<td><input type="text" name="no_identitas[]" class="form-control" placeholder="Enter No KTP" ></td>';
           html += '<td>'+depo+'</td>';
           html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>';
           html += '</tr>';
           $('#dynamic_field_bahasa').append(html);  

           $.ajax({
                url: "<?=base_url('karyawan_bko/tampil_perusahaan')?>",
                method: "POST",
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $('.select'+i).append('<option value="'+value.perusahaan_nama+'">'+value.perusahaan_nama+'</option>');
                    });
                },
            });

           $.ajax({
                url: "<?=base_url('karyawan_bko/tampil_depo')?>",
                method: "POST",
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $('.select'+b).append('<option value="'+value.depo_nama+'">'+value.depo_nama+'</option>');
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