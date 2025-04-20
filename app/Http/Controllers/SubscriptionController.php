<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageList;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class SubscriptionController extends Controller
{
    public function showPlans()
    {
        $plans = Package::with('packageLists')->get();
        return view('subscription.invoice', compact('plans'));
    }

    public function createInvoice(Request $request)
    {
        $plan = Package::findOrFail($request->plan_id);

        // Midtrans Setup
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = 'ORDER-' . uniqid();

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'business_id' => auth()->user()->business_id,
            'plan_id' => $plan->id,
            'order_id' => $orderId,
            'gross_amount' => $plan->price,
            'transaction_status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $plan->price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        $snapUrl = Snap::createTransaction($params)->redirect_url;

        return redirect($snapUrl);
    }
}
