<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <h2 class="text-center display-4">Lihat Surat Masyarakat</h2>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="<?= base_url('masyarakat/nik') ?>" method="POST">
                        <div class="input-group">
                            <input type="search" class="form-control form-control-lg" placeholder="Masukan NIK">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-header">
                    <h4>NIK : <?= $ms['nik']; ?></h4>
                    <h4>Nama : <?= $ms['nama']; ?></h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th style="width: 15px">No</th>
                                <th>Kode Surat</th>
                                <th>Tipe Surat</th>
                                <th>Tanggal Surat</th>
                                <th>File Surat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($suratmasuk as $sm) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $sm['nomor_surat']; ?></td>
                                    <?php if ($sm['tipe_surat'] == 1) {
                                        $tipe = 'Surat Kelahiran';
                                    }
                                    if ($sm['tipe_surat'] == 2) {
                                        $tipe = 'Surat Kematian';
                                    }
                                    if ($sm['tipe_surat'] == 3) {
                                        $tipe = 'Surat Administrasi';
                                    }
                                    if ($sm['tipe_surat'] == 4) {
                                        $tipe = 'Surat Keterangan';
                                    }
                                    if ($sm['tipe_surat'] == 5) {
                                        $tipe = 'Surat Keputusan';
                                    }
                                    if ($sm['tipe_surat'] == 6) {
                                        $tipe = 'Surat Undangan';
                                    }
                                    if ($sm['tipe_surat'] == 7) {
                                        $tipe = 'Surat Pemberitahuan';
                                    }
                                    if ($sm['tipe_surat'] == 8) {
                                        $tipe = 'Surat Pinjaman';
                                    }
                                    if ($sm['tipe_surat'] == 9) {
                                        $tipe = 'Surat Pernyataan';
                                    }
                                    if ($sm['tipe_surat'] == 10) {
                                        $tipe = 'Surat Mandat';
                                    }
                                    if ($sm['tipe_surat'] == 11) {
                                        $tipe = 'Surat Tugas';
                                    }
                                    if ($sm['tipe_surat'] == 12) {
                                        $tipe = 'Surat Keterangan Kerja';
                                    }
                                    if ($sm['tipe_surat'] == 13) {
                                        $tipe = 'Surat Keterangan Domisili';
                                    }
                                    if ($sm['tipe_surat'] == 14) {
                                        $tipe = 'Surat Keterangan Tidak Mampu';
                                    }
                                    if ($sm['tipe_surat'] == 15) {
                                        $tipe = 'Surat Keterangan Penghasilan Orang Tua';
                                    }
                                    if ($sm['tipe_surat'] == 16) {
                                        $tipe = 'Surat Keterangan Jual Beli Tanah';
                                    }
                                    if ($sm['tipe_surat'] == 17) {
                                        $tipe = 'Surat Keterangan Cerai/Hidup';
                                    }
                                    if ($sm['tipe_surat'] == 18) {
                                        $tipe = 'Surat Keterangan Pindah';
                                    }
                                    if ($sm['tipe_surat'] == 19) {
                                        $tipe = 'Surat Keterangan Kehilangan';
                                    }
                                    if ($sm['tipe_surat'] == 20) {
                                        $tipe = 'Surat Keterangan Belum Menikah';
                                    } ?>
                                    <td><?= $tipe; ?></td>
                                    <td><?= $sm['tanggal_surat']; ?></td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('/assets/uploads/suratkeluar/' . $sm['file_surat']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                    <?php if ($sm['status'] == 0) {
                                        $status = '<span class="badge badge-warning">Menunggu Validasi</span>';
                                    }
                                    if ($sm['status'] == 1) {
                                        $status = '<span class="badge badge-success">Diterima</span>';
                                    }
                                    if ($sm['status'] == 2) {
                                        $status = '<span class="badge badge-danger">Ditolak</span>';
                                    } ?>
                                    <td><?= $status; ?></td>

                                </tr>
                        </tbody>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>