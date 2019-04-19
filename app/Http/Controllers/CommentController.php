<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function add(Request $req){
    	$thum_name = uniqid("THUM_") . "." . $req->file('thumbnail')->guessExtension(); // TMPファイル名
        $req->file('thumbnail')->move(public_path() . "/img/tmp", $thum_name);
        $thum = "img/tmp/".$thum_name;
        if (empty($req->user_name)) {
            $req->user_name = "匿名";
        }
        $hash = array(
        	"topic_id"=>$req->topic_id,
            "user_name"=>$req->user_name,
            "body"=>$req->body,
            "thumbnail"=>$thum
        );
    	return view("chugaku.comment_confirm",["items"=>$hash]);
    }

    public function upload(Request $req){

        // 一時保存から本番の格納場所へ移動
        $new_dr = public_path() . "/img/thum/" . pathinfo($req->thumbnail, PATHINFO_BASENAME);
        rename(public_path("/") . $req->thumbnail, $new_dr);

        $new_dr_02 = "img/thum/" . pathinfo($req->thumbnail, PATHINFO_BASENAME);

        $topic = new Comment;
        $topic->fill(["topic_id"=>$req->topic_id,"user_name"=>$req->user_name,"body"=>$req->body,"thumbnail"=>$new_dr_02])->save();


        return view("chugaku.comment_upload");
    }
}
