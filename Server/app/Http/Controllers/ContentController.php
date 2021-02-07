<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
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
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }

    public function destroy(Content $content)
    {
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }
}
