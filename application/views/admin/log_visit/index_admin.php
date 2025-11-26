<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('log_visit/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Form Issue </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Tanggal </th>
                                <th> NIK </th>
                                <th> Nama HR </th>
                                <th> Masalah </th>
                                <th> Solusi </th>
                                <th> Status </th>
                                <th> Dokumen </th>
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
                            <td> <?php echo DateToIndo(date($row['tanggal'])) ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['issue'] ?> </td>
                            <td> <?php echo $row['solusi'] ?> </td>
                            <td>
                                <?php

                                if ($row['status']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>Close</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td>
                                <?php
                                    if ($row['dokumen'] <> '') { ?>
                                    <a href="<?php echo base_url('log_visit/download/'.$row['id']) ?>">Download file</a>
                                    <?php
                                    } else {
                                        echo "Tidak Ada File";
                                    }

                                ?>
                            </td>
                            <td align="center">
                                <a href="<?php echo site_url('log_visit/edit/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil">Update</i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/log_visit.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.LOG_VISIT.handleDeleteData();
    window.LOG_VISIT.initTable();
</script>