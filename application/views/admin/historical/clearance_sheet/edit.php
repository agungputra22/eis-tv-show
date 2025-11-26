<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('clearance_sheet/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-clearance_sheet" method="post" action="<?php echo site_url('clearance_sheet/doUpdate') ?>" enctype="multipart/form-data">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Id Clearance Sheet
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="id_clearance" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_clearance'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_clearance" class="form-control" placeholder="Enter Nama Karyawan" value="<?php echo $edit['nama_clearance'] ?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_clearance" class="form-control" placeholder="Enter Jabatan" value="<?php echo $edit['jabatan_clearance'] ?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kantor Cabang 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="depo_clearance" class="form-control" placeholder="Enter Kantor Cabang" value="<?php echo $edit['depo_clearance'] ?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Bergabung 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_bergabung_clearance" class="form-control" value="<?php echo $edit['tanggal_bergabung_clearance'] ?>" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Resign 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_resign_clearance" class="form-control" value="<?php echo $edit['tanggal_resign_clearance'] ?>">
                            </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                Finance & Accounting
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pinjaman
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="pinjaman_fa" alt="Checkbox" value="Ada" data-toggle="collapse" data-target="#pinjaman_ada" aria-expanded="false" aria-controls="pinjaman_ada"> Ada

                            <input type="checkbox" name="pinjaman_fa" alt="Checkbox" value="Tidak" data-toggle="collapse" data-target="#pinjaman_tidak" aria-expanded="false" aria-controls="pinjaman_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="pinjaman_ada">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Besarnya
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="besar_pinjaman_fa" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['besar_pinjaman_fa'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Diselesaikan Tanggal
                                </label>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal_pinjaman_fa" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_pinjaman_fa'] ?>">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">CUG (Closed User Group)
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="esco_fa" alt="Checkbox" value="Ada" data-toggle="collapse" data-target="#esco_ada" aria-expanded="false" aria-controls="esco_ada"> Ada

                            <input type="checkbox" name="esco_fa" alt="Checkbox" value="Tidak" data-toggle="collapse" data-target="#esco_tidak" aria-expanded="false" aria-controls="esco_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="esco_ada">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">No. CUG
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="no_esco_fa" class="form-control" placeholder="Enter No. Esco" value="<?php echo $edit['no_esco_fa'] ?>">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                Operational
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Pembebanan
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="pembebanan_op" alt="Checkbox" value="Ada" data-toggle="collapse" data-target="#op_ad" aria-expanded="false" aria-controls="op_ad"> Ada

                            <input type="checkbox" name="pembebanan_op" alt="Checkbox" value="Tidak" data-toggle="collapse" data-target="#op_tidak" aria-expanded="false" aria-controls="op_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="op_ad">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Besarnya
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="besar_pembebanan_op" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['besar_pembebanan_op'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Diselesaikan Tanggal
                                </label>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal_pembebanan_op" class="form-control" placeholder="Enter Tanggal" value="<?php echo $edit['tanggal_pembebanan_op'] ?>">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                HRD
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Seragam
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="" value="Ada" data-toggle="collapse" data-target="#hrd_ada" aria-expanded="false" aria-controls="hrd_ada"> Ada

                            <input type="checkbox" name="" value="Tidak" data-toggle="collapse" data-target="#hrd_tidak" aria-expanded="false" aria-controls="hrd_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="hrd_ada">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Dikembalikan Tanggal
                                </label>
                                <div class="col-md-4">
                                    <input type="date" name="kembali_seragam" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['kembali_seragam'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Jumlah
                                </label>
                                <div class="col-md-4">
                                    <input type="text" name="qty_seragam" class="form-control" placeholder="Enter Jumlah" value="<?php echo $edit['qty_seragam'] ?>">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                MIS
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Hardware
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="mis_hardware" alt="Checkbox" value="laptop" data-toggle="collapse" data-target="#mis_laptop" aria-expanded="false" aria-controls="mis_laptop"> Laptop

                            <input type="checkbox" name="mis_hardware" alt="Checkbox" value="komputer" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_kom"> Komputer

                            <input type="checkbox" name="mis_hardware" alt="Checkbox" value="Handphone" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_hp"> Handphone

                            <input type="checkbox" name="mis_hardware" alt="Checkbox" value="Mouse" data-toggle="collapse" data-target="#mis_kom" aria-expanded="false" aria-controls="mis_mouse"> Mouse
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Password Komputer
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="pass_komputer" class="form-control" placeholder="Enter Password" value="<?php echo $edit['pass_komputer'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Password Email
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="pass_email" class="form-control" placeholder="Enter Password" value="<?php echo $edit['pass_email'] ?>">
                            </div>
                        </div>

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                General Affair
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kendaraan (Fasilitas Perusahaan)
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="kendaraan_ga" alt="Checkbox" value="Ada" data-toggle="collapse" data-target="#kendaraan_ga_ada" aria-expanded="false" aria-controls="kendaraan_ga_ada"> Ada

                            <input type="checkbox" name="kendaraan_ga" alt="Checkbox" value="Tidak" data-toggle="collapse" data-target="#kendaraan_ga_tidak" aria-expanded="false" aria-controls="kendaraan_ga_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="kendaraan_ga_ada">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Dikembalikan Tanggal
                                </label>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal_kembali_kendaraan" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['tanggal_kembali_kendaraan'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Dikembalikan Lengkap & Kondisi
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
                            <label class="col-md-3 control-label">ID Card
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="id_card_ga" alt="Checkbox" value="Ada" data-toggle="collapse" data-target="#card_ga_ada" aria-expanded="false" aria-controls="card_ga_ada"> Ada

                            <input type="checkbox" name="id_card_ga" alt="Checkbox" value="Tidak" data-toggle="collapse" data-target="#card_ga_tidak" aria-expanded="false" aria-controls="card_ga_tidak"> Tidak
                            </div>
                        </div>
                        <div class="collapse" id="card_ga_ada">
                        <div class="card card-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Dikembalikan Tanggal
                                </label>
                                <div class="col-md-4">
                                    <input type="date" name="tanggal_kembali_id_card" class="form-control" placeholder="Enter Nominal" value="<?php echo $edit['tanggal_kembali_id_card'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Dikembalikan Lengkap & Kondisi
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

                        <div class="caption">
                            <span class="caption-subject font-dark sbold uppercase">
                                Quality Management System
                            </span>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Dokumen ISO
                            </label>
                            <div class="col-md-4">
                            <input type="checkbox" name="dokumen_iso" alt="Checkbox" value="Ketetapan QO"> Ketetapan QO

                            <input type="checkbox" name="dokumen_iso" alt="Checkbox" value="Laporan QO"> Laporan QO
                            <br>
                            <input type="checkbox" name="dokumen_iso" alt="Checkbox" value="Action Plan"> Action Plan

                            <input type="checkbox" name="dokumen_iso" alt="Checkbox" value="Dokumen SMM"> Dokumen SMM (Prosedur, IK, Dll)
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Upload Dokumen
                            </label>
                            <div class="col-md-4">
                                <input type="file" name="dokumen_clearance" class="form-control" placeholder="Enter Nominal" >
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('clearance_sheet/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/clearance_sheet.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.CLEARANCE_SHEET.handleSendData();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('clearance_sheet/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_clearance']").val(value.nama_lengkap);
                        $("input[name='jabatan_clearance']").val(value.jabatan_struktur);
                        $("input[name='depo_clearance']").val(value.lokasi_struktur);
                        $("input[name='tanggal_bergabung_clearance']").val(value.join_date_struktur);
                    });
                },
            });
          }
     })
</script>