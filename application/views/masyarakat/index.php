<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <h2 class="text-center display-4">Lihat Surat Masyarakat</h2>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?= $this->session->flashdata('message'); ?>
                    <form action="<?= base_url('masyarakat/nik') ?>" method="POST">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Masukan NIK" name="nik">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>