<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= strtoupper($title) ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= base_url() ?>public/uploads/aplikasi/1692529162_ac3c8dce5e0fb8e16516.png" rel="icon">
    <link href="<?= base_url() ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url() ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <link href="<?= base_url() ?>public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= base_url() ?>public/assets/css/main.css" rel="stylesheet">
</head>

<body class="blog-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="<?= base_url() ?>" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename"><?= $app['nama_pt'] ?></h1>
            </a>
            <?php
            $uri = new \CodeIgniter\HTTP\URI(current_url());
            if ($_SERVER['SERVER_NAME'] == 'siap.bprshasanah.com') {
                $page = $uri->getSegment(1);
            } else {
                $page = $uri->getSegment(2);
            }
            ?>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('/') ?>" class="<?= in_array($page, ['', 'lelang']) ? "active" : ""  ?>">Aset</a></li>
                    <li><a href="<?= base_url('kontak') ?>" class="<?= in_array($page, ['kontak'])  ? "active" : ""  ?>">Kontak</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">



        <?= $this->renderSection('content') ?>

    </main>

    <footer id="footer" class="footer dark-background">
        <div class="container">
            <h3 class="sitename"><?= $app['nama_pt'] ?></h3>
            <p>Temukan Tanah, Rumah, Ruko atau Kendaraan Impian Anda.</p>
            <div class="social-links d-flex justify-content-center">
                <a href="https://www.facebook.com/bprs.hasanah"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/bprs.hasanah/" target="_newtab"><i class="bi bi-instagram"></i></a>
                <a href="https://wa.me/6285356739244?text=Hello%20Saya%20tertarik%20dengan%20aset%20ini!"><i class="bi bi-whatsapp"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                    <span>Copyright</span> 2025 <strong class="px-1 sitename"><?= $app['nama_pt'] ?></strong> <span>All Rights Reserved</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="<?= base_url() ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/aos/aos.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>public/assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="<?= base_url() ?>public/assets/js/main.js"></script>

</body>

</html>