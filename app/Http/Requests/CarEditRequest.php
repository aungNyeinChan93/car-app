<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'maker_id' => 'required',
            'car_model_id' => 'required',
            'car_type_id' => 'required',
            'fuel_type_id' => 'required',
            'region' => 'required',
            'price' => 'required',
            'address' => 'nullable',
            'contact' => 'nullable',
            'description' => 'nullable',
            'publish_date' => 'nullable',
            'deleted_at' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'maker_id.required' => 'The maker field is required.',
            'car_model_id.required' => 'The car model field is required.',
            'car_type_id.required' => 'The car type field is required.',
            'fuel_type_id.required' => 'The fuel type field is required.',
            'region.required' => 'The region field is required.',
            'price.required' => 'The price field is required.',
        ];
    }
}
