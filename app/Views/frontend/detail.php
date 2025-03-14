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
                <li class="current">Detail Aset</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<section id="blog-details" class="blog-details section">
    <div class="container">

        <article class="article">

            <div class="post-img">
                <img src="<?= base_url('public/uploads/aset/') . $detail->image1 ?>" alt="aset-lelang" class="img-fluid">
            </div>

            <h2 class="title text-success"><?= nominal($detail->hargajual)  ?></h2>
            <h2 class="title"><?= "$detail->ket_jenis DI $detail->alamat"  ?></h2>

            <div class="meta-top">
                <ul>
                    <li class="d-flex align-items-center"><i class="fas fa-map-marker-alt"></i> <?= $detail->alamat ?></li>
                </ul>
            </div><!-- End meta top -->

            <div class="content">
                <p class="text-success h4">INFORMASI</p>
                <table class="table table-borderless" style="width:50%">
                    <tr>
                        <td class="table-success"><i class="fas fa-file-pdf"></i> &nbsp;SERTIFIKAT</td>
                        <td><?= $detail->sertifikat ?></td>
                    </tr>
                    <tr>
                        <td class="table-success"> <i class="fas fa-globe-asia"></i> &nbsp;LUAS TANAH</td>
                        <td><?= $detail->luastanah ?> M<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td class="table-success"><i class="fas fa-home"></i> &nbsp;LUAS BANGUNAN</td>
                        <td><?= $detail->luasbangunan ?> M<sup>2</sup></td>
                    </tr>
                    <?php if ($detail->ktidur > 0) : ?>
                        <tr>
                            <td class="table-success"> <i class="fas fa-bed"></i> &nbsp;KAMAR TIDUR</td>
                            <td><?= $detail->ktidur ?></td>
                        </tr>
                    <?php endif ?>
                    <?php if ($detail->kmandi > 0) : ?>
                        <tr>
                            <td class="table-success"> <i class="fas fa-bath"></i> &nbsp;KAMAR MANDI</td>
                            <td><?= $detail->kmandi ?></td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td class="table-success"><i class="fas fa-warehouse"></i> &nbsp;GARASI</td>
                        <td><?= ($detail->garasi) ? 'ADA' : 'TIDAK ADA' ?></td>
                    </tr>
                    <tr>
                        <td class="table-success"><i class="fas fa-bolt"></i> &nbsp;LISTRIK</td>
                        <td><?= $detail->listrik ?> VA</td>
                    </tr>
                    <tr>
                        <td class="table-success"><i class="fas fa-faucet"></i> &nbsp;SUMBER AIR</td>
                        <td><?= parse_sumberair($detail->sumberair) ?> </td>
                    </tr>
                </table>
                <p class="text-success h4">DESKRIPSI</p>
                <p><?= $detail->deskripsi ?></p>
            </div><!-- End post content -->

            <div class="meta-bottom">
                <i class="bi bi-folder"></i>
                <ul class="cats">
                    <li><a href="#">Aset Bank</a></li>
                </ul>

                <i class="bi bi-tags"></i>
                <ul class="tags">
                    <li><a href="#">Lelang</a></li>
                    <li><a href="#">Aset Bank</a></li>
                    <li><a href="#">Jual Cepat</a></li>
                </ul>
            </div><!-- End meta bottom -->

        </article>

    </div>
</section><!-- /Blog Details Section -->
<?= $this->endSection() ?>