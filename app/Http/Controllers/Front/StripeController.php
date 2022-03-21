<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Stripe\Stripe;
use Config;
use Session;
use App\Models\Order;

class StripeController extends Controller
{
    public function __construct()
    {
        
    }
    public function bookingProcess(Request $request) {
        $order = $request->session()->get('order');
        $order->save();
        $request->session()->forget('order');
        return redirect()->route('success.payment');
    //     $total_price = $request->total_price;
    //     $title = 'Room Booking';
    //     $stripe = Stripe::make(Config::get('services.stripe.secret'));
    //     try {

    //       $token = $stripe->tokens()->create([
    //           'card' => [
    //               'number' => $request["cardNumber"],
    //               'exp_month' => $request["month"],
    //               'exp_year' => $request["year"],
    //               'cvc' => $request["cardCVC"],
    //           ],
    //       ]);

    //       if (!isset($token['id'])) {
    //           return back()->with('error', 'Token Problem With Your Token.');
    //       }

    //       $charge = $stripe->charges()->create([
    //           'card' => $token['id'],
    //           'currency' =>  'EUR',
    //           'amount' => $total_price,
    //           'description' => $title,
    //       ]);
    //       $transaction_id = $charge['id'];
    //       if ($charge['status'] == 'succeeded') {
    //             $order = $request->session()->get('order');
    //             $request->session()->put('transaction_id', $transaction_id);
    //             $order->transaction_id = $transaction_id;
    //             $order->save();
    //             $request->session()->forget('order');
    //             return redirect()->route('success.payment');
    //       }
    //   } catch (Exception $e) {
    //       dd($e->getMessage());
    //       return redirect()->route('cancel.paypal')->with('error', $e->getMessage());
    //   } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
    //     dd($e->getMessage());
    //       return redirect()->route('cancel.paypal')->with('error', $e->getMessage());
    //   } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
    //     dd($e->getMessage());
    //       return redirect()->route('cancel.paypal')->with('error', $e->getMessage());
    //   }
    }
}
