<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomsRequest extends FormRequest
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
                'name' => 'string|max:150',
                'number_of_participants' => 'string|max:10',
                'description' => 'string|max:255'
            ];
        }
        return [
            'user_id' => 'required',
            'name' => 'required|string|max:150',
            'number_of_participants' => 'required|string|max:10',
            'description' => 'required|string|max:255'
        ];
    }
}
