<div class="card-body">
    <p class="login-box-msg">Lupa password</p>
    <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
        <!-- peringatan berhasil -->
        <?= $this->session->flashdata('message'); ?>
        <!-- peringatan berhasil -->
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
        <div class="input-group mb-3">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>



        <!-- /.col -->

        <button type="submit" class="btn btn-primary btn-block">Reset password</button>

    </form>

    <!-- /.social-auth-links -->
    <hr>
    <p class="mb-0">
        <a href="<?= base_url('auth'); ?>" class="text-center">Kembali login</a>
    </p>
</div>