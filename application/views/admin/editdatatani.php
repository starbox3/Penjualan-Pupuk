<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Petani</h3>
                    </div>
                    <?= form_open_multipart('admin/updatepetani?data=' . $tani['id_data_petani']); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> NIK</label>
                                    <input type="number" class="form-control  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="nik" placeholder="NIK" value="<?= $tani['nik_petani'] ?>" required>
                                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Nomor KK</label>
                                    <input type="number" class="form-control" name="kk" placeholder="Nomor KK" required value="<?= $tani['kk_petani'] ?>">

                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" required value="<?= $tani['name'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required value="<?= $tani['provinsi'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Kabupaten</label>
                                    <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten" required value="<?= $tani['kabupaten'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required value="<?= $tani['alamat'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Luas Lahan</label>
                                    <input type="number" class="form-control" name="luas" placeholder="Luas Lahan" required value="<?= $tani['luas_lahan'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> File Kartu Keluarga</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img style="width: 100px ; height: 100px;" src="<?= base_url('assets//template/dist/img/dokumen/') . $tani['file_kk'] ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file1" value="<?= $tani['file_kk'] ?>">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> File Kartu Tanda Penduduk</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img style="width: 100px ; height: 100px;" src="<?= base_url('assets//template/dist/img/dokumen/') . $tani['file_ktp'] ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file2" value="<?= $tani['file_ktp'] ?>">
                                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Nomor Telepon</label>
                                    <input type="text" class="form-control" placeholder="Nomor HP / Whatsapp" name="telepon" required data-inputmask="'mask': ['0899-9999-9999','0899-9999-9999-9']" data-mask value="<?= $tani['telepon'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="email" required value="<?= $tani['email'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/dataTani') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>