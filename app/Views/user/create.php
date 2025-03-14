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
                    <?= form_open(base_url('admin/users/save')) ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Role User</label>
                            <div class="col-sm-9">
                                <select name="user_role" id="user_role" class="form-control select2">
                                    <option value="">Pilih</option>
                                    <?php foreach ($role as $key => $kt) : ?>
                                        <option value="<?= $kt['kd_role'] ?>"><?= $kt['role'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama User</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" placeholder="Nama User">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a href="<?= base_url('admin/users/index') ?>" class="btn btn-danger">Kembali</a>
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