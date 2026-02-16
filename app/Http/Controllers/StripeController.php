<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\PayFees;

class StripeController extends Controller
{
    public function pay($id)
    {
        $fee = PayFees::findOrFail($id);
        return view('studentadmin.pay_fees_online', compact('fee'));
    }

    public function checkout(Request $request)
    {
        $fee = PayFees::findOrFail($request->fee_id);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'inr',
                    'product_data' => [
                        'name' => 'School Fees Payment',
                    ],
                    'unit_amount' => $fee->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('fees.success') . '?fee_id=' . $fee->id,
            'cancel_url' => route('fees.cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $fee = PayFees::find($request->fee_id);

        if ($fee) {
            $fee->update([
                'status' => 'paid',
                'mode' => 'Online',
            ]);
        }

        return view('studentadmin.payment_success');
    }

    public function cancel()
    {
        return view('studentadmin.payment_cancel');
    }
}
