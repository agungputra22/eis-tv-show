<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_pkwt/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-title">
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th rowspan="2"> NO. </th>
                                <th rowspan="2"> NIK </th>
                                <th rowspan="2"> Nama Karyawan </th>
                                <th rowspan="2"> Jabatan </th>
                                <th colspan="2"> Kontrak </th>
                                <th rowspan="2"> Waktu </th>
                                <th rowspan="2"> Status </th>
                               <!--  <th colspan="2"> Kontrak 2 </th>
                                <th rowspan="2"> Waktu Kontrak 2 </th> -->
                                <th rowspan="2"> Aksi </th>
                            </tr>
                            <tr role="row" class="bg-primary">
                                <th>Start</th>
                                <th>End</th>
                                <!-- <th>Start</th>
                                <th>End</th> -->
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
                            <td> <?php echo $row['nama_karyawan_historical'] ?> </td>
                            <td> <?php echo $row['jabatan_historical'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['start_pkwt_1'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['end_pkwt_1'])); ?> </td>
                            <?php 
                                $tanggal_end        = strtotime($row['end_pkwt_1']);
                                $tanggal_sekarang   = time(); // Waktu Sekarang
                                $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                $tanggal_akhir = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                if ($tanggal_akhir <= 30 ) {
                                    # code...
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FF0000'> <font color='blue'>$tanggal</font>";
                                } elseif ($tanggal_akhir <= 45 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#FFFF00'> <font color='blue'>$tanggal</font>";
                                } elseif ($tanggal_akhir <= 60 ) {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td bgcolor='#7CFC00'> <font color='blue'>$tanggal</font>";
                                } else {
                                    $tanggal = $tanggal_akhir;
                                    echo "<td> $tanggal";
                                }
                            ?>

                            <?php

                            if ($row['karyawan_status']=='Non Aktif') {
                                echo "<td bgcolor='black'> <font color='white'>Non Aktif</font>";
                            } elseif ($row['karyawan_status']=='Aktif') {
                                echo "<td> Aktif";
                            }

                            ?>

                            <td align="center">
                                <a href="<?php echo site_url('historical_pkwt/edit/'.$row['id_historical']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i></a> &nbsp;
                                <a data-url="<?php echo site_url('historical_pkwt/doDelete/') ?>" data-id="<?php echo $row['id_historical'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/historical_pkwt.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_PKWT.handleDeleteData();
    window.HISTORICAL_PKWT.initTable();
</script>