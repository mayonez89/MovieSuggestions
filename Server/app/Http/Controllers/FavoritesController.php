<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\Favorites\StoreFavoriteRequest;
use App\SirenCollection;
use App\User;

class FavoritesController extends Controller
{
    const TYPE = 'content';
    const ROUTE_BASE = 'contents.';

    /**
     * @OA\Get(
     *      path="/api/users/{user}/favorites",
     *      operationId="getProjectsList",
     *      tags={"User Favorites"},
     *      summary="list of favorite contents belonging to a certain user",
     *      description="Returns list of favorite contents belonging to a certain user",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *     @OA\Parameter(
     *          name="user",
     *          in="path",
     *          required=true
     *      )
     *     )
     */
    public function index(User $user)
    {
        $contents = $user->favorites()->get();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }

    /**
     * @OA\Post(
     *      path="/api/users/{user}/favorites",
     *      operationId="getProjectsList",
     *      tags={"User Favorites"},
     *      summary="Add Favorite",
     *      description="Adds the selected content to the list of the users' favorite contents.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *     @OA\Parameter(
     *          name="user",
     *          in="path",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="favorite",
     *          description="content to be added as favorite",
     *          in="query",
     *          required=true
     *      )
     *     )
     */
    public function store(User $user, StoreFavoriteRequest $request)
    {
        if ($this->checkUser()) {

            $favorite = $request->get('favorite');
            if ($user->favorites()->find($favorite) === null)
                $user->favorites()->attach($favorite);
        } else {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/users/{user}/favorites/{favorite}",
     *      operationId="getProjectsList",
     *      tags={"User Favorite"},
     *      summary="Remove favorite",
     *      description="From the list of a users favorite contents, remove the selected one.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="user",
     *          in="path",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="favorite",
     *          description="content to be removed as favorite",
     *          in="path",
     *          required=true
     *      )
     *     )
     */
    public function destroy(User $user, Content $favorite)
    {
        if ($this->checkUser()) {
            $user->favorites()->detach($favorite);
        } else {
            header("HTTP/1.1 401 Unauthorized");
            exit;
        }
    }
}
