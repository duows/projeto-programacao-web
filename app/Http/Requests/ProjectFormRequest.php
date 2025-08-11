<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            'description' => 'required',
            'dt_start' => 'required',
            'active' => 'required',
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'dt_start' => 'O campo :attribute é obrigatório',
            'active' => 'O campo :attribute é obrigatório'
        ];
    }
}
