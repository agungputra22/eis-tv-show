<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form ">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-red"></i>
                    <span class="caption-subject font-red sbold uppercase"><?php echo $title ?></span>
                </div>
                <div class="actions">
                    <a href="<?php echo site_url('resign/index') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                    <i class="fa fa-arrow-circle-left font-green"></i> Kembali </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="col-lg-12">
                    <div class="portlet light portlet-fit ">
                        <div class="portlet-body">
                            <div class="mt-element-list">
                                <div class="mt-list-head list-simple font-white bg-red">
                                    <div class="list-head-title-container">
                                        <h3 class="list-title">Resign</h3>
                                    </div>
                                </div>
                                <div class="mt-list-container list-simple">
                                    <ul>
                                    <?php 
                                    foreach ($submit as $row) {
                                        ?>
                                        <li class="mt-list-item">
                                            <div class="list-icon-container done">
                                                <i class="icon-check"></i>
                                            </div>
                                            <div class="list-datetime"><?php echo DateToIndo($row['submit_date']) ?></div>  
                                            <div class="list-item-content">
                                                <h3 class="uppercase">
                                                    <a href="javascript:;">Tanggal Submit</a>
                                                </h3>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <?php 
                                    foreach ($submit as $row) {
                                        ?>
                                        <li class="mt-list-item">
                                            <div class="list-icon-container done">
                                                <i class="icon-check"></i>
                                            </div>
                                            <div class="list-datetime"><?php echo DateToIndo($row['tanggal_pengajuan']) ?></div>  
                                            <div class="list-item-content">
                                                <h3 class="uppercase">
                                                    <a href="javascript:;">Tanggal Pengajuan</a>
                                                </h3>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <?php 
                                    foreach ($submit as $row) {
                                        ?>
                                        <li class="mt-list-item">
                                            <?php
                                                if ($row['tanggal_efektif_resign'] != null) {
                                                    ?>
                                                    <div class="list-icon-container done">
                                                        <i class="icon-check"></i>
                                                    </div>
                                                    <div class="list-datetime"><?php echo DateToIndo($row['tanggal_efektif_resign']) ?></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="list-icon-container">
                                                        <i class="icon-close"></i>
                                                    </div>
                                                    <?php
                                                }
                                            ?>  
                                            <div class="list-item-content">
                                                <h3 class="uppercase">
                                                    <a href="javascript:;">Tanggal Efektif Resign</a>
                                                </h3>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <?php 
                                    foreach ($submit as $row) {
                                        ?>
                                        <li class="mt-list-item">
                                            <?php
                                                if ($row['status_atasan'] == 1) {
                                                    ?>
                                                    <div class="list-icon-container done">
                                                        <i class="icon-check"></i>
                                                    </div>
                                                    <div class="list-datetime"><?php echo DateToIndo($row['tanggal']) ?></div>
                                                    <?php
                                                } elseif ($row['status_atasan'] == 2) {
                                                    ?>
                                                    <div class="list-icon-container">
                                                        <i class="icon-close"></i>
                                                    </div>
                                                    <div class="list-datetime"><?php echo DateToIndo($row['tanggal']) ?></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="list-icon-container">
                                                        <i class="icon-close"></i>
                                                    </div>
                                                    <?php
                                                }
                                            ?>  
                                            <?php
                                                if ($row['status_atasan'] == 1) {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 1 (APPROVE)</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                } elseif($row['status_atasan'] == 2) {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 1 (NOT APPROVE)</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 1</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                }
                                            ?>  
                                        </li>
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    foreach ($submit as $row) {
                                        ?>
                                        <li class="mt-list-item">
                                            <?php
                                                if ($row['status_atasan_2'] == 1) {
                                                    ?>
                                                    <div class="list-icon-container done">
                                                        <i class="icon-check"></i>
                                                    </div>
                                                    <div class="list-datetime"><?php echo DateToIndo($row['tanggal_2']) ?></div>
                                                    <?php
                                                } elseif ($row['status_atasan_2'] == 2) {
                                                    ?>
                                                    <div class="list-icon-container">
                                                        <i class="icon-close"></i>
                                                    </div>
                                                    <div class="list-datetime"><?php echo DateToIndo($row['tanggal_2']) ?></div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="list-icon-container">
                                                        <i class="icon-close"></i>
                                                    </div>
                                                    <?php
                                                }
                                            ?>  
                                            <?php
                                                if ($row['status_atasan_2'] == 1) {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 2 (APPROVE)</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                } elseif($row['status_atasan_2'] == 2) {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 2 (NOT APPROVE)</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <div class="list-item-content">
                                                        <h3 class="uppercase">
                                                            <a href="javascript:;">Approval Atasan 2</a>
                                                        </h3>
                                                    </div>
                                                    <?php
                                                }
                                            ?>  
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                foreach ($submit as $row) {
                    if ($row['status_atasan_2'] == 1) {
                        ?>
                        <div class="col-md-12">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box yellow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-comments"></i>Pendukung Resign
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr align='center'>
                                                    <td rowspan='2' class='danger'> Pengambilan Cuti </td>
                                                    <td colspan='3' class='danger'> Kelengkapan Dokumen </td>
                                                </tr>
                                                <tr align='center'>
                                                    <!-- <td class='success'> Kuisioner </td> -->
                                                    <td class='success'> Exit Interview </td>
                                                    <td class='success'> Form Serah Terima </td>
                                                    <td class='success'> Clearance Sheet </td>
                                                </tr>
                                                <tr align='center'>
                                                    <td align="center">
                                                        <?php
                                                        if ($row['status_cuti']=='0') {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/setting_cuti/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Setting Cuti
                                                            </a> &nbsp;
                                                            <?php
                                                        } elseif ($row['status_cuti']=='1') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm green" disabled='disabled'>
                                                                CLOSE
                                                            </a> &nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/setting_cuti/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Setting Cuti
                                                            </a> &nbsp;
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <!-- <td align="center">
                                                        <?php
                                                        if ($row['status_kuisioner']=='0') {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/form_kuisioner/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Form Kuisioner
                                                            </a> &nbsp;
                                                            <?php
                                                        } elseif ($row['status_kuisioner']=='1') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm green" disabled='disabled'>
                                                                CLOSE
                                                            </a> &nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/form_kuisioner/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Form Kuisioner
                                                            </a> &nbsp;
                                                            <?php
                                                        }
                                                        ?>
                                                    </td> -->
                                                    <td align="center">
                                                        <?php
                                                        if ($row['status_exit']=='0') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm yellow" disabled='disabled'>
                                                                OPEN
                                                            </a> &nbsp;
                                                            <?php
                                                        } elseif ($row['status_exit']=='1') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm green" disabled='disabled'>
                                                                CLOSE
                                                            </a> &nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="#" class="btn btn-sm yellow" disabled='disabled'>
                                                                OPEN
                                                            </a> &nbsp;
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        if ($row['status_serah_terima']=='0') {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/form_serah_terima/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Form Serah Terima
                                                            </a> &nbsp;
                                                            <?php
                                                        } elseif ($row['status_serah_terima']=='1') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm green" disabled='disabled'>
                                                                CLOSE
                                                            </a> &nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="<?php echo site_url('resign/form_serah_terima/'.$row['nik_baru']) ?>" class="btn btn-sm yellow ajaxify">
                                                                Form Serah Terima
                                                            </a> &nbsp;
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td align="center">
                                                        <?php
                                                        if ($row['status_clearance']=='0') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm yellow" disabled='disabled'>
                                                                OPEN
                                                            </a> &nbsp;
                                                            <?php
                                                        } elseif ($row['status_clearance']=='1') {
                                                            ?>
                                                            <a href="#" class="btn btn-sm green" disabled='disabled'>
                                                                CLOSE
                                                            </a> &nbsp;
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <a href="#" class="btn btn-sm yellow" disabled='disabled'>
                                                                OPEN
                                                            </a> &nbsp;
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>

                        &nbsp; &nbsp;
                        <div class="form-group">
                            <label class="col-md-12 control-label font-red">* Segala akun yang anda miliki dalam perusahaan TVIP & ASA akan dinonaktifkan terakhir pada tanggal <b><?php echo DateToIndo_new($row['tanggal_efektif_resign'])?></b>
                            </label>
                        </div>

                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>
</div>