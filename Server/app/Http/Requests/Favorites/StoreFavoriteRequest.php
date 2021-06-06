<?php

namespace App\Http\Requests\Favorites;

use App\Http\Requests\CustomRequest;

class StoreFavoriteRequest extends CustomRequest
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
            'favorite' => 'exists:contents,slug'
        ];
    }
}
