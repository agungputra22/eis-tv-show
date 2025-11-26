<?php

// Master All Karyawan
function menu_master()
{
	?>
	<li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                    <span class="title">Absensi</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Long Shift</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">History Punishment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan/index_tilang') ?>" class="nav-link ajaxify">
                            <span class="title">History E-Tilang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
	<?php
}

function menu_master_pusat()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                    <span class="title">Absensi</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Long Shift</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master MECHANICAL
function menu_master_mechanical()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                    <span class="title">Absensi</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/index_mechanical') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Long Shift</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All SPV
function menu_master_spv()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Absensi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                            <span class="title">Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Long Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="nav-link ajaxify">
                            <span class="title">Form Long Shift</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                            <span class="title">View Long Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">Record Pembinaan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('historical_violance') ?>" class="nav-link ajaxify">
                            <span class="title">Cetak Pembinaan</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approve Resign</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Daily Activity</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity') ?>" class="nav-link ajaxify">
                            <span class="title">Personal</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All SPV Admin
function menu_master_spv_admin()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Absensi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                            <span class="title">Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Long Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="nav-link ajaxify">
                            <span class="title">Form Long Shift</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                            <span class="title">View Long Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">Record Pembinaan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('historical_violance') ?>" class="nav-link ajaxify">
                            <span class="title">Cetak Pembinaan</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approve Resign</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign_clearance/index_spv_admin') ?>" class="nav-link ajaxify">
                            <span class="title">Clearance Sheet</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Daily Activity</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity') ?>" class="nav-link ajaxify">
                            <span class="title">Personal</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All SPV
function menu_master_spv_pusat()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Absensi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                            <span class="title">Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Long Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="nav-link ajaxify">
                            <span class="title">Form Long Shift</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                            <span class="title">View Long Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">Record Pembinaan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('historical_violance') ?>" class="nav-link ajaxify">
                            <span class="title">Cetak Pembinaan</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/approve') ?>" class="nav-link ajaxify">
                            <span class="title">Approve Resign</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Daily Activity</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity') ?>" class="nav-link ajaxify">
                            <span class="title">Personal</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All Ass Manager
function menu_master_ass_man()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Absensi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                            <span class="title">Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Long Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="nav-link ajaxify">
                            <span class="title">Form Long Shift</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                            <span class="title">View Long Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">Record Pembinaan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('historical_violance') ?>" class="nav-link ajaxify">
                            <span class="title">Cetak Pembinaan</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approve Resign</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Daily Activity</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity') ?>" class="nav-link ajaxify">
                            <span class="title">Personal</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All Ass Manager
function menu_master_ass_man_pusat()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Data Diri</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Absensi</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk') ?>" class="nav-link ajaxify">
                            <span class="title">Pribadi</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('absensi_masuk/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Izin</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('non_full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Cuti</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan') ?>" class="nav-link ajaxify">
                            <span class="title">Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus') ?>" class="nav-link ajaxify">
                            <span class="title">Khusus</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_tahunan/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Tahunan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('cuti_khusus/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approval Cuti Khusus</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Long Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift/index_atasan') ?>" class="nav-link ajaxify">
                            <span class="title">Form Long Shift</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('long_shift') ?>" class="nav-link ajaxify">
                            <span class="title">View Long Shift</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_pkwt') ?>" class="nav-link ajaxify">
                    <span class="title">Kontrak Kerja</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                    <span class="title">Pembinaan Karyawan</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Pembinaan Karyawan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('pembinaan_karyawan') ?>" class="nav-link ajaxify">
                            <span class="title">Record Pembinaan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('historical_violance') ?>" class="nav-link ajaxify">
                            <span class="title">Cetak Pembinaan</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Resign</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign') ?>" class="nav-link ajaxify">
                            <span class="title">Form Pengajuan</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/approve_level_2') ?>" class="nav-link ajaxify">
                            <span class="title">Approve Resign</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('resign/index_serah_terima') ?>" class="nav-link ajaxify">
                            <span class="title">Serah Terima</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Daily Activity</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity') ?>" class="nav-link ajaxify">
                            <span class="title">Personal</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('daily_activity/index_bawahan') ?>" class="nav-link ajaxify">
                            <span class="title">Team</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="https://payme.tvip.co.id/slip_eis/" target='_blank' class="nav-link">
                    <span class="title">Slip Gaji</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Covid-19</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid') ?>" class="nav-link ajaxify">
                            <span class="title">Self Assessment</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                            <span class="title">Sertifikat Vaksin</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <?php
}

