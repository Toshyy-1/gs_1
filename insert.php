<?php
	//データベース接続用ファイルを読み込む
	// require_once("dbprocess.php");



//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ


//入力チェック（受信確認処理）
if(
  !isset($_POST["isbn"]) || $_POST["isbn"]=="" ||
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["price"]) || $_POST["price"]==""
){
  exit('ParamError');
}



	//登録ボタンが押されたら
	// if (isset($_POST["isbn"])) {
		//POSTデータを取得
		$isbn  = $_POST["isbn"];
		$title = $_POST["title"];
		$price = $_POST["price"];


	//2. DB接続します
	try {
		//Password:MAMP='root',XAMPP=''
		$pdo = new PDO('mysql:dbname=gs_book_db;charset=utf8;host=localhost','root','root');
	} catch (PDOException $e) {
		exit('DBConnectError:'.$e->getMessage());
	}

	
	//３．データ登録SQL作成
	$stmt = $pdo->prepare("INSERT INTO bookinfo(isbn,title,price)VALUES(:a1,:a2,:a3)");
	$stmt->bindValue(':a1', $isbn, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a2', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
	$stmt->bindValue(':a3', $price, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
	$status = $stmt->execute();
		
	
	
	
	
	
	
	//書籍情報を登録するSQL文を用意
		// $sql = "INSERT INTO bookinfo VALUES('{$isbn}', '{$title}', '{$price}')";

		//SQL文を発行
		// executeQuery($sql);



		//４．データ登録処理後
		if($status==false){
			//SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
			$error = $stmt->errorInfo();
			exit("ErrorMassage:".$error[2]);
		}else{

	// 	//書籍一覧ページに遷移
		header("Location: index.php");
		exit;
	}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍登録ページ | 書籍管理システム</title>
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
				<li class="active"><a href="insert.php">書籍登録</a></li>
			</ul>
		</nav>

		<h2>書籍登録</h2>
		<div id="insert">
			<form action="insert.php" method="post">
				<table>
					<tr>
						<th>ISBN</th>
						<td><input type="text" name="isbn" value=""></td>
					</tr>
					<tr>
						<th>TITLE</th>
						<td><input type="text" name="title" value=""></td>
					</tr>
					<tr>
						<th>価格</th>
						<td><input type="text" name="price" value=""></td>
					</tr>
				</table>
				<input type="submit" value="登録" class="button">
			</form>
		</div>

		<footer>
			<p class="copyright">Copyright &copy; all rights reserved.</p>
		</footer>
	</div>
</body>
</html>