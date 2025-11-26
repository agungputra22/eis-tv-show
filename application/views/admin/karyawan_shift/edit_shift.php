<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_shift/perubahan_shift') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-karyawan_shift" method="post" action="<?php echo site_url('karyawan_shift/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_karyawan_shift" class="form-control" placeholder="Enter Id karyawan_shift" readonly="" value="<?php echo $edit['id_karyawan_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_shift" class="form-control" placeholder="Enter Nama Lain" required="required" readonly="" value="<?php echo $edit['nik_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_shift" class="form-control" placeholder="Enter Nama Lain" required="required" readonly="" value="<?php echo $edit['nama_karyawan_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Shift
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_shift" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['tanggal_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Waktu Lembur
                            <span class="font-red">*</span></label>
                            <div class="col-md-4">
                                <select name="jam_kerja" class="form-control">
                                <option value="">-- Pilih Shift --</option>
                                    <?php
                                    foreach ($jam_kerja as $k)
                                    {
                                        echo "<option value='$k->id_shifting'";
                                        echo $edit['jam_kerja']==$k->id_shifting?'selected':'';
                                        echo">$k->waktu_masuk - $k->waktu_keluar</option>";
                                    }
                                    ?>
                                <option value="OFF">OFF</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('karyawan_shift/perubahan_shift') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.handleSendData();
</script>