<x-app-layout>
    @section('title', 'Pengguna')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Pengguna</a></li>
            </ol>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengguna</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" placeholder="Masukan nama lengkap">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control" placeholder="081xxxxxxxx">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Nomor Telepon</label>
                            <select type="text" class="form-control" placeholder="081xxxxxxxx">
                                <option value="">--pilih--</option>
                                <option value="kasir">Kasir</option>
                                <option value="manager">manager</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label>City</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
