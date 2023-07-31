<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>Nama</th>
                            <th>Metode Pembayaran</th>
                            <th>Nominal</th>
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