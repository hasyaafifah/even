<div class="content-wrapper">
    <h3>Data Promo</h3>

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
                    <?php echo form_open_multipart('Promo/fungsiTambah'); ?>

                    <input type="hidden" name="id" />

                    
                    

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Upload Gambar</label>
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
                        <th>Upload gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_array($queryAllPromo)) { ?>
                        <?php
                        $no = 1; ?>

                        <?php foreach ($queryAllPromo as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->gambar ?></td>

                                

                                <td>
                                    <!-- <a href="<?php echo base_url("/uploads/dokumen/$row->dokumen") ?>" class="btn btn-sm btn-primary" download><i class="fa fa-cancel">Download</i></a> -->
                                    <a href="<?php echo base_url('/Event/halaman_edit') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-cancel">Edit</i></a>
                                    <a href="<?php echo base_url('/Event/fungsiDelete') ?>/<?php echo $row->id ?>" class="btn btn-sm btn-danger" title="edit"><i class="fa fa-cancel">Delete</i></a>
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

<!-- <script>
    $('#submit').click(function() {
    alert(getChecklistItems());
});

function getChecklistItems() {
    var result = $("input:radio:checked").get();
    
    var data = $.map(result, function(fasilitas_gedung) {
        return $(fasilitas_gedung).val();
    });

    return data.join("-");
}
</script> -->
<!-- <script>
$('#submit').click(function() {
    var the_value;
    //the_value = jQuery('input:radio:checked').val();
    //the_value = jQuery('input[name=macro]:radio:checked').val();
    the_value = getChecklistItems();
    alert(the_value);
});

function getChecklistItems() {
    var result =
        $("tr.checklisttr > td > input:radio:checked").get();

    var columns = $.map(result, function(element) {
        return $(element).attr("id");
    });

    return columns.join("|");
}
</script> -->