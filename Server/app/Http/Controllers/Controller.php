<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use SirenPHP\Action;
use SirenPHP\Entity;
use SirenPHP\Link;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TYPE = 'define_type';

    protected function SirenCollectionBuilder(Collection $collection, $href)
    {
//        dd();
//        $collection = new Entity(
//            $href,
//            ['count' => count($collection)],
//            ['collection']
//        );
//        $entity = new Entity(
//            '/book/1',
//            ['name' => 'The Book 1'],
//            [static::TYPE]
//        );
//        $collection->appendEntity(['item'], $entity);
//        $link = new Link(['next'], '/collection/2');
//        $collection->appendLink($link);
//
//
//
//        $action = new Action('action', 'href');
//        $collection->appendAction($action);
//
//        return $collection;
    }
    /**
     * @OA\Info(
     *      version="1.0.1",
     *      title="PWP - Movie Suggestions",
     *      description="L5 Swagger OpenApi description",
     *      @OA\Contact(
     *          email="admin@admin.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url="/",
     *      description="Demo API Server"
     * )
     *
     * @OA\Tag(
     *     name="Projects",
     *     description="API Endpoints of Projects"
     * )
     */

    protected function checkUser(): bool
    {
        return request()->user_id === request()->user->id;
    }
}
