<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('resign/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-resign" method="post" action="<?php echo site_url('resign/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">No Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Id resign" readonly="" value="<?php echo $edit['id'] ?>">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter Nama Lain" required="required" readonly="" value="<?php echo $edit['no_pengajuan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_resign" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                                <input type="hidden" name="jabatan_struktur" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_hrd'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_struktur" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_hrd'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_pengajuan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['tanggal_pengajuan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Efektif
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_efektif_resign" class="form-control" placeholder="Enter Kode" required="required" min="<?php echo date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d')))); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Alasan Resign
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="alasan_resign" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['alasan_resign'] ?>">
                            </div>

                            <label class="col-md-1 control-label">Klarifikasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="klarifikasi_resign" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['klarifikasi_resign'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" placeholder="Keterangan" name="ket_resign" required readonly=""><?php echo $edit['ket_resign'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_atasan" value="1" required>Approved
                                <input type="radio" name="status_atasan" value="2">Not Approved
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('resign/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.handleSendData_Approve();
</script>