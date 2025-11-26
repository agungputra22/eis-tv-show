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
                                <th> Tanggal Absen </th>
                                <th> F1 </th>
                                <th> Depo Awal </th>
                                <th> Shift Masuk </th>
                                <th> F4 </th>
                                <th> Depo Akhir </th>
                                <th> Shift Keluar </th>
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
                            <td> <?php echo namahari($row['shift_day']). ', ' .DateToIndo(date($row['shift_day'])); ?> </td>
                            <?php
                                $F1 = $row['f1'];
                                if ($row['f1'] == $row['f4']) {
                                    echo "<td bgcolor = 'yellow'> $F1 </td>";
                                }
                                else {
                                    echo "<td> $F1 </td>";
                                }
                            ?>

                            <td> <?php echo $row['depo_f1'] ?> </td>
                            <td> <?php echo $row['waktu_masuk'] ?> </td>

                            <?php
                                $F4 = $row['f4'];
                                if ($row['f1'] == $row['f4']) {
                                    echo "<td bgcolor = 'yellow'> $F4 </td>";
                                }
                                else {
                                    echo "<td> $F4 </td>";
                                }
                            ?>

                            <td> <?php echo $row['depo_f4'] ?> </td>
                            <td> <?php echo $row['waktu_keluar'] ?> </td>

                            <?php
                                if ($row['f1'] == $row['f4']) {
                                    echo "<td>". $row['Keterangan'] ."</td>";
                                }
                                else {
                                    echo "<td>". $row['Keterangan'] ."</td>";
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

<script src="<?php echo base_url('assets/apps/scripts/absensi_masuk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.ABSENSI_MASUK.handleDeleteData();
    window.ABSENSI_MASUK.handleChange();
    window.ABSENSI_MASUK.initTable();
</script>