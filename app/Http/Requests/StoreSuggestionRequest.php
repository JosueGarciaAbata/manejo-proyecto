<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuggestionRequest extends FormRequest
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
            'tit_sug'=>'required|max:50',
            'des_sug'=>'required|max:150',
            'ema_sug'=>'required|email'
        ];
    }
    public function messages(): array
    {
        return [
            'tit_sug.required' => 'El título es obligatorio.',
            'des_sug.required' => 'La descripción es obligatoria.',
        ];
    }
}
