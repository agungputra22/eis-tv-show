<div class="row">
    <div class="col-md-12">
        <!-- Begin: Datatable -->
        <div class="portlet light portlet-fit portlet-datatable">
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-dark sbold uppercase"><?php echo $title ?></span>
                </div>
                <?php
                    if ($vaksin['dosis_1']!==null and $vaksin['dosis_2']!==null and $vaksin['dosis_3']!==null) {
                        ?>
                        <div class="actions">
                            <b>Sertifikat Telah Di Upload</b>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="actions">
                            <a href="<?php echo site_url('self_covid/tambah_sertifikat') ?>" class="btn btn-circle green btn-outline btn-sm ajaxify"> 
                                <i class="fa fa-upload"></i> Upload Vaksin </a>
                        </div>
                        <?php
                    }
                ?>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <?php
                        if ($vaksin['dosis_1']!==null) {
                            ?>
                            <div class="col-md-4">
                                <div class="portlet light ">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <span class="caption-subject font-dark sbold uppercase">Vaksin 1</span>
                                        <tr>
                                            <td width="250" height="200">
                                                <img width="250" height="200" src="uploads/vaksin/<?=$vaksin['dokumen_1'];?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Vaksin : <?php echo DateToIndo($vaksin['dosis_1']) ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                    ?>

                    <?php
                        if ($vaksin['dosis_2']!==null) {
                            ?>
                            <div class="col-md-4">
                                <div class="portlet light ">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <span class="caption-subject font-dark sbold uppercase">Vaksin 2</span>
                                        <tr>
                                            <td width="250" height="200">
                                                <img width="250" height="200" src="uploads/vaksin/<?=$vaksin['dokumen_2'];?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Vaksin : <?php echo DateToIndo($vaksin['dosis_2']) ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                    ?>

                    <?php
                        if ($vaksin['dosis_3']!==null) {
                            ?>
                            <div class="col-md-4">
                                <div class="portlet light ">
                                    <table class="table table-striped table-bordered table-hover" >
                                        <span class="caption-subject font-dark sbold uppercase">Vaksin 3</span>
                                        <tr>
                                            <td width="250" height="200">
                                                <img width="250" height="200" src="uploads/vaksin/<?=$vaksin['dokumen_3'];?>"/>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><b>Tanggal Vaksin : <?php echo DateToIndo($vaksin['dosis_3']) ?></b></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <!-- End: Datatable -->
    </div>
</div>