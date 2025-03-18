<div class="modal fade" id="uploadPhotos" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel">Upload Photos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open_multipart(base_url('admin/aset/upload')) ?>
            <div class="modal-body">
                <p class="text-danger">Photo wajib beresolusi 1200x796 px!</p>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 1</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="hidden" name="u_kdaset" id="u_kdaset">
                            <input type="file" class="custom-file-input customFile" name="image[]">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 2</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input customFile" name="image[]">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 3</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input customFile" name="image[]">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 4</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input customFile" name="image[]">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 5</label>
                    <div class="col-sm-10">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input customFile" name="image[]">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
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