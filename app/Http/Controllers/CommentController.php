<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function add(Request $req){
    	$comment = new Comment;
    	// $comment->fill();
    	return view("chugaku.detail",["item"=>9]);
    }
}
