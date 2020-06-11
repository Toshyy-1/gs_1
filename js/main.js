// 全ての削除ボタン要素を取得
var deleteBtn = document.getElementsByClassName('delete');

// 全ての削除ボタンにクリックされた際の処理を設定
for (var i = 0; i < deleteBtn.length; i++) {
	deleteBtn[i].onclick = function() {
		// 確認メッセージを表示し、キャンセルされた場合は画面遷移を中断する
		if (!confirm('書籍データを削除します。よろしいですか？')) {
			return false;
		}
	}
}