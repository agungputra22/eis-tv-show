<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('non_full_day/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-non_full_day" method="post" action="<?php echo site_url('non_full_day/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_non_full" class="form-control" placeholder="Enter Id " readonly="">
                                <input type="hidden" name="nik_non_full" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_non_full" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d H:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_non_full" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Izin 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="jenis_non_full" class="form-control">
                                    <option value="">-- Pilih Jenis --</option>
                                    <option value="DT"> Datang Telat </option>
                                    <option value="PC"> Pulang Cepat </option>
                                    <option value="KK"> Keluar Kantor </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Izin
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_non_full" class="form-control" placeholder="Enter Tanggal" required="required" min="<?php echo date('Y-m-d', strtotime('-3 days', strtotime(date('Y-m-d')))); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="ket_tambahan_non_full" class="form-control" required=""></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('non_full_day/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/non_full_day.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.NON_FULL_DAY.handleSendData();
</script>