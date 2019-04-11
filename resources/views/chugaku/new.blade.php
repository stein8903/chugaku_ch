@extends("layouts.app")
@section("title","新着トピック | 中学受験ちゃんねる")

@section("contents")
	<!--コンテンツ-->
	<div id="contents">
		<!--トピックライン-->
		<dl id="topic_line">
			<a href="##"><dt>人気トピック</dt></a>
			<a href="##"><dd>前のトピック</dd></a>
			<div class="clear"></div>
		</dl>
		
		<!--コンテンツ内容-->
		@foreach($items as $item)
		<article>
			<img id="articleImage" src="{{$item->thumnail}}">
			<div id="articleRight">
				<img src="images/no1.png">
				<dl>
					<dt>9コメント</dt>
					<dd>{{mb_substr($item->created_at, 0, 16)}}</dd>
					<div class="clear"></div>
				</dl>
				<h3><a href="detail.php?id=1">{{$item->title}}</a></h3>
			</div>
			<div class="clear"></div>
		</article>
		@endforeach

		<!--ページング-->
		<div class="page">
			{{$items->links()}}
		</div>
		
		<!--トピックライン-->
		<dl id="topic_line">
			<a href="##"><dt>人気トピック</dt></a>
			<a href=""><dd>前のトピック</dd></a>
			<div class="clear"></div>
		</dl>
	</div>
@endsection