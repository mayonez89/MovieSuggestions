<?php

namespace App\Http\Controllers;

use App\Content;
use App\Http\Requests\Content\StoreRequest;
use App\SirenCollection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     *      description="Returns the list of all movies",
     *      @OA\Response(
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
        $contents = Content::all();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);
        $this->appendUserActions($collection);
        return $collection->__toString();
    }

    /**
     * @OA\Post(
     *      path="/api/contents",
     *      operationId="getProjectsList",
     *      tags={"Contents"},
     *      summary="add content",
     *      description="Add new content(movie). None of the shown parameters are unique, the ID is the slug, created from the title.
     *          If the same title appears twice, the next slug will just add numeration to the end of the slug.",
     *      @OA\Response(
     *          response=201,
     *          description="Created"
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *     @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *     @OA\Parameter(
     *          name="title",
     *          in="query",
     *          example="Terminator",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="trailer_url",
     *          in="query",
     *          example="https://www.youtube.com/watch?v=k64P4l2Wmeg",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="description",
     *          in="query",
     *          example="A human-looking indestructible cyborg is sent from 2029 to 1984 to assassinate a waitress...",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="director",
     *          in="query",
     *          example="James Cameron",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="release_date",
     *          in="query",
     *          example="1984",
     *          required=false
     *      )
     *     )
     */
    public function store(StoreRequest $request)
    {
        return response()->json([
            'url' => route('contents.show', Content::create($request->all()))
        ], 201);
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
     *          description="Successful"
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
     *     @OA\Parameter(
     *          name="content",
     *          in="path",
     *          required=true,
     *          description="slug of the content to be updated",
     *          example="infinity-war",
     *      ),
     *     @OA\Parameter(
     *          name="title",
     *          in="query",
     *          required=false,
     *          example="Infinity war 2",
     *      ),
     *     @OA\Parameter(
     *          name="trailer_url",
     *          in="query",
     *          required=false,
 *              example="https://www.youtube.com/watch?v=jz9AB7cXC8E&ab_channel=ISMO",
     *      ),
     *     @OA\Parameter(
     *          name="description",
     *          in="query",
     *          required=false,
     *          example="New release",
     *      ),
     *     @OA\Parameter(
     *          name="director",
     *          in="query",
     *          required=false,
     *          example="James Cameron",
     *      ),
     *     @OA\Parameter(
     *          name="release_date",
     *          in="query",
     *          required=false,
     *          example="2021"
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
     *          name="content",
     *          in="path",
     *          required=true,
     *          example="infinity-war",
     *          description="slug of the content to be displayed",
     *      )
     *     )
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
     *          description="delete content",
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
     *          name="content",
     *          in="path",
     *          required=true,
     *          example="12-angry-men",
     *          description="slug of the content to be deleted"
     *      )
     *     )
     */
    public function destroy(Content $content)
    {
        $content->genres()->detach();
        $content->delete();
    }
}
