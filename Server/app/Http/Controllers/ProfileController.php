<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\StoreRequest;
use App\Http\Requests\Profiles\UpdateRequest;
use App\Profile;
use App\User;

class ProfileController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/profiles",
     *      operationId="getProjectsList",
     *      tags={"Profile"},
     *      summary="Create profile",
     *      description="Creates a new profile",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="birth_date",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="gender",
     *          in="query",
     *          required=false
     *      )
     *     )
     */
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

    /**
     * @OA\Get(
     *      path="/api/profiles/{profile}",
     *      operationId="getProjectsList",
     *      tags={"Profile"},
     *      summary="Show profile",
     *      description="Get all info about a user profile",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *     @OA\Parameter(
     *          name="profile",
     *          in="path",
     *          required=true
     *      )
     *     )
     */
    public function show(Profile $profile)
    {
        if ($this->checkUser()) {
            $object = Profile::getSirenEntity($profile);
            $this->appendUserActions($object);
            return $object->__toString();
        }
    }

    /**
     * @OA\Put(
     *      path="/api/profiles/{profile}",
     *      operationId="getProjectsList",
     *      tags={"Profile"},
     *      summary="Update profile",
     *      description="Update the current users profile",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *     @OA\Parameter(
     *          name="profile",
     *          in="path",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="birth_date",
     *          in="query",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="gender",
     *          in="query",
     *          required=false
     *      )
     *     )
     */
    public function update(Profile $profile, UpdateRequest $request)
    {
        request()->user = $profile->user()->first();
        if ($this->checkUser()) {
            $profile->update($request->only(['name', 'age', 'gender', 'country_id']));
        }
    }

    /**
     * @OA\Delete(
     *      path="/api/profiles/{profile}",
     *      operationId="getProjectsList",
     *      tags={"Profile"},
     *      summary="delete profile",
     *      description="soft delete the profile of a current user - the account will still continue to exist.",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       )
     *     )
     */
    public function destroy(Profile $profile)
    {
        request()->user = $profile->user()->first();
        if ($this->checkUser()) {
            $profile->delete();
        }
    }

    /**
     * @OA\Post(
     *      path="/api/update-password",
     *      operationId="getProjectsList",
     *      tags={"User actions"},
     *      summary="change password",
     *      description="updates the password of the user logged in",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Missing parameter: new-password"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     @OA\Parameter(
     *          name="new-password",
     *          in="query",
     *          required=true
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
     *     )
     */
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
