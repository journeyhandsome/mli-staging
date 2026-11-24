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
        $responseToken = is_string($value) ? trim($value) : null;

        if (empty($secret)) {
            Log::error('RECAPTCHA_SECRET_KEY is not set, so the submission cannot be verified.');

            return false;
        }

        if (empty($responseToken)) {
            Log::warning('reCAPTCHA token was empty.', [
                'attribute' => $attribute,
                'ip' => request()->ip(),
            ]);

            return false;
        }

        // Google test keys are meant to pass during development and return a known test token.
        // This avoids false negatives while still keeping real validation active for production keys.
        if (str_starts_with((string) $secret, '6LeIxAcT')) {
            return true;
        }

        try {
            $response = Http::asForm()->timeout(10)->post(config('services.recaptcha.verify_url'), [
                'secret' => $secret,
                'response' => $responseToken,
                'remoteip' => request()->ip(),
            ]);
        } catch (\Throwable $e) {
            Log::error('Could not reach the reCAPTCHA service: ' . $e->getMessage(), [
                'attribute' => $attribute,
                'ip' => request()->ip(),
            ]);

            return false;
        }

        if (! $response->successful()) {
            Log::error('The reCAPTCHA service responded with HTTP ' . $response->status(), [
                'attribute' => $attribute,
                'ip' => request()->ip(),
            ]);

            return false;
        }

        if (! $response->json('success')) {
            Log::warning('reCAPTCHA rejected a submission.', [
                'attribute' => $attribute,
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
