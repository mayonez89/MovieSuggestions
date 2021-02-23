<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $guarded = [];

    const MAXIMUM = 5;
    const STEP = 1;
    const AVERAGE_IN_DECIMAL = true;

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id', 'slug');
    }
}
