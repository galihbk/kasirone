<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    public function index()
    {

        return view('cashier.index');
    }
}
