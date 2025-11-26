<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <!-- <img width="60" height="60" src="<?php echo base_url($this->config->item('img_path').'clearance_sheet.jfif') ?>" alt="" /> -->
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> NIK </th>
                                <th> Nama Karyawan </th>
                                <th> Jabatan </th>
                                <th> Perusahaan </th>
                                <th> Depo </th>
                                <th> Tanggal Bergabung </th>
                                <th> Tanggal Resign </th>
                                <th> Tanda Terima </th>
                                <th> Dokumen Tanda Terima </th>
                                <th> Status </th>
                                <th> Cetak Dokumen </th>
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
                            <td> <?php echo $row['nama_clearance'] ?> </td>
                            <td> <?php echo $row['jabatan_clearance'] ?> </td>
                            <td> <?php echo $row['perusahaan_struktur'] ?> </td>
                            <td> <?php echo $row['depo_clearance'] ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_bergabung_clearance'])); ?> </td>
                            <td> <?php echo DateToIndo(date($row['tanggal_resign_clearance'])); ?> </td>
                            <td>
                                <?php

                                if ($row['dok_tanda_terima']=='Sudah Upload') {
                                    echo "<a href='clearance_sheet/tanda_terima/$row[id_clearance]' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='fa fa-upload'></span>Upload Dokumen</a> <br>";
                                } elseif ($row['dok_tanda_terima']=='Belum Upload') {
                                    echo "<a href='clearance_sheet/tanda_terima/$row[id_clearance]' class='btn btn-xs btn-warning ajaxify'><span class='fa fa-upload'></span>Upload Dokumen</a> <br>";
                                }

                                ?>
                                
                            </td>
                            <td align="center"> <?php echo $row['dok_tanda_terima'] ?> </td>
                            <td style="text-align:center;<?php if ($row['status_clearance_sheet']=='Belum Close') { ?> <?php } ?>">
                              <?php if ($row['status_clearance_sheet']=='Belum Close') {?>
                                <!-- <form method="post" action="<?php echo base_url().'clearance_sheet/close/'?>"> -->
                                <input name="id" type="hidden" value="<?php echo $row['id_clearance']; ?>">
                                 <!-- <button class="btn btn-xs btn-success" onclick="return confirm('<?php echo $row['nik_baru']; ?> akan di nonaktifkan ?');">
                                    Belum Close </button> -->
                                <button data-url="<?php echo site_url('clearance_sheet/close/') ?>" data-id="<?php echo $row['id_clearance'] ?>" class="btn btn-xs btn-danger btnClose">Belum Close</button>
                              <?php } ?>
                              <?php if ($row['status_clearance_sheet']=='Close') {?>
                                 <!-- <input name="id" type="hidden" value="<?php echo $row['id_clearance']; ?>"> -->
                                 <button class="btn btn-xs btn-success" disabled="">
                                     Close </button>
                              <?php } ?>
                              </form>
                            </td>
                            <td align="center">
                                <?php

                                if ($row['perusahaan_struktur']=='TVIP') {
                                    echo "<a href='clearance_sheet/paklaring_tvip/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Paklaring </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='ASA') {
                                    echo "<a href='clearance_sheet/paklaring_asa/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Paklaring </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='MRT') {
                                    echo "<a href='clearance_sheet/paklaring_mrt/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Paklaring </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='TBK') {
                                    echo "<a href='clearance_sheet/paklaring_tbk/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Paklaring </a> <br>";
                                } else {
                                    echo "Tidak Ada Paklaring <br>";
                                }

                                if ($row['perusahaan_struktur']=='TVIP') {
                                    echo "<a href='clearance_sheet/non_aktif_tvip/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Non Aktif </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='ASA') {
                                    echo "<a href='clearance_sheet/non_aktif_asa/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Non Aktif </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='MRT') {
                                    echo "<a href='clearance_sheet/non_aktif_mrt/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Non Aktif </a> <br>";
                                } elseif ($row['perusahaan_struktur']=='TBK') {
                                    echo "<a href='clearance_sheet/non_aktif_tbk/$row[id_clearance]' target='_blank' class='btn btn-xs text-success'><i class='fa fa-print'></i> Non Aktif </a> <br>";
                                } else {
                                    echo "Tidak Ada Non Aktif <br>";
                                }

                                ?>
                            </td>
                            <td align="center">
                                <a href="<?php echo site_url('clearance_sheet/edit/'.$row['id_clearance']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i></a> &nbsp;
                                <a data-url="<?php echo site_url('clearance_sheet/doDelete/') ?>" data-id="<?php echo $row['id_clearance'] ?>" class="text-danger btnDelete"><i class="fa fa-trash"></i></a> &nbsp;
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

<script src="<?php echo base_url('assets/apps/scripts/clearance_sheet.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CLEARANCE_SHEET.handleDeleteData();
    window.CLEARANCE_SHEET.handleCloseData();
    window.CLEARANCE_SHEET.initTable();
</script>