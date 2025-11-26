<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('resign/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-resign" method="post" action="<?php echo site_url('resign/doUpdate_cuti') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Lengkap 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Tanggal Masuk
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['join_date_struktur']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Depo / Dept
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['lokasi_hrd'].' / '.$edit['kode_departement'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Tanggal Resign
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['tanggal_efektif_resign']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Sisa Cuti
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="hak_cuti" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $cuti['hak_cuti_utuh'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Cuti Yang Di Dapat
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <?php
                                    $tgl1 = new DateTime($edit['tanggal_kontrak']);
                                    $tgl2 = new DateTime(date("Y-m-d"));
                                    $d = $tgl2->diff($tgl1)->days + 1;
                                    $pt = users('perusahaan_struktur');
                                    $word = 'PAKET';
                                    if (strpos($pt, $word) !== FALSE) {
                                        $cuti = 'woy';
                                    } elseif ($d >= 365) {
                                        $awal  = date_create(date("Y-01-01"));
                                        $akhir = date_create($edit['tanggal_efektif_resign']); // waktu sekarang
                                        $diff  = date_diff( $awal, $akhir );
                                        $tanggal = date('d', strtotime($edit['tanggal_efektif_resign']));
                                        if ($tanggal <= 15) {
                                            $cuti = $diff->m;
                                        } else {
                                            $cuti = $diff->m + 1;
                                        }
                                    } else {
                                        $cuti = 0;
                                    }

                                ?>
                                <input type="text" name="saldo_cuti" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $cuti; ?>">
                                <input type="hidden" name="tahun_cuti" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo date('Y', strtotime('-1 year', strtotime($edit['tanggal_efektif_resign']))); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('resign/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
    window.RESIGN.handleSendData();
</script>