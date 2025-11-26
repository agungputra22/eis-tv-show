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
                                <th> Jenis Keperluan </th>
                                <th> Analisa Kebutuhan </th>
                                <th> Status Atasan </th>
                                <th> Status HRD </th>
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
                            <td> <?php echo $row['keperluan'] ?> </td>
                            <td> <?php echo $row['analisa'] ?> </td>
                            <td style="text-align:center;<?php if ($row['status_atasan']=='0') { ?> <?php } ?>">
                              <?php if ($row['status_atasan']=='0') {?>
                                <input name="id" type="hidden" value="<?php echo $row['id']; ?>">
                                <button data-url="<?php echo site_url('surat_keterangan/tindakan_atasan_1/') ?>" data-id="<?php echo $row['id'] ?>" class="btn btn-xs btn-danger btnApprove">OPEN</button>
                              <?php } ?>
                              <?php if ($row['status_atasan']=='1') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     APPROVED </button>
                              <?php } ?>
                              <?php if ($row['status_atasan']=='2') {?>
                                 <button class="btn btn-xs btn-denger" disabled="">
                                     NOT APPROVED </button>
                              <?php } ?>
                              </form>
                            </td>
                            <td align="center">
                                <?php

                                if ($row['status_hrd']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'><span class='glyphicon glyphicon-warning'>Open</span></a>";
                                } elseif ($row['status_hrd']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_hrd']=='2') {
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
    window.SURAT_KETERANGAN.handleApproveData();
    window.SURAT_KETERANGAN.initTable();
</script>