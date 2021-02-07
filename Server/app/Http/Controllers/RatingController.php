<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rating(Content $content)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function rate(Content $content, Request $request)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }
}
