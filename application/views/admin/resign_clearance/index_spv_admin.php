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
                                <th> NIK </th>
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Tanggal Bergabung </th>
                                <th> Tanggal Efektif Resign</th>
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
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['join_date_struktur'])) ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_efektif_resign'])) ?> </td>
                            <td align="center">
                                <?php
                                    if ($row['status_clearance'] == 0) {
                                        ?>
                                        <a href="<?php echo base_url('resign_clearance/edit_spv_admin/'.$row['id']) ?>" class="btn btn-sm btn-circle red ajaxify"> 
                                            Clearance Sheet
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-sm btn-circle blue" disabled="disabled"> 
                                            Close
                                            <i class="glyphicon glyphicon-ok"></i>
                                        </a>
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

<script src="<?php echo base_url('assets/apps/scripts/resign_clearance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN_CLEARANCE.handleDeleteData();
    window.RESIGN_CLEARANCE.initTable();
</script>