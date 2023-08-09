<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="<?= base_url('admin/deleteAllPupuk') ?>" method="POST">
                    <div class="col-md-6">
                        <a href="<?= base_url('admin/tambahpupuk') ?>" type="button" class="btn btn-warning btn-sm mb-1"><i class="fas fa-plus"></i> Tambah
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <input type="checkbox" onchange="selectAll(this)">
                                </th>
                                <th>Nama</th>
                                <th>Jenis</th>
                                <th>Gambar</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pupuk as $data) : ?>
                                <tr>
                                    <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $data['id']; ?>"></td>
                                    <td class=" py-9 align-middle"><?= $data['nama']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['jenis']; ?></td>
                                    <td class=" py-1 align-middle text-center"><img width="100px" height="100px" src="<?= base_url('assets/template/dist/img/pupuk/' . $data['gambar']) ?>" alt="pupuk"></td>
                                    <td class=" py-1 align-middle text-center"><?= $data['stok']; ?></td>
                                    <td class="py-1 align-middle text-center"><?= $data['harga']; ?></td>
                                    <td class="text-center py-1 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('admin/editPupuk?pupuk=' . $data['id']) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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

                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><i class="fas fa-user mr-1"></i> Tipe Surat</label>
                            <select name="tipe" class="form-control select2bs4" style="width: 100%;" required>
                                <option value="" disabled selected>--Pilih Tipe Surat--</option>
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