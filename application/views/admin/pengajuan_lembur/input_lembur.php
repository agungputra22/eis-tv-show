<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('pengajuan_lembur/index_pengajuan_lembur') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Tanggal Lembur </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-input_lembur" method="post" action="<?php echo site_url('pengajuan_lembur/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Karyawan" maxlength="10" >
                            </div>

                            <div class="col-md-4">
                                <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_lembur" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="jabatan_karyawan_lembur" class="form-control" placeholder="Enter Jabatan" readonly="">
                                <input type="text" name="kode_karyawan_lembur" class="form-control" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_karyawan_lembur" class="form-control" placeholder="Enter Departement" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_lembur1" class="form-control" placeholder="Enter Lokasi" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="tanggal_lembur" class="form-control" placeholder="Enter Tanggal" value="<?php echo $tanggal ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Lembur 
                            
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="keterangan_lembur"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. CO 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_co_lembur" class="form-control" placeholder="Enter No. CO">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="hidden" name="user_submit" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn green btn-block draft-kerja"> <i class="fa fa-save"></i> Simpan Draft</button>
                        <hr>
                    
                        <button type="button" class="btn blue reload-kerja"> <i class="fa fa-refresh"></i> Refresh </button>
                        <div id="input_lembur_all">
                            
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/input_lembur.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.INPUT_LEMBUR.handleSendData();
    window.INPUT_LEMBUR.loadPengalamankerja();
    window.INPUT_LEMBUR.savePengalamankerja();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('karyawan_shift/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_lembur']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_lembur']").val(value.jabatan_struktur);
                        $("input[name='kode_karyawan_lembur']").val(value.jabatan_karyawan);
                        $("input[name='dept_karyawan_lembur']").val(value.dept_struktur);
                        $("input[name='lokasi_karyawan_lembur1']").val(value.lokasi_struktur);
                    });
                },
            });
          }
     })
</script>