<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardFormRequest extends FormRequest
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
            'project_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'finished' => 'required',
            'dt_finished' => 'required',
            'dt_created' => 'required'
        ];

        return $rules;
    }

    public function messages(): array
    {
        return [
            'project_id' => 'O campo :attribute é obrigatório',
            'title' => 'O campo :attribute é obrigatório',
            'description' => 'O campo :attribute é obrigatório',
            'finished' => 'O campo :attribute é obrigatório',
            'dt_finished' => 'O campo :attribute é obrigatório',
            'dt_created' => 'O campo :attribute é obrigatório'
        ];
    }
}
