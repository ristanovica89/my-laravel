<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreShipmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        // Ako želiš da svako može da kreira shipment
        return true;
    }

    public function rules(): array
    {
        return [
            'title'         => 'required|string|max:128',
            'from_city'     => 'required|string|max:64',
            'from_country'  => 'required|string|max:64',
            'to_city'       => 'required|string|max:64',
            'to_country'    => 'required|string|max:64',
            'price'         => 'required|numeric|min:0',
            'status'        => 'required|string|in:Pending,In Transit,Delivered,Cancelled',
            'details'       => 'nullable|string|max:1000',
            'user_id'       => 'required|integer|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'Shipment title is required.',
            'from_city.required'    => 'From city is required.',
            'to_city.required'      => 'To city is required.',
            'price.numeric'         => 'Price must be a number.',
            'status.in'             => 'Status must be one of: Pending, In Transit, Delivered, Cancelled.',
            'user_id.exists'        => 'Selected user does not exist.',
        ];
    }
}
