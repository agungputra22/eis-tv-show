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
                                <th> NIK Baru </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Level </th>
                                <th> Tanggal Bergabung </th>
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
                            <td> <?php echo $row['nik_baru'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['level_struktur'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['join_date_struktur'])) ?> </td>
                            <td align="center">
                                <?php
                                    if ($row['jumlah_performance'] > 0) {
                                        // Revisi Data Master
                                        if ($row['level_jabatan_karyawan'] >= '5') {
                                            ?>
                                            <a href="<?php echo site_url('performance/revisi_edit_ipp/'.$row['nik_baru']) ?>" class="btn btn-circle green btn-outline btn-sm  ajaxify"><i class="fa fa-pencil"></i> FORM IPP</a>
                                            <a href="<?php echo site_url('performance/detail_ipp/'.$row['nik_baru']) ?>" class="btn btn-circle red btn-outline btn-sm  ajaxify">DETAIL</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo site_url('performance/revisi_edit_tt/'.$row['nik_baru']) ?>" class="btn btn-circle green btn-outline btn-sm  ajaxify"><i class="fa fa-pencil"></i> FORM IPP</a>
                                            <a href="<?php echo site_url('performance/detail_tt/'.$row['nik_baru']) ?>" class="btn btn-circle red btn-outline btn-sm ajaxify">DETAIL</a>
                                            <?php
                                        }
                                    } else {
                                        // Buat Baru Data Master
                                        if ($row['level_jabatan_karyawan'] >= '5') {
                                            ?>
                                            <a href="<?php echo site_url('performance/revisi_edit_ipp/'.$row['nik_baru']) ?>" class="btn btn-circle green btn-outline btn-sm  ajaxify"><i class="fa fa-pencil"></i> FORM IPP</a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?php echo site_url('performance/revisi_edit_tt/'.$row['nik_baru']) ?>" class="btn btn-circle green btn-outline btn-sm  ajaxify"><i class="fa fa-pencil"></i> FORM IPP</a>
                                            <?php
                                        }
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

<script src="<?php echo base_url('assets/apps/scripts/performance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PERFORMANCE.handleDeleteData();
    window.PERFORMANCE.initTable();
</script>