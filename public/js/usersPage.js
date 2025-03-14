
$('#datatable').on('click', '.btn-edit', function () {
    var id = $(this).attr('data');
    console.log(id);
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
                success: function (data) {
                    console.log(data);
                    if (data.status) {
                        $('#id').val(data.data.id);
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