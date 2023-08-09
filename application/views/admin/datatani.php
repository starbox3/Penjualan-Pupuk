<section class="content">
    <div class="container-fluid">
        <?php if (validation_errors()) : ?>
            <div class="callout callout-danger">
                <?= validation_errors(); ?>
            </div>
        <?php endif; ?>
        <div class="card card-info card-outline">
            <div class="card-body">
                <?php
                $query = "SELECT * FROM `tbl_data_petani` ORDER BY `id_data_petani` DESC";
                $datapetani = $this->db->query($query)->result_array();
                ?>
                <form action="<?= base_url('admin/deleteAllpetani') ?>" method="POST">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#addpetani"><i class="fas fa-plus"></i> Tambah Data Petani
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus Data Petani</button>
                    </div>
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    <input type="checkbox" onchange="selectAll(this)">
                                </th>
                                <th>Nama</th>
                                <th>Provinsi</th>
                                <th>Kabupaten</th>
                                <th>Luas Lahan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datapetani as $data) : ?>
                                <tr>
                                    <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $data['id_data_petani']; ?>"></td>
                                    <td class=" py-1 align-middle"><?= $data['nama_petani']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['provinsi']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['kabupaten']; ?></td>
                                    <td class=" py-1 align-middle"><?= $data['luas_lahan']; ?></td>
                                    <td class="text-center py-1 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('admin/detailPetani?data=' . $data['id_data_petani']) ?>" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                            <a href="<?= site_url('admin/editpetani?data=' . $data['id_data_petani']) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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
<div class="modal fade" id="addpetani">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Tambah Data petani</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/adddatapetani'); ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> NIK</label>
                            <input type="number" class="form-control  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="nik" placeholder="NIK" value="<?= set_value('nik'); ?>" required>
                            <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Nomor KK</label>
                            <input type="number" class="form-control" name="kk" placeholder="Nomor KK" required>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Provinsi</label>
                            <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Kabupaten</label>
                            <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Luas Lahan</label>
                            <input type="number" class="form-control" name="luas" placeholder="Luas Lahan" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> File Kartu Keluarga</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file1" required>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> File Kartu Tanda Penduduk</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="file2" required>
                                <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Nomor Telepon</label>
                            <input type="text" class="form-control" placeholder="Nomor HP / Whatsapp" name="telepon" required data-inputmask="'mask': ['0899-9999-9999','0899-9999-9999-9']" data-mask>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Email</label>
                            <input type="email" class="form-control" name="email" placeholder="email" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label> Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
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