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
                <form role="form" class="form-horizontal form-historical_mutasi" method="post" action="<?php echo site_url('historical_mutasi/doInput') ?>">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-3 control-label">No. Pengajuan
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_pengajuan" class="form-control" placeholder="Enter No" value="<?php echo $pengajuan;?>" readonly="">
                                <input type="hidden" name="tanggal_pengajuan" value="<?php echo date('Y-m-d h:i:s'); ?>">
                                <input type="hidden" name="nik_pengajuan" class="form-control" placeholder="Enter Id full_day" value="<?php echo users('nik_baru'); ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Cari NIK / Nama Karyawan
                            
                            </label>
                            <div class="col-md-4">
                                <select name="nik_baru" id="nik_baru" class="bs-select form-control" data-live-search="true" data-size="8">
                                    <option value="">-- Pilih Karyawan --</option>
                                    <?php
                                    foreach ($data_karyawan as $k)
                                    {
                                        echo "<option value='$k->nik_baru'>$k->nama_karyawan_struktur ($k->nik_baru)</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">No Urut 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="no_urut" class="form-control" placeholder="Enter No Urut" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">NIK Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nik" class="form-control" placeholder="Enter NIK" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nama Karyawan 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="nama_karyawan_mutasi" class="form-control" placeholder="Enter Nama Karyawan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">PT
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="pt_awal" class="form-control" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Departement 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="dept_awal" class="form-control" placeholder="Enter Jabatan" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Lokasi
                            
                            </label>
                            <div class="col-md-4">
                                <input type="text" name="lokasi_awal" class="form-control" placeholder="Enter Lokasi" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Jabatan Saat Ini 
                            
                            </label>
                            <div class="col-md-4">
                                <input type="hidden" name="jabatan_awal" class="form-control" placeholder="Enter Jabatan" readonly="">
                                <input type="text" name="jabatan_tampil" class="form-control" placeholder="Enter Jabatan" readonly="">
                                <input type="hidden" name="level_awal" class="form-control" placeholder="Enter Level" readonly="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="lokasi_baru" id="lokasi_baru" class="form-control" placeholder="Enter Lokasi" readonly="">
                                <input type="hidden" name="pt_baru" id="pt_baru" class="form-control" placeholder="Enter Lokasi" readonly="">
                                <input type="hidden" name="dept_baru" id="dept_baru" class="form-control" placeholder="Enter Lokasi" readonly="">
                                <input type="hidden" name="jabatan_baru" id="jabatan_baru" class="form-control" placeholder="Enter Lokasi" readonly="">
                                <input type="hidden" name="level_baru" id="level_baru" class="form-control" placeholder="Enter Lokasi" readonly="">
                                <input type="hidden" name="hasil_lokasi_struktur" id="hasil_lokasi_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                <input type="hidden" name="hasil_perusahaan_struktur" id="hasil_perusahaan_struktur" class="form-control" placeholder="Enter NIK Baru" readonly="">
                                <input type="hidden" name="hasil_no_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" readonly="" >
                                <input type="hidden" name="hasil_mutasi_nik" id="nik_baru" class="form-control" placeholder="Enter NIK Baru" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Permintaan 
                            
                            </label>
                            
                            <div class="col-md-5">
                                <table>
                                <td align="center">
                                    <input type="checkbox" value="promosi" name="permintaan" data-toggle="collapse" data-target="#promosi" aria-expanded="false" aria-controls="promosi"> Promosi
                                </td>
                                <td align="center">
                                    <input type="checkbox" value="demosi" name="permintaan" data-toggle="collapse" data-target="#demosi" aria-expanded="false" aria-controls="demosi"> Demosi
                                </td>
                                <td align="center">
                                    <input type="checkbox" value="rotasi" name="permintaan" data-toggle="collapse" data-target="#rotasi" aria-expanded="false" aria-controls="rotasi"> Rotasi
                                </td>
                                <!-- <td align="center">
                                    <input type="checkbox" value="mutasi" name="permintaan" data-toggle="collapse" data-target="#mutasi" aria-expanded="false" aria-controls="mutasi">Mutasi
                                </td> -->
                                </table>
                            </div>
                        </div>

                        <div class="collapse" id="promosi">
                            <div class="card card-body">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold uppercase">
                                        Promosi
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Opsi
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <input type="radio" name="opsi" value="Panel"> Panel
                                        <input type="radio" name="opsi" value="PLT"> PLT
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                    
                                    </label>
                                    <div class="col-md-4">
                                       <!-- <input type="checkbox" data-toggle="collapse" data-target="#mutasi_pt" aria-expanded="false" aria-controls="mutasi_pt">Mutasi PT -->
                                       <input type="checkbox" data-toggle="collapse" data-target="#mutasi_dept" aria-expanded="false" aria-controls="mutasi_dept">Mutasi Departement
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_pt">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PT
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="perusahaan_struktur" class="form-control" id="perusahaan_struktur">
                                                <option value="">-- Pilih Perusahaan --</option>
                                                    <?php
                                                    foreach ($perusahaan as $k)
                                                    {
                                                        echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_dept">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="dept_baru_promosi" id="dept_baru_promosi" class="form-control" id="dept_baru">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jabatan Baru 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <select name="jabatan_baru_promosi" id="jabatan_baru_promosi" class="bs-select form-control" data-live-search="true" data-size="8">
                                            <option value="">-- Pilih Jabatan --</option>
                                            <?php
                                                foreach ($jabatan as $p)
                                                {
                                                    $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                    $jabatan_karyawan=$p->jabatan_karyawan;
                                                    $tempat=$p->tempat;
                                            ?>
                                                <option value="<?=$no_jabatan_karyawan;?>">
                                                    <?=$jabatan_karyawan;?> (<?=$tempat;?>)
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Rekomendasi Tanggal 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="rekomendasi_tanggal_promosi" class="form-control" placeholder="Enter Tanggal " required="">
                                        <input type="checkbox" data-toggle="collapse" data-target="#rotasi_promosi" aria-expanded="false" aria-controls="rotasi_promosi">Rotasi Lokasi Kerja
                                    </div>
                                </div>

                                <div class="collapse" id="rotasi_promosi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi Baru 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="lokasi_struktur" class="form-control" id="lokasi_struktur">
                                                <option value="">-- Pilih Lokasi --</option>
                                                    <?php
                                                    foreach ($depo as $k)
                                                    {
                                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="demosi">
                            <div class="card card-body">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold uppercase">
                                        Demosi
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                    
                                    </label>
                                    <div class="col-md-4">
                                       <!-- <input type="checkbox" data-toggle="collapse" data-target="#mutasi_pt_demosi" aria-expanded="false" aria-controls="mutasi_pt_demosi">Mutasi PT -->
                                       <input type="checkbox" data-toggle="collapse" data-target="#mutasi_dept_demosi" aria-expanded="false" aria-controls="mutasi_dept_demosi">Mutasi Departement
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_pt_demosi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PT
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="perusahaan_struktur_2" class="form-control" id="perusahaan_struktur_2">
                                                <option value="">-- Pilih Perusahaan --</option>
                                                    <?php
                                                    foreach ($perusahaan as $k)
                                                    {
                                                        echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_dept_demosi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="dept_baru_demosi" id="dept_baru_demosi" class="form-control" id="dept_baru">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jabatan Baru 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <select name="jabatan_baru_demosi" id="jabatan_baru_demosi" class="bs-select form-control" data-live-search="true" data-size="8">
                                            <option value="">-- Pilih Jabatan --</option>
                                            <?php
                                                foreach ($jabatan as $p)
                                                {
                                                    $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                    $jabatan_karyawan=$p->jabatan_karyawan;
                                                    $tempat=$p->tempat;
                                            ?>
                                                <option value="<?=$no_jabatan_karyawan;?>">
                                                    <?=$jabatan_karyawan;?> (<?=$tempat;?>)
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Rekomendasi Tanggal 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="rekomendasi_tanggal_demosi" class="form-control" placeholder="Enter Tanggal " required="">
                                        <input type="checkbox" data-toggle="collapse" data-target="#rotasi_demosi" aria-expanded="false" aria-controls="rotasi_demosi">Rotasi Lokasi Kerja
                                    </div>
                                </div>

                                <div class="collapse" id="rotasi_demosi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi Baru 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="lokasi_struktur_2" class="form-control" id="lokasi_struktur_2">
                                                <option value="">-- Pilih Lokasi --</option>
                                                    <?php
                                                    foreach ($depo as $k)
                                                    {
                                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="rotasi">
                            <div class="card card-body">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold uppercase">
                                        Rotasi
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                    
                                    </label>
                                    <div class="col-md-4">
                                       <!-- <input type="checkbox" data-toggle="collapse" data-target="#mutasi_pt_rotasi" aria-expanded="false" aria-controls="mutasi_pt_rotasi">Mutasi PT -->
                                       <input type="checkbox" data-toggle="collapse" data-target="#mutasi_dept_rotasi" aria-expanded="false" aria-controls="mutasi_dept_rotasi">Mutasi Departement
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_pt_rotasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PT
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="perusahaan_struktur_3" class="form-control" id="perusahaan_struktur_3">
                                                <option value="">-- Pilih Perusahaan --</option>
                                                    <?php
                                                    foreach ($perusahaan as $k)
                                                    {
                                                        echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_dept_rotasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="dept_baru_rotasi" id="dept_baru_rotasi" class="form-control" id="dept_baru">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jabatan Baru 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <select name="jabatan_baru_rotasi" id="jabatan_baru_rotasi" class="bs-select form-control" data-live-search="true" data-size="8">
                                            <option value="">-- Pilih Jabatan --</option>
                                            <?php
                                                foreach ($jabatan as $p)
                                                {
                                                    $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                    $jabatan_karyawan=$p->jabatan_karyawan;
                                                    $tempat=$p->tempat;
                                            ?>
                                                <option value="<?=$no_jabatan_karyawan;?>">
                                                    <?=$jabatan_karyawan;?> (<?=$tempat;?>)
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Rekomendasi Tanggal
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="rekomendasi_tanggal_rotasi" class="form-control" placeholder="Enter Tanggal " required="">
                                        <input type="checkbox" data-toggle="collapse" data-target="#rotasi_rotasi" aria-expanded="false" aria-controls="rotasi_rotasi">Rotasi Lokasi Kerja
                                    </div>
                                </div>

                                <div class="collapse" id="rotasi_rotasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi Baru 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="lokasi_struktur_3" class="form-control" id="lokasi_struktur_3">
                                                <option value="">-- Pilih Lokasi --</option>
                                                    <?php
                                                    foreach ($depo as $k)
                                                    {
                                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="collapse" id="mutasi">
                            <div class="card card-body">
                                <div class="caption">
                                    <span class="caption-subject font-dark sbold uppercase">
                                        Mutasi
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">
                                    
                                    </label>
                                    <div class="col-md-4">
                                       <!-- <input type="checkbox" data-toggle="collapse" data-target="#mutasi_pt_mutasi" aria-expanded="false" aria-controls="mutasi_pt_mutasi">Mutasi PT -->
                                       <input type="checkbox" data-toggle="collapse" data-target="#mutasi_dept_mutasi" aria-expanded="false" aria-controls="mutasi_dept_mutasi">Mutasi Departement
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_pt_mutasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">PT
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="perusahaan_struktur_4" class="form-control" id="perusahaan_struktur_4">
                                                <option value="">-- Pilih Perusahaan --</option>
                                                    <?php
                                                    foreach ($perusahaan as $k)
                                                    {
                                                        echo "<option value='$k->perusahaan_nama'>$k->perusahaan_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="collapse" id="mutasi_dept_mutasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Departement
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="dept_baru_mutasi" id="dept_baru_mutasi" class="form-control" id="dept_baru">
                                                <option value="">-- Pilih Departement --</option>
                                                    <?php
                                                    foreach ($dept as $k)
                                                    {
                                                        echo "<option value='$k->nama_departement'>$k->nama_departement</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Jabatan Baru 
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <select name="jabatan_baru_mutasi" id="jabatan_baru_mutasi" class="bs-select form-control" data-live-search="true" data-size="8">
                                            <option value="">-- Pilih Jabatan --</option>
                                            <?php
                                                foreach ($jabatan as $p)
                                                {
                                                    $no_jabatan_karyawan=$p->no_jabatan_karyawan;
                                                    $jabatan_karyawan=$p->jabatan_karyawan;
                                            ?>
                                                <option value="<?=$no_jabatan_karyawan;?>">
                                                    <?=$jabatan_karyawan;?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Rekomendasi Tanggal
                                    
                                    </label>
                                    <div class="col-md-4">
                                        <input type="date" name="rekomendasi_tanggal_mutasi" class="form-control" placeholder="Enter Tanggal " required="">
                                        <input type="checkbox" data-toggle="collapse" data-target="#rotasi_mutasi" aria-expanded="false" aria-controls="rotasi_mutasi">Rotasi Lokasi Kerja
                                    </div>
                                </div>

                                <div class="collapse" id="rotasi_mutasi">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Lokasi Baru 
                                            
                                            </label>
                                            <div class="col-md-4">
                                                <select name="lokasi_struktur_4" class="form-control" id="lokasi_struktur_4">
                                                <option value="">-- Pilih Lokasi --</option>
                                                    <?php
                                                    foreach ($depo as $k)
                                                    {
                                                        echo "<option value='$k->depo_nama'>$k->depo_nama</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn blue"> <i class="fa fa-save"></i> Submit</button>
                                <a href="<?php echo site_url('historical_mutasi/index') ?>" class="btn grey-salsa btn-outline ajaxify"><i class="fa fa-arrow-circle-left"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/apps/scripts/historical_mutasi.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.HISTORICAL_MUTASI.handleSendData();
    window.HISTORICAL_MUTASI.handleBootstrapSelect();

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
                        $("input[name='no_urut']").val(value.no_urut);
                        $("input[name='nik']").val(value.nik_baru);
                        $("input[name='nama_karyawan_mutasi']").val(value.nama_karyawan_struktur);
                        $("input[name='jabatan_awal']").val(value.jabatan_struktur);
                        $("input[name='level_awal']").val(value.level_jabatan);
                        $("input[name='jabatan_tampil']").val(value.jabatan_karyawan);
                        $("input[name='pt_awal']").val(value.perusahaan_struktur);
                        $("input[name='dept_awal']").val(value.dept_struktur);
                        $("input[name='lokasi_awal']").val(value.lokasi_struktur);
                        $("input[name='lokasi_baru']").val(value.lokasi_struktur);
                        $("input[name='pt_baru']").val(value.perusahaan_struktur);
                        $("input[name='dept_baru']").val(value.dept_struktur);
                        $("input[name='level_baru']").val(value.level_jabatan);
                        $("input[name='jabatan_baru']").val(value.jabatan_struktur);
                        $("input[name='hasil_lokasi_struktur']").val(value.nik_baru.substring(-8, 2));
                        $("input[name='hasil_perusahaan_struktur']").val(value.nik_baru.substring(2, 4));
                        $("input[name='hasil_no_nik']").val(value.nik_baru.substring(4, 8));
                        $("input[name='hasil_mutasi_nik']").val(value.nik_baru.substring(8));
                    });
                },
            });
          }
     })

    // Memunculkan Kode Perusahaan Promosi
    $("#perusahaan_struktur").change(function () {
          if ($(this).val() != "") {
          var perusahaan_struktur=$('#perusahaan_struktur').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_perusahaan_promosi')?>",
                method: "POST",
                data: { 'perusahaan_struktur': perusahaan_struktur },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_perusahaan_struktur']").val(value.kode_perusahaan);
                        $("input[id='pt_baru']").val(value.perusahaan_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Perusahaan Demosi
    $("#perusahaan_struktur_2").change(function () {
          if ($(this).val() != "") {
          var perusahaan_struktur_2=$('#perusahaan_struktur_2').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_perusahaan_demosi')?>",
                method: "POST",
                data: { 'perusahaan_struktur_2': perusahaan_struktur_2 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_perusahaan_struktur']").val(value.kode_perusahaan);
                        $("input[id='pt_baru']").val(value.perusahaan_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Perusahaan Rotasi
    $("#perusahaan_struktur_3").change(function () {
          if ($(this).val() != "") {
          var perusahaan_struktur_3=$('#perusahaan_struktur_3').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_perusahaan_rotasi')?>",
                method: "POST",
                data: { 'perusahaan_struktur_3': perusahaan_struktur_3 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_perusahaan_struktur']").val(value.kode_perusahaan);
                        $("input[id='pt_baru']").val(value.perusahaan_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Perusahaan Mutasi
    $("#perusahaan_struktur_4").change(function () {
          if ($(this).val() != "") {
          var perusahaan_struktur_4=$('#perusahaan_struktur_4').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_perusahaan_mutasi')?>",
                method: "POST",
                data: { 'perusahaan_struktur_4': perusahaan_struktur_4 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_perusahaan_struktur']").val(value.kode_perusahaan);
                        $("input[id='pt_baru']").val(value.perusahaan_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Lokasi Promosi
    $("#lokasi_struktur").change(function () {
          if ($(this).val() != "") {
          var lokasi_struktur=$('#lokasi_struktur').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_lokasi_promosi')?>",
                method: "POST",
                data: { 'lokasi_struktur': lokasi_struktur },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_lokasi_struktur']").val(value.kode_nik_depo);
                        $("input[id='lokasi_baru']").val(value.depo_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Lokasi Demosi
    $("#lokasi_struktur_2").change(function () {
          if ($(this).val() != "") {
          var lokasi_struktur_2=$('#lokasi_struktur_2').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_lokasi_demosi')?>",
                method: "POST",
                data: { 'lokasi_struktur_2': lokasi_struktur_2 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_lokasi_struktur']").val(value.kode_nik_depo);
                        $("input[id='lokasi_baru']").val(value.depo_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Lokasi Rotasi
    $("#lokasi_struktur_3").change(function () {
          if ($(this).val() != "") {
          var lokasi_struktur_3=$('#lokasi_struktur_3').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_lokasi_rotasi')?>",
                method: "POST",
                data: { 'lokasi_struktur_3': lokasi_struktur_3 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_lokasi_struktur']").val(value.kode_nik_depo);
                        $("input[id='lokasi_baru']").val(value.depo_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Kode Lokasi Mutasi
    $("#lokasi_struktur_4").change(function () {
          if ($(this).val() != "") {
          var lokasi_struktur_4=$('#lokasi_struktur_4').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_lokasi_mutasi')?>",
                method: "POST",
                data: { 'lokasi_struktur_4': lokasi_struktur_4 },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='hasil_lokasi_struktur']").val(value.kode_nik_depo);
                        $("input[id='lokasi_baru']").val(value.depo_nama);
                    });
                },
            });
          }
     })

    // Memunculkan Departement Promosi
    $("#dept_baru_promosi").change(function () {
          if ($(this).val() != "") {
          var dept_baru_promosi=$('#dept_baru_promosi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_dept_promosi')?>",
                method: "POST",
                data: { 'dept_baru_promosi': dept_baru_promosi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='dept_baru']").val(value.nama_departement);
                    });
                },
            });
          }
     })

    // Memunculkan Departement Demosi
    $("#dept_baru_demosi").change(function () {
          if ($(this).val() != "") {
          var dept_baru_demosi=$('#dept_baru_demosi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_dept_demosi')?>",
                method: "POST",
                data: { 'dept_baru_demosi': dept_baru_demosi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='dept_baru']").val(value.nama_departement);
                    });
                },
            });
          }
     })

    // Memunculkan Departement Rotasi
    $("#dept_baru_rotasi").change(function () {
          if ($(this).val() != "") {
          var dept_baru_rotasi=$('#dept_baru_rotasi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_dept_rotasi')?>",
                method: "POST",
                data: { 'dept_baru_rotasi': dept_baru_rotasi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='dept_baru']").val(value.nama_departement);
                    });
                },
            });
          }
     })

    // Memunculkan Departement Mutasi
    $("#dept_baru_mutasi").change(function () {
          if ($(this).val() != "") {
          var dept_baru_mutasi=$('#dept_baru_mutasi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_kode_dept_mutasi')?>",
                method: "POST",
                data: { 'dept_baru_mutasi': dept_baru_mutasi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='dept_baru']").val(value.nama_departement);
                    });
                },
            });
          }
     })

    // Memunculkan Jabatan Promosi
    $("#jabatan_baru_promosi").change(function () {
          if ($(this).val() != "") {
          var jabatan_baru_promosi=$('#jabatan_baru_promosi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_jabatan_promosi')?>",
                method: "POST",
                data: { 'jabatan_baru_promosi': jabatan_baru_promosi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='jabatan_baru']").val(value.no_jabatan_karyawan);
                        $("input[id='level_baru']").val(value.level_jabatan);
                    });
                },
            });
          }
     })

    // Memunculkan Jabatan Demosi
    $("#jabatan_baru_demosi").change(function () {
          if ($(this).val() != "") {
          var jabatan_baru_demosi=$('#jabatan_baru_demosi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_jabatan_demosi')?>",
                method: "POST",
                data: { 'jabatan_baru_demosi': jabatan_baru_demosi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='jabatan_baru']").val(value.no_jabatan_karyawan);
                        $("input[id='level_baru']").val(value.level_jabatan);
                    });
                },
            });
          }
     })

    // Memunculkan Jabatan Rotasi
    $("#jabatan_baru_rotasi").change(function () {
          if ($(this).val() != "") {
          var jabatan_baru_rotasi=$('#jabatan_baru_rotasi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_jabatan_rotasi')?>",
                method: "POST",
                data: { 'jabatan_baru_rotasi': jabatan_baru_rotasi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='jabatan_baru']").val(value.no_jabatan_karyawan);
                        $("input[id='level_baru']").val(value.level_jabatan);
                    });
                },
            });
          }
     })

    // Memunculkan Jabatan Mutasi
    $("#jabatan_baru_mutasi").change(function () {
          if ($(this).val() != "") {
          var jabatan_baru_mutasi=$('#jabatan_baru_mutasi').val();
            $.ajax({
                url: "<?=base_url('historical_mutasi/tampil_jabatan_mutasi')?>",
                method: "POST",
                data: { 'jabatan_baru_mutasi': jabatan_baru_mutasi },
                dataType: "JSON",
                success:function(data){
                    $.each(data, function(index, value){
                        $("input[id='jabatan_baru']").val(value.no_jabatan_karyawan);
                        $("input[id='level_baru']").val(value.level_jabatan);
                    });
                },
            });
          }
     })

</script>