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
                                <th> No. Pengajuan </th>
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Tanggal Pengajuan </th>
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
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['tanggal_pengajuan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_atasan_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_atasan_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_atasan_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                }

                                ?>
                            </td>

                            <?php
                                if ($row['level_role']=='1') {
                                    ?>
                                    <td align="center">
                                        <?php
                                            if ($row['status_atasan_2']=='0') {
                                                ?>
                                                <a href="<?php echo site_url('resign/tindakan/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                                <?php
                                            } elseif ($row['status_atasan_2']=='1' and $row['status_exit']=='0') {
                                                ?>
                                                <a href="<?php echo site_url('resign/exit_clearance/'.$row['nik_baru']) ?>" class="btn btn-xs btn-warning text-white ajaxify"><i class="fa fa-pencil"></i>Exit Clearance</a> &nbsp;
                                                <?php
                                            }
                                        ?>
                                    </td>
                                    <?php
                                } elseif ($row['level_role']=='2') {
                                    ?>
                                    <td align="center">
                                        <?php
                                            if ($row['status_atasan_2']=='0') {
                                                ?>
                                                <a href="<?php echo site_url('resign/tindakan_2/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                                                <?php
                                            } elseif ($row['status_atasan_2']=='1' and $row['status_exit']=='0') {
                                                ?>
                                                <a href="<?php echo site_url('resign/exit_clearance_2/'.$row['nik_baru']) ?>" class="btn btn-xs btn-warning text-white ajaxify"><i class="fa fa-pencil"></i>Exit Clearance</a> &nbsp;
                                                <?php
                                            }
                                        ?>
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

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.handleDeleteData();
    window.RESIGN.initTable();
</script>