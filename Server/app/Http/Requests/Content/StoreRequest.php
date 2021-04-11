<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="Store Content request",
 *      description="Store Content request body data",
 *      type="object",
 *      required={"title"}
 * )
 */
class StoreRequest extends FormRequest
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
    /**
     * @OA\Property(
     *      title="title",
     *      description="Title of the new content",
     *      example="A nice content"
     * )
     *
     * @var string
     */
}
