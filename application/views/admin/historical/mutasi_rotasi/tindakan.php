<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_mutasi/approve') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_mutasi" method="post" action="<?php echo site_url('historical_mutasi/approve_atasan') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">No. Pengajuan
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-3">
                                <input type="hidden" name="id_mutasi_rotasi" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['id_mutasi_rotasi'] ?>">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter Id depo" readonly="" value="<?php echo $edit['no_pengajuan'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">NIK
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nik_baru" id="nik_baru" readonly="" value="<?php echo $edit['nik_baru'] ?>" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10">
                                <input type="hidden" name="nik_lama" id="nik_lama" readonly="" value="<?php echo $edit['nik_lama'] ?>" class="form-control" placeholder="Enter Nama Karyawan" maxlength="10">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="nama_karyawan_mutasi" class="form-control" placeholder="Enter Nama Karyawan" readonly="" value="<?php echo $edit['nama_karyawan_mutasi'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Rekomendasi Tanggal 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="rekomendasi_tanggal" class="form-control" placeholder="Enter Nama Karyawan" readonly="" value="<?php echo DateToIndo($edit['rekomendasi_tanggal']) ?>">
                            </div>
                        </div>
                        <table align="center" class="table table-bordered">
                            <tr class="bg-primary">
                                <th> Data </th>
                                <th> Sebelum </th>
                                <th> Sesudah </th>
                            </tr>
                            <tr>
                                <td> Jabatan </td>
                                <td><?php echo $edit['jabatan_awal'] ?></td>
                                <td><?php echo $edit['jabatan_baru'] ?></td>
                            </tr>
                            <tr>
                                <td> Lokasi </td>
                                <td><?php echo $edit['lokasi_awal'] ?></td>
                                <td><?php echo $edit['lokasi_baru'] ?></td>
                            </tr>
                            <tr>
                                <td> Departement </td>
                                <td><?php echo $edit['dept_awal'] ?></td>
                                <td><?php echo $edit['dept_baru'] ?></td>
                            </tr>
                            <tr>
                                <td> PT </td>
                                <td><?php echo $edit['pt_awal'] ?></td>
                                <td><?php echo $edit['pt_baru'] ?></td>
                            </tr>
                            <tr>
                                <td> Level </td>
                                <td><?php echo $edit['level_awal'] ?></td>
                                <td><?php echo $edit['level_baru'] ?></td>
                            </tr>
                        </table>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            
                            </label>
                            <div class="col-md-6">
                                <input type="radio" name="tindakan" value="1">APPROVED
                                <input type="radio" name="tindakan" value="2">REJECT 
                                <input type="hidden" name="tanggal_approval" value="<?php echo date('Y-m-d h:i:s'); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <span class="glyphicon glyphicon-save"></span>SAVE</button> &nbsp;
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_mutasi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_MUTASI.handleSendData();
</script>