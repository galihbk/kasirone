<x-app-layout>
    @section('title', 'Peran dan Hak Akses')
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengaturan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)"></a>Peran dan Hak Akses</li>
            </ol>
        </div>
        <div class="mb-4">
            <a href="{{route('users.form-add')}}" class="btn btn-primary">Tambah Peran</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Peran dan Hak Akses Menu</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive recentOrderTable">
                        <table class="table verticle-middle table-responsive-md">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Peran</th>
                                    <th scope="col" class="text-center">Hak Akses Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                @php
                                $roleMenuIds = \DB::table('role_menu')
                                ->where('role_id', $role->id)
                                ->pluck('menu_id')
                                ->toArray();
                                @endphp
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="row">
                                            @foreach ($menus as $menu)
                                            <div class="col-xl-3 col-xxl-3 col-3">
                                                <div class="form-check custom-checkbox mb-3">
                                                    <input type="checkbox"
                                                        class="form-check-input"
                                                        id="customCheckBox_{{ $role->id }}_{{ $menu->id }}"
                                                        {{ in_array($menu->id, $roleMenuIds) ? 'checked' : '' }}>
                                                    <label class="form-check-label"
                                                        for="customCheckBox_{{ $role->id }}_{{ $menu->id }}">
                                                        {{ $menu->menu_name }}
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script>
        $(document).ready(function() {});
    </script>
    @endsection
</x-app-layout>