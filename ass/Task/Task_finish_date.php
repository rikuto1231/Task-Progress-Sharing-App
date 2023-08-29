<?php

class Main {
    public function send_name(){
        $_SESSION['start_date'] = $_POST['start_date'];
    }
}

$main = new Main();
$main->send_name();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Users</title>
</head>
<body>
    <h1>開始日を選択してください</h1>
    <form action="Task_background.php" method="post">

    <label for="date_input">日付選択：</label>
    <input type="date" name="finish_date">

        <p><button type="submit">次へ</button></p>
    </form>
</body>
</html>