<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase">Status</span>
                    <a href="<?php echo site_url('historical_violance/index_histori_approve_v2') ?>" class="btn btn-circle blue btn-outline btn-sm ajaxify"> 
                        <!-- <i class="fa fa-warning"></i>Critical (<?php echo $hitung_critical; ?>)  -->
                        <i class="fa fa-solid fa-thumbs-up"></i> Approved 
                    </a>
                    <a href="<?php echo site_url('historical_violance/index_histori_notapprove_v2') ?>" class="btn btn-circle red btn-outline btn-sm ajaxify"> 
                        <!-- <i class="fa fa-warning"></i>Warning (<?php echo $hitung_warning; ?>)  -->
                        <i class="fa fa-solid fa-ban"></i> Not Approved
                    </a>
                </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> No. Surat </th>
                                <th> No. Urut </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Jenis Sanksi </th>
                                <th> Pelanggaran </th>
                                <th> Tanggal Berlaku </th>
                                <th> Tanggal Notifikasi </th>
                                <th> Tanggal Berakhir </th>
                                <th> Waktu Notifikasi </th>
                                <th> Warning Note </th>
                                <th> Status Approval </th>
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
                            <td> <?php echo $row['no_surat'] ?> </td>
                            <td> <?php echo $row['no_urut'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['punishment_historical_violance'] ?> </td>
                            <td> <?php echo $row['pelanggaran_historical_violance'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['warning_start_historical_violance'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_notif'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['warning_end_historical_violance'])); ?> </td>
                            <?php 
                                $tanggal_end        = strtotime($row['tanggal_notif']);
                                $tanggal_sekarang   = time(); // Waktu Sekarang
                                $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                $tanggal_akhir      = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                $tgl=date('d-m-Y');
                                if ($tanggal_akhir <= -0 ) {
                                    # code...
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#000000'> <font color='white'>Selesai</font>";
                                } elseif ($tanggal_akhir <= 15 ) {
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
                            <td> <?php echo $row['warning_note_historical_violance'] ?> </td>
                            <td align="center"> 
                                <?php

                                if ($row['status_hr_manager']=='0') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'>OPEN</a>
                                    <?php
                                } elseif ($row['status_hr_manager']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'>APPROVE</a>
                                    <?php
                                } elseif ($row['status_hr_manager']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify' disabled='disabled'>NOT APPROVE</a>
                                    <?php
                                } else {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-default ajaxify' disabled='disabled'>CANCEL</a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                    if ($row['perusahaan_struktur']=='TVIP') {
                                        ?>
                                        <a href='<?php echo site_url('historical_violance/violance_tvip_v2/'.$row['id_historical_violance']) ?>' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> View </a> <br>
                                        <?php
                                    } elseif ($row['perusahaan_struktur']=='ASA') {
                                        ?>
                                        <a href='<?php echo site_url('historical_violance/violance_asa_v2/'.$row['id_historical_violance']) ?>' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> View </a> <br>
                                        <?php
                                    } elseif ($row['perusahaan_struktur']=='MRT') {
                                        ?>
                                        <a href='<?php echo site_url('historical_violance/violance_mrt_v2/'.$row['id_historical_violance']) ?>' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> View </a> <br>
                                        <?php
                                    } elseif ($row['perusahaan_struktur']=='TBK') {
                                        ?>
                                        <a href='<?php echo site_url('historical_violance/violance_tbk_v2/'.$row['id_historical_violance']) ?>' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> View </a> <br>
                                        <?php
                                    } else {
                                        ?>
                                        <a href='<?php echo site_url('historical_violance/violance_tvip_v2/'.$row['id_historical_violance']) ?>' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> View </a> <br>
                                        <?php
                                    }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status_hr_manager']=='0') {
                                    ?>
                                    <a href="<?php echo site_url('historical_violance/approval_v2/'.$row['id_historical_violance']) ?>" class="btn btn-xs btn-danger ajaxify"><i class="icon-pencil"></i> ACTION </a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/historical_violance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_VIOLANCE.handleDeleteData();
    window.HISTORICAL_VIOLANCE.initTable();
</script>