<?php

namespace App\Http\Controllers;

use App\Models\LTwentyForm;
use App\Models\AddPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Repositories\Payment\PaymentRepositoryInterface;

class PaymentController extends Controller
{
    protected $payment;
    public function __construct(PaymentRepositoryInterface $payment) {
        $this->payment = $payment;
    }

    public function data(Request $request){
        $query = $this->payment->data($request->all());
        if($query){
            $gateway = $this->payment->paypalGateWay();
            if($gateway){
                $this->payment->paypalPay();
            }
        }
        
    }
    public function success(Request $request,$func=null){
        $response = $this->payment->{$func}($request);
        if($response['success']){
            return redirect()->away(env('APP_WEB_URL').'/paypal');
        }
    }
    public function cancel(Request $request,$func=null){
        $response = $this->payment->{$func}($request);
        if(!$response['success']){
            return redirect()->away(env('FRONTEND_URL').'/paypal');
        }
    }

    public function test(){
        $f= LTwentyForm::where('id', 1)
                    ->first();
        $filtered = [];
        collect($f)->map(function($each,$index) use (&$filtered){
            $except = ["id","stripe_key","is_sent","created_at","updated_at"];
            if(!in_array($index,$except)){
                if($index == "fee_currency") $index = "currency";
                $key = preg_split('/(?=[A-Z])/',$index);
                $keyFiltered = array_map(function($each){
                    $snake = explode('_',$each);
                    if(sizeof($snake) > 1){
                       return implode(' ',array_map(function($each){
                            return ucfirst($each);
                        },$snake));
                    }
                    return ucfirst($each);
                },$key);
                $value = ucwords(str_replace('_',' ',$each));
               array_push($filtered,['label'=>implode(' ',$keyFiltered),'value'=>$value]);
            }
        }); 
    
        $str = "";
        array_map(function($each) use(&$str){
            ["label"=>$label,"value"=>$value] = $each;
            $str .= "<tr>";
            $str .="<td style='line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8'>$label</td>";
            $str .="<td style='line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8'>$value</td>";
            $str .="</tr>";
        },$filtered);
      dump($filtered);
    }
    
    private function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function store(Request $request)
    {
        $allRequest = $request->all();
        $allRequest['stripe_key'] = $this->generateRandomString();
        $percent = $allRequest['percent'];
        $details = $allRequest['payment_details'] == 'Others' ? $allRequest['payment_others'] : $allRequest['payment_details'];

        $add_payment = AddPayment::create($allRequest)->toArray();
        $language = $request->has('language') ? $request->language : 'en';
        $redirect_url = env('APP_WEB_URL');

        if(isset($add_payment['id'])) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Mentor Language Institue',
                    'description' => $details
                ],
                'unit_amount' => $percent * 100
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $redirect_url . '/payment/thanks?id=' . $add_payment['id'] .'&value='. $add_payment['stripe_key'],
            'cancel_url' => $redirect_url . '/admission/fail?id=' . $add_payment['id'] .'&value='. $add_payment['stripe_key'],
            ]);

            return response()->json(['Location' => $session->url]);
        }

        dd('Wrong stripe information.');
    }
    public function sendEmail($id, $key)
    {
        $online = AddPayment::where('id', $id)
                    ->where('stripe_key', $key)
                    ->where('is_sent', false)
                    ->first();
        
        if (AddPayment::where('id', $id)
            ->where('campus', 'Westwood Campus')->exists()) {
                Mail::send('emails.addPayment', ["data" => $online], function($message) use ($online)
                {               
                    $to_name = env('APP_NAME');
                    $to_email = "info@mliesl.edu";                                                                                
                    $subject = 'Added Payment';
                    $bcc_email = 'jeneline59@gmail.com';
    
                    // $message->to($to_email, $to_name)->subject($subject);
                    $message->to($to_email, $to_name)->bcc($bcc_email)->subject($subject);
                });
            }
        if (AddPayment::where('id', $id)
            ->where('campus', 'Hollywood Campus')->exists()) {
                Mail::send('emails.addPayment', ["data" => $online], function($message) use ($online)
                {               
                    $to_name = env('APP_NAME');
                    $to_email = "hollywood@mliesl.edu";                                 
                    $subject = 'Added Payment';
                    $bcc_email = 'jeneline59@gmail.com';
    
                    // $message->to($to_email, $to_name)->subject($subject);
                    $message->to($to_email, $to_name)->bcc($bcc_email)->subject($subject);
                    
                });
            }
    }

}
