<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <!-- Default box -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 d-flex align-items-stretch flex-column">
                                <div class="card bg-light d-flex flex-fill">
                                    <div class="card-header text-center border-bottom-0">
                                        <div class="mb-0">
                                            <h4><b>PERMINTAAN LAPORAN SURAT MASUK</b></h4>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="card-body p-0">
                                            <table class="table table-sm">
                                                <tbody>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>: <?= $surat['nik']; ?></td>
                                                        <td>Nama</td>
                                                        <td>: <?= strtoupper($surat['nama']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nomor Surat</td>
                                                        <td>: <?= strtoupper($surat['nomor_surat']) ?></td>
                                                        <td>Tipe Surat</td>
                                                        <?php if ($surat['tipe_surat'] == 1) {
                                                            $tipe = 'Surat Kelahiran';
                                                        } else {
                                                            $tipe = 'Surat Kematian';
                                                        } ?>
                                                        <td>: <?= strtoupper($tipe) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Surat</td>
                                                        <td>: <?= strtoupper($surat['tanggal_surat']) ?></td>
                                                        <td>Asal Surat</td>
                                                        <td>: <?= strtoupper($surat['asal_surat']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>File Surat</td>
                                                        <td>: <a href="<?= site_url('/assets/uploads/suratmasuk/' . $surat['file_surat']) ?>"> <?= strtoupper($surat['file_surat']) ?></a></td>
                                                        <td>Perihal</td>
                                                        <td>: <?= strtoupper($surat['perihal']) ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ringkasan</td>
                                                        <td>: <?= strtoupper($surat['ringkasan']) ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="<?= base_url('sekdes/updateSuratMasuk') ?>" method="POST">
                            <input type="text" class="form-control" name="surat" value="<?= $surat['no_agenda'] ?>" hidden>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label> Aksi Surat</label>
                                    <select name="status" class="form-control " style="width: 100%;">
                                        <option>--Pilih Status Surat--</option>
                                        <option value="1" <?= $surat['status'] == '1' ? 'selected' : null; ?>>Diterima</option>
                                        <option value="2" <?= $surat['status'] == '2' ? 'selected' : null; ?>>Ditolak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Keterangan</label>
                                    <textarea class="form-control" name="keterangan" rows="3" placeholder="Keterangan"><?= $surat['keterangan'] ?></textarea>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('sekdes/suratmasuk') ?>" class="btn btn-info ">Kembali</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>