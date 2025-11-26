<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('ptk/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_karyawan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="no_urut" class="form-control" placeholder="" value="<?php echo users('no_urut'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="jabatan_ptk" id="jabatan_karyawan" class="bs-select form-control" required>
                                <option value="">-- Pilih Jabatan --</option>
                                    <?php
                                    foreach ($jabatan as $k)
                                    {
                                        echo "<option value='$k->no_jabatan_karyawan'>$k->jabatan_karyawan</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="depo_ptk" class="form-control" required>
                                <option>-- Pilih Lokasi --</option>
                                    <?php
                                    foreach ($depo as $k)
                                    {
                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="dept_ptk" class="form-control" required>
                                <option>-- Pilih Departement --</option>
                                    <?php
                                    foreach ($dept as $k)
                                    {
                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Analisa Kebutuhan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="analisa" class="form-control" required>
                                    <option value="">-- Pilih Analisa Kebutuhan --</option>
                                    <option>Karyawan Lama Mengundurkan Diri</option>
                                    <option>Karyawan Lama di Promosikan</option>
                                    <option>Karyawan Lama di Rotasikan</option>
                                    <option>Karyawan Lama di Demosikan</option>
                                    <option>Pemenuhan Man Power Planning (MPP)</option>
                                    <option>Karyawan Cuti Melahirkan *</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Penyediaan Tenaga Kerja
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <!-- <select name="tenaga_kerja" class="form-control" required>
                                    <option value="">-- Pilih Penyediaan Tenaga Kerja --</option>
                                    <option>Pemenuhan Internal (Mutasi / Rotasi)</option>
                                    <option>Pemenuhan Eksternal (Karyawan Baru)</option>
                                </select> -->
                                <input type="text" name="tenaga_kerja" class="form-control" readonly required value="Pemenuhan Eksternal (Karyawan Baru)">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('ptk/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleSendData();
    window.PTK.handleBootstrapSelect();
</script>