<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_project/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form name="input_bahasa" id="input_bahasa" role="form" class="form-horizontal form-karyawan_project" method="post" action="<?php echo site_url('karyawan_project/doInput') ?>" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped shadow bahasa" >
                                <table class="table table-bordered" id="dynamic_field_bahasa">
                                    <tr>
                                        <th width="200"> Nama </th>
                                        <th width="200"> Lokasi Awal </th>
                                        <th width="200"> Lokasi Akhir </th>
                                        <th width="200"> Jabatan Awal </th>
                                        <th width="200"> Jabatan Akhir </th>
                                        <th> Start </th>
                                        <th> End </th>
                                        <th> Aksi </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter No Urut" value="<?php echo users('nik_baru'); ?>">
                                            <select name="nik_karyawan[]" id="nik_karyawan0" class="js-example-basic-single form-control" data-live-search="true" onchange="getFormDataKaryawan(0)">
                                                <option value="">-- Pilih Karyawan --</option>
                                                <?php
                                                foreach ($data_karyawan as $k)
                                                {
                                                    echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="lokasi_awal[]" id="lokasi_awal0" class="form-control" placeholder="Enter" readonly>
                                        </td>
                                        <td>
                                            <select name="depo_karyawan[]" id="depo_karyawan0" class="js-example-basic-single form-control">
                                            <option>-- Pilih Kantor --</option>
                                                <?php
                                                foreach ($depo as $k)
                                                {
                                                    echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="jabatan_awal[]" id="jabatan_awal0" class="form-control" placeholder="Enter" readonly>
                                            <input type="hidden" name="kode_jabatan_awal[]" id="kode_jabatan_awal0" class="form-control" placeholder="Enter" readonly>
                                        </td>
                                        <td>
                                            <select name="jabatan_akhir[]" id="jabatan_akhir0" class="js-example-basic-single form-control">
                                            <option>-- Pilih Jabatan --</option>
                                                <?php
                                                foreach ($jabatan as $k)
                                                {
                                                    echo "<option value='$k->no_jabatan_karyawan'>$k->jabatan_karyawan ($k->tempat)</option>";
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="date" name="start_date[]" id="start_date0" class="form-control" placeholder="Enter">
                                        </td>
                                        <td>
                                            <input type="date" name="end_date[]" id="end_date0" class="form-control" placeholder="Enter">
                                        </td>
                                        <td>
                                            <button type="button" name="add_bahasa" id="add_bahasa" class="btn btn-success">+</button>
                                        </td>
                                </table>
                            </table>
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">Upload Dokumen Absen 
                                <span class="font-red">*</span>
                                </label>
                                <div class="col-md-4">
                                    <input type="file" name="upload_dokumen" class="form-control" placeholder="Enter No. Telephone" >
                                    <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                </div>
                            </div> -->
                            <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan_project.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_PROJECT.handleSendData();

    function getFormDataKaryawan(x) {
        var nik_absen = document.getElementById('nik_karyawan' + x).value;
        $.ajax({
            url: "<?= base_url('karyawan_project/getFormDataKaryawan') ?>",
            method: "POST",
            data: {
                nik_absen: nik_absen,
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                for (var row of data) {
                    document.getElementById('lokasi_awal' + x).value = row.lokasi_hrd;
                    document.getElementById('jabatan_awal' + x).value = row.jabatan_karyawan;                    
                    document.getElementById('kode_jabatan_awal' + x).value = row.jabatan_hrd;                    
                    if (row.end_date != null) {
                        if (row.end_date_final <= row.date_now) {
                            $("#start_date" + x).attr({
                               "min" : row.date_now_1,
                               "max" : row.date_now_1
                            });
                            $("#end_date" + x).attr({
                               "min" : row.date_now_1,
                               "max" : row.lock_date_now_1
                            });
                        } else {
                            $("#start_date" + x).attr({
                               "min" : row.end_date_final,
                               "max" : row.end_date_final
                            });
                            $("#end_date" + x).attr({
                               "min" : row.end_date_final,
                               "max" : row.lock_end_date_final
                            });
                        }
                    } else {
                        var tanggal = new Date();
                        $("#start_date" + x).attr({
                           "min" : row.end_date_final,
                           "max" : row.end_date_final
                        });
                        $("#end_date" + x).attr({
                           "min" : row.end_date_final,
                           "max" : row.lock_end_date_final
                        });
                    }
                }
            }
        })
    }

    // Data Bahasa
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan_project/doInput')?>";
      var i=1;  
      var b=1;
      var c=1;

      $('#add_bahasa').click(function(){  
           i++;  
           var oplopp = '<option value="">-- Pilih Karyawan --</option>';
           oplopp += "<?php foreach ($data_karyawan as $value) { ?>";
           oplopp += "<option value='<?= $value->nik_baru; ?>'><?= $value->nama_karyawan_struktur; ?> (<?= $value->nik_baru; ?>)</option>";
           oplopp += "<?php } ?>";

           var oplopp_2 = '<option value="">-- Pilih Kantor --</option>';
           oplopp_2 += "<?php foreach ($depo as $value) { ?>";
           oplopp_2 += "<option value='<?= $value->depo_nama; ?>'><?= $value->depo_nama; ?></option>";
           oplopp_2 += "<?php } ?>";

           var oplopp_3 = '<option value="">-- Pilih Jabatan --</option>';
           oplopp_3 += "<?php foreach ($jabatan as $value) { ?>";
           oplopp_3 += "<option value='<?= $value->no_jabatan_karyawan; ?>'><?= $value->jabatan_karyawan; ?> (<?= $value->tempat; ?>)</option>";
           oplopp_3 += "<?php } ?>";

           var select = '<select name="nik_karyawan[]" id="nik_karyawan'+i+'" class="js-example-basic-single form-control select'+i+'" required data-live-search="true" onchange="getFormDataKaryawan('+i+')">'+oplopp+'</select>';

           var depo = '<select name="depo_karyawan[]" id="depo_karyawan'+i+'" class="js-example-basic-single form-control select'+b+'" data-live-search="true">'+oplopp_2+'</select>';

           var jabatan = '<select name="jabatan_akhir[]" class="js-example-basic-single form-control select'+c+'" data-live-search="true">'+oplopp_3+'</select>';

           var html = '<tr id="row'+i+'" class="dynamic-added_bahasa">';
           html += '<td>'+select+'</td>';
           html += '<td><input type="text" name="lokasi_awal[]" id="lokasi_awal'+i+'" class="form-control" placeholder="Enter" readonly></td>';
           html += '<td>'+depo+'</td>';
           html += '<td><input type="text" name="jabatan_awal[]" id="jabatan_awal'+i+'" class="form-control" placeholder="Enter" readonly><input type="hidden" name="kode_jabatan_awal[]" id="kode_jabatan_awal'+i+'" class="form-control" placeholder="Enter" readonly></td>';
           html += '<td>'+jabatan+'</td>';
           html += '<td><input type="date" name="start_date[]" id="start_date'+i+'" class="form-control" placeholder="Enter"></td>';
           html += '<td><input type="date" name="end_date[]" id="end_date'+i+'" class="form-control" placeholder="Enter"></td>';
           html += '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>';
           html += '</tr>';
           $('#dynamic_field_bahasa').append(html);  
           $(".js-example-basic-single").select2(); 

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

<!-- SELECT2 -->
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            placeholder: "-- Pilih Karyawan --"
        });
    });
</script>