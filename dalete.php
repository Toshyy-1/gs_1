<?php
	//データベース接続用ファイルを読み込む
	require_once("dbprocess.php");

 	//GETデータを取得する
	$isbn = $_GET["isbn"];



	//削除処理を行うSQL文を用意
	$sql = "DELETE FROM bookinfo WHERE isbn = '{$isbn}'";

	//SQL文を発行
	executeQuery($sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍削除情報ページ | 書籍管理システム</title>
</head>
<body>
	<div id="container">
		<header class="clearfix">
			<div class="title">
				<h1>書籍管理システム</h1>
			</div>
			<div class="search">
				<form action="list.php">
					<p class="keyword">
						<input type="text" name="title" placeholder="検索したい書籍タイトルを入力" value="">
					</p>
					<p class="submit">
						<input type="submit" value="検索">
					</p>
				</form>
			</div>
		</header>

		<nav id="menu">
			<ul class="clearfix">
				<li><a href="list.php">書籍一覧</a></li>
				<li><a href="index.php">書籍登録</a></li>
			</ul>
		</nav>

		<h2>書籍削除</h2>
		<div id="delete">
			<p>ISBN番号<?php echo $isbn; ?>の書籍情報を削除しました。</p>
		</div>

		<footer>
			<p class="copyright">Copyright &copy; all rights reserved.</p>
		</footer>
	</div>
</body>
</html>