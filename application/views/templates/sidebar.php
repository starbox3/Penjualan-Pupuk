<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="#" class="brand-link">
    <?php foreach ($pengaturan as $pe) : ?>
      <img src="<?= base_url('assets/template/dist/img/') . $pe['favicon'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $pe['namaweb']; ?></span>
    <?php endforeach; ?>
  </a>
  <div class="sidebar">
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`,`menu`
                            FROM `user_menu` JOIN `user_access_menu`
                              ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                           WHERE `user_access_menu`.`role_id` = $role_id
                        ORDER BY `user_access_menu`.`menu_id` ASC
                        ";
        $menu = $this->db->query($queryMenu)->result_array();
        ?>
        <!-- Looping menu -->
        <?php foreach ($menu as $m) : ?>
          <li class="nav-header"><?= $m['menu'] ?></li>
          <?php
          $menuId = $m['id'];
          $querySubMenu = " SELECT *
                              FROM `user_sub_menu` JOIN `user_menu`
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                             WHERE `user_sub_menu`.`menu_id` = $menuId
                               AND `user_sub_menu`.`is_active` = 1
                            ";
          $subMenu = $this->db->query($querySubMenu)->result_array();
          ?>
          <?php foreach ($subMenu as $sm) : ?>
            <li class="nav-item ">
              <?php if ($title == $sm['title']) : ?>
                <a href="<?= base_url($sm['url']); ?>" class="nav-link active">
                <?php else : ?>
                  <a href="<?= base_url($sm['url']); ?>" class="nav-link ">
                  <?php endif; ?>
                  <i class="<?= $sm['icon']; ?>"></i>
                  <p><?= $sm['title']; ?></p>
                  </a>
            </li>
          <?php endforeach; ?>
          <div class="user-panel mt-3 pb-3 mb-3 d-flex"></div>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
</aside>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0"><?= $title ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>