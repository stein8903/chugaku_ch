@extends("layouts.app")

@section("title","トピック検索 | 中学受験ちゃんねる")

@section("contents")
	<!--検索タイトル-->
	<div id="searchTitle">
		<div id="searchTitleInner">
			@if(!empty($search_words))
				<h1>『{{$search_words}}』の検索結果：</h1>
			@else
				<h1>検索ワードを入れてください</h1>
			@endif
		</div>
	</div>
	<!--コンテンツ-->
	<div id="contents">
		<!--コンテンツ内容-->
		@if(!empty($search_words))
			@foreach($items as $item)
			<article>
				<img id="articleImage" src="{{$item->thumnail}}">
				<div id="articleRight">
					<dl>
						<dt>2000コメント</dt>
						<dd>{{mb_substr($item->created_at, 0, 16)}}</dd>
						<div class="clear"></div>
					</dl>
					<h3><a href="detail?id={{$item->id}}">{{$item->title}}</a></h3>
				</div>
				<div class="clear"></div>
			</article>
			@endforeach
		@endif

		<!--ページング-->
		<div class="page">
			{{ $items -> appends(request()->input()) -> links() }}
		</div>
	</div>
@endsection