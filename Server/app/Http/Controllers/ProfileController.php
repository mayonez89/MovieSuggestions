<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\StoreRequest;
use App\Http\Requests\Profiles\UpdateRequest;
use App\Profile;
use App\User;

class ProfileController extends Controller
{

    public function store(StoreRequest $request)
    {
        $profile = Profile::updateOrCreate(
            ['user_id' => $request->get('user_id')],
            array_merge($request->only(['name', 'age', 'gender', 'country_id']),
                ['deleted_at' => null,],
            ),
        );
        return route('profiles.show', $profile->id);
    }

    public function show(Profile $profile)
    {
        if ($this->checkUser()) {
            $object = Profile::getSirenEntity($profile);
            $this->appendUserActions($object);
            return $object->__toString();
        }
    }

    public function update(Profile $profile, UpdateRequest $request)
    {
        request()->user = $profile->user()->first();
        if ($this->checkUser()) {
            $profile->update($request->only(['name', 'age', 'gender', 'country_id']));
        }
    }

    public function destroy(Profile $profile)
    {
        request()->user = $profile->user()->first();
        if ($this->checkUser()) {
            $profile->delete();
        }
    }

    public function updatePassword()
    {
        $param = "new-password";
        $newPassword = request()->get($param);
        if(empty($newPassword)) {
            abort(400, "HTTP/1.1 400 Missing parameter: " . $param);
        }

        User::where('id', request()->get('user_id'))->update(['password' => $newPassword]);
    }
}
