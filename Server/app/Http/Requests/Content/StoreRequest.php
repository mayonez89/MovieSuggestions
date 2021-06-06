<?php

namespace App\Http\Requests\Content;


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
            'title' => 'required|string',
            'trailer_url' => 'string',
            'description' => 'string',
            'director' => 'string',
            'release_date' => 'numeric',
        ];
    }
}
