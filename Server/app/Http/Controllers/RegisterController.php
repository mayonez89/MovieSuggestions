<?php

namespace App\Http\Controllers;

use App\User;

class RegisterController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/register",
     *      operationId="getProjectsList",
     *      tags={"User actions"},
     *      summary="Register user",
     *      description="Register user",
     *     @OA\Response(
     *          response=201,
     *          description="created"
     *       ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad Request",
     *      ),
     *     @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *      @OA\Response(
     *          response=409,
     *          description="data exists",
     *      ),
     *     @OA\Parameter(
     *          name="email",
     *          in="query",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true
     *      )
     * )
     */
    public function register()
    {
        $data = request()->only(['email', 'password']);
        if (!array_key_exists('email', $data) || !array_key_exists('password', $data)) {
            header("HTTP/1.1 400 Bad request");
            exit("Both email and password must be defined.");
        }
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            header("HTTP/1.1 400 Bad request");
            exit("Invalid email format.");
        }
        $existingUser = User::where('email', $data['email'])->first();
        if ($existingUser) {
            header("HTTP/1.1 409 Existing data");
            exit("Existing user, choose a different email.");
        }
        $user = User::create($data);
        $hash = md5(now());
        $user->update(['hash' => $hash]);
        return response()->json([
            'id' => $user->id,
            'hash' => $hash,
        ], 201);
    }
}
