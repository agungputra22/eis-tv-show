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
                                <th> Kode </th>
                                <th> Nama Jabatan </th>
                                <th> Area </th>
                                <th> MPP WLA </th>
                                <th> MPP ACC </th>
                                <th> Status JobDesc </th>
                                <th> Cetak </th>
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
                            <td> <?php echo $row['kode_departement'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['tempat'] ?> </td>
                            <td> <?php echo $row['MPP_WLA'] ?> </td>
                            <td> <?php echo $row['MPP_ACC'] ?> </td>
                            <?php
                                if ($row['status_jobdesc'] == '0') {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-danger ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">OPEN</span></a> </td>
                                    <?php
                                } elseif ($row['status_jobdesc'] == '1') {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-primary ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">CLOSE</span></a> </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-danger ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">OPEN</span></a> </td>
                                    <?php
                                }
                            ?>
                            <?php
                                if ($row['status_jobdesc'] == '0') {
                                    ?>
                                    <td align="center"> <b>TIDAK ADA</b> </td>
                                    <?php
                                } elseif ($row['status_jobdesc'] == null) {
                                    ?>
                                    <td align="center"> <b>TIDAK ADA</b> </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/print_jobdesc/'.$row['no_jabatan_karyawan']) ?>" target='_blank' class="btnList btn btn-circle blue btn-outline btn-sm"> 
                                            <i class="fa fa-print"></i> Print JobDesc </a>
                                    </td>
                                    <?php
                                }
                            ?>
                            <?php
                                if ($row['status_jobdesc'] == '0' and $row['status_wla'] == '1') {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_jobdesc/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-primary ajaxify"><i class="fa fa-refresh"></i>Proses JobDesc</a> &nbsp;
                                    </td>
                                    <?php
                                } elseif ($row['status_jobdesc'] == null and $row['status_wla'] == '1') {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_jobdesc/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-primary ajaxify"><i class="fa fa-refresh"></i>Proses JobDesc</a> &nbsp;
                                    </td>
                                    <?php
                                } elseif ($row['status_jobdesc'] == '1' and $row['status_wla'] == '1') {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_histori_jobdesc/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-danger ajaxify"><i class="fa fa-pencil"></i>Update JobDesc</a> &nbsp;
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center">
                                        <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled">OPEN</a>
                                    </td>
                                    <?php
                                }
                            ?>
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

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.initTable();
</script>