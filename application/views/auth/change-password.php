<div class="card-body">
    <div class="text-center login-box-msg">
        <h4 class="h4 text-gray-900">Ganti password</h4>
        <h7 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h7>
    </div>

    <form class="user" method="post" action="<?= base_url('auth/changepassword'); ?>">
        <!-- peringatan berhasil -->
        <?= $this->session->flashdata('message'); ?>
        <!-- peringatan berhasil -->
        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password baru..">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
            </div>
        </div>
        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi password baru..">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-key"></span>
                </div>
            </div>
        </div>



        <!-- /.col -->

        <button type="submit" class="btn btn-primary btn-block">Ganti password</button>

    </form>

    <!-- /.social-auth-links -->

</div>