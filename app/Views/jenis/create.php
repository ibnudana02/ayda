<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> </h3>
                    </div>
                    <?= form_open(current_url()) ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Jenis Aset</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="kdjenis" placeholder="kdjenis">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Aset</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="jenis" placeholder="Jenis Aset">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a href="<?= base_url('jenis/index') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(".select2").select2({
        width: '100%'
    });
</script>
<?= $this->endSection() ?>