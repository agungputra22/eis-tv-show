<?php if(!empty($list)): ?>
    <div class="alert alert-info">
        <h4>Daftar event pada tanggal "<b><?=$tanggal_event?></b>":</h4>
    </div>
    <div class="table-responsive">
        <p class="popup-notice">Jumlah: <b><?=$total_event?> Kegiatan</b></p><br>
        <table class="table table-bordered" id="event-list-table">
            <tr>
                <th>No</th>
                <th style="width: 30%;">Nama Kegiatan</th>
                <th style="width: 20%;">Tanggal Kegiatan</th>
                <th>Deskripsi</th>
            </tr>
            <?php $i=1; foreach ($list as $l): ?>
                <tr data-id="<?=$l['id']?>">
                    <td><?=$i?></td>
                    <td>
                        <?=$l['name']?>
                    </td>
                    <td>
                        <?=$l['birth_date']?>
                    </td>
                    <td>
                        <?=$l['deskripsi']?>
                    </td>
                </tr>
            <?php $i++; endforeach; ?>
        </table>
    </div>
<?php else: ?>
    <p class="popup-notice">Belum ada events untuk tanggal "<b><?=$tanggal_event?></b>"</p><br>
<?php endif; ?>