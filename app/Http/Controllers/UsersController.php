<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        return view('users.index');
    }
    public function formAddUser()
    {
        return view('users.form-add');
    }
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'email', 'gender', 'phone', 'role', 'photo', 'created_at', 'updated_at']);

            return DataTables::of($users)
                ->addColumn('photo', function ($user) {
                    $url = $user->photo
                        ? asset('storage/photos/' . $user->photo)
                        : asset('assets-admin/images/profile/small/pic1.jpg');
                    return '<img src="' . $url . '" class="rounded-circle" width="35" />';
                })
                ->addColumn('action', function ($user) {
                    return '
                    <div class="d-flex">
                        <a href="' . route('users.edit', $user->id) . '" class="btn btn-primary shadow btn-xs sharp me-1">
                            <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="' . route('users.destroy', $user->id) . '" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm(\'Hapus user ini?\')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>';
                })
                ->rawColumns(['photo', 'action']) // agar HTML tidak di-escape
                ->make(true);
        }
    }
}
