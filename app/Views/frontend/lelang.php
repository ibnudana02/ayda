<?= $this->extend('frontend/index') ?>
<?= $this->Section('content') ?>
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(<?= base_url() ?>public/assets/img/page-title-bg.webp);">
    <div class="container position-relative">
        <h1>Aset BPRS Hasanah</h1>
        <p>Temukan Tanah, Rumah, Ruko atau Kendaraan Impian Anda.</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.html">Aset</a></li>
                <li class="current">Lelang</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<!-- Blog Posts Section -->
<section id="blog-posts" class="blog-posts section">

    <div class="container-fluid">
        <div class="row gy-4">

            <?php foreach ($aset as $key => $a) : ?>
                <div class="col-lg-4">
                    <article>
                        <div class="post-img">
                            <a href="<?= base_url('lelang/detail/') . $a['kdaset'] ?>">
                                <img src="<?= base_url('public/uploads/aset/' . $a['image1']) ?>" alt="" class="img-fluid">
                            </a>
                        </div>
                        <h2 class="title">
                            <a href="<?= base_url('lelang/detail/') . $a['kdaset'] ?>" class="text-success"><?= fullnominal($a['hargajual']) ?></a>
                        </h2>
                        <div class="d-flex align-items-center">
                            <div class="post-meta">
                                <p class="post-author"><?= $a['ket_jenis'] . " DI " . $a['lokasi'] ?></p>
                                <p class="post-date">
                                    <span class="px-3">LT: <?= $a['luastanah'] ?> M<sup>2</sup></span>
                                    <span class="px-3">LB: <?= $a['luasbangunan'] ?> M<sup>2</sup></span>
                                    <?php if ($a['ktidur'] > 0) : ?>
                                        <span class="px-3">KT: <?= $a['ktidur'] ?> </span>
                                    <?php endif ?>
                                    <?php if ($a['kmandi'] > 0) : ?>
                                        <span class="px-3">KM: <?= $a['kmandi'] ?> </span>
                                    <?php endif ?>
                                </p>
                            </div>
                        </div>
                    </article>
                </div><!-- End post list item -->
            <?php endforeach ?>
        </div>
    </div>
</section><!-- /Blog Posts Section -->

<!-- Blog Pagination Section -->
<!-- <section id="blog-pagination" class="blog-pagination section">
    <div class="container">
        <div class="d-flex justify-content-center">
            <ul>
                <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                <li><a href="#">1</a></li>
                <li><a href="#" class="active">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li>...</li>
                <li><a href="#">10</a></li>
                <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
        </div>
    </div>
</section> -->
<!-- /Blog Pagination Section -->
<?= $this->endSection() ?>