<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_khusus/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
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
                                <th> Jenis Cuti </th>
                                <th> Kondisi </th>
                                <th> Mulai Cuti </th>
                                <th> Keterangan Tambahan</th>
                                <th> Status </th>
                                <th> Tanggal </th>
                                <th> FeedBack Atasan</th>
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
                            <td> <?php echo $row['jenis_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['kondisi'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['start_cuti_khusus'])) ?> </td>
                            <td> <?php echo $row['ket_tambahan_khusus'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_khusus']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_khusus']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_khusus']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['feedback_cuti_khusus'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/cuti_khusus.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_KHUSUS.handleDeleteData();
    window.CUTI_KHUSUS.initTable();
</script>