<div class="content-wrapper">
    <h3>Data Mua</h3>

    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah data
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('Index_Mua/fungsiTambah'); ?>

                    <input type="hidden" name="id" />

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama Mua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_mua" name="nama_mua">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Alamat Mua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat_mua" name="alamat_mua">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="instagram" name="instagram">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Namor Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Dokumen</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="dokumen" name="dokumen">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambah</button>
                </div>

                <?= form_close(); ?>
            </div>

        </div>
    </div>


    <div class="table-responsive">
        <p>
        <div class="tabel">
            <table id="example" class="data table table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mua</th>
                        <th>Alamat Mua</th>
                        <th>harga</th>
                        <th>instagram</th>
                        <th>Nomor whatsapp</th>
                        <th>Upload Dokumen</th>
                        <th>Deskripsir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllMua)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllMua as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama_mua ?></td>
                                <td><?php echo $row->alamat_mua ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td><?php echo $row->instagram ?></td>
                                <td><?php echo $row->whatsapp ?></td>
                                <td><?php echo $row->dokumen ?></td>
                                <td><?php echo $row->deskripsi ?></td>
                                <td><?php echo $row->dokumen ?></td>
                                

                                <td>
                                    <a href="<?php echo base_url("/uploads/dokumen/$row->dokumen") ?>" class="btn btn-sm btn-primary" download><i class="fa fa-cancel">Download</i></a>
                                    <a href="<?php echo base_url('/Index_Mua/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Index_Mua/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
                                </td>
                            </tr>


                        <?php endforeach ?>
                    <?php } else { ?>
                        <td colspan="7" align="center"><strong>Data Kosong</strong></td>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        </p>
    </div>
</div>

