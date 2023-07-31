<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-center border-bottom-0">
                                        <div class="mb-0">
                                            <h4><b>DETAIL PEMBAYARAN</b></h4>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>: <?= strtoupper($id_user['name']) ?></td>
                                                        <td>Telepon</td>
                                                        <td>: <?= strtoupper($id_user['telepon']) ?><?= strtoupper($penduduk['tanggal_lahir']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Metode Pembayaran</td>
                                                        <td>: <?= strtoupper($pembayaran['nama_bank']) ?></td>
                                                        <td>Nominal</td>
                                                        <?php
                                                        $nominal = "Rp. " . number_format($pembayaran['nominal'], 0, ".", ".");
                                                        ?>
                                                        <td>: <?= $nominal ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bukti Pembayaran</td>
                                                        <td>: <a href="<?= site_url('/assets/template/dist/img/slip/' . $pembayaran['file_bukti']) ?>"><?= $pembayaran['file_bukti']; ?></a></td>
                                                        <td>Tanggal</td>
                                                        <td>: <?= strtoupper($pembayaran['tanggal_pembayaran']) ?></td>
                                                    </tr>
                                                    <?php foreach ($chart_pembayaran as $data) : ?>
                                                        <tr>
                                                            <td><img width="100px" height="100px" src="<?= base_url('assets/template/dist/img/pupuk/' . $data['gambar']) ?>" alt="pupuk"></td>
                                                            <td class="align-middle"><?= $data['nama'] ?>
                                                                <?php
                                                                $harga = "Rp. " . number_format($data['harga'], 0, ".", ".");
                                                                ?>
                                                                <br>Harga: <?= $harga ?>
                                                            </td>
                                                            <td class="align-middle">Jumlah: <?= $data['jumlah'] ?>x</td>
                                                            <td class="align-middle">
                                                                <?php
                                                                $totalharga = "Rp. " . number_format($data['total_harga'], 0, ".", ".");
                                                                ?>
                                                                <b><?= $totalharga; ?></b>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td>Total Bayar</td>
                                                        <td><b><?= $nominal ?></b></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('admin/updatepembayaran?kode=' . $pembayaran['id_pembayaran']) ?>" method="POST">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Aksi Pembayaran</label>
                                    <select name="status" class="form-control " style="width: 100%;">
                                        <option disabled selected>--Pilih Status Pembayaran--</option>
                                        <option value="1" <?= $pembayaran['status_pembayaran'] == '1' ? 'selected' : null; ?>>Diterima</option>
                                        <option value="2" <?= $pembayaran['status_pembayaran'] == '2' ? 'selected' : null; ?>>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/pembayaran') ?>" class="btn btn-info ">Kembali</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>