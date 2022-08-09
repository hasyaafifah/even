<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?= $title_page; ?></h4>
          <?php if ($this->session->flashdata('msg_alert')) { ?>

            <div class="alert alert-info">
              <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
            </div>
          <?php } ?>
          <?= form_open_multipart('Dataadmin/edit' , array('method' => 'post')); ?>
          <input type="hidden" name="id_user" value="<?= $data_admin->id; ?>">
          <div class="row">
            <div class="col-md-6">
              <!-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" value="<?= $data_admin->nama; ?>" name="namalengkap" class="form-control" />
                </div>
              </div> -->
            </div>
            <div class="col-md-6">
              <!-- <div class="form-group row">
                <label class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-9">
                  <select name="type" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <option value="admin" <?= (($data_admin->id_role == '1') ? 'selected' : ''); ?>>Admin</option>
                    <option value="mua" <?= (($data_admin->id_role == '2') ? 'selected' : ''); ?>>vendor Mua</option>
                    <option value="gedung" <?= (($data_admin->id_role == '3') ? 'selected' : ''); ?>>vendor Gedung</option>
                  </select>
                </div>
              </div> -->
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" value="<?= $data_admin->username; ?>" name="username" class="form-control" />
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" placeholder="*********" />
                </div>
              </div>
            </div>
            <!-- <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Avatar</label>
                <div class="col-sm-9">
                  <input type="file" name="avatar">
                </div>
              </div>
            </div> -->
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Portofolio</label>
                <div class="col-sm-9">
                  <select name="portofolio" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <option value="sangat aktif">sangat aktif</option>
                    <option value="aktif">aktif</option>
                    <option value="kurang aktif">kurang aktif</option>
                    <!-- <option value="baak" <?= (($data_admin->type == 'baak') ? 'selected' : ''); ?>>Ka. BAAK</option> -->
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Followers</label>
                  <div class="col-sm-9">
                    <select name="followers" class="form-control">
                      <option disabled selected>-- Pilih --</option>
                      <option value="kurang dari 100k">kurang dari 100k</option>
                      <option value="lebih dari 100k">lebih dari 100k</option>
                      <option value="centang biru">centang biru</option>
                      <!-- <option value="baak" <?= (($data_admin->type == 'baak') ? 'selected' : ''); ?>>Ka. BAAK</option> -->
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Jumlah Followers</label>
                  <div class="col-sm-9">
                    <input type="text" name="jumlah_followers" class="form-control" />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <button type="submit" class="btn btn-success mr-2">Submit</button>
                  <button class="btn btn-light" type="reset">Reset</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <?= form_close(); ?>
      </div>
    </div>
  </div>