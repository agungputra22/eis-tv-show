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
                <form role="form" class="form-horizontal form-resign-serah-terima" method="post" action="<?php echo site_url('resign/doUpdate_serah_terima') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">Nama Lengkap 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-3">
                                <input type="text" name="" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $edit['nama_karyawan_struktur'] ?>">
                                <input type="hidden" name="level_role" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $resign['level_role'] ?>">
                                <input type="hidden" name="status_penerima" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $resign['status_penerima'] ?>">
                                <input type="hidden" name="id" class="form-control" placeholder="Enter Nama" required="required" readonly="" value="<?php echo $resign['id'] ?>">
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
                        <br><br>
                        <div class="form-group">
                            <label class="col-md-2 control-label bold">YANG DISERAHKAN :</label>
                        </div>
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">A. ALAT KERJA & INVENTARIS</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <td align="center"> NO. </td>
                                    <td align="center"> ITEM ALAT KERJA </td>
                                    <td align="center"> JUMLAH </td>
                                    <td align="center"> SATUAN </td>
                                    <td align="center"> KONDISI </td>
                                    <td align="center"> KETERANGAN </td>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($serah_terima1 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['alat_kerja'] ?> </td>
                                <td> <?php echo $row['jumlah_alat_kerja'] ?> </td>
                                <td> <?php echo $row['satuan_alat_kerja'] ?> </td>
                                <td> <?php echo $row['kondisi_alat_kerja'] ?> </td>
                                <td> <?php echo $row['keterangan_alat_kerja'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">B. DOKUMEN</label>
                        </div>
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">HARDCOPY</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_daily">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <td align="center"> NO. </td>
                                    <td align="center"> NAMA DOKUMEN & NO DOKUMEN </td>
                                    <td align="center"> JUMLAH </td>
                                    <td align="center"> SATUAN </td>
                                    <td align="center"> TEMPAT </td>
                                    <td align="center"> KETERANGAN </td>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($serah_terima2 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['nama_hardcopy'] ?> </td>
                                <td> <?php echo $row['jumlah_hardcopy'] ?> </td>
                                <td> <?php echo $row['satuan_hardcopy'] ?> </td>
                                <td> <?php echo $row['tempat_hardcopy'] ?> </td>
                                <td> <?php echo $row['keterangan_hardcopy'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">SOFTCOPY</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_weekly">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <td rowspan="2" align="center"> NO. </td>
                                    <td rowspan="2" align="center"> NAMA FILE </td>
                                    <td colspan="2" align="center"> PENYIMPANAN </td>
                                    <td rowspan="2" align="center"> KETERANGAN </td>
                                </tr>
                                <tr role="row" class="bg-danger">
                                    <td align="center">NO PC</td>
                                    <td align="center">JENIS PENYIMPANAN</td>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($serah_terima3 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['nama_softcopy'] ?> </td>
                                <td> <?php echo $row['no_software'] ?> </td>
                                <td> <?php echo $row['jenis_software'] ?> </td>
                                <td> <?php echo $row['keterangan_software'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>

                        <h5><span class="font-red">*Hanya untuk Kepala Departemen diserahterimakan ke MIS (Coret salah satu di keterangan)</span></h5>
                        &nbsp;
                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">C. PROJECT</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_monthly">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <td align="center"> NO. </td>
                                    <td align="center"> NAMA PROJECT </td>
                                    <td align="center"> SDM YANG TERLIBAT </td>
                                    <td align="center"> HASIL </td>
                                    <td align="center"> OUTSTANDING </td>
                                    <td align="center"> DEADLINE </td>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($serah_terima4 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['nama_project'] ?> </td>
                                <td> <?php echo $row['sdm_project'] ?> </td>
                                <td> <?php echo $row['hasil_project'] ?> </td>
                                <td> <?php echo $row['outstanding_project'] ?> </td>
                                <td> <?php echo $row['deadline_project'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>

                        <div class="form-group">
                            &nbsp;&nbsp;&nbsp;&nbsp;<label class="control-label bold">D. SDM</label>
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="datatables_resiko">
                            <thead>
                                <tr role="row" class="bg-danger">
                                    <td rowspan="3" align="center"> NO. </td>
                                    <td rowspan="3" align="center"> JABATAN </td>
                                    <td rowspan="3" align="center"> JUMLAH </td>
                                    <td rowspan="3" align="center"> JENIS KELAMIN </td>
                                    <td colspan="6" align="center"> SEDANG DALAM PROSES </td>
                                    <td rowspan="3" align="center"> KETERANGAN </td>
                                </tr>
                                <tr role="row" class="bg-danger">
                                    <td align="center" rowspan="2"> PROMOSI </td>
                                    <td align="center" rowspan="2"> MUTASI </td>
                                    <td align="center" rowspan="2"> DEMOSI </td>
                                    <td colspan="3" align="center"> SURAT PERINGATAN </td>
                                </tr>
                                <tr role="row" class="bg-danger">
                                    <td align="center"> 1 </td>
                                    <td align="center"> 2 </td>
                                    <td align="center"> 3 </td>
                                </tr>
                            </thead>
                            <tbody> 
                            <?php
                            $no = 1;
                            foreach ($serah_terima5 as $row) {
                            ?>
                            <tr>
                                <td> <?php echo $no ?> </td>
                                <td> <?php echo $row['jabatan_sdm'] ?> </td>
                                <td> <?php echo $row['jumlah_sdm'] ?> </td>
                                <td> <?php echo $row['jenis_kelamin_sdm'] ?> </td>
                                <td> <?php echo $row['promosi_sdm'] ?> </td>
                                <td> <?php echo $row['mutasi_sdm'] ?> </td>
                                <td> <?php echo $row['demosi_sdm'] ?> </td>
                                <td> <?php echo $row['sp1_sdm'] ?> </td>
                                <td> <?php echo $row['sp2_sdm'] ?> </td>
                                <td> <?php echo $row['sp3_sdm'] ?> </td>
                                <td> <?php echo $row['keterangan_sdm'] ?> </td>
                            </tr>
                            <?php
                            $no++;
                            }
                            ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Apakah Form Serah Terima Sudah Sesuai ? 
                            <span class="font-red">*</span>
                            </label>
                            <div class="col-md-4">
                                <input type="radio" name="status" value="1" required>Sudah Sesuai &nbsp; &nbsp;
                                <input type="radio" name="status" value="2">Tidak Sesuai
                            </div>
                        </div>

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
    window.RESIGN.initTable();
    window.RESIGN.initTableDaily();
    window.RESIGN.initTableWeekly();
    window.RESIGN.initTableMonthly();
    window.RESIGN.initTableResiko();
    window.RESIGN.handleSendDataUpdate();
</script>