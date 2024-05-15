<?php

namespace App\Http\Requests;

use App\Rules\CheckBookingStatusRule;
use App\Rules\CheckReBookingRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CarRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'booking_status' => 'required|int',
            'user_id' => [new CheckReBookingRule()],
        ];
    }
}
