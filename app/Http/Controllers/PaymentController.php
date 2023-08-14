<?php

namespace App\Http\Controllers;

use App\Payment\Cashier;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function pay(Request $request){

        $address = $request->address;

        $info = [
            "sellerId" => env('2CHECKOUT_SELLER_ID'),
            "merchantOrderId" => rand(1000,100000),
            "token" => $request->token,
            "currency" => 'USD',
            "total" => '15.00',
            'billingAddr' => $address,
            'shippingAddr' => $address
        ];

        $res = Cashier::pay($info);

        if(!$res['success']){
            // return response(['message'=>'Unable to pay, please try again'],400);
            return response(['message'=>$res['message']],400);
        }

        return ['message'=>'Paid Successfully'];

    }

    // https://github.com/2Checkout/2checkout-php
    // https://verifone.cloud/docs/2checkout/API-Integration/Transition_guides/Transition_Guide_for_2CO_Sandbox
    // https://verifone.cloud/docs/2checkout/Documentation/09Test_ordering_system/01Test_payment_methods
    // https://verifone.cloud/docs/2checkout/API-Integration/2Pay.js-payments-solution/2Pay.js-Payments-Solution-Integration-Guide/Basic-Implementation-for-2Pay.js-Payments-Solution#2pay__002ejs-__002d-payments-solution-integration-guide
}
