<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_violance/index_approval_v2') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_violance" method="post" action="<?php echo site_url('historical_violance/doUpdate_v2') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_historical_violance" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter Nama Karyawan" readonly="" maxlength="10" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_violance" class="form-control" placeholder="Enter Nama Karyawan" readonly="" required="" value="<?php echo $edit['nama_karyawan_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="jabatan_historical_violance" class="form-control" placeholder="Enter Jabatan" readonly="" required="" value="<?php echo $edit['jabatan_historical_violance'] ?>">
                                <input type="text" name="jabatan_karyawan" class="form-control" placeholder="Enter Jabatan" readonly="" required="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                                <input type="hidden" name="lokasi_hrd" class="form-control" readonly="" required="" value="<?php echo $edit['lokasi_hrd'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Rekomondasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="rekomondasi_historical_violance" class="form-control" placeholder="Enter Rekomondasi" readonly="" required="" value="<?php echo $edit['rekomondasi_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Pelanggaran 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="pelanggaran_historical_violance" class="form-control" rows="5" readonly required><?php echo $edit['pelanggaran_historical_violance'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Sanksi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="punishment_historical_violance" class="form-control" placeholder="Enter Sanksi" readonly="" value="<?php echo $edit['punishment_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Dibuat Surat 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_surat" class="form-control" placeholder="Enter Jabatan" value="<?php echo $edit['tanggal_surat'] ?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Berlaku 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="warning_start_historical_violance" class="form-control" placeholder="Enter " value="<?php echo $edit['warning_start_historical_violance'] ?>" readonly="">
                            </div>
                            <label class="col-md-2 control-label">Tanggal Berakhir 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="warning_end_historical_violance" class="form-control" placeholder="Enter Jabatan Akhir" readonly="" value="<?php echo $edit['warning_end_historical_violance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Notifikasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_notif" class="form-control" placeholder="Enter Jabatan" readonly="" value="<?php echo $edit['tanggal_notif'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Warning Note 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="warning_note_historical_violance" class="form-control" rows="5" required readonly><?php echo $edit['warning_note_historical_violance'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_hr_manager" value="1" required> Approved
                                <input type="radio" name="status_hr_manager" value="2"> Not Approved
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">FeedBack
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="note_hr_manager" required rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('historical_violance/index_approval_v2') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_violance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_VIOLANCE.handleSendData();
    window.HISTORICAL_VIOLANCE.handleBootstrapSelect();
</script>