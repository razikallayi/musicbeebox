<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use App\Models\Address;
use Paypal;
use Redirect;
use App\Models\Order;
use App\Models\Subscription;
use App\Models\Plan;
use App\Models\Transaction;
use Carbon\Carbon;

class SubscriptionController extends Controller
{

   /**
     * Create a new controller instance.
     *
     * @return void
     */
	   public function __construct()
	   {

	   	$this->middleware(['auth','admin.guest']);

        $this->_apiContext = PayPal::ApiContext(
                config('services.paypal.client_id'),
                config('services.paypal.secret'));
        $this->_apiContext->setConfig(array(
                'mode' =>  config('services.paypal.mode'),
                'service.EndPoint' =>  config('services.paypal.endpoint'),
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path('logs/paypal.log'),
                'log.LogLevel' => 'FINE'
                ));

	   }


     /**
     * Show the user subscription form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptionForm()
    {
        if(auth()->user()->is_payed){
            return redirect('user/dashboard');
        }
        return view('auth.subscribe');
    }


     /**
     * Show the user subscription form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSubscriptions()
    {
        // $payment_id = auth()->user()->orders()->first()->payment_id;

        // $payment=  PayPal::Payment();

        // $subscriptions = $payment->get($payment_id, $this->_apiContext);

        //$shippingAddress = $subscriptions->payer->payer_info->shipping_address;
        // $phone = $subscriptions->payer->payer_info->phone;
        // $itemlist = $subscriptions->transactions[0]->item_list->items;
        // $amount = $subscriptions->transactions[0]->amount;
        // $id= $subscriptions->id;
        // $mySubscription = Subscription::where('payment_id',$payment_id)
        //                         ->where('is_success',true)
        //                         ->first();
        // $address =null;
        // if($mySubscription != null){
        //     $address = Address::find($mySubscription->address_id);
        // }
        // 
        // 
        // return view('user.subscriptions',compact('address','phone','id','itemlist','amount'));
        // 
        // 
        $orders = auth()->user()->orders();
        $payment=  PayPal::Payment();
        $subscriptions = [];
        foreach ($orders as $order) {
            $subscription = $payment->get($order->payment_id, $this->_apiContext);

            $mySubscription = Subscription::where('payment_id',$order->payment_id)
                            ->where('is_success',true)
                            ->first();
            $address =null;
            if($mySubscription != null){
                $address = Address::find($mySubscription->address_id);
            }
            $subscriptions[] = ['payment'=> $subscription,
                                'address'=> $address
                                ];
        }

        // $phone = $subscriptions->payer->payer_info->phone;
        // $itemlist = $subscriptions->transactions[0]->item_list->items;
        // $amount = $subscriptions->transactions[0]->amount;
        // $id= $subscriptions->id;
        // $mySubscription = Subscription::where('payment_id',$payment_id)
        //                         ->where('is_success',true)
        //                         ->first();
        // $address =null;
        // if($mySubscription != null){
        //     $address = Address::find($mySubscription->address_id);
        // }
        // dd($subscriptions);
        return view('user.subscriptions',compact('subscriptions'));
        // return view('user.subscriptions');
    }

     /**
     * subscribe the user.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
                     'name'=> '',
                     'house_no'=> 'required_with:new_shipping_address',
                     'street'=> 'required_with:new_shipping_address',
                     'address'=> 'required_with:new_shipping_address',
                     'city'=> 'required_with:new_shipping_address',
                     'postcode'=> 'required_with:new_shipping_address',
                     'months'=> 'required',
                     'terms'=> 'required',
                     ])->validate();

        $user = auth()->user();
        $address = $user->getShippingAddress();
        $isGift = false;
        if($request->new_shipping_address){
            $isGift = true;
            $address = Address::create([
                       'user_id'  => $user->id,
                       'name' => isset($request->name)?$request->name:$user->name,
                       'house_no' => $request->house_no,
                       'street' => $request->street,
                       'address' => $request->address,
                       'city' => $request->city,
                       'postcode' => $request->postcode,
                       'is_primary' => false,
                       'is_billing' => false,
                       'is_shipping' => true,
                       'is_active' => false,
                       ]);
        }
        $plans = Plan::whereIn('length',$request->months)->get();
        if($plans == null){
            $validator->getMessageBag()->add('months', 'Please check a subscription plan');
            return back();
        }
        $allFailedSubs = $user->subscriptions()->where('is_success',false);
        foreach($allFailedSubs as $failed){
            $failed->delete();
        }

        return $this->getCheckout($plans,$address,$isGift);
    }

       public function getCheckout($plans,$address,$isGift)
       {
        $payer = PayPal::Payer();
        $payer->setPaymentMethod('paypal');
        
        $payerInfo = PayPal::PayerInfo();

        $user = auth()->user();
        $items = [];
        foreach ($plans as $plan) {
            // ### Itemized information
            // (Optional) Lets you specify item wise
            // information
            $item = PayPal::Item();
            $item->setName($plan->name)
            ->setDescription($plan->length." months subscription plan")
            ->setCurrency('GBP')
            ->setQuantity(1)
            ->setPrice($plan->price * $plan->length);

            $items[] = $item;


            $subscription = new Subscription();
            $subscription->user_id = $user->id;
            $subscription->plan_id = $plan->id;
            $subscription->address_id = $address->id;
            $now = Carbon::now();
            $subscription->start_date = $now;
            $subscription->end_date = $now->addMonths($plan->length);
            $subscription->is_success = false;
            $subscription->is_gift = $isGift;
            $subscription->save();
        }


        $totalAmount= $plans->sum(function($item){
            return $item->price * $item->length;
        });


        $itemList = PayPal::ItemList();
        $itemList->setItems($items);

// ### Additional payment details
// Use this optional field to set additional
// payment information such as tax, shipping
// charges etc.
        $details = PayPal::Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal(0);



        $amount = PayPal:: Amount();
        $amount->setCurrency('GBP');
        $amount->setTotal($totalAmount);

        $transaction = PayPal::Transaction();
        $transaction->setAmount($amount);
        $transaction->setItemList($itemList);
        $transaction->setDescription('Music bees box Subscription');

        $redirectUrls = PayPal:: RedirectUrls();
        $redirectUrls->setReturnUrl(url('paypal/done'));
        $redirectUrls->setCancelUrl(url('paypal/cancel'));

        $payment = PayPal::Payment();
        $payment->setIntent('sale');
        $payment->setPayer($payer);
        $payment->setRedirectUrls($redirectUrls);
        $payment->setTransactions(array($transaction));

        $response = $payment->create($this->_apiContext);
        $redirectUrl = $response->links[1]->href;

        return Redirect::to( $redirectUrl );
      }

      public function getDone(Request $request)
      {
        $id = $request->get('paymentId');
        $token = $request->get('token');
        $payer_id = $request->get('PayerID');
        $payment = PayPal::getById($id, $this->_apiContext);

        $paymentExecution = PayPal::PaymentExecution();

        $paymentExecution->setPayerId($payer_id);
        $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

        $user = auth()->user();

        $txn = new Transaction();
        $txn->details = $executePayment;
        $txn->user_id = $user->id;
        $txn->save();

        $order = new Order();
        $order->user_id = $user->id;
        $order->shipping_address_id = $user->getShippingAddress()->id;
        $order->billing_address_id = $user->getBillingAddress()->id;

        $data = json_decode($executePayment);
        $order->payment_id = $data->id;
        $payerData = $data->payer->payer_info;
        $order->payer_id = $payerData->payer_id;
        $order->save();

        $subscription = $user->subscriptions()->where('is_success','=',false)->last();
        if($subscription!=null) {
            $subscription->is_success = true;
            $subscription->payment_id = $data->id;
            $subscription->order_id = $order->id;
            $subscription->save();
            $address = $subscription->address;
            if($address != null){
                $address->is_active = true;
                $address->save();
            }
        }

        $user->is_payed = true;
        $user->save();

        // Clear the shopping cart, write to database, send notifications, etc.

        // Thank the user for the purchase
        return redirect('user/dashboard');
      }

      public function getCancel()
      {
        // Curse and humiliate the user for cancelling this most sacred payment (yours)
        return 'Your Transaction is cancelled. Go back to <a href="'.url('/subscribe').'"> Music bee box</a>';
        // return view('checkout.cancel');
      }
}
