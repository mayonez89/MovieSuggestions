<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
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
}
