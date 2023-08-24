<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMouseRequest extends FormRequest
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
        'manufacturer_id'=> 'required|numeric',
        'inventory_number'=> 'required',
        'serial_number'=> 'required',
        'model'=> 'required',
        'year'=> 'required',
        'box'=> 'required',
        'description'=> 'nullable' 
        ];
    }
}
