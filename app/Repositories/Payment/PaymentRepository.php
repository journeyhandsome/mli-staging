<?php

namespace App\Repositories\Payment;

use Omnipay\Omnipay;
use App\Repositories\Payment\PaymentRepositoryInterface;

class PaymentRepository implements PaymentRepositoryInterface{

    private $gateway;
    private static $details;
    private $default = ['amount'=>0,'currency'=>'USD'];
    
    public function data(array $data){
        self::$details = $data;
        return true;
    }
    public function paypalGateWay(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(env('PAYPAL_TEST_MODE'));
        return  $this->gateway;
    }
    public function paypalPay(){
        $info = ['amount'=>$amount,'currency'=>$currency] = self::$details + $this->default;
        $info['returnUrl'] = url('api/success/paypalSuccess');
        $info['cancelUrl'] = url('api/cancel/paypalCancel');

        try {
            $response = $this->gateway->purchase($info)->send();
            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                $response->getMessage();
            }
        } catch (\Exception $e) {
            exit('Sorry, Something went wrong!');
        }
    }
    public function paypalSuccess($request){
         $gateway = $this->paypalGateWay();
        if($gateway){
            ['paymentId'=>$paymentId,'PayerID'=>$payerID] = $request->all();
            $transaction = $gateway->completePurchase([
                'payer_id' => $payerID,
                'transactionReference' => $paymentId,
            ]);
            $response = $transaction->send();
            if($response->isSuccessful()){
                ['id'=>$paymentId,
                 'state' => $status,
                 'payer'=>
                    ['payer_info'=> 
                            ['payer_id'=>$payerId,'email'=>$payerEmail]
                    ],
                  'transactions'=>['0'=>['amount'=>['total'=>$amount,'currency'=>$currency]]
                    ]
                ] = $response->getData();
                return ['success'=>true,'id'=>$paymentId];
            }else{
                return ['success'=>false,'id'=>null];
            }
        }
    }
    public function paypalCancel($request){
        return ['success'=>false,'id'=>$request->token];
    }
  }