<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if (validation_errors()) : ?>
          <div class="callout callout-danger">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>
        <div class="card card-info card-outline">
          <div class="card-body">
            <form action="<?= base_url('admin/deleteAllUser') ?>" method="POST">
              <div class="col-md-6">
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#addAkun"><i class="fas fa-plus"></i> Tambah User</button>
                <button type="submit" class="btn btn-danger btn-sm" name="deleteselect"><i class="fas fa-trash"></i> Hapus User</button>
              </div>
              <hr>
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                  <tr class="text-center py-0 align-middle">
                    <th>
                      <input type="checkbox" onchange="selectAll(this)">
                    </th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($akun as $kr) : ?>
                    <tr>
                      <td class=" py-1 align-middle text-center"><input type="checkbox" name="check_value[]" class="idName" value="<?= $kr['id']; ?>"></td>
                      <td class="py-1 align-middle">
                        <?= $kr['name']; ?>
                      </td>
                      <td class="py-1 align-middle">
                        <?= $kr['email']; ?>
                      </td>
                      <td class="py-1 align-middle text-center">
                        <?php if ($kr['role_id'] == 1) {
                          $k = '<span class="m-0 p-2 badge bg-success">Admin</span>';
                        }
                        if ($kr['role_id'] == 2) {
                          $k = '<span class="m-0 p-2 badge bg-info"> RT </span>';
                        }
                        if ($kr['role_id'] == 3) {
                          $k = '<span class="m-0 p-2 badge bg-warning"> KADES </span>';
                        }
                        if ($kr['role_id'] == 4) {
                          $k = '<span class="m-0 p-2 badge bg-warning"> SEKDES </span>';
                        }
                        ?>
                        <?= $k; ?>
                      </td>
                      <td class="text-center py-1 align-middle">
                        <div class="btn-group btn-group-sm">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editUser<?= $kr['id']; ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Untuk aksi tambah -->
<div class="modal fade" id="addAkun">
  <div class="modal-dialog modal-lg">
    <div class="modal-content ">
      <div class="modal-header bg-info">
        <h4 class="modal-title">Tambah Pengguna</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/user'); ?>" method="post">
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group ">
                <label><i class="fas fa-user mr-1"></i> Nama Lengkap</label>
                <input type="text" class="form-control <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" id="name" name="name" value="<?= set_value('name'); ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><i class="fas fa-lock mr-1"></i>Password</label>
                <input type="password" class="form-control <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="password">
                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label><i class="fas fa-at mr-1"></i>Email</label>
                <input type="email" class="form-control <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><i class="fas fa-users mr-1"></i> Level User</label>
                <select name="level" class="form-control " style="width: 100%;">
                  <option value="1">Admin</option>
                  <option value="2">RT</option>
                  <option value="3">Kades</option>
                  <option value="4">Sekdes</option>
                </select>
                <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
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

<?php $no = 0;
foreach ($akun as $kr) : $no++; ?>
  <div class="modal fade" id="editUser<?= $kr['id']; ?>">
    <div class="modal-dialog modal-lg">
      <div class="modal-content ">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Edit Pengguna</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= form_open_multipart('admin/editUser'); ?>

          <div class="row">
            <input type="hidden" name="id" value="<?= $kr['id']; ?>">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label><i class="fas fa-user mr-1"></i> Nama Lengkap</label>
                <input type="text" class="form-control <?= form_error('name', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" id="name" name="name" value="<?= $kr['name']; ?>">

                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><i class="fas fa-lock mr-1"></i>Password</label>
                <input type="password" class="form-control <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="password">

              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group ">
                <label><i class="fas fa-at mr-1"></i>Email</label>
                <input type="email" class="form-control <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ? 'is-invalid' : null; ?>" name="email" value="<?= $kr['email']; ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label><i class="fas fa-users mr-1"></i> Level User</label>
                <select id="level" name="level" class="form-control " style="width: 100%;">
                  <option value="1" <?= $kr['role_id'] == '1' ? 'selected' : null; ?>>Admin</option>
                  <option value="2" <?= $kr['role_id'] == '2' ? 'selected' : null; ?>>RT</option>
                  <option value="3" <?= $kr['role_id'] == '3' ? 'selected' : null; ?>>Kades</option>
                  <option value="4" <?= $kr['role_id'] == '4' ? 'selected' : null; ?>>Sekdes</option>
                </select>
                <?= form_error('level', '<small class="text-danger pl-3">', '</small>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="exampleInputFile"><i class="fas fa-image mr-1"></i>Foto Profile</label>
                <div class="row">
                  <div class="col-sm-3">
                    <img style="width: 100px ; height: 100px;" src="<?= base_url('assets/template/dist/img/') . $kr['image'] ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
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
<?php endforeach; ?>