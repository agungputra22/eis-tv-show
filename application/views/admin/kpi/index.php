<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('kpi/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Tambah Data</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> KPI </th>
                                <th> Persentase </th>
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
                            <td> <?php echo $row['keterangan'] ?> </td>
                            <td align="center"> <?php echo $row['persentase'].'%' ?> </td>
                            <td align="center">
                                <?php
                                if ($row['status']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span> AKTIF</a>
                                    <?php
                                } elseif ($row['status']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span> NON AKTIF</a>
                                    <?php
                                } elseif ($row['status']=='3') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-secondary ajaxify' disabled='disabled'><del>DATA TIDAK ADA</del></a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status']!='3') {
                                    ?>
                                    <a href="<?php echo site_url('kpi/edit/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i></a> &nbsp;
                                    <a data-url="<?php echo site_url('kpi/doDelete/') ?>" data-id="<?php echo $row['id'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/kpi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KPI.handleDeleteData();
    window.KPI.initTable();
</script>