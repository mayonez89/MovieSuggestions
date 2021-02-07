<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function store()
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function show(User $profile)
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function edit(User $profile)
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function update(User $profile, Request $request)
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function delete(User $profile)
    {
        return response()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function destroy(User $profile, Request $request)
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }
}
