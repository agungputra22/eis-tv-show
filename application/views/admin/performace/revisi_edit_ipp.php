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
                <form role="form" class="form-horizontal form-performance" method="post" action="<?php echo site_url('performance/doUpdate_ipp') ?>">
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
                                <input type="text" class="form-control input-circle" name="nik_baru" id="nik_baru" placeholder="Enter text" readonly value="<?php echo $edit['nik_baru'] ?>">
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
                                <input type="hidden" class="form-control input-circle" name="jabatan_struktur" id="jabatan_struktur" placeholder="Enter text" readonly value="<?php echo $edit['jabatan_hrd'] ?>">
                            </div>
                        </div>
                        &nbsp; &nbsp;
                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>A. Activity Plan Deployment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_a" id="persentase_a" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_a['bobot'] ?>">
                                    <input type="hidden" name="status_a" id="status_a" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddA"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_a">

                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>B. Routine Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_b" id="persentase_b" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_b['bobot'] ?>">
                                    <input type="hidden" name="status_b" id="status_b" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddB"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_b">

                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>C. Improvement Program</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_c" id="persentase_c" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_c['bobot'] ?>">
                                    <input type="hidden" name="status_c" id="status_c" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddC"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_c">

                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>D. Supervisory Rules</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_d" id="persentase_d" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_d['bobot'] ?>">
                                    <input type="hidden" name="status_d" id="status_d" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddD"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_d">

                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>E. Kaderisasi</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_e" id="persentase_e" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_e['bobot'] ?>">
                                    <input type="hidden" name="status_e" id="status_e" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddE"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_e">

                            </tbody>
                        </table>

                        <div class="form-group">
                            &nbsp; &nbsp; &nbsp; <label class="control-label"><b>F. Special Assignment</b></label>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Persentase (%)</label>
                                <div class="col-md-1">
                                    <input type="number" name="persentase_f" id="persentase_f" class="form-control input-circle" placeholder="" min="0" max="100" value="<?php echo $persentase_f['bobot'] ?>">
                                    <input type="hidden" name="status_f" id="status_f" class="form-control input-circle" value="1">
                                </div>
                                <div class="col-md-2">
                                    <a href="#" class="btn btn-circle green btn-outline btn-sm" data-toggle="modal" data-target="#ModalaAddF"><span class="fa fa-plus"></span> Tambah Data </a>
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
                                    <th> AKSI </th>
                                </tr>
                            </thead>
                            <tbody id="show_data_f">

                            </tbody>
                        </table>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
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

<!-- MODAL ADD POINT A -->
<div class="modal fade" id="ModalaAddA" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Activity Plan Deployment</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_a" id="kode_a" class="form-control" type="hidden" placeholder="No. Pesanan" value="1" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_a" id="task_a" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_a" id="evaluasi_a" required>
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_a" id="target_a" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_a" id="kpi_a" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_A">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT A-->

<!-- MODAL EDIT POINT A -->
<div class="modal fade" id="ModalEditA" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Activity Plan Deployment</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_a" id="id_edit_a" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_a_edit" id="task_a_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_a_edit" id="evaluasi_a_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_a_edit" id="target_a_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_a_edit" id="kpi_a_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_A">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT A-->

<!--MODAL HAPUS POINT A-->
<div class="modal fade" id="ModalHapusA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Activity Plan Deployment</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_a" id="textid_a" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_a btn btn-danger" id="btn_hapus_a">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT A-->

<!-- MODAL ADD POINT B -->
<div class="modal fade" id="ModalaAddB" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Routine Program</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_b" id="kode_b" class="form-control" type="hidden" placeholder="No. Pesanan" value="2" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_b" id="task_b" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_b" id="evaluasi_b">
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_b" id="target_b" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_b" id="kpi_b" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_B">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT B-->

<!-- MODAL EDIT POINT B -->
<div class="modal fade" id="ModalEditB" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Routine Program</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_b" id="id_edit_b" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_b_edit" id="task_b_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_b_edit" id="evaluasi_b_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_b_edit" id="target_b_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_b_edit" id="kpi_b_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_B">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT B-->

<!--MODAL HAPUS POINT B-->
<div class="modal fade" id="ModalHapusB" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Routine Program</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_b" id="textid_b" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_b btn btn-danger" id="btn_hapus_b">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT B-->

