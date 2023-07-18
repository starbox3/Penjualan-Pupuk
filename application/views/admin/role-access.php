<section class="content">
  <div class="row ">
    <div class="col-md-6">
      <!-- /.card -->
      <div class="card card-info ">
        <div class="card-header">
          <h3 class="card-title">Role : <?= $role['role']; ?></h3>
          <div class="card-tools">
            <a class="btn btn-warning btn-sm" href="<?= base_url('admin/role'); ?>"><i class="fas fa-arrow-left"></i></a>
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
                <th>Access</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
              <?php foreach ($menu as $m) : ?>
                <tr class="text-center">
                  <th scope="row"> <?= $i; ?></th>
                  <td> <?= $m['menu']; ?></td>
                  <td>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">

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