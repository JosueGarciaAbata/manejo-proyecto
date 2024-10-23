<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVoterDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nom_vot"=>'required|string|max:25',
            "ape_vot"=>'required|string|max:25',
            "ema_vot"=>'required|email|exists:voters,ema_vot',
        ];
    }

    public function messages(){
        return [
            "nom_vot.required"=>"Debe existir un nombre para terminar este proceso",
            "ape_vot.required"=>"Debe existir un apellido para terminar este proceso",
            "ema_vot.required"=>"El email no esta registrado",
        ];
    }

}
