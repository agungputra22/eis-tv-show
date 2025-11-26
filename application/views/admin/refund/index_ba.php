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
                                <th> No Pengajuan</th>
                                <th> Jumlah Refund </th>
                                <th> Status BA </th>
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
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['jumlah_refund'] ?> Pengajuan </td>
                            <td align="center">
                                <?php
                                if ($row['status_ba']=='0') {
                                    ?>
                                    <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-warning">OPEN</span></a>
                                    <?php
                                } elseif ($row['status_ba']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>CLOSE</a>
                                    <?php
                                } elseif ($row['status_ba']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status_ba']=='0') {
                                    ?>
                                    <a href="<?php echo site_url('refund/form_ba/'.$row['no_pengajuan']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Berita Acara</a> &nbsp;
                                    <?php
                                } elseif ($row['status_ba']=='1') {
                                    ?>
                                    
                                    <?php
                                } else {
                                    ?>
                                    <a href="<?php echo site_url('refund/form_ba/'.$row['no_pengajuan']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Berita Acara</a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/refund.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.REFUND.initTable();
</script>