<?php

class Main {
    
    private $host; // データベースサーバーのホスト名
    private $dbname; // 使用するデータベース名
    private $user; // データベースのユーザー名
    private $pass; // データベースのパスワード
    private $pdo; // PDOオブジェクト

    private $charset;

    public function __construct($host, $dbname, $user, $pass, $charset = 'utf8') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
        $this->charset = $charset;
    }

    public function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=' . $this->charset;
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('接続エラー: ' . $e->getMessage());
        }
    }

    public function getPDO(){
        return $this->pdo;
    }
}

$host = 'mysql214.phy.lolipop.lan';
$dbname = 'LAA1517437-shop';
$user = 'LAA1517437';
$pass = 'Pass1015';

$main = new Main($host, $dbname, $user, $pass);

$main->connect();

$pdo = $main->getPDO();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["new_id"];
    $pass = $_POST["new_password"];
    
    // パスワードのハッシュ化
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
    
    try {
        // プリペアドステートメントを作成
        $stmt = $pdo->prepare("INSERT INTO Users (user_nameID, pass) VALUES (:user_nameID, :pass)");
        
        // パラメータをバインド
        $stmt->bindParam(':user_nameID', $id, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $hashed_password, PDO::PARAM_STR);
        
        // クエリを実行
        $stmt->execute();
        
        // 登録成功メッセージを表示
        echo "新しいユーザーが登録されました。";
        //button出力
    } catch (PDOException $e) {
        if ($e->getCode() == '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
            // エラーコード 23000 は一意性制約違反を表します
            // エラーメッセージに 'Duplicate entry' が含まれている場合は、重複エントリ
            echo "このユーザー名は既に登録されています。";
        } else {
            // その他のエラー
            echo "エラー: " . $e->getMessage();
        }
    }
}

?>