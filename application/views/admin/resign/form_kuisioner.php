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
                <form role="form" class="form-horizontal form-resign" method="post" action="<?php echo site_url('resign/doInputKusioner') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Lengkap 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Jabatan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_baru" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nik_baru'] ?>">
                            </div>

                            <label class="col-md-2 control-label">Tanggal Masuk
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo DateToIndo($edit['join_date_struktur']) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Depo / Dept
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['lokasi_struktur'].' / '.$edit['kode_departement'] ?>">
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
                    <div class="col-lg-12">
                        <p>Kami mengharapkan kerjasama Anda untuk menjawab pertanyaan - pertanyaan dibawah ini secara jujur, terbuka dan terperinci. Jawaban Anda kami butuhkan sebagai bahan evaluasi untuk memperbaiki kebijakan dan kinerja manajemen di masa yang akan datang. Pertanyaan dan jawaban berikut tidak mengikat secara hukum.<br>
                        <b>(BERIKAN TANDA CENTANG/ SILANG DIKOTAK YANG MENJADI PENILAIAN ANDA)</b> </p>
                    </div>
                    &nbsp;
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered table-hover">
                            <tr class="bg-default">
                                <td align="center" colspan="2">ITEM PERTENYAAN</td>
                                <td align="center" rowspan="2">JAWABAN</td>
                            </tr>
                            <tr class="bg-default">
                                <td colspan="2" align="center">KEPEMIMPINAN DAN PERENCANAAN</td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_1 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_1[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_1[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">BUDAYA PERUSAHAAN</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_2 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_2[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_2[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">KOMUNIKASI</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_3 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_3[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_3[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">PENGEMBANGAN KARIR</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_4 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_4[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_4[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">PERANAN SAYA</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_5 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_5[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_5[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">PENGAKUAN DAN PENGHARGAAN</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_6 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_6[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_6[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">KERJASAMA</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_7 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_7[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_7[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">KONDISI KERJA</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_8 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_8[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_8[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">HUBUNGAN KERJA</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_9 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_9[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_9[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">SYSTEM DAN PROSEDUR</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_10 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_10[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_10[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">SALARY & BENEFIT</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_11 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_11[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_11[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">PROGRAM PELATIHAN</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_12 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_12[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_12[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2" align="center">FASILITAS</td>
                                <td></td>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($soal_13 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> <input type="hidden" name="id_soal_13[]" value="<?php echo $row['id'] ?>"></td>
                                <td> <?php echo $row['soal'] ?> </td>
                                <td> 
                                    <select class="form-control" name="jawaban_soal_13[]" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>

                            <tr class="bg-default">
                                <td colspan="2"><b>Secara keseluruhan, bagaimana tingkat kepuasan saya selama bekerja di PT.TVIP/PT.ASA</b></td>
                                <td> 
                                    <select class="form-control" name="nilai_keseluruhan" required>
                                        <option value="">-- Pilih Jawaban --</option>
                                        <option value="1">Sangat Buruk</option>
                                        <option value="2">Buruk</option>
                                        <option value="3">Sedang</option>
                                        <option value="4">Baik</option>
                                        <option value="5">Sangat Baik</option>
                                    </select> 
                                </td>
                            </tr>

                        </table>
                    </div>
                    &nbsp;
                    <div class="col-lg-12">
                        <p><b>WAJIB DIISI :</b><br>
                        Alasan anda mengundurkan diri (Urutkan sesuai dengan alasan yang paling dominan dan tidak semua harus dipilih) :</p>
                        <table>
                            <tr>
                                <td width="300"><input type="radio" name="kategori_resign" required value="Tidak mampu menjalankan tugas"> Tidak mampu menjalankan tugas</td>
                                <td width="300"><input type="radio" name="kategori_resign" value="Tidak cocok dengan budaya perusahaan"> Tidak cocok dengan budaya perusahaan</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="kategori_resign" value="Mendapat pekerjaan baru"> Mendapat pekerjaan baru</td>
                                <td><input type="radio" name="kategori_resign" value="Wiraswasta"> Wiraswasta</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="kategori_resign" value="Gaji tidak sesuai"> Gaji tidak sesuai</td>
                                <td><input type="radio" name="kategori_resign" value="Perhitungan Incentive tidak sesuai"> Perhitungan Incentive tidak sesuai</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="kategori_resign" value="Kesehatan"> Kesehatan</td>
                                <td><input type="radio" name="kategori_resign" value="Masalah Keluarga"> Masalah Keluarga</td>
                            </tr>
                            <tr>
                                <td><input type="radio" name="kategori_resign" value="Melanjutkan Studi"> Melanjutkan Studi</td>
                                <td><input type="radio" name="kategori_resign" value="Tidak Cocok Dengan Atasan"> Tidak Cocok Dengan Atasan</td>
                            </tr>
                        </table>
                    &nbsp; &nbsp;
                    </div>
                    <div class="col-lg-12">
                        <p><b>Jelaskan alasan anda :</b></p>
                        <textarea class="form-control" rows="3" name="alasan_resign" required></textarea>
                    &nbsp;
                    </div>
                    <div class="col-lg-12">
                        <p><b>Saran/ masukan untuk perbaikan kebijakan dan kinerja perusahaan :</b></p>
                        <textarea class="form-control" rows="3" name="saran_masukan" required></textarea>
                    &nbsp;
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('resign/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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