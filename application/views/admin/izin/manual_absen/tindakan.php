<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('manual_absen/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-manual_absen" method="post" action="<?php echo site_url('manual_absen/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_absen" class="form-control" placeholder="Enter Id manual_absen" readonly="" value="<?php echo $edit['id_absen'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <!-- <input type="hidden" name="userid" class="form-control" placeholder="Enter Id full_day" value="<?php echo $edit['userid'] ?>"> -->
                                <input type="text" name="nik_absen" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_absen'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_struktur" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_absen" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'] ?>">
                                <input type="hidden" name="lokasi_SN" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_absen'] ?>">
                                <input type="hidden" name="perusahaan_struktur" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['perusahaan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Absen
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jenis_absen" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jenis_absen'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Absen
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="tanggal_absen" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['tanggal_absen'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Waktu Absen
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="waktu_absen" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['waktu_absen'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="ket_absen" readonly=""><?php echo $edit['ket_absen'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status" value="1" required="">Approved
                                <input type="radio" name="status" value="2">Not Approved
                                <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('manual_absen/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/manual_absen.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.MANUAL_ABSEN.handleSendData();
</script>