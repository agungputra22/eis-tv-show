<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('pembinaan_karyawan/index_karyawan_sd') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Nomor Form </th>
                                <th> Jenis Sanksi </th>
                                <th> Jenis Pelanggaran </th>
                                <th> Keterangan Tambahan </th>
                                <th> Tanggal Efektif </th>
                                <th> Tanggal Berakhir </th>
                                <th> Status Sanksi </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['no_surat'] ?> </td>
                            <td> <?php echo $row['punishment_historical_violance'] ?> </td>
                            <td> <?php echo $row['pelanggaran_historical_violance'] ?> </td>
                            <td> <?php echo $row['warning_note_historical_violance'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['warning_start_historical_violance'])) ?> </td>
                            <td> <?php echo DateToIndo(date($row['warning_end_historical_violance'])) ?> </td>
                            <td>
                                <?php
                                $tgl=date('Y-m-d');
                                
                                if ($row['warning_end_historical_violance'] < $tgl ) {
                                    echo "Kadarluarsa";
                                } 
                                if ($row['warning_end_historical_violance'] > $tgl ) {
                                    echo "Aktif";
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

<script src="<?php echo base_url('assets/apps/scripts/pembinaan_karyawan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PEMBINAAN_KARYAWAN.handleDeleteData();
    window.PEMBINAAN_KARYAWAN.initTable();
</script>