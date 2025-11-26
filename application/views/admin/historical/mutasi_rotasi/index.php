<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                    <h5><span class="font-red">Note : Pengajuan berlaku 7 hari kedepan dari tanggal pengajuan,<br> segera konfirmasi ke atasan untuk dilakukan approval & pengiriman FRM.HRD.07 ke HRD </span></h5>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_mutasi/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Form Pengajuan (FRM.HRD.13) </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> No. Pengajuan </th>
                                <th> Tanggal Pengajuan </th>
                                <!-- <th> Tanggal Berakhir </th> -->
                                <th> Proses </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> PT </th>
                                <th> Lokasi </th>
                                <th> Departement </th>
                                <th> Jabatan Awal </th>
                                <th> Jabatan Akhir </th>
                                <th> Rekomendasi Tanggal </th>
                                <th> Status Atasan </th>
                                <th> Tanggal Approve</th>
                                <th> Status Pengajuan </th>
                                <th> Tanggal Efektif HRD </th>
                                <th> Tanggal Efektif FA </th>
                                <th> Penugasan </th>
                                <th> Internal Memo </th>
                                <th> Surat Keterangan </th>
                                <th> Keterangan </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['tanggal_pengajuan'] ?> </td>
                            <!-- <td> <?php echo $row['tanggal_deadline'] ?> </td> -->
                            <td> <span class="caption-subject font-dark sbold uppercase"><?php echo $row['permintaan'] ?></span> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_mutasi'] ?> </td>
                            <td> <?php echo $row['pt_awal'] ?> </td>
                            <td> <?php echo $row['lokasi_awal'] ?> </td>
                            <td> <?php echo $row['dept_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_baru'] ?> </td>
                            <td> <?php echo $row['rekomendasi_tanggal'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_atasan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class=''>Open</span></a>";
                                } elseif ($row['status_atasan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVAL</a>";
                                } elseif ($row['status_atasan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_1']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class=''>Open</span></a>";
                                } elseif ($row['status_1']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVAL</a>";
                                } elseif ($row['status_1']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>";
                                } elseif ($row['status_1']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_efektif'] ?> </td>
                            <td> <?php echo $row['tanggal_efektif_fa'] ?> </td>
                            <?php
                                if ($row['tanggal_efektif_im'] == null) {
                                    ?>
                                        <td> </td>
                                    <?php
                                } else {
                                    ?>
                                        <td align="center">
                                            <!-- <?php echo $row['tanggal_efektif_im'] ?> <br> -->
                                            <a href="<?php echo site_url('historical_mutasi/penugasan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                                    <i class="fa fa-print"></i> Print Penugasan </a> &nbsp;
                                        </td>
                                    <?php
                                }
                            ?>
                            <?php
                                if ($row['tanggal_efektif_pjs'] == null) {
                                    ?>
                                        <td> </td>
                                    <?php
                                } else {
                                    ?>
                                        <td align="center">
                                            <!-- <?php echo $row['tanggal_efektif_pjs'] ?> <br> -->
                                            <a href="<?php echo site_url('historical_mutasi/penunjukan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                                    <i class="fa fa-print"></i> Print Penunjukan </a> &nbsp;
                                        </td>
                                    <?php
                                }
                            ?>
                            <?php
                                if ($row['tanggal_efektif_sk'] == null) {
                                    ?>
                                        <td> </td>
                                    <?php
                                } else {
                                    ?>
                                        <td align="center">
                                            <!-- <?php echo $row['tanggal_efektif_sk'] ?> <br> -->
                                            <a href="<?php echo site_url('historical_mutasi/keterangan/'.$row['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                                    <i class="fa fa-print"></i> Print Keterangan </a> &nbsp;
                                        </td>
                                    <?php
                                }
                            ?>
                            <td>
                                <?php
                                    $status = $row['status_pengajuan'];
                                    if ($status == '0') {
                                        # code...
                                        ?>
                                        <a href="#" class="btn btn-xs btn-danger ajaxify" disabled="disabled">BELUM CLOSE</a>
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
    window.HISTORICAL_MUTASI.initTable();
</script>