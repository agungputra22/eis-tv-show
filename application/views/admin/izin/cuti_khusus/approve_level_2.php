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
                    <a href="<?php echo site_url('cuti_khusus/view_approve_level_2') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-warning"></i>Approved (<?php echo $approve; ?>) 
                    </a>
                    <a href="<?php echo site_url('cuti_khusus/view_not_approve_level_2') ?>" class="btn btn-circle red btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-warning"></i>Not Approved (<?php echo $not_approve; ?>) 
                    </a>
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
                                <th> Jenis Cuti </th>
                                <th> Kondisi </th>
                                <th> Start Cuti </th>
                                <th> End Cuti </th>
                                <th> Keterangan </th>
                                <th> Status </th>
                                <th> FeedBack </th>
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
                            <td> <?php echo $row['no_pengajuan_khusus'] ?> </td>
                            <td> <?php echo $row['tanggal_pengajuan'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jenis_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['kondisi'] ?> </td>
                            <td> <?php echo $row['start_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['end_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['ket_tambahan_khusus'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_khusus_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_khusus_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_khusus_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['feedback_cuti_khusus_2'] ?> </td>
                            <?php if ($row['level_role']=='1'): ?>
                                <td style="text-align:center;<?php if ($row['status_cuti_khusus_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_cuti_khusus_2']=='0') {?>
                                    <a href="<?php echo site_url('cuti_khusus/edit/'.$row['id_cuti_khusus']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                  <?php } ?>
                                </td>
                            <?php elseif ($row['level_role']=='2'): ?>
                                <td style="text-align:center;<?php if ($row['status_cuti_khusus_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_cuti_khusus_2']=='0') {?>
                                    <a href="<?php echo site_url('cuti_khusus/edit_level_2/'.$row['id_cuti_khusus']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                  <?php } ?>
                                </td>
                            <?php endif ?>

                            <?php if ($row['level_role']=='1'): ?>
                                <td style="text-align:center;<?php if ($row['status_cuti_khusus_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_cuti_khusus_2']=='0') {?>
                                    Approval &nbsp;
                                  <?php } ?>
                                </td>
                            <?php elseif ($row['level_role']=='2'): ?>
                                <td style="text-align:center;<?php if ($row['status_cuti_khusus_2']=='1') { ?> <?php } ?>">
                                  <?php if ($row['status_cuti_khusus_2']=='0') {?>
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
        <!-- End: Datatable -->
    </div>
</div>
<script src="<?php echo base_url('assets/apps/scripts/cuti_khusus.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_KHUSUS.initTable();
</script>