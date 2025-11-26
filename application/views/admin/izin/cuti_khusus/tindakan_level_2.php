<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_khusus/approve_level_2') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-cuti_khusus" method="post" action="<?php echo site_url('cuti_khusus/doUpdate_level_2') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">NO. Pengajuan
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter Id cuti_khusus" readonly="" value="<?php echo $edit['no_pengajuan_khusus'] ?>">
                                <input type="hidden" name="id_cuti_khusus" class="form-control" placeholder="Enter Id cuti_khusus" readonly="" value="<?php echo $edit['id_cuti_khusus'] ?>">
                                <input type="hidden" name="jumlah_hari" class="form-control" placeholder="Enter Id" readonly="" value="<?php echo $edit['jumlah_hari'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_cuti_khusus" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_cuti_khusus'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Nama Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nama_karyawan_full_day" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Jabatan Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="jabatan_karyawan_full_day" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Lokasi Karyawan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="lokasi_karyawan_full_day" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['lokasi_hrd'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Jenis Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="jenis_cuti_khusus" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['jenis_cuti_khusus'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Kondisi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="lokasi_karyawan_full_day" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['kondisi'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Mulai Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="start_cuti_khusus" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['start_cuti_khusus'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Akhir Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="end_cuti_khusus" class="form-control" placeholder="Enter Kode" required="required" readonly="" value="<?php echo $edit['end_cuti_khusus'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Keterangan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="feedback_cuti_khusus" readonly=""><?php echo $edit['ket_tambahan_khusus'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">FeedBack Atasan Level 1
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="feedback_cuti_khusus" readonly=""><?php echo $edit['feedback_cuti_khusus'] ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Tindakan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-8">
                                <input type="radio" name="status_cuti_khusus_2" value="1" required="">Approved
                                <input type="radio" name="status_cuti_khusus_2" value="2">Not Approved
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">FeedBack
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="feedback_cuti_khusus_2" required=""></textarea>
                                <input type="hidden" name="tanggal_approval_cuti_khusus_2" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('cuti_khusus/approve_level_2') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/cuti_khusus.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_KHUSUS.handleSendData();
</script>