<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-12 col-sm-8 col-md-9 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-center border-bottom-0">
                            <div class="mb-0">
                                <h4><b>PROVINSI <?= strtoupper($penduduk['provinsi']) ?></b></h4>
                            </div>
                            <div class="mb-0">
                                <h4><b>KABUPATEN <?= strtoupper($penduduk['kabupaten']) ?></b></h4>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="card-body p-0">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>NIK</td>
                                            <td>: <?= strtoupper($penduduk['nik']) ?></td>
                                            <td>Tempat/Tanggal Lahir</td>
                                            <td>: <?= strtoupper($penduduk['tempat_lahir']) ?>, <?= strtoupper($penduduk['tanggal_lahir']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>: <?= strtoupper($penduduk['nama']) ?></td>
                                            <td>Gol. Darah</td>
                                            <td>: <?= strtoupper($penduduk['golongan_darah']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>: <?= strtoupper($penduduk['alamat']) ?></td>
                                            <td>RT/RW</td>
                                            <td>: <?= strtoupper($penduduk['rt_rw']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kel/Desa</td>
                                            <td>: <?= strtoupper($penduduk['kel_desa']) ?></td>
                                            <td>Kecamatan</td>
                                            <td>: <?= strtoupper($penduduk['kecamatan']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>: <?= strtoupper($penduduk['agama']) ?></td>
                                            <td>Status</td>
                                            <td>: <?= strtoupper($penduduk['status']) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>: <?= strtoupper($penduduk['pekerjaan']) ?></td>
                                            <td>Kewarganegaraan</td>
                                            <td>: <?= strtoupper($penduduk['kewarganegaraan']) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/datapenduduk') ?>" class="btn btn-info ">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>