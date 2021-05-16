<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Genre",
 *     description="Genre model",
 *     @OA\Xml(
 *         name="Genre"
 *     )
 * )
 */


class Genre extends SirenModel
{
      /**
     * @OA\Property(
     *     property="id",
     *     description="ID of genre",
     *     example="1"
     * )
     *
     * @var integer
     */
    /**
     * @OA\Property(
     *     property="name",
     *     description="Genre category",
     *     example="Crime"
     * )
     *
     * @var string
     */

    protected $guarded = [];

    public $timestamps = false;

    // many to many
    public function contents()
    {
        return $this->belongsToMany(Content::class, 'content_genres', 'genre_id', 'content_id');
    }

    public function profiles()
    {
        return $this->belongsToMany(Profile::class, 'profile_genres', 'genre_id', 'profiles_id');
    }

    /** return the array of implemented CRUD actions */
    public static function getCRUD() {
        return [
            self::M_INDEX,
            self::M_SHOW,
            self::M_STORE,
            self::M_DESTROY,
            self::M_UPDATE,
        ];
    }


    public function getParents()
    {
        return ['contents'];
    }
}
