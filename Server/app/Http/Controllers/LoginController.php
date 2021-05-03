<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
        $user = User::where('email', request()->get('email'))->where('password', request()->get('password'))->first();
        $hash = md5(now());
        $user->update(['hash' => $hash]);
        return response()->json([
            'hash' => $hash,
        ]);
    }

    public function logout()
    {
        User::where('hash', request()->header("hash"))->update(['hash' => null]);
    }

    public function test(Request $request)
    {
        return $request->get('user_id');
    }
}
