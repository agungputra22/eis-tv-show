<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('ptk/index_work_load') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-ptk" method="post" action="<?php echo site_url('ptk/doInput_ptk') ?>">
                    <div class="form-body">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr role="row" class="bg-primary">
                                    <th> Saldo </th>
                                    <th> Bulan </th>
                                    <th> Tahun </th>
                                </tr>
                            </thead>
                            <?php
                                $hasil = $edit['MPP_ACC'] - $edit['MPA'];
                                // $hasil = 20 - $edit['MPA'];
                                for ($i = 1; $i <= $hasil; $i++) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="hidden" name="no_jabatan" value="<?php echo $edit['no_jabatan_karyawan'] ?>">
                                            <input type="hidden" name="nik_baru" value="<?php echo users('nik_baru') ?>">
                                            <input type="text" name="saldo[]" class="form-control" readonly value="1">
                                        </td>
                                        <td>
                                            <select name="bulan[]" class="form-control">
                                                <option value="">-- Pilih Bulan --</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="tahun[]" class="form-control" readonly value="<?php echo date('Y', strtotime('+1 year', strtotime(date('Y')))); ?>">
                                        </td>
                                    </tr>
                                    <?php
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                <a href="<?php echo site_url('ptk/index_work_load') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/ptk.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.PTK.handleSendData();
</script>