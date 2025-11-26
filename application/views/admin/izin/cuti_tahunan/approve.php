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
                    <a href="<?php echo site_url('cuti_tahunan/view_approve_level_1') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-warning"></i>Approved (<?php echo $approve; ?>) 
                    </a>
                    <a href="<?php echo site_url('cuti_tahunan/view_not_approve_level_1') ?>" class="btn btn-circle red btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-warning"></i>Not Approved (<?php echo $not_approve; ?>) 
                    </a>
                    <a href="<?php echo site_url('cuti_tahunan/view_hangus_level_1') ?>" class="btn btn-circle red btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-warning"></i>Hangus (<?php echo $hangus; ?>) 
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
                                <th> Tanggal Tidak Hadir </th>
                                <th> Keterangan </th>
                                <th> Opsi </th>
                                <th> Status </th>
                                <th> FeedBack </th>
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
                            <td> <?php echo $row['no_pengajuan_tahunan'] ?> </td>
                            <td> <?php echo $row['tanggal_pengajuan'] ?> </td>
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
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['feedback_cuti_tahunan'] ?> </td>
                            <td style="text-align:center;<?php if ($row['status_cuti_tahunan']=='1') { ?> <?php } ?>">
                              <?php if ($row['status_cuti_tahunan']=='0') {?>
                                <a href="<?php echo site_url('cuti_tahunan/edit/'.$row['id_sisa_cuti']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                              <?php } ?>
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

<script src="<?php echo base_url('assets/apps/scripts/cuti_tahunan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_TAHUNAN.handleDeleteData();
    window.CUTI_TAHUNAN.initTable();
</script>