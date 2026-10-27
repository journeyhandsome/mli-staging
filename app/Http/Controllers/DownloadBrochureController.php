<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DownloadBrochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DownloadBrochureController extends Controller
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

        $downloadBrochure = DownloadBrochure::create($request->all())->toArray();
        $language = $request->has('language') ? $request->language : 'en';

        if(isset($downloadBrochure['id'])) {
            if(isset($downloadBrochure['is_promo']) && $downloadBrochure['is_promo']) {
                Mail::send('emails.promoDownloadBrochure', ["data" => $downloadBrochure, "language" => $language], function($message) use ($language)
                {
                    $to_name = env('APP_NAME');
                    $to_email = "contact@mliesl.edu";
                    $subject = 'Promo Download Brochure [' . global_lang_description($language) .']';

                    $message->to($to_email, $to_name)->subject($subject);
                });
            } else {
                Mail::send('emails.downloadBrochure', ["data" => $downloadBrochure, "language" => $language], function($message) use ($language)
                {
                    $to_name = env('APP_NAME');
                    $to_email = "contact@mliesl.edu";
                    $subject = 'Download Brochure [' . global_lang_description($language) .']';

                    $message->to($to_email, $to_name)->subject($subject);
                });
            }

            //Send to Customer
            Mail::send('emails.customer.downloadBrochure', ["data" => $downloadBrochure], function($message) use ($downloadBrochure)
            {
                $to_name = $downloadBrochure['name'];
                $to_email = $downloadBrochure['email'];

                $message->to($to_email, $to_name)->subject('Thank you for requesting the MLI school Brochure');
            });
        }

        return response()->json($downloadBrochure);
    }
}
