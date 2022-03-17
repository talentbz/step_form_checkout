<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe;
use Config;
use App\Models\Order;

class SofortController extends Controller
{
    public function bookingProcess(Request $request) {
        $total_price = $request->total_price * 100;
        $desc = 'sofort test';
        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        $stripe->paymentIntents->create([
                'amount' => $total_price, 
                'currency' => 'eur', 
                'description' => $desc,
                'payment_method_types' => ['sofort'],
        ]);
        dd($stripe);
        $order = new Order();
        $order = $request->session()->get('order');
        $order->save();
        $request->session()->forget('order');
        return redirect()->route('success.payment');
    }
}
