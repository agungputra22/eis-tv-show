<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('refund/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Form Pengajuan </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Tanggal Pengajuan </th>
                                <th> No Pengajuan </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Tanggal Absen </th>
                                <th> Absen Awal </th>
                                <th> Absen Akhir </th>
                                <th> Keterangan </th>
                                <th> Status Refund </th>
                                <th> Status BA </th>
                                <th> Status Pengajuan </th>
                                <th> Keterangan Pengajuan </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['submit_date'] ?> </td>
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['tanggal_absen'] ?> </td>
                            <td> <?php echo $row['absen_awal'] ?> </td>
                            <td> <?php echo $row['absen_akhir'] ?> </td>
                            <td> <?php echo $row['ket'] ?> </td>
                            <td align="center">
                                <?php
                                if ($row['status_refund']=='0') {
                                    ?>
                                    <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-warning">OPEN</span></a>
                                    <?php
                                } elseif ($row['status_refund']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>
                                    <?php
                                } elseif ($row['status_refund']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status_ba']=='0') {
                                    ?>
                                    <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-warning">OPEN</span></a>
                                    <?php
                                } elseif ($row['status_ba']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>
                                    <?php
                                } elseif ($row['status_ba']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td align="center">
                                <?php
                                if ($row['status_pengajuan']=='0') {
                                    ?>
                                    <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled"><span class="glyphicon glyphicon-warning">OPEN</span></a>
                                    <?php
                                } elseif ($row['status_pengajuan']=='1') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>
                                    <?php
                                } elseif ($row['status_pengajuan']=='2') {
                                    ?>
                                    <a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>REJECT</a>
                                    <?php
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['ket_pengajuan'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/refund.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.REFUND.initTable();
</script>