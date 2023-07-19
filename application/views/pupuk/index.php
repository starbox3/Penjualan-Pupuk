<!-- Header Section End -->
<!-- Banner Begin -->
<div class="banner mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url('assets/produk/') ?>img/banner/banner-1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="banner__pic">
                    <img src="<?= base_url('assets/produk/') ?>img/banner/banner-2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner End -->
<!-- Featured Section Begin -->
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Jenis Pupuk</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">Semua</li>
                        <li data-filter=".pupuka">Pupuk A</li>
                        <li data-filter=".pupukb">Pupuk B</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php foreach ($pupuk as $data) : ?>
            <div class="row featured__filter">
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $data['jenis']; ?> fresh-meat">
                    <div class="featured__item">
                        <div class="categories__item set-bg" data-setbg="<?= base_url('assets/template/dist/img/pupuk/' . $data['gambar']) ?>">
                            <h5><a href="<?= base_url('pupuk/detail?pupuk=') . $data['id'] ?>">Cek Detail</a></h5>
                        </div>
                        <div class="featured__item__text">
                            <h6><?= $data['nama']; ?></h6>
                            <h5>Rp. <?= $data['harga']; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<!-- Featured Section End -->