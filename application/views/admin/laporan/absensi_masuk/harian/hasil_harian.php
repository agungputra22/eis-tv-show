<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('absensi_masuk/laporan_excel_harian?nik='.$nik.'&tanggal1='.$tanggal1.'&tanggal2='.$tanggal2.'&depo='.$depo.'&jabatan='.$jabatan.'&dept='.$dept) ?>" target="_blank" class="btn btn-circle green btn-outline btn-sm"> 
                        <i class="icon-printer"></i> Cetak Detail </a>
                    <a href="<?php echo site_url('absensi_masuk/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
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
                                <th> Tanggal Absen </th>
                                <th> F1 </th>
                                <th> F4 </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['badgenumber'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo $row['tanggal_absen'] ?> </td>
                            <td> <?php echo $row['F1'] ?> </td>
                            <td> <?php echo $row['F4'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/absensi_masuk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.ABSENSI_MASUK.initTable();
</script>