<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('ptk/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Form Pengajuan (FRM.HRD.01)</a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Jabatan Karyawan </th>
                                <th> Level </th>
                                <th> Depo </th>
                                <th> Departement </th>
                                <th> Analisa Kebutuhan </th>
                                <th> Penyediaan Tenaga Kerja </th>
                                <th> Status Atasan </th>
                                <th> Status HRD </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['level_jabatan'] ?> </td>
                            <td> <?php echo $row['depo_ptk'] ?> </td>
                            <td> <?php echo $row['dept_ptk'] ?> </td>
                            <td> <?php echo $row['analisa'] ?> </td>
                            <td> <?php echo $row['tenaga_kerja'] ?> </td>
                            <td align="center">
                                <?php

                                if ($row['status_atasan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'>OPEN</a>";
                                } elseif ($row['status_atasan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_atasan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php

                                if ($row['status_hrd']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'>OPEN</a>";
                                } elseif ($row['status_hrd']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_hrd']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
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

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleDeleteData();
    window.PTK.initTable();
</script>