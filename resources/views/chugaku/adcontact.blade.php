@extends("layouts.app")

@section("title","広告掲載 | 中学受験ちゃんねる")

@section("contents")
	<div id="insertTopic">
		<div id="insertTitle">
			<div class="pinkLine"></div>
			<h3>広告のお問い合わせ</h3>
		</div>
		<div id="insertInner">
			<div id="ad">
				<form method="post" action="{{url('')}}/mail">
					{{ csrf_field() }}
					<h3>ガールズちゃんねるへの広告掲載のお問い合わせ、媒体資料のご請求などは下記より頂戴できますと幸いです。</h3>
					<!-- <div id="input">
						<p>お問い合わせの概要</p>
						<input class="check" type="checkbox" name="reason" value="広告を掲載したい" checked="checked">広告を掲載したい<br>
						<input class="check" type="checkbox" name="reason" value="資料を送ってほしい">資料を送ってほしい<br>
						<input class="check" type="checkbox" name="reason" value="その他">その他（問い合わせ内容に詳細をご記入ください）
					</div> -->
					<div id="input">
						<p>会社名</p>
						<input type="text" name="name">
					</div>
					<!-- <div id="input">
						<p>会社ウェブサイトURL</p>
						<input type="text" name="url">
					</div>
					<div id="input">
						<p>ご担当者様名</p>
						<input type="text" name="person_name">
					</div> -->
					<div id="input">
						<p>ご連絡先メールアドレス</p>
						<input type="text" name="email">
					</div>
					<!-- <div id="input">
						<p>電話番号</p>
						<input type="text" name="tel">
					</div> -->
					<div id="input">
						<p>本文</p>
						<textarea name="body"></textarea>
					</div>
					<input type="submit" value="送信" class="submit">
				</form>
			</div>
		</div>
	</div>
@endsection