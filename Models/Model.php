<?php

require_once('dbconnect.php');

class Model
{
    // プロパティ
    protected $table;
    protected $db_manager;

    // インスタンス化した時に呼ばれるメソッド
    public function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();
        $this->db_manager->connect();
    }

    // DBからデータを全て取得するメソッド
    public function getAll()
    {
        // 実行するSQLを準備
        // $this === このクラスのインスタンス
        // db_manager
        // このクラスのインスタンスのプロパティ
        // DbManagerクラスのインスタンス
        // dbh
        // db_managerのプロパティ
        // PDOクラスのインスタンス
        // prepare
        // dbhのメソッド
        // PDOインスタンスのメソッド
        $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);

        // $dbh === PDOクラスのインスタンス
        // $dbh->prepare('SELECT * FROM ' . $this->table);

        // 準備したSQLを実行する
        $stmt->execute();

        // 実行結果を取得
        $tasks = $stmt->fetchAll();

        // return === 関数の呼び出し元に、値を返す
        return $tasks;
    }

    // * findById()を以下に追加する
public function findById($id)
{
    //データベースの中からidに対応するタスクを探すコードを準備 
    // 引数で受け取ったidと一致するものをtasksテーブルの中から受け取る（？の部分に受け取った引数が入る）
    $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table . ' WHERE id = ?');

    // 実行
    $stmt->execute([$id]);

    // 実行したコードを変数に代入
    $task = $stmt->fetch();

    // 最後に変数に代入したものを戻り値として返す
    return $task;
}
    

    
    public function delete($data)
    {
        // 削除処理

        // 準備
        $stmt = $this->db_manager->dbh->prepare('DELETE FROM ' . $this->table . ' WHERE id = ?');

        // 実行
        return $stmt->execute($data);
    }

}
