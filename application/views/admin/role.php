<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <?= $this->session->flashdata('message'); ?>
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Role</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Role</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($role as $r) : ?>
                  <tr class="text-center">
                    <th scope="row"> <?= $i; ?></th>
                    <td> <?= $r['role']; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-success"><i class="fas fa-eye"></i></a>
                        <a href="<?= base_url('admin/deleterole/') . $r['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">
        <!-- Form Element sizes -->
        <div class="card card-info card-outline">
          <div class="card-header">
            <h3 class="card-title">Menu</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse"><i class="fas fa-minus"></i></button>
            </div>
          </div>
          <div class="card-body p-0">
            <table class="table">
              <thead>
                <tr class="text-center">
                  <th>No</th>
                  <th>Menu</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($menu as $m) : ?>
                  <tr class="text-center">
                    <th scope="row"> <?= $i; ?></th>
                    <td> <?= $m['menu']; ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">

                        <a href="<?= base_url('admin/deletemenu/') . $m['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</section>


<!-- new role -->
<div class="modal fade" id="newRoleModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title" id="newRoleModal">Add Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form role="form" id="myForm" data-toggle="validator" action="<?= base_url('admin/role'); ?>" method="post">
        <div class="modal-body">
          <label for="role">Role</label>
          <input type="text" class="form-control" id="role" name="role">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light ">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- new role -->

<!-- new menu -->
<div class="modal fade" id="newMenuModal" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content bg-info">
      <div class="modal-header">
        <h4 class="modal-title" id="newMenuModal">Add Menu</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form action="<?= base_url('admin/menu'); ?>" method="post">
        <div class="modal-body">
          <label for="menu">Menu</label>
          <input type="text" class="form-control " id="menu" name="menu">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-light ">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- new menu -->