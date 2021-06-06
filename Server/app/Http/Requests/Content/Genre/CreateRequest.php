<?php

namespace App\Http\Requests\Content\Genre;

use App\Genre;
use App\Http\Requests\CustomRequest;

class CreateRequest extends CustomRequest
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
            "name" => ["required",
                function($field, $value) {
                    if(Genre::where($field, $value)->exists())
                        abort(409, "Data exists");
                },
                "string"]
        ];
    }
}
