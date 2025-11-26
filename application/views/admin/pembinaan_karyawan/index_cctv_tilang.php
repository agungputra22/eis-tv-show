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
                                <th> Tanggal Kejadian </th>
                                <th> Ketentuan </th>
                                <th> Pasal </th>
                                <th> Pelanggaran </th>
                                <th> Point </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['tanggal'].' - '.$row['jam'] ?> </td>
                            <td> <?php echo $row['ketentuan'] ?> </td>
                            <td> <?php echo $row['kat_fasal'] ?> </td>
                            <td> <?php echo $row['item'] ?> </td>
                            <td> <?php echo $row['point'] ?> </td>
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
    window.PEMBINAAN_KARYAWAN.initTable();
</script>