<?php

namespace App\Http\Controllers;

use App\Content;
use App\SirenCollection;

class GenreController extends Controller
{

     /**
     * @OA\Get(
     *      path="api/genres",
     *      operationId="getProjectsList",
     *      tags={"Projects"},
     *      summary="Get list of genres",
     *      description="Returns list of genres",
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
    
}
