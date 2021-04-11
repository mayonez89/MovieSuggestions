<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Genre extends SirenModel
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
