<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    // states
    CONST NEW_STATE = 'new';
    CONST ACCEPTED_STATE = "accepted";
    CONST REJECTED_STATE = "rejected";
    CONST BLOCKED_STATE = "blocked";

    CONST STATES = [
        self::NEW_STATE,
        self::ACCEPTED_STATE,
        self::REJECTED_STATE,
        self::BLOCKED_STATE,
    ];
    // states

    protected $guarded = [];

    public $timestamps = false;
}
