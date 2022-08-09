<div class="content-wrapper">
    <h3>Data Transaksi Mua</h3>

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
                    <?php echo form_open_multipart('Transaksi_Mua/fungsiTambah'); ?>

                    <input type="hidden" name="id" />

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nama Mua</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Status</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Jumlah Pax</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_pax" name="jumlah_pax">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Tanggal</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="timestamp" name="timestamp">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">nama_pemesan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">jam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jam" name="jam">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Nomor Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_hp" name="no_hp">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Bukti Transaksi</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar" name="gambar">
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
                        <th>Harga/th>
                        <th>Status</th>
                        <th>Jumlah Pax</th>
                        <th>Tanggal</th>
                        <th>Alamat</th>
                        <th>Nama Pemesan</th>
                        <th>Jam</th>
                        <th>Bukti Transaksi</th>
                        <th>Nomor Hp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllTmua)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllTmua as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->harga ?></td>
                                <td><?php echo $row->status ?></td>
                                <td><?php echo $row->jumlah_pax ?></td>
                                <td><?php echo $row->timestamp ?></td>
                                <td><?php echo $row->alamat ?></td>
                                <td><?php echo $row->nama_pemesan ?></td>
                                <td><?php echo $row->jam ?></td>
                                <td><?php echo $row->no_hp ?></td>
                                <td><?php echo $row->gambar ?></td>
                                

                                <td>
                                    
                                    <a href="<?php echo base_url('/Transaksi_Mua/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Transaksi_Mua/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
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

