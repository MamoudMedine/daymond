<?php

namespace App\Http\Requests\Utilisateur;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Utilisateur;

class UpdateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required | image',
            'fullname' => 'required | string',
            'country' => 'required | string',
            'town' => 'required | string',
            'profession' => 'required | string',
            'contact' => 'required | digits:10',
        ];
    }
}
