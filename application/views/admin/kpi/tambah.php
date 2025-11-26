<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('kpi/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-kpi" method="post" action="<?php echo site_url('kpi/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id kpi" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="keterangan" class="form-control" placeholder="Ketikan KPI" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori</label>
                            <span class="font-red">*</span>
                            <div class="col-md-4">
                                <select class="form-control" name="kategori">
                                    <option>-- Pilih Kategori --</option>
                                <?php
                                foreach (status_kpi($id) as $key => $level) {
                                    echo "<option value=\"$key\">$level</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Persentase
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="number" name="persentase" class="form-control" required min="0" max="100">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengukuran
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="pengukuran" class="form-control" placeholder="Ketikan Rumus" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tahun</label>
                            <div class="col-md-4">
                                <select name="tahun" class="form-control" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php
                                        for ($i=2020; $i <= 2030 ; $i++) { 
                                            ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                <a href="<?php echo site_url('kpi/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/kpi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KPI.handleSendData();
</script>