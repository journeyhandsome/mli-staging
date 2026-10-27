<?php

namespace App\Http\Controllers;

use Stripe;
use Illuminate\Http\Request;
use App\Models\DanceCampOnlineApplication;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DanceCampOnlineApplicationController extends Controller
{   
    public function store(Request $request)
    {
        $allRequest = $request->all();

        $stripe_key = $this->generateRandomString();
        $language = $request->has('language') ? $request->language : 'en';
        $online = DanceCampOnlineApplication::create([
            'first_name' => $allRequest['first_name'],
            'last_name' => $allRequest['last_name'],
            'gender' => $allRequest['gender'],
            'birthdate' => $allRequest['birthdate'],
            'email' => $allRequest['email'],
            'grade_level' => $allRequest['grade_level'],
            'phone' => $allRequest['phone'],
            'nationality' => $allRequest['nationality'],
            'address_1' => $allRequest['address_1'],
            'address_2' => $allRequest['address_2'],
            'city' => $allRequest['city'],
            'state' => $allRequest['state'],
            'zip' => $allRequest['zip'],
            'country' => $allRequest['country'],
            'language_spoken' => $allRequest['language_spoken'],
            'emergency_contact_full_name' => $allRequest['emergency_contact_full_name'],
            'emergency_contact_relationship' => $allRequest['emergency_contact_relationship'],
            'emergency_contact_email' => $allRequest['emergency_contact_email'],
            'emergency_contact_phone' => $allRequest['emergency_contact_phone'],
            'guardian_name' => $allRequest['guardian_name'],
            'guardian_daytime_phone' => $allRequest['guardian_daytime_phone'],
            'guardian_home_phone' => $allRequest['guardian_home_phone'],
            'guardian_mobile_phone' => $allRequest['guardian_mobile_phone'],
            'guardian_email' => $allRequest['guardian_email'],
            'accomodation' => $allRequest['accomodation'],
            'program_start_date' => $allRequest['program_start_date'],
            'program_age_group' => $allRequest['program_age_group'],
            'program_weeks' => $allRequest['program_weeks'],
            'before_camp_start' => $allRequest['before_camp_start'],
            'after_camp_start' => $allRequest['after_camp_start'],
            'irregular_pickup' => json_encode($allRequest['irregular_pickup']),
            'minor_service' => $allRequest['minor_service'],
            'terms_and_conditions_parent_name' => $allRequest['terms_and_conditions_parent_name'],
            'agree_terms_and_conditions_date' => $allRequest['agree_terms_and_conditions_date'],
            'agency_name' => $allRequest['agency_name'],
            'agency_rep_name' => $allRequest['agency_rep_name'],
            'agency_rep_email' => $allRequest['agency_rep_email'],
            'tamwood_sales' => $allRequest['tamwood_sales'],
            'language' => $language,
            'stripe_key' => $stripe_key
        ])->toArray();
        $language = $request->has('language') ? $request->language : 'en';
        $redirect_url = env('APP_WEB_URL');

        if(isset($online['id'])) {
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => 'Mentor Language Institute',
                            'description' => 'Payment for course'
                        ],
                        'unit_amount' => 15600,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $redirect_url . '/dancecamp/online-application/thanks?id=' . $online['id'] .'&value='. $online['stripe_key'],
                'cancel_url' => $redirect_url . '/',
            ]);
        }
        return response()->json(['Location' => $session->url]);

        dd('Wrong stripe information.');
    }

    public function handleSuccess($id, $key) {
        $online = DanceCampOnlineApplication::where('id', $id)
            ->where('stripe_key', $key)
            ->where('is_paid', false)
            ->first();

        if($online) {
            $online = $online->toArray();

            $online['irregular_pickup_str'] = implode(', ', json_decode($online['irregular_pickup'], true));

            Mail::send('emails.DanceCampOnlineApplication', ["data" => $online], function($message) use ($online)
            {
                $to_name = env('APP_NAME');        
                $to_email = "jeneline59@gmail.com";                                      
                // $to_email = "contact@mliesl.edu";  
                // $to_email = "apply@mliesl.edu";                                                  
                $subject = 'Application [' . global_lang_description($online['language']) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });

            DanceCampOnlineApplication::where('id', $id)
                ->where('stripe_key', $key)
                ->where('is_paid', false)
                ->update(['is_paid' => true]);
            
            //Send to Customer
            Mail::send('emails.customer.DanceCampOnlineApplication', ["data" => $online], function($message) use ($online)
            {
                $to_name = $online['first_name'].' '.$online['last_name'];
                $to_email = $online['email'];
    
                $message->to($to_email, $to_name)->subject('Dance Camp Online Application');
            });

            return 'success';
        } else {
            return 'failed';
        }

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
