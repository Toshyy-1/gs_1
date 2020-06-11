<?php
	//データベース接続用ファイルを読み込む
	require_once("dbprocess.php");

 	//GET送信データを取得する
	$isbn = $_GET["isbn"];
	$title = $_GET["title"];
	$price = $_GET["price"];


	//書籍データを取得するSQL文を用意
	$sql = "SELECT * FROM bookinfo WHERE isbn ='{$isbn}'";

	//SQL文を発行し、結果セットを取得
	// $result = executeQuery($sql);

	//結果セットから書籍情報を取得
	// $row = mysql_fetch_array($result);

	//変更完了ボタンが押されたら
	if (isset($_POST["isbn"])) {
		//POSTデータを取得
		$isbn = $_POST["isbn"];
		$title = $_POST["title"];
		$price = $_POST["price"];

		//書籍情報を更新するSQL文を用意
		$sql = "UPDATE bookinfo SET title ='{$title}', price='{$price}' WHERE isbn ='{$isbn}'";

		//SQL文を発行
		// executeQuery($sql);

		//書籍一覧ページに遷移
		header("Location: list.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍変更ページ | 書籍管理システム</title>
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

		<h2>書籍変更</h2>
		<div id="update">
			<form action="update.php" method="post">
				<input type="hidden" name="isbn" value="<?php echo $isbn; ?>">
				<table>
					<tr>
						<th width="150"></th>
						<th width="200">変更前情報</th>
						<th width="200">変更後情報</th>
					</tr>
					<tr>
						<th>ISBN</th>
						<td><?php echo $isbn; ?></td>
						<td><?php echo $isbn; ?></td>
					</tr>
					<tr>
						<th>TITLE</th>
						<td><?php echo $result["title"]; ?></td>
						<td><input type="text" name="title" value=""></td>
					</tr>
					<tr>
						<th width="150">価格</th>
						<td><?php echo $result["price"]; ?>円</td>
						<td><input type="text" name="price" value=""></td>
					</tr>
				</table>
				<input type="submit" value="変更完了" class="button">
			</form>
		</div>

		<footer>
			<p class="copyright">Copyright &copy; all rights reserved.</p>
		</footer>
	</div>
</body>
</html>