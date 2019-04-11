<html>
<head>
	<meta charset="utf-8">
	<title>中学受験ちゃんねる</title>
	<link rel="shortcut icon" href="images/icon.ico">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="reset.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	<script>
		$(function(){
			$("#toTop").click(function(){
				$("html,body").animate({
					scrollTop:0
				},400);
			});
		});
	</script>
</head>
<body>
	<!--ヘッダー-->
	<div id="header">
		<div id="headerInner">
			<div id="headerLeft">
				<a href="index.php"><img src="images/logo.png"></a>
			</div>
			<div id="headerRight">
				<form method="get" action="search.php" name="search_form">
					<ul>
						<li><input type="text" name="search" id="search"></li>
						<li onclick="search_form.submit();"><img src="images/search_btn.png"></li>
						<div class="clear"></div>
					</ul>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<!--キャッチコピー-->
	<div id="Ccopy">
		<div id="cCopyInner">
			<h1>志望校合格に向けてママ達で毎日情報交換♪</h1>
		</div>
	</div>

	<!--トピックス-->
	<div id="topics">
		<div id="topicsLeft">
			<ul>
				<li><a href="index.php"><img src="images/ninki_selected.png"></a></li>
				<li><a href="new.php"><img src="images/sinchaku_topic.png"></a></li>
				<div class="clear"></div>
			</ul>
		</div>
		<div id="topicsRight">
			<p><a href="insert.php"><img src="images/insert_btn.png"></a></p>
		</div>
		<div class="clear"></div>
	</div>

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
			<img id="articleImage" src="files/">
			<div id="articleRight">>
				<img src="images/no1.png">
				<dl>
					<dt>1コメント</dt>
					<dd>{{$item->created_at}}</dd>
					<div class="clear"></div>
				</dl>
				<h3><a href="detail.php?id=1">{{$item->title}}</a></h3>
			</div>
			<div class="clear"></div>
		</article>
		@endforeach

		<!--ページング-->
		<div id="pages">
			<a href="index.php?page=1">1</a>
			<a href="index.php?page=2">2</a>
			<a href="index.php?page=3">3</a>
		</div>
		<!--トピックライン-->
		<dl id="topic_line">
			<a href="##"><dt>人気トピック</dt></a>
			<a href=""><dd>前のトピック</dd></a>
			<div class="clear"></div>
		</dl>
	</div>

	<!--フッダー-->
	<div id="toTop">
		<a href="##">ページトップへ</a>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<div id="footerInner">
			<img src="images/logo.png">
			<ul>
				<li><a href="http://www.yahoo.co.jp/">運営会社</a></li>
				<li><a href="contact.html">お問い合わせ</a></li>
				<li><a href="adcontact.php">広告掲載</a></li>
				<li class="last"><a href="agreement.html">利用規約</a></li>
				<div class="clear"></div>
			</ul>
		</div>
	</div>
</body>
</html>