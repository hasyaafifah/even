<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Gedung</h3>
        <?php echo form_open_multipart('Event/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryEventDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul" value="<?php echo $queryEventDetail->judul ?>"></td>
            </tr>
            <tr>
                <td>Upload gambar</td>
                <td>:</td>
                <td><input type="file" name="gambar" value="<?php echo $queryEventDetail->gambar ?>"></td>
            </tr>
            

            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="harga_gedung" value="<?php echo $queryEventDetail->deskripsi ?>"></td>
            </tr>
            <tr>
                <td>Link</td>
                <td>:</td>
                <td><input type="text" name="gambar" value="<?php echo $queryEventDetail->link ?>"></td>
            </tr>
           
            
            

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>