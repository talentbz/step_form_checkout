<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Front\PaypalController;
use App\Http\Controllers\Front\StripeController;
use App\Http\Controllers\Front\SofortController;


class checkOutController extends Controller
{
    public function __construct()
    {
        $this->duration = config('config.duration');
        $this->length = config('config.length');
        $this->price = config('config.price');
    }
    public function checkout_1(Request $request){
        $order = $request->session()->get('order');
        return view('front.pages.checkout.step1', [
            'order' => $order,
            'duration' => $this->duration,
            'length' => $this->length,
            'price' =>$this->price, 
        ]);
    }
    public function checkout_post_1(Request $request){
        $validatedData = $request->validate([
            'date' => 'required',
            'duration' => 'required|numeric',
            'length' => 'required|numeric',
        ]);
  
        if(empty($request->session()->get('order'))){
            $order = new Order();
            $order->fill($validatedData);
            $request->session()->put('order', $order);
        }else{
            $order = $request->session()->get('order');
            $order->fill($validatedData);
            $request->session()->put('order', $order);
        }
        return redirect()->route('front.checkout_2');
    }

    public function checkout_2(Request $request){
        $order = $request->session()->get('order');
        $duration_desc = $order->duration;
        $length_desc = $order->length;
        foreach($this->duration as $row){
            if($duration_desc == $row['price']) {
                $duration_desc = $row['date'];
            }
        }
        foreach($this->length as $row){
            if($length_desc == $row['price']) {
                $length_desc = $row['unit'];
            }
        }
        return view('front.pages.checkout.step2', [
            'order' => $order,
            'duration_desc' => $duration_desc,
            'length_desc' => $length_desc,
            'price' =>$this->price,
        ]);
    }
    public function checkout_post_2(Request $request){
        $validatedData = $request->validate([
            'street' => 'required',
            'number' => 'required',
            'zip_code' => 'required',
            'same_address' => '',
            'same_parking' => '',
            'save_info' => '',
        ]);
       
        $order = $request->session()->get('order');
        $order->fill($validatedData);
        $request->session()->put('order', $order);
        return redirect()->route('front.checkout_3');
    }
    public function checkout_3(Request $request){
        $order = $request->session()->get('order');
        $duration_desc = $order->duration;
        $length_desc = $order->length;
        foreach($this->duration as $row){
            if($duration_desc == $row['price']) {
                $duration_desc = $row['date'];
            }
        }
        foreach($this->length as $row){
            if($length_desc == $row['price']) {
                $length_desc = $row['unit'];
            }
        }
        return view('front.pages.checkout.step3', [
            'order' => $order,
            'duration_desc' => $duration_desc,
            'length_desc' => $length_desc,
            'price' =>$this->price,
        ]);
    }
    public function checkout_post_3(Request $request){
        $validatedData = $request->validate([
            'company' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'total_price' => 'required',
            'phone' => '',
            'payment' => '',
            'order_id' => 'required',
        ]);
        $order = $request->session()->get('order');
        $order->fill($validatedData);
        $request->session()->put('order', $order);
        if($order->payment == 'PayPal'){
            $paypal = new PayPalController();
            return $paypal->bookingProcess($request);
        } elseif($order->payment == 'Credit Card (Stripe)') {
            $stripe = new StripeController();
            return $stripe->bookingProcess($request);
        } else {
            $sofort = new SofortController();
            return $sofort->bookingProcess($request);
        }
    }
}
