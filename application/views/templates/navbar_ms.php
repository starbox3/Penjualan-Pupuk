<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="#" class="navbar-brand">
            <?php foreach ($pengaturan as $pe) : ?>
                <img src="<?= base_url('assets/template/dist/img/') . $pe['favicon'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b><?= $pe['namaweb']; ?></b></span>
            <?php endforeach; ?>
        </a>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- Messages Dropdown Menu -->
            <a href="<?= base_url('auth'); ?>">
                <span class="brand-text font-weight-light"><b>MASUK</b> </span></a>
        </ul>
    </div>
</nav>