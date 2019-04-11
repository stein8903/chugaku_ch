<html>
<head>
	<meta charset="utf-8">
	<title>@yield("title")</title>
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
		<div id="headerInner" class="clearfix">
			<div id="headerLeft">
				<a href="{{url('')}}"><img src="images/logo.png"></a>
			</div>
			<div id="headerRight">
				<form method="get" action="{{url('')}}/search" name="search_form">
					<ul class="clearfix">
						<li><input type="text" name="search" id="search"></li>
						<li onclick="search_form.submit();"><img src="images/search_btn.png"></li>
					</ul>
				</form>
			</div>
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
		<ul class="clearfix">
			<li><a href="{{url('/')}}"><img src="images/ninki_topic.png"></a></li>
			<li><a href="{{url('/')}}/new"><img src="images/sinchaku_topic.png"></a></li>
		</ul>
	</div>

	<!--コンテンツ-->
	@yield("contents")

	<!--フッダー-->
	<footer>
		<div id="toTop" class="clearfix">
			<a href="##">ページトップへ</a>
		</div>

		<div id="footer">
			<div id="footerInner">
				<img src="images/logo.png">
				<ul class="clearfix">
					<li><a href="http://www.yahoo.co.jp/" target="_blank">運営会社</a></li>
					<li><a href="contact">お問い合わせ</a></li>
					<li><a href="add_contact">広告掲載</a></li>
					<li class="last"><a href="agreement">利用規約</a></li>
				</ul>
			</div>
		</div>
	</footer>
</body>
</html>