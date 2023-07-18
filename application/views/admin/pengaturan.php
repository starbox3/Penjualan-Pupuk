<!-- Main content -->
<?php foreach ($pengaturan as $pe) : ?>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <div class="card card-info card-outline">
            <div class="card-header">
              <h3 class="card-title">Basic Situs</h3>
            </div>
            <?= form_open_multipart('admin/pengaturan'); ?>
            <div class="card-body">
              <input type="hidden" name="id" value="<?= $pe['id']; ?>">
              <div class="form-group">
                <label for="namaweb">Nama Web</label>
                <input type="text" class="form-control" id="namaweb" name="namaweb" value="<?= $pe['namaweb']; ?>">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Favicon Web Perusahaan</label>
                <div class="row">
                  <div class="col-sm-3">
                    <img style="width: 100px ; height: 100px;" src="<?= base_url('assets/template/dist/img/') . $pe['favicon'] ?>" class="img-thumbnail">
                  </div>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="favicon">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            </form>
          </div>
        </div>
        <!--/.col (left) -->
        <!-- right column -->

      </div>
    </div>
  </section>
<?php endforeach; ?>