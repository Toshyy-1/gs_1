<?php
	//データベース接続用ファイルを読み込む
	require_once("dbprocess.php");

 	//GETデータを取得する
	$isbn = $_GET["isbn"];

	//ISBN番号の書籍情報を取得するSQL文を用意
	$sql = "SELECT * FROM bookinfo WHERE isbn = '{$isbn}'";

	//SQL文を発行
	$result = executeQuery($sql);

	//結果セットから書籍情報を取得
	$row = mysql_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍詳細ページ | 書籍管理システム</title>
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

		<h2>書籍詳細</h2>
		<div id="detail">
			<table>
				<tr>
					<th>ISBN</th>
					<td class="isbn"><?php echo $row['isbn']; ?></td>
				</tr>
				<tr>
					<th>TITLE</th>
					<td class="title"><?php echo $row['title']; ?></td>
				</tr>
				<tr>
					<th>価格</th>
					<td class="price"><?php echo $row['price']; ?>円</td>
				</tr>
			</table>
		</div>

		<footer>
			<p class="copyright">Copyright © all rights reserved.</p>
		</footer>
	</div>
</body>
</html>