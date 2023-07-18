<section class="content">
    <div class="container-fluid">
        <form action="<?= base_url('admin/laporan') ?>" method="POST">
            <div class="card card-info card-outline">
                <div class="card-body">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Periode :</label>
                            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                                <input type="text" name="year" class="form-control datetimepicker-input" data-target="#reservationdate2" placeholder="Tanggal Surat" value="<?= $periode1 ?>" />
                                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Pilih Surat:</label>
                            <select name="surat" class="form-control " style="width: 100%;" onchange="this.form.submit()">
                                <option>--Pilih Surat--</option>
                                <option value="1" <?= $tipe == '1' ? 'selected' : null; ?>>Surat Masuk</option>
                                <option value="2" <?= $tipe == '2' ? 'selected' : null; ?>>Surat Keluar</option>
                            </select>
                        </div>
                    </div>
                    <div class="card card-success">
                        <div class="card-header">
                            <?php if ($tipe == 0) {
                                $surat = 'Surat Masuk';
                            }
                            if ($tipe == 1) {
                                $surat = 'Surat Masuk';
                            }
                            if ($tipe == 2) {
                                $surat = 'Surat Keluar';
                            } ?>
                            <?php if ($periode1 == null) {
                                $tahun = '2023';
                            } else {
                                $tahun = $periode1;
                            }
                            ?>
                            <h3 class="card-title">Chart Periode Tahun : <?= $tahun ?> | <?= $surat ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>