<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('daily_activity/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-daily_activity" method="post" action="<?php echo site_url('daily_activity/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="id_daily_activity" class="form-control" placeholder="Enter Id daily_activity" readonly="">
                                <input type="hidden" name="nik_baru" class="form-control" placeholder="Enter Id daily_activity" value="<?php echo users('nik_baru'); ?>">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="" class="form-control" value="<?php echo users('nik_baru'); ?>" readonly="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Lokasi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="checkbox" name="status_lokasi" id="myCheck"  onclick="myFunction()" data-toggle="collapse" data-target="#nik_lama" aria-expanded="false" aria-controls="nik_lama" value="0"> External Lokasi
                                <input type="checkbox" name="status_lokasi" id="myCheck_cd"  onclick="myFunction_cd()" data-toggle="collapse" data-target="#cd" aria-expanded="false" aria-controls="cd" value="1"> Internal Lokasi
                            </div>
                        </div>

                        <div class="form-group" id="text" style="display:none">
                            <label class="col-md-3 control-label">Lokasi
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_external" class="form-control" placeholder="Enter Lokasi" required="required">
                            </div>
                        </div>

                        <div class="form-group" id="text_cd" style="display:none">
                            <label class="col-md-3 control-label">Lokasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="lokasi_internal" class="form-control" id="lokasi_absen" required="">
                                <option value="">-- Pilih Lokasi --</option>
                                    <?php
                                    foreach ($lokasi as $k)
                                    {
                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">List Pekerjaan
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-6">
                                <textarea name="keterangan" class="form-control" placeholder="Ketikan Issue" rows="8"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                <a href="<?php echo site_url('daily_activity/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/daily_activity.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.DAILY_ACTIVITY.handleSendData();

    function myFunction() {
        var checkBox = document.getElementById("myCheck");
        var text = document.getElementById("text");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }

    function myFunction_cd() {
        var checkBox = document.getElementById("myCheck_cd");
        var text = document.getElementById("text_cd");
        if (checkBox.checked == true){
            text.style.display = "block";
        } else {
            text.style.display = "none";
        }
    }
</script>