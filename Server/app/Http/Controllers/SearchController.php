<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        return response()->json(Content::SEARCH_PARAMS);
    }

    public function searchAction(Request $request)
    {
        $params = $request->only(Content::SEARCH_PARAMS);
        return response()->json($params);
    }
}
