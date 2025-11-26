<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('ptk/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan PTK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id" class="form-control" required="required" readonly="" value="<?php echo $edit['id'] ?>">
                                <input type="text" name="jabatan_karyawan" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Analisa
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="analisa" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['analisa'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tenaga Kerja
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="tenaga_kerja" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['tenaga_kerja'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_atasan" required="required" value="1"> APPROVED
                                <input type="radio" name="status_atasan" required="required" value="2"> NOT APPROVED
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_atasan" class="form-control" placeholder="Enter Keterangan" rows="4"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('ptk/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
</script>