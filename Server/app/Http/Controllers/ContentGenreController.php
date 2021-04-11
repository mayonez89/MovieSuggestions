<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\Content\Genre\UpdateRequest;
use App\SirenCollection;

class ContentGenreController extends Controller
{
    const TYPE = 'genre';
    const ROUTE_BASE = 'genres.';
    const PARENT = 'contents.';


    public function index(Content $content)
    {
        $genres = $content->genres;
        $collection = SirenCollection::getSirenCollection($genres,
            route(self::PARENT . self::ROUTE_BASE . __FUNCTION__, [$content], false),
            Content::class, self::PARENT);
        return $collection->__toString();
    }

    public function update(Content $content, UpdateRequest $request)
    {
        $content->genres()->sync($request->get('ids'));
    }
}
