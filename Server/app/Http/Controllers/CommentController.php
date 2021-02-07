<?php

namespace App\Http\Controllers;

use App\Content;
//use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Content $content)
    {
        return response()->json([]);
    }

    public function store(Content $content)
    {
        return response()->json(['stored']);
    }
}
