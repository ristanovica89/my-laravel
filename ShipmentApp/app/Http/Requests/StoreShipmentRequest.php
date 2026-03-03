<?php

namespace App\Http\Requests;

use App\Models\Shipment;
use App\Rules\UserClient;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreShipmentRequest extends FormRequest
{
   
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
            'client_id'     => ['required', 'integer', new UserClient()],
            'details'       => ['nullable', 'string', 'max:1000'],
            'documents'     => ['nullable', 'array'],
            'documents.*'   => ['file', 'mimes:jpg,jpeg,webp,png,doc,docx,pdf', 'max:10240'],
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'title.required'        => 'Shipment title is required.',
    //         'from_city.required'    => 'From city is required.',
    //         'to_city.required'      => 'To city is required.',
    //         'price.numeric'         => 'Price must be a valid number.',
    //         'status.in'             => 'Invalid shipment status.',
    //     ];
    // }
}
