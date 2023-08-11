<!-- Shoping Cart Section Begin -->
<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="riwayat__table">
                    <h3>Riwayat Pembelian</h3>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php foreach ($riwayatbayar as $data) : ?>
                                <tr>
                                    <?php
                                    $harga_barang = "Rp. " . number_format($data['harga'], 0, ".", ".");
                                    ?>
                                    <td class="shoping__cart__info">
                                        <img height="100px" width="100px" src="<?= base_url('assets/template/dist/img/pupuk/' . $data['gambar']) ?>" alt="">
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <?= $data['nama']; ?>
                                        <br>
                                        <?= $harga_barang ?>
                                        <br>
                                        Jumlah: <?= $data['jumlah']; ?>x
                                        <br>
                                        <?php
                                        $total = "Rp. " . number_format($data['total_harga'], 0, ".", ".");
                                        ?>
                                        Total Bayar: <?= $total; ?>
                                    </td>
                                    <?php if ($data['status_pembayaran'] == 0) {
                                        $status = '<span class="badge badge-warning">Menunggu Validasi</span>';
                                    }
                                    if ($data['status_pembayaran'] == 1) {
                                        $status = '<span class="badge badge-success">Diterima</span>';
                                    }
                                    if ($data['status_pembayaran'] == 2) {
                                        $status = '<span class="badge badge-danger">Ditolak</span>';
                                    } ?>
                                    <td class="shoping__cart__quantity2">
                                        <?= $status; ?>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($riwayatbayar == null) {
                        $kosong = '<h5 class="text-center">Tidak Ada Riwayat Pembelian</h5>';
                        $bayar = '';
                    } else {
                        $kosong = '';
                        $bayar = '<a href="pembayaran" class="primary-btn">LANJUT PEMBAYARAN</a>';
                    } ?>
                    <?= $kosong ?>
                </div>
            </div>
        </div>
    </div>
</section>