<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('refund/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-refund" method="post" action="<?php echo site_url('refund/doInput') ?>" enctype='multipart/form-data'>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-6">
                                <input type="text" name="no_pengajuan" id="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                                <input type="hidden" name="nik_pengajuan" id="nik_pengajuan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            </label>
                            <div class="col-md-6">
                                <select name="nik" id="nik" class="bs-select form-control" required data-live-search="true">
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
                            <label class="col-md-3 control-label">Tanggal Absen
                            </label>
                            <div class="col-md-6">
                                <?php
                                  $tanggal = date('d');
                                  if ($tanggal >= '1' AND $tanggal <= '20') {
                                    ?>
                                    <input type="date" name="tanggal_absen" id="tanggal_absen" class="form-control" required placeholder="Enter Nama" min="<?php echo date('Y-m-21', strtotime('-2 month', strtotime(date('Y-m-d')))); ?>" max="<?php echo date('Y-m-20', strtotime('-1 month', strtotime(date('Y-m-d')))); ?>" onchange="getFormAbsen(0)">
                                    <?php
                                  } else {
                                    ?>
                                    <input type="date" name="tanggal_absen" id="tanggal_absen" class="form-control" required placeholder="Enter Nama" onchange="getFormAbsen(0)">
                                    <?php
                                  }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Absen Awal
                            </label>
                            <div class="col-md-2">
                                <input type="text" name="absen_awal" id="absen_awal" readonly class="form-control" required placeholder="Enter Ket">
                            </div>
                            <label class="col-md-2 control-label">Absen Akhir
                            </label>
                            <div class="col-md-2">
                                <select class="form-control" name="absen_akhir" id="absen_akhir" required>
                                    <option value="">-- Pilih --</option>
                                    <option value="HD">HD</option>
                                    <option value="DN">DN</option>
                                    <option value="SA">SA</option>
                                    <option value="CD">CD</option>
                                    <option value="DT">DT</option>
                                    <option value="PC">PC</option>
                                    <option value="TD F1">TD F1</option>
                                    <option value="TD F4">TD F4</option>
                                    <option value="AL">AL</option>
                                    <option value="LI">LI</option>
                                    <option value="LI">CK</option>
                                    <option value="CU">CU</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            </label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="ket" id="ket" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Dokumen
                            </label>
                            <div class="col-md-6">
                                <input type="file" name="dokumen" id="dokumen" class="form-control" required placeholder="Enter Nama">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <?php
                                  $tanggal = date('d');
                                  if ($tanggal >= '1' AND $tanggal <= '20') {
                                    ?>
                                    <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                    <?php
                                  } else {
                                    ?>
                                    <button type="submit" class="btn blue" disabled=""> <i class="fa fa-save"></i> Simpan</button>
                                    <?php
                                  }
                                ?>
                                <a href="<?php echo site_url('refund/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/refund.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.REFUND.handleSendData();
    window.REFUND.handleBootstrapSelect();

    function getFormAbsen(x) {
        var nik_absen = document.getElementById('nik').value;
        var tanggal_absen = document.getElementById('tanggal_absen').value;

        $.ajax({
            url: "<?= base_url('refund/getAbsen') ?>",
            method: "POST",
            data: {
                nik_absen: nik_absen,
                tanggal_absen: tanggal_absen,
            },
            async: true,
            dataType: "JSON",
            success: function(data) {
                for (var row of data) {
                    document.getElementById('absen_awal').value = row.ket_absensi;
                }
            }
        })
    }
</script>
