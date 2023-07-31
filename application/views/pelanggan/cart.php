<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th class="shoping__product">Produk</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($cart as $data) : ?>


                                <tr>

                                    <?php
                                    $harga_barang = "Rp. " . number_format($data['harga'], 0, ".", ".");
                                    ?>
                                    <td class="shoping__cart__item">
                                        <img height="100px" width="100px" src="<?= base_url('assets/template/dist/img/pupuk/' . $data['gambar']) ?>" alt="">
                                        <h5><?= $data['nama'] ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?= $harga_barang ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <h5><?= $data['jumlah'] ?></h5>
                                    </td>
                                    <?php $total = $data['harga'] * $data['jumlah'];
                                    $total_barang = "Rp. " . number_format($total, 0, ".", "."); ?>
                                    <td class="shoping__cart__total">
                                        <?= $total_barang ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close form-cart" data-cart="<?= $data['id_cart'] ?>"></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($cart == null) {
                        $kosong = '<h5 class="text-center">Keranjang Masih Kosong</h5>';
                        $bayar = '';
                    } else {
                        $kosong = '';
                        $bayar = '<a href="pembayaran" class="primary-btn">LANJUT PEMBAYARAN</a>';
                    } ?>
                    <?= $kosong ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="<?= base_url('pelanggan') ?>" class="primary-btn cart-btn">Tambah barang lain</a>
                </div>
            </div>
            <div class="col-lg-6">
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <?php
                    $total_bayar = "Rp. " . number_format($totalbayar['total_bayar'], 0, ".", ".");
                    ?>
                    <ul>
                        <li>Subtotal <span><?= $total_bayar; ?></span></li>
                        <li>Total <span><?= $total_bayar; ?></span></li>
                    </ul>
                    <?= $bayar ?>
                </div>
            </div>
        </div>
    </div>
</section>