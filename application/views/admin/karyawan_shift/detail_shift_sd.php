<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_shift/index_karyawan_dept_sd') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th>No. </th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Lokasi</th>
                                <th>Departement</th>
                                <th>Tanggal</th>
                                <th>Jam Kerja</th>
                                <!-- <th>Aksi</th> -->
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
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['lokasi_hrd'] ?> </td>
                            <td> <?php echo $row['kode_departement'] ?> </td>
                            <td> <?php echo $row['tanggal_shift'] ?> </td>
                            <td> <?php echo $row['waktu_masuk']. ' - ' .$row['waktu_keluar'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.filterAbsen();
    window.KARYAWAN_SHIFT.initTable();
</script>