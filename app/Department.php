<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //

    public function employees() {
    	$this->hasMany('App\Department');
    }
}
