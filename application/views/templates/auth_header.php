<!DOCTYPE html>
<html lang="en">
<?php foreach ($pengaturan as $pe) : ?>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $pe['namaweb']; ?> | <?= $title ?></title>
        <link href="<?= base_url('assets/template/dist/img/') . $pe['favicon'] ?>" rel="icon">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= base_url('assets/template/') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/adminlte.min.css">

        <link rel="stylesheet" href="<?= base_url('assets/template/') ?>dist/css/style.css">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-info">
                <div class="card-header text-center">
                    <a href="<?= base_url('auth') ?>" class="h1"><?= $pe['namaweb']; ?></a>
                </div>
            <?php endforeach; ?>