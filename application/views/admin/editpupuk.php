<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Pupuk</h3>
                    </div>
                    <?= form_open_multipart('admin/editDataPupuk?pupuk=' . $pupuk['id']); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Nama Pupuk</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Pupuk" required value="<?= $pupuk['nama'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Jenis Pupuk</label>
                                    <input type="text" class="form-control" name="jenis" placeholder="jenis" required value="<?= $pupuk['jenis'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" required value="<?= $pupuk['harga'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Stok</label>
                                    <input type="number" class="form-control" name="stok" placeholder="Stok" required value="<?= $pupuk['stok'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img style="width: 100px ; height: 100px;" src="<?= base_url('assets//template/dist/img/pupuk/') . $pupuk['gambar'] ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                                <label class="custom-file-label" for="exampleInputFile">Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea id="summernote" name="keterangan"><?= $pupuk['keterangan'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea id="summernote1" name="deskripsi"><?= $pupuk['deskripsi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Informasi</label>
                                    <textarea id="summernote2" name="informasi"><?= $pupuk['informasi'] ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/pupuk') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>