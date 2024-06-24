<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccountRequest extends FormRequest
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
            'name' => 'required|string',
            'type' => 'required|string',
            'category' => [
                'required_if:type,Activo,Pasivo',
                function ($attribute, $value, $fail) {
                    if (request()->input('type') == 'Patrimonio' && !is_null($value)) {
                        $fail('El campo ' . $attribute . ' debe ser null cuando el tipo es Patrimonio.');
                    }
                },
            ],
        ];
    }
    public function attributes()
    {
        return[
            'type'=>'tipo',
            'category'=>'categoria',
        ];
    }  
}
