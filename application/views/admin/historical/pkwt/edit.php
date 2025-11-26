<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_pkwt" method="post" action="<?php echo site_url('historical_pkwt/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Kontrak
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_historical" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_historical'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" value="<?php echo $edit['nik_baru'] ?>" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10">
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_historical_edit" id="nama_lengkap" class="form-control" placeholder="Enter Nama Karyawan" readonly="" value="<?php echo $edit['nama_karyawan_historical'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_historical_edit" id="jabatan_historical" class="form-control" placeholder="Enter Jabatan" readonly="" value="<?php echo $edit['jabatan_historical'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status Karyawan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" id="kontrak" name="status_karyawan_pkwt" value="Kontrak" <?php in_array ('Kontrak', $edit) ? print "checked" : ""; ?> >Kontrak
                                <input type="checkbox" id="checkbox" name="status_karyawan_pkwt" value="Tetap" <?php in_array ('Tetap', $edit) ? print "checked" : ""; ?> data-toggle="collapse" data-target="#status_karyawan_pkwt" aria-expanded="false" aria-controls="status_karyawan_pkwt">Tetap
                            </div>
                            <div class="col-md-2">
                                <select name="karyawan_status" class="form-control">
                                    <option><?php echo $edit['karyawan_status'] ?></option>
                                    <option>Aktif</option>
                                    <option>Non Aktif</option>
                                </select>
                            </div>
                        </div>

                        <ul>
                            <li>
                                Kontrak Kerja
                            </li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Start  
                            
                            </label>
                            <div class="col-md-2">
                                <input type="date" name="start_pkwt_1" class="form-control" readonly="" placeholder="Enter " value="<?php echo $edit['start_pkwt_1'] ?>">
                            </div>
                            <label class="col-md-2 control-label">End  
                            
                            </label>
                            <div class="col-md-2">
                                <input type="date" name="end_pkwt_1" class="form-control" readonly="" placeholder="Enter Jabatan Akhir" value="<?php echo $edit['end_pkwt_1'] ?>"> <br>
                                <input type="file" name="dokumen_pkwt_1" class="form-control" placeholder="Enter ">
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle yellow btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak Kontrak 1 </a>
                            </div>
                        </div>

                        <ul>
                            <li>
                                Kontrak Kerja 2
                            </li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Start 
                            
                            </label>
                            <div class="col-md-2">
                                <input type="date" name="start_pkwt_2" id="start_pkwt_1" class="form-control" placeholder="Enter Perusahaan" value="<?php echo $edit['start_pkwt_2'] ?>">
                            </div>
                            <label class="col-md-2 control-label">Masa Kerja  
                            
                            </label>
                            <div class="col-md-2">
                                <select name="masa_kerja_2" id="masa_kerja_2" class="form-control">
                                    <?php
                                        $masa_kerja = $edit['masa_kerja_2'];
                                        if ($masa_kerja <= 365) {
                                            # code...
                                            echo "
                                            <option value='182' id='tgl2'>6 Bulan</option>";
                                            
                                        } elseif ($masa_kerja <= 547) {
                                            # code...
                                            echo "
                                            <option value='182' id='tgl2'>6 Bulan</option>
                                            <option value='365' id='tgl2'>1 Tahun</option>";
                                        } elseif ($masa_kerja <= 730) {
                                            # code...
                                            echo "
                                            <option value='182' id='tgl2'>6 Bulan</option>
                                            <option value='365' id='tgl2'>1 Tahun</option>
                                            <option value='547' id='tgl2'>1,5 Tahun</option>";
                                        } else {
                                            echo "Kontrak Sudah Minimum";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle yellow btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak Kontrak 2 </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">End 
                                            
                            </label>
                            <div class="col-md-2">
                                <input type="text" name="end_pkwt_2" id="selisih" class="form-control" placeholder="Enter Tanggal End" readonly="" value="<?php echo $edit['end_pkwt_2'] ?>">
                            </div>
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-2">
                                <input type="file" name="dokumen_pkwt_2" class="form-control" placeholder="Enter ">
                            </div>
                        </div>
                        
                        <div class="collapse" id="status_karyawan_pkwt">
                        <div class="card card-body">
                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">Pengangkatan Karyawan Tetap
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Efektif 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="start_date_historical" class="form-control" placeholder="Enter " value="<?php echo $edit['start_date_historical'] ?>">
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak PKT </a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen_pkwt" class="form-control" value="<?php echo $edit['dokumen_pkwt'] ?>">
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_pkwt.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_PKWT.handleSendData();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('historical_pkwt/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_historical_edit']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_historical_edit']").val(value.jabatan_struktur);
                    });
                },
            });
          }
    });
</script>