<?php

namespace App\Http\Controllers;

use App\Content;
use App\Genre;
use App\Http\Requests\Content\Genre\UpdateRequest;
use App\SirenCollection;

class GenreController extends Controller
{
    const TYPE = 'genre';
    const ROUTE_BASE = 'genres.';

    public function index()
    {
        $genres = Genre::all();
        $collection = SirenCollection::getSirenCollection($genres,
            route(self::ROUTE_BASE . __FUNCTION__, [], false),
            Content::class);
        return $collection->__toString();
    }

    public function show(Genre $genre)
    {
        return Genre::getSirenEntity($genre)->__toString();
    }

    public function store(UpdateRequest $request)
    {
        Genre::create($request->only(['title']));
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
    }
}
