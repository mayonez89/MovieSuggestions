<?php

namespace App\Http\Requests\Profiles;

use App\Http\Requests\CustomRequest;

class StoreRequest extends CustomRequest
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
            'name' => 'required',
            'age' => 'date',
            'gender' => 'string',
            'country_id' => 'exists:countries,id',
        ];
    }
}
