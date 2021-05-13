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

    /**
     * @OA\Get(
     *      path="api/contents/{content}/genres",
     *      operationId="getProjectsList",
     *      tags={"Content Genres"},
     *      summary="list of genres belonging to a certain content",
     *      description="Returns list of genres belonging to a certain content",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     *     )
     */
    public function index(Content $content)
    {
        $genres = $content->genres;
        $collection = SirenCollection::getSirenCollection($genres,
            route(self::PARENT . self::ROUTE_BASE . __FUNCTION__, [$content], false),
            Content::class, self::PARENT);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }

    /**
     * @OA\Put(
     *      path="/api/contents/{content}/genres",
     *      operationId="getProjectsList",
     *      tags={"Content Genres"},
     *      summary="Update list of genres for selected content. Takes list of IDs.",
     *      description="Update list of genres for selected content. Takes list of IDs.",
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
    public function update(Content $content, UpdateRequest $request)
    {
        $content->genres()->sync($request->get('ids'));
    }
}
