<?php

namespace App\Rules;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckReBookingRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $result = Car::where($attribute, '=', $value)->first();
        if ($result) {
            $fail('Вы уже забронировали машину!');
        }
    }
}
