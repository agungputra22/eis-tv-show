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
                                <th> Nama Karyawan </th>
                                <th> Tanggal Awal </th>
                                <th> Tanggal Akhir </th>
                                <th> Waktu Kontrak </th>
                                <th> Kontrak </th>
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
                            <td> <?php echo DateToIndo(date($row['start_date'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['end_date'])); ?> </td>
                            <?php 
                                $tanggal_end        = strtotime($row['end_date']);
                                $tanggal_sekarang   = time(); // Waktu Sekarang
                                $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                $tanggal_akhir = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                if ($tanggal_akhir <= 0 ) {
                                    echo "<td bgcolor='black'> <font color='white'>Kontrak Perpanjang</font> </td>";
                                } elseif ($tanggal_akhir <= 30 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FF0000'> <font color='blue'>$tanggal</font> </td>";
                                } elseif ($tanggal_akhir <= 45 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FFFF00'> <font color='blue'>$tanggal</font> </td>";
                                } elseif ($tanggal_akhir <= 60 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#7CFC00'> <font color='blue'>$tanggal</font> </td>";
                                } else {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td> $tanggal </td>";
                                }
                            ?>
                            <td> <?php echo $row['kontrak'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/historical_pkwt.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_PKWT.handleDeleteData();
    window.HISTORICAL_PKWT.initTable();
</script>