<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?> </h3>
                    </div>
                    <div class="card-body">
                        <?= form_open(current_url(), ['id' => 'form_create_trx']) ?>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Tanggal Transaksi</label>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tgltrn" id="tgltrn" autocomplete="off">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Transaksi Kantor (DR)</label>
                            <div class="col-sm-9">
                                <select name="drak" id="drak" class="form-control select2">
                                    <option value="null">Pilih</option>
                                    <?php foreach ($kantor as $key => $k) : ?>
                                        <option value="<?= $k['sandi_ktr'] ?>"><?= $k['sandi_ktr'] . " - " . $k['nama_ktr'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Debet Rek</label>
                            <div class="col-sm-7 row px-3">
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="drsbb" value="drsbb" <?= set_radio('drtype', 'crtab') ?> name="drtype">
                                    <label for="drsbb" class="custom-control-label">SBB</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="drtab" value="drtab" <?= set_radio('drtype', 'drtab') ?> name="drtype">
                                    <label for="drtab" class="custom-control-label">Tabungan</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="drdep" value="drdep" <?= set_radio('drtype', 'drdep') ?> name="drtype">
                                    <label for="drdep" class="custom-control-label">Deposito</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="drpby" value="drpby" <?= set_radio('drtype', 'drpby') ?> name="drtype">
                                    <label for="drpby" class="custom-control-label">Pembiayaan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Debet Rekening (DR)</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="dnama" id="dnm">
                                <select name="dnorek" id="drek" class="form-control select2">
                                    <option value="null">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nominal</label>
                            <div class="col-sm-9">
                                <input type="text" name="nominal" autocomplete="off" id="nominal" value="<?= set_value('nominal') ?>" class="form-control currency" placeholder="0.00">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Transaksi Kantor (CR)</label>
                            <div class="col-sm-9">
                                <select name="crak" id="crak" class="form-control select2">
                                    <option value="null">Pilih</option>
                                    <?php foreach ($kantor as $key => $k) : ?>
                                        <option value="<?= $k['sandi_ktr'] ?>"><?= $k['sandi_ktr'] . " - " . $k['nama_ktr'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kredit Rek</label>
                            <div class="col-sm-7 row px-3">
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="crsbb" value="crsbb" <?= set_radio('crtype', 'crtab') ?> name="crtype">
                                    <label for="crsbb" class="custom-control-label">SBB</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="crtab" value="crtab" <?= set_radio('crtype', 'crtab') ?> name="crtype">
                                    <label for="crtab" class="custom-control-label">Tabungan</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="crdep" value="crdep" <?= set_radio('crtype', 'crdep') ?> name="crtype">
                                    <label for="crdep" class="custom-control-label">Deposito</label>
                                </div>
                                <div class="custom-control custom-radio pr-3">
                                    <input class="custom-control-input" type="radio" id="crpby" value="crpby" <?= set_radio('crtype', 'crpby') ?> name="crtype">
                                    <label for="crpby" class="custom-control-label">Pembiayaan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Kredit Rekening (CR)</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="cnama" id="cnm">
                                <select name="cnorek" id="crek" class="form-control select2">
                                    <option value="null">Pilih</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="ket" id="ket" cols="10" rows="1"><?= set_value('ket') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"> <i class="fas fa-cart-arrow-down"></i> Simpan</button>
                            <?= form_close() ?>
                            <button id="btn-print" type="button" class="btn btn-success"> <i class="fas fa-print"></i> Simpan - Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
    var base_url = '<?= base_url('transaction/') ?>';
</script>
<script>
    $(document).ready(function() {
        $('#crek').change(function() {
            var data = $('#crek').select2('data');
            var txt = data[0].text;
            var pisah = txt.split("~");
            $('#cnm').val(pisah[1]);
        });

        $('#drek').change(function() {
            var data = $('#drek').select2('data');
            var txt = data[0].text;
            var pisah = txt.split("~");
            $('#dnm').val(pisah[1]);
        });

        $('#drak').select2();

        $('#crak').select2();

        $('#btn-print').click(function() {
            $.ajax({
                type: 'POST',
                url: '<?= current_url() ?>',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                data: $('#form_create_trx').serialize(),
                dataType: "JSON",
                cache: false,
                success: function(data) {
                    if (data.status) {
                        Swal.fire({
                            title: data.title,
                            html: data.desc,
                            icon: data.icon,
                            confirmButtonText: "Print!",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#form_create_trx")[0].reset();
                                window.open(base_url + "print/" + data.data, '_cetak');
                            }
                        })
                    } else {
                        Swal.fire({
                            title: data.title,
                            html: data.desc,
                            icon: data.icon
                        })
                    }

                },
                error: function(e) {
                    console.log(e);
                }
            })
        })
    });
</script>
<script src="<?= base_url('public/js/custom.js?r=' . time()) ?>"></script>
<?= $this->endSection() ?>