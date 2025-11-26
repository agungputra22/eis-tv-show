<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('refund/index_ba') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-refund" method="post" action="<?php echo site_url('refund/doUpdate_ba') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Tanggal Dibuat  
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="tanggal_ba" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo(date('Y-m-d')) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">No. BA 
                            </label>
                            <div class="col-md-8">
                                <?php
                                    $bulan = date('n');
                                    $romawi = getRomawi($bulan);
                                    $tahun = date('Y');
                                    $no = $edit['no_pengajuan'];
                                    $kode = $edit['depo_kode'];
                                    $no_ba = $no.'/'.$kode.'/'.$romawi.'/'.$tahun;
                                ?>
                                <input type="text" name="no_ba" class="form-control" placeholder="Enter Nama" readonly="" value="<?php echo $no_ba; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Dibuat Oleh  
                            </label>
                            <div class="col-md-8">
                                <input type="text" name="dibuat_oleh" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo users('nama_karyawan_struktur'); ?>">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="no_pengajuan" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['no_pengajuan']; ?>">

                            </div>
                        </div>

                    </div>
                    <p>Menerangkan bahwa adanya pengajuan refund absensi karyawan atas nama berikut :</p>
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Tanggal Absen </th>
                                <th> Absen Awal </th>
                                <th> Absen Akhir </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($record as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['tanggal_absen'] ?> </td>
                            <td> <?php echo $row['absen_awal'] ?> </td>
                            <td> <?php echo $row['absen_akhir'] ?> </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                        </tbody>
                    </table>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit BA</button>
                                <a href="<?php echo site_url('refund/index_ba') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/refund.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.REFUND.handleSendData();
</script>