<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('karyawan/index') ?>" class="btnList btn btn-circle green btn-outline btn-sm ajaxify"> 
                        <i class="fa fa-bars"></i> List Data </a>
                </div>
            </div>
            <div class="portlet-body">
                <form role="form" name="form_induk" class="form-horizontal form-induk" method="post" action="<?php echo site_url('karyawan/doUpdate') ?>" enctype="multipart/form-data">
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_induk['userid'] ?>" name="userid" id="userid" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="text" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#nik_lama" aria-expanded="false" aria-controls="nik_lama"> NIK Lama
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="collapse" id="nik_lama">
                                                <div class="card card-body">
                                                    <div class="form-group">
                                                        <div class="col-md-4">
                                                            <input type="text" name="nik_lama" class="form-control" value="<?php echo $view_induk['nik_lama'] ?>" readonly placeholder="Enter NIK Lama">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="nama_lengkap" readonly value="<?php echo $view_induk['nama_lengkap'] ?>">
                                                <input type="hidden" class="form-control" name="no_urut" readonly value="<?php echo $view_induk['no_urut'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_ktp" class="form-control" minlength="16" maxlength="16" value="<?php echo $view_induk['digit_ktp'] ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. NPWP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_npwp" minlength="15" maxlength="15" value="<?php echo $view_induk['digit_npwp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Ketenagakerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_ket" value="<?php echo $view_induk['digit_bpjs_ket'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_kes" value="<?php echo $view_induk['digit_bpjs_kes'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Suami / Istri
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_kes_suami_istri" value="<?php echo $view_induk['digit_bpjs_kes_suami_istri'] ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -1
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_kes_anak_1" value="<?php echo $view_induk['digit_bpjs_kes_anak_1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -2
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_kes_anak_2" value="<?php echo $view_induk['digit_bpjs_kes_anak_2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -3
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_bpjs_kes_anak_3" value="<?php echo $view_induk['digit_bpjs_kes_anak_3'] ?>" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="digit_kk" minlength="16" maxlength="16" value="<?php echo $view_induk['digit_kk'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" name="form_induk" class="form-horizontal form-detail" method="post" action="<?php echo site_url('karyawan/doUpdate_detail') ?>" enctype="multipart/form-data">
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_detail['id_detail'] ?>" name="id_detail" id="id_detail" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $view_detail['tanggal_lahir'] ?>">
                                                <input type="hidden" name="no_urut" class="form-control" value="<?php echo $view_induk['no_urut'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tempat_lahir" class="form-control" value="<?php echo $view_detail['tempat_lahir'] ?>">
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
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="status_pernikahan" class="form-control">
                                                    <option><?php echo $view_detail['status_pernikahan'] ?></option>
                                                    <option>Belum Menikah</option>
                                                    <option>Menikah</option>
                                                    <option>Janda</option>
                                                    <option>Duda</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Golongan Darah
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="gol_darah" class="form-control">
                                                    <option><?php echo $view_detail['gol_darah'] ?></option>
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
                                                <select name="agama" class="form-control">
                                                    <option><?php echo $view_detail['agama'] ?></option>
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
                                            <label class="col-md-3 control-label">Suku
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="suku" class="form-control" value="<?php echo $view_detail['suku'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tinggi Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tinggi_badan" class="form-control" value="<?php echo $view_detail['tinggi_badan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Berat Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="berat_badan" class="form-control" value="<?php echo $view_detail['berat_badan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="kewarganegaraan" value="WNI" <?php echo ($view_detail['kewarganegaraan']=='WNI')?'checked':'' ?> required="">WNI
                                                <input type="radio" name="kewarganegaraan" value="WNA" <?php echo ($view_detail['kewarganegaraan']=='WNA')?'checked':'' ?> >WNA
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Sesuai KTP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_ktp" class="form-control" rows="5" ><?php echo $view_detail['alamat_ktp'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_telp" class="form-control" value="<?php echo $view_detail['no_telp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Hp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp" class="form-control" value="<?php echo $view_detail['no_hp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="email" class="form-control" value="<?php echo $view_detail['email'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Domisili
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_domisili" class="form-control" rows="5" ><?php echo $view_detail['alamat_domisili'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form name="input_keluarga" id="input_keluarga" role="form" class="form-horizontal form-keluarga" method="post" action="<?php echo site_url('karyawan/doUpdate_keluarga') ?>" enctype="multipart/form-data">
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_suami_istri['id_keluarga'] ?>" name="id_keluarga" id="id_keluarga" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Data Suami / Istri</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_keluarga" class="form-control" value="<?php echo $view_suami_istri['nama_keluarga'] ?>">
                                                <input type="hidden" name="no_urut" class="form-control" value="<?php echo $view_induk['no_urut'] ?>">
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
                                                <input type="hidden" value="<?php echo $view_susunan_keluarga['id_susunan'] ?>" name="id_susunan" id="id_susunan" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Ayah </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ayah Kandung
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_ayah" class="form-control" value="<?php echo $view_susunan_keluarga['nama_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ayah" class="form-control" value="<?php echo $view_susunan_keluarga['tanggal_lahir_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin_ayah" value="Laki - Laki" checked>Laki - Laki
                                                <input type="radio" name="jenis_kelamin_ayah" value="Perempuan">Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="pekerjaan_ayah" class="form-control" value="<?php echo $view_susunan_keluarga['pekerjaan_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ayah" class="form-control">
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
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_ibu" class="form-control" value="<?php echo $view_susunan_keluarga['nama_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ibu" class="form-control" value="<?php echo $view_susunan_keluarga['tanggal_lahir_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin_ibu" value="Laki - Laki">Laki - Laki
                                                <input type="radio" name="jenis_kelamin_ibu" value="Perempuan" checked>Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="pekerjaan_ibu" class="form-control" value="<?php echo $view_susunan_keluarga['pekerjaan_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ibu" class="form-control">
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

                                        <ul>
                                            <li> Saudara </li>
                                        </ul>

                                        <table class="table table-bordered" id="dynamic_field_saudara">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> NO. </th>
                                                    <th> Saudara Ke</th>
                                                    <th> Nama Lengkap </th>
                                                    <th> Tanggal Lahir </th>
                                                    <th> Jenis Kelamin </th>
                                                    <th> Pekerjaan </th>
                                                    <th> pendidikan Terakhir </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_saudara as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['urutan_saudara'] ?> </td>
                                                <td> <?php echo $row['nama_saudara'] ?> </td>
                                                <td> <?php echo $row['tanggal_lahir_saudara'] ?> </td>
                                                <td> <?php echo $row['jenis_kelamin_saudara'] ?> </td>
                                                <td> <?php echo $row['pekerjaan_saudara'] ?> </td>
                                                <td> <?php echo $row['pendidikan_saudara'] ?> </td>
                                                <td> </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td width="20">
                                                    <input type="text" name="urutan_saudara[]" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="nama_saudara[]" class="form-control" placeholder="Enter Nama Lengkap" >
                                                </td>
                                                <td>
                                                    <input type="date" name="tanggal_lahir_saudara[]" class="form-control" placeholder="Enter NIK Baru" >
                                                </td>
                                                <td>
                                                    <select name="jenis_kelamin_saudara[]" class="form-control">
                                                        <option>-- Pilih Kelamin --</option>
                                                        <option>Laki - Laki</option>
                                                        <option>Perempuan</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" name="pekerjaan_saudara[]" class="form-control" placeholder="Enter Pekerjaan" >
                                                </td>
                                                <td>
                                                    <select name="pendidikan_saudara[]" class="form-control">
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
                                                    <button type="button" name="add_saudara" id="add_saudara" class="btn btn-success">+</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Kontak Darurat</span>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_darurat['id_darurat'] ?>" name="id_darurat" id="id_darurat" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_darurat" class="form-control" value="<?php echo $view_darurat['nama_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp / Hp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp_darurat" class="form-control" value="<?php echo $view_darurat['no_hp_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="alamat_darurat">Alamat
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_darurat" class="form-control" id="alamat_darurat" rows="3" ><?php echo $view_darurat['alamat_darurat'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-pendidikan" method="post" action="<?php echo site_url('karyawan/doUpdate_pendidikan') ?>" enctype="multipart/form-data">
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_pendidikan['id_pendidikan'] ?>" name="id_pendidikan" id="id_pendidikan" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
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
                                                <input type="hidden" class="form-control" name="no_urut" value="<?php echo $view_induk['no_urut'] ?>">
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
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form name="input_pelatihan" id="input_pelatihan" role="form" class="form-horizontal form-pelatihan" method="post" action="<?php echo site_url('karyawan/doInput_pelatihan') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#pelatihan">
                                <b>5. Data Pelatihan</b>
                                </a>
                            </h3>
                        </div>
                        <div id="pelatihan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow pelatihan" >
                                        <table class="table table-bordered" id="dynamic_field_pelatihan">
                                            <div class="form-group">
                                                <div class="col-md-1">
                                                    <input type="hidden" value="<?php echo $view_pendidikan['id_pendidikan'] ?>" name="id_pendidikan" id="id_pendidikan" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                                    <input type="hidden" class="form-control" name="no_urut" value="<?php echo $view_induk['no_urut'] ?>">
                                                </div>
                                            </div>
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Institut / Lembaga </th>
                                                    <th> Judul Pelatihan </th>
                                                    <th> Tahun Pelatihan </th>
                                                    <th> Tempat </th>
                                                    <th> Keterangan </th>
                                                    <th> </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_pelatihan as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['nama_pelatihan_lembaga'] ?> </td>
                                                <td> <?php echo $row['judul_pelatihan'] ?> </td>
                                                <td> <?php echo $row['tahun_pelatihan'] ?> </td>
                                                <td> <?php echo $row['tempat_pelatihan'] ?> </td>
                                                <td> <?php echo $row['ket_pelatihan'] ?> </td>
                                                <td> </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="nama_pelatihan_lembaga[]" class="form-control" placeholder="Enter Nama Pelatihan" >
                                                </td>
                                                <td>
                                                    <input type="text" name="judul_pelatihan[]" class="form-control" placeholder="Enter Judul" >
                                                </td>
                                                <td>
                                                    <input type="text" name="tahun_pelatihan[]" class="form-control" placeholder="Enter Tahun">
                                                </td>
                                                <td>
                                                    <input type="text" name="tempat_pelatihan[]" class="form-control" placeholder="Enter Tempat">
                                                </td>
                                                <td>
                                                    <select name="ket_pelatihan[]" class="form-control">
                                                        <option>-- Pilih Keterangan --</option>
                                                        <option>Ijazah</option>
                                                        <option>Sertifikat</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" name="add_pelatihan" id="add_pelatihan" class="btn btn-success">+</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form name="input_bahasa" id="input_bahasa" role="form" class="form-horizontal form-bahasa" method="post" action="<?php echo site_url('karyawan/doInput_bahasa') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#bahasa">
                                <b>6. Data Bahasa</b>
                                </a>
                            </h3>
                        </div>
                        <div id="bahasa" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow bahasa" >
                                        <table class="table table-bordered" id="dynamic_field_bahasa">
                                            <div class="form-group">
                                                <div class="col-md-1">
                                                    <input type="hidden" value="<?php echo $view_pendidikan['id_pendidikan'] ?>" name="id_pendidikan" id="id_pendidikan" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                                </div>
                                            </div>
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Bahasa </th>
                                                    <th> Lisan </th>
                                                    <th> Tulisan </th>
                                                    <th> Baca </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_bahasa as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['nama_bahasa'] ?> </td>
                                                <td> <?php echo $row['lisan'] ?> </td>
                                                <td> <?php echo $row['tulisan'] ?> </td>
                                                <td> <?php echo $row['baca'] ?> </td>
                                                <td></td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="text" name="nama_bahasa[]" class="form-control" placeholder="Enter Nama Bahasa" >
                                                </td>
                                                <td>
                                                    <select name="lisan[]" class="form-control">
                                                        <option>-- Pilih Lisan --</option>
                                                        <option>Kurang</option>
                                                        <option>Cukup</option>
                                                        <option>Baik</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="tulisan[]" class="form-control">
                                                        <option>-- Pilih Tulisan --</option>
                                                        <option>Kurang</option>
                                                        <option>Cukup</option>
                                                        <option>Baik</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="baca[]" class="form-control">
                                                        <option>-- Pilih Baca --</option>
                                                        <option>Kurang</option>
                                                        <option>Cukup</option>
                                                        <option>Baik</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button" name="add_bahasa" id="add_bahasa" class="btn btn-success">+</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-keahlian" method="post" action="<?php echo site_url('karyawan/doUpdate_keahlian') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#keahlian">
                                <b>7. Data Keahlian</b>
                                </a>
                            </h3>
                        </div>
                        <div id="keahlian" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow keahlian" >
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_keahlian['id_keahlian'] ?>" name="id_keahlian" id="id_keahlian" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Deskripsi 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="deskripsi" class="form-control"  rows="5"><?php echo $view_keahlian['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-hobi" method="post" action="<?php echo site_url('karyawan/doUpdate_hobi') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#hobi">
                                <b>8. Data Hobi</b>
                                </a>
                            </h3>
                        </div>
                        <div id="hobi" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow hobi" >
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_hobi['id_hobi'] ?>" name="id_hobi" id="id_hobi" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 1
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi" class="form-control">
                                                <option value="">-- Pilih Hobi --</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'";
                                                        echo $view_hobi['nama_hobi']==$k->nama_hobi?'selected':'';
                                                        echo">$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi" class="form-control" value="<?php echo $view_hobi['ket_hobi'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 2
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi_2" class="form-control">
                                                <option value="">-- Pilih Hobi --</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'";
                                                        echo $view_hobi['nama_hobi_2']==$k->nama_hobi?'selected':'';
                                                        echo">$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi_2" class="form-control" value="<?php echo $view_hobi['ket_hobi_2'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 3
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi_3" class="form-control">
                                                <option value="">-- Pilih Hobi --</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'";
                                                        echo $view_hobi['nama_hobi_3']==$k->nama_hobi?'selected':'';
                                                        echo">$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi_3" class="form-control" value="<?php echo $view_hobi['ket_hobi_3'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="panel panel-default shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#bs-collapse" href="#pengalaman_kerja">
                            <b>9. Data Pengalaman Kerja</b>
                            </a>
                        </h3>
                    </div>
                    <form role="form" class="form-horizontal form-pengalaman_kerja" method="post" action="<?php echo site_url('karyawan/doInput_pengalaman_kerja') ?>" enctype="multipart/form-data">
                        <div id="pengalaman_kerja" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow bahasa" >
                                        <table class="table table-bordered" id="dynamic_field_bahasa">
                                            <div class="form-group">
                                                <div class="col-md-1">
                                                    <input type="hidden" value="<?php echo $view_hobi['id_hobi'] ?>" name="id_hobi" id="id_hobi" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                                </div>
                                            </div>
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th rowspan="2">No. </th>
                                                    <th rowspan="2">Nama Perusahaan</th>
                                                    <th rowspan="2">Jabatan Awal</th>
                                                    <th colspan="2">Jabatan Awal</th>
                                                    <th rowspan="2">Jabatan Akhir</th>
                                                    <th colspan="2">Jabatan Akhir</th>
                                                    <th rowspan="2">Tahun Keluar</th>
                                                    <th rowspan="2">Alasan Keluar</th>
                                                    <th rowspan="2">Gaji Terakhir</th>
                                                    <th rowspan="2">Telp. Perusahaan</th>
                                                    <th rowspan="2">Nama Atasan</th>
                                                    <th rowspan="2">Nama Referensi</th>
                                                    <th rowspan="2">Kontak Referensi</th>
                                                </tr>
                                                <tr role="row" class="bg-primary">
                                                    <th> Start </th>
                                                    <th> End </th>
                                                    <th> Start </th>
                                                    <th> End </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_pengalaman_kerja as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['nama_perusahaan'] ?> </td>
                                                <td> <?php echo $row['jabatan_awal'] ?> </td>
                                                <td> <?php echo $row['jabatan_awal_start'] ?> </td>
                                                <td> <?php echo $row['jabatan_awal_end'] ?> </td>
                                                <td> <?php echo $row['jabatan_akhir'] ?> </td>
                                                <td> <?php echo $row['jabatan_akhir_start'] ?> </td>
                                                <td> <?php echo $row['jabatan_akhir_end'] ?> </td>
                                                <td> <?php echo $row['tahun_keluar'] ?> </td>
                                                <td> <?php echo $row['alasan_keluar'] ?> </td>
                                                <td> <?php echo $row['gaji_terakhir'] ?> </td>
                                                <td> <?php echo $row['no_telp_perusahaan'] ?> </td>
                                                <td> <?php echo $row['nama_atasan'] ?> </td>
                                                <td> <?php echo $row['nama_referensi'] ?> </td>
                                                <td> <?php echo $row['no_kontak_referensi'] ?> </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </table>

                                    <hr>
                                    <span class="caption-subject font-dark sbold uppercase">Tambah Pengalaman</span>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Perusahaan 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Enter Nama Perusahaan" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jabatan Awal 
                                        
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" name="jabatan_awal" id="jabatan_awal" class="form-control" placeholder="Enter Jabatan Awal" >
                                        </div>
                                        <label class="col-md-1 control-label">Periode 
                                        
                                        </label>
                                        <div class="col-md-2">
                                            <input type="date" name="jabatan_awal_start" id="jabatan_awal_start" class="form-control" placeholder="Enter Jabatan Awal" >
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" name="jabatan_awal_end" id="jabatan_awal_end" class="form-control" placeholder="Enter Jabatan Awal" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Jabatan Akhir 
                                        
                                        </label>
                                        <div class="col-md-3">
                                            <input type="text" name="jabatan_akhir" id="jabatan_akhir" class="form-control" placeholder="Enter Jabatan Akhir" >
                                        </div>
                                        <label class="col-md-1 control-label">Periode 
                                        
                                        </label>
                                        <div class="col-md-2">
                                            <input type="date" name="jabatan_akhir_start" id="jabatan_akhir_start" class="form-control" placeholder="Enter Jabatan Awal" >
                                        </div>
                                        <div class="col-md-2">
                                            <input type="date" name="jabatan_akhir_end" id="jabatan_akhir_end" class="form-control" placeholder="Enter Jabatan Awal" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Tahun Keluar 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="tahun_keluar" id="tahun_keluar" class="form-control" placeholder="Enter Tahun Keluar" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Alasan Keluar 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <textarea name="alasan_keluar" id="alasan_keluar" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Gaji Terakhir (Nett) 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="gaji_terakhir" id="gaji_terakhir" class="form-control" placeholder="Enter Gaji Terakhir" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No Telp. Perusahaan 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="no_telp_perusahaan" id="no_telp_perusahaan" class="form-control" placeholder="Enter No. Telp" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Atasan 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="nama_atasan" id="nama_atasan" class="form-control" placeholder="Enter Nama Atasan" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Referensi 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="nama_referensi" id="nama_referensi" class="form-control" placeholder="Enter Nama Referensi" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">No. Kontak Referensi 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="text" name="no_kontak_referensi" id="no_kontak_referensi" class="form-control" placeholder="Enter No. Kontak" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Upload Paklaring 
                                        
                                        </label>
                                        <div class="col-md-4">
                                            <input type="file" name="upload_paklaring" id="upload_paklaring" class="form-control" placeholder="Enter upload_paklaring" >
                                        </div>
                                    </div>
                                    <button type="submit" class="btn green btn-block draft-kerja"> <i class="fa fa-save"></i> Simpan Draft</button>
                                    <hr>
                                

                                    <button type="button" class="btn blue simpan-kerja"> <i class="fa fa-save"></i> Simpan </button>
                                    <button type="button" class="btn blue reload-kerja"> <i class="fa fa-refresh"></i> Refresh </button>
                                    <div id="pengalaman_kerja_all">
                                        
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
                <form name="input_organisasi" id="input_organisasi" role="form" class="form-horizontal form-organisasi" method="post" action="<?php echo site_url('karyawan/doInput_organisasi') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#organisasi">
                                <b>10. Data Organisasi</b>
                                </a>
                            </h3>
                        </div>
                        <div id="organisasi" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow organisasi" >
                                        <table class="table table-bordered" id="dynamic_field_organisasi">
                                            <div class="form-group">
                                                <div class="col-md-1">
                                                    <input type="hidden" value="<?php echo $view_hobi['id_hobi'] ?>" name="id_hobi" id="id_hobi" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                    <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                                </div>
                                            </div>
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Organisasi </th>
                                                    <th> Jabatan Awal </th>
                                                    <th> Jabatan Akhir </th>
                                                    <th> Tahun Bergabung </th>
                                                    <th> Tahun Keluar </th>
                                                    <th> Deskripsi </th>
                                                    <th> Aksi </th>
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php
                                            $no = 1;
                                            foreach ($view_pengalaman_organisasi as $row) {
                                            ?>
                                            <tr>
                                                <td> <?php echo $no ?> </td>
                                                <td> <?php echo $row['nama_organisasi'] ?> </td>
                                                <td> <?php echo $row['jabatan_awal_organisasi'] ?> </td>
                                                <td> <?php echo $row['jabatan_akhir_organisasi'] ?> </td>
                                                <td> <?php echo $row['tahun_masuk_organisasi'] ?> </td>
                                                <td> <?php echo $row['tahun_keluar_organisasi'] ?> </td>
                                                <td> <?php echo $row['deskripsi_organisasi'] ?> </td>
                                                <td> </td>
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            <tr>
                                                <td> </td>
                                                <td>
                                                    <input type="text" name="nama_organisasi[]" class="form-control" placeholder="Enter Nama Organisasi" >
                                                </td>
                                                <td>
                                                    <input type="text" name="jabatan_awal_organisasi[]" class="form-control" placeholder="Enter Jabatan Awal" >
                                                </td>
                                                <td>
                                                    <input type="text" name="jabatan_akhir_organisasi[]" class="form-control" placeholder="Enter Jabatan Akhir" >
                                                </td>
                                                <td>
                                                    <input type="text" name="tahun_masuk_organisasi[]" class="form-control" placeholder="Enter Tahun Bergabung" >
                                                </td>
                                                <td>
                                                    <input type="text" name="tahun_keluar_organisasi[]" class="form-control" placeholder="Enter Tahun Keluar" >
                                                </td>
                                                <td>
                                                    <textarea name="deskripsi_organisasi[]" class="form-control" rows="5"></textarea>
                                                </td>
                                                <td>
                                                    <button type="button" name="add_organisasi" id="add_organisasi" class="btn btn-success">+</button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-minat" method="post" action="<?php echo site_url('karyawan/doUpdate_minat') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#minat">
                                <b>11. Data Minat</b>
                                </a>
                            </h3>
                        </div>
                        <div id="minat" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow minat" >
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="<?php echo $view_minat['id_minat'] ?>" name="id_minat" id="id_hobi" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -10, 2) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -8, 2) ?>" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo substr($view_induk['nik_baru'], -6, 4) ?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" value="<?php echo substr($view_induk['nik_baru'], 8) ?>" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 1 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_1" class="form-control" id="dept_struktur">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'";
                                                        echo $view_minat['minat_1']==$k->nama_departement?'selected':'';
                                                        echo">$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 2 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_2" class="form-control" id="dept_struktur">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'";
                                                        echo $view_minat['minat_2']==$k->nama_departement?'selected':'';
                                                        echo">$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 3 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_3" class="form-control" id="dept_struktur">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'";
                                                        echo $view_minat['minat_3']==$k->nama_departement?'selected':'';
                                                        echo">$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <a href="<?php echo site_url('karyawan/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/karyawan.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.KARYAWAN.handleSendData_edit('.form-struktur');
    window.KARYAWAN.handleSendData_edit('.form-induk');
    window.KARYAWAN.handleSendData_edit('.form-detail');
    window.KARYAWAN.handleSendData_edit('.form-keluarga');
    window.KARYAWAN.handleSendData_edit('.form-pendidikan');
    window.KARYAWAN.handleSendData_edit('.form-pelatihan');
    window.KARYAWAN.handleSendData_edit('.form-bahasa');
    window.KARYAWAN.handleSendData_edit('.form-keahlian');
    window.KARYAWAN.handleSendData_edit('.form-hobi');
    window.KARYAWAN.handleSendData_kerja('.form-pengalaman_kerja');
    window.KARYAWAN.handleSendData_edit('.form-organisasi');
    window.KARYAWAN.handleSendData_edit('.form-minat', true);
    window.KARYAWAN.loadPengalamankerja();
    window.KARYAWAN.savePengalamankerja();

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

    // Data Pelatihan
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_pelatihan')?>";
      var i=1;  


      $('#add_pelatihan').click(function(){  
           i++;  
           $('#dynamic_field_pelatihan').append('<tr id="row'+i+'" class="dynamic-added_pelatihan"><td></td><td><input type="text" name="nama_pelatihan_lembaga[]" class="form-control" placeholder="Enter Nama Pelatihan" ><td><input type="text" name="judul_pelatihan[]" class="form-control" placeholder="Enter Judul" ><td><input type="text" name="tahun_pelatihan[]" class="form-control" placeholder="Enter Tahun"><td><input type="text" name="tempat_pelatihan[]" class="form-control" placeholder="Enter Tempat"><td><select name="ket_pelatihan[]" class="form-control"><option>-- Pilih Keterangan --</option><option>Ijazah</option><option>Sertifikat</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_pelatihan').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_pelatihan').remove();
                    $('#input_pelatihan')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });  

    // Data Bahasa
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_bahasa')?>";
      var i=1;  


      $('#add_bahasa').click(function(){  
           i++;  
           $('#dynamic_field_bahasa').append('<tr id="row'+i+'" class="dynamic-added_bahasa"><td></td><td><input type="text" name="nama_bahasa[]" class="form-control" placeholder="Enter Nama Bahasa" ><td><select name="lisan[]" class="form-control"><option>-- Pilih Lisan --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><select name="tulisan[]" class="form-control"><option>-- Pilih Tulisan --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><select name="baca[]" class="form-control"><option>-- Pilih Baca --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_bahasa').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_bahasa').remove();
                    $('#input_bahasa')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });  

    // Data Organisasi
    $(document).ready(function(){      
      var postURL = "<?=base_url('karyawan/doInput_organisasi')?>";
      var i=1;  


      $('#add_organisasi').click(function(){  
           i++;  
           $('#dynamic_field_organisasi').append('<tr id="row'+i+'" class="dynamic-added_organisasi"><td></td><td><input type="text" name="nama_organisasi[]" class="form-control" placeholder="Enter Nama Organisasi" ><td><input type="text" name="jabatan_awal_organisasi[]" class="form-control" placeholder="Enter Jabatan Awal" ><td><input type="text" name="jabatan_akhir_organisasi[]" class="form-control" placeholder="Enter Jabatan Akhir" ><td><input type="text" name="tahun_masuk_organisasi[]" class="form-control" placeholder="Enter Tahun Bergabung" ><td><input type="text" name="tahun_keluar_organisasi[]" class="form-control" placeholder="Enter Tahun Keluar" ><td><textarea name="deskripsi_organisasi[]" class="form-control" rows="5"></textarea><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });


      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  


      $('#submit').click(function(){            
           $.ajax({  
                url:postURL,  
                method:"POST",  
                data:$('#input_organisasi').serialize(),
                type:'json',
                success:function(data)  
                {
                    i=1;
                    $('.dynamic-added_organisasi').remove();
                    $('#input_organisasi')[0].reset();
                            alert('Record Inserted Successfully.');
                }  
           });  
      });


    });
</script>