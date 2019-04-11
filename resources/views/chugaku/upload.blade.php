@extends("layouts.app")

@section("title","入力確認画面 | 中学受験ちゃんねる")

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
			アップロード完了しました！
		</div>
	</div>
@endsection