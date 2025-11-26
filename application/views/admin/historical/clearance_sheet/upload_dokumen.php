<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('clearance_sheet/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-clearance_sheet" method="post" action="<?php echo site_url('clearance_sheet/doInput_tanda_terima') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Cari Dokumen 
                            
                            </label>
                            <div class="col-md-8">
                                <input type="file" name="tanda_terima" class="form-control" placeholder="Enter" >
                                <input name="id" type="hidden" value="<?php echo $edit['id_clearance']; ?>">
                                <input name="nik_baru" type="hidden" value="<?php echo $edit['nik_baru']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('clearance_sheet/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/clearance_sheet.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CLEARANCE_SHEET.handleSendData();
</script>