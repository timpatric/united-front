<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treasury extends Model
{
    protected $table = 'treasuries';

    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
