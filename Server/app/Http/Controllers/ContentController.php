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
     *      tags={"Projects"},
     *      summary="Get list of projects",
     *      description="Returns list of projects",
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
        $contents = Content::all();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);
        return $collection->__toString();
    }

    public function create()
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $content = Content::create($request->all());
        return Content::getSirenEntity($content)->__toString();
    }

    public function edit(Content $content)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function update(Content $content, Request $request)
    {
        $content->update($request->all());
        return Content::getSirenEntity($content)->__toString();
    }

    public function show(Content $content)
    {
        $content = Content::where($content->getKeyName(), $content->getKey())
            ->first();
        return Content::getSirenEntity($content)->__toString();
    }

    public function destroy(Content $content)
    {
        $content->delete();
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }
}
