<div class="modal fade" id="addformmodal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close popup" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <div id="addform-header">
                    <h4>Tambah Karyawan Lembur</h4>
                </div>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div id="addform-body">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" type="text" name="nik_baru" id="nik_baru" placeholder="NIK" required>
                            <input class="form-control" type="hidden" name="bulan_dan_tanggal" id="bulan-dan-tanggal">
                            <input class="form-control" type="hidden" name="tahun_lahir" id="tahun-lahir" readonly="" value="<?php echo date("Y"); ?>" required>
                        </div>
                        <div class="input-group-addon">
                            <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" type="text" name="nama_karyawan_shift" id="nama" placeholder="Nama Karyawan" readonly="">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" type="hidden" name="jabatan_karyawan_shift" id="jabatan_karyawan_shift" placeholder="Jabatan" readonly="">
                            <input class="form-control" type="text" name="kode_jabatan_karyawan" id="kode_jabatan_karyawan" placeholder="Jabatan" readonly="">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" type="text" name="dept_karyawan_shift" id="dept_karyawan_shift" placeholder="Departement" readonly="">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <select name="jam_shift" id="jam_shift" class="form-control">
                            <option value="">-- Pilih Shift --</option>
                                <?php
                                foreach ($jam_kerja as $k)
                                {
                                    echo "<option value='$k->id_shifting'>$k->waktu_masuk - $k->waktu_keluar</option>";
                                }
                                ?>
                            <option value="OFF">OFF</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <textarea class="form-control" type="text" name="keterangan_shift" id="keterangan_shift" placeholder="Keterangan" rows="3"></textarea>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                            <input class="form-control" type="text" name="no_co_shift" id="no_co_shift" placeholder="No. CO">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btn btn-sm btn-success" onclick="jadiSimpan(this)"><span id="saving-loader"><img class="saving-loader" src="assets/images/loadericon.gif"></span><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</div>
                    <button class="btn btn-sm btn-default" onclick="batalSimpan(this)" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Batal</button>
                </div>
            </form>   
        </div>
    </div>
</div>
<!-- End Modal Add Form -->

<script type="text/javascript">
    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('historical_violance/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_shift']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_shift']").val(value.jabatan_struktur);
                        $("input[name='kode_jabatan_karyawan']").val(value.jabatan_karyawan);
                        $("input[name='dept_karyawan_shift']").val(value.dept_struktur);
                    });
                },
            });
          }
     })
</script>