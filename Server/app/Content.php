<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes, Sluggable;

    // search options
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
}
