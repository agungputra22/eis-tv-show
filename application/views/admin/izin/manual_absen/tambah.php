<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('manual_absen/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-manual_absen" method="post" action="<?php echo site_url('manual_absen/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_absen" class="form-control" placeholder="Enter Id " readonly="">
                                <input type="hidden" name="userid" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('userid'); ?>">
                                <input type="hidden" name="nik_absen" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_absen" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Absen 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="lokasi_absen" class="form-control" id="lokasi_absen" required="">
                                <option value="">-- Pilih Lokasi --</option>
                                    <?php
                                    foreach ($lokasi as $k)
                                    {
                                        echo "<option value='$k->SN'>$k->depo_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Absen Manual 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" name="jenis_absen" data-toggle="collapse" data-target="#in_out" aria-expanded="false" aria-controls="in_out" value="IN"> IN
                                <input type="checkbox" name="jenis_absen" data-toggle="collapse" data-target="#in_out" aria-expanded="false" aria-controls="in_out" value="OUT"> OUT
                                <!-- <input type="checkbox" name="jenis_absen" data-toggle="collapse" data-target="#satu_hari" aria-expanded="false" aria-controls="satu_hari" value="IN & OUT"> IN & OUT -->
                            </div>
                        </div>

                        <div class="collapse" id="in_out">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Absen 
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="tanggal_absen" class="form-control" placeholder="Enter Tanggal" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Waktu Absen
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="time" name="waktu_absen" class="form-control" placeholder="Enter Tanggal" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="satu_hari">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Tanggal Absen 
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="tanggal_absen_2" class="form-control" placeholder="Enter Tanggal" required="required">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Waktu Masuk
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="time" name="waktu_in_out[]" class="form-control" placeholder="Enter Tanggal" required="required">
                                    </div>

                                    <label class="col-md-2 control-label">Waktu Keluar
                                    <span class="font-red">*</span>
                                    </label>
                                    <div class="col-md-3">
                                        <input type="time" name="waktu_in_out[]" class="form-control" placeholder="Enter Tanggal" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_absen" class="form-control" required=""></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('manual_absen/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/manual_absen.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.MANUAL_ABSEN.handleSendData();
</script>