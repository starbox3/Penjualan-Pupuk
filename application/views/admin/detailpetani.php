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
                                            <h4><b>DETAIL DATA PETANI</b></h4>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>: <?= strtoupper($tani['name']) ?></td>
                                                        <td>Nomor KK</td>
                                                        <td>: <?= strtoupper($tani['kk_petani']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Telepon</td>
                                                        <td>: <?= strtoupper($tani['telepon']) ?></td>
                                                        <td>NIK</td>
                                                        <td>: <?= strtoupper($tani['nik_petani']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Provinsi</td>
                                                        <td>: <?= strtoupper($tani['provinsi']) ?></td>
                                                        <td>Kabupaten</td>
                                                        <td>: <?= strtoupper($tani['kabupaten']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>: <?= strtoupper($tani['alamat']) ?></td>
                                                        <td>Luas Lahan</td>
                                                        <td>: <?= strtoupper($tani['luas_lahan']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>File KK</td>
                                                        <td>: <a href="<?= site_url('/assets/template/dist/img/dokumen/' . $tani['file_kk']) ?>"><?= $tani['file_kk']; ?></a></td>
                                                        <td>File KTP</td>
                                                        <td>: <a href="<?= site_url('/assets/template/dist/img/dokumen/' . $tani['file_kk']) ?>"><?= $tani['file_kk']; ?></a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/dataTani') ?>" class="btn btn-info ">Kembali</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>