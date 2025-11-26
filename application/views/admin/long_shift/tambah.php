<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-long_shift" method="post" action="<?php echo site_url('long_shift/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter Id long_shift" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan" class="form-control" placeholder="Enter Id long_shift" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Cari NIK/Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="nik_baru" id="nik_baru" class="bs-select form-control" data-live-search="true" data-size="8">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_tampil" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_shift" class="form-control" required="" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="jabatan_karyawan_shift" class="form-control" placeholder="Enter Jabatan" readonly="">
                                <input type="text" name="kode_karyawan_shift" class="form-control" required="" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_karyawan_shift" class="form-control" required="" placeholder="Enter Departement" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_shift1" class="form-control" required="" placeholder="Enter Lokasi" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Long Shift
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="time" name="jam" class="form-control" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="keterangan" class="form-control" required=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/long_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.LONG_SHIFT.handleSendData();
    window.LONG_SHIFT.handleBootstrapSelect();

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
                        $("input[name='nik_tampil']").val(value.nik_baru);
                        $("input[name='nama_karyawan_shift']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_shift']").val(value.jabatan_struktur);
                        $("input[name='kode_karyawan_shift']").val(value.jabatan_karyawan);
                        $("input[name='dept_karyawan_shift']").val(value.dept_struktur);
                        $("input[name='lokasi_karyawan_shift1']").val(value.lokasi_struktur);
                    });
                },
            });
          }
     })
</script>