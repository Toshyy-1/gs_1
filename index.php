<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>div{padding: 10px;font-size:16px;}</style>
	<title>書籍管理システム</title>

</head>
<body>

<!-- Head[Start] -->
<!-- <header class="clearfix">
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
		</header> -->


<!-- 外部ファイルの読み込み（メニュー） -->

		<!-- <nav id="menu">
			<ul class="clearfix">
				<li class="active"><a href="list.php">書籍一覧</a></li>
				<li><a href="insert.php">書籍登録</a></li>
			</ul>
		</nav> -->


<!-- Head[End] -->

<!-- Main[Start] -->

<!-- <form method="POST" action="insert.php">
  <div>
    <fieldset>
			<legend>書籍管理</legend>
			
			<label for="">ISBN番号：<input type="text" name="isbn"></label><br>
      <label for="">タイトル：<input type="text" name="title"></label><br>
			<label for="">価格：<input type="text" name="price"></label><br>
			 -->

      <!-- <label for="">ID：<input type="text" name="id"></label><br>
      <label for="">ISBN番号：<input type="text" name="isbn"></label><br>
      <label for="">書籍名：<input type="text" name="book_name"></label><br>
      <label for="">著書名：<input type="text" name="author"></label><br>
      <label for="">ジャンル：<input type="text" name="genre"></label><br>
      <label for="">評価：<input type="text" name="evaluation"></label><br>
      <label for="">書籍コメント：<input type="text" name="comment" rows="4" cols="40"></label><br>
      <label for="">読んだ回数：<input type="text" name="number_times"></label><br> -->
      <!-- <input type="submit" value="送信">
    </fieldset>
  </div>
</form> -->
<!-- Main[End] -->




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
				<li class="active"><a href="index.php">書籍登録</a></li>
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






<!-- footer -->
<!-- 外部ファイルの読み込み（メニュー） -->
  <?php 
      include("footer,html")
    ?>


    <footer>
			<p class="copyright">Copyright © all rights reserved.</p>
		</footer>
	</div>

	<script type="text/javascript" src="js/main.js"></script>

</body>
</html>