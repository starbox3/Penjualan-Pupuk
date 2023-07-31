<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Bank</h3>
                    </div>
                    <?= form_open_multipart('admin/updateDataBank?bank=' . $bank['id_bank']); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Bank" required value="<?= $bank['nama_bank']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                    <input type="text" class="form-control" name="rek" placeholder="Nomor Rekening" required value="<?= $bank['nomor_rek']; ?>">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" class="form-control" name="atasnama" placeholder="Atas Nama" required value="<?= $bank['nama_pemilik']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Logo Bank</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img style="width: 100px ; height: 100px;" src="<?= base_url('assets//template/dist/img/bank/') . $bank['logo'] ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                                <label class="custom-file-label" for="exampleInputFile">Logo</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <a href="<?= site_url('admin/bank') ?>" class="btn btn-info ">Batal</a>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>