<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= base_url('assets/template/dist/img/pupuk/' . $pupuk['gambar']) ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3><?= $pupuk['nama'] ?></h3>
                    <?php
                    $harga = "Rp. " . number_format($pupuk['harga'], 0, ".", ".");
                    ?>
                    <div class="product__details__price"><?= $harga ?></div>
                    <p><?= $pupuk['keterangan'] ?></p>

                    <form action="<?= base_url('pelanggan/addcart?pupuk=' . $pupuk['id']) ?>" method="POST">
                        <h6 class="mb-1" style="color:red;">*Maksimum anda dapat membeli <?= $max; ?> karung pupuk</h6>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="jumlah" id="input_field" onkeyup="myFunction(this)">
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="bttnsubmit" class="primary-btn">Beli Sekarang</button>
                    </form>
                    <ul>
                        <li><b>Stok</b> <span><?= $pupuk['stok'] ?></span></li>
                        <li><b>Berat</b> <span><?= $pupuk['berat'] ?> kg</span></li>
                        <li><b>Jenis</b> <span><?= $pupuk['jenis'] ?></span></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab" aria-selected="true">Deskripsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab" aria-selected="false">Informasi</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Deskripsi</h6>
                                <?= $pupuk['deskripsi'] ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Informasi</h6>
                                <?= $pupuk['informasi'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>