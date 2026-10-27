<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class Recaptcha implements Rule
{
    public function passes($attribute, $value)
    {
        $secret = config('services.recaptcha.secret_key');

        if (empty($secret)) {
            Log::error('RECAPTCHA_SECRET_KEY is not set, so the submission cannot be verified.');

            return false;
        }

        try {
            $response = Http::asForm()->timeout(10)->post(config('services.recaptcha.verify_url'), [
                'secret' => $secret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Could not reach the reCAPTCHA service: ' . $e->getMessage());

            return false;
        }

        if (! $response->successful()) {
            Log::error('The reCAPTCHA service responded with HTTP ' . $response->status());

            return false;
        }

        if (! $response->json('success')) {
            Log::warning('reCAPTCHA rejected a submission.', [
                'error-codes' => $response->json('error-codes', []),
                'ip' => request()->ip(),
            ]);

            return false;
        }

        return true;
    }

    public function message()
    {
        return 'reCAPTCHA verification failed. Please try again.';
    }
}
