<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    public $timestamps = false;
	protected $table = 'agents';

    protected $guarded = [];
}
