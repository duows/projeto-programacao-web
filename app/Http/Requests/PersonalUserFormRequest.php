<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonalUserFormRequest extends FormRequest
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

        $rules = [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
            // 'dt_created' => 'required'
        ];

        if ($this->method() == 'PUT') {
            $rules['email'] = [
                'required',
                Rule::unique('personal_user')->ignore($this->id),
            ];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute é obrigatório',
            'password' => 'O campo :attribute é obrigatório'
            // 'dt_created' => 'O campo :attribute é obrigatório'
        ];
    }

}
