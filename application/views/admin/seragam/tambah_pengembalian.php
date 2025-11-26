<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('seragam/index_pengembalian') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-seragam" method="post" action="<?php echo site_url('seragam/doInput_pengembalian') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                                <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Pengajuan 
                            </label>
                            <div class="col-md-4">
                                <select name="ket_pengajuan" id="ket_pengajuan" class="form-control">
                                    <option value="">-- Pilih Keterangan --</option>
                                    <option value="Karyawan Resign">Karyawan Resign</option>
                                    <option value="Seragam Habis Masa Pakai">Seragam Habis Masa Pakai</option>
                                    <option value="Seragam Hilang">Seragam Hilang</option>
                                    <option value="Seragam Rusak">Seragam Rusak</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Cari NIK/Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="nik_baru" id="nik_baru" class="bs-select form-control" data-live-search="true" data-size="8">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_tampil" class="form-control" placeholder="Enter NIK Karyawan" readonly="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_seragam" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan_seragam" class="form-control" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kantor Cabang 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_seragam" class="form-control" placeholder="Enter Kantor Cabang" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_karyawan_seragam" class="form-control" placeholder="Enter Kantor Cabang" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Seragam
                            
                            </label>
                            <div class="col-md-4">
                                <select name="nama_seragam" class="form-control" id="id_seragam">
                                    <option>-- Pilih Jenis Seragam --</option>
                                    <?php
                                    foreach ($jenis_seragam as $k)
                                    {
                                        echo "<option value='$k->id_seragam'>$k->nama_seragam</option>";
                                    }
                                    ?>
                                </select>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Kode Seragam 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="kode_seragam" class="form-control" placeholder="Enter Kode Seragam" readonly="">
                            </div>
                        </div>

                        <div class="form-group" id="show">
                            <label class="col-md-7 control-label"><span class="font-red"><b><i>Biaya Penggantian Seragam Baru Tidak Dapat Dikembalikan (Harga Satuan * Qty)</i></b></span>
                            </label>
                        </div>

                        <div class="form-group" id="show2">
                            <label class="col-md-3 control-label">Harga Satuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="harga_satuan" class="form-control" placeholder="Enter Kode Seragam" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">QTY Seragam 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="qty_seragam" class="form-control">
                                    <option value="">-- Pilih QTY --</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Pengembalian 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_pengembalian" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Keterangan Tambahan
                            
                            </label>
                            <div class="col-md-4">
                                <textarea class="form-control" name="ket_tambahan" required></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('seragam/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/seragam.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.SERAGAM.handleSendData();
    window.SERAGAM.handleBootstrapSelect();

    // Biodata Karyawan
    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('seragam/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nik_tampil']").val(value.nik_baru);
                        $("input[name='nama_karyawan_seragam']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_seragam']").val(value.jabatan_karyawan);
                        $("input[name='lokasi_karyawan_seragam']").val(value.lokasi_struktur);
                        $("input[name='dept_karyawan_seragam']").val(value.dept_struktur);
                    });
                },
            });
          }
    }),

    // Keterangan Seragam
    $("#id_seragam").change(function () {
          if ($(this).val() != "") {
          var id_seragam=$('#id_seragam').val();
            $.ajax({
                url: "<?=base_url('seragam/tampil_seragam')?>",
                method: "POST",
                data: { 'id_seragam': id_seragam },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='kode_seragam']").val(value.kode_seragam);
                        $("input[name='harga_satuan']").val(value.harga_seragam);
                    });
                },
            });
          }
    }),

    $("#ket_pengajuan").change(function () {
        if ($(this).val() == "Seragam Hilang") {
            $("#show").show();
            $("#show2").show();
        } else if ($(this).val() == "Seragam Rusak") {
            $("#show").show();
            $("#show2").show();
        } else {
            $("#show").hide();
            $("#show2").hide();
        }
    });
    
</script>