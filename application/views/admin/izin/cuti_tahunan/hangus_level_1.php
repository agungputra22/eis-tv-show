<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
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
                                <th> Nama Karyawan</th>
                                <th> Tanggal Tidak Hadir </th>
                                <th> Keterangan </th>
                                <th> Opsi </th>
                                <th> Status </th>
                                <th> FeedBack </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['no_pengajuan_tahunan'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['start_cuti_tahunan'] ?> </td>
                            <td> <?php echo $row['ket_tambahan_tahunan'] ?> </td>
                            <td> <?php echo $row['opsi_cuti_tahunan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_tahunan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_tahunan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                } 

                                ?>
                            </td>
                            <td> <?php echo $row['feedback_cuti_tahunan'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/cuti_tahunan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_TAHUNAN.handleDeleteData();
    window.CUTI_TAHUNAN.initTable();
</script>