<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_violance/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-title">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Jenis Sanksi </th>
                                <th> Pelanggaran </th>
                                <th> Tanggal Berlaku </th>
                                <th> Tanggal Notifikasi </th>
                                <th> Waktu Notifikasi </th>
                                <th> Cetak Dokumen </th>
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
                            <td> <?php echo $row['nama_karyawan_violance'] ?> </td>
                            <td> <?php echo $row['jabatan_historical_violance'] ?> </td>
                            <td> <?php echo $row['punishment_historical_violance'] ?> </td>
                            <td> <?php echo $row['pelanggaran_historical_violance'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['warning_start_historical_violance'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_notif'])); ?> </td>
                            <?php 
                                $tanggal_end        = strtotime($row['tanggal_notif']);
                                $tanggal_sekarang   = time(); // Waktu Sekarang
                                $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                $tanggal_akhir = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                if ($tanggal_akhir <= 15 ) {
                                    # code...
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FF0000'> <font color='blue'>$tanggal</font>";
                                } elseif ($tanggal_akhir <= 30 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FFFF00'> <font color='blue'>$tanggal</font>";
                                } else {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td> $tanggal";
                                }
                            ?>
                            <td align="center">
                                <?php

                                if ($row['perusahaan_struktur']=='TVIP') {
                                    echo "<a href='historical_violance/violance_tvip/$row[id_historical_violance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Print </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='ASA') {
                                    echo "<a href='historical_violance/violance_asa/$row[id_historical_violance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Print </a> <br>";
                                } else {
                                    echo "Tidak Ada Dokumen <br>";
                                }

                                ?>
                            </td>
                            <td align="center">
                                <a href="<?php echo site_url('historical_violance/edit/'.$row['id_historical_violance']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i></a> &nbsp;
                                <a data-url="<?php echo site_url('historical_violance/doDelete/') ?>" data-id="<?php echo $row['id_historical_violance'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/historical_violance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_VIOLANCE.handleDeleteData();
    window.HISTORICAL_VIOLANCE.initTable();
</script>