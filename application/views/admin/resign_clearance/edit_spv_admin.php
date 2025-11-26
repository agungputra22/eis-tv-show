<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet box blue">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i><?php echo $title ?></div>
                    <div class="actions">
                        <a href="<?php echo site_url('resign_clearance/index_spv_admin') ?>" class="btnList btn btn-circle red btn-sm ajaxify"> 
                            <i class="fa fa-bars"></i> List Data </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form role="form" class="form-horizontal form-resign_clearance" method="post" action="<?php echo site_url('resign_clearance/doUpdate_spv_admin') ?>">
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

                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Warehouse Operation</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Pembebanan
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="pembebanan_op" alt="Checkbox" value="1" data-toggle="collapse" data-target="#op_ad" aria-expanded="false" aria-controls="op_ad"> Ada

                                <input type="checkbox" name="pembebanan_op" alt="Checkbox" value="0" data-toggle="collapse" data-target="#op_tidak" aria-expanded="false" aria-controls="op_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="op_ad">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Besarnya
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="besar_pembebanan_op" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['besar_pembebanan_op'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Diselesaikan Tanggal
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal_pembebanan_op" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_pembebanan_op'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Human Resource Development</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Seragam
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="seragam_hrd" value="1" data-toggle="collapse" data-target="#hrd_ada" aria-expanded="false" aria-controls="hrd_ada"> Ada

                                <input type="checkbox" name="seragam_hrd" value="0" data-toggle="collapse" data-target="#hrd_tidak" aria-expanded="false" aria-controls="hrd_tidak"> Tidak
                                </div>
                            </div>
                            <div class="collapse" id="hrd_ada">
                                <div class="card card-body">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Dikembalikan Tanggal
                                        </label>
                                        <div class="col-md-4">
                                            <input type="date" name="kembali_seragam" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['kembali_seragam'] ?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Jumlah
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="qty_seragam" class="form-control" placeholder="Enter Jumlah" value="<?php echo $edit['qty_seragam'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Information Communication and Technology</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Hardware
                                </label>
                                <div class="col-md-4">
                                <input type="checkbox" name="mis_laptop" alt="Checkbox" value="1" data-toggle="collapse" data-target="#mis_laptop" aria-expanded="false" aria-controls="mis_laptop"> Laptop

                                <input type="checkbox" name="mis_komputer" alt="Checkbox" value="1" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_kom"> Komputer

                                <input type="checkbox" name="mis_hp" alt="Checkbox" value="1" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_hp"> Handphone

                                <input type="checkbox" name="mis_mouse" alt="Checkbox" value="1" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_mouse"> Mouse
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Password Komputer
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="pass_komputer" class="form-control" placeholder="Enter Password"">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Password Email
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="pass_email" class="form-control" placeholder="Enter Password">
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

                            <div class="form-group">
                                <label class="col-md-4 control-label"><b>Quality Management System</b></label>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Dokumen ISO
                                </label>
                                <div class="col-md-2">
                                    <input type="checkbox" name="ketetapan_qo" alt="Checkbox" value="1"> Ketetapan QO
                                    <br>
                                    <input type="checkbox" name="action_plan" alt="Checkbox" value="1"> Action Plan
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox" name="laporan_qo" alt="Checkbox" value="1"> Laporan QO
                                    <br>
                                    <input type="checkbox" name="dokumen_smm" alt="Checkbox" value="1"> Dokumen SMM (Prosedur, IK, Dll)
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-4 col-md-9">
                                    <button type="submit" class="btn btn-circle green"> <i class="fa fa-save"></i>Simpan</button>
                                    <a href="<?php echo site_url('resign_clearance/index_spv_admin') ?>" class="btn btn-circle grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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