<?php

// ファイルの読み込み
require_once('Models/Task.php');

// データの受け取り
// タイトルとコンテンツをedit.phpから受け取る。ここではidも一緒にわたす
$title = $_POST['title'];
$contents = $_POST['contents'];
$id = $_POST['id'];

// DBへのデータ保存
// updateというメソッドを使う（下記のあとTask.phpで定義する）。その中に引数として上で定義した３つを入れる
$task = new Task();
$task->update([$title, $contents, $id]);

// リダイレクト
header('location:index.php');
exit;
