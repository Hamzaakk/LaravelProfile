<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // if we have roles user cant make some function (false)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'password'=>'min:6|max:15|confirmed',
            'email'=>'email|required',
            'bio' => 'required',
            'image'=>'image|mimes:png,jpg,jpeg,svg',
            
        ];
    }

   
}
