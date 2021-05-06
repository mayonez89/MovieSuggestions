<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends SirenModel
{
    use SoftDeletes;

    protected $guarded = [];

    public $timestamps = false;

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
