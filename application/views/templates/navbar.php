<nav class="main-header navbar navbar-expand navbar-info navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <span class="d-none d-md-inline"><?= $user['name']; ?> | </span>
                <img src="<?= base_url('assets/template/dist/img/') . $user['image']; ?>" class="user-image img-circle elevation-2" alt="User Image">
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <li class="user-header bg-info">
                    <img src="<?= base_url('assets/template/dist/img/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
                    <p>
                        <?= $user['name']; ?>
                    </p>
                </li>
                <li class="user-footer">
                    <button type="button" class="btn btn-default btn-flat float-right" data-toggle="modal" data-target="#modal-logout"> Keluar
                    </button>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<div class="modal fade" id="modal-logout">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <p>Apakah anda yakin ingin keluar ?</p>
            </div>
            <form action="<?= base_url('auth/logout'); ?>">
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>