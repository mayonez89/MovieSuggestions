<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profiles\StoreRequest;
use App\Http\Requests\Profiles\UpdateRequest;
use App\Profile;
use App\User;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/profiles",
     *      operationId="getProjectsList",
     *      tags={"Profile *"},
     *      summary="Create profile",
     *      description="Creates a new profile",
     *     @OA\Response(
     *          response=201,
     *          description="Created"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access denied",
     *      ),
     *       @OA\Response(
     *          response=404,
     *          description="Not found",
     *      ),
     *       @OA\Response(
     *          response=400,
     *          description="Bad request",
     *      ),
     *     @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *     @OA\Response(
     *          response=409,
     *          description="Existing content",
     *      ),
     *     @OA\Parameter(
     *          name="hash",
     *          in="header",
     *          required=true,
     *          description="code received during registration/login",
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          example="Arnold",
     *          required=true
     *      ),
     *     @OA\Parameter(
     *          name="birth_date",
     *          in="query",
     *          example="2020-01-27",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="gender",
     *          in="query",
     *          example="male",
     *          required=false
     *      )
     *     )
     */
    public function store(StoreRequest $request)
    {
        $user_id = $request->get('user_id');
        if(Profile::where('user_id', $user_id)->first()!==null) abort(409);
        $profile = Profile::updateOrCreate(
            ['user_id' => $request->get('user_id')],
            array_merge($request->only(['name', 'age', 'gender', 'country_id', 'birth_date']),
                ['deleted_at' => null,],
            ),
        );
        return response()->json(['url' => route('profiles.show', $profile->id)], 201);
    }

    /**
     * @OA\Get(
     *      path="/api/profiles/{profile}",
     *      operationId="getProjectsList",
     *      tags={"Profile *"},
     *      summary="Show profile",
     *      description="Get all info about a user profile",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *      @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *     @OA\Parameter(
     *          name="hash",
     *          in="header",
     *          required=true,
     *          description="code received during registration/login",
     *      ),
     *     @OA\Parameter(
     *          name="profile",
     *          in="path",
     *          required=true,
     *          description="profile id",
     *      )
     *     )
     */
    public function show(Profile $profile)
    {
        request()->user = $profile->user()->first();
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
     *      tags={"Profile *"},
     *      summary="Update profile",
     *      description="Update the current users profile",
     *      @OA\Response(
     *          response=201,
     *          description="created"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access denied",
     *      ),
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
     *          name="hash",
     *          in="header",
     *          required=true,
     *          description="code received during registration/login",
     *      ),
     *     @OA\Parameter(
     *          name="profile",
     *          in="path",
     *          required=true,
     *          description="profile id",
     *      ),
     *     @OA\Parameter(
     *          name="name",
     *          in="query",
     *          example="Arnold2",
     *          required=false
     *      ),
     *     @OA\Parameter(
     *          name="birth_date",
     *          in="query",
     *          example="2019-03-21",
     *          required=false,
     *          @OA\Schema(
     *              type="date"
     *          )
     *      ),
     *     @OA\Parameter(
     *          name="gender",
     *          in="query",
     *          example="female",
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
     *      tags={"Profile *"},
     *      summary="delete profile",
     *      description="soft delete the profile of a current user - the account will still continue to exist.",
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access denied",
     *      ),
     *      @OA\Response(
     *          response=405,
     *          description="Method not allowed",
     *      ),
     *     @OA\Parameter(
     *          name="hash",
     *          in="header",
     *          required=true,
     *          description="code received during registration/login",
     *      ),
     *     @OA\Parameter(
     *          name="profile",
     *          in="path",
     *          required=true,
     *          description="profile id",
     *      ),
     *     )
     */
    public function destroy(Profile $profile)
    {
        request()->user = $profile->user()->first();
        if ($this->checkUser()) {
            $profile->delete();
        } else {
            abort(403, "Access denied.");
        }
    }

    /**
     * @OA\Put(
     *      path="/api/update-password",
     *      operationId="getProjectsList",
     *      tags={"User actions"},
     *      summary="change password",
     *      description="updates the password of the user logged in",
     *       @OA\Response(
     *          response=200,
     *          description="Updated"
     *       ),
     *      @OA\Response(
     *          response=403,
     *          description="Access denied",
     *      ),
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
         *          name="hash",
         *          in="header",
         *          required=true,
         *          description="code received during registration/login",
         *      ),
     *     @OA\Parameter(
     *          name="new-password",
     *          in="query",
     *          required=true,
     *          description="new password * requires hash code of a profile in the header"
     *      ),
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
