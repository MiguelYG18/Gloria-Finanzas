<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailRequest extends FormRequest
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
            'id_account'=>'required|integer|exists:accounts,id',
            'quantity'=>'required|integer',
            'year'=>'required|integer'
        ];
    }
    public function attributes()
    {
        return[
            'id_account'=>'Cuenta',
        ];
    }      
}
