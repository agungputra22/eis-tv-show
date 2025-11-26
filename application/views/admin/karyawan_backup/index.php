<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_backup/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Tambah Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> NIK Karyawan berhalangan </th>
                                <th> Nama </th>
                                <th> Alamat Domisili </th>
                                <th> No. KTP </th>
                                <th> No. Telephone </th>
                                <th> Tanggal </th>
                                <th> Jam Masuk </th>
                                <th> Jam Keluar </th>
                                <th> Aksi </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_backup'] ?> </td>
                            <td> <?php echo $row['alamat_backup'] ?> </td>
                            <td> <?php echo $row['no_ktp_backup'] ?> </td>
                            <td> <?php echo $row['no_telp_backup'] ?> </td>
                            <td> <?php echo $row['tanggal_backup'] ?> </td>
                            <td> <?php echo $row['waktu_masuk'] ?> </td>
                            <td> <?php echo $row['waktu_keluar'] ?> </td>
                            <td align="center"> 
                                <?php
                                    if (($row['in'] != null && $row['out'] != null) && $row['status_backup'] != null) {
                                        ?>
                                            <button class="btn btn-xs btn-success" disabled="">
                                            APPROVED</button>
                                        <?php
                                    } else if (($row['in'] != null && $row['out'] != null) && $row['status_backup'] == null) {
                                        ?>
                                            <input name="id" type="hidden" value="<?php echo $row['id_karyawan_backup']; ?>">
                                            <button data-url="<?php echo site_url('karyawan_backup/verif/') ?>" data-id="<?php echo $row['id_karyawan_backup'] ?>" class="btn btn-xs btn-warning btnVerif">VERIFIKASI</button>
                                        <?php
                                    } else {
                                        ?>
                                            <button class="btn btn-xs btn-primary" disabled="">
                                            OPEN</button>
                                        <?php
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_backup_verif.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_BACKUP_VERIF.handleDeleteData();
    window.KARYAWAN_BACKUP_VERIF.handleVerif();
    window.KARYAWAN_BACKUP_VERIF.initTable();
</script>