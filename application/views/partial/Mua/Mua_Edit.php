<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Mua</h3>
        <?php echo form_open_multipart('Mua/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryMuaDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nama Mua</td>
                <td>:</td>
                <td><input type="text" name="nama_mua" value="<?php echo $queryMuaDetail->nama_mua ?>"></td>
            </tr>
            <tr>
                <td>Alamat Mua</td>
                <td>:</td>
                <td><input type="text" name="alamat_mua" value="<?php echo $queryMuaDetail->alamat_mua ?>"></td>
            </tr>

            <tr>
                <td>Harga Mua</td>
                <td>:</td>
                <td><input type="text" name="harga" value="<?php echo $queryMuaDetail->harga ?>"></td>
            </tr>
            <tr>
                <td>Instagram</td>
                <td>:</td>
                <td><input type="text" name="instagram" value="<?php echo $queryMuaDetail->instagram ?>"></td>
            </tr>

            <tr>
                <td>Nomor Whatsapp</td>
                <td>:</td>
                <td><input type="text" name="whatsapp" value="<?php echo $queryMuaDetail->whatsapp ?>"></td>
            </tr>

            <tr>
                <td>Upload Gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" value="<?php echo $queryMuaDetail->gambar ?>"></td>
            </tr>

            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="deskripsi" value="<?php echo $queryMuaDetail->deskripsi ?>"></td>
            </tr>
           
            
            

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>










