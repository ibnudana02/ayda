<?= $this->extend('layout/template') ?>
<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered table-hover table-sm">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">No.</th>
                                    <th>Kode Jenis Aset</th>
                                    <th>Jenis Aset</th>
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
            <?= form_open(base_url('jenis/update')) ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kode Jenis Aset</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="id" id="id">
                        <input type="text" class="form-control" name="kdjenis" id="kdjenis" readonly placeholder="Kode Jenis Aset">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Aset</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="ket_jenis" id="jenis" placeholder=" Jenis Aset">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <?= form_close() ?>
    </div>
</div>
</div>
<script type="text/javascript">
    var base_url = "<?= base_url('admin/jenis/') ?>";
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
                    className: 'text-center',
                    targets: 4
                },
            ],
            "order": [
                [1, 'asc']
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
                text: "Edit Jenis Aset!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Edit',
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
                                const res = data.data;
                                $('#id').val(res.id);
                                $("#kdjenis").val(res.kdjenis);
                                $("#jenis").val(res.ket_jenis);
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
    });
</script>
<script src="<?= base_url('public/js/custom.js') ?>"></script>
<?= $this->endSection() ?>