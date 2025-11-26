<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('stpl/dokumen_stpl/') ?>" class="btn btn-xs btn-warning ajaxify"><span class="fa fa-upload"></span>Upload Dokumen</a>
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
                                            <a href="<?php echo site_url('stpl/excel/'.$row['birth_date'].'/'.$row['name']) ?>" target="_blank" class="btn btn-circle green btn-outline btn-sm"> 
                                            <i class="icon-printer"></i> Print STPL </a>
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

<script src="<?php echo base_url('assets/apps/scripts/stpl.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.STPL.handleDeleteData();
    window.STPL.initTable();
</script>