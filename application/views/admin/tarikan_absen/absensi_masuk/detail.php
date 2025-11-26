<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('tarikan_absen/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
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
                                <th> Keterangan </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik'] ?> </td>
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo namahari($row['tanggal_absen']). ', ' .DateToIndo(date($row['tanggal_absen'])); ?> </td>
                            <?php
                                $F1 = $row['F1'];
                                if ($row['F1'] == $row['F4']) {
                                    echo "<td bgcolor = 'yellow'> $F1 </td>";
                                }
                                else {
                                    echo "<td> $F1 </td>";
                                }
                            ?>

                            <?php
                                $F4 = $row['F4'];
                                if ($row['F1'] == $row['F4']) {
                                    echo "<td bgcolor = 'yellow'> $F4 </td>";
                                }
                                else {
                                    echo "<td> $F4 </td>";
                                }
                            ?>

                            <?php
                                if ($row['F1'] == $row['F4']) {
                                    echo "<td>". $row['ket_absensi'] ."</td>";
                                }
                                else {
                                    echo "<td>". $row['ket_absensi'] ."</td>";
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

<script src="<?php echo base_url('assets/apps/scripts/tarikan_absen.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.TARIKAN_ABSEN.filterAbsen();
    window.TARIKAN_ABSEN.initTable();
</script>