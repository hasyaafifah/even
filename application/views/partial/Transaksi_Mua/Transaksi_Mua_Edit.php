<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Mua</h3>
        <?php echo form_open_multipart('Transaksi_Mua/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryTmuaDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nama Mua</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $queryTmuaDetail->nama ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga" value="<?php echo $queryTmuaDetail->harga ?>"></td>
            </tr>

            <tr>
                <td>Status</td>
                <td>:</td>
                <td><input type="text" name="status" value="<?php echo $queryTmuaDetail->status ?>"></td>
            </tr>
            <tr>
                <td>Jumlah pax</td>
                <td>:</td>
                <td><input type="text" name="jumlah_pax" value="<?php echo $queryTmuaDetail->jumlah_pax ?>"></td>
            </tr>

            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="timestamp" value="<?php echo $queryTmuaDetail->timestamp ?>"></td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text" name="alamat" value="<?php echo $queryTmuaDetail->alamat ?>"></td>
            </tr>

            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><input type="text" name="nama_pemesan" value="<?php echo $queryTmuaDetail->nama_pemesan ?>"></td>
            </tr>

            <tr>
                <td>Jam</td>
                <td>:</td>
                <td><input type="text" name="jam" value="<?php echo $queryTmuaDetail->jam ?>"></td>
            </tr>

            <tr>
                <td>Nomor Hp</td>
                <td>:</td>
                <td><input type="text" name="no_hp" value="<?php echo $queryTmuaDetail->no_hp ?>"></td>
            </tr>

            <tr>
                <td>Bukti Transaksi</td>
                <td>:</td>
                <td><input type="file" name="gambar" value="<?php echo $queryTmuaDetail->gambar ?>"></td>
            </tr>
           
            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>










