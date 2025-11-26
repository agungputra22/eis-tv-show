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
                                <th> NIK </th>
                                <th> Nama Karyawan</th>
                                <th> Jabatan </th>
                                <th> Lokasi </th>
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
                            <td> <?php echo $row['lokasi_hrd'] ?> </td>
                            <td> <?php echo DateToIndo($row['join_date_struktur']) ?> </td>
                            <td style="text-align:center;<?php if ($row['status_penerima']=='0') { ?> <?php } ?>">
                              <?php if ($row['status_penerima']=='0') {?>
                                <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                                <input name="level_role" type="hidden" value="<?php echo $row['level_role']; ?>">
                                <a href="<?php echo site_url('resign/view_serah_terima/'.$row['nik_baru']) ?>" class="text-primary ajaxify"><i class="fa fa-eye"></i> View Serah Terima</a> &nbsp;
                              <?php } ?>
                              <?php if ($row['status_penerima']=='1') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     APPROVED </button>
                              <?php } ?>
                              <?php if ($row['status_penerima']=='2') {?>
                                 <button class="btn btn-xs btn-denger" disabled="">
                                     NOT APPROVED </button>
                              <?php } ?>
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

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.initTable();
</script>