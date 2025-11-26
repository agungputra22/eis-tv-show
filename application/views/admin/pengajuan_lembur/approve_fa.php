<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('pengajuan_lembur/event_pembayaran') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Tanggal Lembur </a>
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
                                <th> Jabatan </th>
                                <th> Departement </th>
                                <th> Lokasi </th>
                                <th> Waktu Masuk </th>
                                <th> Waktu Keluar </th>
                                <th> Keterangan Lembur </th>
                                <th> No. CO </th>
                                <th> Status </th>
                                <th> Pembayaran </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik_lembur'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_lembur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan_lembur'] ?> </td>
                            <td> <?php echo $row['dept_karyawan_lembur'] ?> </td>
                            <td> <?php echo $row['lokasi_karyawan_lembur'] ?> </td>
                            <td> <?php echo $row['waktu_masuk'] ?> </td>
                            <td> <?php echo $row['waktu_keluar'] ?> </td>
                            <td> <?php echo $row['keterangan_lembur'] ?> </td>
                            <td> <?php echo $row['no_co_lembur'] ?> </td>
                            <td>
                                <?php

                                if ($row['status']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                } else {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                }

                                ?>
                            </td>
                            <td style="text-align:center;<?php if ($row['status']=='1') { ?> <?php } ?>">
                              <?php if ($row['status_2']=='0') {?>
                                <input name="id" type="hidden" value="<?php echo $row['id_karyawan_lembur']; ?>">
                                <button data-url="<?php echo site_url('pengajuan_lembur/payed/') ?>" data-id="<?php echo $row['id_karyawan_lembur'] ?>" class="btn btn-xs btn-danger btnPayed">Belum Terbayar</button>
                              <?php } ?>
                              <?php if ($row['status_2']=='1') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     Payed </button>
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

<script src="<?php echo base_url('assets/apps/scripts/pengajuan_lembur.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PENGAJUAN_LEMBUR.handlePayedData();
    window.PENGAJUAN_LEMBUR.initTable();
</script>