// Master All Karyawan TKBM
function menu_master_tkbm()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Personal</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <!-- <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Dinas</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_full_day') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Full Day</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('dinas_non_full') ?>" class="nav-link ajaxify">
                            <span class="title">Dinas Non Full Day</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <li class="nav-item  ">
                <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
                    <span class="title">Reset Password</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('self_covid/index_vaksin') ?>" class="nav-link ajaxify">
                    <span class="title">Sertifikat Vaksin</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

function menu_view_shift()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">View Shift</span>
        </a>
    </li>
    <?php
}

// Menu Lembur Petty Cashier
function menu_lembur_stpl()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('stpl') ?>" class="nav-link ajaxify">
            <i class="icon-layers"></i>
            <span class="title">Print STPL</span>
        </a>
    </li>
    <?php
}

// Menu Lembur Supervisor
function menu_lembur_level_1()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('pengajuan_lembur/index_pengajuan_lembur') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">Pengajuan Karyawan Lembur</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-pencil"></i>
            <span class="title">Form Pengajuan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('pengajuan_lembur/index_pengajuan_lembur') ?>" class="nav-link ajaxify">
                    <span class="title">Form Lembur</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('piutang') ?>" class="nav-link ajaxify">
                    <span class="title">Form Piutang</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Lembur BM atau Ka. Dept
function menu_lembur_level_2()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('pengajuan_lembur') ?>" class="nav-link ajaxify">
            <i class="icon-layers"></i>
            <span class="title">Pengajuan DPL</span>
        </a>
    </li>
    <?php
}

// Menu Lembur FA & PC Manager
function menu_lembur_level_3()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('pengajuan_lembur/event_pembayaran') ?>" class="nav-link ajaxify">
            <i class="icon-layers"></i>
            <span class="title">Pengajuan RPL</span>
        </a>
    </li>
    <?php
}

function menu_penilaian()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('') ?>" class="nav-link ajaxify">
            <i class="icon-layers"></i>
            <span class="title">Penilaian KPI</span>
        </a>
    </li>
    <?php
}

function menu_kompetensi()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('') ?>" class="nav-link ajaxify">
            <i class="icon-bulb"></i>
            <span class="title">Kompetensi</span>
        </a>
    </li>
    <?php
}

// Menu Kalender Karyawan
function menu_kalender()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('kalender') ?>" class="nav-link ajaxify">
            <i class="icon-calendar"></i>
            <span class="title">Kalender Kerja</span>
        </a>
    </li>
    <?php
}

function menu_karyawan_backup()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('karyawan_backup') ?>" class="nav-link ajaxify">
            <i class="icon-user"></i>
            <span class="title">Karyawan BackUp</span>
        </a>
    </li>
    <?php
}

function menu_reward()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('') ?>" class="nav-link ajaxify">
            <i class="icon-docs"></i>
            <span class="title">Reward</span>
        </a>
    </li>
    <?php
}

function menu_pengembangan()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('') ?>" class="nav-link ajaxify">
            <i class="icon-docs"></i>
            <span class="title">Program Pengembangan</span>
        </a>
    </li>
    <?php
}

function menu_paraturan()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('') ?>" class="nav-link ajaxify">
            <i class="glyphicon glyphicon-warning-sign"></i>
            <span class="title">Peraturan Perusahaan</span>
        </a>
    </li>
    <?php
}

// Menu Pengaturan SPV CRL SUPERVISOR
function menu_pengaturan_spv_crl()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Shift Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Create Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/mandatori_spv_crl') ?>" class="nav-link ajaxify">
                            <span class="title">Mandatori</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/index_karyawan_spv_crl') ?>" class="nav-link ajaxify">
                            <span class="title">Optional</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
                    <span class="title">View Shift</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Pengaturan SPV UP ALL
