<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_shift/mandatori_spv_crl') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-arrow-circle-left"></i> Kembali </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-karyawan_shift" method="post" action="<?php echo site_url('karyawan_shift/doInput_range') ?>">
                    <div class="form-body">
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
                                <input type="text" name="nama_karyawan_shift" class="form-control" required="" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="jabatan_karyawan_shift" class="form-control" placeholder="Enter Jabatan" readonly="">
                                <input type="text" name="kode_karyawan_shift" class="form-control" required="" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_karyawan_shift" class="form-control" required="" placeholder="Enter Departement" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_shift1" class="form-control" required="" placeholder="Enter Lokasi" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Awal 
                            
                            </label>
                            <div class="col-md-3">
                                <?php
                                $hariIni = new DateTime();
                                $hari = $hariIni->format('l');
                                if ($hari == 'Friday') {
                                    ?>
                                    <input required="required" type="date" name="tanggal_awal" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+3 days', strtotime(date('Y-m-d')))); ?>" max="<?php echo date('Y-m-d', strtotime('+9 days', strtotime(date('Y-m-d')))); ?>" />
                                    <?php
                                } elseif ($hari == 'Saturday') {
                                    ?>
                                    <input required="required" type="date" name="tanggal_awal" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+2 days', strtotime(date('Y-m-d')))); ?>"/ max="<?php echo date('Y-m-d', strtotime('+8 days', strtotime(date('Y-m-d')))); ?>" />
                                    <?php
                                } else {
                                    ?>
                                    <input required="required" type="date" name="tanggal_awal" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d'); ?>"/>
                                    <?php
                                }

                                ?>
                                <!-- <input required="required" type="date" name="tanggal_awal" class="form-control" title="Choose your desired date" min="2023-04-24" max="2023-04-30"/> -->
                            </div>

                            <label class="col-md-2 control-label">Tanggal Akhir 
                            
                            </label>
                            <div class="col-md-3">
                                <?php
                                $hariIni = new DateTime();
                                $hari = $hariIni->format('l');
                                if ($hari == 'Friday') {
                                    ?>
                                    <input required="required" type="date" name="tanggal_akhir" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+4 days', strtotime(date('Y-m-d')))); ?>" max="<?php echo date('Y-m-d', strtotime('+9 days', strtotime(date('Y-m-d')))); ?>"/>
                                    <?php
                                } elseif ($hari == 'Saturday') {
                                    ?>
                                    <input required="required" type="date" name="tanggal_akhir" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+3 days', strtotime(date('Y-m-d')))); ?>"/ max="<?php echo date('Y-m-d', strtotime('+8 days', strtotime(date('Y-m-d')))); ?>"/>
                                    <?php
                                } else {
                                    ?>
                                    <input required="required" type="date" name="tanggal_akhir" class="form-control" title="Choose your desired date" min="<?php echo date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-d')))); ?>"/>
                                    <?php
                                }

                                ?>
                                <!-- <input required="required" type="date" name="tanggal_akhir" class="form-control" title="Choose your desired date" min="2023-04-25" max="2023-04-30"/> -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam Kerja 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="jam_kerja" class="form-control" required="">
                                <option>-- Pilih Jam Kerja --</option>
                                    <?php
                                    foreach ($jam_kerja as $k)
                                    {
                                        echo "<option value='$k->id_shifting'>$k->waktu_masuk - $k->waktu_keluar</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <input type="hidden" name="user_submit" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <?php
                        $hariIni = new DateTime();
                        $hari = $hariIni->format('l');
                        if ($hari == 'Friday' or $hari == 'Saturday') {
                            ?>
                            <button type="submit" class="btn green btn-block draft-kerja"> <i class="fa fa-save"></i> Simpan</button>
                            <?php
                        } else {
                            ?>
                            <button type="submit" class="btn green btn-block draft-kerja" disabled=""> <i class="fa fa-save"></i> Simpan</button>
                            <?php
                        }
                        ?>
                        <!-- <button type="submit" class="btn green btn-block draft-kerja"> <i class="fa fa-save"></i> Simpan</button> -->
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan_shift.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN_SHIFT.handleSendData();
    window.KARYAWAN_SHIFT.loadPengalamankerja();
    window.KARYAWAN_SHIFT.savePengalamankerja();
    window.KARYAWAN_SHIFT.handleBootstrapSelect();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('karyawan_shift/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nik_tampil']").val(value.nik_baru);
                        $("input[name='nama_karyawan_shift']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_karyawan_shift']").val(value.jabatan_struktur);
                        $("input[name='kode_karyawan_shift']").val(value.jabatan_karyawan);
                        $("input[name='dept_karyawan_shift']").val(value.dept_struktur);
                        $("input[name='lokasi_karyawan_shift1']").val(value.lokasi_hrd);
                    });
                },
            });
          }
     })
</script>