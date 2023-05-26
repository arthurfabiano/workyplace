<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationEventRequest extends FormRequest
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
                'title' => 'string|max:150',
                'description' => 'string|max:255',
                'topics' => 'array',
                'start_date' => 'string',
                'finish_date' => 'string',
                'image' => 'file'
            ];
        }
        return [
            'user_id' => 'required',
            'title' => 'required|string|max:150',
            'description' => 'required|string|max:255',
            'topics' => 'required|array',
            'start_date' => 'required|string',
            'finish_date' => 'required|string',
            'image' => 'file'
        ];
    }
}