function menu_pengaturan()
{
	?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Shift Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Buat Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/mandatori') ?>" class="nav-link ajaxify">
                            <span class="title">Wajib</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/index_karyawan_shift') ?>" class="nav-link ajaxify">
                            <span class="title">Revisi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Lihat Shift</span>
                </a>
            </li>
        </ul>
    </li>
	<?php
}

// Menu Pengaturan SPV UP ALL
function menu_pengaturan_permintaan()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Shift Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Buat Shift</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/mandatori_permintaan') ?>" class="nav-link ajaxify">
                            <span class="title">Wajib</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/index_karyawan_shift_permintaan') ?>" class="nav-link ajaxify">
                            <span class="title">Revisi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Lihat Shift</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

function menu_pengaturan_on_off()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">Sabtu ON OFF</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Buat ON OFF</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/mandatori_on_off') ?>" class="nav-link ajaxify">
                            <span class="title">Wajib</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_shift/index_karyawan_on_off') ?>" class="nav-link ajaxify">
                            <span class="title">Revisi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
                    <span class="title">Lihat ON OFF</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

function menu_pengaturan_on_off_am()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-settings"></i>
            <span class="title">ON OFF Pusat</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift/mandatori_on_off') ?>" class="nav-link ajaxify">
                    <span class="title">Input ON OFF</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_shift') ?>" class="nav-link ajaxify">
                    <span class="title">View ON OFF</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

//Menu Absen Manual All
function menu_absen_manual()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('manual_absen') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">Form Absen Manual</span>
        </a>
    </li>
    <?php
}

//Menu Absen Manual Atasan 1
function menu_absen_manual_1()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-pencil"></i>
            <span class="title">Form Absen Manual</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_absen') ?>" class="nav-link ajaxify">
                    <span class="title">Manual Absen</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_absen/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approval Absen</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

//Menu Absen Manual Atasan 2
function menu_absen_manual_2()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-pencil"></i>
            <span class="title">Form Absen Manual</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_absen') ?>" class="nav-link ajaxify">
                    <span class="title">Manual Absen</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_absen/approve_level_2') ?>" class="nav-link ajaxify">
                    <span class="title">Approval Absen</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

//Menu Pengajuan Seragam
function menu_pengajuan_seragam()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('seragam') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">Form Pengajuan Seragam</span>
        </a>
    </li>
    <?php
}

//Menu Pengajuan Seragam CRL
function menu_pengajuan_seragam_crl()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('seragam/index_crl') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">Form Pengajuan Seragam</span>
        </a>
    </li>
    <?php
}

//Menu Pengajuan Seragam SPV Admin
function menu_pengajuan_seragam_spvadmin()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Form Pengajuan Seragam</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('seragam') ?>" class="nav-link ajaxify">
                    <span class="title">Permintaan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('seragam/index_pengembalian') ?>" class="nav-link ajaxify">
                    <span class="title">Pengembalian</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

//Menu Kebutuhan Karyawan
function menu_kebutuhan_karyawan()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_backup') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BackUp</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_project') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan Project</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_bko') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BKO</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

function menu_kebutuhan_karyawan_wuh()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_backup') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BackUp</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <span class="title">Karyawan Perbantuan</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_project') ?>" class="nav-link ajaxify">
                            <span class="title">TKBM Reguler</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="<?php echo site_url('karyawan_project/index_tkbm') ?>" class="nav-link ajaxify">
                            <span class="title">TKBM Perbantuan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_bko') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan Project</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

//Menu Kebutuhan Karyawan Pusat
function menu_kebutuhan_karyawan_pusat()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-user"></i>
            <span class="title">Karyawan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_backup') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BackUp</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_project/index') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan Project</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_bko') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BKO</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Punishment S & D
function menu_punishmnet_sd()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('pembinaan_karyawan/index_karyawan_sd') ?>" class="nav-link ajaxify">
            <i class="icon-layers"></i>
            <span class="title">Punishment Karyawan</span>
        </a>
    </li>
    <?php
}

// Menu Tarikan Absen
function tarikan_absen()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('tarikan_absen') ?>" class="nav-link ajaxify">
            <i class="icon-printer"></i>
            <span class="title">Tarikan Absen</span>
        </a>
    </li>
    <?php
}

// Menu Pengaturan S & D
function menu_pengaturan_sd()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('karyawan_shift/index_karyawan_dept_sd') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">View Shift Karyawan</span>
        </a>
    </li>
    <?php
}

