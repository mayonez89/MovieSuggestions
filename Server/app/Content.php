<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Content extends Model
{
    use SoftDeletes;

    // search options
    CONST TITLE = 'title';
    CONST GENRE = 'genre';
    CONST SEARCH_PARAMS = [
        self::TITLE,
    ];
    // search options

    protected $guarded = [];
}
