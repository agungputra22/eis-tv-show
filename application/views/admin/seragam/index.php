<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <img width="60" height="60" src="<?php echo base_url($this->config->item('img_path').'seragam.jfif') ?>" alt="" /> -->
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('seragam/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-plus"></i> Form Pengajuan </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Pengajuan </th>
                                <th> Keterangan Pengajuan </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Departement </th>
                                <th> Lokasi </th>
                                <th> Jenis Seragam </th>
                                <th> QTY </th>
                                <th> Total Harga </th>
                                <th> Tanggal Distribusi </th>
                                <th> Keterangan </th>
                                <th> Status Realisasi </th>
                                <th> Status Distribusi Depo </th>
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
                            <td> <?php echo $row['ket_pengajuan'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_seragam'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan_seragam'] ?> </td>
                            <td> <?php echo $row['dept_karyawan_seragam'] ?> </td>
                            <td> <?php echo $row['lokasi_karyawan_seragam'] ?> </td>
                            <td> (<?php echo $row['kode_seragam'] ?>) <?php echo $row['nama_seragam'] ?> </td>
                            <td> <?php echo $row['qty_seragam'] ?> </td>
                            <td> <?php echo $row['total_harga'] ?> </td>
                            <td> <?php echo $row['tanggal_distribusi'] ?> </td>
                            <td> <?php echo $row['ket_tambahan'] ?> </td>
                            <td align="center">
                                <?php
                                    $status = $row['status_realisasi'];
                                    if ($status == '0') {
                                        # code...
                                        ?>
                                        <a href="" class="btn btn-xs btn-danger ajaxify" disabled="disabled">OPEN</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled">CLOSE</a>
                                        <?php
                                    }
                                ?>
                            </td>
                            <td align="center">
                                <?php
                                    $status = $row['status_distribusi'];
                                    if ($status == '0') {
                                        # code...
                                        ?>
                                        <a href="" class="btn btn-xs btn-danger ajaxify" disabled="disabled">OPEN</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a href="#" class="btn btn-xs btn-warning ajaxify" disabled="disabled">CLOSE</a>
                                        <?php
                                    }
                                ?>
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

<script src="<?php echo base_url('assets/apps/scripts/seragam.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.SERAGAM.handleDeleteData();
    window.SERAGAM.initTable();
</script>