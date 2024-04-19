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
        $this->merge(['id_user' => Auth::id()]);

        return [
            'booking_status' => [new CheckBookingStatusRule($this->car->id)],
            'id_user' => [new CheckReBookingRule()],
        ];
    }
}
