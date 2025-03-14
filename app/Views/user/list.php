<?= $this->extend('layout/template') ?>

<?= $this->Section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable" class="table table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">No.</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
<?= $this->include('user/modal_update') ?>
<script type="text/javascript">
    var base_url = "<?= base_url('admin/users/') ?>";
    $(document).ready(function() {
        $(".select2").select2({
            width: '100%'
        });
        var table = $('#datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [{
                text: '<span class="fa fa-plus-circle" aria-hidden="true"></span> Create',
                action: function(e, dt, node, config) {
                    window.location.href = base_url + 'create';
                }
            }],
            "processing": true,
            "serverSide": true,
            "responsive": true,
            columnDefs: [{
                className: 'text-center',
                targets: 0
            }, {
                className: 'text-center',
                targets: 2
            }, {
                className: 'text-center',
                targets: 4
            }, {
                orderable: false,
                targets: 5
            }],
            "order": [
                [1, 'asc']
            ],
            language: {
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

        $('#datatable').on('click', '.btn-hapus', function() {
            var id = $(this).attr('data');
            console.log(id);
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Proses ini akan menghapus Data user!",
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
        $('#datatable').on('click', '.btn-edit', function() {
            var id = $(this).attr('data');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Perubahan data!",
                icon: 'warning',
                showDenyButton: true,
                confirmButtonColor: '#3085d6',
                denyButtonColor: '#d33',
                confirmButtonText: 'Ubah',
                denyButtonText: 'Batal'
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
                            console.log(data);
                            if (data.status) {
                                var res = data.data;
                                $('input[name="id"]').val(res.id);
                                $('#user_role').val(res.user_role).trigger('change');
                                $('#user_loc').val(res.user_loc).trigger('change');
                                $('input[name="username"]').val(res.username).attr('readonly', 'readonly');
                                $('input[name="name"]').val(res.name);
                                $('input[name="email"]').val(res.email);
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
<?= $this->endSection() ?>