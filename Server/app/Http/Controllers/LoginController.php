<?php

namespace App\Http\Controllers;

use App\Traits\SirenUserTrait;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/login",
     *      operationId="getProjectsList",
     *      tags={"User actions"},
     *      summary="user login",
     *      description="Gets the user ID and the user hash based on email and password.",
     *       @OA\Response(
     *          response=201,
     *          description="created"
     *       ), 
     *       @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *     @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ), 
     *     @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true
     *      )
     *     )
     */
    public function login()
    {
        $user = User::where('email', request()->get('email'))->where('password', request()->get('password'))->first();
        $hash = md5(now());
        $user->update(['hash' => $hash]);
        return response()->json([
            'id' => $user->id,
            'hash' => $hash,
        ]);
    }

    /**
     * @OA\Post(
     *      path="/api/logout",
     *      operationId="getProjectsList",
     *      tags={"User actions"},
     *      summary="user logout",
     *      description="remove the hash used for the users authentication",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     * )
     */
    public function logout()
    {
        User::where('hash', request()->header("hash"))->update(['hash' => null]);
    }

    public function test(Request $request)
    {
        return $request->get('user_id');
    }
}