<!-- MODAL ADD POINT C -->
<div class="modal fade" id="ModalaAddC" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Improvement Program</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_c" id="kode_c" class="form-control" type="hidden" placeholder="No. Pesanan" value="3" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_c" id="task_c" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_c" id="evaluasi_c">
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_c" id="target_c" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_c" id="kpi_c" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_C">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT C-->

<!-- MODAL EDIT POINT C -->
<div class="modal fade" id="ModalEditC" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Improvement Program</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_c" id="id_edit_c" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_c_edit" id="task_c_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_c_edit" id="evaluasi_c_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_c_edit" id="target_c_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_c_edit" id="kpi_c_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_C">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT C-->

<!--MODAL HAPUS POINT C-->
<div class="modal fade" id="ModalHapusC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Improvement Program</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_c" id="textid_c" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_c btn btn-danger" id="btn_hapus_c">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT C-->

<!-- MODAL ADD POINT D -->
<div class="modal fade" id="ModalaAddD" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Supervisory Rules</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_d" id="kode_d" class="form-control" type="hidden" placeholder="No. Pesanan" value="4" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_d" id="task_d" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_d" id="evaluasi_d">
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_d" id="target_d" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_d" id="kpi_d" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_D">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT D-->

<!-- MODAL EDIT POINT D -->
<div class="modal fade" id="ModalEditD" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Supervisory Rules</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_d" id="id_edit_d" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_d_edit" id="task_d_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_d_edit" id="evaluasi_d_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_d_edit" id="target_d_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_d_edit" id="kpi_d_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_D">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT D-->

<!--MODAL HAPUS POINT D-->
<div class="modal fade" id="ModalHapusD" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Supervisory Rules</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_d" id="textid_d" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_d btn btn-danger" id="btn_hapus_d">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT D-->

<!-- MODAL ADD POINT E -->
<div class="modal fade" id="ModalaAddE" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Kaderisasi</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_e" id="kode_e" class="form-control" type="hidden" placeholder="No. Pesanan" value="5" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_e" id="task_e" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_e" id="evaluasi_e">
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_e" id="target_e" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_e" id="kpi_e" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_E">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT E-->

<!-- MODAL EDIT POINT E -->
<div class="modal fade" id="ModalEditE" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Kaderisasi</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_e" id="id_edit_e" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_e_edit" id="task_e_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_e_edit" id="evaluasi_e_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_e_edit" id="target_e_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_e_edit" id="kpi_e_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_E">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT E-->

<!--MODAL HAPUS POINT E-->
<div class="modal fade" id="ModalHapusE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Kaderisasi</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_e" id="textid_e" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_e btn btn-danger" id="btn_hapus_e">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT E-->

