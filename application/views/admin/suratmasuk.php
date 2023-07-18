<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="<?= base_url('admin/suratmasuk') ?>" method="POST">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Index Surat</label>
                            <select class="form-control select2bs4" name="tipe" style="width: 100%;" onchange="this.form.submit()">
                                <option value="" disabled selected>--Index Surat--</option>
                                <option value="1" <?= $tipe == '1' ? 'selected' : null; ?>>474.3 - Surat Kelahiran</option>
                                <option value="2" <?= $tipe == '2' ? 'selected' : null; ?>>474.2 - Surat Kematian</option>
                                <option value="3" <?= $tipe == '3' ? 'selected' : null; ?>>148.4 Surat Administrasi</option>
                                <option value="4" <?= $tipe == '4' ? 'selected' : null; ?>>471 - Surat Keterangan</option>
                                <option value="5" <?= $tipe == '5' ? 'selected' : null; ?>>01 - Surat Keputusan</option>
                                <option value="6" <?= $tipe == '6' ? 'selected' : null; ?>>03 - Surat Undangan</option>
                                <option value="7" <?= $tipe == '7' ? 'selected' : null; ?>>04 - Surat Pemberitahuan</option>
                                <option value="8" <?= $tipe == '8' ? 'selected' : null; ?>>05 - Surat Pinjaman</option>
                                <option value="9" <?= $tipe == '9' ? 'selected' : null; ?>>06 - Surat Pernyataan</option>
                                <option value="10" <?= $tipe == '10' ? 'selected' : null; ?>>07 - Surat Mandat</option>
                                <option value="11" <?= $tipe == '11' ? 'selected' : null; ?>>08 - Surat Tugas</option>
                                <option value="12" <?= $tipe == '12' ? 'selected' : null; ?>>09 - Surat Keterangan Kerja</option>
                                <option value="13" <?= $tipe == '13' ? 'selected' : null; ?>>10 - Surat Keterangan Domisili</option>
                                <option value="14" <?= $tipe == '14' ? 'selected' : null; ?>>11 - Surat Keterangan Tidak Mampu</option>
                                <option value="15" <?= $tipe == '15' ? 'selected' : null; ?>>12 - Surat Keterangan Penghasilan Orang Tua</option>
                                <option value="16" <?= $tipe == '16' ? 'selected' : null; ?>>13 - Surat Keterangan Jual Beli Tanah</option>
                                <option value="17" <?= $tipe == '17' ? 'selected' : null; ?>>14 - Surat Keterangan Cerai/Hidup</option>
                                <option value="18" <?= $tipe == '18' ? 'selected' : null; ?>>15 - Surat Keterangan Pindah</option>
                                <option value="19" <?= $tipe == '19' ? 'selected' : null; ?>>16 - Surat Keterangan Kehilangan</option>
                                <option value="20" <?= $tipe == '20' ? 'selected' : null; ?>>17 - Surat Keterangan Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                </form>
                <form action="<?= base_url('admin/deleteAllSuratMasuk') ?>" method="POST">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#addSurat"><i class="fas fa-plus"></i> Tambah Surat Masuk
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus Surat Masuk</button>
                        <button type="button" class="btn btn-info btn-sm mb-1" data-toggle="modal" data-target="#report"><i class="fas fa-file-pdf"></i> Cetak Laporan
                        </button>
                    </div>

                    <hr>
                    <!-- <div class="card-body table-responsive p-0"> -->
                    <table id="example2" class="table table-bordered table-striped">
                        <!-- <table class="table table-hover text-nowrap"> -->
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <input type="checkbox" onchange="selectAll(this)">
                                </th>
                                <th>Nomor Surat</th>
                                <th>NIK Pemilik Surat</th>
                                <th>Nama</th>
                                <th>Tipe Surat</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Terima</th>
                                <th>Asal Surat</th>
                                <th>Perihal</th>
                                <th>Ringkasan</th>
                                <th>File Surat</th>
                                <th>Status</th>
                                <th>Aksi</th>
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
                                    <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $data['no_agenda']; ?>"></td>
                                    <td class=" py-9 align-middle"><?= $data['nomor_surat']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['nik']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['nama']; ?></td>
                                    <td class=" py-1 align-middle"><?= $tipe; ?></td>
                                    <td class=" py-1 align-middle" style="width:50%"><?= $data['tanggal_surat']; ?></td>
                                    <td class=" py-1 align-middle" style="width:50%"><?= $data['tanggal_terima']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['asal_surat']; ?></td>
                                    <td class="py-1 align-middle"><?= $data['perihal']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['ringkasan']; ?></td>
                                    <td class=" py-1 align-middle text-center">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('/assets/uploads/suratmasuk/' . $data['file_surat']) ?>" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>
                                        </div>
                                    </td>
                                    <td class="project-state py-1 align-middle text-center">
                                        <?php if ($data['status'] == 0) {
                                            $status = '<span class="badge badge-warning">Menunggu Validasi</span>';
                                        }
                                        if ($data['status'] == 1) {
                                            $status = '<span class="badge badge-success">Diterima</span>';
                                        }
                                        if ($data['status'] == 2) {
                                            $status = '<span class="badge badge-danger">Ditolak</span>';
                                        } ?>

                                        <?= $status; ?>
                                    </td>
                                    <td class="text-center py-1 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('admin/editSuratMasuk?surat=' . $data['no_agenda']) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="addSurat">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/addSuratMasuk'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>NIK Pemilik Surat</label>
                            <select name="nik" class="form-control select2bs4" style="width: 100%;" required>
                                <option value="" disabled selected>--Cari NIK--</option>
                                <?php foreach ($penduduk as $pen) : ?>
                                    <option value="<?= $pen['nik']; ?>"><?= $pen['nik']; ?> - <?= $pen['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-user mr-1"></i> Tipe Surat</label>
                            <select name="tipe" class="form-control select2bs4" style="width: 100%;" required>
                                <option value="" disabled selected>--Pilih Tipe Surat--</option>
                                <option value="1">Surat Kelahiran</option>
                                <option value="2">Surat Kematian</option>
                                <option value="3">Surat Administrasi</option>
                                <option value="4">Surat Keterangan</option>
                                <option value="5">Surat Keputusan</option>
                                <option value="6">Surat Undangan</option>
                                <option value="7">Surat Pemberitahuan</option>
                                <option value="8">Surat Pinjaman</option>
                                <option value="9">Surat Pernyataan</option>
                                <option value="10">Surat Mandat</option>
                                <option value="11">Surat Tugas</option>
                                <option value="12">Surat Keterangan Kerja</option>
                                <option value="13">Surat Keterangan Domisili</option>
                                <option value="14">Surat Keterangan Tidak Mampu</option>
                                <option value="15">Surat Keterangan Penghasilan Orang Tua</option>
                                <option value="16">Surat Keterangan Jual Beli Tanah</option>
                                <option value="17">Surat Keterangan Cerai/Hidup</option>
                                <option value="18">Surat Keterangan Pindah</option>
                                <option value="19">Surat Keterangan Kehilangan</option>
                                <option value="20">Surat Keterangan Belum Menikah</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-user mr-1"></i> Nomor Surat</label>
                            <input type="text" class="form-control" name="nomorSurat" placeholder="Nomor Surat" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> Tanggal Surat</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" name="tanggalSurat" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Surat" required />
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
                            <input type="text" class="form-control" name="asalSurat" placeholder="Asal Surat" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-file-pdf"></i> File Surat</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> Perihal</label>
                            <textarea class="form-control" name="perihal" rows="3" placeholder="Perihal"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> Ringkasan</label>
                            <textarea class="form-control" name="ringkasan" rows="3" placeholder="Ringkasan"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between bg-info">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="report">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Cetak Laporan Surat Masuk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/reportSuratMasuk') ?>" method="POST">
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