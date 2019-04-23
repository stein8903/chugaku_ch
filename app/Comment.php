<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = array("id");

    public function comment_like(){
    	return $this->hasMany("App\Comment_like");
    }
}
