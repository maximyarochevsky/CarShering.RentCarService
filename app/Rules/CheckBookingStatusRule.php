<?php

namespace App\Rules;

use App\Models\Car;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckBookingStatusRule implements ValidationRule
{
    public function __construct(private readonly int $id) {}

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $result = Car::where('id', '=', $this->id)->first();
        if ($result->booking_status === 1) {
            $fail('Эта машина уже забронирована!');
        }
    }
}
