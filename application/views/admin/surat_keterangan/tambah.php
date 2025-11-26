<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('surat_keterangan/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-surat_keterangan" method="post" action="<?php echo site_url('surat_keterangan/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="jabatan_karyawan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('jabatan_struktur'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_urut" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Keperluan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <!-- <textarea name="keperluan" class="form-control" required=""></textarea> -->
                                <select name="keperluan" class="form-control" required>
                                    <option> -- Pilih Jenis Keperluan --</option>
                                    <option value="Pengajuan KPR">Pengajuan KPR</option>
                                    <option value="Pembukaan Rekening Baru">Pembukaan Rekening Baru</option>
                                    <option value="Pencairan Sebagian Saldo JHT">Pencairan Sebagian Saldo JHT (10%)</option>
                                    <option value="Pembuatan NPWP">Pembuatan NPWP</option>
                                    <option value="Mengikuti Vaskin Covid-19">Mengikuti Vaksin Covid-19</option>
                                    <option value="Pembuatan Passport<">Pembuatan Passport</option>
                                    <option value="Pembuatan VISA<">Pembuatan VISA</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Analisa Kebutuhan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea name="analisa" class="form-control" required=""></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Pengajuan</button>
                                <a href="<?php echo site_url('surat_keterangan/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/surat_keterangan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.SURAT_KETERANGAN.handleSendData();
    window.SURAT_KETERANGAN.handleBootstrapSelect();
</script>