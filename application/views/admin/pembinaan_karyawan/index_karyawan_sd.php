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
                                <th> Nama </th>
                                <th> Jabatan </th>
                                <th> Departement </th>
                                <th> PT </th>
                                <th> Lokasi </th>
                                <th> Foto </th>
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
                            <td> <?php echo $row['nama_lengkap'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['dept_struktur'] ?> </td>
                            <td> <?php echo $row['perusahaan_struktur'] ?> </td>
                            <td> <?php echo $row['lokasi_struktur'] ?> </td>
                            <td> <img width="50" height="50" src="uploads/data_induk/foto/<?=$row['foto'];?>" /> </td>
                            <td align="center">
                                <a href="<?php echo site_url('pembinaan_karyawan/detail/'.$row['nik_baru']) ?>" class="text-primary ajaxify"><i class="fa fa-eye"></i>Punisment</a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/karyawan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN.handleDeleteData();
    window.KARYAWAN.initTable();
</script>