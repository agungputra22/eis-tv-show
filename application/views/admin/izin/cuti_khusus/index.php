<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                    <h5><span class="font-red">Note : Approval berlaku 1x24 jam mohon konfirmasi ke atasan </span></h5>
                </div>
                <?php
                    if ( (users('perusahaan_struktur') != 'MPB PAKET' && users('perusahaan_struktur') != 'PMI PAKET' && users('perusahaan_struktur') != 'KBKM' && users('perusahaan_struktur') != 'MDKU PAKET' && users('perusahaan_struktur') != 'DDA PAKET') || (users('jabatan_struktur') != '286' && users('jabatan_struktur') != '312' && users('jabatan_struktur') != '410') ) {
                        ?>
                        <div class="actions">
                            <a href="<?php echo site_url('cuti_khusus/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-plus"></i> Form Cuti </a>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Tanggal Berakhir </th>
                                <th> No. Pengajuan </th>
                                <th> Jenis Cuti </th>
                                <th> Kondisi </th>
                                <th> Mulai Cuti </th>
                                <!-- <th> Berakhir Cuti </th> -->
                                <th> Keterangan Tambahan</th>
                                <th> Status </th>
                                <th> Tanggal </th>
                                <th> FeedBack Atasan 1 </th>
                                <th> Status </th>
                                <th> Tanggal </th>
                                <th> FeedBack Atasan 2 </th>
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
                            <td> <?php echo $row['no_pengajuan_khusus'] ?> </td>
                            <td> <?php echo $row['jenis_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['kondisi'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['start_cuti_khusus'])) ?> </td>
                            <!-- <td> <?php echo DateToIndo(date($row['end_cuti_khusus'])) ?> </td> -->
                            <td> <?php echo $row['ket_tambahan_khusus'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_khusus']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_khusus']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_khusus']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_cuti_khusus']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval_cuti_khusus'] ?> </td>
                            <td> <?php echo $row['feedback_cuti_khusus'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_cuti_khusus_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_cuti_khusus_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_cuti_khusus_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_cuti_khusus_2']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval_cuti_khusus_2'] ?> </td>
                            <td> <?php echo $row['feedback_cuti_khusus_2'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/cuti_khusus.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CUTI_KHUSUS.handleDeleteData();
    window.CUTI_KHUSUS.initTable();
</script>