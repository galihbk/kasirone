<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Business;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('Auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'business_name' => 'required|string|max:255',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'gender.required' => 'Pilih jenis kelamin.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'business_name.required' => 'Nama bisnis wajib diisi.',
        ]);


        $business = Business::create([
            'name' => $request->business_name,
        ]);
        $role = Role::create([
            'business_id' => $business->id,
            'rolename' => 'Super Admin',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'business_id' => $business->id,
            'role_id' => $role->id,
        ]);
        $menus = DB::table('menus')->pluck('id');
        $roleMenusData = [];
        foreach ($menus as $menuId) {
            $roleMenusData[] = [
                'role_id' => $role->id,
                'menu_id' => $menuId,
                'can_access' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('role_menu')->insert($roleMenusData);
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
