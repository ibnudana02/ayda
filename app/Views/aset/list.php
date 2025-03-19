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
                                    <th>Kode Aset</th>
                                    <th>Jenis Aset</th>
                                    <th>Sertifikat</th>
                                    <th>Harga Jual</th>
                                    <th>Lokasi</th>
                                    <th>Alamat</th>
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
                <h5 class="modal-title" id="updateLabel"><b>Preview Data Aset</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="first-tab" data-toggle="pill" href="#first" role="tab" aria-controls="data-aset" aria-selected="true">Registrasi Aset</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="second-tab" data-toggle="pill" href="#second" role="tab" aria-controls="data-fasilitas" aria-selected="true">Fasilitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="third-tab" data-toggle="pill" href="#third" role="tab" aria-controls="data-dokumentasi" aria-selected="true">Attachment</a>
                            </li>
                        </ul>
                    </div>
                    <?= form_open(base_url('admin/aset/update')) ?>
                    <div class="card-body pb-0">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="data-financing-tab">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Kode Aset</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="kdaset" id="kdaset" placeholder="Kode Aset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Jenis Aset</label>
                                    <div class="col-sm-8">
                                        <select name="jenis" id="jenis" class="form-control select2">
                                            <option value="">Pilih</option>
                                            <?php foreach ($jenis as $key => $j) : ?>
                                                <option value="<?= $j['kdjenis'] ?>"><?= $j['ket_jenis'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Harga Jual</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control currency" name="hargajual" id="hargajual" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Bukti Kepemilikan</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="sertifikat" id="sertifikat" placeholder="No Sertifikat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Lokasi Aset</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi Aset">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Alamat</label>
                                    <div class="col-sm-8">
                                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Deskripsi</label>
                                    <div class="col-sm-8">
                                        <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab">
                                <h4 class="header-title">Fasilitas</h4>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Luas Tanah | Bangunan</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control currency" name="luastanah" id="luastanah" placeholder="0.00">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control currency" name="luasbangunan" id="luasbangunan" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Kamar Tidur | Mandi</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control currency" name="ktidur" id="ktidur" placeholder="0.00">
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control currency" name="kmandi" id="kmandi" placeholder="0.00">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Garasi</label>
                                    <div class="col-sm-8">
                                        <select name="garasi" id="garasi" class="form-control select2">
                                            <option value="">Pilih</option>
                                            <option value="1">Ada</option>
                                            <option value="0">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Sumber Air</label>
                                    <div class="col-sm-8">
                                        <select name="sumberair" id="sumberair" class="form-control select2">
                                            <option value="">Pilih</option>
                                            <option value="1">Sumur</option>
                                            <option value="2">Sumur Bor</option>
                                            <option value="3">PDAM</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-4 col-form-label">Listrik</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control currency" name="listrik" id="listrik" placeholder="0.00">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img id="image1" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img id="image2" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img id="image3" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img id="image4" class="w-100" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                        <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                            <img id="image5" class="w-100" />
                                        </div>
                                    </div>
                                </div>
                            </div>
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
<?= $this->include('aset/upload') ?>
<script src="<?= base_url() ?>public/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script type="text/javascript">
    var base_url = "<?= base_url('admin/aset/') ?>";
    var dir_url = "<?= base_url('public/uploads/aset/') ?>";
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: '<span class="fa fa-plus-circle" aria-hidden="true"></span> Create',
                action: function(e, dt, node, config) {
                    window.location.href = base_url + 'create';
                }
            }],
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
                    targets: 1
                },
                {
                    orderable: false,
                    targets: 6
                },
                {
                    orderable: false,
                    className: 'text-center',
                    targets: 8
                },
            ],
            "order": [
                [7, 'desc']
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

        $('#datatable').on('click', '.btn-view', function() {
            var id = $(this).attr('data');
            Swal.fire({
                title: 'Preview Data!?',
                text: "Periksa Kelengkapan Data Aset!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Preview',
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
                        success: function(res) {
                            console.log(res);
                            if (res.status) {
                                const aset = res.aset;
                                const fasilitas = res.fasilitas;
                                // $('#id').val(data.id);
                                $('#kdaset').val(res.aset.kdaset).prop('readonly', true);
                                $('#jenis').val(res.aset.jenis);
                                $('#jenis').trigger('change')
                                $('#luastanah').val(res.aset.luastanah);
                                $('#luasbangunan').val(res.aset.luasbangunan);
                                $('#hargajual').val(res.aset.hargajual);
                                $('#lokasi').val(res.aset.lokasi);
                                $('#sertifikat').val(res.aset.sertifikat);
                                $('#alamat').html(res.aset.alamat);
                                $('#deskripsi').html(res.aset.deskripsi);
                                $('#ktidur').val(res.aset.ktidur);
                                $('#kmandi').val(res.aset.kmandi);
                                $('#listrik').val(res.aset.listrik);
                                $('#garasi').val(res.aset.garasi).trigger('change');
                                $('#sumberair').val(res.aset.sumberair).trigger('change');
                                $("#image1").prop('src', dir_url + res.aset.image1);
                                $("#image2").prop('src', dir_url + res.aset.image2);
                                $("#image3").prop('src', dir_url + res.aset.image3);
                                $("#image4").prop('src', dir_url + res.aset.image4);
                                $("#image5").prop('src', dir_url + res.aset.image5);
                                $("#image6").prop('src', dir_url + res.aset.image6);
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

        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).attr('data');
            console.log(id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proses ini akan menghapus Data!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Hapus',
                denyButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "delete",
                        dataType: "JSON",
                        data: {
                            id: id,
                        },
                        success: function(data) {
                            console.log(data);
                            Swal.fire({
                                title: data.title,
                                html: data.desc,
                                icon: data.icon,
                                showCancelButton: false,
                            }).then((result) => {
                                $('#datatable').DataTable().ajax.reload();
                            });
                        }
                    })
                } else if (result.isDenied) {
                    Swal.fire('Warning', 'Proses hapus batal', 'warning')
                }
            })
        });

        $(function() {
            bsCustomFileInput.init();
        });

        $('#datatable').on('click', '.btn-image', function() {
            var id = $(this).attr('data');
            console.log(id);
            Swal.fire({
                title: 'Upload Photo Aset?',
                text: "Proses ini akan mengupload photo aset!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Upload!',
                denyButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#u_kdaset').val(id);
                    $('#uploadPhotos').modal({
                        backdrop: 'static',
                        keyboard: false
                    });
                } else if (result.isDenied) {
                    Swal.fire('Warning', 'Proses hapus batal', 'warning')
                }
            })
        });
    });
</script>
<script src="<?= base_url('public/js/custom.js') ?>"></script>

<?= $this->endSection() ?>