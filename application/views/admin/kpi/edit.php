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
                <form role="form" class="form-horizontal form-kpi" method="post" action="<?php echo site_url('kpi/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Id kpi" readonly="" value="<?php echo $edit['id'] ?>">
                                <textarea name="keterangan" class="form-control" placeholder="Ketikan Issue" rows="4"><?php echo $edit['keterangan'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="kategori">
                                    <option>-- Pilih Kategori --</option>
                                <?php
                                foreach (status_kpi($id) as $key => $level) {
                                    $s = ($key==$edit['kategori'] ? "selected" : "");
                                    echo "<option value=\"$key\" $s>$level</option>";
                                }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tahun
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="tahun" class="form-control" placeholder="Enter Id kpi" readonly="" value="<?php echo $edit['tahun'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Persentase
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="number" name="persentase" class="form-control" required min="0" max="100" value="<?php echo $edit['persentase'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pengukuran
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="pengukuran" class="form-control" placeholder="Ketikan Rumus" rows="4"><?php echo $edit['pengukuran'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status 
                            <span class="font-red">*</span>                
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status" value="1" <?php echo ($edit['status']=='1')?'checked':'' ?> required="">Aktif
                                <input type="radio" name="status" value="2" <?php echo ($edit['status']=='2')?'checked':'' ?> >Non Aktif
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('kpi/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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