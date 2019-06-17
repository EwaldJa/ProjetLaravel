<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class InsertionContactRequest extends FormRequest
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
            'nom_Contact'=>'required|min:3|max:30',
            'prenom_Contact'=>'required|min:3|max:30',
            'email_Contact'=>'required|min:10|max:100',
            'telephone_Contact'=>'required|min:10|max:50',
            'societe_Contact'=>'required|min:3|max:100',
            'codepostal_Contact'=>'required|min:3|max:10',
            'adresse_Contact'=>'required|max:200',
            'objet_Contact'=>'required|max:300',
            'message_Contact'=>'required|max:2000'
        ];
    }
}
