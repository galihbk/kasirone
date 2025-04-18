<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Menu;
use App\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RolesController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $roles = Role::where('business_id', Auth::user()->business_id)
            ->where('id', '!=', Auth::user()->role_id)
            ->get();
        $menus = Menu::orderBy('order', 'asc')
            ->get();
        return view('roles.index', compact('roles', 'menus'));
    }
}
