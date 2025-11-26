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
                <form role="form" class="form-horizontal form-performance" method="post" action="<?php echo site_url('performance/doInput_ipp_tt_perbulan') ?>">
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
                                <input type="hidden" class="form-control input-circle" name="jabatan_struktur" placeholder="Enter text" readonly value="<?php echo $edit['jabatan_struktur'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Bulan</label>
                            <div class="col-md-4">
                                <select name="bulan" class="form-control input-circle" required>
                                    <option value="">-- Pilih Bulan --</option>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Tahun</label>
                            <div class="col-md-4">
                                <select name="tahun" class="form-control input-circle" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    <?php
                                        for ($i=2020; $i <= 2030 ; $i++) { 
                                            ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        &nbsp; &nbsp;
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>A. Activity Plan Deployment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_a" class="form-control input-circle" readonly value="<?php echo $persentase_a['bobot'] ?>">
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
                                    <input type="text" name="persentase_b" class="form-control input-circle" readonly value="<?php echo $persentase_b['bobot'] ?>">
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
                                    <input type="text" name="persentase_c" class="form-control input-circle" readonly value="<?php echo $persentase_c['bobot'] ?>">
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
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>D. Special Assignment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="text" name="persentase_f" class="form-control input-circle" readonly value="<?php echo $persentase_f['bobot'] ?>">
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
                                <td> <?php echo $row['keterangan'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br><br>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-4 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('performance/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
    window.PERFORMANCE.initTablePointF();
    window.PERFORMANCE.handleSendData();
</script>