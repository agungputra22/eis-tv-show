<form role="form" class="form-horizontal form-data-shift" method="post" action="<?php echo site_url('pengajuan_lembur/doInput_karyawan_lembur_all') ?>">
<div class="portlet-title">
    <div class="caption">
        <span class="caption-subject font-dark sbold uppercase">Data Shift</span>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No. </th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Departement</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>No. CO</th>
                <th><center> Jam Kerja </center> </th>
            </tr>
        </thead>
        <tbody id="detail_cart">
            <?php
            $no = 1;
            foreach ($this->cart->contents() as $row) {

                $nm = array();
                if ($this->cart->has_options($row['rowid']) == TRUE):
                    foreach ($this->cart->product_options($row['rowid']) as $option_name => $value):
                        $nm[$option_name] = $value;
                    endforeach;
                    // echo '<pre>';
                    // print_r($this->cart->product_options($row['rowid']));
                    // echo '</pre>';
                    // echo "HHH</br>";
                endif;

                echo form_hidden('rowid[]', $row['rowid']);
            ?>
            <tr>
                <td> <?php echo $no ?> </td>
                <td> 
                    <input type="hidden" name="nik_lembur1" readonly="" value="<?php echo $row['name'] ?>">
                    <input type="text" name="nik_lembur2[]" readonly="" value="<?php echo $row['name'] ?>">
                    <input type="hidden" name="submit_date1[]" readonly="" value="<?php echo $nm['submit_date'] ?>">
                    <input type="hidden" name="user_submit1[]" readonly="" value="<?php echo $nm['user_submit'] ?>">
                </td>
                <td> <input type="text" name="nama_karyawan_lembur1[]" readonly="" value="<?php echo $nm['nama_karyawan_lembur'] ?>"> </td>
                <td> <input type="text" name="jabatan_karyawan_lembur1[]" readonly="" value="<?php echo $nm['jabatan_karyawan_lembur'] ?>"> </td>
                <td> <input type="text" name="dept_karyawan_lembur1[]" readonly="" value="<?php echo $nm['dept_karyawan_lembur'] ?>"> </td>
                <td> <input type="text" name="lokasi_karyawan_lembur[]" readonly="" value="<?php echo $nm['lokasi_karyawan_lembur'] ?>"> </td>
                <td> <input type="text" name="tanggal_lembur1[]" readonly="" value="<?php echo $row['tanggal'] //DateToIndo(date($row['tanggal_shift'])); ?>"> </td>
                <td> <input type="text" name="keterangan_lembur[]" readonly="" value="<?php echo $nm['keterangan_lembur'] ?>"> </td>
                <td> <input type="text" name="no_co_lembur[]" readonly="" value="<?php echo $nm['no_co_lembur'] ?>"> </td>
                <td>
                    <select name="jam_kerja1[]" class="form-control">
                    <option value="">-- Pilih Shift --</option>
                        <?php
                        foreach ($jam_kerja as $k)
                        {
                            $sel = ($row['jam']==$k->id_shifting) ? 'selected' : '';
                            echo "<option value='$k->id_shifting' $sel>$k->waktu_masuk - $k->waktu_keluar</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <?php
            $no++;
            }
            ?>
        </tbody>
    </table>
</div>
<button type="submit" class="btn blue simpan-kerja"> <i class="fa fa-save"></i> Simpan </button>
</form>
<script src="<?php echo base_url('assets/apps/scripts/input_lembur.js') ?>" type="text/javascript"></script>
<script type="text/javascript">
    window.INPUT_LEMBUR.savePengalamankerja();
</script>