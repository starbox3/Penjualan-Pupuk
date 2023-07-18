<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="<?= base_url('rt/deleteAllPenduduk') ?>" method="POST">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#addPenduduk"><i class="fas fa-plus"></i> Tambah Data Penduduk
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus Data Penduduk</button>
                    </div>
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <input type="checkbox" onchange="selectAll(this)">
                                </th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($penduduk as $data) : ?>
                                <tr>
                                    <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $data['id_penduduk']; ?>"></td>
                                    <td class=" py-1 align-middle"><?= $data['nik']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['nama']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['provinsi']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['kabupaten']; ?></td>
                                    <td class="text-center py-1 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('rt/viewData?data=' . $data['nik']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="<?= site_url('rt/editPenduduk?data=' . $data['nik']) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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
<div class="modal fade" id="addPenduduk">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Data Penduduk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('rt/dataPenduduk'); ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> NIK</label>
                            <input type="number" class="form-control  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>" required>
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-user mr-1"></i> Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-envelope"></i> Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-mail-bulk"></i> Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="nama" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> Tanggal Lahir</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" name="tanggallahir" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Lahir" required />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> Jenis Kelamin</label>
                            <select name="jeniskelamin" class="form-control " style="width: 100%;" required>
                                <option selected disabled value="">-- Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-file-pdf"></i> Golongan Darah</label>
                            <select name="golongandarah" class="form-control " style="width: 100%;" required>
                                <option selected disabled value="">-- Golongan Darah --</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="O">O</option>
                                <option value="AB">AB</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> Alamat</label>
                                <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> RT/RW</label>
                            <input type="text" class="form-control" name="rtrw" placeholder="RT/RW" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-file-pdf"></i> Kel/Desa</label>
                            <input type="text" class="form-control" name="keldesa" placeholder="Kel/Desa" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> Kecamatan</label>
                                <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> Agama</label>
                            <select name="agama" class="form-control " style="width: 100%;" required>
                                <option selected disabled value="">-- Agama --</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-file-pdf"></i> Status Perkawinan</label>
                            <select name="status" class="form-control " style="width: 100%;" required>
                                <option value="" selected disabled>-- Status Perkawinan --</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Kawin">Kawin</option>
                                <option value="Cerai Hidup">Cerai Hidup</option>
                                <option value="Cerai Mati">Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <div class="form-group">
                                <label><i class="fas fa-envelope"></i> Pekerjaan</label>
                                <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><i class="fas fa-sticky-note"></i> Kewarganegaraan</label>
                            <select name="kewarganegaraan" class="form-control " style="width: 100%;" required>
                                <option selected disabled value="">-- Kewarganegaraan --</option>
                                <option value="WNI">WNI</option>
                                <option value="WNA">WNA</option>
                            </select>
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