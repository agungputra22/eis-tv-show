<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan_shift/index_karyawan_shift') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
        <form role="form" class="form-horizontal form-karyawan_shift" method="post" action="<?php echo site_url('karyawan_shift/doUpdate') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="id_karyawan_shift" class="form-control" placeholder="Enter Nama Karyawan" value="<?php echo $edit['id_karyawan_shift'] ?>">
                                <input type="text" name="nik_shift" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10" readonly="" value="<?php echo $edit['nik_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_shift" class="form-control" placeholder="Enter Nama Karyawan" readonly="" value="<?php echo $edit['nama_karyawan_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="jabatan_karyawan_shift" class="form-control" placeholder="Enter Jabatan" readonly="" value="<?php echo $edit['jabatan_karyawan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_karyawan_shift" class="form-control" placeholder="Enter Departement" readonly="" value="<?php echo $edit['dept_karyawan_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_karyawan_shift" class="form-control" placeholder="Enter Lokasi" readonly="" value="<?php echo $edit['lokasi_karyawan_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tanggal Shift 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="date" name="tanggal_shift_edit" class="form-control" placeholder="Enter Lokasi" readonly="" value="<?php echo $edit['tanggal_shift'] ?>">
                                <input type="hidden" name="tanggal_shift" class="form-control" placeholder="Enter Lokasi" readonly="" value="<?php echo $edit['tanggal_shift'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jam Kerja 
                            
                            </label>
                            <div class="col-md-4">
                                <select name="jam_kerja_edit" class="form-control">
                                <option value="">-- Pilih Shift --</option>
                                    <?php
                                    foreach ($jam_kerja as $k)
                                    {
                                        echo "<option value='$k->id_shifting'";
                                        echo $edit['id_shifting']==$k->id_shifting?'selected':'';
                                        echo">$k->waktu_masuk - $k->waktu_keluar</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" name="jam_kerja" value="<?php echo $edit['jam_kerja'] ?>">
                                <input type="hidden" name="update_date" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                <input type="hidden" name="user_update" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
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
</script>