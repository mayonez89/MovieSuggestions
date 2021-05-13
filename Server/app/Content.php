<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *     title="Content",
 *     description="Content model, used only for movies for now.",
 *     @OA\Xml(
 *         name="Content"
 *     )
 * )
 */
class Content extends SirenModel
{
    use SoftDeletes, Sluggable;

    // search options; to be expanded
    CONST TITLE = 'title';
    CONST GENRE = 'genre';
    CONST SEARCH_PARAMS = [
        self::TITLE,
    ];
    // search options

    /**
     * @OA\Property(
     *     property="slug",
     *     description="ID of a movie, represents the slugified title",
     *     example="infinity-wars"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="title",
     *     description="The name of the movie",
     *     example="Inception"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="trailer_url",
     *     description="URL to the trailer, optional",
     *     example="https://www.youtube.com/watch?v=6ZfuNTqbHE8"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="description",
     *     description="Description of the content, optional",
     *     example="A team of explorers travel through a wormhole in space in an attempt to ensure humanity's survival."
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="director",
     *     description="Name of the director, optional",
     *     example="Steven Spilberg"
     * )
     *
     * @var string
     */
    /**
     * @OA\Property(
     *     property="release_date",
     *     description="The year when the content was officially released, optional",
     *     format="YYYY",
     *     example="2020"
     * )
     *
     * @var int
     */


    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['title',
//                    'release_date',
                    ]
            ]
        ];
    }

    // by default, the primary key is the column `id`, which is and unsigned integer and is auto-incrementing
    protected $primaryKey = 'slug';
    public $incrementing = false;
    protected $keyType = 'string';

//    public function comments()
//    {
//        return $this->hasMany(Comment::class, 'content_id');
//    }

    // many-to-many
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'content_genres', 'content_id', 'genre_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'content_id');
    }

    public function userRating(User $user)
    {
        return $this->ratings()->where('user_id', $user->id);
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_movies', 'content_id', 'user_id');
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
}
