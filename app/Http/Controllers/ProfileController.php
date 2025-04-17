<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\KodeVerifikasiMail;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', compact('user'));
    }
    public function emailVerificationLink()
    {
        $user = Auth::user();

        $verificationToken = Str::random(60);
        $verificationTokenExpiry = Carbon::now()->addHour();
        $user->verification_token = $verificationToken;
        $user->verification_token_expiry = $verificationTokenExpiry;
        $user->save();
        $user->sendEmailVerificationNotification();
        return response()->json([
            'message' => 'Link verifikasi telah dikirim ke email Anda.'
        ]);
    }
}