// Master Direksi
function menu_master_direksi()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('full_day/approve') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Izin Full Day</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="<?php echo site_url('non_full_day/approve') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Izin Non Full Day</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="<?php echo site_url('cuti_tahunan/approve') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Cuti Tahunan</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="<?php echo site_url('cuti_khusus/approve') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Cuti Khusus</span>
        </a>
    </li>
    <li class="nav-item  ">
        <a href="<?php echo site_url('setting_pass') ?>" class="nav-link ajaxify">
            <i class="icon-refresh"></i>
            <span class="title">Reset Password</span>
        </a>
    </li>
    <?php
}

// Menu Mutasi Rotasi
function menu_mutasi_rotasi()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-layers"></i>
            <span class="title">Mutasi dan Rotasi</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_mutasi') ?>" class="nav-link ajaxify">
                    <span class="title">Form Mutasi dan Rotasi</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_mutasi/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approve Mutasi dan Rotasi</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Log Visit HR
function menu_log_visit_hr()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('log_visit') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Log Visit</span>
        </a>
    </li>
    <?php
}

// Menu Log Visit Admin
function menu_log_visit_admin()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('log_visit/index_admin') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Log Visit Admin</span>
        </a>
    </li>
    <?php
}

// Menu In Out Security
function menu_security()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-layers"></i>
            <span class="title">IN OUT</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_backup/index_security') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan BackUp</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_project/index_pusat') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan Project</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('karyawan_bko') ?>" class="nav-link ajaxify">
                    <span class="title">Karyawan WTP</span>
                </a>
            </li> -->
        </ul>
    </li>
    <?php
}

// Menu Kontak
function menu_kontak()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('kontak') ?>" class="nav-link ajaxify">
            <i class="icon-user"></i>
            <span class="title">Kontak HR Executive</span>
        </a>
    </li>
    <?php
}

// Menu Ketentuan & SOP
function menu_ketentuan()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Panduan Penggunaan</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book') ?>" class="nav-link ajaxify">
                    <span class="title">Pengajuan Izin</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book/absen') ?>" class="nav-link ajaxify">
                    <span class="title">Absensi</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book/approval') ?>" class="nav-link ajaxify">
                    <span class="title">Approval</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book/shifting') ?>" class="nav-link ajaxify">
                    <span class="title">Shifting</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book/survey') ?>" class="nav-link ajaxify">
                    <span class="title">Survey Kepuasan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('manual_book/assessment') ?>" class="nav-link ajaxify">
                    <span class="title">Assessment JobDesk & KPI</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Surat Keterangan Kerja
function menu_surat_keterangan_kerja()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('surat_keterangan') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Surat Keterangan Kerja</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Keterangan Kerja SPV Up
function menu_surat_keterangan_kerja_spv()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Surat Keterangan Kerja</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('surat_keterangan') ?>" class="nav-link ajaxify">
                    <span class="title">Form Pengajuan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('surat_keterangan/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approval Pengajuan</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Permintaan Tenaga Kerja
function menu_permintan_tenaga_kerja()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Permintaan Tenaga Kerja</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk') ?>" class="nav-link ajaxify">
                    <span class="title">Form Pengajuan PTK</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approve PTK</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Permintaan Assman
function menu_permintan_tenaga_kerja_asman()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Permintaan Tenaga Kerja</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk') ?>" class="nav-link ajaxify">
                    <span class="title">Form Pengajuan PTK</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approve PTK</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/index_work_load') ?>" class="nav-link ajaxify">
                    <span class="title">Work Load Jabatan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/index_jobdesc') ?>" class="nav-link ajaxify">
                    <span class="title">JobDesc Jabatan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/index_kpi') ?>" class="nav-link ajaxify">
                    <span class="title">KPI Jabatan</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Permintaan Assman
function menu_permintan_tenaga_kerja_manager()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Permintaan Tenaga Kerja</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk') ?>" class="nav-link ajaxify">
                    <span class="title">Form Pengajuan PTK</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/approve') ?>" class="nav-link ajaxify">
                    <span class="title">Approve PTK</span>
                </a>
            </li>
            <!-- <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/index_work_load_manager') ?>" class="nav-link ajaxify">
                    <span class="title">Work Load Jabatan</span>
                </a>
            </li> -->
        </ul>
    </li>
    <?php
}

