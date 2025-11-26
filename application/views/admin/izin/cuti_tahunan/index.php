<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase">
                        <?php echo $title ?> &nbsp;
                    <h3 class="text-danger">CUTI 2023 : <?php echo $cuti['hak_cuti_utuh'] ?></h3> &nbsp;
                    <h3 class="text-danger">CUTI 2024 : <?php echo $cuti_berikutnya['hak_cuti_utuh'] ?></h3>
                    </span>
                    <h5><span class="font-red">Note : Approval berlaku 1x24 jam mohon konfirmasi ke atasan </span></h5> 
                </div>
                <div class="actions">                    
                    <?php
                        $tanggal_sekarang = date('Y-m-d');
                        // $tanggal_gabung = $cuti['tanggal_join'];
                        // $selisih = strtotime($tanggal_sekarang) - strtotime($tanggal_gabung);
                        // $hari = $selisih/(60*60*24);

                        $tanggal_sekarang_2 = date('Y-m-d');
                        $tanggal_gabung_2 = $cuti_berikutnya['tanggal_join'];
                        $selisih_2 = strtotime($tanggal_sekarang_2) - strtotime($tanggal_gabung_2);
                        $hari_2 = $selisih_2/(60*60*24);

                        $start_date = $cuti_berikutnya['start_efektif_cuti'];

                        if (empty($cuti_berikutnya)) {
                            ?>
                                <span class="caption-subject font-dark sbold uppercase">
                                    Belum Memiliki Cuti
                                </span>
                            <?php
                        } elseif ($cuti_berikutnya['hak_cuti_utuh'] <= 0) {
                            ?>
                                <span class="caption-subject font-dark sbold uppercase">
                                    Cuti Telah Habis
                                </span>
                            <?php
                        } elseif ($start_date < $tanggal_sekarang) {
                            ?>
                                <a href="<?php echo site_url('cuti_tahunan/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-plus"></i> Form Cuti </a> 
                                <!-- <span class="caption-subject font-dark sbold uppercase">
                                    Sedang Maintanance
                                </span> -->
                            <?php
                        } else {
                            ?>
                                <span class="caption-subject font-dark sbold uppercase">
                                    Belum Memiliki Cuti
                                </span>
                            <?php
                        }
                    ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Tanggal Berakhir </th>
                                <th> No. Pengajuan </th>
                                <th> Cuti Tanggal </th>
                                <th> Keterangan Tambahan </th>
                                <th> Status </th>
                                <th> Tanggal </th>
                                <th> Feedback Atasan 1</th>
                                <th> Status </th>
                                <th> Tanggal </th>
                                <th> Feedback Atasan 2 </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['tanggal_deadline'] ?> </td>
                            <td> <?php echo $row['no_pengajuan_tahunan'] ?> </td>
                            <td> <?php echo $row['start_cuti_tahunan'] ?> </td>
                            <td> <?php echo $row['ket_tambahan_tahunan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_tahunan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_tahunan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_cuti_tahunan'] ?> </td>
                            <td> <?php echo $row['feedback_cuti_tahunan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_tahunan_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_tahunan_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_cuti_tahunan_2']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_cuti_tahunan_2'] ?> </td>
                            <td> <?php echo $row['feedback_cuti_tahunan_2'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/cuti_tahunan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_TAHUNAN.handleDeleteData();
    window.CUTI_TAHUNAN.initTable();
</script>