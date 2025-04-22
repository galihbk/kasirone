<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageList;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction as MidtransTransaction;

class SubscriptionController extends Controller
{
    public function showPlans()
    {
        $plans = Package::with('packageLists')->get();
        return view('subscription.index', compact('plans'));
    }
    public function paymentMethod($plan)
    {
        $plan = Package::findOrFail($plan);
        $orderId = 'ORDER-' . uniqid();
        return view('subscription.invoice', compact('plan', 'orderId'));
    }
    public function createInvoice(Request $request)
    {
        $plan = Package::findOrFail($request->id_package);
        $amount = $plan->price + 2500;
        // Setup Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $orderId = $request->order_id;

        // Simpan transaksi ke database
        $transaction = Transaction::create([
            'business_id' => auth()->user()->business_id,
            'package_id' => $plan->id,
            'order_id' => $orderId,
            'amount' => $amount,
            'payment_type' => $request->bank, // simpan bank yang dipilih
            'status' => 'pending'
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        // Tentukan payment_type berdasarkan pilihan
        if ($request->bank == 'qris') {
            $params['payment_type'] = 'qris';
        } else {
            $params['payment_type'] = 'bank_transfer';
            $params['bank_transfer'] = [
                'bank' => strtolower($request->bank)
            ];
        }

        // Kirim ke Midtrans Core API
        $charge = MidtransTransaction::create($params);

        // Update kode pembayaran ke database
        $transaction->update([
            'payment_code' => $charge->va_numbers[0]->va_number ?? ($charge->actions[0]->url ?? null)
        ]);

        if ($request->bank == 'qris') {
            // Jika QRIS, arahkan ke halaman tampil QR
            return redirect()->route('payment.qris', ['order_id' => $orderId]);
        }

        // Jika VA, arahkan ke halaman tampil kode VA
        return redirect()->route('payment.va', ['order_id' => $orderId]);
    }
}
