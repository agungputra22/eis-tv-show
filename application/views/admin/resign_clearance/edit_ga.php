<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i><?php echo $title ?></div>
                    <div class="actions">
                        <a href="<?php echo site_url('resign_clearance/index_ga') ?>" class="btnList btn btn-circle red btn-sm ajaxify"> 
                            <i class="fa fa-bars"></i> List Data </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form role="form" class="form-horizontal form-resign_clearance" method="post" action="<?php echo site_url('resign_clearance/doUpdate_ga') ?>">
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
                                <label class="col-md-4 control-label"><b>General Affair</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Kendaraan (Fasilitas Perusahaan)
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="kendaraan_ga" alt="Checkbox" value="1" data-toggle="collapse" data-target="#kendaraan_ga_ada" aria-expanded="false" aria-controls="kendaraan_ga_ada"> Ada

                                <input type="checkbox" name="kendaraan_ga" alt="Checkbox" value="0" data-toggle="collapse" data-target="#kendaraan_ga_tidak" aria-expanded="false" aria-controls="kendaraan_ga_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="kendaraan_ga_ada">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jenis Kendaraan
                                        </label>
                                        <div class="col-md-4">
                                            <select name="jenis_kendaraan" class="form-control">
                                                <option><?php echo $edit['jenis_kendaraan'] ?></option>
                                                <option>Mobil</option>
                                                <option>Motor</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Dikembalikan Tanggal
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal_kembali_kendaraan" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['tanggal_kembali_kendaraan'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Dikembalikan Lengkap & Kondisi
                                        </label>
                                        <div class="col-md-4">
                                            <select name="kondisi_kendaraan" class="form-control">
                                                <option><?php echo $edit['kondisi_kendaraan'] ?></option>
                                                <option>Kurang</option>
                                                <option>Cukup</option>
                                                <option>Baik</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">ID Card
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="id_card_ga" alt="Checkbox" value="1" data-toggle="collapse" data-target="#card_ga_ada" aria-expanded="false" aria-controls="card_ga_ada"> Ada

                                <input type="checkbox" name="id_card_ga" alt="Checkbox" value="0" data-toggle="collapse" data-target="#card_ga_tidak" aria-expanded="false" aria-controls="card_ga_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="card_ga_ada">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Dikembalikan Tanggal
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal_kembali_id_card" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['tanggal_kembali_id_card'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Dikembalikan Lengkap & Kondisi
                                        </label>
                                        <div class="col-md-4">
                                            <select name="kondisi_id_card" class="form-control">
                                                <option><?php echo $edit['kondisi_id_card'] ?></option>
                                                <option>Kurang</option>
                                                <option>Cukup</option>
                                                <option>Baik</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-9">
                                    <button type="submit" class="btn btn-circle green"> <i class="fa fa-save"></i>Simpan</button>
                                    <a href="<?php echo site_url('resign_clearance/index_ga') ?>" class="btn btn-circle grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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