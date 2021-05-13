<?php

namespace App\Http\Controllers;

use App\Content;
use App\Genre;
use App\Http\Requests\Content\Genre\CreateRequest;
use App\SirenCollection;

class GenreController extends Controller
{

    const TYPE = 'genre';
    const ROUTE_BASE = 'genres.';


    /**
     * @OA\Get(
     *      path="api/genres",
     *      operationId="getProjectsList",
     *      tags={"Genres"},
     *      summary="complete list of all genres",
     *      description="Returns list of genres",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
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

    /**
     * @OA\Get(
     *      path="/api/genres/{genre}",
     *      operationId="getProjectsList",
     *      tags={"Genre"},
     *      summary="show genre",
     *      description="show genre",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     *     )
     */
    public function show(Genre $genre)
    {
        $retval = Genre::getSirenEntity($genre);
        $this->appendUserActions($retval);
        return $retval->__toString();
    }

    /**
     * @OA\Post(
     *      path="/api/genres",
     *      operationId="getProjectsList",
     *      tags={"Genres"},
     *      summary="add genre",
     *      description="add genre",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
     */
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
