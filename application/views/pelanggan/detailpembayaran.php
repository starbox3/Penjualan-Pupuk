<section class="shoping-cart spad">
    <div class="container">
        <div class="col-lg-6">
            <form action="">
                <div class="shoping__checkout mt-0">
                    <h5>Lakukan Pembayaran</h5>
                    <ul>
                        <li>
                            Silahkan transfer ke:
                        </li>
                        <li><img class="rounded" width="50px" height="50px" src="<?= base_url('assets/template/dist/img/bank/' . $bank['logo']) ?>"> <span>
                                <?= $bank['nama_bank']; ?>
                            </span>
                        </li>
                        <li>Nomor Rekening <span><?= $bank['nomor_rek']; ?></span></li>
                        <li>Atas Nama <span><?= $bank['nama_pemilik']; ?></span></li>
                        <?php
                        $total_bayar = "Rp. " . number_format($totalbayar['total_bayar'], 0, ".", ".");
                        ?>
                        <li>Nominal Transfer <span><?= $total_bayar; ?></span></li>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="shoping__cart__btns">
                                    <a href="<?= base_url('pelanggan/pembayaran') ?>" class="primary-btn cart-btn">kembali</a>
                                    <a href="<?= base_url('pelanggan/uploadPembayaran?bank=' . $bank['id_bank']) ?>" class="primary-btn cart-btn cart-btn-right">
                                        Sudah Bayar</a>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</section>