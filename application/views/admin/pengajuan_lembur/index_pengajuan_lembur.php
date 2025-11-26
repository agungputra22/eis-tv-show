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
                                <th> Hari Besar </th>
                                <th> Tanggal </th>
                                <th> Keterangan Tambahan </th>
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
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['birth_date'])) ?> </td>
                            <td> <?php echo $row['deskripsi'] ?> </td>
                            <td align="center">
                                <a href="<?php echo site_url('pengajuan_lembur/view_lembur/'.$row['birth_date']) ?>" class="text-primary ajaxify"><i class="fa fa-eye"></i>Karyawan Lembur</a> &nbsp;
                                <a href="<?php echo site_url('pengajuan_lembur/input_lembur/'.$row['birth_date']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Input Karyawan Lembur</a>
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

<script src="<?php echo base_url('assets/apps/scripts/pengajuan_lembur.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PENGAJUAN_LEMBUR.handleDeleteData();
    window.PENGAJUAN_LEMBUR.initTable();
</script>