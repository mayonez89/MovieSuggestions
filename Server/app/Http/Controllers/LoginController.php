<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login()
    {
        return response()->json([
            'Fields' => 'required fields',
        ]);
    }

    public function loginAction()
    {
        return response()->json([
            'Required' => [
                'email' => 'string|unique|email',
                'password' => 'string',
            ]
        ]);
    }

    public function logoutAction()
    {
        return response()->json([
            'logout' => 'successful',
        ]);
    }
}
