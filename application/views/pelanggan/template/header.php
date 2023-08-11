<?php if ($title == 'Home') {
    $home = 'class="active"';
    $riwayat = '';
}
if ($title == 'Riwayat') {
    $riwayat = 'class="active"';
    $home = '';
}
if ($title == 'null') {
    $riwayat = '';
    $home = '';
} ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIP PPK</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/produk/') ?>css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?= base_url('pelanggan') ?>"><img src="<?= base_url('assets/produk/') ?>img/logo1.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?= base_url('pelanggan/cart') ?>"><i class="fa fa-shopping-bag"></i><span><?= $totalcart ?></span></a></li>
                <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-user"> Keluar</i></a>
                </li>
            </ul>
        </div>
        <!-- <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
            </div>
        </div> -->
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li <?= $home; ?>><a href="<?= base_url('pelanggan') ?>">Home</a></li>
                <li <?= $riwayat; ?>><a href="<?= base_url('pelanggan/riwayatpembelian') ?>">Riwayat</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
    <!-- Humberger End -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?= base_url('pelanggan') ?>"><img src="<?= base_url('assets/produk/') ?>img/logo1.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>

                            <li <?= $home; ?>><a href="<?= base_url('pelanggan') ?>">Home</a></li>
                            <li <?= $riwayat; ?>><a href="<?= base_url('pelanggan/riwayatpembelian') ?>">Riwayat</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="<?= base_url('pelanggan/cart') ?>"><i class="fa fa-shopping-bag"></i><span><?= $totalcart ?></span></a></li>
                            <li><a href="<?= base_url('auth/logout') ?>"><i class="fa fa-user"> Keluar</i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>