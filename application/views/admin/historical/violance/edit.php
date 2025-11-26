<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_violance/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_violance" method="post" action="<?php echo site_url('historical_violance/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Violance
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_historical_violance" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_violance" class="form-control" placeholder="Enter Nama Karyawan" readonly="" required="" value="<?php echo $edit['nama_karyawan_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_historical_violance" class="form-control" placeholder="Enter Jabatan" readonly="" required="" value="<?php echo $edit['jabatan_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Rekomondasi 
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="rekomondasi_historical_violance" class="form-control" placeholder="Enter Rekomondasi" readonly="" required="" value="<?php echo $edit['rekomondasi_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Pelanggaran 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="pelanggaran_historical_violance" id="pelanggaran_historical_violance" class="form-control">
                                <option>-- Pilih Pelanggaran --</option>
                                    <?php
                                    foreach ($jenis_pelanggaran as $k)
                                    {
                                        echo "<option value='$k->jenis_pelanggaran'";
                                        echo $edit['pelanggaran_historical_violance']==$k->jenis_pelanggaran?'selected':'';
                                        echo">$k->jenis_pelanggaran</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Sanksi
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="punishment_historical_violance" class="form-control" placeholder="Enter Sanksi" readonly="" value="<?php echo $edit['punishment_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Dibuat Surat 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_surat" class="form-control" placeholder="Enter Jabatan" value="<?php echo $edit['tanggal_surat'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Berlaku 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="warning_start_historical_violance" class="form-control" placeholder="Enter " value="<?php echo $edit['warning_start_historical_violance'] ?>">
                            </div>
                            <label class="col-md-2 control-label">Tanggal Berakhir 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="warning_end_historical_violance" class="form-control" placeholder="Enter Jabatan Akhir" readonly="" value="<?php echo $edit['warning_end_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Notifikasi 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_notif" class="form-control" placeholder="Enter Jabatan" readonly="" value="<?php echo $edit['tanggal_notif'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Warning Note 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="warning_note_historical_violance" class="form-control" rows="5" required=""><?php echo $edit['warning_note_historical_violance'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen_historical_violance" class="form-control" placeholder="Enter Jabatan Akhir" required="" value="<?php echo $edit['dokumen_historical_violance'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('historical_violance/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_violance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_VIOLANCE.handleSendData();

    // Biodata Karyawan
    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('historical_violance/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_violance']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_historical_violance']").val(value.jabatan_struktur);
                    });
                },
            });
          }
     })

    // Jenis Pelanggaran
    $("#pelanggaran_historical_violance").change(function () {
          if ($(this).val() != "") {
          var pelanggaran_historical_violance=$('#pelanggaran_historical_violance').val();
            $.ajax({
                url: "<?=base_url('historical_violance/tampil_pelanggaran')?>",
                method: "POST",
                data: { 'pelanggaran_historical_violance': pelanggaran_historical_violance },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='punishment_historical_violance']").val(value.type_pelanggaran);
                    });
                },
            });
          }
     })
</script>