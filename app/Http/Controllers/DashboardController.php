<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Paypal;
use App\Models\Subscription;
use App\Models\Address;
use Carbon\Carbon;
use Validator;
use Illuminate\Validation\Rule;
use Hash;

class DashboardController extends Controller
{

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware(['admin']);

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

	public function index()
	{
		 return $this->subscriptions();
		 //return view('admin.dashboard');
	}

	public function subscriptions()
	{
 	$params = array('count' => 20, 'start_index' => 1);
    $payments = Paypal::Payment()->all($params,$this->_apiContext);
    $payments = json_decode($payments);
    if($payments->count > 0){
    	$payments = $payments->payments;
    	foreach ($payments as $payment) {
    	$subscription = Subscription::where('payment_id','like',$payment->id)->first();
    	if($subscription != null){
    		$payment->address = Address::find($subscription->address_id);
    	}
    }
    }else{
    	$payments = null;
    }

		return view('admin.subscriptions',compact('payments'));
	}
 

     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Http\Response
      */
     public function myAccount()
     {
     	$user= auth()->guard('admin')->user();
     	if($user == null){return;}
        return view('admin.my-account',compact('user'));
     }


     /**
      * Show the application dashboard.
      *
      * @return \Illuminate\Http\Response
      */
     public function updateAccount(Request $request)
     {
 		$this->middleware('auth');
     	if(!auth()->guard('admin')->user()){return;}

     	$validator = Validator::make($request->all(), [
     	    'name' => 'required|max:255',
     	    'username' => ['required','max:255',Rule::unique('admins')->ignore($request->user('admin')->id)],
     	    'email' => ['required','email','max:255',Rule::unique('admins')->ignore($request->user('admin')->id)],
     	    'current_password' => 'required|max:255',
     	    'new_password' => 'required|min:6|confirmed',
     	]);

     	$validator->after(function($validator) use($request){
     	    if (!Hash::check($request->current_password, $request->user('admin')->password)) {
     	        $validator->errors()->add('current_password', 'Current password is invalid.');
     	    }
     	});
     	
    		$validator->validate();
    		$user = auth()->guard('admin')->user();
    		$user->name= $request->name;
    		$user->username= $request->username;
    		$user->email= $request->email;
    		$user->password= Hash::make($request->new_password);
    		$user->save();
    		return view('admin.my-account',compact('user'));
     }

}
