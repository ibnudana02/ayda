<?= $this->extend('frontend/index') ?>
<?= $this->Section('content') ?>
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(<?= base_url() ?>public/assets/img/page-title-bg.webp);">
    <div class="container position-relative">
        <h1>Aset BPRS Hasanah</h1>
        <p>Temukan Tanah, Rumah, Ruko atau Kendaraan Impian Anda.</p>
    </div>
</div><!-- End Page Title -->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <section id="blog-details" class="blog-details section">
                <div class="container">
                    <article class="article">
                        <div class="post-img">
                            <a href="<?= base_url('public/uploads/aset/') . $detail->image1 ?>" class="glightbox">
                                <img src="<?= base_url('public/uploads/aset/') . $detail->image1 ?>" alt="aset-lelang" class="img-fluid">
                            </a>
                        </div>
                        <h2 class="title"><?= nominal($detail->hargajual)  ?></h2>
                        <h5 style="text-align: justify;"><?= "$detail->ket_jenis DI $detail->lokasi"  ?></h5>
                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center" style="text-align: justify;"> <i class="fas fa-map-marker-alt"></i> <?= $detail->alamat ?></li>
                            </ul>
                        </div><!-- End meta top -->
                        <div class="content">
                            <p class="text-success h5">INFORMASI</p>
                            <div class="col-lg-8">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="table-success"><i class="fas fa-file-pdf"></i> &nbsp;Sertifikat</td>
                                        <td class="table-secondary"><?= $detail->sertifikat ?></td>
                                    </tr>
                                    <tr>
                                        <td class="table-success"> <i class="fas fa-globe-asia"></i> &nbsp;Luas Tanah</td>
                                        <td class="table-secondary"><?= $detail->luastanah ?> m<sup>2</sup></td>
                                    </tr>
                                    <?php if ($detail->jenis == '10') : ?>
                                        <tr>
                                            <td class="table-success"><i class="fas fa-home"></i> &nbsp;Luas Bangunan</td>
                                            <td class="table-secondary"><?= $detail->luasbangunan ?> m<sup>2</sup></td>
                                        </tr>
                                        <tr>
                                            <td class="table-success"> <i class="fas fa-bed"></i> &nbsp;Kamar Tidur</td>
                                            <td class="table-secondary"><?= $detail->ktidur ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-success"> <i class="fas fa-bath"></i> &nbsp;Kamar Mandi</td>
                                            <td class="table-secondary"><?= $detail->kmandi ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-success"><i class="fas fa-warehouse"></i> &nbsp;Garasi</td>
                                            <td class="table-secondary"><?= ($detail->garasi) ? 'ADA' : 'TIDAK ADA' ?></td>
                                        </tr>
                                        <tr>
                                            <td class="table-success"><i class="fas fa-bolt"></i> &nbsp;Listrik</td>
                                            <td class="table-secondary"><?= $detail->listrik ?> VA</td>
                                        </tr>
                                        <tr>
                                            <td class="table-success"><i class="fas fa-faucet"></i> &nbsp;Sumber Air</td>
                                            <td class="table-secondary"><?= parse_sumberair($detail->sumberair) ?> </td>
                                        </tr>
                                    <?php endif ?>
                                </table>
                            </div>

                            <p class="text-success h5">DESKRIPSI</p>
                            <div class="col mb-3">
                                <p style="text-align: justify;"><?= $detail->deskripsi ?></p>
                                <p class="text-success">*Click the picture to preview</p>
                            </div>
                            <p>Bagi Anda yang berminat dapat menghubungi PIC <?= $app['nama_pt'] ?> melalui whatsapp <a href="<?= "https://wa.me/{$app['pic']}?text=Hello%20Saya%20tertarik%20dengan%20aset%20ini!" ?> " target="_bprs"><i class="bi bi-whatsapp"></i></a></p>
                        </div><!-- End post content -->
                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Aset Bank</a></li>
                            </ul>
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Lelang</a></li>
                                <li><a href="#">Jual Cepat</a></li>
                            </ul>
                        </div><!-- End meta bottom -->
                    </article>
                </div>
            </section><!-- /Blog Details Section -->
        </div><!-- end main blog -->
        <div class="col-lg-4 sidebar">
            <div class="widgets-container">
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Photo Lainnya</h3>
                    <div class="row gy-2">
                        <?php if ($detail->image2) : ?>
                            <div class="col-lg-4 col-md-6 ">
                                <a href="<?= base_url('public/uploads/aset/' . $detail->image2) ?>" class="glightbox">
                                    <img src="<?= base_url('public/uploads/aset/' . $detail->image2) ?>" class="img-fluid" alt="">
                                </a>
                            </div><!-- End Portfolio Item -->
                        <?php endif ?>
                        <?php if ($detail->image3) : ?>
                            <div class="col-lg-4 col-md-6">
                                <a href="<?= base_url('public/uploads/aset/' . $detail->image3) ?>" class="glightbox">
                                    <img src="<?= base_url('public/uploads/aset/' . $detail->image3) ?>" class="img-fluid" alt="">
                                </a>
                            </div><!-- End Portfolio Item -->
                        <?php endif ?>
                        <?php if ($detail->image4) : ?>
                            <div class="col-lg-4 col-md-6">
                                <a href="<?= base_url('public/uploads/aset/' . $detail->image4) ?>" class="glightbox">
                                    <img src="<?= base_url('public/uploads/aset/' . $detail->image4) ?>" class="img-fluid" alt="">
                                </a>
                            </div><!-- End Portfolio Item -->
                        <?php endif ?>
                        <?php if ($detail->image5) : ?>
                            <div class="col-lg-4 col-md-6">
                                <a href="<?= base_url('public/uploads/aset/' . $detail->image5) ?>" class="glightbox">
                                    <img src="<?= base_url('public/uploads/aset/' . $detail->image5) ?>" class="img-fluid" alt="">
                                </a>
                            </div><!-- End Portfolio Item -->
                        <?php endif ?>
                    </div>
                </div>
                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Dapatkan detail lokasi</h3>
                    <canvas id="qr"></canvas>
                    <p>Scan QRCode untuk mendapatkan rute</p>
                </div>
                <!--/Recent Posts Widget -->
                <!-- Recent Posts Widget -->
                <div class="recent-posts-widget widget-item">
                    <h3 class="widget-title">Posts Lainnya</h3>
                    <?php foreach ($recent as $key => $r) : ?>
                        <div class="post-item">
                            <img src="<?= base_url('public/uploads/aset/' . $r->image1) ?>" alt="" class="flex-shrink-0">
                            <div>
                                <h4><a href="<?= base_url("aset/detail/$r->kdaset") ?>"><?= "$r->ket_jenis DI $r->lokasi " ?></a></h4>
                                <time datetime="2020-01-01"><?= date('M d, Y', strtotime($r->created_at)) ?></time>
                            </div>
                        </div><!-- End recent post item-->
                    <?php endforeach ?>
                </div>
                <!--/Recent Posts Widget -->
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('public/js/qrious.js') ?>"></script>
<script>
    (function() {
        var qr = new QRious({
            element: document.getElementById('qr'),
            size: 150,
            value: '<?= $detail->shareloc ?>'
        });
    })();
</script>
<?= $this->endSection() ?>