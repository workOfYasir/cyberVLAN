<?php
 

 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use Srmklive\PayPal\Tests\Mocks\Requests\PartnerReferrals;
// use Srmklive\PayPal\Tests\Unit\Client\OrdersTest;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
// use Srmklive\PayPal\Tests\Mocks\Requests\PartnerReferrals;


class PayPalPaymentController extends Controller

{

/**
     * create transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTransaction()
    {
        return view('transaction');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request,$amount)
    {
        
        $provider = new PayPalClient;
        // dd()
        // $provider = new OrdersTest;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
     
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ],
                    "payee"=> [
                        "email_address"=> "sb-utkpu11792834@personal.example.com"
                      ],
                      
                ]
                
            ],
            

        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
            
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('successTransaction');
                // ->with('error', 'Something went wrong.');

        } 
        // else {
        //     return redirect()
        //         ->route('createTransaction')
        //         ->with('error', $response['message'] ?? 'Something went wrong.');
        // }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('/')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}