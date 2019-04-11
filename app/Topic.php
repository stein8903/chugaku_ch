<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $guarded = array("id");
	
    public static $rules = [
    	"title"=>"required",
    	"user_name"=>"required",
    	"body"=>"required",
    ];
}
