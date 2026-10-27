<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contacts;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'recaptcha_token' => ['required', new Recaptcha()],
        ], [
            'recaptcha_token.required' => 'Please confirm that you are not a robot.',
        ]);

        // Normalize email
        $email = strtolower(trim($request->email));

        // Emails to silently ignore
        $blockedEmails = [
            'testing@example.com',
            'testing@gmail.com',
            'test@example.com',
            'test@gmail.com',
        ];

        // Silently accept submission without saving or sending
        if (in_array($email, $blockedEmails)) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your inquiry has been received.',
            ]);
        }
        
        $contact = Contacts::create($request->all())->toArray();
        $language = $request->has('language') ? $request->language : 'en';

        if(isset($contact['id'])) {
            if(isset($contact['is_promo']) && $contact['is_promo']) {
                Mail::send('emails.contactpromo', ["data" => $contact, "language" => $language], function($message) use ($language)
                {
                    $to_name = env('APP_NAME');
                    $to_email = "contact@mliesl.edu";
                    $subject = 'Promo Inquiry [' . global_lang_description($language) .']';

                    $message->to($to_email, $to_name)->subject($subject);
                });
            } else {
                Mail::send('emails.contact', ["data" => $contact, "language" => $language], function($message) use ($language)
                {
                    $to_name = env('APP_NAME');
                    $to_email = "contact@mliesl.edu";
                    $subject = 'Inquiry [' . global_lang_description($language) .']';

                    $message->to($to_email, $to_name)->subject($subject);
                });
            }

            //Send to Customer
            
            Mail::send('emails.customer.contact', ["data" => $contact], function($message) use ($contact)
            {
                $to_name = $contact['name'];
                $to_email = $contact['email'];

                $message->to($to_email, $to_name)->subject('Thanks Contact');
            });
        }

        return response()->json($contact);
    }
}