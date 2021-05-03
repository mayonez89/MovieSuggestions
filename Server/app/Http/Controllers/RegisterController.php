<?php

namespace App\Http\Controllers;

use App\User;

class RegisterController extends Controller
{
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
            header("HTTP/1.1 400 Bad request");
            exit("Existing user, choose a different email.");
        }
        $user = User::create($data);
    }
}
