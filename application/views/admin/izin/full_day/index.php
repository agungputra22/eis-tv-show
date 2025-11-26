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
                            <a href="<?php echo site_url('full_day/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-plus"></i> Form Izin </a>
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
                                <th> Jenis Izin </th>
                                <th> Tanggal Tidak Hadir </th>
                                <th> Karyawan Pengganti </th>
                                <th> Keterangan </th>
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
                            <td> <?php echo $row['no_pengajuan_full_day'] ?> </td>
                            <td> <?php echo $row['jenis_full_day'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['start_full_day'])) ?> </td>
                            <td> <?php echo $row['karyawan_pengganti'] ?> </td>
                            <td> <?php echo $row['ket_tambahan'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_full_day']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_full_day']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_full_day']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_full_day']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify' disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval'] ?> </td>
                            <td> <?php echo $row['feedback_full_day'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_full_day_2']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_full_day_2']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_full_day_2']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } elseif ($row['status_full_day_2']=='3') {
                                    echo "<a href='#' class='btn btn-xs btn ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-fire'></span>HANGUS</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_approval_2'] ?> </td>
                            <td> <?php echo $row['feedback_full_day_2'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/full_day.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.FULL_DAY.handleDeleteData();
    window.FULL_DAY.initTable();
</script>