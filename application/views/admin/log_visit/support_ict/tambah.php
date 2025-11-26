<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('log_ict_support/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-log_visit" method="post" action="<?php echo site_url('log_ict_support/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id log_visit" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Issue
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="issue" class="form-control" placeholder="Ketikan Issue" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="lokasi" class="form-control" id="lokasi" required="">
                                <option value="">-- Pilih Lokasi --</option>
                                    <?php
                                    foreach ($depo as $k)
                                    {
                                        echo "<option value='$k->depo_id'>$k->depo_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal" class="form-control" placeholder="Enter Tanggal" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="time" name="jam" class="form-control" placeholder="Enter Tanggal" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Solving
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="solving" class="form-control" placeholder="Ketikan Solving" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Aplikasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="aplikasi" class="form-control" id="aplikasi" required="">
                                <option value="">-- Pilih Aplikasi --</option>
                                    <?php
                                    foreach ($aplikasi as $k)
                                    {
                                        echo "<option value='$k->id'>$k->nama_aplikasi</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="kategori" class="form-control" id="kategori" required="">
                                <option value="">-- Pilih Kategori --</option>
                                    <?php
                                    foreach ($kategori as $k)
                                    {
                                        echo "<option value='$k->id'>$k->nama_kategori</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select class="form-control" name="status">
                                    <option>-- Pilih Status --</option>
                                    <?php
                                    foreach (support_status($id) as $key => $level) {
                                        echo "<option value=\"$key\">$level</option>";
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
                                <a href="<?php echo site_url('log_ict_support/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/log_visit.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.LOG_VISIT.handleSendData();
</script>