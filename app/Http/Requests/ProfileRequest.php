<?php

namespace P4\Http\Requests;

use P4\Http\Requests\Request;

class ProfileRequest extends Request
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
            'last_name'     =>'required',
            'first_name'    =>'required',
            'street'        =>'required',
            'city'          =>'required',
            'zip'           =>'required',
            'state'         =>'required',
            'country'       =>'required',
            'school'        =>'required',
            'aria_one_name' =>'required',
            'aria_one_link' =>'required',
            'aria_two_name' =>'required',
            'aria_two_link' =>'required',
            'description'   =>'required'
        ];
    }
}
