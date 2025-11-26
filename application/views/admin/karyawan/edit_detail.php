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
                <form role="form" name="form_induk" class="form-horizontal form-induk" method="post" action="<?php echo site_url('karyawan/doUpdate_periode') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#induk">
                                <b>1. Data Induk</b>
                                </a>
                            </h3>
                        </div>
                        <div id="induk" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow induk" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">NIK
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nik_baru" readonly value="<?php echo $view_induk['nik_baru'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_lengkap" readonly value="<?php echo $view_induk['nama_lengkap'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" name="digit_ktp" class="form-control" required minlength="16" maxlength="16" value="<?php echo $view_induk['digit_ktp'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_ktp" class="form-control" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. NPWP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="digit_npwp" required minlength="15" maxlength="15" value="<?php echo $view_induk['digit_npwp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Ketenagakerjaan
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="digit_bpjs_ket" readonly value="<?php echo $view_induk['digit_bpjs_ket'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="digit_bpjs_kes" readonly value="<?php echo $view_induk['digit_bpjs_kes'] ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KK
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="digit_kk" required minlength="16" maxlength="16" value="<?php echo $view_induk['digit_kk'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" name="form_induk" class="form-horizontal form-detail" method="post" action="<?php echo site_url('karyawan/doUpdate_detail_periode') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#detail">
                                <b>2. Data Detail</b>
                                </a>
                            </h3>
                        </div>
                        <div id="detail" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow detail" >
                                        <div class="form-group">
                                            <input type="hidden" name="nik_baru" class="form-control" value="<?php echo $view_detail['nik_baru'] ?>">
                                            <input type="hidden" class="form-control" name="nik_baru_fix" readonly value="<?php echo $view_induk['nik_baru'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir" class="form-control" required value="<?php echo $view_detail['tanggal_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tempat_lahir" class="form-control" required value="<?php echo $view_detail['tempat_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin" value="Laki - Laki" <?php echo ($view_detail['jenis_kelamin']=='Laki - Laki')?'checked':'' ?> required="">Laki - Laki
                                                <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($view_detail['jenis_kelamin']=='Perempuan')?'checked':'' ?> >Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Pernikahan
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <select name="status_pernikahan" class="form-control" required>
                                                    <option><?php echo $view_detail['status_pernikahan'] ?></option>
                                                    <option>Belum Menikah</option>
                                                    <option>Menikah</option>
                                                    <option>Janda</option>
                                                    <option>Duda</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Sesuai KTP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_ktp" class="form-control" rows="5" required><?php echo $view_detail['alamat_ktp'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_telp" class="form-control" required value="<?php echo $view_detail['no_telp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Hp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp" class="form-control" required value="<?php echo $view_detail['no_hp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="email" class="form-control" required value="<?php echo $view_detail['email'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Domisili
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_domisili" class="form-control" rows="5" required><?php echo $view_detail['alamat_domisili'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form name="input_keluarga" id="input_keluarga" role="form" class="form-horizontal form-keluarga" method="post" action="<?php echo site_url('karyawan/doUpdate_keluarga_periode') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#keluarga">
                                <b>3. Data Keluarga</b>
                                </a>
                            </h3>
                        </div>
                        <div id="keluarga" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow keluarga" >
                                        <div class="form-group">
                                            <input type="hidden" name="nik_baru" class="form-control" value="<?php echo $view_suami_istri['nik_baru'] ?>">
                                            <input type="hidden" value="<?php echo $view_suami_istri['id_keluarga'] ?>" name="id_keluarga" id="id_keluarga" class="form-control" placeholder="Enter NIK Baru">
                                            <input type="hidden" class="form-control" name="nik_baru_fix" readonly value="<?php echo $view_induk['nik_baru'] ?>">
                                        </div>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Data Suami / Istri</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_keluarga" class="form-control" value="<?php echo $view_suami_istri['nama_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_ktp_keluarga" class="form-control" value="<?php echo $view_suami_istri['no_ktp_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_keluarga" class="form-control" value="<?php echo $view_suami_istri['tanggal_lahir_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tempat_lahir_keluarga" class="form-control" value="<?php echo $view_suami_istri['tempat_lahir_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Golongan Darah
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="gol_darah_keluarga" class="form-control">
                                                    <option><?php echo $view_suami_istri['gol_darah_keluarga'] ?></option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>AB</option>
                                                    <option>O</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agama
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="agama_keluarga" class="form-control">
                                                    <option><?php echo $view_suami_istri['agama_keluarga'] ?></option>
                                                    <option>Islam</option>
                                                    <option>Kristen</option>
                                                    <option>Khatolik</option>
                                                    <option>Budha</option>
                                                    <option>Hindu</option>
                                                    <option>Khong Huchu</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Suku Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="suku_keluarga" class="form-control" value="<?php echo $view_suami_istri['suku_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="kewarganegaraan_keluarga" value="WNI" <?php echo ($view_suami_istri['kewarganegaraan_keluarga']=='WNI')?'checked':'' ?> required="" checked>WNI
                                                <input type="radio" name="kewarganegaraan_keluarga" value="WNA" <?php echo ($view_suami_istri['kewarganegaraan_keluarga']=='WNA')?'checked':'' ?> >WNA
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_keluarga" class="form-control">
                                                  <option><?php echo $view_suami_istri['pendidikan_keluarga'] ?></option>
                                                  <option>SD</option>
                                                  <option>SMP/MTS</option>
                                                  <option>SMK/SMA/MA</option>
                                                  <option>S1</option>
                                                  <option>S2</option>
                                                  <option>S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Data Anak</span>
                                        </div>
                                        <div class="input-group control-group after-add-more">
                                        <table class="table table-bordered" id="dynamic_field_anak">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> NO. </th>
                                                    <th> Anak Ke </th>
                                                    <th> Nama Lengkap </th>
                                                    <th> No. KTP </th>
                                                    <th> Tanggal Lahir </th>
                                                    <th> Tempat Lahir </th>
                                                    <th> Golongan Darah </th>
                                                    <th> Agama </th>
                                                    <th> Suku </th>
                                                    <th> Kewarganegaraan </th>
                                                    <th> pendidikan Terakhir </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_anak as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['urutan_anak'] ?> </td>
                                                <td> <?php echo $row['nama_anak'] ?> </td>
                                                <td> <?php echo $row['no_ktp_anak'] ?> </td>
                                                <td> <?php echo $row['tanggal_lahir_anak'] ?> </td>
                                                <td> <?php echo $row['tempat_lahir_anak'] ?> </td>
                                                <td> <?php echo $row['gol_darah_anak'] ?> </td>
                                                <td> <?php echo $row['agama_anak'] ?> </td>
                                                <td> <?php echo $row['suku_anak'] ?> </td>
                                                <td> <?php echo $row['kewarganegaraan_anak'] ?> </td>
                                                <td> <?php echo $row['pendidikan_anak'] ?> </td>
                                                <td> </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td width="20">
                                                    <input type="text" name="urutan_anak[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="nama_anak[]" class="form-control" placeholder="Enter Nama Lengkap" >
                                                </td>
                                                <td>
                                                    <input type="text" name="no_ktp_anak[]" class="form-control" placeholder="Enter No. KTP" maxlength="16">
                                                </td>
                                                <td>
                                                    <input type="date" name="tanggal_lahir_anak[]" class="form-control" placeholder="Enter NIK Baru" >
                                                </td>
                                                <td>
                                                    <input type="text" name="tempat_lahir_anak[]" class="form-control" placeholder="Enter Tempat Lahir" >
                                                </td>
                                                <td>
                                                    <select name="gol_darah_anak[]"" class="form-control">
                                                        <option>-- Pilih Golongan --</option>
                                                        <option>A</option>
                                                        <option>B</option>
                                                        <option>AB</option>
                                                        <option>O</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="agama_anak[]" class="form-control">
                                                        <option>-- Pilih Agama --</option>
                                                        <option>Islam</option>
                                                        <option>Kristen</option>
                                                        <option>Khatolik</option>
                                                        <option>Budha</option>
                                                        <option>Hindu</option>
                                                        <option>Khong Huchu</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="suku_anak[]" class="form-control" placeholder="Enter Suku">
                                                </td>
                                                <td>
                                                    <select name="kewarganegaraan_anak[]" class="form-control">
                                                        <option>-- Pilih Kewarganegaraan --</option>
                                                        <option>WNI</option>
                                                        <option>WNA</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="pendidikan_anak[]" class="form-control">
                                                      <option>-- Pilih Pendidikan --</option>
                                                      <option>SD</option>
                                                      <option>SMP/MTS</option>
                                                      <option>SMK/SMA/MA</option>
                                                      <option>S1</option>
                                                      <option>S2</option>
                                                      <option>S3</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" name="add_anak" id="add_anak" class="btn btn-success">+</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Susunan Keluarga</span>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" name="nik_baru_susunan_keluarga" class="form-control" value="<?php echo $view_susunan_keluarga['nik_baru'] ?>">
                                                <input type="hidden" value="<?php echo $view_susunan_keluarga['id_susunan'] ?>" name="id_susunan" id="id_susunan" class="form-control" placeholder="Enter NIK Baru">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Ayah </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ayah Kandung
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_ayah" class="form-control" required value="<?php echo $view_susunan_keluarga['nama_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ayah" class="form-control" required value="<?php echo $view_susunan_keluarga['tanggal_lahir_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                            <span class="font-red">*</span>            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin_ayah" value="Laki - Laki" checked>Laki - Laki
                                                <input type="radio" name="jenis_kelamin_ayah" value="Perempuan">Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="pekerjaan_ayah" class="form-control" required value="<?php echo $view_susunan_keluarga['pekerjaan_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ayah" class="form-control" required>
                                                  <option><?php echo $view_susunan_keluarga['pendidikan_ayah'] ?></option>
                                                  <option>SD</option>
                                                  <option>SMP/MTS</option>
                                                  <option>SMK/SMA/MA</option>
                                                  <option>S1</option>
                                                  <option>S2</option>
                                                  <option>S3</option>
                                                </select>
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Ibu </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ibu Kandung
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_ibu" class="form-control" required value="<?php echo $view_susunan_keluarga['nama_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ibu" class="form-control" required value="<?php echo $view_susunan_keluarga['tanggal_lahir_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                            <span class="font-red">*</span>  
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin_ibu" value="Laki - Laki">Laki - Laki
                                                <input type="radio" name="jenis_kelamin_ibu" value="Perempuan" checked>Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="pekerjaan_ibu" class="form-control" required value="<?php echo $view_susunan_keluarga['pekerjaan_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ibu" class="form-control" required>
                                                  <option><?php echo $view_susunan_keluarga['pendidikan_ibu'] ?></option>
                                                  <option>SD</option>
                                                  <option>SMP/MTS</option>
                                                  <option>SMK/SMA/MA</option>
                                                  <option>S1</option>
                                                  <option>S2</option>
                                                  <option>S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Kontak Darurat</span>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" name="nik_baru_darurat" class="form-control" value="<?php echo $view_darurat['nik_baru'] ?>">
                                                <input type="hidden" value="<?php echo $view_darurat['id_darurat'] ?>" name="id_darurat" id="id_darurat" class="form-control" placeholder="Enter NIK Baru">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_darurat" class="form-control" required value="<?php echo $view_darurat['nama_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp / Hp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp_darurat" class="form-control" required value="<?php echo $view_darurat['no_hp_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="alamat_darurat">Alamat
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_darurat" class="form-control" id="alamat_darurat" required rows="3" ><?php echo $view_darurat['alamat_darurat'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-pendidikan" method="post" action="<?php echo site_url('karyawan/doUpdate_pendidikan_periode') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#pendidikan">
                                <b>4. Data Pendidikan</b>
                                </a>
                            </h3>
                        </div>
                        <div id="pendidikan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow pendidikan" >
                                        <div class="form-group">
                                            <input type="hidden" name="nik_baru" class="form-control" value="<?php echo $view_detail['nik_baru'] ?>">
                                            <input type="hidden" value="<?php echo $view_pendidikan['id_pendidikan'] ?>" name="id_pendidikan" id="id_pendidikan" class="form-control" placeholder="Enter NIK Baru">
                                            <input type="hidden" class="form-control" name="nik_baru_fix" readonly value="<?php echo $view_induk['nik_baru'] ?>">
                                        </div>

                                        <ul>
                                            <li> Sekolah Dasar </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_sd" value="Normal" <?php echo ($view_pendidikan['status_sd']=='Normal')?'checked':'' ?> required="" checked>Normal
                                                <input type="radio" name="status_sd" value="Paket" <?php echo ($view_pendidikan['status_sd']=='Paket')?'checked':'' ?> >Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_sd" value="<?php echo $view_pendidikan['nama_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_sd" value="<?php echo $view_pendidikan['tahun_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_sd" value="Lulus" <?php echo ($view_pendidikan['ket_sd']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_sd" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_sd']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nilai_sd" value="<?php echo $view_pendidikan['nilai_sd'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Pertama </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_smp" value="Normal" <?php echo ($view_pendidikan['status_smp']=='Normal')?'checked':'' ?> required="" checked>Normal
                                                <input type="radio" name="status_smp" value="Paket" <?php echo ($view_pendidikan['status_smp']=='Paket')?'checked':'' ?> >Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_smp" value="<?php echo $view_pendidikan['nama_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_smp" value="<?php echo $view_pendidikan['tahun_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_smp" value="Lulus" <?php echo ($view_pendidikan['ket_smp']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_smp" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_smp']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nilai_smp" value="<?php echo $view_pendidikan['nilai_smp'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Atas / Kejuruan </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_smk" value="Normal" <?php echo ($view_pendidikan['status_smk']=='Normal')?'checked':'' ?> required="" checked>Normal
                                                <input type="radio" name="status_smk" value="Paket" <?php echo ($view_pendidikan['status_smk']=='Paket')?'checked':'' ?> >Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_smk" value="<?php echo $view_pendidikan['nama_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="jurusan_smk" value="<?php echo $view_pendidikan['jurusan_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_smk" value="<?php echo $view_pendidikan['tahun_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_smk" value="Lulus" <?php echo ($view_pendidikan['ket_smk']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_smk" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_smk']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nilai_smk" value="<?php echo $view_pendidikan['nilai_smk'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Universitas / Institut / Sekolah Tinggi </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            </label>
                                            <div class="col-md-4">
                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="laptop" data-toggle="collapse" data-target="#diploma" aria-expanded="false" aria-controls="diploma"> Diploma

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="komputer" data-toggle="collapse" data-target="#sarjana1" aria-expanded="false" aria-controls="sarjana1"> Strata 1

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Handphone" data-toggle="collapse" data-target="#sarjana2" aria-expanded="false" aria-controls="sarjana2"> Strata 2

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Mouse" data-toggle="collapse" data-target="#sarjana3" aria-expanded="false" aria-controls="sarjana3"> Strata 3
                                            </div>
                                        </div>

                                    <div class="collapse" id="diploma">
                                    <div class="card card-body">
                                        <ul>
                                            <li> Diploma </li>
                                        </ul>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_st" value="<?php echo $view_pendidikan['nama_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="jurusan_st" value="<?php echo $view_pendidikan['jurusan_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_st" value="<?php echo $view_pendidikan['tahun_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_st" value="Lulus" <?php echo ($view_pendidikan['ket_st']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_st" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_st']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ipk_st" value="<?php echo $view_pendidikan['ipk_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="tingkat_st" class="form-control">
                                                    <option value=""><?php echo $view_pendidikan['tingkat_st'] ?></option>
                                                    <option>D1</option>
                                                    <option>D2</option>
                                                    <option>D3</option>
                                                    <option>D4</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="collapse" id="sarjana1">
                                    <div class="card card-body">
                                        <ul>
                                            <li> Strata 1 </li>
                                        </ul>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_s1" value="<?php echo $view_pendidikan['nama_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="jurusan_s1" value="<?php echo $view_pendidikan['jurusan_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_s1" value="<?php echo $view_pendidikan['tahun_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s1" value="Lulus" <?php echo ($view_pendidikan['ket_s1']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_s1" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_s1']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ipk_s1" value="<?php echo $view_pendidikan['ipk_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tingkat_s1" value="<?php echo $view_pendidikan['tingkat_s1'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="collapse" id="sarjana2">
                                    <div class="card card-body">
                                        <ul>
                                            <li> Strata 2 </li>
                                        </ul>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_s2" value="<?php echo $view_pendidikan['nama_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="jurusan_s2" value="<?php echo $view_pendidikan['jurusan_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_s2" value="<?php echo $view_pendidikan['tahun_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s2" value="Lulus" <?php echo ($view_pendidikan['ket_s2']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_s2" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_s2']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ipk_s2" value="<?php echo $view_pendidikan['ipk_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tingkat_s2" value="<?php echo $view_pendidikan['tingkat_s2'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="collapse" id="sarjana3">
                                    <div class="card card-body">
                                        <ul>
                                            <li> Strata 3 </li>
                                        </ul>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_s3" value="<?php echo $view_pendidikan['nama_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="jurusan_s3" value="<?php echo $view_pendidikan['jurusan_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tahun_s3" value="<?php echo $view_pendidikan['tahun_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s3" value="Lulus" <?php echo ($view_pendidikan['ket_s3']=='Lulus')?'checked':'' ?> required="" checked>Lulus
                                                <input type="radio" name="ket_s3" value="Tidak Lulus" <?php echo ($view_pendidikan['ket_s3']=='Tidak Lulus')?'checked':'' ?> >Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="ipk_s3" value="<?php echo $view_pendidikan['ipk_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="tingkat_s3" value="<?php echo $view_pendidikan['tingkat_s3'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>                
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN.handleSendData_editperiode('.form-induk');
    window.KARYAWAN.handleSendData_editperiode('.form-detail');
    window.KARYAWAN.handleSendData_editperiode('.form-keluarga');
    window.KARYAWAN.handleSendData_editperiode('.form-pendidikan', true);

    // Memunculkan Nama Atasan
    $("#dept_struktur").change(function () {
          if ($(this).val() != "") {
          var dept_struktur=$('#dept_struktur').val();
            $.ajax({
                url: "<?=base_url('karyawan/tampil_atasan')?>",
                method: "POST",
                data: { 'dept_struktur': dept_struktur },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[name='nama_atasan_struktur']").val(value.nama_atasan);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Perusahaan
    $("#perusahaan_struktur").change(function () {
          if ($(this).val() != "") {
          var perusahaan_struktur=$('#perusahaan_struktur').val();
            $.ajax({
                url: "<?=base_url('karyawan/tampil_kode_perusahaan')?>",
                method: "POST",
                data: { 'perusahaan_struktur': perusahaan_struktur },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_perusahaan_struktur']").val(value.kode_perusahaan);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Lokasi
    $("#lokasi_struktur").change(function () {
          if ($(this).val() != "") {
          var lokasi_struktur=$('#lokasi_struktur').val();
            $.ajax({
                url: "<?=base_url('karyawan/tampil_kode_lokasi')?>",
                method: "POST",
                data: { 'lokasi_struktur': lokasi_struktur },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_lokasi_struktur']").val(value.kode_nik_depo);
                    });
                },
            });
          }
     })

    // Data Anak
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_keluarga')?>";
      var i=1;  


      $('#add_anak').click(function(){  
           i++;  
           $('#dynamic_field_anak').append('<tr id="row'+i+'" class="dynamic-added_anak"><td></td><td><input type="text" name="urutan_anak[]" class="form-control"><td><input type="text" name="nama_anak[]" class="form-control" placeholder="Enter Nama Lengkap" ><td><input type="text" name="no_ktp_anak[]" class="form-control" placeholder="Enter No. KTP" maxlength="16"><td><input type="date" name="tanggal_lahir_anak[]" class="form-control" placeholder="Enter NIK Baru" ><td><input type="text" name="tempat_lahir_anak[]" class="form-control" placeholder="Enter Tempat Lahir" ><td><select name="gol_darah_anak[]"" class="form-control"><option>-- Pilih Golongan --</option><option>A</option><option>B</option><option>AB</option><option>O</option></select><td><select name="agama_anak[]" class="form-control"><option>-- Pilih Agama --</option><option>Islam</option><option>Kristen</option><option>Khatolik</option><option>Budha</option><option>Hindu</option><option>Khong Huchu</option></select><td><input type="text" name="suku_anak[]" class="form-control" placeholder="Enter Suku"><td><select name="kewarganegaraan_anak[]" class="form-control"><option>-- Pilih Kewarganegaraan --</option><option>WNI</option><option>WNA</option></select><td><select name="pendidikan_anak[]" class="form-control"><option>-- Pilih Pendidikan --</option><option>SD</option><option>SMP/MTS</option><option>SMK/SMA/MA</option><option>S1</option><option>S2</option><option>S3</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_keluarga').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_anak').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });  

    // Data Saudara
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_keluarga')?>";
      var i=1;  


      $('#add_saudara').click(function(){  
           i++;  
           $('#dynamic_field_saudara').append('<tr id="row'+i+'" class="dynamic-added_saudara"><td></td><td><input type="text" name="urutan_saudara[]" class="form-control"><td><input type="text" name="nama_saudara[]" class="form-control" placeholder="Enter Nama Lengkap" ><td><input type="date" name="tanggal_lahir_saudara[]" class="form-control" placeholder="Enter NIK Baru" ><td><select name="jenis_kelamin_saudara[]" class="form-control"><option>-- Pilih Kelamin --</option><option>Laki - Laki</option><option>Perempuan</option></select><td><input type="text" name="pekerjaan_saudara[]" class="form-control" placeholder="Enter Pekerjaan" ><td><select name="pendidikan_saudara[]" class="form-control"><option>-- Pilih Pendidikan --</option><option>SD</option><option>SMP/MTS</option><option>SMK/SMA/MA</option><option>S1</option><option>S2</option><option>S3</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_keluarga').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_saudara').remove();
                    $('#input_keluarga')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });  
</script>