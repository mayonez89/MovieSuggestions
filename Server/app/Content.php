<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // many-to-many
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'content_genres', 'content_id', 'genre_id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function userRating(User $user)
    {
        return $this->ratings()->where('user_id', $user->id);
    }

    public function favoriting()
    {
        return $this->belongsToMany(User::class, 'favorite_movies', 'content_id', 'user_id');
    }
}
