<div class="card-body">
    <p class="login-box-msg">Silahkan masuk</p>
    <?php
    if (!$this->session->csrf_token) {
        $this->session->csrf_token = hash('sha1', time());
    }
    ?>
    <form class="user" method="post" action="<?= base_url('auth'); ?>">
        <!-- peringatan berhasil -->
        <?= $this->session->flashdata('message'); ?>
        <!-- peringatan berhasil -->
        <!-- Token csrf -->
        <?= csrf() ?>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <a href="<?= site_url('') ?>" class="btn btn-primary">Kembali</a>
            </div>
            <div class="col-4">
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

    <!-- /.social-auth-links -->
    <hr>
    <p class="mb-0">
        <a href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
    </p>

</div>