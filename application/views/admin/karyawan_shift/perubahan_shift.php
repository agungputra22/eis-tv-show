<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th>No. </th>
                                <th>NIK</th>
                                <th>Nama Karyawan</th>
                                <th>Tanggal Shift</th>
                                <th>Waktu Lembur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nik_shift'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_shift'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_shift'])) ?> </td>
                            <td> <?php echo $row['waktu_masuk']. ' - ' . $row['waktu_keluar'] ?> </td>
                            <td>
                                <a href="<?php echo site_url('karyawan_shift/ubah_shift/'.$row['id_karyawan_shift']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i>Ubah Shift</a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.initTable();
</script>