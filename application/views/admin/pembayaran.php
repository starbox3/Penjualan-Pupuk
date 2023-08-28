<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <div class="col-md-6">
                    <!-- <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#addSurat"><i class="fas fa-print"></i> Cetak Laporan Pembayaran
                    </button> -->
                    <button type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#report"><i class="fas fa-print"></i> Cetak Laporan Penjualan
                    </button>
                    <!-- <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus</button> -->
                </div>
                <hr>
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Metode Pembayaran</th>
                            <th>Nominal</th>
                            <th>Tanggal</th>
                            <th>File pembayaran</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembayaran as $data) : ?>
                            <tr>
                                <td class=" py-1 align-middle"><?= $data['name']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['nama_bank']; ?></td>
                                <?php
                                $nominal = "Rp. " . number_format($data['nominal'], 0, ".", ".");
                                ?>
                                <td class=" py-1 align-middle"><?= $nominal ?></td>
                                <td class=" py-1 align-middle"><?= $data['tanggal_pembayaran']; ?></td>
                                <td class=" py-1 align-middle text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= site_url('/assets/template/dist/img/slip/' . $data['file_bukti']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>
                                    </div>
                                </td>
                                <td class="project-state py-1 align-middle text-center">
                                    <?php if ($data['status_pembayaran'] == 0) {
                                        $status = '<span class="badge badge-warning">Menunggu Validasi</span>';
                                    }
                                    if ($data['status_pembayaran'] == 1) {
                                        $status = '<span class="badge badge-success">Diterima</span>';
                                    }
                                    if ($data['status_pembayaran'] == 2) {
                                        $status = '<span class="badge badge-danger">Ditolak</span>';
                                    } ?>
                                    <?= $status; ?>
                                </td>
                                <td class="text-center py-1 align-middle">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= site_url('admin/detailpembayaran?data=' . $data['id_pembayaran']) . '&user=' . $data['id_user'] ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="report">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Cetak Laporan Penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/reportPenjualan') ?>" method="POST">
                    <div class="form-group">
                        <label>Pilih Tanggal:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="far fa-calendar-alt"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="report">
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between bg-info">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Cetak</button>
            </div>
            </form>
        </div>
    </div>
</div>