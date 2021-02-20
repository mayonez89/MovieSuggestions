<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    // by default, the primary key is the column `id`, which is and unsigned integer and is auto-incrementing
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';

    public function profiles()
    {
        $this->hasMany(Profile::class, 'country_id	', 'code');
    }
}
