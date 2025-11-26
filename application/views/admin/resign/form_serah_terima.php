<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('resign/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-resign" method="post" action="<?php echo site_url('resign/doInputSerahTerima') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Lengkap 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Tanggal Masuk
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['join_date_struktur']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Depo / Dept
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'].' / '.$edit['kode_departement'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Tanggal Resign
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['tanggal_efektif_resign']) ?>">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>YANG MENERIMA</b>
                            
                            </label>
                            <div class="col-md-3"> </div>

                            <label class="col-md-2 control-label">
                            
                            </label>
                            <div class="col-md-3"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>PERSONEL 1</b>
                            
                            </label>
                            <div class="col-md-3"> </div>

                            <label class="col-md-2 control-label"><b>PERSONEL 2</b>
                            
                            </label>
                            <div class="col-md-3"> </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK Lama 
                            
                            </label>
                            <div class="col-md-3">
                                <select name="" id="nik_lama" class="bs-select form-control" data-live-search="true" data-size="8">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->badgenumber'>$k->name ($k->badgenumber)</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label class="col-md-2 control-label">NIK Baru 
                            
                            </label>
                            <div class="col-md-3">
                                <select name="" id="nik_baru" class="bs-select form-control" data-live-search="true" data-size="8">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->badgenumber'>$k->name ($k->badgenumber)</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK Karyawan 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_tampil_lama" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                            </div>

                            <label class="col-md-2 control-label">NIK Karyawan 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_tampil_baru" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="name_lama" class="form-control" required="" placeholder="Enter Nama Karyawan" readonly="">
                            </div>

                            <label class="col-md-2 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="name_baru" class="form-control" required="" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">YANG DISERAHKAN :</label>
                        </div>
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">A. ALAT KERJA & INVENTARIS</label>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_anak">
                            <tr role="row" class="bg-primary">
                                <td align="center"> ITEM ALAT KERJA </td>
                                <td align="center"> JUMLAH </td>
                                <td align="center"> SATUAN </td>
                                <td align="center"> KONDISI </td>
                                <td align="center"> KETERANGAN </td>
                                <td align="center"> AKSI </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" name="alat_kerja[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="jumlah_alat_kerja[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="satuan_alat_kerja[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="kondisi_alat_kerja[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="keterangan_alat_kerja[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <button type="button" name="add_anak" id="add_anak" class="btn btn-success">+</button>
                                </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">B. DOKUMEN</label>
                        </div>
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">HARDCOPY</label>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa">
                            <tr role="row" class="bg-primary">
                                <td align="center"> NAMA DOKUMEN & NO DOKUMEN </td>
                                <td align="center"> JUMLAH </td>
                                <td align="center"> SATUAN </td>
                                <td align="center"> TEMPAT </td>
                                <td align="center"> KETERANGAN </td>
                                <td align="center"> AKSI </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" name="nama_hardcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="jumlah_hardcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="satuan_hardcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="tempat_hardcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="keterangan_hardcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <button type="button" name="add_analisa" id="add_analisa" class="btn btn-success">+</button>
                                </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">SOFTCOPY</label>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_mingguan">
                            <tr role="row" class="bg-primary">
                                <td rowspan="2" align="center"> NAMA FILE </td>
                                <td colspan="2" align="center"> PENYIMPANAN </td>
                                <td rowspan="2" align="center"> KETERANGAN </td>
                                <td rowspan="2" align="center"> AKSI </td>
                            </tr>
                            <tr role="row" class="bg-primary">
                                <td align="center">NO PC</td>
                                <td align="center">JENIS PENYIMPANAN</td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" name="nama_softcopy[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="no_software[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="jenis_software[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="keterangan_software[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <button type="button" name="add_analisa_mingguan" id="add_analisa_mingguan" class="btn btn-success">+</button>
                                </td>
                            </tr>
                        </table>
                        <h5><span class="font-red">*Hanya untuk Kepala Departemen diserahterimakan ke MIS (Coret salah satu di keterangan)</span></h5>
                        &nbsp;
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">C. PROJECT</label>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_analisa_bulanan">
                            <tr role="row" class="bg-primary">
                                <td align="center"> NAMA PROJECT </td>
                                <td align="center"> SDM YANG TERLIBAT </td>
                                <td align="center"> HASIL </td>
                                <td align="center"> OUTSTANDING </td>
                                <td align="center"> DEADLINE </td>
                                <td align="center"> AKSI </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" name="nama_project[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="sdm_project[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="hasil_project[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="outstanding_project[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="deadline_project[]">
                                </td>
                                <td>
                                    <button type="button" name="add_analisa_bulanan" id="add_analisa_bulanan" class="btn btn-success">+</button>
                                </td>
                            </tr>
                        </table>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">D. SDM</label>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_resiko_kerja">
                            <tr role="row" class="bg-primary">
                                <td rowspan="3" align="center"> JABATAN </td>
                                <td rowspan="3" align="center"> JUMLAH </td>
                                <td rowspan="3" align="center"> JENIS KELAMIN </td>
                                <td colspan="6" align="center"> SEDANG DALAM PROSES </td>
                                <td rowspan="3" align="center"> KETERANGAN </td>
                                <td rowspan="3" align="center"> AKSI </td>
                            </tr>
                            <tr role="row" class="bg-primary">
                                <td align="center" rowspan="2"> PROMOSI </td>
                                <td align="center" rowspan="2"> MUTASI </td>
                                <td align="center" rowspan="2"> DEMOSI </td>
                                <td colspan="3" align="center"> SURAT PERINGATAN </td>
                            </tr>
                            <tr role="row" class="bg-primary">
                                <td align="center"> 1 </td>
                                <td align="center"> 2 </td>
                                <td align="center"> 3 </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea class="form-control" name="jabatan_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="jumlah_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="jenis_kelamin_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="promosi_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="mutasi_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="demosi_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="sp1_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="sp2_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="sp3_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <textarea class="form-control" name="keterangan_sdm[]" placeholder="Enter" rows="2"></textarea>
                                </td>
                                <td>
                                    <button type="button" name="add_resiko_kerja" id="add_resiko_kerja" class="btn btn-success">+</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <h5><span class="font-black bold">Lampiran : OJT karyawan baru yang sudah dijalankan</span></h5>
                    &nbsp;
                    <h5><span class="font-red bold">Dokumen yang diisi sesuai dengan kebutuhan <br> **) Diisi sesuai dengan kebutuhan</span></h5>
                    &nbsp;
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn blue btn-block"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.handleSendData();
    window.RESIGN.handleBootstrapSelect();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('resign/tampil_nik_baru')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nik_tampil_baru']").val(value.badgenumber);
                        $("input[name='name_baru']").val(value.name);
                    });
                },
            });
          }
     });

    $("#nik_lama").change(function () {
          if ($(this).val() != "") {
          var nik_lama=$('#nik_lama').val();
            $.ajax({
                url: "<?=base_url('resign/tampil_nik_lama')?>",
                method: "POST",
                data: { 'nik_lama': nik_lama },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nik_tampil_lama']").val(value.badgenumber);
                        $("input[name='name_lama']").val(value.name);
                    });
                },
            });
          }
     });

    // Data Anak
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_work_load')?>";
      var i=1;  


      $('#add_anak').click(function(){  
           i++;  
           $('#dynamic_field_anak').append('<tr id="row_anak'+i+'" class="dynamic-added_anak"><td><textarea class="form-control" name="alat_kerja[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="jumlah_alat_kerja[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="satuan_alat_kerja[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="kondisi_alat_kerja[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="keterangan_alat_kerja[]" placeholder="Enter" rows="2"></textarea></td><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_anak">X</button></div></td></tr>');  
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
           $('#dynamic_field_analisa').append('<tr id="row_analisa'+i+'" class="dynamic-added_analisa"><td><textarea class="form-control" name="nama_hardcopy[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="jumlah_hardcopy[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="satuan_hardcopy[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="tempat_hardcopy[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="keterangan_hardcopy[]" placeholder="Enter" rows="2"></textarea></td><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_harian">X</button></div></td></tr>');  
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
           $('#dynamic_field_analisa_mingguan').append('<tr id="row_mingguan'+i+'" class="dynamic-added_analisa_mingguan"><td><textarea class="form-control" name="nama_softcopy[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="no_software[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="jenis_software[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="keterangan_software[]" placeholder="Enter" rows="2"></textarea></td><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_mingguan">X</button></div></td></tr>');  
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
           $('#dynamic_field_analisa_bulanan').append('<tr id="row_bulanan'+i+'" class="dynamic-added_analisa_bulanan"><td><textarea class="form-control" name="nama_project[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="sdm_project[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="hasil_project[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="outstanding_project[]" placeholder="Enter" rows="2"></textarea></td><td><input type="date" class="form-control" name="deadline_project[]"></td><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_bulanan">X</button></div></td></tr>');  
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
           $('#dynamic_field_resiko_kerja').append('<tr id="row_resiko_kerja'+i+'" class="dynamic-added_resiko_kerja"><td><textarea class="form-control" name="jabatan_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="jumlah_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="jenis_kelamin_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="promosi_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="mutasi_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="demosi_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="sp1_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="sp2_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="sp3_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><textarea class="form-control" name="keterangan_sdm[]" placeholder="Enter" rows="2"></textarea></td><td><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_resiko_kerja">X</button></div></td></tr>');  
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
</script>