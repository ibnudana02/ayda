<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">No.</th>
                                    <th>Tgl Trx</th>
                                    <th>Debet Rekening</th>
                                    <th>Kredit Rekening</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateLabel"><b>Correction Transaction</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open(base_url('transaction/correction')) ?>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Tgl Transaksi</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control datepicker" name="tgltrn" id="tgltrn">
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
                            <input class="custom-control-input" type="radio" id="drsbb" value="drsbb" <?= set_checkbox('drtype', 'crtab') ?> name="drtype">
                            <label for="drsbb" class="custom-control-label">SBB</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="drtab" value="drtab" <?= set_checkbox('drtype', 'drtab') ?> name="drtype">
                            <label for="drtab" class="custom-control-label">Tabungan</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="drdep" value="drdep" <?= set_checkbox('drtype', 'drdep') ?> name="drtype">
                            <label for="drdep" class="custom-control-label">Deposito</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="drpby" value="drpby" <?= set_checkbox('drtype', 'drpby') ?> name="drtype">
                            <label for="drpby" class="custom-control-label">Pembiayaan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Debet Rekening (DR)</label>
                    <div class="col-sm-5">
                        <input type="hidden" name="dnama" id="dnm">
                        <select name="dnorek" id="drek" class="form-control select2">
                            <option value="null">Pilih</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" readonly name="dnama_old" id="dnama_old" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nominal</label>
                    <div class="col-sm-9">
                        <input type="text" name="nominal" autocomplete="off" id="nominal" class="form-control currency" placeholder="0.00">
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
                            <input class="custom-control-input" type="radio" id="crsbb" value="crsbb" <?= set_checkbox('crtype', 'crtab') ?> name="crtype">
                            <label for="crsbb" class="custom-control-label">SBB</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="crtab" value="crtab" <?= set_checkbox('crtype', 'crtab') ?> name="crtype">
                            <label for="crtab" class="custom-control-label">Tabungan</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="crdep" value="crdep" <?= set_checkbox('crtype', 'crdep') ?> name="crtype">
                            <label for="crdep" class="custom-control-label">Deposito</label>
                        </div>
                        <div class="custom-control custom-radio pr-3">
                            <input class="custom-control-input" type="radio" id="crpby" value="crpby" <?= set_checkbox('crtype', 'crpby') ?> name="crtype">
                            <label for="crpby" class="custom-control-label">Pembiayaan</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kredit Rekening (CR)</label>
                    <div class="col-sm-5">
                        <input type="hidden" name="cnama" id="cnm">
                        <select name="cnorek" id="crek" class="form-control select2">
                            <option value="null">Pilih</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" readonly name="cnama_old" id="cnama_old" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="ket" id="ket" cols="10" rows="1"></textarea>
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
<script type="text/javascript">
    var base_url = "<?= base_url('transaction/') ?>";
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            "responsive": true,
            "processing": true,
            "serverSide": true,
            "columnDefs": [{
                    orderable: false,
                    className: 'text-center',
                    targets: 0
                },
                {
                    orderable: false,
                    targets: 5
                },
            ],
            "order": [
                [1, 'desc']
            ],
            "language": {
                'paginate': {
                    'previous': '<i class="fas fa-chevron-left"></i>',
                    'next': '<i class="fas fa-chevron-right"></i>'
                }
            },
            "ajax": {
                "url": base_url + "list",
                "type": "POST"
            },
        });

        $('#datatable').on('click', '.btn-edit', function() {
            var id = $(this).attr('data');
            Swal.fire({
                title: 'Are you sure?',
                text: "Correction transaction!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Correction',
                denyButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "detail",
                        dataType: "JSON",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            console.log(data.data);
                            if (data.status) {
                                $('#id').val(data.id);
                                $('#tgltrn').val(data.data.tgltrn);
                                $('#nominal').val(data.data.nominal);
                                $('#terbilang').val(data.data.terbilang);
                                $('#ket').val(data.data.ket);
                                $('#dnm').val(data.data.dnama);
                                $('#cnm').val(data.data.cnama);
                                $('#cnama_old').val(data.data.cnorek + " " + data.data.cnama);
                                $('#dnama_old').val(data.data.dnorek + " " + data.data.dnama);
                                $('input[name="drtype"][value="' + data.data.drtype + '"]').prop('checked', true);
                                $('input[name="crtype"][value="' + data.data.crtype + '"]').prop('checked', true);
                                $("#drek").val(data.data.dnorek).trigger('change');
                                $("#crak").val(data.data.crak).trigger('change');
                                $("#drak").val(data.data.drak).trigger('change');
                                $('#update').modal({
                                    backdrop: 'static',
                                    keyboard: false
                                });
                            } else {
                                Swal.fire({
                                    title: data.title,
                                    html: data.desc,
                                    icon: data.icon,
                                    showCancelButton: false,
                                }).then((result) => {
                                    $('#datatable').DataTable().ajax.reload();
                                });
                            }
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Warning', 'Proses edit data batal', 'warning')
                }
            })
        });
    });
</script>
<script src="<?= base_url('public/js/custom.js') ?>"></script>
<?= $this->endSection() ?>