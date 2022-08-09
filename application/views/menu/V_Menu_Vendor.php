<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <div class="nav-link">
        <div class="user-wrapper" style="margin-bottom: 0px;">
          <div class="profile-image">
            <img src="<?= $user_avatar; ?>" alt="profile image">
          </div>
          <div class="text-wrapper">
            <p class="profile-name"><?= $user_name; ?></p>
            <div>
              <small class="designation text-muted">Vendor</small>
            </div>
          </div>
        </div>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('dashboard'); ?>">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Home</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('Index_Mua/index_Mua'); ?>">
        <i class="menu-icon mdi mdi-home"></i>
        <span class="menu-title">Mua</span>
      </a>
    </li>


  </ul>
</nav>
<div class="main-panel">