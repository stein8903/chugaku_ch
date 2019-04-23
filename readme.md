## 概要

	中学受験・進学の情報を交換したいママのための掲示板「中学チャンネル」のLaravelベースの開発です。
	下記のURLで公開しております。トピックの投稿やコメントはご自由に。
	http://13.231.121.171/chugaku_ch/public/

## 機能一覧

	* トピック投稿機能（画像投稿含む）
	* トピックにいいねをつける機能
	* トピックにコメントをつける機能
	* コメントにいいねをつける機能
	* ページネーション機能
	* トピック検索機能

## 使用している技術一覧
	
	* Laravel Framework 5.8.4
	* mysql 5.7~?
	* php 7.2~

## cloneする際の注意点
	* 求められるサーバーのミドルウェア
		* mysql 5.7以上
		* php 7.2以上
	* .gitignoreで無視されるファイル
		* .env
			DBの情報あたりをお使いのDBサーバーの情報に合うように修正してください。
		* vendor/
			composer installで設置してください。
	* その他
		* config/database.phpの'unix_socket'   => '/Applications/MAMP/tmp/mysql/mysql.sock',の行をコメントアウトしてください。
		（ローカル開発環境用(mamp)に記載しましたがいらないです。コメントアウトしないとmigrateができないです。）