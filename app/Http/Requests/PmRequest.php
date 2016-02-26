<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PmRequest extends Request
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
            'first' => 'required|min:3',
            'last' => 'required|min:3',
            'email' => 'required|min:3',
            'region_id' => 'required',
            'color' => 'required',
        ];
    }
}
