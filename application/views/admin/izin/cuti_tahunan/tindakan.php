<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-cuti_tahunan" method="post" action="<?php echo site_url('cuti_tahunan/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Full Day
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_sisa_cuti" class="form-control" placeholder="Enter Id cuti_tahunan" readonly="" value="<?php echo $edit['id_sisa_cuti'] ?>">
                                <input type="hidden" name="hak_cuti_utuh" class="form-control" placeholder="Enter Id cuti_tahunan" readonly="" value="<?php echo $edit['hak_cuti_utuh'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_cuti_tahunan" class="form-control" placeholder="Enter Nama Lain" required="required" readonly="" value="<?php echo $edit['no_pengajuan_tahunan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_sisa_cuti" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_sisa_cuti'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_cuti_tahunan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan_cuti_tahunan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_cuti_tahunan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="start_cuti_tahunan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['start_cuti_tahunan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="ket_tambahan" readonly=""><?php echo $edit['ket_tambahan_tahunan'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Opsi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="opsi_cuti_tahunan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['opsi_cuti_tahunan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_cuti_tahunan" value="1" required="">Approved
                                <input type="radio" name="status_cuti_tahunan" value="2">Not Approved
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">FeedBack
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="feedback_cuti_tahunan" required=""></textarea>
                                <input type="hidden" name="tanggal_cuti_tahunan" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/cuti_tahunan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_TAHUNAN.handleSendData();
</script>