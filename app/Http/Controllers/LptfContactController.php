<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LptfContacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LptfContactController extends Controller
{
    public function store(Request $request)
    {
        $LptfContacts = LptfContacts::create($request->all())->toArray();
        $language = $request->has('language') ? $request->language : 'en';

        if(isset($LptfContacts['id'])) {
            Mail::send('emails.contactLptf', ["data" => $LptfContacts, "language" => $language], function($message) use ($language)
            {
                $to_name = env('APP_NAME');
                $to_email = "contact@mliesl.edu";
                $subject = 'Contact and Download Brochure [' . global_lang_description($language) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });
        }

        return response()->json($LptfContacts);
    }
    public function question(Request $request) {
        Mail::send('emails.lptf', ["data" => $request->all()], function($message) use ($request)
        {
            $to_name = env('APP_NAME');
            $to_email = "contact@mliesl.edu";                          
            $subject = 'LPTF [' . global_lang_description($request->language) .']';
            $message->to($to_email, $to_name)->subject($subject);
        });
            
         //Send to Customer
        Mail::send('emails.customer.downloadBrochure', [], function($message) use ($request)
        {
             $to_name = $request->name;
             $to_email = $request->email;
             $message->to($to_email, $to_name)->subject('Thank you for requesting the MLI school Brochure');
        });
    }
}
