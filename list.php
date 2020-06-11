<?php
	//データベース接続用ファイルを読み込む
	// require_once("dbprocess.php");

 	//GET送信データを取得する
	$title  = $_GET['title'];


//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=gs_book_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('DBConnectError:'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM bookinfo");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
	 $result = $stmt->fetch(PDO::FETCH_ASSOC);
}


	//書籍タイトルに該当する書籍データを取得するSQL文を用意
	// $sql = "SELECT * FROM bookinfo WHERE title LIKE '%{$title}%' ORDER BY isbn";

	//SQL文を発行し、結果セットを取得
	// $result = executeQuery($sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<title>書籍一覧ページ | 書籍管理システム</title>
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
				<li class="active"><a href="list.php">書籍一覧</a></li>
				<li><a href="index.php">書籍登録</a></li>
			</ul>
		</nav>

		<h2>書籍一覧</h2>
		<table>
			<tr>
				<th>ISBN番号</th>
				<th>書籍タイトル</th>
				<th>価格</th>
				<th>更新/削除</th>
			</tr>
			<?php
			// 結果セットから1行データを取得し、変数$rowに格納し、全件取得するまで繰り返す
			// while ($row = mysql_fetch_array($result)) {

  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 

			?>


			<tr id="row_<?php echo $result["isbn"] ?>">
                <td class="isbn">
                    <a href="detail.php?isbn=<?php echo $result["isbn"]; ?>"><?php echo $result["isbn"]; ?></a>
                </td>
                <td class="title"><?php echo $result["title"]; ?></td>
                <td class="price"><?php echo $result["price"]; ?>円</td>
                <td>
                    <a href="update.php?isbn=<?php echo $result["isbn"]; ?>">更新</a>　
                    <a href="delete.php?isbn=<?php echo $result["isbn"]; ?>" class="delete">削除</a>
                </td>
            </tr>
			<?php
			} // while終わり
			?>
		</table>


		<!-- <nav id="menu">
			<ul class="clearfix">
			<li><a href="delete.php=<?php echo $result; ?>" class="delete">履歴削除</a></li>
			</ul>
		</nav> -->

		<footer>
			<p class="copyright">Copyright © all rights reserved.</p>
		</footer>
	</div>

	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>