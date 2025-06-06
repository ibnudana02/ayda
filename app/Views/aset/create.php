<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="first-tab" data-toggle="pill" href="#first" role="tab" aria-controls="data-aset" aria-selected="true">Registrasi Aset</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="third-tab" data-toggle="pill" href="#third" role="tab" aria-controls="data-dokumentasi" aria-selected="true">Attachment</a>
                            </li>
                        </ul>
                    </div>
                    <?= form_open_multipart(current_url()) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="data-financing-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Aset</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="kdaset" id="kdaset" autocomplete="off" value="<?= set_value('kdaset') ?>" placeholder="Kode Aset">
                                    </div>
                                    <div class="col-sm-3">
                                        <button class="btn btn-primary" id="gen-kdaset" type="button"><i class="fas fa-calculator"></i> &nbsp;Generate Kode</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Aset</label>
                                    <div class="col-sm-9">
                                        <select name="jenis" id="jenis" class="form-control select2">
                                            <option value="">Pilih</option>
                                            <?php foreach ($jenis as $key => $j) : ?>
                                                <option value="<?= $j['kdjenis'] ?>" <?= set_select('jenis', $j['kdjenis']) ?>><?= $j['ket_jenis'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Bukti Kepemilikan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="sertifikat" id="sertifikat" value="<?= set_value('sertifikat') ?>" autocomplete="off" placeholder="No Sertifikat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Lokasi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="lokasi" id="lokasi" autocomplete="off" value="<?= set_value('lokasi') ?>" placeholder="Lokasi Aset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" id="alamat" class="form-control"><?= set_value('alamat') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Share Location</label>
                                    <div class="col-sm-9">
                                        <textarea name="shareloc" id="shareloc" class="form-control"><?= set_value('shareloc') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"><?= set_value('deskripsi') ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Harga Jual</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" value="<?= set_value('hargajual') ?>" name="hargajual" id="hargajual" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row tanah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Luas Tanah</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" <?= set_value('luastanah') ?> name="luastanah" id="luastanah" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row ruko">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Luas Bangunan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" <?= set_value('luasbangunan') ?> name="luasbangunan" id="luasbangunan" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row rumah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kamar Tidur</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" <?= set_value('ktidur') ?> name="ktidur" id="ktidur" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row rumah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kamar Mandi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" <?= set_value('kmandi') ?> name="kmandi" id="kmandi" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-group row rumah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Garasi</label>
                                    <div class="col-sm-9">
                                        <select name="garasi" id="garasi" class="form-control select2">
                                            <option value="" <?= set_select('garasi', '', true) ?>>Pilih</option>
                                            <option value="1" <?= set_select('garasi', '1') ?>>Ada</option>
                                            <option value="0" <?= set_select('garasi', '0') ?>>Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row rumah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Sumber Air</label>
                                    <div class="col-sm-9">
                                        <select name="sumberair" id="sumberair" class="form-control select2">
                                            <option value="" <?= set_select('sumberair', '', true) ?>>Pilih</option>
                                            <option value="1" <?= set_select('sumberair', '1') ?>>Sumur</option>
                                            <option value="2" <?= set_select('sumberair', '2') ?>>Sumur Bor</option>
                                            <option value="3" <?= set_select('sumberair', '3') ?>>PDAM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row rumah">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Listrik</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control currency" autocomplete="off" value="<?= set_value('listrik') ?>" name="listrik" id="listrik" placeholder="0">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 1</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
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
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 6</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input customFile" name="image[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 7</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input customFile" name="image[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 8</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input customFile" name="image[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 9</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input customFile" name="image[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="customFile" class="col-sm-2 col-form-label">Foto Aset 10</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input customFile" name="image[]">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                            <a href="<?= base_url('admin/aset/index') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url() ?>public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
    $(function() {
        bsCustomFileInput.init();
    });

    $('.rumah').hide();
    $('.tanah').hide();
    $('.ruko').hide();

    $(".select2").select2({
        width: '100%',
        allowClear: true
    });

    function generator_kode(length) {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < length) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
            counter += 1;
        }
        return result;
    }

    $('#gen-kdaset').on('click', function() {
        var kode = generator_kode(10);
        $('#kdaset').val(kode);
    });

    var jenis = $("#jenis").val();
    if (jenis != undefined && jenis > 0) {
        if (jenis == '10') {
            $('.rumah').show();
            $('.tanah').show();
            $('.ruko').show();
        } else if (jenis == '20') {
            $('.tanah').show();
            $('.rumah').hide();
            $('.ruko').hide();
        } else if (jenis == '30') {
            $('.ruko').show();
            $('.tanah').hide();
            $('.rumah').hide();
        } else {
            $('.ruko').hide();
            $('.tanah').hide();
            $('.rumah').hide();
        }
    }

    $("#jenis").on('change', function(e) {
        var jenis = $("#jenis").val();
        if (jenis == '10') {
            $('.rumah').show();
            $('.tanah').show();
            $('.ruko').show();
        } else if (jenis == '20') {
            $('.tanah').show();
            $('.rumah').hide();
            $('.ruko').hide();
        } else if (jenis == '30') {
            $('.ruko').show();
            $('.tanah').hide();
            $('.rumah').hide();
        } else {
            $('.ruko').hide();
            $('.tanah').hide();
            $('.rumah').hide();
        }
    })
</script>
<script src="<?= base_url('public/js/custom.js?r=' . time()) ?>"></script>
<?= $this->endSection() ?>