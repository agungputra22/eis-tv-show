<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-self_covid" method="post" action="<?php echo site_url('self_covid/doInput_vaksin') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK Karyawan 
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nik_baru" readonly value="<?php echo $vaksin['nik_baru'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nama_karyawan_struktur" readonly value="<?php echo $vaksin['nama_karyawan_struktur'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Status 
                                            
                            </label>
                            <div class="col-md-4">
                                <?php
                                if ($vaksin['dosis_1']==null) {
                                    ?>
                                    <input type="radio" name="status" value="1" checked>Vaksin 1
                                    <?php
                                } elseif ($vaksin['dosis_1']!==null and $vaksin['dosis_2']==null) {
                                    ?>
                                    <input type="radio" name="status" value="2" checked>Vaksin 2
                                    <?php
                                } elseif ($vaksin['dosis_1']!==null and $vaksin['dosis_2']!==null and $vaksin['dosis_3']==null) {
                                    ?>
                                    <input type="radio" name="status" value="3" checked>Vaksin 3
                                    <?php
                                } else {
                                    ?>
                                    <input type="radio" name="status" value="4" checked>Selesai
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                        <?php
                            if ($vaksin['dosis_1']==null and $vaksin['dosis_2']==null and $vaksin['dosis_3']==null) {
                                ?>
                                <label class="col-md-3 control-label">Upload Dokumen  
                        
                                </label>
                                <div class="col-md-3">
                                    <input type="file" name="dokumen" class="form-control" required>
                                </div>
                                <label class="col-md-2 control-label">Tanggal Vaksin  
                                
                                </label>
                                <div class="col-md-3">
                                    <input type="date" name="tanggal_vaksin" class="form-control" required>
                                </div>
                                <?php
                            }
                        ?>
                        </div>

                        <div class="form-group">
                        <?php
                            if ($vaksin['dosis_1']!==null and $vaksin['dosis_2']==null and $vaksin['dosis_3']==null) {
                                ?>
                                <label class="col-md-3 control-label">Upload Dokumen  
                        
                                </label>
                                <div class="col-md-3">
                                    <input type="file" name="dokumen" class="form-control" required>
                                </div>
                                <label class="col-md-2 control-label">Tanggal Vaksin  
                                
                                </label>
                                <div class="col-md-3">
                                    <input type="date" name="tanggal_vaksin" class="form-control" required>
                                </div>
                                <?php
                            }
                        ?>
                        </div>

                        <div class="form-group">
                        <?php
                            if ($vaksin['dosis_1']!==null and $vaksin['dosis_2']!==null and $vaksin['dosis_3']==null) {
                                ?>
                                <label class="col-md-3 control-label">Upload Dokumen  
                        
                                </label>
                                <div class="col-md-3">
                                    <input type="file" name="dokumen" class="form-control" required>
                                </div>
                                <label class="col-md-2 control-label">Tanggal Vaksin  
                                
                                </label>
                                <div class="col-md-3">
                                    <input type="date" name="tanggal_vaksin" class="form-control" required>
                                </div>
                                <?php
                            }
                        ?>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
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
    window.SELF_COVID.handleSendData();
</script>