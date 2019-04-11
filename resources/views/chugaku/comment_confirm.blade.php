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
?>
		<div id="insertInner">
			<form action="{{url('')}}/comment_upload" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<input type="hidden" name="topic_id" value="{{ $items['topic_id'] }}">

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
				<img src="{{ $items['thumbnail'] }}">
				<input type="text" name="thumbnail" value="{{ $items['thumbnail'] }}">

				<!-- <p class="checkbox"><input type="checkbox" value="1" class="checkbox" name="check">IDを表示する</p> -->
				
				<input type="submit" value="コメントを投稿する" class="submit">
			</form>
		</div>
	</div>
@endsection