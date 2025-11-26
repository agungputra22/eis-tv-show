<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase">Status</span> &nbsp;
                    <a href="<?php echo site_url('ptk/indexAcclHr') ?>" class="btn btn-xs btn-primary ajaxify"><span class="glyphicon glyphicon-ok"></span>APPROVED</a>
                    <a href="<?php echo site_url('ptk/index_reject') ?>" class="btn btn-xs btn-danger ajaxify"><span class="glyphicon glyphicon-remove"></span>REJECT</a> &nbsp;
                </div>
            <div class="portlet-body">
                <div class="table-container">
                    <table class="table table-striped table-bordered table-hover" id="datatables">
                        <thead>
                            <tr role="row" class="bg-primary">
                                <th> NO. </th>
                                <th> Tanggal Pengajuan </th>
                                <th> No. PTK </th>
                                <th> No. Urut</th>
                                <th> NIK </th>
                                <th> Nama Karyawan</th>
                                <th> Lokasi Karyawan </th>
                                <th> Jabatan Karyawan </th>
                                <th> Jabatan PTK </th>
                                <th> Depo PTK </th>
                                <th> Depatement PTK </th>
                                <th> Analisa Kebutuhan </th>
                                <th> Penyediaan Tenaga Kerja </th>
                                <th> Status Atasan </th>
                                <th> Tanggal Approve </th>
                                <th> Jangka Waktu </th>
                                <th> Tanggal Berakhir </th>
                                <th> Status Manager </th>
                                <th> Tanggal Manager </th>
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
                            <td> <?php echo $row['submit_date'] ?> </td>
                            <td> <?php echo $row['no_ptk'] ?> </td>
                            <td> <?php echo $row['no_urut'] ?> </td>
                            <td> <?php echo $row['nik_baru'] ?> </td>
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
                                <button class="btn btn-xs btn-warning" disabled="">
                                     OPEN </button>
                              <?php } ?>
                              <?php if ($row['status_atasan']=='1') {?>
                                 <button class="btn btn-xs btn-success" disabled="">
                                     APPROVED </button>
                              <?php } ?>
                              <?php if ($row['status_atasan']=='2') {?>
                                 <button class="btn btn-xs btn-danger" disabled="">
                                     NOT APPROVED </button>
                              <?php } ?>
                              </form>
                            </td>
                            <td>
                                <?php
                                if ($row['tanggal_approve'] != null) {
                                    echo DateToIndo($row['tanggal_approve']);
                                } else {
                                    
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['tanggal_approve'] != null) {
                                    if ($row['level_jabatan_karyawan'] == 1) {
                                        echo "10 Hari";
                                    } elseif ($row['level_jabatan_karyawan'] >= 2 and $row['level_jabatan_karyawan'] <= 3) {
                                        echo "30 Hari";
                                    } elseif ($row['level_jabatan_karyawan'] >= 4 and $row['level_jabatan_karyawan'] <= 6) {
                                        echo "45 Hari";
                                    } elseif ($row['level_jabatan_karyawan'] >= 7 and $row['level_jabatan_karyawan'] <= 10) {
                                        echo "60 Hari";
                                    } else {
                                        echo "0 Hari";
                                    }
                                } else {
                                    
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['tanggal_approve'] != null) {
                                    if ($row['level_jabatan_karyawan'] == 1) {
                                        $tgl1 = $row['tanggal_approve'];
                                        $tgl2 = date('Y-m-d', strtotime('+10 days', strtotime($tgl1)));
                                        echo DateToIndo($tgl2);
                                    } elseif ($row['level_jabatan_karyawan'] >= 2 and $row['level_jabatan_karyawan'] <= 3) {
                                        $tgl1 = $row['tanggal_approve'];
                                        $tgl2 = date('Y-m-d', strtotime('+30 days', strtotime($tgl1)));
                                        echo DateToIndo($tgl2);
                                    } elseif ($row['level_jabatan_karyawan'] >= 4 and $row['level_jabatan_karyawan'] <= 6) {
                                        $tgl1 = $row['tanggal_approve'];
                                        $tgl2 = date('Y-m-d', strtotime('+45 days', strtotime($tgl1)));
                                        echo DateToIndo($tgl2);
                                    } elseif ($row['level_jabatan_karyawan'] >= 7 and $row['level_jabatan_karyawan'] <= 10) {
                                        $tgl1 = $row['tanggal_approve'];
                                        $tgl2 = date('Y-m-d', strtotime('+60 days', strtotime($tgl1)));
                                        echo DateToIndo($tgl2);
                                    } else {
                                        
                                    }
                                } else {
                                    
                                }
                                ?>
                            </td>
                            <td align="center">
                                <?php

                                if ($row['status_manager']=='0') {
                                    echo "<a href='#' class='btn btn-xs btn-warning ajaxify' disabled='disabled'>OPEN</a>";
                                } elseif ($row['status_manager']=='1') {
                                    echo "<a href='#' class='btn btn-xs btn-primary ajaxify' disabled='disabled'><span class='glyphicon glyphicon-ok'></span>APPROVED</a>";
                                } elseif ($row['status_manager']=='2') {
                                    echo "<a href='#' class='btn btn-xs btn-danger ajaxify'  disabled='disabled'><span class='glyphicon glyphicon-remove'></span>NOT APPROVED</a>";
                                }

                                ?>
                            </td>
                            <td> <?php echo $row['tanggal_manager'] ?> </td>
                            <td align="center">
                                <?php
                                    if ($row['status_atasan'] == 1 && $row['status_manager'] == 0) {
                                        ?>
                                        <a href="<?php echo site_url('ptk/editApprovalHr/'.$row['id']) ?>" class="text-primary ajaxify"><i class="fa fa-pencil"></i> Approve Pengajuan</a> &nbsp;
                                        <?php
                                    } else {
                                        echo "";
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
    window.PTK.initTable();
</script>