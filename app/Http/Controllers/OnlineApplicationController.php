<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\LTwentyForm;
use Illuminate\Http\Request;
use App\Models\OnlineApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OnlineApplicationController extends Controller
{   
    public static $uploadLists = ["passport","financial","visa","i94","transfer_form"];
    public function l20(Request $request){
        $entries = json_decode($request->entries);
        unset($entries->groups);
        $payment = $request->payment;
        $uploads = collect(self::$uploadLists);
        $uploads->map(function($key) use(&$entries){
            $docs = [];
            if(sizeof($entries->{$key}) > 0){
                array_map(function($each) use(&$docs){
                   array_push($docs,$this->base64($each->src,$each->name));
                },$entries->{$key});
            }
            $entries->{$key} = json_encode($docs);
        }); 
       
        $entries->stripe_key = $this->generateRandomString();
        $entries->fee = number_format($entries->fee,2);
        $savedData = LTwentyForm::create((array)$entries);
        $redirect_url = env('APP_WEB_URL');
       
        if($savedData->id && $payment){
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                'currency' => $savedData->fee_currency,
                'product_data' => [
                    'name' => 'Mentor Language Institue',
                    'description' => 'Payment for course'
                ],
                'unit_amount' => $savedData->fee * 100 //cent,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $redirect_url . '/i20application/thanks?id=' . $savedData->id .'&value='. $savedData->stripe_key,
            'cancel_url' => $redirect_url . '/i20application/fail?id=' . $savedData->id .'&value='. $savedData->stripe_key,
            ]);
            return response()->json(['Location' => $session->url]);
        }else{
            return response()->json(['Location' => $redirect_url . '/i20application/np-thanks?id=' . $savedData->id .'&value='. $savedData->stripe_key.'&np=true']);
        }
        dd('Wrong stripe information.');
    }

    public function store(Request $request)
    {
        $allRequest = $request->all();
        $allRequest['mname'] = ($allRequest['mname']) ? $allRequest['mname'] : '';
        $allRequest['stripe_key'] = $this->generateRandomString();

        $online = OnlineApplication::create($allRequest)->toArray();
        $language = $request->has('language') ? $request->language : 'en';
        $redirect_url = env('APP_WEB_URL');

        if($language != 'en') {
            $redirect_url .= '/' . $language;
        }

        if(isset($online['id'])) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Mentor Language Institue',
                    'description' => 'Payment for course'
                ],
                'unit_amount' => 15600,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => $redirect_url . '/admission/thanks?id=' . $online['id'] .'&value='. $online['stripe_key'],
            'cancel_url' => $redirect_url . '/admission/fail?id=' . $online['id'] .'&value='. $online['stripe_key'],
            ]);

            return response()->json(['Location' => $session->url]);
        }

        dd('Wrong stripe information.');
    }

    public function sendEmail($id, $key)
    {
        $online = OnlineApplication::where('id', $id)
                    ->where('stripe_key', $key)
                    ->where('is_sent', false)
                    ->first();

        if($online) {
            $online = $online->toArray();

            Mail::send('emails.admission', ["data" => $online], function($message) use ($online)
            {
                $to_name = env('APP_NAME');
                $to_email = "apply@mliesl.edu";                                            
                $subject = 'Application [' . global_lang_description($online['language']) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });

            OnlineApplication::where('id', $id)
                                ->where('stripe_key', $key)
                                ->where('is_sent', false)
                                ->update(['is_sent' => true]);                  
        }
        
        if (OnlineApplication::where('id', $id)
            ->where('student_visa_application', 'Yes')->exists()) {
                Mail::send('emails.customer.i20_request', ["data" => $online], function($message) use ($online)
                {               
                    $to_name = env('APP_NAME');            
                    $to_email = $online['email'];
                    $subject = 'Online I-20 Request Form';

                    $message->to($to_email, $to_name)->subject($subject);
                });
        }
    }
    public function l20Mail($id=null,$key=null,$language="en"){
        if(!!$id && !!$key){
            $record = LTwentyForm::where('id', $id)
                    ->where('stripe_key', $key)
                    ->where('is_sent', false)
                    ->first();
            if($record){
                $filtered = $this->l20Order($record);
                $str = "";
                array_map(function($each) use(&$str){
                    ["label"=>$label,"value"=>$value,"name"=>$name] = $each + ['label'=>false];
                    if($label){
                        $str .= "<tr><th colspan='2' align='left' style='font-size:16px;line-height:30px;padding:10px;font-weight:bolder;background:#f8f8f8'>$name</th></tr>";
                    }else{
                        $str .="<tr>";
                        $str .="<td style='line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8'>$name</td>";
                        $str .="<td style='line-height:25px;padding:10px;font-weight:bold;background:#f8f8f8'>$value</td>";
                        $str .="</tr>";
                    }
                },$filtered);
                $hasPayment = null;
                if((int)$record->fee > 0){
                    $hasPayment = "There was payment to Stripe.";
                }
                Mail::send('emails.l20', ["data" => $str,"hasPayment"=>$hasPayment], function($message) use ($record,$language)
                {
                    $to_name = env('APP_NAME');                         
                    $to_email = "info@mliesl.edu";                          
                    $subject = 'Online I20 Request Application [' . global_lang_description($language) .']';
                    $message->to($to_email, $to_name)->subject($subject);
                });
                $record->is_sent = true;
                $record->save();
                
                //Send to Customer
                Mail::send('emails.customer.l20', ["record" => $record,"data" => $str,"hasPayment"=>$hasPayment], function($message) use ($record,$language)
                {
                    $to_name = $record['fname'];
                    $to_email = $record['email'];
                    $subject = 'Online I20 Request Application';
                    $message->to($to_email, $to_name)->subject($subject);
                });
                
            }
        }
    }
    private function l20Order($data = null){
        $order = ['email' => ['name'=>'Email','value'=>null],
        'campus' => ['name'=>'Campus','value'=>null],
        'studentType' => ['name'=>'Student Type','value'=>null],
        'programStartDate' => ['name'=>'Program Start Date','value'=>null],
        'fname' => ['name'=>'First Name','value'=>null],
        'lname' => ['name'=>'Last Name','value'=>null],
        'countryBirth' => ['name'=>'Country of Birth','value'=>null],
        'birthday' => ['name'=>'Date of Birth','value'=>null],
        'citizenshipCountry' => ['name'=>'Country of Citizenship','value'=>null],
        'gender' => ['name'=>'Gender','value'=>null],
        'birthCity' => ['name'=>'City of Birth','value'=>null],
        'homeLabel' => ['name'=>'Home Country Address','value'=>null,'label'=>true],
        'street_name' => ['name'=>'Street Name','value'=>null],
        'address_no' => ['name'=>'Building Name, Building Number, and/or Apartment #','value'=>null],
        'city' => ['name'=>'City Name','value'=>null],
        'country' => ['name'=>'Country','value'=>null],
        'state' => ['name'=>'State','value'=>null],
        'zip' => ['name'=>'Zip','value'=>null],
        'tel' => ['name'=>'Phone','value'=>null],
        'appliedProgram' => ['name'=>'Applied Program','value'=>null],
        'courseDuration' => ['name'=>'Course Duration','value'=>null],
        'deliveryMode' => ['name'=>'How would you like us to deliver your I-20?','value'=>null],
        'passport' => ['name'=>'Supporting Documents (Passport)','value'=>null],
        'financial' => ['name'=>'Supporting Documents (Financial Statement / Bank Statement)','value'=>null],
        'account_balance' => ['name'=>'Balance (U.S dollar)','value'=>null],
        'account_type' => ['name'=>'Source of the Account','value'=>null],
        'visa' => ['name'=>'Supporting Documents (Visa)','value'=>null],
        'i94' => ['name'=>'Supporting Documents (I94)','value'=>null],
        'transfer_form' => ['name'=>'Supporting Documents (Signed Transfer Form)','value'=>null],
        'services' => ['name'=>'Housing Services','value'=>null],
        'fee' => ['name'=>'Fee','value'=>null],
        'fee_currency' => ['name'=>'Currency','value'=>null]
        ];
       collect($data)->map(function($each,$key) use(&$order){
        if(isset($order[$key])){
            if(in_array($key,self::$uploadLists)){
                $docs = json_decode($each);
                $links = array_map(function($each){ 
                   extract(get_object_vars($each));
                   $host = env('APP_URL');
                    return "<div><a href='$host/storage/docs/$src'>$name</a></div>";
                },$docs);
                $order[$key]['value'] = implode('',$links);
            }else{
                $data = ucwords(str_replace('_',' ',$each));
                $order[$key]['value'] = $data;
            }
        }
       });
       if($order["studentType"]['value'] != "Transfer"){
          unset($order["visa"]);
          unset($order["i94"]);
          unset($order["transfer_form"]);
       }
      return $order;
    }
    private function generateRandomString($length = 10) {
        return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
    }
    public function base64($binary,$name){
        if(!is_null($binary)){
            try{
                $encoded = [$data,$base64] = explode(";",$binary);
                $extension = [,$ext] = explode('/',$data);
                $link = [,$url] = explode(',',$base64);
                $src = $name.'_'.time().'_images'.'.'.$ext;
                \Storage::put("/public/docs/$src", base64_decode($url));
                return ["name"=>$name,"src"=>$src];
            }catch(\Exception $e){
                return false;
            }
        }else{
            return false;
        }
    }
    public function test(){
        
    }
}
