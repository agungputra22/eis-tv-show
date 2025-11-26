<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('historical_mutasi/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" class="form-horizontal form-historical_mutasi" method="post" action="<?php echo site_url('historical_mutasi/tindakan') ?>">
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

                        <div class="form-group">
                            <label class="col-md-2 control-label">Tanggal Efektif 
                            
                            </label>
                            <div class="col-md-3">
                                <input type="date" name="tanggal_efektif" class="form-control">
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
                        <hr>
                        <div class="caption">
                            <center><span class="caption-subject font-dark sbold uppercase">Detail History Karyawan</span></center>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label class="col-md-2 control-label">Absensi
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-8">
                                <table align="center" class="table table-bordered">
                                    <tr class="bg-primary">
                                        <th> Alpha </th>
                                        <th> Sakit </th>
                                        <th> CDT </th>
                                        <th> Telat </th>
                                    </tr>
                                    <tr>
                                        <td><?php echo $absen['alpha'] ?></td>
                                        <td><?php echo $absen['sakit'] ?></td>
                                        <td><?php echo $absen['cdt'] ?></td>
                                        <td><?php echo $absen['tl'] ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Punishment
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-8">
                                <table align="center" class="table table-bordered">
                                    <tr class="bg-primary">
                                        <th> Jenis </th>
                                        <th> Tanggal Awal </th>
                                        <th> Tanggal Berakhir </th>
                                        <th> Kategori Sanksi </th>
                                        <th> Keterangan Tambahan</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Performance
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-8">
                                <table align="center" class="table table-bordered">
                                    <tr class="bg-primary">
                                        <th> KPI </th>
                                        <th> QO </th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-2 control-label">Coaching & Counseling
                            <!-- <span class="font-red">*</span> -->
                            </label>
                            <div class="col-md-8">
                                <table align="center" class="table table-bordered">
                                    <tr class="bg-primary">
                                        <th> Tanggal </th>
                                        <th> Penyebab </th>
                                        <th> Hasil Coaching & Counseling</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <hr>
                        <div class="caption">
                            <center><span class="caption-subject font-dark sbold uppercase">Proses Selanjutnya</span></center>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Surat yang dikeluarkan
                            
                            </label>
                            <div class="col-md-6">
                                <input type="checkbox" data-toggle="collapse" data-target="#surat_penugasan" aria-expanded="false" aria-controls="surat_penugasan"> Surat Penugasan
                                <input type="checkbox" data-toggle="collapse" data-target="#surat_pjs" aria-expanded="false" aria-controls="surat_pjs"> Surat PJS
                                <input type="checkbox" data-toggle="collapse" data-target="#surat_keterangan" aria-expanded="false" aria-controls="surat_keterangan"> Surat Keterangan
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tindakan
                            
                            </label>
                            <div class="col-md-6">
                                <input type="radio" name="tindakan" value="1">APPROVED
                                <input type="radio" name="tindakan" value="2">REJECT 
                            </div>
                        </div>

                        <div class="collapse" id="surat_penugasan">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Surat Penugasan
                            
                                    </label>

                                    <div class="col-md-4">
                                        <table align="center" class="table table-bordered">
                                            <tr class="bg-primary">
                                                <th> No. Surat Penugasan </th>
                                                <th> Tanggal Efektif </th>
                                                <th> Tanggal Berakhir</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <input type="checkbox" data-toggle="collapse" data-target="#perpanjang_surat_penugasan" aria-expanded="false" aria-controls="perpanjang_surat_penugasan"> Perpanjang
                                    </div>
                                    <div class="collapse" id="perpanjang_surat_penugasan">
                                        <div class="card card-body">
                                            <div class="col-md-4">
                                                <table align="center" class="table table-bordered">
                                                    <tr class="bg-primary">
                                                        <th> No. Surat Penugasan </th>
                                                        <th> Tanggal Efektif </th>
                                                        <th> Tanggal Berakhir</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                            
                                    </label>

                                    <div class="col-md-4">
                                        <a href="<?php echo site_url('historical_mutasi/penugasan/'.$edit['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print </a> &nbsp;
                                        Upload Dokumen 
                                        <input type="file" name="dokumen_penugasan" class="form-control" placeholder="Enter ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="surat_pjs">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Surat Penunjukan
                            
                                    </label>

                                    <div class="col-md-4">
                                        <table align="center" class="table table-bordered">
                                            <tr class="bg-primary">
                                                <th> No. Surat Penunjukan (Pjs) </th>
                                                <th> Tanggal Efektif </th>
                                                <th> Tanggal Berakhir</th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                        <input type="checkbox" data-toggle="collapse" data-target="#perpanjang_surat_pjs" aria-expanded="false" aria-controls="perpanjang_surat_pjs"> Perpanjang
                                    </div>
                                    <div class="collapse" id="perpanjang_surat_pjs">
                                        <div class="card card-body">
                                            <div class="col-md-4">
                                                <table align="center" class="table table-bordered">
                                                    <tr class="bg-primary">
                                                        <th> No. Surat Penunjukan (Pjs) </th>
                                                        <th> Tanggal Efektif </th>
                                                        <th> Tanggal Berakhir</th>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                            
                                    </label>

                                    <div class="col-md-4">
                                        <a href="<?php echo site_url('historical_mutasi/penunjukan/'.$edit['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print </a> &nbsp;
                                        Upload Dokumen 
                                        <input type="file" name="dokumen_pjs" class="form-control" placeholder="Enter ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="surat_keterangan">
                            <div class="card card-body">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Surat Keterangan
                            
                                    </label>

                                    <div class="col-md-4">
                                        <table align="center" class="table table-bordered">
                                            <tr class="bg-primary">
                                                <th> No. Surat Keterangan </th>
                                                <th> Tanggal Efektif </th>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                            
                                    </label>

                                    <div class="col-md-4">
                                        <a href="<?php echo site_url('historical_mutasi/keterangan/'.$edit['id_mutasi_rotasi']) ?>" target='_blank' class="btnList btn btn-circle green btn-outline btn-sm"> 
                                        <i class="fa fa-print"></i> Print </a> &nbsp;
                                        Upload Dokumen 
                                        <input type="file" name="dokumen_keterangan" class="form-control" placeholder="Enter ">
                                    </div>
                                </div>
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
    window.HISTORICAL_MUTASI.handleDeleteData();
    window.HISTORICAL_MUTASI.handleSendData();

    $("#nik_baru").change(function () {
          if ($(this).val() != "") {
          var nik_baru=$('#nik_baru').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil')?>",
                method: "POST",
                data: { 'nik_baru': nik_baru },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_karyawan_mutasi']").val(value.nama_karyawan_struktur);
                    });
                },
            });
          }
     })
</script>