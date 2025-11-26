<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('tarikan_absen/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-tarikan_absen" method="post" action="<?php echo site_url('tarikan_absen/query_harian') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Depo</label><br>
                                <select name="lokasi_struktur" class="form-control" id="lokasi_struktur">
                                <option>-- Pilih Lokasi --</option>
                                    <?php
                                    foreach ($depo as $k)
                                    {
                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Jabatan</label>
                                <select name="jabatan_struktur" id="jabatan_struktur" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Pabrik" data-width="80%" placeholder="Pilih Pabrik" required>
                                    <option>-- Pilih Jabatan --</option>
                                    <?php
                                        foreach ($jabatan as $p)
                                        {
                                            $jabatan_id=$p->jabatan_id;
                                            $nama_jabatan=$p->nama_jabatan;
                                            $lokasi=$p->lokasi;
                                    ?>
                                        <option value="<?=$nama_jabatan;?>">
                                            <?=$nama_jabatan;?> (<?=$lokasi;?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-4" id="menu-customer">
                                <label>Departement</label><br>
                                <select name="dept_struktur" class="form-control" id="dept_struktur">
                                <option>-- Pilih Departement --</option>
                                    <?php
                                    foreach ($dept as $k)
                                    {
                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-5">
                                <label>NIK</label><br>
                                <input type="text" name="nik_karyawan" class="form-control" placeholder="Enter Kode NIK">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Start Date</label><br>
                                <input name="tanggal1" placeholder="DD-MM-YYYY" class="form-control" type="date" >
                            </div>
                            <div class="col-md-6">
                                <label>End Date</label>
                                <input name="tanggal2" placeholder="DD-MM-YYYY" class="form-control" type="date" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-refresh"></i> Process</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="dismiss_modal">Close</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/tarikan_absen.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.TARIKAN_ABSEN.handleSendData();
</script>