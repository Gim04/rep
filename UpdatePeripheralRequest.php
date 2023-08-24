<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeripheralRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'position'=> 'required',
        'position_id'=> 'required',
        'inventory_number'=> 'required',
        'serial_number'=> 'required',
        'manufacturer_id'=> 'required|numeric',
        'model'=> 'required',
        'type_of_peripheral'=> 'required',
        'power_rating'=> 'required',
        'description'=> 'nullable',
        'box'=> 'required'
        ];
    }
}
