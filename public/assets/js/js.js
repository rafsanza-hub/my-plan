// Custom JS for SweetAlert implementations
$(document).ready(function() {
    // Delete confirmation
    $('.btn-delete').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');
        
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = href;
            }
        });
    });

    // Add data
    $('.form-add').on('submit', function(e) {
        e.preventDefault();
        const form = $(this);
        
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.status) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data berhasil ditambahkan',
                        timer: 1500
                    }).then(() => {
                        window.location.reload();
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal menambahkan data'
                });
            }
        });
    });

    // Edit data
    $('.btnEdit').on('click', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        
        $('#category_id').val(id);
        $('#category_name').val(name);
    });

    $('#saveEdit').on('click', function() {
        const id = $('#category_id').val();
        const name = $('#category_name').val();

        $.ajax({
            url: '/category/update/' + id,
            type: 'POST',
            dataType: 'json',
            data: {
                category: name,
                [csrfName]: csrfHash
            },
            success: function(response) {
                if(response.status) {
                    $('#editModal').modal('hide');
                    $(`#category_${id}`).text(name);
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                        timer: 1500
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal mengupdate data'
                });
            }
        });
    });

    // Flash message handler
    const flashData = $('.flash-data').data('flashdata');
    if (flashData) {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: flashData,
            timer: 1500
        });
    }
});