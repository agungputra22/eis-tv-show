<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('resign/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-resign" method="post" action="<?php echo site_url('resign/doUpdateExit') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label"><b>INTERVIEWER</b>
                            </label>
                            <div class="col-md-3">
                            </div>

                            <label class="col-md-2 control-label"><b>KARYAWAN RESIGN</b>
                            </label>
                            <div class="col-md-3">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Lengkap 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo users('nama_karyawan_struktur') ?>">
                            </div>

                            <label class="col-md-2 control-label">Nama Lengkap
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo users('jabatan_karyawan') ?>">
                            </div>

                            <label class="col-md-2 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Depo / Dept
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo users('lokasi_struktur').' / '.$edit['kode_departement'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Depo / Dept
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'].' / '.$edit['kode_departement'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">
                            </label>
                            <div class="col-md-3">
                                
                            </div>

                            <label class="col-md-2 control-label">Tanggal Resign
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['tanggal_efektif_resign']) ?>">
                            </div>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">Ceklist pilihan & isi alasan dari karyawan resign (Data diisi oleh Interviewer dari hasil interview/ konseling dengan karyawan yang mengajukan resign)
                        </label>
                    </div>
                    &nbsp;
                    <div class="col-lg-12">
                        <?php
                        $no = 1;
                        foreach ($soal as $row) {
                        ?>
                        <div class="form-group">
                            <label class="col-md-1 control-label"><?php echo $no ?>
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $row['soal'] ?>
                                <input type="hidden" name="id_soal[]" value="<?php echo $row['id'] ?>">
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($row['jawaban'] == 1) {
                                        ?>
                                        <select class="form-control" name="jawaban_soal[]" required>
                                            <option value="">-- Pilih Keterangan --</option>
                                            <option value="1"> Sangat Memahami </option>
                                            <option value="2"> Memahami </option>
                                            <option value="3"> Kurang Memahami </option>
                                            <option value="4"> Tidak Memahami </option>
                                        </select>
                                        <?php
                                    } elseif ($row['jawaban'] == 2) {
                                        ?>
                                        <select class="form-control" name="jawaban_soal[]" required>
                                            <option value="">-- Pilih Keterangan --</option>
                                            <option value="1"> Selalu </option>
                                            <option value="2"> Kadang - Kadang </option>
                                        </select>
                                        <?php
                                    } elseif ($row['jawaban'] == 3) {
                                        ?>
                                        <select class="form-control" name="jawaban_soal[]" required>
                                            <option value="">-- Pilih Keterangan --</option>
                                            <option value="1"> Ya </option>
                                            <option value="2"> Tidak </option>
                                        </select>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-1 control-label">
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" rows="3" name="keterangan[]" required></textarea>
                            </div>
                        </div>
                        <?php
                        $no++;
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">Saran dan Masukan :
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">(dengan memilih maksimal 3 dan minimal 1 point dari 12 pertanyaan diatas untuk diberikan saran / masukan)
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 control-label">
                            NO. 
                        </label>
                        <label class="col-md-9 control-label" style="text-align:left;">
                            KETERANGAN
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 control-label">
                            <input type="text" name="nomor_saran[]" class="form-control input-xsmall" required>
                        </label>
                        <label class="col-md-9 control-label" style="text-align:left;">
                            <textarea class="form-control" name="saran[]" cols="8" required></textarea>
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-1 control-label">
                            <input type="text" name="nomor_saran[]" class="form-control input-xsmall" required>
                        </label>
                        <div class="col-md-9 control-label" style="text-align:left;">
                            <textarea class="form-control" name="saran[]" cols="8" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-1">
                            <input type="text" name="nomor_saran[]" class="form-control input-xsmall" required>
                        </label>
                        <div class="col-md-9 control-label" style="text-align:left;">
                            <textarea class="form-control" name="saran[]" cols="8" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">Alasan Resign (Sesuai dengan pilihan)
                        </label> <br>
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">
                            <input type="radio" name="alasan_exit" value="Mendapat Pekerjaan Baru"> Mendapat Pekerjaan Baru <br>
                            <input type="radio" name="alasan_exit" value="Melanjutkan Study"> Melanjutkan Study <br>
                            <input type="radio" name="alasan_exit" value="Berwiraswasta"> Berwiraswasta <br>
                            <input type="radio" name="alasan_exit" value="Kesehatan"> Kesehatan
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;"><b>Tambahan :</b>
                        </label>
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">Interviewer menggambarkan secara detail faktor-faktor apa saja sehingga karyawan resign
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="tambahan_exit"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;"><b>Apabila ada ketidaksesuaian ( MAJOR / MINOR)</b>
                        </label>
                        <label class="col-md-offset-1 col-md-10 control-label" style="text-align:left;">Interviewer gambarkan faktor pareto (Dominan) yang menyebabkan ketidaksesuaian
                        </label>
                    </div>

                    <div class="form-group">
                        <label class="col-md-1 control-label">
                        </label>
                        <div class="col-md-10">
                            <textarea class="form-control" rows="3" name="ketidaksesuai_exit"></textarea>
                        </div>
                    </div>
                    &nbsp;
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('resign/approve') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/resign.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.RESIGN.handleSendData();
</script>