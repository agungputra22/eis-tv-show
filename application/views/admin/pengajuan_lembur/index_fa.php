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
                                <th> NO. </th>
                                <th> Hari Besar </th>
                                <th> Tanggal </th>
                                <th> Keterangan Tambahan </th>
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
                            <td> <?php echo $row['name'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['birth_date'])) ?> </td>
                            <td> <?php echo $row['deskripsi'] ?> </td>
                            <td align="center">
                                <?php
                                    $now = date('Y-m-d');
                                    $tanggal_events = $row['birth_date'];
                                    $tanggal_1 = strtotime($now);
                                    $tanggal_2 = strtotime($tanggal_events);
                                    if ($tanggal_1 >= $tanggal_2) {
                                        ?>
                                            <a href="<?php echo site_url('pengajuan_lembur/approve_fa/'.$row['birth_date']) ?>" class="text-primary ajaxify"><i class="fa fa-eye"></i>Lihat Data Karyawan Lembur</a>
                                        <?php
                                    } else {
                                        ?>
                                            <span class="caption-subject font-dark sbold uppercase">
                                                Belum Tersedia
                                            </span>
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

<script src="<?php echo base_url('assets/apps/scripts/pengajuan_lembur.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PENGAJUAN_LEMBUR.handleDeleteData();
    window.PENGAJUAN_LEMBUR.initTable();
</script>