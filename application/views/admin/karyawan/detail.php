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
                <form role="form" class="form-horizontal form-struktur" method="post" action="<?php echo site_url('karyawan/doInput_struktur') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#struktur">
                                <b>1. Data Struktur</b>
                                </a>
                            </h3>
                        </div>
                        <div id="struktur" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow struktur" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Karyawan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['nama_karyawan_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jabatan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['jabatan_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['lokasi_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Perusahaan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['perusahaan_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['level_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['dept_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Join Date 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['join_date_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jam Kerja 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['jam_kerja'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Start Date 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['start_date_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Masa Kerja 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['masa_kerja_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Karyawan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['status_karyawan_struktur'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Atasan Langsung 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_struktur['nama_atasan_struktur'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" name="form_induk" class="form-horizontal form-induk" method="post" action="<?php echo site_url('karyawan/doInput') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#induk">
                                <b>2. Data Induk</b>
                                </a>
                            </h3>
                        </div>
                        <div id="induk" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow induk" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['nama_lengkap'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_ktp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. NPWP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_npwp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Ketenagakerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_ket'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_kes'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Suami / Istri
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_kes_suami_istri'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -1
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_kes_anak_1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -2
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_kes_anak_2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -3
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_bpjs_kes_anak_3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_induk['digit_kk'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" name="form_induk" class="form-horizontal form-detail" method="post" action="<?php echo site_url('karyawan/doInput_detail') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#detail">
                                <b>3. Data Detail</b>
                                </a>
                            </h3>
                        </div>
                        <div id="detail" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow detail" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['tanggal_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['tempat_lahir'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['jenis_kelamin'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Pernikahan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['status_pernikahan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Golongan Darah
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['gol_darah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agama
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['agama'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Suku
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['suku'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tinggi Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['tinggi_badan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Berat Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['berat_badan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['kewarganegaraan'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Sesuai KTP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_ktp" class="form-control" rows="5" readonly=""><?php echo $view_detail['alamat_ktp'] ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['no_telp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Hp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['no_hp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_detail['email'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Domisili
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_domisili" class="form-control" rows="5" readonly=""><?php echo $view_detail['alamat_domisili'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form name="input_keluarga" id="input_keluarga" role="form" class="form-horizontal form-keluarga" method="post" action="<?php echo site_url('karyawan/doInput_keluarga') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#keluarga">
                                <b>4. Data Keluarga</b>
                                </a>
                            </h3>
                        </div>
                        <div id="keluarga" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow keluarga" >
                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Data Suami / Istri</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['nama_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['no_ktp_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['tanggal_lahir_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['tempat_lahir_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Golongan Darah
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['gol_darah_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Agama
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['agama_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Suku Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['suku_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['kewarganegaraan_keluarga'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_suami_istri['pendidikan_keluarga'] ?>">
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
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <hr>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Susunan Keluarga</span>
                                        </div>

                                        <ul>
                                            <li> Ayah </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ayah Kandung
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['nama_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['tanggal_lahir_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['jenis_kelamin_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['pekerjaan_ayah'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['pendidikan_ayah'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Ibu </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ibu Kandung
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['nama_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['tanggal_lahir_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['jenis_kelamin_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pekerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['pekerjaan_ibu'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_susunan_keluarga['pendidikan_ibu'] ?>">
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
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Kontak Darurat</span>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_darurat['nama_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp / Hp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_darurat['no_hp_darurat'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="alamat_darurat">Alamat
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_darurat" class="form-control" id="alamat_darurat" rows="3" readonly=""><?php echo $view_darurat['alamat_darurat'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-pendidikan" method="post" action="<?php echo site_url('karyawan/doInput_pendidikan') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#pendidikan">
                                <b>5. Data Pendidikan</b>
                                </a>
                            </h3>
                        </div>
                        <div id="pendidikan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow pendidikan" >
                                        <ul>
                                            <li> Sekolah Dasar </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['status_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_sd'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nilai_sd'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Pertama </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['status_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_smp'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nilai_smp'] ?>">
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Atas / Kejuruan </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['status_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['jurusan_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_smk'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nilai_smk'] ?>">
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
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['jurusan_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ipk_st'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tingkat_st'] ?>">
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
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['jurusan_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ipk_s1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tingkat_s1'] ?>">
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
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['jurusan_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ipk_s2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tingkat_s2'] ?>">
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
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['nama_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['jurusan_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tahun_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ket_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['ipk_s3'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_pendidikan['tingkat_s3'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </table>
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
                                <b>6. Data Pelatihan</b>
                                </a>
                            </h3>
                        </div>
                        <div id="pelatihan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow pelatihan" >
                                        <table class="table table-bordered" id="dynamic_field_pelatihan">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Institut / Lembaga </th>
                                                    <th> Judul Pelatihan </th>
                                                    <th> Tahun Pelatihan </th>
                                                    <th> Tempat </th>
                                                    <th> Keterangan </th>
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
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </table>
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
                                <b>7. Data Bahasa</b>
                                </a>
                            </h3>
                        </div>
                        <div id="bahasa" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow bahasa" >
                                        <table class="table table-bordered" id="dynamic_field_bahasa">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Bahasa </th>
                                                    <th> Lisan </th>
                                                    <th> Tulisan </th>
                                                    <th> Baca </th>
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
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-keahlian" method="post" action="<?php echo site_url('karyawan/doInput_keahlian') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#keahlian">
                                <b>8. Data Keahlian</b>
                                </a>
                            </h3>
                        </div>
                        <div id="keahlian" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow keahlian" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Deskripsi 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="deskripsi" class="form-control" readonly="" rows="5"><?php echo $view_keahlian['deskripsi'] ?></textarea>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-hobi" method="post" action="<?php echo site_url('karyawan/doInput_hobi') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#hobi">
                                <b>9. Data Hobi</b>
                                </a>
                            </h3>
                        </div>
                        <div id="hobi" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow hobi" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 1
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['nama_hobi'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['ket_hobi'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 2
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['nama_hobi_2'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['ket_hobi_2'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 3
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['nama_hobi_3'] ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_hobi['ket_hobi_3'] ?>">
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="panel panel-default shadow">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#bs-collapse" href="#pengalaman_kerja">
                            <b>10. Data Pengalaman Kerja</b>
                            </a>
                        </h3>
                    </div>
                    <form role="form" class="form-horizontal form-pengalaman_kerja" method="post" action="<?php echo site_url('karyawan/doInput_pengalaman_kerja') ?>" enctype="multipart/form-data">
                        <div id="pengalaman_kerja" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow bahasa" >
                                        <table class="table table-bordered" id="dynamic_field_bahasa">
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
                                <b>11. Data Organisasi</b>
                                </a>
                            </h3>
                        </div>
                        <div id="organisasi" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow organisasi" >
                                        <table class="table table-bordered" id="dynamic_field_organisasi">
                                            <thead>
                                                <tr role="row" class="bg-primary">
                                                    <th> No. </th>
                                                    <th> Nama Organisasi </th>
                                                    <th> Jabatan Awal </th>
                                                    <th> Jabatan Akhir </th>
                                                    <th> Tahun Bergabung </th>
                                                    <th> Tahun Keluar </th>
                                                    <th> Deskripsi </th>
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
                                            </tr>
                                            <?php
                                            $no++;
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <form role="form" class="form-horizontal form-minat" method="post" action="<?php echo site_url('karyawan/doInput_minat') ?>" enctype="multipart/form-data">
                    <div class="panel panel-default shadow">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a data-toggle="collapse" data-parent="#bs-collapse" href="#minat">
                                <b>12. Data Minat</b>
                                </a>
                            </h3>
                        </div>
                        <div id="minat" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow minat" >
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 1 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_minat['minat_1'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 2 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_minat['minat_2'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 3 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" readonly="" value="<?php echo $view_minat['minat_3'] ?>">
                                            </div>
                                        </div>
                                    </table>
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
    window.KARYAWAN.handleSendData('.form-struktur');
    window.KARYAWAN.handleSendData('.form-induk');
    window.KARYAWAN.handleSendData('.form-detail');
    window.KARYAWAN.handleSendData('.form-keluarga');
    window.KARYAWAN.handleSendData('.form-pendidikan');
    window.KARYAWAN.handleSendData('.form-pelatihan');
    window.KARYAWAN.handleSendData('.form-bahasa');
    window.KARYAWAN.handleSendData('.form-keahlian');
    window.KARYAWAN.handleSendData('.form-hobi');
    window.KARYAWAN.handleSendData_kerja('.form-pengalaman_kerja');
    window.KARYAWAN.handleSendData('.form-organisasi');
    window.KARYAWAN.handleSendData('.form-minat', true);
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
           $('#dynamic_field_anak').append('<tr id="row'+i+'" class="dynamic-added_anak"><td><input type="text" name="urutan_anak[]" class="form-control"><td><input type="text" name="nama_anak[]" class="form-control" placeholder="Enter Nama Lengkap" ><td><input type="text" name="no_ktp_anak[]" class="form-control" placeholder="Enter No. KTP" maxlength="16"><td><input type="date" name="tanggal_lahir_anak[]" class="form-control" placeholder="Enter NIK Baru" ><td><input type="text" name="tempat_lahir_anak[]" class="form-control" placeholder="Enter Tempat Lahir" ><td><select name="gol_darah_anak[]"" class="form-control"><option>-- Pilih Golongan --</option><option>A</option><option>B</option><option>AB</option><option>O</option></select><td><select name="agama_anak[]" class="form-control"><option>-- Pilih Agama --</option><option>Islam</option><option>Kristen</option><option>Khatolik</option><option>Budha</option><option>Hindu</option><option>Khong Huchu</option></select><td><input type="text" name="suku_anak[]" class="form-control" placeholder="Enter Suku"><td><select name="kewarganegaraan_anak[]" class="form-control"><option>-- Pilih Kewarganegaraan --</option><option>WNI</option><option>WNA</option></select><td><select name="pendidikan_anak[]" class="form-control"><option>-- Pilih Pendidikan --</option><option>SD</option><option>SMP/MTS</option><option>SMK/SMA/MA</option><option>S1</option><option>S2</option><option>S3</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
           $('#dynamic_field_saudara').append('<tr id="row'+i+'" class="dynamic-added_saudara"><td><input type="text" name="urutan_saudara[]" class="form-control"><td><input type="text" name="nama_saudara[]" class="form-control" placeholder="Enter Nama Lengkap" ><td><input type="date" name="tanggal_lahir_saudara[]" class="form-control" placeholder="Enter NIK Baru" ><td><select name="jenis_kelamin_saudara[]" class="form-control"><option>-- Pilih Kelamin --</option><option>Laki - Laki</option><option>Perempuan</option></select><td><input type="text" name="pekerjaan_saudara[]" class="form-control" placeholder="Enter Pekerjaan" ><td><select name="pendidikan_saudara[]" class="form-control"><option>-- Pilih Pendidikan --</option><option>SD</option><option>SMP/MTS</option><option>SMK/SMA/MA</option><option>S1</option><option>S2</option><option>S3</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
           $('#dynamic_field_pelatihan').append('<tr id="row'+i+'" class="dynamic-added_pelatihan"><td><input type="text" name="nama_pelatihan_lembaga[]" class="form-control" placeholder="Enter Nama Pelatihan" ><td><input type="text" name="judul_pelatihan[]" class="form-control" placeholder="Enter Judul" ><td><input type="text" name="tahun_pelatihan[]" class="form-control" placeholder="Enter Tahun"><td><input type="text" name="tempat_pelatihan[]" class="form-control" placeholder="Enter Tempat"><td><select name="ket_pelatihan[]" class="form-control"><option>-- Pilih Keterangan --</option><option>Ijazah</option><option>Sertifikat</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
           $('#dynamic_field_bahasa').append('<tr id="row'+i+'" class="dynamic-added_bahasa"><td><input type="text" name="nama_bahasa[]" class="form-control" placeholder="Enter Nama Bahasa" ><td><select name="lisan[]" class="form-control"><option>-- Pilih Lisan --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><select name="tulisan[]" class="form-control"><option>-- Pilih Tulisan --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><select name="baca[]" class="form-control"><option>-- Pilih Baca --</option><option>Kurang</option><option>Cukup</option><option>Baik</option></select><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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
           $('#dynamic_field_organisasi').append('<tr id="row'+i+'" class="dynamic-added_organisasi"><td><input type="text" name="nama_organisasi[]" class="form-control" placeholder="Enter Nama Organisasi" ><td><input type="text" name="jabatan_awal_organisasi[]" class="form-control" placeholder="Enter Jabatan Awal" ><td><input type="text" name="jabatan_akhir_organisasi[]" class="form-control" placeholder="Enter Jabatan Akhir" ><td><input type="text" name="tahun_masuk_organisasi[]" class="form-control" placeholder="Enter Tahun Bergabung" ><td><input type="text" name="tahun_keluar_organisasi[]" class="form-control" placeholder="Enter Tahun Keluar" ><td><textarea name="deskripsi_organisasi[]" class="form-control" rows="5"></textarea><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
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