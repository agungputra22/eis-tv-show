<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('seragam/tambah_pengembalian') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
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
                                <th> Harga Satuan </th>
                                <th> Total </th>
                                <th> Tanggal Pengembalian </th>
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
                            <td> <?php echo $row['no_pengajuan'] ?> </td>
                            <td> <?php echo $row['ket_pengajuan'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['dept_struktur'] ?> </td>
                            <td> <?php echo $row['lokasi_struktur'] ?> </td>
                            <td> (<?php echo $row['kode_seragam'] ?>) <?php echo $row['nama_seragam'] ?> </td>
                            <td> <?php echo $row['qty_seragam'] ?> </td>
                            <td> <?php echo $row['harga_satuan'] ?> </td>
                            <td> <?php echo $row['total'] ?> </td>
                            <td> <?php echo $row['tanggal_pengembalian'] ?> </td>
                            <td> <?php echo $row['ket_tambahan'] ?> </td>
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