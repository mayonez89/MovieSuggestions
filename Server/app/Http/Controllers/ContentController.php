<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\Content\StoreRequest;
use App\SirenCollection;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    const TYPE = 'content';
    const ROUTE_BASE = 'contents.';

    /**
     * @OA\Get(
     *      path="/api/contents",
     *      operationId="getProjectsList",
     *      tags={"Contents"},
     *      summary="get the complete list of content available",
     *      description="Returns list of movies",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     *     )
     */
    public function index()
    {
        $contents = Content::all();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }


    public function create()
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/contents",
     *      operationId="getProjectsList",
     *      tags={"Contents"},
     *      summary="add content",
     *      description="add content",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="title",
     *          in="query",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="trailer_url",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="description",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="director",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="release_date",
     *          in="query",
     *          required=false
     *      )
     *     )
     */
    public function store(StoreRequest $request)
    {
        $content = Content::create($request->all());
        $object = Content::getSirenEntity($content);
        $this->appendUserActions($object);
        return $object->__toString();
    }

    public function edit(Content $content)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }



    /**
     * @OA\Put(
     *      path="/api/contents/{content}",
     *      operationId="getProjectsList",
     *      tags={"Content"},
     *      summary="edit content",
     *      description="edit content",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="content",
     *          in="path",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="title",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="trailer_url",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="description",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="director",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="release_date",
     *          in="query",
     *          required=false
     *      )
     *     )
     */
    public function update(Content $content, Request $request)
    {
        $content->update($request->all());
        $object = Content::getSirenEntity($content);
        $this->appendUserActions($object);
        return $object->__toString();
    }



    /**
     * @OA\Get (
     *      path="/api/contents/{content}",
     *      operationId="getProjectsList",
     *      tags={"Content"},
     *      summary="show content",
     *      description="show content",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       )
     *     ),
     *     @OA\Parameter(
     *          name="content",
     *          in="path",
     *          required=true
     *      )
     */
    public function show(Content $content)
    {
        $content = Content::where($content->getKeyName(), $content->getKey())
            ->with(["genres"])
            ->first();
        $object = Content::getSirenEntity($content);
        $this->appendUserActions($object);
        return $object->__toString();
    }



    /**
     * @OA\Delete(
     *      path="/api/contents/{content}",
     *      operationId="getProjectsList",
     *      tags={"Content"},
     *      summary="delete content",
     *      description="delete content",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="content",
     *          in="path",
     *          required=true
     *      )
     *     )
     */
    public function destroy(Content $content)
    {
        $content->genres()->detach();
        $content->delete();
    }
}
