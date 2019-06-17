<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Input;

class InsertionServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::user() != null) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = Input::get('id_Service');
        return [
            //
            'intitule_Service'.$id => 'required|min:5|max:100',
            'description_Service'.$id => 'required|max:2000',
        ];
    }
}
