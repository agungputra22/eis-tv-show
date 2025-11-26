<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i><?php echo $title ?></div>
                    <div class="actions">
                        <a href="<?php echo site_url('resign_clearance/index_fa') ?>" class="btnList btn btn-circle red btn-sm ajaxify"> 
                            <i class="fa fa-bars"></i> List Data </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form role="form" class="form-horizontal form-resign_clearance" method="post" action="<?php echo site_url('resign_clearance/doUpdate_fa') ?>">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-4 control-label">NIK</label>
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control input-circle" name="id" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['id'] ?>">
                                    <input type="text" class="form-control input-circle" name="nik_baru" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Nama Karyawan</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Jabatan</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Lokasi</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Departemen</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['dept_struktur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Bergabung</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['join_date_struktur'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Tanggal Efektif Resign</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-circle" placeholder="Enter text" required="required" readonly="" value="<?php echo $edit['tanggal_efektif_resign'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Finance & Accounting</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pinjaman
                                </label>
                                <div class="col-md-4">
                                    <input type="checkbox" name="pinjaman_fa" alt="Checkbox" value="1" data-toggle="collapse" data-target="#pinjaman_ada" aria-expanded="false" aria-controls="pinjaman_ada"> Ada

                                    <input type="checkbox" name="pinjaman_fa" alt="Checkbox" value="0" data-toggle="collapse" data-target="#pinjaman_tidak" aria-expanded="false" aria-controls="pinjaman_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="pinjaman_ada">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Besarnya
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="besar_pinjaman_fa" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['besar_pinjaman_fa'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Diselesaikan Tanggal
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal_pinjaman_fa" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_pinjaman_fa'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">CUG (Closed User Group)
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="esco_fa" alt="Checkbox" value="1" data-toggle="collapse" data-target="#esco_ada" aria-expanded="false" aria-controls="esco_ada"> Ada

                                <input type="checkbox" name="esco_fa" alt="Checkbox" value="0" data-toggle="collapse" data-target="#esco_tidak" aria-expanded="false" aria-controls="esco_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="esco_ada">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">No. CUG
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="no_esco_fa" class="form-control" placeholder="Enter No. Esco" value="<?php echo $edit['no_esco_fa'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-9">
                                    <button type="submit" class="btn btn-circle green"> <i class="fa fa-save"></i>Simpan</button>
                                    <a href="<?php echo site_url('resign_clearance/index_fa') ?>" class="btn btn-circle grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/resign_clearance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN_CLEARANCE.handleSendData();
</script>