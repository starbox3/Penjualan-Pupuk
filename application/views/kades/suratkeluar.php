<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th>NIK Pemilik Surat</th>
                            <th>Nama</th>
                            <th>Tipe Surat</th>
                            <th>Nomor Surat Masuk</th>
                            <th>Tanggal Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Nomor Surat</th>
                            <th>Perihal</th>
                            <th>Ringkasan</th>
                            <th>File Surat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($surat as $data) : ?>
                            <tr>
                                <?php if ($data['tipe_surat'] == 1) {
                                    $tipe = 'Surat Kelahiran';
                                }
                                if ($data['tipe_surat'] == 2) {
                                    $tipe = 'Surat Kematian';
                                }
                                if ($data['tipe_surat'] == 3) {
                                    $tipe = 'Surat Administrasi';
                                }
                                if ($data['tipe_surat'] == 4) {
                                    $tipe = 'Surat Keterangan';
                                }
                                if ($data['tipe_surat'] == 5) {
                                    $tipe = 'Surat Keputusan';
                                }
                                if ($data['tipe_surat'] == 6) {
                                    $tipe = 'Surat Undangan';
                                }
                                if ($data['tipe_surat'] == 7) {
                                    $tipe = 'Surat Pemberitahuan';
                                }
                                if ($data['tipe_surat'] == 8) {
                                    $tipe = 'Surat Pinjaman';
                                }
                                if ($data['tipe_surat'] == 9) {
                                    $tipe = 'Surat Pernyataan';
                                }
                                if ($data['tipe_surat'] == 10) {
                                    $tipe = 'Surat Mandat';
                                }
                                if ($data['tipe_surat'] == 11) {
                                    $tipe = 'Surat Tugas';
                                }
                                if ($data['tipe_surat'] == 12) {
                                    $tipe = 'Surat Keterangan Kerja';
                                }
                                if ($data['tipe_surat'] == 13) {
                                    $tipe = 'Surat Keterangan Domisili';
                                }
                                if ($data['tipe_surat'] == 14) {
                                    $tipe = 'Surat Keterangan Tidak Mampu';
                                }
                                if ($data['tipe_surat'] == 15) {
                                    $tipe = 'Surat Keterangan Penghasilan Orang Tua';
                                }
                                if ($data['tipe_surat'] == 16) {
                                    $tipe = 'Surat Keterangan Jual Beli Tanah';
                                }
                                if ($data['tipe_surat'] == 17) {
                                    $tipe = 'Surat Keterangan Cerai/Hidup';
                                }
                                if ($data['tipe_surat'] == 18) {
                                    $tipe = 'Surat Keterangan Pindah';
                                }
                                if ($data['tipe_surat'] == 19) {
                                    $tipe = 'Surat Keterangan Kehilangan';
                                }
                                if ($data['tipe_surat'] == 20) {
                                    $tipe = 'Surat Keterangan Belum Menikah';
                                } ?>

                                <td class=" py-1 align-middle"><?= $data['nik']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['nama']; ?></td>
                                <td class=" py-1 align-middle"><?= $tipe; ?></td>
                                <td class=" py-1 align-middle"><?= $data['nomor_surat_masuk']; ?></td>
                                <td class=" py-1 align-middle" style="width:30%"><?= $data['tanggal_surat']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['tujuan_surat']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['nomor_surat']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['perihal']; ?></td>
                                <td class=" py-1 align-middle"><?= $data['ringkasan']; ?></td>
                                <td class=" py-1 align-middle text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="<?= site_url('/assets/uploads/suratkeluar/' . $data['file_surat']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
</section>