<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\PostProposal;
use Illuminate\Http\Request;
use App\Models\PaymentReciever;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
    public function custome(Request $request)
    {
        
        $userProject = PostProposal::where('status',2)->where('candidate_id',$request->reciever)->exists();
        if($userProject){
            // dd('ok');
            // $this->adminPayment($input);
            $email = $request->email;
            $price = $request->price;
            $admin = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'superAdmin');
                }
            )->first();

            // $admin_id = "90112323-admin-4302-e091-8f4484e8ae1";
            
            //freelancer
            //sb-utkpu11792834@personal.example.com
            
            //admin
            //sb-sfzid13867679@personal.example.com
            
            $createPacket = array(
                "actionType" => "PAY", // Payment action type
                "currencyCode" => "USD", // Payment currency code
                "receiverList" => array(
                    "receiver" => array(
                        
                        array(
                            "amount" => $price, // Payment amount
                            "email" => "sb-sfzid13867679@personal.example.com", // Receiver's email address
                        ),

                    ),
                ),
                "returnUrl" => url("/"), // Redirect URL after approval
                "cancelUrl" => url("/"), // Redirect URL after cancellation
                "requestEnvelope" => array(
                    "errorLanguage" => "en_US", // Language used to display errors
                    "detailLevel" => "ReturnAll", // Error detail level
                ),
            );
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://svcs.sandbox.paypal.com/AdaptivePayments/Pay');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($createPacket));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "X-PAYPAL-SECURITY-USERID:" . "sb-uao7v11792840_api1.business.example.com",
                "X-PAYPAL-SECURITY-PASSWORD:" . "97AFAA3NYK22K28C",
                "X-PAYPAL-SECURITY-SIGNATURE:" . "AxswcbAjpw4qdJ4CZwAP61r7-dvBAJc9Hk-1FC9kjCC-jvA0S.EJK5O4",
                "X-PAYPAL-APPLICATION-ID: APP-80W284485P519543T", //USE THIS Global SANDBOX APP ID 
                "X-PAYPAL-REQUEST-DATA-FORMAT: JSON",
                "X-PAYPAL-RESPONSE-DATA-FORMAT: JSON",
            ]);
        
            $response = json_decode(curl_exec($ch), true);
            $payment =new Payment;
        
             $payment->payment_method='paypal';
             $payment->payment_type='2';
             $payment->post_id=$request->post_id;
             $payment->paid=$request->price;
             $payment->sender_unni_id=$request->sender;
       
            $payment->save();

            
            $paymentRecieced = new PaymentReciever;
            $paymentRecieced->payment_id=$payment->id;
            $paymentRecieced->unni_id=$admin->unni_id;
            $paymentRecieced->save();
            return redirect("https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey=".$response['payKey']);

        }else{
       
            // $this->adminAndUserPayment($input);
            $email = $request->email;
            $price = $request->price;
            $admin = User::whereHas(
                'roles', function($q){
                    $q->where('name', 'superAdmin');
                }
            )->first();

            $reciever_ids = [$admin->unni_id,$request->reciever];
        
            //freelancer
            //sb-utkpu11792834@personal.example.com
            
            //admin
            //sb-sfzid13867679@personal.example.com
            
            $freelancerPercent = 80;
            $freelancerDecimal = $freelancerPercent / 100;
            $freelancerFee = $freelancerDecimal * $price;
    
            $adminPercent = 20;
            $adminDecimal = $adminPercent / 100;
            $adminFee = $adminDecimal * $price;
            $createPacket = array(
                "actionType" => "PAY", // Payment action type
                "currencyCode" => "USD", // Payment currency code
                "receiverList" => array(
                    "receiver" => array(
                        array(
                            "amount" => $freelancerFee, // Payment amount
                            "email" => "sb-utkpu11792834@personal.example.com", // Receiver's email address
                        ),
                        array(
                            "amount" => $adminFee, // Payment amount
                            "email" => $email, // Receiver's email address
                        ),
    
                    ),
                ),
                "returnUrl" => url("/"), // Redirect URL after approval
                "cancelUrl" => url("/"), // Redirect URL after cancellation
                "requestEnvelope" => array(
                    "errorLanguage" => "en_US", // Language used to display errors
                    "detailLevel" => "ReturnAll", // Error detail level
                ),
            );
        
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://svcs.sandbox.paypal.com/AdaptivePayments/Pay');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($createPacket));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "X-PAYPAL-SECURITY-USERID:" . "sb-uao7v11792840_api1.business.example.com",
                "X-PAYPAL-SECURITY-PASSWORD:" . "97AFAA3NYK22K28C",
                "X-PAYPAL-SECURITY-SIGNATURE:" . "AxswcbAjpw4qdJ4CZwAP61r7-dvBAJc9Hk-1FC9kjCC-jvA0S.EJK5O4",
                "X-PAYPAL-APPLICATION-ID: APP-80W284485P519543T", //USE THIS Global SANDBOX APP ID 
                "X-PAYPAL-REQUEST-DATA-FORMAT: JSON",
                "X-PAYPAL-RESPONSE-DATA-FORMAT: JSON",
            ]);
        
            $response = json_decode(curl_exec($ch), true);
            $payment =new Payment;
        
            $payment->payment_method='paypal';
            $payment->payment_type='2';
            $payment->post_id=$request->post_id;
            $payment->paid=$request->price;
            $payment->sender_unni_id=$request->sender;
      
           $payment->save();
        
           foreach($reciever_ids as $reciever_id){
           
            $paymentRecieced = new PaymentReciever;     
            $paymentRecieced->payment_id=$payment->id;
            $paymentRecieced->unni_id=$reciever_id;
            $paymentRecieced->save();
            
           }
        //    dd($response);
          
            return redirect("https://www.sandbox.paypal.com/cgi-bin/webscr?cmd=_ap-payment&paykey=".$response['payKey']);
        
        }
    }
 public function newCustomers()
 {
    $payment = Payment::where('payment_type',2)->with('payment')->with('post')->with('user')->get();
    dd($payment);
  
    return view('backend.pages.transections',compact('payment'));
 }
 
   
}
