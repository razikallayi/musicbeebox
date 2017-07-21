<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaypalController extends Controller
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
                'mode' => 'sandbox',
                'service.EndPoint' => 'https://api.sandbox.paypal.com',
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path('logs/paypal.log'),
                'log.LogLevel' => 'FINE'
                ));

	   }
}
