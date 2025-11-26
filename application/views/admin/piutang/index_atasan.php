<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Submit Date </th>
                                <th> No. FAR </th>
                                <th> Tanggal FAR </th>
                                <th> Nominal </th>
                                <th> Type </th>
                                <th> Keterangan </th>
                                <th> Status </th>
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
                            <td> <?php echo $row['submit_date'] ?> </td>
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['tanggal_far'] ?> </td>
                            <td> <?php echo number_format($row['nominal'], 0, ",", ".") ?> </td>
                            <td> <?php echo $row['type'] ?> </td>
                            <td> <?php echo $row['keterangan'] ?> </td>
                            <td align="center">
                                <?php

                                if ($row['status_far']=='0') {
                                    ?>
                                    <button class="btn btn-xs btn-warning" disabled>OPEN</button>
                                    <?php
                                } elseif ($row['status_far']=='1') {
                                    ?>
                                    <button class="btn btn-xs btn-primary" disabled><span class='glyphicon glyphicon-ok'></span> APPROVE</button>
                                    <?php
                                } elseif ($row['status_far']=='2') {
                                    ?>
                                    <button class="btn btn-xs btn-danger" disabled><span class='glyphicon glyphicon-remove'></span> NOT APPROVE</button>
                                    <?php
                                } else {
                                    ?>
                                    <button class="btn btn-xs btn-warning" disabled>OPEN</button>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status_far']=='0') {
                                    ?>
                                    <a href="<?php echo site_url('piutang/edit_atasan/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"> Edit</i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/piutang.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PIUTANG.initTable();
</script>