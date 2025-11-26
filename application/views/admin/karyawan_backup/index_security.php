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
                                <th> Nama </th>
                                <th> Alamat Domisili </th>
                                <th> No. KTP </th>
                                <th> No. Telephone </th>
                                <th> Tanggal Backup </th>
                                <th> F1 </th>
                                <th> Shift Masuk </th>
                                <th> F4 </th>
                                <th> Shift Keluar </th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                        $no = 1;
                        foreach ($listdata as $row) {
                        ?>
                        <tr>
                            <td> <?php echo $no ?> </td>
                            <td> <?php echo $row['nama_backup'] ?> </td>
                            <td> <?php echo $row['alamat_backup'] ?> </td>
                            <td> <?php echo $row['no_ktp_backup'] ?> </td>
                            <td> <?php echo $row['no_telp_backup'] ?> </td>
                            <td> <?php echo $row['tanggal_backup'] ?> </td>
                            <td style="text-align:center;<?php if ($row['in']=='') { ?> <?php } ?>">
                              <?php if ($row['in']=='') {?>
                                <input name="id" type="hidden" value="<?php echo $row['id_karyawan_backup']; ?>">
                                <button data-url="<?php echo site_url('karyawan_backup/f1/') ?>" data-id="<?php echo $row['id_karyawan_backup'] ?>" class="btn btn-xs btn-danger btnF1">Submit F1</button>
                              <?php } ?>
                              <?php if ($row['in']<>'') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     <?php echo $row['in'] ?> </button>
                              <?php } ?>
                              </form>
                            </td>
                            <td> <?php echo $row['waktu_masuk'] ?> </td>
                            <td style="text-align:center;<?php if ($row['out']=='') { ?> <?php } ?>">
                              <?php if ($row['out']=='') {?>
                                <input name="id" type="hidden" value="<?php echo $row['id_karyawan_backup']; ?>">
                                <button data-url="<?php echo site_url('karyawan_backup/f4/') ?>" data-id="<?php echo $row['id_karyawan_backup'] ?>" class="btn btn-xs btn-danger btnF4">Submit F4</button>
                              <?php } ?>
                              <?php if ($row['out']<>'') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     <?php echo $row['out'] ?> </button>
                              <?php } ?>
                              </form>
                            </td>
                            <td> <?php echo $row['waktu_keluar'] ?> </td>
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan_backup.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_BACKUP.handleDeleteData();
    window.KARYAWAN_BACKUP.handleF1();
    window.KARYAWAN_BACKUP.handleF4();
    window.KARYAWAN_BACKUP.initTable();
</script>