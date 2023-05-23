<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => [
                "required",
                "string",
                "max:255",
                "min:8",
                Rule::unique('apartments', "title")->ignore($this->apartment),
            ],
            'rooms' => "required|numeric|min:1|max:40",
            'beds' => "required|numeric|min:1|max:30",
            'bathrooms' => "required|numeric|min:1|max:20",
            'sqm' => "required|numeric|min:5|max:1000",
            'address' => "required|string|min:7|max:255",
            'city' => "required|string|min:2|max:100",
            'visibility' => "required|boolean",
            'price' => "required|numeric|min:20|max:9999",
            'description' => "required|string|min:8|max:2000",
            'cover_image' => "required|image|max:3072",
            'services' => "exists:services,id"
        ];
    }
}
