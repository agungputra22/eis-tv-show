<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('daily_activity/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-daily_activity" method="post" action="<?php echo site_url('daily_activity/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik'] ?>">
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['id'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Lokasi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" name="status_lokasi" value="0" disabled="" <?php echo ($edit['status_lokasi']=='0')?'checked':'' ?>>External Lokasi
                                <input type="checkbox" name="status_lokasi" value="1" disabled="" <?php echo ($edit['status_lokasi']=='1')?'checked':'' ?> >Internal Lokasi
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['lokasi'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">List Pekerjaan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="keterangan" class="form-control" placeholder="Ketikan Issue" rows="8"><?php echo $edit['keterangan'] ?></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('daily_activity/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/daily_activity.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.DAILY_ACTIVITY.handleSendData();
</script>