<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use Illuminate\Support\Facades\DB;

class TopicController extends Controller
{
    public function index(){
        $items = Topic::orderByRaw("cast(created_at as date) desc")->orderBy("likes","desc")->paginate(6);
    	return view("chugaku.index",["items"=>$items]);
    }

    public function new(){
        $items = Topic::orderBy("created_at","desc")->paginate(5);
        return view("chugaku.new",["items"=>$items]);
    }
    //検索
    public function search(Request $req){
    	$items = Topic::where('title',"LIKE","%".$req->search."%")->get();
    	return view("chugaku.search",["items"=>$items,"search_words"=>$req->search]);
    }







    public function detail(Request $req){
        $item = Topic::find($req->id);
        $comments = DB::table("comments")->where("topic_id",$req->id)->paginate(3);
        $topic_likes["likes"] = DB::table("topic_likes")->where("topic_id",$req->id)->where("likes",true)->count();
        $topic_likes["dislikes"] = DB::table("topic_likes")->where("topic_id",$req->id)->where("dislikes",true)->count();
        
        if (isset($_POST["topic_like"])) {
            
            $ip = DB::table("topic_likes")->where("topic_id",$req->id)->where("likes",true)->where("ip",$_SERVER["REMOTE_ADDR"])->count();
            if ($ip > 0) {
                echo "<script>alert('すでにいいねを押しています！');</script>";
            }else{
                $param = [
                    "topic_id"=>$req->id,
                    "ip"=>$_SERVER["REMOTE_ADDR"],
                    "likes"=>true,
                    "dislikes"=>false,
                    "date_time"=>date("Y-m-d H:i:s"),
                ];
                DB::table("topic_likes")->insert($param);
            }

        }else if(isset($_POST["topic_dislike"])){
            $ip = DB::table("topic_likes")->where("topic_id",$req->id)->where("dislikes",true)->where("ip",$_SERVER["REMOTE_ADDR"])->count();
            if ($ip > 0) {
                echo "<script>alert('すでにいいねを押しています！');</script>";
            }else{
                $param = [
                    "topic_id"=>$req->id,
                    "ip"=>$_SERVER["REMOTE_ADDR"],
                    "likes"=>false,
                    "dislikes"=>true,
                    "date_time"=>date("Y-m-d H:i:s"),
                ];
                DB::table("topic_likes")->insert($param);
            }
        }

        return view("chugaku.detail",["item"=>$item,"id"=>$req->id,"comments"=>$comments,"topic_likes"=>$topic_likes]);
    }











    //投稿
    public function add(){
    	return view("chugaku.add");
    }

    public function comfirm(Request $req){
        
        $thum_name = uniqid("THUM_") . "." . $req->file('thumnail')->guessExtension(); // TMPファイル名
        $req->file('thumnail')->move(public_path() . "/img/tmp", $thum_name);
        $thum = "img/tmp/".$thum_name;

        $hash = array(
            "title"=>$req->title,
            "user_name"=>$req->user_name,
            "body"=>$req->body,
            "thumnail"=>$thum
        );
         
        return view('chugaku.confirm',["items"=>$hash]);
    }

    public function upload(Request $req){

        // 一時保存から本番の格納場所へ移動
        $new_dr = public_path() . "/img/thum/" . pathinfo($req->thumnail, PATHINFO_BASENAME);
        rename(public_path("/") . $req->thumnail, $new_dr);

        $new_dr_02 = "img/thum/" . pathinfo($req->thumnail, PATHINFO_BASENAME);

        $topic = new Topic;
        $topic->fill(['title'=>$req->title,"user_name"=>$req->user_name,"body"=>$req->body,"thumnail"=>$new_dr_02,"likes"=>0,"dislikes"=>0,"count_comments"=>0])->save();


        return view("chugaku.upload");
    }






    public function create(Request $request){
    	
        $this->validate($request, Topic::$rules);

    	$topic = new Topic;
    	// $form = $request->all();
    	// unset($form["_unset"]);

    	$topic->fill(['title'=>$request->title,"user_name"=>$request->user_name,"body"=>$request->body,"thumnail"=>$request->thumnail,"likes"=>0,"dislikes"=>0,"count_comments"=>0,"created_at"=>time(),"updated_at"=>time()])->save();

        // $topic->title = $request->title;
        // $topic->user_name = $request->user_name;
        // $topic->body = $request->body;
        // $topic->thumnail = $request->thumnail;
        // $topic->likes = 0;
        // $topic->dislikes = 0;
        // $topic->count_comments = 0;
        // $topic->save();

        
    	return redirect("/");
    }
}
