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
                                <th> DR </th>
                                <th> MPA </th>
                                <th> PTK </th>
                                <th> Level Jabatan </th>
                                <th> Status HRD </th>
                                <th> Keterangan </th>
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
                            <td> <?php echo $row['DR'] ?> </td>
                            <td> <?php echo $row['MPA'] ?> </td>
                            <td> <?php echo $row['PTK'] ?> </td>
                            <td> <?php echo $row['level_jabatan'] ?> </td>
                            <?php
                                if ($row['status_mpp'] == '0') {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">OPEN HRD</span></a> </td>
                                    <?php
                                } elseif ($row['status_mpp'] == '1') {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-primary ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">CLOSE</span></a> </td>
                                    <?php
                                } elseif ($row['status_mpp'] == '2') {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-danger ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">REVISI</span></a> </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center"> <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-denger">OPEN HRD</span></a> </td>
                                    <?php
                                }
                            ?>
                            <td> <?php echo $row['keterangan'] ?> </td>
                            <?php
                                if ($row['status_mpp'] == '0') {
                                    ?>
                                    <td align="center"> <b>PROSES HRD</b> </td>
                                    <?php
                                } elseif ($row['status_mpp'] == null) {
                                    ?>
                                    <td align="center"> <b>TIDAK ADA</b> </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/print_jabatan/'.$row['no_jabatan_karyawan']) ?>" target='_blank' class="btnList btn btn-circle blue btn-outline btn-sm"> 
                                            <i class="fa fa-print"></i> Print WLA </a> &nbsp;
                                        <?php
                                            $hasil = $row['MPP_ACC'] - $row['MPA'];
                                            if ($hasil > 0) {
                                                ?>
                                                <a href="<?php echo site_url('ptk/edit_ptk/'.$row['no_jabatan_karyawan']) ?>" class="btnList btn btn-circle yellow btn-outline btn-sm ajaxify"><i class="fa fa-plus"></i>PTK</a> &nbsp;
                                                <?php
                                            } elseif ($hasil < 0) {
                                                ?>
                                                <a href="<?php echo site_url('ptk/edit_resign/'.$row['no_jabatan_karyawan']) ?>" class="btnList btn btn-circle yellow btn-outline btn-sm ajaxify"><i class="fa fa-plus"></i>RESIGN</a> &nbsp;
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <?php
                                }
                            ?>
                            <?php
                                if ($row['status_wla'] == '0') {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_work_load/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-primary ajaxify"><i class="fa fa-refresh"></i>Proses WLA</a> &nbsp;
                                    </td>
                                    <?php
                                } elseif ($row['status_wla'] == null) {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_work_load/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-primary ajaxify"><i class="fa fa-refresh"></i>Proses WLA</a> &nbsp;
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td align="center">
                                        <a href="<?php echo site_url('ptk/edit_histori_work_load/'.$row['no_jabatan_karyawan']) ?>" class="btn btn-xs btn-danger ajaxify"><i class="fa fa-pencil"></i>Update WLA</a> &nbsp;
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