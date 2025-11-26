<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('full_day/approve_level_2') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> No. Pengajuan </th>
                                <th> Waktu Pengajuan </th>
                                <th> Nama Karyawan</th>
                                <th> Jenis Izin </th>
                                <th> Tanggal Tidak Hadir </th>
                                <th> Karyawan Pengganti </th>
                                <th> Keterangan </th>
                                <th> Status </th>
                                <th> FeedBack Atasan </th>
                                <th> Dokumen </th>
                                <th> Aksi </th>
                                <th> Keterangan Approval </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['no_pengajuan_full_day'] ?> </td>
                            <td> <?php echo $row['tanggal_pengajuan'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jenis_full_day'] ?> </td>
                            <td> <?php echo $row['start_full_day'] ?> </td>
                            <td> <?php echo $row['karyawan_pengganti'] ?> </td>
                            <td> <?php echo $row['ket_tambahan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_full_day_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_full_day_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_full_day_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['feedback_full_day_2'] ?> </td>
                            <td>
                                <?php
                                    if ($row['jenis_full_day']=='SA') { ?>
                                    <a href="<?php echo base_url('full_day/download/'.$row['id_full_day']) ?>">Download file</a>
                                    <?php
                                    } else {
                                        echo "Tidak Ada File";
                                    }

                                ?>
                            </td>
                            <?php if ($row['level_role']=='1'): ?>
                                <td style="text-align:center;<?php if ($row['status_full_day_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_full_day_2']=='0') {?>
                                    <a href="<?php echo site_url('full_day/edit/'.$row['id_full_day']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                  <?php } ?>
                                </td>
                            <?php elseif ($row['level_role']=='2'): ?>
                                <td style="text-align:center;<?php if ($row['status_full_day_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_full_day_2']=='0') {?>
                                    <a href="<?php echo site_url('full_day/edit_level_2/'.$row['id_full_day']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                  <?php } ?>
                                </td>
                            <?php endif ?>

                            <?php if ($row['level_role']=='1'): ?>
                                <td style="text-align:center;<?php if ($row['status_full_day_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_full_day_2']=='0') {?>
                                    Approval &nbsp;
                                  <?php } ?>
                                </td>
                            <?php elseif ($row['level_role']=='2'): ?>
                                <td style="text-align:center;<?php if ($row['status_full_day_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_full_day_2']=='0') {?>
                                    Notifikasi &nbsp;
                                  <?php } ?>
                                </td>
                            <?php endif ?>
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

<script src="<?php echo base_url('assets/apps/scripts/full_day.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.FULL_DAY.handleDeleteData();
    window.FULL_DAY.initTable();
</script>