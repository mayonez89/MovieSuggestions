<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\Favorites\StoreFavoriteRequest;
use App\SirenCollection;
use App\Traits\SirenUserTrait;
use App\User;

class FavoritesController extends Controller
{
    const TYPE = 'content';
    const ROUTE_BASE = 'contents.';
    use SirenUserTrait;

    public function index(User $user)
    {
        $contents = $user->favorites()->get();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }

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
