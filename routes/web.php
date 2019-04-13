<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "TopicController@index");
Route::get('/new', "TopicController@new");

//検索
Route::get("/search", "TopicController@search");

//メール送信
Route::get("/add_contact", function(){
	return view("chugaku.adcontact");
});
Route::post("/mail", "ContactController@mail");

//静的ページ
Route::get("/contact", function(){
	return view("chugaku.contact");
});
Route::get("/agreement", function(){
	return view("chugaku.agreement");
});

//投稿
Route::get('/add', "TopicController@add");

Route::post('/confirm', "TopicController@comfirm");

Route::post('/upload', "TopicController@upload");



Route::get("/detail", "TopicController@detail");
Route::post("/detail", "TopicController@detail");

Route::post("/comment_confirm", "CommentController@add");
Route::post("/comment_upload", "CommentController@upload");



