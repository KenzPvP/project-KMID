<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class UgmEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (! is_string($value)) {
            $fail('Gunakan email UGM dengan domain @mail.ugm.ac.id');
            return;
        }

        $parts = explode('@', $value);

        if (count($parts) !== 2 || $parts[0] === '' || strcasecmp($parts[1], 'mail.ugm.ac.id') !== 0) {
            $fail('Gunakan email UGM dengan domain @mail.ugm.ac.id');
            return;
        }

        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail('Gunakan email UGM dengan domain @mail.ugm.ac.id');
        }
    }
}
