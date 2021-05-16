<?php

namespace App\Http\Controllers;

use App\Traits\SirenUserTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SirenUserTrait;

    const TYPE = 'define_type';

    protected function SirenCollectionBuilder(Collection $collection, $href)
    {
    }
    /**
     * @OA\Info(
     *      version="1.0.1",
     *      title="PWP - Movie Suggestions",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          name=" the backend developer",
     *          email="aujhazi20@student.oulu.fi"
     *      ),
     *      @OA\License(
     *          name="Contact the frontend developer",
     *          url="mailto:hadi.mir@student.oulu.fi"
     *      )
     * )
     *
     * @OA\Server(
     *      url="http://18.196.196.249/",
     *      description="PWP Demo API Server"
     * )
     *
     * @OA\Tag(
     *     name="PWP Project",
     *     description="API Endpoints of Movie Suggestions"
     * )
     */

    protected function checkUser(): bool
    {
        return request()->user_id === request()->user->id;
    }
}
