<?php

namespace App\Rules;

use Closure;
use App\Models\RegistrationKey;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidInvitationKey implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $checkKey = RegistrationKey::where('hash_key', $value)->where('is_deleted', 0)
            ->where('expiration', '>', Carbon::now())
            ->first();

        if (!$checkKey) {
            $fail('The key provided does not exists.');
        }
    }
}
