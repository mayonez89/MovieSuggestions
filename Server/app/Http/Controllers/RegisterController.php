<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register() {
        return response()->json([
            'Fields' => 'required fields',
        ]);
    }

    public function registerAction(Request $request) {
        return response()->json([
            'Required' => [
                'email' => 'string|unique|email',
                'password' => 'string',
            ]
        ]);
    }
}
