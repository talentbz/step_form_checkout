<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Mail;

class OrderController extends Controller
{
    public function index(Request $request){
        $order = Order::get();
        return view('admin.pages.order.index', [
            'order' => $order,
        ]);
    }
    public function detail(Request $request, $id){
        $order = Order::where('id', $id)->first();
        return view('admin.pages.order.detail', [
            'order' => $order,
        ]);
    }
    public function update(Request $request){
        $id = $request->id;
        $payment_status = $request->payment_status;
        $order = Order::where('id', $id)->first();
        $email = $order->email;
        //Mail sending function
        Order::where('id', $id)->update(['payment_status' => $payment_status]);
        if($payment_status != 'Refunded') {
            Mail::send('mail', array(
                'subject' => $payment_status,
                'order' => $order,
            ), function($message) use ($email, $payment_status){
                $message->from('inquiry@sakuramotors.com');
                $message->to($email, $payment_status)
                        ->subject($payment_status);
            });
        }
        return redirect()->route('admin.order');
    }

}
