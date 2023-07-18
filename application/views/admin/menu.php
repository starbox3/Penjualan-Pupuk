<section class="content">
  <div class="row ">
    <div class="col-md-6">
      <div class="card card-info ">
        <div class="card-header">
          <h3 class="card-title">Menu</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
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
      </div>
    </div>
  </div>
</section>

<!-- Tambah menu -->
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
<!-- Tambah menu.// -->

<!-- Edit Menu -->