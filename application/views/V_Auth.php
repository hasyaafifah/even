<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="<?= $this->security->get_csrf_token_name(); ?>" content="<?= $this->security->get_csrf_hash(); ?>">
  <meta name="description" content="SDM" />
  <meta name="author" content="Hasya Afifah Khoirunnisa" />
  <title>Login </title>
  <link rel="stylesheet" href="<?= assets_url('vendors/iconfonts/mdi/css/materialdesignicons.min.css'); ?>">
  <link rel="stylesheet" href="<?= assets_url('vendors/iconfonts/puse-icons-feather/feather.css'); ?>">
  <link rel="stylesheet" href="<?= assets_url('vendors/css/vendor.bundle.base.css'); ?>">
  <link rel="stylesheet" href="<?= assets_url('vendors/css/vendor.bundle.addons.css'); ?>">
  <link rel="stylesheet" href="<?= assets_url('css/style.css', false); ?>">
  <link rel="shortcut icon" href="<?= assets_url('images/favicon.png'); ?>" />

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">
              <?= form_open('auth/login', array('method' => 'post')); ?>
              <p class="text-center">
                <img src="<?= assets_url('logoptp4.png', false); ?>" width="135">
              </p>
              <marquee>Selamat Datang di Website Evenesia</marquee>
              <?php if ($this->session->flashdata('msg_alert')) { ?>

                <div class="alert alert-info">
                  <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
                </div>
              <?php } ?>
              <div class="form-group">
                <label class="label">E-Mail</label>
                <input type="text" name="email" class="form-control" placeholder="E-Mail">
              </div>
              <div class="form-group">
                <label class="label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="*********">
              </div>
              <!-- <div class="form-group">
                <center>
                  <div class="g-recaptcha" data-sitekey="6LftN2IUAAAAALCWS7KvM5zb913HfuR89PeQr04L"></div>
                </center>
              </div> -->

              <div class="form-group">
                <button class="btn btn-primary submit-btn btn-block">Masuk</button>
              </div>
              <div>
                <a href="<?= base_url("/Dataadmin/add_new_mua"); ?>" style="text-align: right;">Register</a>
              </div>
              <!-- <div class="form-group d-flex justify-content-between">

                <a href="<?= base_url('auth/lost_password'); ?>" class="text-small forgot-password text-black">Lupa password</a>
              </div> -->
              <?= form_close(); ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?= assets_url('vendors/js/vendor.bundle.base.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('vendors/js/vendor.bundle.addons.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/off-canvas.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/misc.js'); ?>"></script>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="<?= $this->security->get_csrf_token_name(); ?>"]').attr('content')
        },
        xhrFields: {
          withCredentials: true
        },
        dataType: 'json',
        cache: false
      });
    </script>
</body>

</html>