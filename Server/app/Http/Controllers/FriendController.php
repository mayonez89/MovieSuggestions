<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller
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

    public function edit(Friend $friend)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function update(Friend $friend, Request $request)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function show(Friend $friend)
    {
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }

    public function destroy(Friend $friend)
    {
        return response()->json([
            'controller' => self::class,
            'action' => __FUNCTION__,
        ]);
    }
}
