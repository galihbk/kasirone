<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Transaction;
use Midtrans\Transaction as MidtransTransaction;
use Midtrans\Snap;
use App\Models\User;
use Midtrans\CoreApi;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        $package = Package::findOrFail($request->package_id);

        $orderId = 'ORDER-' . uniqid(); // generate order id unik
        $user = Auth::user();

        // Simpan ke DB dulu
        $transaction = Transaction::create([
            'business_id' => $user->business_id,
            'package_id' => $package->id,
            'order_id' => $orderId,
            'amount' => $package->price,
            'status' => 'pending',
        ]);

        // Kirim ke Midtrans
        $params = [
            'payment_type' => 'bank_transfer', // contoh pakai bank transfer
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $package->price,
            ],
            'bank_transfer' => [
                'bank' => 'bca', // bisa mandiri, bni, bri
            ]
        ];

        $midtrans = CoreApi::charge($params);

        // Simpan kode pembayaran (virtual account) ke DB
        $transaction->update([
            'payment_type' => $midtrans->payment_type,
            'payment_code' => $midtrans->va_numbers[0]->va_number ?? null,
        ]);

        return view('payment.invoice', [
            'transaction' => $transaction,
            'midtrans' => $midtrans,
        ]);
    }
}
