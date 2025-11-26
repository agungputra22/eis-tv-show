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
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doUpdate_jobdesc') ?>">
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
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>1. TUGAS DAN TANGGUNG JAWAB</b></label> &nbsp; <button type="button" name="add_tugas_tanggung_jawab" id="add_tugas_tanggung_jawab" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; Adalah berisi uraian tugas dan tanggung jawab dari pemegang jabatan dalam melakukan aktivitas pekerjaannya, <br>
                            &nbsp; &nbsp; &nbsp; bisa tugas dan tanggung jawab harian maupun berkala
                        </div>
                        <table class="table table-bordered" id="dynamic_field_tugas_tanggung_jawab">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th width="25" align="center"> NO. </th>
                                    <th align="center"> Keterangan </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($tugas as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="tugas_edit[]" placeholder="Enter" rows="3"><?php echo $row['tugas'] ?></textarea> <input type="hidden" name="id_tugas[]" value="<?php echo $row['id'] ?>"> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>2. WEWENANG</b></label> &nbsp; <button type="button" name="add_wewenang" id="add_wewenang" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; Adalah berisi wewenang yang diberikan kepada pemegang jabatan dalam melaksanakan tugas dan tanggung jawabnya dan hal hal apa saja yang <br>
                            &nbsp; &nbsp; &nbsp; diberikan kepada pemegang jabatan ini tetapi tidak diberikan kepada jabatan lainnya.
                        </div>
                        <table class="table table-bordered" id="dynamic_field_wewenang">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th width="25" align="center"> NO. </th>
                                    <th align="center"> Keterangan </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($wewenang as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="keterangan_wewenang_edit[]" placeholder="Enter" rows="3"><?php echo $row['keterangan'] ?></textarea> <input type="hidden" name="id_wewenang[]" value="<?php echo $row['id'] ?>"> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>3. HUBUNGAN KERJA</b></label> <br>
                            &nbsp; &nbsp; &nbsp; Adalah berisi dengan siapa saja pemegang jabatan berhubungan / bekerja sama untuk kelancaran tugasnya baik didalam maupun diluar perusahaan. <br><br>
                            &nbsp; &nbsp; &nbsp; <b>Internal Perusahaan</b> (Didalam lingkungan PT. TVIP & Strategic Business Unit / SBU ) &nbsp; <button type="button" name="add_kerja_internal" id="add_kerja_internal" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_kerja_internal">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th width="25" align="center"> NO. </th>
                                    <th align="center"> Berhubungan Dengan Pihak </th>
                                    <th align="center"> Tujuan Dalam Berhubungan </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kerja_internal as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="pihak_edit[]" placeholder="Enter" rows="3"><?php echo $row['pihak'] ?></textarea> <input type="hidden" name="id_hubungan_kerja[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status_edit[]" value="<?php echo $row['status'] ?>"> </td>
                                <td> <textarea class="form-control" name="tujuan_edit[]" placeholder="Enter" rows="3"><?php echo $row['tujuan'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <b>Eksternal Perusahaan</b> (Didalam lingkungan PT. TVIP & Strategic Business Unit / SBU ) &nbsp; <button type="button" name="add_kerja_eksternal" id="add_kerja_eksternal" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                        </div>
                        <table class="table table-bordered" id="dynamic_field_kerja_eksternal">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th align="center" width="25"> NO. </th>
                                    <th align="center"> Berhubungan Dengan Pihak </th>
                                    <th align="center"> Tujuan Dalam Berhubungan </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kerja_eksternal as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <textarea class="form-control" name="pihak_edit[]" placeholder="Enter" rows="3"><?php echo $row['pihak'] ?></textarea> <input type="hidden" name="id_hubungan_kerja[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status_edit[]" value="<?php echo $row['status'] ?>"> </td>
                                <td> <textarea class="form-control" name="tujuan_edit[]" placeholder="Enter" rows="3"><?php echo $row['tujuan'] ?></textarea> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>4. PELAPORAN</b></label><br>
                            &nbsp; &nbsp; &nbsp; Adalah berisi laporan yang dibuat oleh pemegang jabatan sebagai pelaporan hasil dari tugas pekerjaannya.
                        </div>
                        <table class="table table-bordered">
                            <tr role="row" class="bg-danger">
                                <th width="200">PERIODE PELAPORAN</th>
                                <th>NAMA LAPORAN</th>
                                <th>DITUJUKAN KEPADA</th>
                            </tr>
                            <tr>
                                <td>Harian <input type="hidden" name="id_pelaporan" value="<?php echo $pelaporan['id'] ?>"></td>
                                <td><textarea class="form-control" name="laporan_harian_edit" placeholder="Enter"><?php echo $pelaporan['laporan_harian'] ?></textarea></td>
                                <td><textarea class="form-control" name="kepada_harian_edit" placeholder="Enter"><?php echo $pelaporan['kepada_harian'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Bulanan</td>
                                <td><textarea class="form-control" name="laporan_bulanan_edit" placeholder="Enter"><?php echo $pelaporan['laporan_bulanan'] ?></textarea></td>
                                <td><textarea class="form-control" name="kepada_bulanan_edit" placeholder="Enter"><?php echo $pelaporan['kepada_bulanan'] ?></textarea></td>
                            </tr>
                            <tr>
                                <td>Tahunan</td>
                                <td><textarea class="form-control" name="laporan_tahunan_edit" placeholder="Enter"><?php echo $pelaporan['laporan_tahunan'] ?></textarea></td>
                                <td><textarea class="form-control" name="kepada_tahunan_edit" placeholder="Enter"><?php echo $pelaporan['kepada_tahunan'] ?></textarea></td>
                            </tr>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>5. SPESIFIKASI JABATAN</b></label> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi persyaratan yang harus dipenuhi oleh pemegang jabatan<br><br>
                            &nbsp; &nbsp; &nbsp; <b>SPESIFIKASI</b>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">PENDIDIKAN FORMAL (MINIMAL)</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['pendidikan'] ?>" name="pendidikan_edit" required>
                                <input type="hidden" name="id_spesifikasi" value="<?php echo $spesifikasi['id'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">NILAI RATA-RATA / IPK (MINIMAL)</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['nilai'] ?>" name="nilai_edit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <b>PENGALAMAN</b>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Fresh Graduate</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['pengalaman_lulus'] ?>" name="pengalaman_lulus_edit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Jurusan sesuai dengan bidang pekerjaan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['pengalaman_sesuai'] ?>" name="pengalaman_sesuai_edit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Jurusan tidak sesuai dengan bidang pekerjaan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['pengalaman_tidak_sesuai'] ?>" name="pengalaman_tidak_sesuai_edit" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-4 control-label">JENIS KELAMIN</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['jenis_kelamin'] ?>" name="jenis_kelamin_edit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">USIA</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['usia'] ?>" name="usia_edit" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">KEAHLIAN/PENGATAHUAN KHUSUS</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" value="<?php echo $spesifikasi['keahlian'] ?>" name="keahlian_edit">
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>STANDAR KOMPETENSI</b></label><br>
                            &nbsp; &nbsp; &nbsp; adalah berisi standar pengetahuan dan keterampilan yang harus dimiliki pemegang jabatan untuk dapat berhasil dalam melaksanakan tugasnya
                        </div>
                        <br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>HARD COMPETENCY</b></label> &nbsp; <button type="button" name="add_hard" id="add_hard" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi kompetensi yang berhubungan dengan pengetahuan yang harus dimiliki dan kemampuan teknis dalam melakukan pekerjaannya
                        </div>
                        <table class="table table-bordered" id="dynamic_field_hard">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th align="center" width="25"> NO. </th>
                                    <th align="center"> Keterangan </th>
                                    <th align="center"> Level </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kompetensi_hard as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <input type="text" class="form-control input-circle" name="keterangan_edit[]" value="<?php echo $row['keterangan'] ?>" placeholder="Enter text" required> <input type="hidden" name="id_kompetensi[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status_kompetensi_edit[]" value="<?php echo $row['status'] ?>"> </td>
                                <td>
                                    <select class="form-control spinner input-circle" name="level_edit[]">
                                        <option>-- Pilih Status --</option>
                                        <?php
                                        foreach (level_jobdesc($id) as $key => $level) {
                                            $s = ($key==$row['level'] ? "selected" : "");
                                            echo "<option value=\"$key\" $s>$level</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>SOFT COMPETENCY</b></label> &nbsp; <button type="button" name="add_soft" id="add_soft" class="btn btn-circle green btn-outline btn-sm"><i class="fa fa-plus"></i> Tambah Data</button> <br>
                            &nbsp; &nbsp; &nbsp; adalah berisi kompetensi yang berhubungan dengan kemampuan mengelola proses kerja dan hubungan interaksi dengan orang lain
                        </div>
                        <table class="table table-bordered" id="dynamic_field_soft">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th align="center" width="25"> NO. </th>
                                    <th align="center"> Keterangan </th>
                                    <th align="center"> Level </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($kompetensi_soft as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <input type="text" class="form-control input-circle" name="keterangan_edit[]" value="<?php echo $row['keterangan'] ?>" placeholder="Enter text" required> <input type="hidden" name="id_kompetensi[]" value="<?php echo $row['id'] ?>"> <input type="hidden" name="status_kompetensi_edit[]" value="<?php echo $row['status'] ?>"> </td>
                                <td>
                                    <select class="form-control spinner input-circle" name="level_edit[]">
                                        <option>-- Pilih Status --</option>
                                        <?php
                                        foreach (level_jobdesc($id) as $key => $level) {
                                            $s = ($key==$row['level'] ? "selected" : "");
                                            echo "<option value=\"$key\" $s>$level</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
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
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_tugas_tanggung_jawab').click(function(){  
           i++;  
           $('#dynamic_field_tugas_tanggung_jawab').append('<tr id="row_tugas_tanggung_jawab'+i+'" class="dynamic-added_tugas_tanggung_jawab"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_tugas_tanggung_jawab">X</button></div></td><td><textarea class="form-control" name="tugas[]" placeholder="Enter"></textarea></td></tr>');  
      });


      $(document).on('click', '.btn_remove_tugas_tanggung_jawab', function(){  
           var button_id = $(this).attr("id");   
           $('#row_tugas_tanggung_jawab'+button_id+'').remove();  
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
                    $('.dynamic-added_tugas_tanggung_jawab').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Analisa Harian
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_wewenang').click(function(){  
           i++;  
           $('#dynamic_field_wewenang').append('<tr id="row_wewenang'+i+'" class="dynamic-added_wewenang"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_wewenang">X</button></div></td><td><textarea class="form-control" name="keterangan_wewenang[]" placeholder="Enter"></textarea></td></tr>');  
      });


      $(document).on('click', '.btn_remove_wewenang', function(){  
           var button_id = $(this).attr("id");   
           $('#row_wewenang'+button_id+'').remove();  
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
                    $('.dynamic-added_wewenang').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Analisa Mingguan
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_kerja_internal').click(function(){  
           i++;  
           $('#dynamic_field_kerja_internal').append('<tr id="row_kerja_internal'+i+'" class="dynamic-added_kerja_internal"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_kerja_internal">X</button></div></td><td><textarea class="form-control" name="pihak[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="tujuan[]" placeholder="Enter" rows="3"></textarea><input type="hidden" name="status[]" value="1"></td></tr>');  
      });


      $(document).on('click', '.btn_remove_kerja_internal', function(){  
           var button_id = $(this).attr("id");   
           $('#row_kerja_internal'+button_id+'').remove();  
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
                    $('.dynamic-added_kerja_internal').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Analisa Bulanan
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_kerja_eksternal').click(function(){  
           i++;  
           $('#dynamic_field_kerja_eksternal').append('<tr id="row_kerja_eksternal'+i+'" class="dynamic-added_kerja_eksternal"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_kerja_eksternal">X</button></div></td><td><textarea class="form-control" name="pihak[]" placeholder="Enter" rows="3"></textarea></td><td><textarea class="form-control" name="tujuan[]" placeholder="Enter" rows="3"></textarea></td><input type="hidden" name="status[]" value="2"></tr>');  
      });


      $(document).on('click', '.btn_remove_kerja_eksternal', function(){  
           var button_id = $(this).attr("id");   
           $('#row_kerja_eksternal'+button_id+'').remove();  
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
                    $('.dynamic-added_kerja_eksternal').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Resiko Kerja
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_hard').click(function(){  
           i++;  
           $('#dynamic_field_hard').append('<tr id="row_hard'+i+'" class="dynamic-added_hard"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_hard">X</button></div></td><td><input type="text" class="form-control input-circle" name="keterangan[]" placeholder="Enter text" required></td><td><select class="form-control input-circle" name="level[]"><option value="">-- Pilih Level --</option><option value="Level 0">Level 0</option><option value="Level 1">Level 1</option><option value="Level 2">Level 2</option><option value="Level 3">Level 3</option><option value="Level 4">Level 4</option></select></td><input type="hidden" name="status_kompetensi[]" value="1"></tr>');  
      });


      $(document).on('click', '.btn_remove_hard', function(){  
           var button_id = $(this).attr("id");   
           $('#row_hard'+button_id+'').remove();  
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
                    $('.dynamic-added_hard').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

    // Data Software
    $(document).ready(function(){      
      var postURL = "<?=base_url('ptk/doInput_jobdesc')?>";
      var i=1;  


      $('#add_soft').click(function(){  
           i++;  
           $('#dynamic_field_soft').append('<tr id="row_soft'+i+'" class="dynamic-added_soft"><td align="center"><div><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove_soft">X</button></div></td><td><input type="text" class="form-control input-circle" name="keterangan[]" placeholder="Enter text" required></td><td><select class="form-control input-circle" name="level[]"><option value="">-- Pilih Level --</option><option value="Level 0">Level 0</option><option value="Level 1">Level 1</option><option value="Level 2">Level 2</option><option value="Level 3">Level 3</option><option value="Level 4">Level 4</option></select></td><input type="hidden" name="status_kompetensi[]" value="2"></tr>');  
      });


      $(document).on('click', '.btn_remove_soft', function(){  
           var button_id = $(this).attr("id");   
           $('#row_soft'+button_id+'').remove();  
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
                    $('.dynamic-added_soft').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });

    });  

</script>