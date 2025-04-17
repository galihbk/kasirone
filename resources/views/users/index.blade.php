<x-app-layout>
    @section('title', 'Pengguna')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">List Pengguna</a></li>
            </ol>
        </div>
        <div class="mb-4">
            <a href="{{route('users.form-add')}}" class="btn btn-primary">Tambah Pengguna</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Email</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nomor Telfon</th>
                                    <th>Bagian</th>
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
    @section('script')
    <script>
        $(document).ready(function () {
            $('#user-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route("users.data") }}',
                columns: [
                    { data: 'photo', name: 'photo', orderable: false, searchable: false }, // Kolom kosong: foto
                    { data: 'email', name: 'email' },
                    { data: 'name', name: 'name' },
                    { data: 'gender', name: 'gender' },
                    { data: 'phone', name: 'phone' },
                    { data: 'role', name: 'role' }, // "Bagian"
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

        });
    </script>
@endsection
</x-app-layout>
