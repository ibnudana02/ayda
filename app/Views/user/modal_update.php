<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Update Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open(base_url('users/update')) ?>
            <div class="modal-body">
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
                        <input type="hidden" name="id">
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>