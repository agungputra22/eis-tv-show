<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_violance/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_violance" method="post" action="<?php echo site_url('historical_violance/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10" required="">
                            </div>
                            <div class="col-md-4">
                                <button type="button" name="nik_baru" id="nik_baru" class="btn btn-success">Cari NIK</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_violance" class="form-control" placeholder="Enter Nama Karyawan" readonly="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_historical_violance" class="form-control" placeholder="Enter Jabatan" readonly="" required="">
                                <input type="hidden" name="kode_jabatan" class="form-control" placeholder="Enter Jabatan" readonly="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Rekomondasi 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <select name="rekomondasi_historical_violance" class="form-control">
                                    <option>-- Pilih Rekomondasi --</option>
                                    <option> IA </option>
                                    <option> User </option>
                                    <option> Indisipliner </option>
                                </select>
                            </div>
                            <div class="collapse" id="user">
                            <div class="card card-body">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <input type="text" name="user" class="form-control" placeholder="Enter Rekomondasi User">
                                </div>
                            </div>
                            </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Pelanggaran 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="pelanggaran_historical_violance" id="pelanggaran_historical_violance" class="form-control">
                                <option>-- Pilih Pelanggaran --</option>
                                    <?php
                                    foreach ($jenis_pelanggaran as $k)
                                    {
                                        echo "<option value='$k->jenis_pelanggaran'>$k->jenis_pelanggaran</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jenis Sanksi
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="punishment_historical_violance" class="form-control" placeholder="Enter Sanksi" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Dibuat Surat 
                            
                            </label>
                            <div class="col-md-4">
                                <input name="tanggal_surat" class="from_date form-control" placeholder="Enter Tanggal Dibuat" contenteditable="false" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Berlaku 
                            
                            </label>
                            <div class="col-md-4">
                                <input name="warning_start_historical_violance" class="to_date form-control" placeholder="Enter Tanggal Berlaku" contenteditable="false" type="text">
                                <input type="hidden" name="submit_date" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="hidden" name="user_submit" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('historical_violance/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_violance.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_VIOLANCE.handleSendData();

    // Biodata Karyawan
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
                        $("input[name='nama_karyawan_violance']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_historical_violance']").val(value.jabatan_karyawan);
                        $("input[name='kode_jabatan']").val(value.jabatan_hrd);
                    });
                },
            });
          }
     })

    // Jenis Pelanggaran
    $("#pelanggaran_historical_violance").change(function () {
          if ($(this).val() != "") {
          var pelanggaran_historical_violance=$('#pelanggaran_historical_violance').val();
            $.ajax({
                url: "<?=base_url('historical_violance/tampil_pelanggaran')?>",
                method: "POST",
                data: { 'pelanggaran_historical_violance': pelanggaran_historical_violance },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='punishment_historical_violance']").val(value.type_pelanggaran);
                    });
                },
            });
          }
     })

    // Lock Tanggal
    var startDate = new Date('2012-01-01');
    var FromEndDate = new Date();
    var ToEndDate = new Date();

    ToEndDate.setDate(ToEndDate.getDate()+365);

    $('.from_date').datepicker({

        dateFormat:'yy-mm-dd',
        weekStart: 1,
        startDate: '2012-01-01',
        endDate: FromEndDate, 
        autoclose: true
    })
        .on('changeDate', function(selected){
            startDate = new Date(selected.date.valueOf());
            startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
            $('.to_date').datepicker('setStartDate', startDate);
        }); 
    $('.to_date')
        .datepicker({

            dateFormat:'yy-mm-dd',
            weekStart: 1,
            startDate: startDate,
            endDate: ToEndDate,
            autoclose: true
        })
        .on('changeDate', function(selected){
            FromEndDate = new Date(selected.date.valueOf());
            FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
            $('.from_date').datepicker('setEndDate', FromEndDate);
        });
</script>