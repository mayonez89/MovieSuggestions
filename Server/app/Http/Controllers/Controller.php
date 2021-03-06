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
     *      version="1.0.2",
     *      title="PWP - Movie Suggestions",
     *      @OA\Contact(
     *          name=" the backend developer",
     *          email="aujhazi20@student.oulu.fi"
     *      ),
     *      @OA\License(
     *          name="Contact the frontend developer",
     *          url="mailto:hadi.mir@student.oulu.fi"
     *      ),
     *     description="For 'User Favorite(s)' and 'Profile' sections, a user login is required.
     *          Take the code received as 'hash' received after a login or registration,
     *          and place it into the corresponding header fields.",
     *
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


//     *      url="http://18.196.196.249/",
//      *      url="http://127.0.0.1:8000/",

    protected function checkUser(): bool
    {
        return request()->user_id === request()->user->id;
    }
}
