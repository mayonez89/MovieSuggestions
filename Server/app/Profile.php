<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @OA\Schema(
 *     title="Profile",
 *     description="Profile model",
 *     @OA\Xml(
 *         name="Profile"
 *     )
 * )
 */
class Profile extends SirenModel
{
    use SoftDeletes;

    protected $guarded = [];

    public $timestamps = false;

    /**
     * @OA\Property(
     *     property="id",
     *     description="ID of profile",
     *     example="1"
     * )
     *
     * @var integer
     */
    /**
     * @OA\Property(
     *     property="name",
     *     description="Name of the user",
     *     example="Arnold Ujhazi"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="birth_date",
     *     description="Birth date of a profile",
     *     format="YYYY",
     *     example="1989"
     * )
     *
     * @var integer
     */
    /**
     * @OA\Property(
     *     property="gender",
     *     description="Gender of a user, optional",
     *     example="male"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="country_id",
     *     description="Country of the user, optional",
     *     example="FI"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="user_id",
     *     description="ID of the user who owns the profile",
     *     example="1"
     * )
     *
     * @var integer
     */

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'profile_genres', 'profile_id', 'genre_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    protected static function getCRUD()
    {
        return [
            self::M_SHOW,
            self::M_STORE,
            self::M_DESTROY,
            self::M_UPDATE,
        ];
    }
}
