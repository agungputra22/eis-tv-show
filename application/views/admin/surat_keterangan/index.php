<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <?php
                    if (users('perusahaan_struktur') == 'TVIP') {
                        ?>
                        <div class="actions">
                            <a href="<?php echo site_url('surat_keterangan/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-plus"></i> Form Pengajuan </a>
                        </div>
                        <?php
                    } elseif (users('perusahaan_struktur') == 'ASA') {
                        ?>
                        <div class="actions">
                            <a href="<?php echo site_url('surat_keterangan/tambah') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-plus"></i> Form Pengajuan </a>
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
                                <th> NIK </th>
                                <th> Jenis Keperluan </th>
                                <th> Analisa Kebutuhan </th>
                                <th> Status Atasan </th>
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
                            <td> <?php echo $row['keperluan'] ?> </td>
                            <td> <?php echo $row['analisa'] ?> </td>
                            <td>
                                <?php

                                if ($row['status_atasan']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_atasan']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_atasan']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
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

<script src="<?php echo base_url('assets/apps/scripts/surat_keterangan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.SURAT_KETERANGAN.handleDeleteData();
    window.SURAT_KETERANGAN.initTable();
</script>