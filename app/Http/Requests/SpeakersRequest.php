<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakersRequest extends FormRequest
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
        if ($this->method == "PUT") {
            return [
                'user_id' => 'required',
                'name' => 'string|max:150',
                'telefone' => 'string|max:20',
                'email' => 'string|max:255|email',
                'description' => 'string',
                'skills' => 'array',
                'image' => 'file'
            ];
        }
        return [
            'user_id' => 'required',
            'name' => 'required|string|max:150',
            'telefone' => 'required|string|max:20',
            'email' => 'required|string|max:255|email',
            'description' => 'required|string',
            'skills' => 'required|array',
            'image' => 'file'
        ];
    }
}
