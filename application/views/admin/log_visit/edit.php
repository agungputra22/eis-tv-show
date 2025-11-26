<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('log_visit/index_admin') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-log_visit" method="post" action="<?php echo site_url('log_visit/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama HR
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Issue
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Id log_visit" readonly="" value="<?php echo $edit['id'] ?>">
                                <input type="hidden" name="date_update" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <textarea name="issue" class="form-control" placeholder="Ketikan Issue" rows="4"><?php echo $edit['issue'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Solusi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="solusi" class="form-control" placeholder="Ketikan Solusi" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('log_visit/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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