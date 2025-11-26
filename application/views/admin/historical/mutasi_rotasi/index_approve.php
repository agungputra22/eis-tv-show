<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <img width="60" height="60" src="<?php echo base_url($this->config->item('img_path').'historical_mutasi.jfif') ?>" alt="" /> -->
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_mutasi/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Proses </th>
                                <th> No. Pengajuan </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> PT </th>
                                <th> Lokasi </th>
                                <th> Departement </th>
                                <th> Jabatan Awal </th>
                                <th> Jabatan Akhir </th>
                                <th> Rekomendasi Tanggal </th>
                                <th> Dokumen </th>
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
                            <td> <?php echo $row['permintaan'] ?> </td>
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_mutasi'] ?> </td>
                            <td> <?php echo $row['pt_awal'] ?> </td>
                            <td> <?php echo $row['lokasi_awal'] ?> </td>
                            <td> <?php echo $row['dept_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_baru'] ?> </td>
                            <td> <?php echo $row['rekomendasi_tanggal'] ?> </td>
                            <td>
                                <a href="<?php echo site_url('historical_mutasi/penugasan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print Penugasan </a> &nbsp;
                                <a href="<?php echo site_url('historical_mutasi/penunjukan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print Penunjukan </a> &nbsp;
                                <a href="<?php echo site_url('historical_mutasi/keterangan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print Keterangan </a> &nbsp;
                            </td>
                            <td>
                                <?php
                                    $status = $row['status_pengajuan'];
                                    if ($status == '0') {
                                        # code...
                                        ?>
                                        <a href="<?php echo site_url('historical_mutasi/set_data/'.$row['id_mutasi_rotasi']) ?>" class="btn btn-xs btn-danger ajaxify">BELUM CLOSE</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled">CLOSE</a>
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

<script src="<?php echo base_url('assets/apps/scripts/historical_mutasi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_MUTASI.handleDeleteData();
    window.HISTORICAL_MUTASI.handleCloseData();
    window.HISTORICAL_MUTASI.initTable();
</script>