<div class="content-wrapper">

    <div class="card">
        <h3>Edit Data Gedung</h3>
        <?php echo form_open_multipart('Gedung/fungsiEdit'); ?>
        <table>
            <tr>

                <td><input type="text" name="id" value="<?php echo $queryGdgDetail->id ?>" hidden></td>
            </tr>
            <tr>
                <td>Nama Gedung</td>
                <td>:</td>
                <td><input type="text" name="nama_gedung" value="<?php echo $queryGdgDetail->nama_gedung ?>"></td>
            </tr>
            <tr>
                <td>Alamat Gedung</td>
                <td>:</td>
                <td><input type="text" name="alamat_gedung" value="<?php echo $queryGdgDetail->alamat_gedung ?>"></td>
            </tr>
            <tr>
                <td>Luas Gedung</td>
                <td>:</td>
                <td><input type="text" name="luas_gedung" value="<?php echo $queryGdgDetail->luas_gedung ?>"></td>
            </tr>
            <tr>
                <td>Tipe Vanue</td>
                <td>:</td>
                <td>
                    <select id="tipe_vanue" name="tipe_vanue" value="<?php echo $queryGdgDetail->tipe_vanue ?>">
                        <option value="Aula">Aula/ Gedung Serbaguna/ Ballroom</option>
                        <option value="Tempat Ibadah">Tempat Ibadah</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Pantai">Pantai</option>
                        <option value="Taman">Taman / Kolam Renang</option>
                        <option value="Restoran">Restoran</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Fasilitas Gedung</td>
                <td>:</td>
                <td>
                   
                    <ol>
                            <li>
                                <input type="radio" name="fasilitas" id="fasilitas" value="wc" />wc umun 
                            </li>
                            <li>
                                <input type="radio" name="fasilitas" id="fasilitas" value="2" />parkiran luas
                            </li>
                            <li>
                                <input type="radio" name="fasilitas" id="fasilitas" value="3" />ac 2 pk
                            </li>
                        </ol>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Harga Gedung</td>
                <td>:</td>
                <td><input type="text" name="harga_gedung" value="<?php echo $queryGdgDetail->harga_gedung ?>"></td>
            </tr>
            <tr>
                <td>Upload Dokumen</td>
                <td>:</td>
                <td><input type="file" name="dokumen" value="<?php echo $queryGdgDetail->dokumen ?>"></td>
            </tr>
           
            
            

            <tr>
                <td colspan="5"><br><button type="submit" class="btn btn-success center">Update </button></td>
            </tr>
        </table>
        <?= form_close(); ?>
    </div>

</div>