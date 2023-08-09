<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-server"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Aplikasi</span>
                        <span class="info-box-number">Penjualan Pupuk</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <?php
                        $query = $this->db->query("SELECT * FROM tbl_data_petani");
                        $petani = $query->num_rows();
                        ?>
                        <span class="info-box-text">Total Member Petani</span>
                        <span class="info-box-number"><?= $petani; ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-boxes"></i></span>
                    <div class="info-box-content">
                        <?php
                        $query = $this->db->query("SELECT SUM(stok) AS `stok` FROM `tbl_pupuk`");
                        $pupuk = $query->row_array();
                        ?>
                        <span class="info-box-text">Total Stok Pupuk</span>
                        <span class="info-box-number"><?= $pupuk['stok']; ?> Pupuk</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hand-holding-usd"></i></span>
                    <div class="info-box-content">
                        <?php
                        $query = $this->db->query("SELECT SUM(nominal) AS `nominal` FROM `tbl_pembayaran` WHERE `tbl_pembayaran`.`status_pembayaran`=1");
                        $terjual = $query->row_array();
                        $nominal = "Rp. " . number_format($terjual['nominal'], 0, ".", ".")
                        ?>
                        <span class="info-box-text">Total Penjualan Pupuk</span>
                        <span class="info-box-number"><?= $nominal; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>