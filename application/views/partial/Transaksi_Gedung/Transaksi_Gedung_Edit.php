<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Transaksi gedung</h3>
        <?php echo form_open_multipart('Transaksi_Gedung/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryTgdgDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nama Mua</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $queryTgdgDetail->nama ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="text" name="email" value="<?php echo $queryTgdgDetail->email ?>"></td>
            </tr>

            <tr>
                <td>Nomor Hp</td>
                <td>:</td>
                <td><input type="text" name="no_hp" value="<?php echo $queryTgdgDetail->no_hp ?>"></td>
            </tr>
            <tr>
                <td>Keperluan</td>
                <td>:</td>
                <td><input type="text" name="keperluan" value="<?php echo $queryTgdgDetail->keperluan ?>"></td>
            </tr>

            <tr>
                <td>Nama Pemesan</td>
                <td>:</td>
                <td><input type="text" name="nama_pemesan" value="<?php echo $queryTgdgDetail->nama_pemesan ?>"></td>
            </tr>

            <tr>
                <td>Harga</td>
                <td>:</td>
                <td><input type="text" name="harga" value="<?php echo $queryTgdgDetail->harga ?>"></td>
            </tr>

            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" value="<?php echo $queryTgdgDetail->tanggal ?>"></td>
            </tr>

            <tr>
                <td>Bukti Transaksi</td>
                <td>:</td>
                <td><input type="file" name="gambar" value="<?php echo $queryTgdgDetail->gambar ?>"></td>
            </tr>


            
            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>










