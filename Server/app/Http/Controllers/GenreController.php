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
     *      path="/api/genres",
     *      operationId="getProjectsList",
     *      tags={"Genres"},
     *      summary="complete list of all genres",
     *      description="Returns list of genres",
     *         @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
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
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *      @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *     @OA\Parameter(
     *          name="genre",
     *          in="path",
     *          required=true
     *      )
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
     *       @OA\Response(
     *          response=201,
     *          description="created"
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *       @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *     @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *      @OA\Response(
     *          response=409,
     *          description="Data exists",
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=true
     *      )
     *     )
     */
    public function store(CreateRequest $request)
    {
        Genre::create($request->only(['name']));
    }

    /**
     * @OA\Delete(
     *      path="/api/genres/{genre}",
     *      operationId="getProjectsList",
     *      tags={"Genre"},
     *      summary="delete genre",
     *      description="delete genre",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access denied",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *     @OA\Parameter(
     *          name="genre",
     *          in="path",
     *          required=true
     *      )
     *     )
     */
    public function destroy(Genre $genre)
    {
        $genre->contents()->detach();
        $genre->profiles()->detach();
        $genre->delete();
    }
}
