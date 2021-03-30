<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $guarded = [];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name', 'year']
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
