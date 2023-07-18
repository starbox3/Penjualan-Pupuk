<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-server"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Aplikasi</span>
                        <span class="info-box-number">Arsip Surat</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
                    <?php
                    $query = $this->db->query("SELECT * FROM tbl_surat_masuk");
                    $masuk = $query->num_rows();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Surat Masuk</span>
                        <span class="info-box-number"><?= $masuk; ?></span>
                    </div>
                </div>
            </div>
            <div class="clearfix hidden-md-up"></div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-reply"></i></span>
                    <?php
                    $query = $this->db->query("SELECT * FROM tbl_surat_keluar");
                    $keluar = $query->num_rows();
                    ?>
                    <div class="info-box-content">
                        <span class="info-box-text">Surat Keluar</span>
                        <span class="info-box-number"><?= $keluar; ?></span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <?php
                    $query = $this->db->query("SELECT * FROM tbl_data_penduduk");
                    $penduduk = $query->num_rows();
                    ?>
                    <div class="info-box-content" id="time">
                        <span class="info-box-text">Data Penduduk</span>
                        <span class="info-box-number"><?= $penduduk; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>