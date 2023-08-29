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
$pass = '＊＊＊＊';

$main = new Main($host, $dbname, $user, $pass);

$main->connect();

$pdo = $main->getPDO();

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    
    try {
        // プリペアドステートメントを作成
        $stmt = $pdo->prepare("SELECT user_id, user_nameID, pass FROM Users WHERE user_nameID = :id");
        
        // パラメータをバインド
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        
        // クエリを実行
        $stmt->execute();
        
        // 結果を取得
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row && password_verify($pass, $row['pass'])) {
            // パスワードが一致した場合、ログイン成功
            $_SESSION["user_id"] = $row['user_id'];
            header("Location: ../Task_home.php"); // ログイン後のページにリダイレクト
            exit;
        } else {
            // ログイン失敗
            echo "ログインに失敗しました。";
        }
    } catch (PDOException $e) {
        // エラーメッセージを表示
        echo "エラー: " . $e->getMessage();
    }
}
?>
