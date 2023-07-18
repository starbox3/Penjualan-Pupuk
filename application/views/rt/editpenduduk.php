<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Penduduk</h3>
                    </div>
                    <?= form_open_multipart('rt/updatePenduduk?data=' . $penduduk['nik']); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> NIK</label>
                                    <input type="number" class="form-control" name="nik" placeholder="NIK" required value="<?= $penduduk['nik'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-user mr-1"></i> Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required value="<?= $penduduk['provinsi'] ?>">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-envelope"></i> Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten" required value="<?= $penduduk['kabupaten'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-mail-bulk"></i> Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="nama" required value="<?= $penduduk['nama'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Tanggal Lahir</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" name="tanggallahir" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Lahir" value="<?= $penduduk['tanggal_lahir'] ?>" />
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
                                        <input type="text" class="form-control" name="tempatlahir" placeholder="Tempat Lahir" required value="<?= $penduduk['tempat_lahir'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Jenis Kelamin</label>
                                    <select name="jeniskelamin" class="form-control " style="width: 100%;">
                                        <option>-- Jenis Kelamin --</option>
                                        <option value="Laki-laki" <?= $penduduk['jenis_kelamin'] == 'Laki-laki' ? 'selected' : null; ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= $penduduk['jenis_kelamin'] == 'Perempuan' ? 'selected' : null; ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-file-pdf"></i> Golongan Darah</label>
                                    <select name="golongandarah" class="form-control " style="width: 100%;">
                                        <option>-- Golongan Darah --</option>
                                        <option value="A" <?= $penduduk['golongan_darah'] == 'A' ? 'selected' : null; ?>>A</option>
                                        <option value="B" <?= $penduduk['golongan_darah'] == 'B' ? 'selected' : null; ?>>B</option>
                                        <option value="O" <?= $penduduk['golongan_darah'] == 'O' ? 'selected' : null; ?>>O</option>
                                        <option value="AB" <?= $penduduk['golongan_darah'] == 'AB' ? 'selected' : null; ?>>AB</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Alamat</label>
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required value="<?= $penduduk['alamat'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> RT/RW</label>
                                    <input type="text" class="form-control" name="rtrw" placeholder="RT/RW" required value="<?= $penduduk['rt_rw'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-file-pdf"></i> Kel/Desa</label>
                                    <input type="text" class="form-control" name="keldesa" placeholder="Kel/Desa" required value="<?= $penduduk['kel_desa'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan" required value="<?= $penduduk['kecamatan'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Agama</label>
                                    <select name="agama" class="form-control " style="width: 100%;">
                                        <option>-- Agama --</option>
                                        <option value="Islam" <?= $penduduk['agama'] == 'Islam' ? 'selected' : null; ?>>Islam</option>
                                        <option value="Kristen" <?= $penduduk['agama'] == 'Kristen' ? 'selected' : null; ?>>Kristen</option>
                                        <option value="Katolik" <?= $penduduk['agama'] == 'Katolik' ? 'selected' : null; ?>>Katolik</option>
                                        <option value="Hindu" <?= $penduduk['agama'] == 'Hindu' ? 'selected' : null; ?>>Hindu</option>
                                        <option value="Buddha" <?= $penduduk['agama'] == 'Buddha' ? 'selected' : null; ?>>Buddha</option>
                                        <option value="Konghucu" <?= $penduduk['agama'] == 'Konghucu' ? 'selected' : null; ?>>Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-file-pdf"></i> Status Perkawinan</label>
                                    <select name="status" class="form-control " style="width: 100%;">
                                        <option>-- Status Perkawinan --</option>
                                        <option value="Belum Kawin" <?= $penduduk['status'] == 'Belum Kawin' ? 'selected' : null; ?>>Belum Kawin</option>
                                        <option value="Kawin" <?= $penduduk['status'] == 'Kawin' ? 'selected' : null; ?>>Kawin</option>
                                        <option value="Cerai Hidup" <?= $penduduk['status'] == 'Cerai Hidup' ? 'selected' : null; ?>>Cerai Hidup</option>
                                        <option value="Cerai Mati" <?= $penduduk['status'] == 'Cerai Mati' ? 'selected' : null; ?>>Cerai Mati</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label><i class="fas fa-envelope"></i> Pekerjaan</label>
                                        <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" required value="<?= $penduduk['pekerjaan'] ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label><i class="fas fa-sticky-note"></i> Kewarganegaraan</label>
                                    <select name="kewarganegaraan" class="form-control " style="width: 100%;">
                                        <option>-- Kewarganegaraan --</option>
                                        <option value="WNI" <?= $penduduk['kewarganegaraan'] == 'WNI' ? 'selected' : null; ?>>WNI</option>
                                        <option value="WNA" <?= $penduduk['kewarganegaraan'] == 'WNA' ? 'selected' : null; ?>>WNA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('rt/dataPenduduk') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>