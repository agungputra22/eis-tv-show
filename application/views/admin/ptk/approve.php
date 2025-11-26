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
                                <th> Waktu Pengajuan </th>
                                <th> NIK </th>
                                <th> Nama Karyawan</th>
                                <th> Lokasi Karyawan </th>
                                <th> Jabatan Karyawan </th>
                                <th> Jabatan PTK </th>
                                <th> Depo PTK </th>
                                <th> Departement PTK </th>
                                <th> Analisa Kebutuhan </th>
                                <th> Penyediaan Tenaga Kerja </th>
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
                            <td> <?php echo $row['submit_date'] ?> </td>
                            <td> <?php echo $row['nik_pengajuan'] ?> </td>
                            <td> <?php echo $row['nama_karyawan_struktur'] ?> </td>
                            <td> <?php echo $row['lokasi_hrd'] ?> </td>
                            <td> <?php echo $row['jabatan_karyawan'] ?> </td>
                            <td> <?php echo $row['ptk_jabatan'] ?> </td>
                            <td> <?php echo $row['depo_ptk'] ?> </td>
                            <td> <?php echo $row['dept_ptk'] ?> </td>
                            <td> <?php echo $row['analisa'] ?> </td>
                            <td> <?php echo $row['tenaga_kerja'] ?> </td>
                            <td style="text-align:center;<?php if ($row['status_atasan']=='0') { ?> <?php } ?>">
                              <?php if ($row['status_atasan']=='0') {?>
                                <a href="<?php echo site_url('ptk/edit/'.$row['id']) ?>" class="btn btn-xs btn-danger ajaxify"><i class="fa fa-pencil">OPEN</i></a>
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
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'>OPEN</a>";
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

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleDeleteData();
    window.PTK.handleApproveData();
    window.PTK.initTable();
</script>