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
                <form role="form" class="form-horizontal form-historical_pkwt" method="post" action="<?php echo site_url('historical_pkwt/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10">
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_historical" id="nama_lengkap" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_historical" id="jabatan_historical" class="form-control" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status Karyawan 
                                            
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_karyawan_pkwt" value="Kontrak" checked>Kontrak
                                <input type="radio" name="status_karyawan_pkwt" value="Tetap" data-toggle="collapse" data-target="#status_karyawan_pkwt" aria-expanded="false" aria-controls="status_karyawan_pkwt">Tetap
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
                                <input type="date" name="start_pkwt_1" class="form-control" placeholder="Enter " >
                            </div>
                            <label class="col-md-1 control-label">End  
                            
                            </label>
                            <div class="col-md-2">
                                <input type="date" name="end_pkwt_1" class="form-control" placeholder="Enter Jabatan Akhir" >
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak </a>
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
                                <input type="date" name="start_pkwt_2" class="form-control" placeholder="Enter Perusahaan" >
                            </div>
                            <label class="col-md-1 control-label">End  
                            
                            </label>
                            <div class="col-md-2">
                                <input type="date" name="end_pkwt_2" class="form-control" placeholder="Enter Jabatan Akhir" >
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak </a>
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
                                <input type="date" name="start_date_historical" class="form-control" placeholder="Enter " >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen_pkwt" class="form-control" >
                            </div>
                            <div class="col-md-2">
                                <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-print"></i> Cetak </a>
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
                        $("input[name='nama_karyawan_historical']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_historical']").val(value.jabatan_struktur);
                    });
                },
            });
          }
     })
</script>