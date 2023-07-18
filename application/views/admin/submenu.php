<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <?php if (validation_errors()) : ?>
          <div class="alert alert-danger " role="alert">
            <?= validation_errors(); ?>
          </div>
        <?php endif; ?>
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Submenu Management</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus"></i> Tambah
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-striped">
              <thead>
                <tr class="text-center py-0 align-middle">
                  <th>#</th>
                  <th>Title</th>
                  <th>Menu</th>
                  <th>Url</th>
                  <th>Icon</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($subMenu as $sm) : ?>
                  <tr class="text-center py-0 align-middle">
                    <th class=" py-1 align-middle"> <?= $i; ?></th>
                    <td class=" py-1 align-middle"> <?= $sm['title']; ?></td>
                    <td class=" py-1 align-middle"> <?= $sm['menu']; ?></td>
                    <td class=" py-1 align-middle"> <?= $sm['url']; ?></td>
                    <td class=" py-1 align-middle"> <?= $sm['icon']; ?></td>
                    <td class="text-center py-1 align-middle">
                      <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editSubMenuModal<?= $sm['id']; ?>">
                          <i class="fas fa-edit"></i>
                        </button>

                        <form action="<?= base_url('admin/deletesub/') . $sm['id']; ?>" method="post" class="btn-group btn-group-sm">
                          <?= csrf()  ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                        </form>

                      </div>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Untuk aksi tambah -->
<div class="modal fade" id="newSubMenuModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title" id="newSubMenuModal">Add New Submenu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin/submenu'); ?>" method="post">
        <div class="modal-body">
          <label for="menu">Submenu</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
          <label for="menu_id1">Menu</label>
          <select id="menu_id1" name="menu_id" class="form-control" style="width: 100%;">
            <option value="">-Pilih-</option>
            <?php foreach ($menu as $m) : ?>
              <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="url">Url</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="Submenu Url">
          <label for="icon">Icon</label>
          <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
          <label for="is_active">Active</label>
          <select id="is_active" name="is_active" class="form-control " style="width: 100%;">
            <option value="">-Pilih-</option>
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
          </select>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light ">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.Untuk aksi tambah -->

<!-- Untuk aksi edit -->
<?php $no = 0;
foreach ($subMenu as $sm) : $no++; ?>
  <div class="modal fade" id="editSubMenuModal<?= $sm['id']; ?>" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
      <div class="modal-content bg-info">
        <div class="modal-header">
          <h4 class="modal-title" id="editSubMenuModal">Edit Submenu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <?= form_open_multipart('admin/editSubMenu'); ?>

        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $sm['id']; ?>">
          <label for="title">Submenu</label>
          <input type="text" class="form-control" id="title" name="title" value="<?= $sm['title']; ?>">
          <label for="menu_id2">Menu</label>
          <select id="menu_id2" name="menu_id" class="form-control " style="width: 100%;">

            <?php foreach ($menu as $m) : ?>
              <option value="<?= $m['id']; ?>" <?= $sm['menu_id'] == $m['id'] ? 'selected' : null ?>><?= $m['menu']; ?></option>
            <?php endforeach; ?>
          </select>
          <label for="url">Url</label>
          <input type="text" class="form-control" id="url" name="url" value="<?= $sm['url']; ?>">
          <label for="icon">Icon</label>
          <input type="text" class="form-control" id="icon" name="icon" value="<?= $sm['icon']; ?>">
          <label for="is_active">Active</label>
          <select id="is_active" name="is_active" class="form-control " style="width: 100%;">


            <option value="1" <?= $sm['is_active'] == '1' ? 'selected' : null ?>>Aktif</option>
            <option value="0" <?= $sm['is_active'] == '0' ? 'selected' : null ?>>Tidak Aktif</option>

          </select>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light ">Save</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<?php endforeach; ?>

<!-- /.Untuk aksi edit -->