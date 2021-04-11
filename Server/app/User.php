<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hash',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function comments()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Content::class,'favorite_movies', 'user_id', 'content_id');
    }

    public function friendships($states = [Friend::ACCEPTED_STATE])
    {
        $retVal = new Collection();
        foreach(Friend::TYPES as $friendshipType)
        {
            $$friendshipType = $this->hasMany(Friend::class, $friendshipType, 'user_id');

            if(is_array($states) && !empty($states))
                $$friendshipType = $$friendshipType->whereIn('status', $states);

            $retVal = $retVal->merge($$friendshipType->get());
        }
        return $retVal;
//        $self_started = $this->hasMany(Friend::class, 'requester', 'user_id');
//        $got_invited = $this->hasMany(Friend::class, 'requested', 'user_id');
//
//        if(is_array($states) && !empty($states))
//        {
//            $self_started = $self_started->whereIn('status', $states);
//            $got_invited = $got_invited->whereIn('status', $states);
//        }
//
//        return $self_started->get()->merge($got_invited->get())->all();
    }
}
