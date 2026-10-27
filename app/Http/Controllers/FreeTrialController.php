<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\FreeTrial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FreeTrialController extends Controller
{
    public function store(Request $request)
    {

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

        $freeTrial = FreeTrial::create($request->all())->toArray();
        $language = $request->has('language') ? $request->language : 'en';

        if(isset($freeTrial['id'])) {
            Mail::send('emails.freeTrial', ["data" => $freeTrial, "language" => $language], function($message) use ($language)
            {
                $to_name = env('APP_NAME');
                $to_email = "contact@mliesl.edu";
                $subject = 'Free Trial [' . global_lang_description($language) .']';

                $message->to($to_email, $to_name)->subject($subject);
            });

            //Send to Customer
            Mail::send('emails.customer.freetrial', ["data" => $freeTrial], function($message) use ($freeTrial)
            {
                $to_name = $freeTrial['name'];
                $to_email = $freeTrial['email'];

                $message->to($to_email, $to_name)->subject('Thank you for filling out the Free Trial Class');
            });
        }

        return response()->json($freeTrial);
    }
}
