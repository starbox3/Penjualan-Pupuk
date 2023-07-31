<section class="shoping-cart spad">
    <div class="container">
        <div class="col-lg-6">
            <form action="">
                <div class="shoping__bayar mt-0">
                    <h5>Pilih Metode Pembayaran</h5>
                    <ul>
                        <?php foreach ($bank as $data) : ?>
                            <li><a href="<?= base_url('pelanggan/detailpembayaran?bank=' . $data['id_bank']) ?>"><img class="rounded" width="50px" height="50px" src="<?= base_url('assets/template/dist/img/bank/' . $data['logo']) ?>" alt=""> <span>
                                        <?= $data['nama_bank']; ?>
                                    </span></a>
                            </li>
                        <?php endforeach; ?>
                        <a href="<?= base_url('pelanggan/cart') ?>" class="primary-btn">KEMBALI</a>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</section>