<x-app-layout>
    @section('title', 'Produk')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manajemen Produk</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">List Produk</a></li>
            </ol>
        </div>
        <div class="mb-4">
            <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#basicModal">Tambah
                Produk</button>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Produk</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="product-table" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori Produk</th>
                                    <th>Jumlah Produk</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Barcode</th>
                                    <th>Terakhir diubah</th>
                                    <th>Terakhir diubah oleh</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade modal-xl" id="basicModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-add-product">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku"
                                    placeholder="Scan barcode / Masukan SKU">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Kategori Produk</label>
                                <select type="text" class="form-control" name="product_category">
                                    <option value="">--pilih--</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" value="0" class="form-control" name="stock">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Satuan</label>
                                    <select type="text" class="form-control" name="unit">
                                        <option value="">--pilih--</option>
                                        <option value="Pcs">Pcs</option>
                                        <option value="Liter">Liter</option>
                                        <option value="Kg">Kg</option>
                                        <option value="G">Gram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Harga Beli</label>

                                    <input type="text" class="form-control" name="price" id="price">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="text" class="form-control" name="cost_price" id="cost_price">
                                </div>
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
        <div class="modal fade modal-xl" id="editProductModal" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="form-edit-product">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Perbarui Produk</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">SKU</label>
                                <input type="text" class="form-control" name="sku" id="sku"
                                    placeholder="Scan barcode / Masukan SKU" readonly>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" id="product_name">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Kategori Produk</label>
                                <select type="text" class="form-control" name="product_category"
                                    id="product_category">
                                    <option value="">--pilih--</option>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" value="0" class="form-control" name="stock"
                                        id="stock">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Satuan</label>
                                    <select type="text" class="form-control" name="unit" id="unit">
                                        <option value="">--pilih--</option>
                                        <option value="Pcs">Pcs</option>
                                        <option value="Liter">Liter</option>
                                        <option value="Kg">Kg</option>
                                        <option value="G">Gram</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Harga Beli</label>
                                    <input type="text" class="form-control" name="priceEdit" id="priceEdit">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Harga Jual</label>
                                    <input type="text" class="form-control" name="cost_priceEdit"
                                        id="cost_priceEdit">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger light"
                                data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @section('script')
        <script>
            $(document).ready(function() {
                function formatRupiah(angka, prefix) {
                    let number_string = angka.replace(/[^,\d]/g, '').toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                    if (ribuan) {
                        let separator = sisa ? '.' : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                }

                $('#price, #cost_price').on('keyup', function() {
                    $(this).val(formatRupiah($(this).val(), 'Rp '));
                });
                $('#priceEdit, #cost_priceEdit').on('keyup', function() {
                    $(this).val(formatRupiah($(this).val(), 'Rp '));
                });
                $('#product-table').on('click', '.btn-edit', function() {
                    var name = $(this).data('name');
                    var sku = $(this).data('sku');
                    var category = $(this).data('category');
                    var unit = $(this).data('unit');
                    var stock = $(this).data('stock');
                    var price = formatRupiahConvert($(this).data('price'));
                    var cost_price = formatRupiahConvert($(this).data('costprice'));

                    $('#sku').val(sku);
                    $('#product_name').val(name);
                    $('#product_category').val(category);
                    $('#unit').val(unit);
                    $('#priceEdit').val(price);
                    $('#cost_priceEdit').val(cost_price);
                    $('#stock').val(stock);
                    $('#editProductModal').modal('show');
                });
                $('#form-edit-product').on('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();
                    var cleanPrice = $('[name="priceEdit"]').val().replace(/[^0-9]/g, '');
                    var cleanCostPrice = $('[name="cost_priceEdit"]').val().replace(/[^0-9]/g, '');
                    formData += '&price_clean=' + cleanPrice;
                    formData += '&cost_price_clean=' + cleanCostPrice;
                    $.ajax({
                        url: '{{ route('product.update-product') }}',
                        type: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.status) {
                                $('#editProductModal').modal('hide');
                                toastrSuccessBottomRight('Produk berhasil di perbarui')
                                $('#product-table').DataTable().ajax.reload();
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
                $('#product-table').on('click', '.btn-delete', function() {
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
                                url: '{{ route('product.delete-product', ':id') }}'
                                    .replace(':id',
                                        id),
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    _method: 'DELETE'
                                }
                            }).then(response => {
                                return response;
                            }).catch(error => {
                                Swal.showValidationMessage(
                                    `Request gagal: ${error.message}`
                                );
                            });
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.value) {
                            toastrSuccessBottomRight(result.value.message);
                            $('#product-table').DataTable().ajax.reload();
                        }
                    });
                });



                $('#form-add-product').on('submit', function(e) {
                    e.preventDefault();

                    var formData = $(this).serialize();
                    var cleanPrice = $('[name="price"]').val().replace(/[^0-9]/g, '');
                    var cleanCostPrice = $('[name="cost_price"]').val().replace(/[^0-9]/g, '');
                    formData += '&price_clean=' + cleanPrice;
                    formData += '&cost_price_clean=' + cleanCostPrice;
                    $.ajax({
                        url: '{{ route('product.add-product') }}',
                        data: formData,
                        type: 'POST',
                        success: function(response) {
                            $('#form-add-product')[0].reset();
                            $('#product-table').DataTable().ajax.reload();
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
                $('#product-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ route('product.get-data-product') }}',
                    columns: [{
                            data: 'sku',
                            name: 'sku'
                        },
                        {
                            data: 'product_name',
                            name: 'product_name'
                        },
                        {
                            data: 'category_name',
                            name: 'category_name'
                        },
                        {
                            data: 'stock',
                            name: 'stock',
                            render: function(data, type, row) {
                                return data + ' ' + row.unit;
                            }
                        },
                        {
                            data: 'price',
                            name: 'price',
                            render: function(data, type, row) {
                                return formatRupiahConvert(data);
                            }
                        },
                        {
                            data: 'cost_price',
                            name: 'cost_price',
                            render: function(data, type, row) {
                                return formatRupiahConvert(data);
                            }
                        },
                        {
                            data: 'barcode',
                            name: 'barcode'
                        },
                        {
                            data: 'updated_at',
                            name: 'updated_at',
                            render: function(data, type, row) {
                                return formatTanggal(data);
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
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
