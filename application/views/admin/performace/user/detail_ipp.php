<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-performance-user-ipp" method="post" action="<?php echo site_url('performance/doUpdate_ipp_user') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Departemen</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['dept_struktur'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">NIK Karyawan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" name="nik_baru" placeholder="Enter text" readonly value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Nama Karyawan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Jabatan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Bulan</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo getRomawi($edit['bulan']) ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-circle" placeholder="Enter text" readonly value="<?php echo $edit['tahun'] ?>">
                            </div>
                        </div>
                        &nbsp; &nbsp;
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>A. Activity Plan Deployment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_a" class="form-control input-circle" readonly placeholder="" value="<?php echo $persentase_a['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE USER </th>
                                    <th> PERSENTASE YBS </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_a as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_a[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_a[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>B. Routine Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_b" class="form-control input-circle" readonly placeholder="" value="<?php echo $persentase_b['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_point_b">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE ATASAN </th>
                                    <th> PERSENTASE USER </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_b as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_b[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_b[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>C. Improvement Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_c" class="form-control input-circle" readonly placeholder="" value="<?php echo $persentase_c['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_point_c">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE ATASAN </th>
                                    <th> PERSENTASE USER </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_c as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_c[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_c[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>D. Supervisory Rules</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_d" class="form-control input-circle" placeholder="" value="<?php echo $persentase_d['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_point_d">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE ATASAN </th>
                                    <th> PERSENTASE USER </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_d as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_d[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_d[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>E. Kaderisasi</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_e" class="form-control input-circle" placeholder="" value="<?php echo $persentase_e['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_point_e">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE ATASAN </th>
                                    <th> PERSENTASE USER </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_e as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_e[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_e[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>F. Special Assignment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_f" class="form-control input-circle" readonly placeholder="" value="<?php echo $persentase_f['bobot'] ?>">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_point_f">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <th> NO. </th>
                                    <th> URAIAN </th>
                                    <th> EVALUASI PERIODE </th>
                                    <th> TARGET </th>
                                    <th> KPI </th>
                                    <th> PERSENTASE ATASAN </th>
                                    <th> PERSENTASE USER </th>
                                    <th> KETERANGAN </th>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($point_f as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['task'] ?> </td>
                                <td> <?php echo $row['evaluasi'] ?> </td>
                                <td> <?php echo $row['target'] ?> </td>
                                <td> <?php echo $row['ket_kpi'] ?> </td>
                                <td> <?php echo $row['persentase_atasan'] ?> </td>
                                <td>
                                    <input type="hidden" name="id_f[]" class="form-control" value="<?php echo $row['id'] ?>">
                                    <input type="number" name="persentase_user_f[]" class="form-control" value="<?php echo $row['persentase_user'] ?>">
                                </td>
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('performance/index_ipp') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/performance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PERFORMANCE.initTable();
    window.PERFORMANCE.initTablePointB();
    window.PERFORMANCE.initTablePointC();
    window.PERFORMANCE.initTablePointD();
    window.PERFORMANCE.initTablePointE();
    window.PERFORMANCE.initTablePointF();
    window.PERFORMANCE.handleSendDataUpdateUserIPP();
</script>