// Menu Gallup
function menu_gallup()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Survey & Assessment</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('gallup') ?>" class="nav-link ajaxify">
                    <span class="title">Survey Kepuasan Karyawan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('gallup/index_essay') ?>" class="nav-link ajaxify">
                    <span class="title">Assessment Jobdesc & KPI</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}


// Menu Gallup
function menu_gallup_spv()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">Survey & Assessment</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('gallup') ?>" class="nav-link ajaxify">
                    <span class="title">Survey Kepuasan Karyawan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('gallup/index_essay') ?>" class="nav-link ajaxify">
                    <span class="title">Assessment Jobdesc & KPI</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('gallup/index_essay_spv') ?>" class="nav-link ajaxify">
                    <span class="title">Penilaian Assessment Jobdesc & KPI</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Surat Clearance Sheet ICT
function menu_clearance_sheet_ict()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_ict') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Clearance Sheet FA
function menu_clearance_sheet_fa()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_fa') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Clearance Sheet WO
function menu_clearance_sheet_wop()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_wop') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Clearance Sheet HRD
function menu_clearance_sheet_hrd()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_hrd') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Clearance Sheet GA
function menu_clearance_sheet_ga()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_ga') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Surat Clearance Sheet QMS
function menu_clearance_sheet_qms()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('resign_clearance/index_qms') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">Clearance Sheet</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Atasan IPP & Target Terukur
function menu_performance()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-book"></i>
            <span class="title">KPI & IPP</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('kpi') ?>" class="nav-link ajaxify">
                    <span class="title">Master KPI</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('performance') ?>" class="nav-link ajaxify">
                    <span class="title">Data Master IPP</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('performance/index_perbulan') ?>" class="nav-link ajaxify">
                    <span class="title">Report Perbulan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('performance/index_ipp') ?>" class="nav-link ajaxify">
                    <span class="title">Form IPP</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu Target Terukur
function menu_target_terukur()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('performance/index_target_terukur') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">IPP</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu IPP
function menu_ipp()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('performance/index_ipp') ?>" class="nav-link ajaxify">
            <i class="fa fa-book"></i>
            <span class="title">IPP</span>
            <span class="arrow"></span>
        </a>
    </li>
    <?php
}

// Menu Refund
function menu_refund()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="fa fa-money"></i>
            <span class="title">Refund Absen</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('refund') ?>" class="nav-link ajaxify">
                    <span class="title">Pengajuan</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('refund/index_ba') ?>" class="nav-link ajaxify">
                    <span class="title">Pembuatan BA</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}

// Menu FAR Piutang
function menu_far_piutang()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('piutang/index_atasan') ?>" class="nav-link ajaxify">
            <i class="fa fa-file"></i>
            <span class="title">FAR Karyawan</span>
        </a>
    </li>
    <?php
}

// Menu Log Visit ICT Support
function menu_log_support_ict()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('log_ict_support/index') ?>" class="nav-link ajaxify">
            <i class="icon-eye"></i>
            <span class="title">Log Support ICT</span>
        </a>
    </li>
    <?php
}

// Menu Update Data Karyawan
function menu_detail_karyawan()
{
    ?>
    <li class="nav-item  ">
        <a href="<?php echo site_url('karyawan/edit_detail') ?>" class="nav-link ajaxify">
            <i class="icon-pencil"></i>
            <span class="title">Update Data</span>
        </a>
    </li>
    <?php
}

// Menu Approval HR
function menu_approval_hr()
{
    ?>
    <li class="nav-item  ">
        <a href="javascript:;" class="nav-link nav-toggle">
            <i class="icon-pencil"></i>
            <span class="title">Approval HR</span>
            <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
            <li class="nav-item  ">
                <a href="<?php echo site_url('historical_violance/index_approval_v2') ?>" class="nav-link ajaxify">
                    <span class="title">Violance</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="<?php echo site_url('ptk/indexApprovalHr') ?>" class="nav-link ajaxify">
                    <span class="title">PTK</span>
                </a>
            </li>
        </ul>
    </li>
    <?php
}