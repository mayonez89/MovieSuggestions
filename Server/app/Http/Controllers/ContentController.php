<?php

namespace App\Http\Controllers;

use App\Content;
use App\SirenCollection;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    const TYPE = 'content';
    const ROUTE_BASE = 'contents.';
    public function index()
    {
        $contents = Content::all();
        $collection = SirenCollection::getSirenCollection($contents, route(self::ROUTE_BASE . __FUNCTION__, [], false), Content::class);


        return $collection->__toString();
//        dd($collection);
//        $data = Content::all();
//        dd(Content::$data);

//        return response()->json([
//            'action' => __FUNCTION__,
//        ]);
    }

    public function create()
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function edit(Content $content)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function update(Content $content, Request $request)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function show(Content $content)
    {
        $content = Content::where($content->getKeyName(), $content->getKey())
//            ->with(['genres', 'ratings'])
            ->first();
//        dd($content);
        return Content::getSirenEntity($content)->__toString();
    }

    public function destroy(Content $content)
    {
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }
}
