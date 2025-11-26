<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('log_visit/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-log_visit" method="post" action="<?php echo site_url('log_visit/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_log_visit" class="form-control" placeholder="Enter Id log_visit" readonly="">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id log_visit" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
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
                            <label class="col-md-3 control-label">Issue
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="issue" class="form-control" placeholder="Ketikan Issue" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen" class="form-control" placeholder="Enter Tanggal">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('log_visit/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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