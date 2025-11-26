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
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-gallup" method="post" action="<?php echo site_url('gallup/doInput') ?>">
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
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_1'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_1'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_1"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_1"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_1"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_1"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_1'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_1"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_1"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_1"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_1"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_1'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_1"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_1"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">2
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_2'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_2'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_2"> Sangat Memadai <br>
                                        <input type="radio" required value="3" name="jawaban_2"> Memadai <br>
                                        <input type="radio" required value="2" name="jawaban_2"> Kurang Memadai <br>
                                        <input type="radio" required value="1" name="jawaban_2"> Tidak Memadai <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_2'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_2"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_2"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_2"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_2"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_2'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_2"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_2"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">3
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_3'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_3'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_3"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_3"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_3"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_3"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_3'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_3"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_3"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_3"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_3"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_3'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_3"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_3"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">4
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_4'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_4'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_4"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_4"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_4"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_4"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_4'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_4"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_4"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_4"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_4"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_4'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_4"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_4"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">5
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_5'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_5'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_5"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_5"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_5"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_5"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_5'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_5"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_5"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_5"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_5"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_5'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_5"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_5"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">6
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_6'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_6'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_6"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_6"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_6"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_6"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_6'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_6"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_6"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_6"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_6"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_6'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_6"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_6"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">7
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_7'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_7'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_7"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_7"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_7"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_7"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_7'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_7"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_7"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_7"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_7"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_7'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_7"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_7"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">8
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_8'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_8'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_8"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_8"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_8"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_8"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_8'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_8"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_8"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_8"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_8"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_8'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_8"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_8"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">9
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_9'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_9'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_9"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_9"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_9"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_9"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_9'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_9"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_9"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_9"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_9"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_9'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_9"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_9"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">10
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_10'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_10'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_10"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_10"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_10"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_10"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_10'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_10"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_10"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_10"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_10"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_10'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_10"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_10"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">11
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_11'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_11'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_11"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_11"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_11"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_11"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_11'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_11"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_11"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_11"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_11"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_11'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_11"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_11"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-1 control-label">12
                            <span class="font-red">*</span>
                            </label>
                            <label class="col-md-8 control-label" style="text-align:left;"><?php echo $pertanyaan['pertanyaan_12'] ?>
                            </label>
                            <div class="col-md-2">
                                <?php
                                    if ($pertanyaan['jawaban_12'] == 1) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_12"> Sangat Memahami <br>
                                        <input type="radio" required value="3" name="jawaban_12"> Memahami <br>
                                        <input type="radio" required value="2" name="jawaban_12"> Kurang Memahami <br>
                                        <input type="radio" required value="1" name="jawaban_12"> Tidak Memahami <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_12'] == 2) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_12"> Selalu <br>
                                        <input type="radio" required value="3" name="jawaban_12"> Kadang-kadang <br>
                                        <input type="radio" required value="2" name="jawaban_12"> Pernah <br>
                                        <input type="radio" required value="1" name="jawaban_12"> Tidak Pernah <br>
                                        <?php
                                    } elseif ($pertanyaan['jawaban_12'] == 3) {
                                        ?>
                                        <input type="radio" required value="4" name="jawaban_12"> Ya <br>
                                        <input type="radio" required value="3" name="jawaban_12"> Tidak <br>
                                        <?php
                                    }
                                ?>
                            </div>
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

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-1 col-md-10">
                                <!-- <?php
                                    if (empty($jawaban)) {
                                        ?>
                                        <button type="submit" class="btn blue btn-block"> Submit </button>
                                        <?php
                                    } else {
                                        ?>
                                        <button type="submit" class="btn blue btn-block" disabled='disabled'>Sudah Melakukan Survey</button>
                                        <?php
                                    }
                                ?> -->
                                <button type="submit" class="btn blue btn-block" disabled='disabled'>Sudah Melakukan Survey</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/gallup.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.GALLUP.handleSendDataPilihan();
</script>