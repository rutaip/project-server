<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PartnerRequest extends Request
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
            'region_id' => 'required',
            'partner_name' => 'required|min:3',
            'partner_country' => 'required|min:3',
            'color' => 'required',
        ];
    }
}
