@extends("layouts.app")

@section("title","入力確認画面 | 中学受験ちゃんねる")

@section("body_class","confirm")

@section("contents")
	<!--トピック投稿-->
	<div id="insertTopic">
		<div id="insertTitle">
			<div class="pinkLine"></div>
			<h3>入力確認</h3>
		</div>
<?php
if (isset($items)) {
	var_dump($items);
}

echo "<br>";
echo "<br>";
$hoge_hoge = [
	"id"=>"hoge",
	"title"=>"title_hoge",
	"body"=>"body_hoge"
];
var_dump($hoge_hoge);
?>
		<div id="insertInner">
			<form action="{{url('')}}/upload" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<p>タイトル</p>
				<input type="text" name="title" placeholder="必須入力" maxlength="50" value="{{$items['title']}}">
				@if($errors->has("title"))
					{{$errors->first("title")}}
				@endif
				
				<p>名前</p>
				<input type="text" name="user_name" placeholder="空白でもOK" maxlength="10" value="{{$items['user_name']}}">
				@if($errors->has("user_name"))
					{{$errors->first("user_name")}}
				@endif
				
				<p>本文</p>
				@if($errors->has("body"))
					{{$errors->first("body")}}
				@endif
				<textarea name="body" placeholder="必須入力">{{ $items['body'] }}</textarea>

				<p>画像アップロード（1Mbまで可）</p>
				<img src="{{ $items['thumnail'] }}">
				<input type="text" name="thumnail" value="{{ $items['thumnail'] }}">

				<!-- <p class="checkbox"><input type="checkbox" value="1" class="checkbox" name="check">IDを表示する</p> -->
				
				<p>トピック画像の添付をお願いします</p>
				<div id="explain">トピックを投稿いただく際には、トピック内容に合った画像をアップロードいただくか、画像のURLを本文に入力してくださいませ。その画像がトピックのトップ画像（サムネイル）として表示されます。</div>
				<input type="submit" value="トピックを投稿する" class="submit">
			</form>
		</div>
	</div>
@endsection