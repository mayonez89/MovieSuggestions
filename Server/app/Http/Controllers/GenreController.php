<?php

namespace App\Http\Controllers;

use App\Content;
use App\Genre;
use App\Http\Requests\Content\Genre\CreateRequest;
use App\SirenCollection;
use App\Traits\SirenUserTrait;

class GenreController extends Controller
{
    use SirenUserTrait;

    const TYPE = 'genre';
    const ROUTE_BASE = 'genres.';


    /**
     * @OA\Get(
     *      path="api/genres",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of genres",
     *      description="Returns list of genres",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $genres = Genre::all();
        $collection = SirenCollection::getSirenCollection($genres,
            route(self::ROUTE_BASE . __FUNCTION__, [], false),
            Content::class);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }

    public function show(Genre $genre)
    {
        $retval = Genre::getSirenEntity($genre);
        $this->appendUserActions($retval);
        return $retval->__toString();
    }

    public function store(CreateRequest $request)
    {
        Genre::create($request->only(['name']));
    }

    public function destroy(Genre $genre)
    {
        $genre->contents()->detach();
        $genre->profiles()->detach();
        $genre->delete();
    }
}
