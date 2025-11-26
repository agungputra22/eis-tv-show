<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <img width="60" height="60" src="<?php echo base_url($this->config->item('img_path').'historical_mutasi.jfif') ?>" alt="" /> -->
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
                                <th> Proses </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> PT </th>
                                <th> Lokasi </th>
                                <th> Departement </th>
                                <th> Jabatan Awal </th>
                                <th> Jabatan Akhir </th>
                                <th> Rekomendasi Tanggal </th>
                                <th> Status Atasan </th>
                                <th> Tanggal Approve</th>
                                <th> Tanggal Efektif HRD </th>
                                <th> Tanggal Efektif FA </th>
                                <th> Waktu Berakhir </th>
                                <th> Tanggal Berakhir </th>
                                <th> Keterangan </th>
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
                            <td> <span class="caption-subject font-dark sbold uppercase"><?php echo $row['permintaan'] ?></span> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_mutasi'] ?> </td>
                            <td> <?php echo $row['pt_awal'] ?> </td>
                            <td> <?php echo $row['lokasi_awal'] ?> </td>
                            <td> <?php echo $row['dept_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_awal'] ?> </td>
                            <td> <?php echo $row['jabatan_baru'] ?> </td>
                            <td> <?php echo $row['rekomendasi_tanggal'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_atasan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class=''>Open</span></a>";
                                } elseif ($row['status_atasan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVAL</a>";
                                } elseif ($row['status_atasan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval'] ?> </td>
                            <td> <?php echo $row['tanggal_efektif'] ?> </td>
                            <td> <?php echo $row['tanggal_efektif_fa'] ?> </td>
                            <?php
                                $permintaan = $row['permintaan'];
                                $tanggal_efektif = $row['tanggal_efektif'];
                                if ($permintaan == 'promosi' and $tanggal_efektif <> '0000-00-00') {
                                    ?>
                                    <?php
                                        $tanggal_end        = strtotime((date('Y-m-d', strtotime('+3 MONTH', strtotime($row['tanggal_efektif'])))));
                                        $tanggal_sekarang   = time(); // Waktu Sekarang
                                        $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                        $tanggal_akhir      = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                        $tgl=date('d-m-Y');
                                        if ($tanggal_akhir <= 15 ) {
                                            # code...
                                            $tanggal = $tanggal_akhir;
                                            echo "<td bgcolor='#FF0000'> <font color='blue'>$tanggal</font>";
                                        } elseif ($tanggal_akhir <= 30 ) {
                                            $tanggal = $tanggal_akhir;
                                            echo "<td bgcolor='#FFFF00'> <font color='blue'>$tanggal</font>";
                                        } else {
                                            $tanggal = $tanggal_akhir;
                                            echo "<td> $tanggal";
                                        }
                                    ?>
                                    <?php
                                }
                                if ($permintaan <> 'promosi' and $tanggal_efektif <> '0000-00-00') {
                                    ?>
                                    <?php
                                        $tanggal_end        = strtotime((date('Y-m-d', strtotime('+2 MONTH', strtotime($row['tanggal_efektif'])))));
                                        $tanggal_sekarang   = time(); // Waktu Sekarang
                                        $sisa_waktu         = $tanggal_end - $tanggal_sekarang;
                                        $tanggal_akhir      = floor($sisa_waktu / (60 * 60 * 24)) ." Hari";
                                        $tgl=date('d-m-Y');
                                        if ($tanggal_akhir <= 15 ) {
                                            # code...
                                            $tanggal = $tanggal_akhir;
                                            echo "<td bgcolor='#FF0000'> <font color='blue'>$tanggal</font>";
                                        } elseif ($tanggal_akhir <= 30 ) {
                                            $tanggal = $tanggal_akhir;
                                            echo "<td bgcolor='#FFFF00'> <font color='blue'>$tanggal</font>";
                                        } else {
                                            $tanggal = $tanggal_akhir;
                                            echo "<td> $tanggal";
                                        }
                                    ?>
                                    <?php
                                }
                                else {
                                    ?>
                                    <td></td>
                                    <?php
                                }
                            ?>
                            <?php
                                $permintaan = $row['permintaan'];
                                $tanggal_efektif = $row['tanggal_efektif'];
                                if ($permintaan == 'promosi' and $tanggal_efektif <> '0000-00-00') {
                                    ?>
                                    <td><?php echo DateToIndo(date('Y-m-d', strtotime('+3 MONTH', strtotime($row['tanggal_efektif'])))); ?></td>
                                    <?php
                                }
                                if ($permintaan <> 'promosi' and $tanggal_efektif <> '0000-00-00') {
                                    ?>
                                    <td><?php echo DateToIndo(date('Y-m-d', strtotime('+2 MONTH', strtotime($row['tanggal_efektif'])))); ?></td>
                                    <?php
                                }
                                else {
                                    ?>
                                    <td></td>
                                    <?php
                                }
                            ?>
                            <td>
                                <?php
                                    $status = $row['status_pengajuan'];
                                    if ($status == '0') {
                                        # code...
                                        ?>
                                        <a href="<?php echo site_url('historical_mutasi/set_data/'.$row['id_mutasi_rotasi']) ?>" class="btn btn-xs btn-danger ajaxify">BELUM CLOSE</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled">CLOSE</a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td style="text-align:center;<?php if ($row['status_atasan']=='1') { ?> <?php } ?>">
                              <?php if ($row['status_atasan']=='0') {?>
                                <a href="<?php echo site_url('historical_mutasi/edit/'.$row['id_mutasi_rotasi']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Approval</a> &nbsp;
                              <?php } ?>
                              <?php if ($row['status_atasan']=='1') {?>
                                
                              <?php } ?>
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

<script src="<?php echo base_url('assets/apps/scripts/historical_mutasi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_MUTASI.handleDeleteData();
    window.HISTORICAL_MUTASI.initTable();
</script>