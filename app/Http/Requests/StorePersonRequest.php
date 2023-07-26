<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "first_name" => "required|min:3|max:20|regex:/^[A-Za-z]+$/",
            "last_name" => "required|min:3|max:20||regex:/^[A-Za-z]+$/",
            "father_name" => "required|min:3|max:20|regex:/^[A-Za-z]+$/",
            "birth_date" => "required|date_format:Y-m-d",
            "civil_status" => "required",
        ];
    }
}
