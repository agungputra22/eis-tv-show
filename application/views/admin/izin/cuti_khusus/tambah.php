<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_khusus/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-cuti_khusus" method="post" action="<?php echo site_url('cuti_khusus/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_cuti_khusus" class="form-control" placeholder="Enter Id " readonly="">
                                <input type="hidden" name="nik_cuti_khusus" class="form-control" placeholder="Enter Id " value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_cuti_khusus" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_khusus" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kondisi
                            
                            </label>
                            <div class="col-md-4">
                                <select name="kondisi" id="kondisi" class="form-control">
                                <option value="">-- Pilih Kondisi --</option>
                                    <?php
                                    foreach ($kondisi as $k)
                                    {
                                        echo "<option value='$k->kondisi_cuti_khusus'>$k->kondisi_cuti_khusus</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jenis_cuti_khusus" id="jenis_cuti_khusus" class="form-control" required="required" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Mulai Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="start_cuti_khusus" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('-3 days', strtotime(date('Y-m-d')))); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Sampai Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-1">
                                <input type="text" name="end_cuti_khusus" id="end_cuti_khusus" class="form-control" required="required" readonly="">
                            </div>
                            <label class="col-md-2 control-label">Hari Kedepan
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_tambahan_khusus" class="form-control" required=""></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen_cuti_khusus" class="form-control" placeholder="Enter Tanggal" required="">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('cuti_khusus/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/cuti_khusus.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_KHUSUS.handleSendData();

    $("#kondisi").change(function () {
          if ($(this).val() != "") {
          var kondisi=$('#kondisi').val();
            $.ajax({
                url: "<?=base_url('cuti_khusus/tampil_hari')?>",
                method: "POST",
                data: { 'kondisi': kondisi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='end_cuti_khusus']").val(value.hari_cuti_khusus);
                        $("input[name='jenis_cuti_khusus']").val(value.keterangan_cuti_khusus);
                    });
                },
            });
          }
     })
</script>