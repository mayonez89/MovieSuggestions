<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\StoreRequest;
use App\Http\Requests\Profiles\UpdateRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(StoreRequest $request)
    {
        Profile::create($request->only(['name', 'age', 'gender', 'country_id']));
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

    public function update(UpdateRequest $request)
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }

    public function destroy()
    {
        return redirect()->json([
            'action' => __FUNCTION__,
        ]);
    }
}
