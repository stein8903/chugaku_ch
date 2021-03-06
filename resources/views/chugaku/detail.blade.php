@extends("layouts.app")

@section("title","$item->title | 中学受験ちゃんねる")

@section("contents")

	<!--トピック投稿-->
	<div id="detailContents">
		<div id="contentHeader">
			<div class="pinkLine"></div>
			<div id="headerInner">
				
					<img src="{{$item->thumnail}}">
					<div id="headerRight">
						<h1>{{$item->title}}</h1>
						<ul>
							<li>{{$item->count_comments}}コメント</li>
							<li>{{mb_substr($item->created_at, 0, 16)}}</li>
							<div class="clear"></div>
						</ul>
					</div>
				
				<div class="clear"></div>
			</div>
		</div>
		<div id="detailInner">
			<!--投稿者のコメント-->
			<article>
				<p>1. 名前　2019.03.16</p>
				<div id="body">
					 {{$item->body}}
				</div>
				<div id="topic_image">
						<img src="{{$item->thumnail}}" style="width:400px; height:auto; max-width: 100%;">
				</div>
				<ul>
					<form method="post" name="main_like_form">
						{{ csrf_field() }}
						<input type="hidden" name="topic_like" value="">
					</form>
					<form method="post" name="main_dislike_form">
						{{ csrf_field() }}
						<input type="hidden" name="topic_dislike" value="">
					</form>
					<li class="plus" onclick="main_like_form.submit();">+{{ $topic_likes["likes"] }}</li>
					<li><img src="images/"></li>
					<li class="minus" onclick="main_dislike_form.submit();">-{{ $topic_likes["dislikes"] }}</li>
					<div class="clear"></div>
				</ul>
			</article>

			<!--トピックに対するコメント-->
			@foreach($comments as $value)
				<article>
					<p>2. {{ $value->user_name }}　{{ mb_substr($value->created_at, 0, 16) }}</p>
					<div id="body">
						{{ $value->body }}
					</div>ID：{{$value->id}}
					
						<div id="topic_image">
							@if(isset($value->thumbnail))
								<img src="{{ $value->thumbnail }}">
							@endif
						</div>
					
					<ul>
						<form method="post" name="comment_like_form{{ $value->id }}">
							{{ csrf_field() }}
							<input type="hidden" name="comment_like" value="{{ $value->id }}">
						</form>
						<form method="post" name="comment_dislike_form{{ $value->id }}">
							{{ csrf_field() }}
							<input type="hidden" name="comment_dislike" value="{{ $value->id }}">
						</form>
						<li class="plus" onclick="comment_like_form{{ $value->id }}.submit();">+{{ $value->comment_like()->where("likes",true)->count() }}</li>
						<li><img src="images/"></li>
						<li class="minus" onclick="comment_dislike_form{{ $value->id }}.submit();">-{{ $value->comment_like()->where("dislikes",true)->count() }}</li>
						<div class="clear"></div>
					</ul>
				</article>
			@endforeach

			<div class="page">
				{{ $comments -> appends(request()->input()) -> links() }}
			</div>

			<div id="postBox">
				<form action="comment_confirm" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="topic_id" value="{{$id}}">
					<h4>コメントを投稿する</h4>
					<p>名前</p>
					<input type="text" name="user_name" placeholder="空白でもOK">
					<p>本文</p>
					<textarea placeholder="必須入力" name="body"></textarea>
					<p>写真アップロード（1MBまで可）</p>
					<input type="file" name="thumbnail">
					<!-- <p class="checkbox"><input type="checkbox" value="1" class="checkbox" name="check">IDを表示する（なりすましが防止できます）</p> -->
					<input type="submit" value="投稿" class="submit">
				</form>
			</div>

		</div>
	</div>

	<div id="toTopPageWrap">
		<div id="toTopPage">
			<a href="index.php">トップページに戻る</a>
		</div>
	</div>

	<!--トピック-->
	<div id="related_topic">
		<div id="related_bar">
			<p>関連トピック</p>
		</div>
		<div id="relatedInner">
			@foreach($rel_topics as $item)
				<article>
					<img src="{{$item->thumnail}}">
					<div id="articleRight">
						<dl>
							<dt>2コメント</dt>
							<dd>{{ mb_substr($item->created_at,0,16) }}</dd>
							<div class="clear"></div>
						</dl>
						<h4><a href="detail?id={{$item->id}}">{{ $item->title }}</a></h4>
					</div>
					<div class="clear"></div>
				</article>
			@endforeach
		</div>
	</div>
	
	<!--サイドバー-->
	<div id="star_topic">
		<div id="related_bar">
			<p>人気トピック</p>
		</div>
		<div id="relatedInner">
			@foreach($pop_topics as $item)
				<article>
					<img src="{{$item->thumnail}}">
					<div id="articleRight">
						<dl>
							<dt>2コメント</dt>
							<dd>{{ mb_substr($item->created_at,0,16) }}</dd>
							<div class="clear"></div>
						</dl>
						<h4><a href="detail?id={{$item->id}}">{{ $item->title }}</a></h4>
					</div>
					<div class="clear"></div>
				</article>
			@endforeach
		</div>
	</div>

	<div id="new_topic">
		<div id="related_bar">
			<p>新着トピック</p>
		</div>
		<div id="relatedInner">
			@foreach($new_topics as $item)
				<article>
					<img src="{{$item->thumnail}}">
					<div id="articleRight">
						<dl>
							<dt>コメント</dt>
							<dd>{{ mb_substr($item->created_at,0,16) }}</dd>
							<div class="clear"></div>
						</dl>
						<h4><a href="detail?id={{$item->id}}">{{ $item->title }}</a></h4>
					</div>
					<div class="clear"></div>
				</article>
			@endforeach
		</div>
	</div><!--サイドバー-->
@endsection