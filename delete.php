<?php 
// deleteの処理内容を以下に書く

// 1. ファイルの読み込み
require_once('Models/Task.php');

// 2. データの受け取り
// 受け取った値を変数の中に代入
$id = $_POST['id'];

// 3. DBからデータの削除
$task = new Task();
// deleteメソッドはModel.phpにすでに書かれている
$task->delete([$id]);


// 4. リダイレクト
header('location: index.php');
exit;