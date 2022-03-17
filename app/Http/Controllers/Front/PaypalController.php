<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Order;
//paypal package
use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    public function __construct()
    {
        $paypal_conf['settings']['mode'] = env('PAYPAL_MODE');
        $this->api_context = new ApiContext(
            new OAuthTokenCredential(
                env('PAYPAL_SANDBOX_CLIENT_ID'),
                env('PAYPAL_SANDBOX_CLIENT_SECRET'),
                // env('PAYPAL_LIVE_CLIENT_ID'),
                // env('PAYPAL_LIVE_CLIENT_SECRET')
            )
        );
        $this->api_context->setConfig($paypal_conf['settings']);
    }
    public function bookingProcess(Request $request){
        $total = $request->total_price;
        $title ="test pay";

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        
        $item_1 = new Item();
        $item_1->setName($title)
            /** item name **/
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($total);
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($total);
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($title . ' Via PayPal');
        $redirect_urls = new RedirectUrls();
        $notify_url = route('notify.paypal');
        $cancel_url = route('cancel.paypal');
        $redirect_urls->setReturnUrl($notify_url)
                    /** Specify return URL **/
                    ->setCancelUrl($cancel_url);
        $payment = new Payment();
        $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));
        
        try {
            $payment->create($this->api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
            $redirect_url = $link->getHref();
            break;
            }
        }

        // put some data in session before redirect to paypal url
        $request->session()->put('bookingId', 123);   // db row number
        $request->session()->put('paymentId', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        // return redirect()->route('front.checkout_4');
    }

    public function paymentNotify(Request $request){
        // get the information from session
        $bookingId = $request->session()->get('bookingId');
        $paymentId = $request->session()->get('paymentId');

        // get the information from the url
        $urlInfo = $request->all();

        if (empty($urlInfo['token']) || empty($urlInfo['PayerID'])) {
            return redirect()->route('cancel.payment');
        }

        /** Execute The Payment **/
        $payment = Payment::get($paymentId, $this->api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($urlInfo['PayerID']);
        $result = $payment->execute($execution, $this->api_context);
        
        /** get paypal transaction id**/ 
        $transactions = $payment->getTransactions();
        $relatedResources = $transactions[0]->getRelatedResources();
        $sale = $relatedResources[0]->getSale();
        $transaction_id = $sale->getId();
        
        if ($result->getState() == 'approved') {
            // remove all session data
            $order = new Order();
            $order = $request->session()->get('order');
            $order->transaction_id = $transaction_id;
            $order->save();
            $request->session()->forget('order');
            $request->session()->forget('bookingId');
            $request->session()->forget('paymentId');
            return redirect()->route('success.payment');
        } 
        else {
            return redirect()->route('cancel.payment');
        }
    }
    public function paymentCancel()
    {
        dd('cancel');
        // return view('events.registration');
    }
  
    public function paymentSuccess(Request $request)
    {
        $order_id = Order::latest()->first()->order_id;
        return view('front.pages.checkout.complete', [
            'order_id' => $order_id,
        ]);
    }
}
