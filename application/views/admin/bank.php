<section class="content">
    <div class="container-fluid">
        <div class="card card-info card-outline">
            <div class="card-body">
                <form action="<?= base_url('admin/deleteAllBank') ?>" method="POST">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-warning btn-sm mb-1" data-toggle="modal" data-target="#addSurat"><i class="fas fa-plus"></i> Tambah Bank
                        </button>
                        <button type="submit" class="btn btn-danger btn-sm mb-1" name="deleteselect"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                    <hr>
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    Ceklis <input type="checkbox" onchange="selectAll(this)">
                                </th>
                                <th>Logo</th>
                                <th>Nama Bank</th>
                                <th>Atas Nama</th>
                                <th>No Rekening</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($bank as $data) : ?>
                                <tr>
                                    <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $data['id_bank']; ?>"></td>
                                    <td class=" py-1 align-middle text-center"><img width="70px" height="70px" src="<?= base_url('assets/template/dist/img/bank/' . $data['logo']) ?>" alt="pupuk"></td>
                                    <td class=" py-9 align-middle"><?= $data['nama_bank']; ?></td>
                                    <td class=" py-1 align-middle text-center"><?= $data['nama_pemilik']; ?></td>
                                    <td class="py-1 align-middle text-center"><?= $data['nomor_rek']; ?></td>
                                    <td class="text-center py-1 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="<?= site_url('admin/editBank?bank=' . $data['id_bank']) ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
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
                <h4 class="modal-title">Tambah Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('admin/addBank'); ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Bank" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nomor Rekening</label>
                            <input type="text" class="form-control" name="rek" placeholder="Nomor Rekening" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Atas Nama</label>
                            <input type="text" class="form-control" name="atasnama" placeholder="Atas Nama" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Logo Bank</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file" required>
                                    <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                </div>
                            </div>
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