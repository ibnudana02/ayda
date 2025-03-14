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
                <li class="current">Kontak</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->
<!-- Contact Section -->
<section id="contact" class="contact section light-background">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div><!-- End Section Title -->
    <div class="container" data-aos="fade" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-4">
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                    <div>
                        <h3>Address</h3>
                        <p><?= $app['alamat_pt'] ?></p>
                    </div>
                </div><!-- End Info Item -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone flex-shrink-0"></i>
                    <div>
                        <h3>Call Us</h3>
                        <p><?= $app['telp_pt'] ?></p>
                    </div>
                </div><!-- End Info Item -->
                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope flex-shrink-0"></i>
                    <div>
                        <h3>Email Us</h3>
                        <p><?= $app['email_pt'] ?></p>
                    </div>
                </div><!-- End Info Item -->
            </div>
            <div class="col-lg-8">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->
        </div>
    </div>
</section><!-- /Contact Section -->
<?= $this->endSection() ?>