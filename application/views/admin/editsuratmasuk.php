<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Surat Masuk</h3>
                    </div>
                    <?= form_open_multipart('admin/updateSuratMasuk?surat=' . $surat['no_agenda']); ?>
                    <div class="modal-body">
                        <?php
                        if ($surat['status'] == 1) {
                            $alert = '<div class="row">
                            <div class="col-sm-6"><div class="alert alert-success alert-dismissible">
                            <h5><i class="icon fas fa-check"></i> Diterima!</h5>
                            Laporan surat telah diterima.
                          </div></div>
                          </div>';
                        }
                        if ($surat['status'] == 2) {
                            $keterangan = $surat['keterangan'];
                            $alert = "<div class='row'>
                            <div class='col-sm-6'><div class='alert alert-danger alert-dismissible'>
                            <h5><i class='icon fas fa-ban'></i> Ditolak!</h5>
                            $keterangan
                          </div></div>
                          </div>";
                        }
                        if ($surat['status'] == 0) {
                            $alert = '<div class="row">
                            <div class="col-sm-6"><div class="alert alert-warning alert-dismissible">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Menunggu Validasi!</h5>
                            Surat anda sedang dalam proses validasi.
                          </div></div>
                          </div>';
                        } ?>
                        <?= $alert; ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>NIK Pemilik Surat</label>
                                    <select name="nik" class="form-control select2bs4" style="width: 100%;">
                                        <option>--Cari NIK--</option>
                                        <?php foreach ($penduduk as $pen) : ?>
                                            <option value="<?= $pen['nik']; ?>" <?= $pen['nik'] == $surat['nik'] ? 'selected' : null; ?>><?= $pen['nik']; ?> - <?= $pen['nama']; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-user mr-1"></i> Tipe Surat</label>
                                    <select name="tipe" class="form-control select2bs4" style="width: 100%;">
                                        <option value="" disabled>--Pilih Tipe Surat--</option>
                                        <option value="1" <?= $surat['tipe_surat'] == '1' ? 'selected' : null; ?>>Surat Kelahiran</option>
                                        <option value="2" <?= $surat['tipe_surat'] == '2' ? 'selected' : null; ?>>Surat Kematian</option>
                                        <option value="3" <?= $surat['tipe_surat'] == '3' ? 'selected' : null; ?>>Surat Administrasi</option>
                                        <option value="4" <?= $surat['tipe_surat'] == '4' ? 'selected' : null; ?>>Surat Keterangan</option>
                                        <option value="5" <?= $surat['tipe_surat'] == '5' ? 'selected' : null; ?>>Surat Keputusan</option>
                                        <option value="6" <?= $surat['tipe_surat'] == '6' ? 'selected' : null; ?>>Surat Undangan</option>
                                        <option value="7" <?= $surat['tipe_surat'] == '7' ? 'selected' : null; ?>>Surat Pemberitahuan</option>
                                        <option value="8" <?= $surat['tipe_surat'] == '8' ? 'selected' : null; ?>>Surat Pinjaman</option>
                                        <option value="9" <?= $surat['tipe_surat'] == '9' ? 'selected' : null; ?>>Surat Pernyataan</option>
                                        <option value="10" <?= $surat['tipe_surat'] == '10' ? 'selected' : null; ?>>Surat Mandat</option>
                                        <option value="11" <?= $surat['tipe_surat'] == '11' ? 'selected' : null; ?>>Surat Tugas</option>
                                        <option value="12" <?= $surat['tipe_surat'] == '12' ? 'selected' : null; ?>>Surat Keterangan Kerja</option>
                                        <option value="13" <?= $surat['tipe_surat'] == '13' ? 'selected' : null; ?>>Surat Keterangan Domisili</option>
                                        <option value="14" <?= $surat['tipe_surat'] == '14' ? 'selected' : null; ?>>Surat Keterangan Tidak Mampu</option>
                                        <option value="15" <?= $surat['tipe_surat'] == '15' ? 'selected' : null; ?>>Surat Keterangan Penghasilan Orang Tua</option>
                                        <option value="16" <?= $surat['tipe_surat'] == '16' ? 'selected' : null; ?>>Surat Keterangan Jual Beli Tanah</option>
                                        <option value="17" <?= $surat['tipe_surat'] == '17' ? 'selected' : null; ?>>Surat Keterangan Cerai/Hidup</option>
                                        <option value="18" <?= $surat['tipe_surat'] == '18' ? 'selected' : null; ?>>Surat Keterangan Pindah</option>
                                        <option value="19" <?= $surat['tipe_surat'] == '19' ? 'selected' : null; ?>>Surat Keterangan Kehilangan</option>
                                        <option value="20" <?= $surat['tipe_surat'] == '20' ? 'selected' : null; ?>>Surat Keterangan Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-user mr-1"></i> Nomor Surat Masuk</label>
                                    <input type="text" class="form-control" name="nomorSurat" placeholder="Nomor Surat" value="<?= $surat['nomor_surat'] ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Tanggal Surat</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="text" name="tanggalSurat" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?= $surat['tanggal_surat'] ?>" />
                                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Asal Surat</label>
                                    <input type="text" class="form-control" name="asalSurat" placeholder="Asal Surat" value="<?= $surat['asal_surat'] ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-file-pdf"></i> File Surat</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                        <label class="custom-file-label" for="exampleInputFile"><?= $surat['file_surat'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Perihal</label>
                                    <textarea class="form-control" name="perihal" rows="3" placeholder="Perihal"><?= $surat['perihal'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Ringkasan</label>
                                    <textarea class="form-control" name="ringkasan" rows="3" placeholder="Ringkasan"><?= $surat['ringkasan'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/SuratMasuk') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>