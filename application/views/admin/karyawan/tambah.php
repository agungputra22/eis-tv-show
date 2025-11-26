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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Karyawan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_karyawan_struktur" id="nama_karyawan_struktur" class="form-control" placeholder="Enter Nama Karyawan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jabatan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <!-- <select name="jabatan_struktur" class="form-control">
                                                <option>-- Pilih Jabatan --</option>
                                                    <?php
                                                    foreach ($jabatan as $k)
                                                    {
                                                        echo "<option value='$k->nama_jabatan'>$k->nama_jabatan($k->lokasi)</option>";
                                                    }
                                                    ?>
                                                </select> -->
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
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi 
                                            
                                            </label>
                                            <div class="col-md-4">
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
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Perusahaan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="perusahaan_struktur" class="form-control" id="perusahaan_struktur">
                                                <option>-- Pilih Perusahaan --</option>
                                                    <?php
                                                    foreach ($perusahaan as $k)
                                                    {
                                                        echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="level_struktur" class="form-control">
                                                <option>-- Pilih Level --</option>
                                                    <?php
                                                    foreach ($level_jabatan as $k)
                                                    {
                                                        echo "<option value='$k->level_jabatan'>$k->level_jabatan</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement 
                                            
                                            </label>
                                            <div class="col-md-4">
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
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Join Date 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="join_date_struktur" class="form-control" placeholder="Enter Join" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jam Kerja 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="jam_kerja" class="form-control">
                                                    <option>-- Pilih Jam Kerja --</option>
                                                    <option value="0">Non Shift</option>
                                                    <option value="1">Shift</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Start Date 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="start_date_struktur" class="form-control" placeholder="Enter Tahun Keluar" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Masa Kerja 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <!-- <input type="text" name="masa_kerja_struktur" class="form-control" placeholder="Enter Masa Kerja" > -->
                                                <select name="masa_kerja_struktur" class="form-control">
                                                    <option>-- Pilih Masa Kerja --</option>
                                                    <option value="182">6 Bulan</option>
                                                    <option value="365">1 Tahun</option>
                                                    <option value="547">1,5 Tahun</option>
                                                    <option value="730">2 Tahun</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Karyawan
                                            </label>
                                            <div class="col-md-6">
                                            <input type="checkbox" name="status_karyawan_struktur" alt="Checkbox" value="Kontrak" data-toggle="collapse" data-target="#pkwt" aria-expanded="false" aria-controls="pkwt" required=""> Kontrak

                                            <input type="checkbox" name="status_karyawan_struktur" alt="Checkbox" value="Probation"> Probation

                                            <input type="checkbox" name="status_karyawan_struktur" alt="Checkbox" value="Out Source" data-toggle="collapse" data-target="#pkwt" aria-expanded="false" aria-controls="pkwt"> Out Source
                                            </div>
                                        </div>

                                        <!-- <div class="collapse" id="pkwt">
                                        <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Start Kontrak 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="start_pkwt_struktur" class="form-control" placeholder="Enter Start PKWT" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">End Kontrak 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="end_pkwt_struktur" class="form-control" placeholder="Enter End PKWT" >
                                            </div>
                                        </div>
                                        </div>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Atasan Langsung 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_atasan_struktur" class="form-control" placeholder="Enter Atasan Langsung" readonly="" id="nama_atasan_struktur">
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                        <!-- <div class="form-group">
                                            <label class="col-md-3 control-label">Id Karyawan
                                                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="userid" class="form-control" placeholder="Enter Id Karyawan" readonly="">
                                            </div>
                                        </div> -->

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">NIK
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="text" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#nik_lama" aria-expanded="false" aria-controls="nik_lama"> NIK Lama
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="text" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="collapse" id="nik_lama">
                                            <div class="card card-body">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <input type="text" name="nik_lama" class="form-control" placeholder="Enter NIK Lama">
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
                                                <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" required="required" readonly="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_ktp" maxlength="16" class="form-control">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_ktp" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Foto
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input name="foto_terbaru" type="file" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. NPWP
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_npwp" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="npwp" class="form-control" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Ketenagakerjaan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_ket" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_ket" class="form-control" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_kes" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_kes" class="form-control" placeholder="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#bpjs_suami_istri" aria-expanded="false" aria-controls="bpjs_suami_istri"> BPJS Suami / Istri
                                            </div>
                                        </div>

                                        <div class="collapse" id="bpjs_suami_istri">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Suami / Istri
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_kes_suami_istri" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_kes_suami_istri" class="form-control" placeholder="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#bpjs_anak_1" aria-expanded="false" aria-controls="bpjs_anak_1"> BPJS Anak Ke - 1
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="bpjs_anak_1">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -1
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_kes_anak_1" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_kes_anak_1" class="form-control" placeholder="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#bpjs_anak_2" aria-expanded="false" aria-controls="bpjs_anak_2"> BPJS Anak Ke - 2
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="bpjs_anak_2">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -2
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_kes_anak_2" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_kes_anak_2" class="form-control" placeholder="" >
                                                <input type="checkbox" data-toggle="collapse" data-target="#bpjs_anak_3" aria-expanded="false" aria-controls="bpjs_anak_3"> BPJS Anak Ke - 3
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="bpjs_anak_3">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">No. BPJS Kesehatan Anak Ke -3
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_bpjs_kes_anak_3" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_bpjs_kes_anak_3" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="digit_kk" maxlength="16" class="form-control" placeholder="" >
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" name="no_kk" class="form-control" placeholder="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Asuransi Swasta
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="no_asuransi" class="form-control" placeholder="Enter Nama departement" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">SIM
                                            </label>
                                            <div class="col-md-6">
                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="laptop" data-toggle="collapse" data-target="#sim_c" aria-expanded="false" aria-controls="sim_c"> SIM C

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="komputer" data-toggle="collapse" data-target="#sim_a" aria-expanded="false" aria-controls="sim_a"> SIM A

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Handphone" data-toggle="collapse" data-target="#sim_b" aria-expanded="false" aria-controls="sim_b"> SIM B

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Mouse" data-toggle="collapse" data-target="#sim_b1" aria-expanded="false" aria-controls="sim_b1"> SIM B1

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Mouse" data-toggle="collapse" data-target="#sim_b2" aria-expanded="false" aria-controls="sim_b2"> SIM B2

                                            <input type="checkbox" name="mis_hardware[]" alt="Checkbox" value="Mouse" data-toggle="collapse" data-target="#sim_sio" aria-expanded="false" aria-controls="sim_sio"> SIM SIO
                                            </div>
                                        </div>

                                        <div class="collapse" id="sim_c">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM C
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="sim_a">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM A
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_a" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="sim_b">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM B
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_b" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="sim_b1">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM B1
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_b1" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM B1 Umum
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_b1_umum" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="sim_b2">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM B2
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_b2" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIM B2 Umum
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_b2_umum" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="collapse" id="sim_sio">
                                        <div class="card card-body">
                                            <div class="form-group">
                                            <label class="col-md-3 control-label">SIO
                                            </label>
                                            <div class="col-md-4">
                                                <input type="file" name="sim_sio" class="form-control" placeholder="" >
                                            </div>
                                        </div>
                                        </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Enter Tanggal Lahir" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Enter Tempat Lahir" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jenis Kelamin 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="jenis_kelamin" value="Laki - Laki" required="">Laki - Laki
                                                <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Pernikahan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="status_pernikahan" class="form-control">
                                                    <option>-- Pilih Status --</option>
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
                                                    <option>-- Pilih Golongan --</option>
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
                                                    <option>-- Pilih Agama --</option>
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
                                                <input type="text" name="suku" class="form-control" placeholder="Enter Suku" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tinggi Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tinggi_badan" class="form-control" placeholder="Enter Tinggi Badan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Berat Badan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="berat_badan" class="form-control" placeholder="Enter Berat Badan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                            <span class="font-red">*</span>                
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="kewarganegaraan" value="WNI" required="">WNI
                                                <input type="radio" name="kewarganegaraan" value="WNA">WNA
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Sesuai KTP
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_ktp" class="form-control" rows="5" required=""></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_telp" class="form-control" placeholder="Enter No. Telp" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Hp
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp" class="form-control" placeholder="Enter No. Hp" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Email
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="email" class="form-control" placeholder="Enter Email" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Alamat Domisili
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_domisili" class="form-control" rows="5" required=""></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_keluarga" class="form-control" placeholder="Enter Nama Lengkap" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. KTP Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_ktp_keluarga" class="form-control" placeholder="Enter No. KTP" maxlength="16">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_keluarga" class="form-control" placeholder="Enter No. KTP" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tempat Lahir Keluarga
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tempat_lahir_keluarga" class="form-control" placeholder="Enter Tempat Lahir" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Golongan Darah
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="gol_darah_keluarga" class="form-control">
                                                    <option>-- Pilih Golongan --</option>
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
                                                    <option>-- Pilih Agama --</option>
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
                                                <input type="text" name="suku_keluarga" class="form-control" placeholder="Enter Suku Keluarga" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Kewarganegaraan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="kewarganegaraan_keluarga" value="WNI" checked="">WNI
                                                <input type="radio" name="kewarganegaraan_keluarga" value="WNA">WNA
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_keluarga" class="form-control">
                                                  <option>-- Pilih Pendidikan --</option>
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
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>
                                        <div class="input-group control-group after-add-more">
                                        <table class="table table-bordered" id="dynamic_field_anak">
                                            <tr>
                                                <th width="20"> Anak Ke </th>
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
                                            <tr>
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
                                        </table>
                                        <hr>

                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Susunan Keluarga</span>
                                        </div>

                                        <ul>
                                            <li> Ayah </li>
                                        </ul>

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Ayah Kandung
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_ayah" class="form-control" placeholder="Enter Nama Ayah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ayah" class="form-control" placeholder="Enter Tanggal Lahir" >
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
                                                <input type="text" name="pekerjaan_ayah" class="form-control" placeholder="Enter Pekerjaan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ayah" class="form-control">
                                                  <option>-- Pilih Pendidikan --</option>
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
                                                <input type="text" name="nama_ibu" class="form-control" placeholder="Enter Nama Ibu" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tanggal Lahir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="date" name="tanggal_lahir_ibu" class="form-control" placeholder="Enter Tanggal Lahir" >
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
                                                <input type="text" name="pekerjaan_ibu" class="form-control" placeholder="Enter Pekerjaan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Pendidikan Terakhir
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="pendidikan_ibu" class="form-control">
                                                  <option>-- Pilih Pendidikan --</option>
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

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <table class="table table-bordered" id="dynamic_field_saudara">
                                            <tr>
                                                <th width="20"> Saudara Ke</th>
                                                <th> Nama Lengkap </th>
                                                <th> Tanggal Lahir </th>
                                                <th> Jenis Kelamin </th>
                                                <th> Pekerjaan </th>
                                                <th> pendidikan Terakhir </th>
                                                <th> Aksi </th>
                                            </tr>
                                            <tr>
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
                                        </table>
                                        <hr>
                                        <div class="caption">
                                            <span class="caption-subject font-dark sbold uppercase">Kontak Darurat</span>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama Lengkap
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_darurat" class="form-control" placeholder="Enter Nama Lengkap" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">No. Telp / Hp
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="no_hp_darurat" class="form-control" placeholder="Enter No" required="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="alamat_darurat">Alamat
                                            <span class="font-red">*</span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="alamat_darurat" class="form-control" id="alamat_darurat" rows="3" required=""></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_sd" value="Normal" checked="">Normal
                                                <input type="radio" name="status_sd" value="Paket">Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_sd" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_sd" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_sd" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_sd" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nilai_sd" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Pertama </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_smp" value="Normal" checked="">Normal
                                                <input type="radio" name="status_smp" value="Paket">Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_smp" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_smp" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_smp" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_smp" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nilai_smp" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <ul>
                                            <li> Sekolah Menengah Atas / Kejuruan </li>
                                        </ul>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status Sekolah 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="status_smk" value="Normal" checked="">Normal
                                                <input type="radio" name="status_smk" value="Paket">Paket
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nama_smk" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="jurusan_smk" class="form-control" placeholder="Enter Jurusan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_smk" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_smk" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_smk" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai Rata-Rata
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="nilai_smk" class="form-control" placeholder="Enter Nilai " >
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
                                                <input type="text" name="nama_st" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="jurusan_st" class="form-control" placeholder="Enter Jurusan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_st" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_st" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_st" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="ipk_st" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="tingkat_st" class="form-control">
                                                    <option>--- --- ---</option>
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
                                                <input type="text" name="nama_s1" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="jurusan_s1" class="form-control" placeholder="Enter Jurusan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_s1" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s1" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_s1" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="ipk_s1" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tingkat_s1" class="form-control" readonly="" value="Sarjana">
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
                                                <input type="text" name="nama_s2" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="jurusan_s2" class="form-control" placeholder="Enter Jurusan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_s2" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s2" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_s2" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="ipk_s2" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tingkat_s2" class="form-control" readonly="" value="Magister">
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
                                                <input type="text" name="nama_s3" class="form-control" placeholder="Enter Nama Sekolah" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Jurusan 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="jurusan_s3" class="form-control" placeholder="Enter Jurusan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tahun Pendidikan
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tahun_s3" class="form-control" placeholder="Enter Tahun Pendidikan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Keterangan 
                                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="radio" name="ket_s3" value="Lulus" checked="">Lulus
                                                <input type="radio" name="ket_s3" value="Tidak Lulus">Tidak Lulus
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nilai IPK
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="ipk_s3" class="form-control" placeholder="Enter Nilai " >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tingkat
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" name="tingkat_s3" class="form-control" readonly="" value="Dokter">
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
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
                                <b>6. Data Pelatihan</b>
                                </a>
                            </h3>
                        </div>
                        <div id="pelatihan" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow pelatihan" >
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>
                                        <table class="table table-bordered" id="dynamic_field_pelatihan">
                                            <tr>
                                                <th> Nama Institut / Lembaga </th>
                                                <th> Judul Pelatihan </th>
                                                <th> Tahun Pelatihan </th>
                                                <th> Tempat </th>
                                                <th> Keterangan </th>
                                                <th> Aksi </th> 
                                            </tr>
                                            <tr>
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
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
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
                                <b>7. Data Bahasa</b>
                                </a>
                            </h3>
                        </div>
                        <div id="bahasa" class="panel-collapse collapse">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped shadow bahasa" >
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>
                                        <table class="table table-bordered" id="dynamic_field_bahasa">
                                            <tr>
                                                <th> Nama Bahasa </th>
                                                <th> Lisan </th>
                                                <th> Tulisan </th>
                                                <th> Baca </th>
                                                <th> Aksi </th>
                                            </tr>
                                            <tr>
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
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Deskripsi 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 1
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'>$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi" class="form-control" placeholder="Enter Keterangan" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 2
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi_2" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'>$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi_2" class="form-control" placeholder="Enter Keterangan" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hobi 3
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="nama_hobi_3" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($hobi as $k)
                                                    {
                                                        echo "<option value='$k->nama_hobi'>$k->nama_hobi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="ket_hobi_3" class="form-control" placeholder="Enter Keterangan" >
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
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
                            <b>10. Data Pengalaman Kerja</b>
                            </a>
                        </h3>
                    </div>
                    <form role="form" class="form-horizontal form-pengalaman_kerja" method="post" action="<?php echo site_url('karyawan/doInput_pengalaman_kerja') ?>" enctype="multipart/form-data">
                        <div id="pengalaman_kerja" class="panel-collapse collapse">
                            <div class="panel-body">
                                    
                                <div class="form-group">
                                    <div class="col-md-1">
                                        <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                        <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                    </div>
                                    <div class="col-md-1">
                                        <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                    </div>
                                    <div class="col-md-1">
                                        <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                    </div>
                                </div>

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
                                    <label class="col-md-3 control-label">Upload upload_paklaring 
                                    
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
                                        <div class="form-group">
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <table class="table table-bordered" id="dynamic_field_organisasi">
                                            <tr>
                                                <th> Nama Organisasi </th>
                                                <th> Jabatan Awal </th>
                                                <th> Jabatan Akhir </th>
                                                <th> Tahun Bergabung </th>
                                                <th> Tahun Keluar </th>
                                                <th> Deskripsi </th>
                                                <th> Aksi </th>
                                            </tr>
                                            <tr>
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
                                        </table>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-md-1">
                                                <input type="hidden" value="123" name="nik_baru" id="nik_baru" class="form-control" placeholder="Enter NIK Baru">
                                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" value="<?php echo $invoice;?>" readonly="" >
                                            </div>
                                            <div class="col-md-1">
                                                <input type="hidden" name="hasil_mutasi_nik" value="00" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 1 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_1" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($divisi as $k)
                                                    {
                                                        echo "<option value='$k->nama_divisi'>$k->nama_divisi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 2 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_2" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($divisi as $k)
                                                    {
                                                        echo "<option value='$k->nama_divisi'>$k->nama_divisi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Minat 3 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="minat_3" class="form-control">
                                                <option>--- --- ---</option>
                                                    <?php
                                                    foreach ($divisi as $k)
                                                    {
                                                        echo "<option value='$k->nama_divisi'>$k->nama_divisi</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </table>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Simpan</button>
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