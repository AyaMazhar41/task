<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projects extends FormRequest
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
            'name' => ['required', 'max:191'],
            'creator' => ['required', 'max:191'],
            'start_at' => ['date','required'],
            'end_at' => ['date','required'],
        ];
    }

    public function messages()
    {
        return [
            'required'=>'this input required',
            'name.max' => 'max char is 191',
           
        ];
    }
}
