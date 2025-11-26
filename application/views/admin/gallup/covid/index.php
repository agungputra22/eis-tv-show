<style type="text/css">
    .value {
    text-align:left;
    float:left;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                    <h5><span class="font-red">Demi kesehatan dan keselamatan bersama di tempat kerja, kami mohon Bapak/Ibu untuk menjawab pertanyaan ini secara <b>Jujur</b>. </span></h5>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-self_covid" method="post" action="<?php echo site_url('self_covid/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">1
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah sudah mendapat vaksin ?
                            </label>
                            <div class="col-md-2">
                                <input type="radio" required value="1" name="jawaban_1"> Dosis 1 <br>
                                <input type="radio" required value="2" name="jawaban_1"> Dosis 2 <br>
                                <input type="radio" required value="3" name="jawaban_1"> Booster <br>
                                <input type="radio" required value="4" name="jawaban_1"> Belum Vaksin <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">2
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Bagaimana kondisi saat ini ?
                            </label>
                            <div class="col-md-2">
                                <input type="radio" required value="5" name="jawaban_2"> Sakit <br>
                                <input type="radio" required value="6" name="jawaban_2"> Sehat <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">3
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda mengunjungi Fasilitas Umum ?
                            </label>
                            <div class="col-md-4">
                                <input type="radio" required value="7" name="jawaban_3"> Tidak <br>
                                <input type="radio" required value="8" name="jawaban_3"> Pasar/Mall/Mini Market/Tempat Makan <br>
                                <input type="radio" required value="9" name="jawaban_3"> Fasilitas Pelayanan Kesehatan (RS, Puskesmas, Praktek Dokter) <br>
                                <input type="radio" required value="10" name="jawaban_3"> Fasilitas Pelayanan Masyarakat (Pemerintah, Bank, dll) <br>
                                <input type="radio" required value="11" name="jawaban_3"> Tempat Penginapan/Tempat Rekreasi/ Tempat Olahraga/Tempat Hiburan/Fasilitas Jasa Lainnya <br>
                                <input type="radio" required value="12" name="jawaban_3"> Tempat Ibadah <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">4
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda bepergian menggunakan transportasi umum?
                            </label>
                            <div class="col-md-4">
                                <input type="radio" required value="13" name="jawaban_4"> Tidak <br>
                                <input type="radio" required value="14" name="jawaban_4"> Bus/kereta (Commuter line/MRT/LRT)/Angkot <br>
                                <input type="radio" required value="15" name="jawaban_4"> Kapal laut/ pesawat terbang/KA Luar Kota <br>
                                <input type="radio" required value="16" name="jawaban_4"> Taksi/GoCar/GrabCar <br>
                                <input type="radio" required value="17" name="jawaban_4"> Ojek/OJOL <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">5
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda melakukan perjalanan ke Luar Kota atau ke Luar Negeri?
                            </label>
                            <div class="col-md-4">
                                <input type="radio" required value="18" name="jawaban_5"> Tidak <br>
                                <input type="radio" required value="19" name="jawaban_5"> Ke Luar Kota / Keluar Wilayah Jabodetabek <br>
                                <input type="radio" required value="20" name="jawaban_5"> Ke Luar Negeri <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">6
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda menghadiri acara/kegiatan yang dihadiri oleh orang banyak? Terdapat kerumunan orang (pernikahan, meninggal dunia tanpa protokol COVID-19)
                            </label>
                            <div class="col-md-4">
                                <input type="radio" required value="21" name="jawaban_6"> Ya <br>
                                <input type="radio" required value="22" name="jawaban_6"> Tidak <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">7
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda memiliki riwayat kontak erat (berjabat tangan, berbicara, berada dalam satu ruangan/satu rumah) dengan orang-orang sbb:
                            </label>
                            <div class="col-md-4">
                                <input type="radio" required value="23" name="jawaban_7"> Tidak <br>
                                <input type="radio" required value="24" name="jawaban_7"> Orang yang mendapat status suspek/probable dari Dinas Kesehatan setempat <br>
                                <input type="radio" required value="25" name="jawaban_7"> Orang yang dinyatakan konfirmasi positif COVID-19 <br>
                                <input type="radio" required value="26" name="jawaban_7"> Orang yang memiliki hasil Swab AntigenTest Reaktif <br>
                                <input type="radio" required value="27" name="jawaban_7"> Orang yang memiliki gejala sakit DAN terkonfirmasi punya kontak dengan orang yang dinyatakan konfirmasi Positif COVID-19/Swab Antigen Reaktif <br>
                                <input type="radio" required value="28" name="jawaban_7"> Orang yang memiliki gejala sakit namun belum terkonfirmasi punya kontak dengan orang yang dinyatakan konfirmasi Positif COVID-19/Swab Antigen Test Reaktif <br>
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-1 control-label">8
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-6 control-label" style="text-align:left;">Apakah anda mengalami gejala dan kondisi sbb: <br>
                            <span class="font-red"><b>Bisa di pilih lebih dari 1</b></span>
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" required value="29" name="jawaban_8[]"> Tidak ada gejala <br>
                                <input type="checkbox" required value="30" name="jawaban_8[]"> Demam (suhu ≥37.3°C) <br>
                                <input type="checkbox" required value="31" name="jawaban_8[]"> Pilek <br>
                                <input type="checkbox" required value="32" name="jawaban_8[]"> Batuk <br>
                                <input type="checkbox" required value="33" name="jawaban_8[]"> Sakit Tenggorokan <br>
                                <input type="checkbox" required value="34" name="jawaban_8[]"> Sesak Napas <br>
                                <input type="checkbox" required value="35" name="jawaban_8[]"> Batuk dan/atau Pilek atau Sakit Tenggorokan yang disertai dengan Demam (suhu ≥ 37.3°C) DAN mengalami Sesak NapasHasil Swab Antigen Test menunjukkan Reaktif <br>
                                <input type="checkbox" required value="36" name="jawaban_8[]"> Hasil Swab Antigen Test menunjukkan Reaktif <br>
                                <input type="checkbox" required value="37" name="jawaban_8[]"> Hasi Swab/PCR menunjukkan Positif <br>
                            </div>
                        </div>
                        <hr>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <?php
                                    if (empty($jawaban)) {
                                        ?>
                                        <button type="submit" class="btn blue btn-block"> Submit </button>
                                        <?php
                                    } else {
                                        if ($tes['hasil'] >= '0' and $tes['hasil'] <= '4') {
                                            ?>
                                            <button type="submit" class="btn green btn-block" disabled='disabled'>
                                                Terima Kasih, Berikut hasil assessment resiko Covid-19 hari ini <br>
                                                Nilai : <b><?php echo $tes['hasil']; ?></b> <br>
                                                Tingkat Resiko Rendah <br>
                                                Silahkan masuk kerja dan beraktivitas, dengan catatan suhu tubuh tidak lebih dari 37,5 <br><br>
                                                Tetap jaga kesehatan anda dan jalankan protokol kesehatan dengan menggunakan masker, menjaga jarak, dan tidak berkerumun 
                                            </button>
                                            <?php
                                        } elseif ($tes['hasil'] >= '5' and $tes['hasil'] <= '11') {
                                            ?>
                                            <button type="submit" class="btn yellow btn-block" disabled='disabled'>
                                                Terima Kasih, Berikut hasil assessment resiko Covid-19 hari ini <br>
                                                Nilai : <b><?php echo $tes['hasil']; ?></b> <br>
                                                Tingkat Resiko Sedang <br>
                                                Silahkan masuk kerja dan beraktivitas, dengan catatan suhu tubuh tidak lebih dari 37,5 dan tidak bergejala<br><br>
                                                <b>Tambahan</b> : <br>
                                                Diminta melaporkan hasil pengecekan mandiri (suhu dan gejala-gejala) selama 3 hari kedepan kepada atasan <br>
                                                Atasan / PIC Depo harus memantau kondisi kesehatan karyawan tsb <br><br>
                                                Tetap jaga kesehatan anda dan jalankan protokol kesehatan dengan menggunakan masker, menjaga jarak, dan tidak berkerumun 
                                            </button>
                                            <?php
                                        } else {
                                            ?>
                                            <button type="submit" class="btn red btn-block" disabled='disabled'>
                                                Terima Kasih, Berikut hasil assessment resiko Covid-19 hari ini <br>
                                                Nilai : <b><?php echo $tes['hasil']; ?></b> <br>
                                                Tingkat Resiko Tinggi <br>
                                                Tidak diperkenankan masuk kerja, harap lakukan swab antigen mandiri<br><br>
                                                <b>Hasil Swab</b> : <br>
                                                Apabila hasil swab antigen negative (tanpa gejala) maka bisa masuk kerja sesuai arahan tim satgas <br>
                                                Apabila hasil swab antigen negative (dengan gejala) maka diarahkan untuk swab PCR <br>
                                                Apabila hasil swab antigen / PCR positive, maka karyawan melakukan ISOMAN 10 hari <br><br>
                                                <b>Tambahan</b> : <br>
                                                Diminta melaporkan kondisi selama isolasi 10 hari kedepan kepada atasan dan tim satgas <br>
                                                Mengikuti kebijakan perusahaan yang telah ditetapkan <br>
                                                Atasan / PIC Depo harus memantau kondisi kesehatan karyawan tsb <br><br>
                                                Tetap jaga kesehatan anda dan jalankan protokol kesehatan dengan menggunakan masker, menjaga jarak, dan tidak berkerumun 
                                            </button>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/self_covid.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.SELF_COVID.handleSendDataPilihan();
</script>