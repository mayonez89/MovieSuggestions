<?php

namespace App;

class Profile extends User
{
    protected $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'profile_genres', 'profile_id', 'genre_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}