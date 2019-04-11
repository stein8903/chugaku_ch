@extends("layouts.app")

@section("title","トピックを投稿する | 中学受験ちゃんねる")

@section("contents")
	<!--トピック投稿-->
	<div id="insertTopic">
		<div id="insertTitle">
			<div class="pinkLine"></div>
			<h3>トピックを投稿する</h3>
		</div>
<?php
if (isset($items)) {
	var_dump($items);
}
?>
		<div id="insertInner">
			<form action="{{action('TopicController@comfirm')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				
				<p>タイトル</p>
				<input type="text" name="title" placeholder="必須入力" maxlength="50" value="{{old('title')}}">
				@if($errors->has("title"))
					{{$errors->first("title")}}
				@endif
				
				<p>名前</p>
				<input type="text" name="user_name" placeholder="空白でもOK" maxlength="10" value="{{old('user_name')}}">
				@if($errors->has("user_name"))
					{{$errors->first("user_name")}}
				@endif
				
				<p>本文</p>
				@if($errors->has("body"))
					{{$errors->first("body")}}
				@endif
				<textarea name="body" placeholder="必須入力">{{old('body')}}</textarea>

				<p>画像アップロード（1Mbまで可）</p>
				<input type="file" name="thumnail">

				<!-- <p class="checkbox"><input type="checkbox" value="1" class="checkbox" name="check">IDを表示する</p> -->

				<p>トピック画像の添付をお願いします</p>
				<div id="explain">トピックを投稿いただく際には、トピック内容に合った画像をアップロードいただくか、画像のURLを本文に入力してくださいませ。その画像がトピックのトップ画像（サムネイル）として表示されます。</div>
				<input type="submit" value="トピックを投稿する" class="submit">
			</form>
		</div>
	</div>
@endsection