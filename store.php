<?php

// 外部ファイルの読み込み
// Task.phpにクラスの記述あるから
require_once ('Models/Task.php');

// データの受け取り（create.phpから。$_POST['inputのname属性'])
$title = $_POST['title'];
$contents = $_POST['contents'];

// db カラム名にcreatedがあった
// いつ作られたかという情報も渡したい
$currentTime = date("Y/m/d H:i:s");

// DBへのデータ保存
// クラスをインスタンス化する
$task = new Task();

// Modelsフォルダにあるtask.phpのcreateというメソッドを実行する
// []に渡したいデータを入力する
$task->create([$title, $contents, $currentTime]);

// リダイレクト
// 「POST」ボタンを押した後にトップページに戻るようにリンクを飛ばす
// header関数は、HTTPヘッダー情報を送信するときに使用。
// HTTPヘッダー：どのような情報をリクエストして、どのようなコンテンツを受け取るかを定義するためのもの
// 引数には指定したページを
header('location:index.php');

// 処理の終了
// exitはforeach文などループ処理の中で処理を終了することも可
exit;
