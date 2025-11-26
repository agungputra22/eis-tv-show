<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('non_full_day/approve_level_2') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-non_full_day" method="post" action="<?php echo site_url('non_full_day/doUpdate_level_2') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Non Full
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_non_full" class="form-control" placeholder="Enter Id non_full_day" readonly="" value="<?php echo $edit['id_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No Pengajuan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan_non_full" class="form-control" placeholder="Enter Nama Lain" required="required" readonly="" value="<?php echo $edit['no_pengajuan_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_non_full" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Izin
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jenis_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jenis_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Izin
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['tanggal_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="ket_tambahan_non_full" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['ket_tambahan_non_full'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">FeedBack Atasan Level 1
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="feedback_non_full" readonly=""><?php echo $edit['feedback_non_full'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status_non_full_2" value="1">Approved
                                <input type="radio" name="status_non_full_2" value="2">Not Approved
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">FeedBack
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="feedback_non_full_2" required=""></textarea>
                                <input type="hidden" name="tanggal_approval_non_full_2" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('non_full_day/approve_level_2') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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