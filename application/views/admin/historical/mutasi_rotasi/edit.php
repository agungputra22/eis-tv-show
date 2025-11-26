<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_mutasi/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_mutasi" method="post" action="<?php echo site_url('historical_mutasi/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Historical Mutasi dan Rotasi
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_mutasi_rotasi" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_mutasi_rotasi'] ?>">
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
                                <input type="text" name="nama_karyawan_mutasi" class="form-control" placeholder="Enter Nama Karyawan" readonly="" value="<?php echo $edit['nama_karyawan_mutasi'] ?>">
                            </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                Mutasi
                            </span>
                        </div>

                        <ul>
                            <li>Promosi</li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Pengajuan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_pengajuan_promosi" class="form-control" placeholder="Enter Penunjukan Promosi" value="<?php echo base_url() ?>uploads/historical_mutasi/surat_pengajuan_promosi/<?=$edit['surat_pengajuan_promosi'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Penunjukan PJS 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_penunjukan_promosi" class="form-control" placeholder="Enter Penunjukan Promosi" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Form Usulan Hak 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="form_usulan_hak_promosi" class="form-control" placeholder="Enter Form Usulan Hak" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Internal Memo 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="internal_memo_promosi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No SK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="no_sk_promosi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <hr>
                        <ul>
                            <li>Demosi</li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Pengajuan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_pengajuan_demosi" class="form-control" placeholder="Enter Penunjukan Promosi" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No SK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="no_sk_demosi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Form Usulan Hak 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="form_usulan_hak_demosi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                Rotasi
                            </span>
                        </div>

                        <ul>
                            <li>Jabatan (Internal Departement)</li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Pengajuan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_pengajuan_internal_dept" class="form-control" placeholder="Enter Penunjukan Promosi" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Internal Memo 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="internal_memo_internal_dept" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No SK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="no_sk_internal_dept" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <ul>
                            <li>Jabatan Antar Departement</li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Pengajuan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_pengajuan_antar_dept" class="form-control" placeholder="Enter Penunjukan Promosi" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Internal Memo 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="internal_memo_antar_dept" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No SK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="no_sk_antar_dept" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <ul>
                            <li>Lokasi</li>
                        </ul>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat Pengajuan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="surat_pengajuan_lokasi" class="form-control" placeholder="Enter Penunjukan Promosi" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No SK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="no_sk_antar_lokasi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Form Usulan Hak 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="form_usulan_hak_antar_lokasi" class="form-control" placeholder="Enter Nama Karyawan" >
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('historical_mutasi/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_mutasi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_MUTASI.handleSendData();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_mutasi']").val(value.nama_karyawan_struktur);
                    });
                },
            });
          }
     })
</script>