<!-- MODAL ADD POINT F -->
<div class="modal fade" id="ModalaAddF" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Tambah Special Assignment</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body"> 
            <input name="kode_f" id="kode_f" class="form-control" type="hidden" placeholder="No. Pesanan" value="6" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_f" id="task_f" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_f" id="evaluasi_f">
                        <option>-- Pilih Periode --</option>
                        <?php
                        foreach (kategori_ipp($id) as $key => $level) {
                            echo "<option value=\"$key\">$level</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_f" id="target_f" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI
                <span class="font-red">*</span>
                </label>
                <div class="col-xs-9">
                    <select name="kpi_f" id="kpi_f" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_simpan_F">Simpan</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT F-->

<!-- MODAL EDIT POINT F -->
<div class="modal fade" id="ModalEditF" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title" id="myModalLabel">Edit Special Assignment</h3>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input name="id_edit_f" id="id_edit_f" class="form-control" type="hidden" placeholder="No. Pesanan" required readonly>

            <div class="form-group">
                <label class="control-label col-xs-3">Uraian 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="task_f_edit" id="task_f_edit" rows="3" placeholder="Enter Uraian" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Evaluasi Periodik 
                
                </label>
                <div class="col-xs-9">
                    <select class="form-control" name="evaluasi_f_edit" id="evaluasi_f_edit">
                      <option>-- Pilih Periode --</option>
                      <?php
                      foreach (kategori_ipp($id) as $key => $level) {
                          echo "<option value=\"$key\">$level</option>";
                      }
                      ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">Target 
                
                </label>
                <div class="col-xs-9">
                    <textarea class="form-control" name="target_f_edit" id="target_f_edit" rows="3" placeholder="Enter Target" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-xs-3">KPI 
                
                </label>
                <div class="col-xs-9">
                    <select name="kpi_f_edit" id="kpi_f_edit" class="form-control" required>
                    <option>-- Pilih KPI --</option>
                        <?php
                        foreach ($data_kpi as $k)
                        {
                            echo "<option value='$k->id'>$k->keterangan $k->persentase%</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
            <button class="btn btn-info" id="btn_update_F">Update</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL POINT F-->

<!--MODAL HAPUS POINT F-->
<div class="modal fade" id="ModalHapusF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        <h4 class="modal-title" id="myModalLabel">Hapus Special Assignment</h4>
    </div>
    <form class="form-horizontal">
        <div class="modal-body">
            <input type="hidden" name="textid_f" id="textid_f" value="">
            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus data ini?</p></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button class="btn_hapus_f btn btn-danger" id="btn_hapus_f">Hapus</button>
        </div>
    </form>
    </div>
    </div>
</div>
<!--END MODAL HAPUS POINT F-->

<script src="<?php echo base_url('assets/apps/scripts/performance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PERFORMANCE.handleSendData();

    $(document).ready(function(){
        tampil_data_point_a(); //pemanggilan fungsi tampil Point A
        tampil_data_point_b(); //pemanggilan fungsi tampil Point B
        tampil_data_point_c(); //pemanggilan fungsi tampil Point C
        tampil_data_point_d(); //pemanggilan fungsi tampil Point D
        tampil_data_point_e(); //pemanggilan fungsi tampil Point E
        tampil_data_point_f(); //pemanggilan fungsi tampil Point F

        //fungsi tampil Point A
        function tampil_data_point_a(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_a')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_a').html(html);
                }

            });
        }

        //Simpan Point A
        $('#btn_simpan_A').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_a').val();
            var evaluasi=$('#evaluasi_a').val();
            var bobot=$('#persentase_a').val();
            var target=$('#target_a').val();
            var kpi=$('#kpi_a').val();
            var kode=$('#kode_a').val();
            var status=$('#status_a').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_a"]').val("");
                    $('[name="evaluasi_a"]').val("");
                    $('[name="target_a"]').val("");
                    $('[name="kpi_a"]').val("");
                    $('#ModalaAddA').modal('hide');
                    tampil_data_point_a();
                }
            });
            return false;
        });

        //Get Update Point A
        $('#show_data_a').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, keterangan){
                        $('#ModalEditA').modal('show');
                        $('[name="id_edit_a"]').val(data.id);
                        $('[name="task_a_edit"]').val(data.task);
                        $('[name="evaluasi_a_edit"]').val(data.evaluasi);
                        $('[name="target_a_edit"]').val(data.target);
                        $('[name="kpi_a_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point A
        $('#btn_update_A').on('click',function(){
            var id=$('#id_edit_a').val();
            var task=$('#task_a_edit').val();
            var evaluasi=$('#evaluasi_a_edit').val();
            var target=$('#target_a_edit').val();
            var kpi=$('#kpi_a_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_a"]').val("");
                    $('[name="task_a_edit"]').val("");
                    $('[name="evaluasi_a_edit"]').val("");
                    $('[name="target_a_edit"]').val("");
                    $('[name="kpi_a_edit"]').val("");
                    $('#ModalEditA').modal('hide');
                    tampil_data_point_a();
                }
            });
            return false;
        });

        //Get Hapus Point A
        $('#show_data_a').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapusA').modal('show');
            $('[name="textid_a"]').val(id);
        });

        //Hapus Point A
        $('#btn_hapus_a').on('click',function(){
            var id=$('#textid_a').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusA').modal('hide');
                    tampil_data_point_a();
                }
            });
            return false;
        });

        //fungsi tampil Point B
        function tampil_data_point_b(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_b')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_b" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_b" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_b').html(html);
                }

            });
        }

        //Simpan Point B
        $('#btn_simpan_B').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_b').val();
            var evaluasi=$('#evaluasi_b').val();
            var bobot=$('#persentase_b').val();
            var target=$('#target_b').val();
            var kpi=$('#kpi_b').val();
            var kode=$('#kode_b').val();
            var status=$('#status_b').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_b"]').val("");
                    $('[name="evaluasi_b"]').val("");
                    $('[name="target_b"]').val("");
                    $('[name="kpi_b"]').val("");
                    $('#ModalaAddB').modal('hide');
                    tampil_data_point_b();
                }
            });
            return false;
        });

        //Get Update Point B
        $('#show_data_b').on('click','.item_edit_b',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, keterangan){
                        $('#ModalEditB').modal('show');
                        $('[name="id_edit_b"]').val(data.id);
                        $('[name="task_b_edit"]').val(data.task);
                        $('[name="evaluasi_b_edit"]').val(data.evaluasi);
                        $('[name="target_b_edit"]').val(data.target);
                        $('[name="kpi_b_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point B
        $('#btn_update_B').on('click',function(){
            var id=$('#id_edit_b').val();
            var task=$('#task_b_edit').val();
            var evaluasi=$('#evaluasi_b_edit').val();
            var target=$('#target_b_edit').val();
            var kpi=$('#kpi_b_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_b"]').val("");
                    $('[name="task_b_edit"]').val("");
                    $('[name="evaluasi_b_edit"]').val("");
                    $('[name="target_b_edit"]').val("");
                    $('[name="kpi_b_edit"]').val("");
                    $('#ModalEditB').modal('hide');
                    tampil_data_point_b();
                }
            });
            return false;
        });

        //Get Hapus Point B
        $('#show_data_b').on('click','.item_hapus_b',function(){
            var id=$(this).attr('data');
            $('#ModalHapusB').modal('show');
            $('[name="textid_b"]').val(id);
        });

        //Hapus Point B
        $('#btn_hapus_b').on('click',function(){
            var id=$('#textid_b').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusB').modal('hide');
                    tampil_data_point_b();
                }
            });
            return false;
        });

        //fungsi tampil Point C
        function tampil_data_point_c(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_c')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_c" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_c" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_c').html(html);
                }

            });
        }

        //Simpan Point C
        $('#btn_simpan_C').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_c').val();
            var evaluasi=$('#evaluasi_c').val();
            var bobot=$('#persentase_c').val();
            var target=$('#target_c').val();
            var kpi=$('#kpi_c').val();
            var kode=$('#kode_c').val();
            var status=$('#status_c').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_c"]').val("");
                    $('[name="evaluasi_c"]').val("");
                    $('[name="target_c"]').val("");
                    $('[name="kpi_c"]').val("");
                    $('#ModalaAddC').modal('hide');
                    tampil_data_point_c();
                }
            });
            return false;
        });

        //Get Update Point C
        $('#show_data_c').on('click','.item_edit_c',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, keterangan){
                        $('#ModalEditC').modal('show');
                        $('[name="id_edit_c"]').val(data.id);
                        $('[name="task_c_edit"]').val(data.task);
                        $('[name="evaluasi_c_edit"]').val(data.evaluasi);
                        $('[name="target_c_edit"]').val(data.target);
                        $('[name="kpi_c_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point C
        $('#btn_update_C').on('click',function(){
            var id=$('#id_edit_c').val();
            var task=$('#task_c_edit').val();
            var evaluasi=$('#evaluasi_c_edit').val();
            var target=$('#target_c_edit').val();
            var kpi=$('#kpi_c_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_c"]').val("");
                    $('[name="task_c_edit"]').val("");
                    $('[name="evaluasi_c_edit"]').val("");
                    $('[name="target_c_edit"]').val("");
                    $('[name="kpi_c_edit"]').val("");
                    $('#ModalEditC').modal('hide');
                    tampil_data_point_c();
                }
            });
            return false;
        });

        //Get Hapus Point C
        $('#show_data_c').on('click','.item_hapus_c',function(){
            var id=$(this).attr('data');
            $('#ModalHapusC').modal('show');
            $('[name="textid_c"]').val(id);
        });

        //Hapus Point C
        $('#btn_hapus_c').on('click',function(){
            var id=$('#textid_c').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusC').modal('hide');
                    tampil_data_point_c();
                }
            });
            return false;
        });

        //fungsi tampil Point D
        function tampil_data_point_d(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_d')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_d" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_d" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_d').html(html);
                }

            });
        }

        //Simpan Point D
        $('#btn_simpan_D').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_d').val();
            var evaluasi=$('#evaluasi_d').val();
            var bobot=$('#persentase_d').val();
            var target=$('#target_d').val();
            var kpi=$('#kpi_d').val();
            var kode=$('#kode_d').val();
            var status=$('#status_d').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_d"]').val("");
                    $('[name="evaluasi_d"]').val("");
                    $('[name="target_d"]').val("");
                    $('[name="kpi_d"]').val("");
                    $('#ModalaAddD').modal('hide');
                    tampil_data_point_d();
                }
            });
            return false;
        });

        //Get Update Point D
        $('#show_data_d').on('click','.item_edit_d',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, kpi){
                        $('#ModalEditD').modal('show');
                        $('[name="id_edit_d"]').val(data.id);
                        $('[name="task_d_edit"]').val(data.task);
                        $('[name="evaluasi_d_edit"]').val(data.evaluasi);
                        $('[name="target_d_edit"]').val(data.target);
                        $('[name="kpi_d_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point D
        $('#btn_update_D').on('click',function(){
            var id=$('#id_edit_d').val();
            var task=$('#task_d_edit').val();
            var evaluasi=$('#evaluasi_d_edit').val();
            var target=$('#target_d_edit').val();
            var kpi=$('#kpi_d_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_d"]').val("");
                    $('[name="task_d_edit"]').val("");
                    $('[name="evaluasi_d_edit"]').val("");
                    $('[name="target_d_edit"]').val("");
                    $('[name="kpi_d_edit"]').val("");
                    $('#ModalEditD').modal('hide');
                    tampil_data_point_d();
                }
            });
            return false;
        });

        //Get Hapus Point D
        $('#show_data_d').on('click','.item_hapus_d',function(){
            var id=$(this).attr('data');
            $('#ModalHapusD').modal('show');
            $('[name="textid_d"]').val(id);
        });

        //Hapus Point D
        $('#btn_hapus_d').on('click',function(){
            var id=$('#textid_d').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusD').modal('hide');
                    tampil_data_point_d();
                }
            });
            return false;
        });

        //fungsi tampil Point E
        function tampil_data_point_e(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_e')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_e" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_e" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_e').html(html);
                }

            });
        }

        //Simpan Point E
        $('#btn_simpan_E').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_e').val();
            var evaluasi=$('#evaluasi_e').val();
            var bobot=$('#persentase_e').val();
            var target=$('#target_e').val();
            var kpi=$('#kpi_e').val();
            var kode=$('#kode_e').val();
            var status=$('#status_e').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_e"]').val("");
                    $('[name="evaluasi_e"]').val("");
                    $('[name="target_e"]').val("");
                    $('[name="kpi_e"]').val("");
                    $('#ModalaAddE').modal('hide');
                    tampil_data_point_e();
                }
            });
            return false;
        });

        //Get Update Point E
        $('#show_data_e').on('click','.item_edit_e',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, keterangan){
                        $('#ModalEditE').modal('show');
                        $('[name="id_edit_e"]').val(data.id);
                        $('[name="task_e_edit"]').val(data.task);
                        $('[name="evaluasi_e_edit"]').val(data.evaluasi);
                        $('[name="target_e_edit"]').val(data.target);
                        $('[name="kpi_e_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point E
        $('#btn_update_E').on('click',function(){
            var id=$('#id_edit_e').val();
            var task=$('#task_e_edit').val();
            var evaluasi=$('#evaluasi_e_edit').val();
            var target=$('#target_e_edit').val();
            var kpi=$('#kpi_e_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_e"]').val("");
                    $('[name="task_e_edit"]').val("");
                    $('[name="evaluasi_e_edit"]').val("");
                    $('[name="target_e_edit"]').val("");
                    $('[name="kpi_e_edit"]').val("");
                    $('#ModalEditE').modal('hide');
                    tampil_data_point_e();
                }
            });
            return false;
        });

        //Get Hapus Point E
        $('#show_data_e').on('click','.item_hapus_e',function(){
            var id=$(this).attr('data');
            $('#ModalHapusE').modal('show');
            $('[name="textid_e"]').val(id);
        });

        //Hapus Point E
        $('#btn_hapus_e').on('click',function(){
            var id=$('#textid_e').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusE').modal('hide');
                    tampil_data_point_e();
                }
            });
            return false;
        });

        //fungsi tampil Point F
        function tampil_data_point_f(){
            var nik_baru=$('#nik_baru').val();
            $.ajax({
                type  : 'GET',
                url   : '<?=base_url('performance/data_all_ipp_f')?>',
                async : true,
                dataType : 'json',
                data : {nik_baru:nik_baru},
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var no = i + 1;
                        html += '<tr>'+
                            '<td>'+no+'</td>'+
                            '<td>'+data[i].task+'</td>'+
                            '<td>'+data[i].evaluasi+'</td>'+
                            '<td>'+data[i].target+'</td>'+
                            '<td>'+data[i].keterangan+' '+data[i].persentase+'%'+'</td>'+
                            '<td style="text-align:center;">'+
                                '<a href="javascript:;" class="btn btn-info btn-xs item_edit_f" data="'+data[i].id+'">Edit</a>'+' '+
                                '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus_f" data="'+data[i].id+'">Hapus</a>'+
                            '</td>'+
                        '</tr>';
                    }
                    $('#show_data_f').html(html);
                }

            });
        }

        //Simpan Point F
        $('#btn_simpan_F').on('click',function(){
            var nik_baru=$('#nik_baru').val();
            var jabatan=$('#jabatan_struktur').val();
            var task=$('#task_f').val();
            var evaluasi=$('#evaluasi_f').val();
            var bobot=$('#persentase_f').val();
            var target=$('#target_f').val();
            var kpi=$('#kpi_f').val();
            var kode=$('#kode_f').val();
            var status=$('#status_f').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doInput_ipp_revisi')?>",
                dataType : "JSON",
                data : {nik_baru:nik_baru, jabatan:jabatan, task:task, evaluasi:evaluasi, bobot:bobot, target:target, kpi:kpi, kode:kode, status:status},
                success: function(data){
                    $('[name="task_f"]').val("");
                    $('[name="evaluasi_f"]').val("");
                    $('[name="target_f"]').val("");
                    $('[name="kpi_f"]').val("");
                    $('#ModalaAddF').modal('hide');
                    tampil_data_point_f();
                }
            });
            return false;
        });

        //Get Update Point F
        $('#show_data_f').on('click','.item_edit_f',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url  : "<?=base_url('performance/get_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id},
                success: function(data){
                    $.each(data,function(id, task, evaluasi, target, keterangan){
                        $('#ModalEditF').modal('show');
                        $('[name="id_edit_f"]').val(data.id);
                        $('[name="task_f_edit"]').val(data.task);
                        $('[name="evaluasi_f_edit"]').val(data.evaluasi);
                        $('[name="target_f_edit"]').val(data.target);
                        $('[name="kpi_f_edit"]').val(data.keterangan);
                    });
                }
            });
            return false;
        });

        //Update Point F
        $('#btn_update_F').on('click',function(){
            var id=$('#id_edit_f').val();
            var task=$('#task_f_edit').val();
            var evaluasi=$('#evaluasi_f_edit').val();
            var target=$('#target_f_edit').val();
            var kpi=$('#kpi_f_edit').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/doUpdate_ipp_revisi')?>",
                dataType : "JSON",
                data : {id:id, task:task , evaluasi:evaluasi, target:target, kpi:kpi},
                success: function(data){
                    $('[name="id_edit_f"]').val("");
                    $('[name="task_f_edit"]').val("");
                    $('[name="evaluasi_f_edit"]').val("");
                    $('[name="target_f_edit"]').val("");
                    $('[name="kpi_f_edit"]').val("");
                    $('#ModalEditF').modal('hide');
                    tampil_data_point_f();
                }
            });
            return false;
        });

        //Get Hapus Point F
        $('#show_data_f').on('click','.item_hapus_f',function(){
            var id=$(this).attr('data');
            $('#ModalHapusF').modal('show');
            $('[name="textid_f"]').val(id);
        });

        //Hapus Point F
        $('#btn_hapus_f').on('click',function(){
            var id=$('#textid_f').val();
            $.ajax({
                type : "POST",
                url  : "<?=base_url('performance/hapus_detail_ipp_revisi')?>",
                dataType : "JSON",
                data : {id: id},
                success: function(data){
                    $('#ModalHapusF').modal('hide');
                    tampil_data_point_f();
                }
            });
            return false;
        });

    });
</script>