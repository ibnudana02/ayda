<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> </h3>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-two-tabContent">
                            <div class="tab-pane fade show active" id="tab_corporate" role="tabpanel" aria-labelledby="corporate">
                                <?php echo form_open_multipart(base_url('admin/setting/update')) ?>
                                <input type="hidden" name="id_app" value="<?= $app['id'] ?>">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="customFile">Logo</label>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="customFile">
                                            <input type="hidden" name="old_image" value="<?= $app['logo'] ?>">
                                            <label class="custom-file-label" for="customFile"><?= $app['logo'] ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">Nama Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_pt" value="<?= $app['nama_pt'] ?>" placeholder="Nama Perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">Nama Aplikasi (Singkat)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nm_aplikasi" value="<?= $app['nm_aplikasi'] ?>" placeholder="Nama Perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">Nama Aplikasi (Panjang)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="fnama_aplikasi" value="<?= $app['fnama_aplikasi'] ?>" placeholder="Nama Perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">Alamat Perusahaan</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat_pt" id="alamat_pt" cols="30" rows="1" class="form-control"><?= $app['alamat_pt'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">Email Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="email" value="<?= $app['email_pt'] ?>" placeholder="Email Perusahaan">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" for="inputPassword3">No Telp Perusahaan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="telp" value="<?= $app['telp_pt'] ?>" placeholder="Email Perusahaan">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <?= form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
<?= $this->endSection() ?>