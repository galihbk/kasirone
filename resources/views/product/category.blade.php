<x-app-layout>
    @section('title', 'Kategori Produk')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen Produk</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Kategori Produk</a></li>
            </ol>
        </div>
        <div class="mb-4">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">Tambah
                Kategori</button>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Kategori</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="category-table" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th>Tanggal Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="basicModal" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="form-add-category">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 col-md-12">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form id="form-edit-category">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editCategoryModalLabel">Edit Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="category_id" name="category_id">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" id="category_name" name="category_name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @section('script')
        <script>
            $(document).ready(function() {
                $('#category-table').on('click', '.btn-edit', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');

                    $('#category_id').val(id);
                    $('#category_name').val(name);

                    $('#editCategoryModal').modal('show');
                });
                $('#form-edit-category').on('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();

                    $.ajax({
                        url: '{{ route('product.update-category') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.status) {
                                $('#editCategoryModal').modal('hide');
                                toastrSuccessBottomRight('Kategori berhasil di perbarui')
                                $('#category-table').DataTable().ajax.reload();
                            } else {
                                toastrDangerBottomRight(response.message)
                            }
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                var errorText = '';

                                $.each(errors, function(key, value) {
                                    errorText += value[0] + '\n';
                                });
                                toastrDangerBottomRight(errorText)
                            } else {
                                toastrDangerBottomRight('Terjadi kesalahan pada server.')
                            }
                        }
                    });
                });
                $('#category-table').on('click', '.btn-delete', function() {
                    var id = $(this).data('id');

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal',
                        showLoaderOnConfirm: true,
                        customClass: {
                            confirmButton: 'btn btn-primary',
                            cancelButton: 'btn btn-danger'
                        },
                        preConfirm: () => {
                            return $.ajax({
                                url: '{{ route('product.delete-category', ':id') }}'
                                    .replace(':id', id),
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    _method: 'DELETE'
                                }
                            }).then(response => {
                                if (!response.status) {
                                    Swal.fire(
                                        'Oops...',
                                        response.message,
                                        'error'
                                    );
                                    return false;
                                }
                                return response;
                            }).catch(error => {
                                Swal.fire(
                                    'Request gagal',
                                    `Error: ${error.message}`,
                                    'error'
                                );
                            });
                        },
                        allowOutsideClick: () => !Swal
                            .isLoading() // Memastikan klik di luar SweetAlert saat loading tidak menutup
                    }).then((result) => {
                        if (result.value) {
                            // Jika penghapusan berhasil
                            toastrSuccessBottomRight(result.value.message);
                            $('#category-table').DataTable().ajax.reload(); // Reload data table
                        }
                    });
                });




                $('#form-add-category').on('submit', function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: '{{ route('product.add-category') }}',
                        data: formData,
                        success: function(response) {
                            $('#form-add-category')[0].reset();
                            $('#category-table').DataTable().ajax.reload();
                            toastrSuccessBottomRight(response.message);
                            $('#basicModal').modal('hide')
                        },
                        error: function(xhr) {
                            if (xhr.status === 422) {
                                var errors = xhr.responseJSON.errors;
                                var errorText = '';

                                $.each(errors, function(key, value) {
                                    errorText += value[0] + '\n';
                                });
                                toastrDangerBottomRight(errorText)
                            } else {
                                toastrDangerBottomRight('Terjadi kesalahan pada server.')
                            }
                        }
                    });
                });
                $('#category-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('product.get-data-category') }}',
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'category_name',
                            name: 'category_name'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at',
                            render: function(data, type, row) {
                                return formatTanggal(data);
                            }
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            render: function(data, type, row) {
                                return formatTanggal(data);
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });

            });
        </script>
    @endsection
</x-app-layout>
