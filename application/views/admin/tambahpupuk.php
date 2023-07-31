<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Pupuk</h3>
                    </div>
                    <?= form_open_multipart('admin/addpupuk'); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Nama Pupuk</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Pupuk" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Jenis Pupuk</label>
                                    <input type="text" class="form-control" name="jenis" placeholder="jenis" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Harga" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label> Stok</label>
                                    <input type="number" class="form-control" name="stok" placeholder="Stok" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                                        <label class="custom-file-label" for="exampleInputFile">Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea id="summernote" name="keterangan"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea id="summernote1" name="deskripsi"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Informasi</label>
                                    <textarea id="summernote2" name="informasi"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/pupuk') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>