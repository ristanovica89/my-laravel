<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use App\Models\User;
use App\Rules\UserTrucker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateShipmentRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => ['required', 'string', 'max:128'],
            'from_city'     => ['required', 'string', 'max:64'],
            'from_country'  => ['required', 'string', 'max:64'],
            'to_city'       => ['required', 'string', 'max:64'],
            'to_country'    => ['required', 'string', 'max:64'],
            'price'         => ['required', 'numeric', 'min:0'],
            'status'        => ['required', 'string', Rule::in(Shipment::STATUSES)],
            'details'       => ['nullable', 'string', 'max:1000'],
            'user_id'       => ['required', 'integer', new UserTrucker()],
        ];
    }
}
