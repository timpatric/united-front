<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $table = 'members';
    // protected $fillable=['member_name','gender','rec_name','district',"reg_date"];
    
    protected $guarded = [];
}
