<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
