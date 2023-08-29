<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style_home.css">
    <title>ホーム画面</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <?php
        include 'php/test1.php';
    ?>

    <header>
        <div class="sidebar">
            <img id="closeButton" src="img/close.png">
            <!-- サイドバーの内容 -->
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
            <p>test1</p>
            <hr>
        </div>
        <img id="toggleButton" src="img/menu.png">
        <a href="task_name.html"><img id="listButton" src="img/list.png"></a>
        <a href="task_name.html"><img id="addButton" src="img/add.png"></a>
        
    </header>
        <canvas id="progressChart" width="340" height="320"></canvas>
        <script src="js/side_ber.js"></script>
        <script src="js/graph.js"></script>

    <div class="Progress">
        <p>期日までに終わらせるには</p>
        <h1>1日 Nページ</h1>
        <hr>
        <p>予定と比べてNページ進んでいます</p>
    </div>

<h1 id="task_name">タスク名</h1>
<hr id="name_hr">
    <div id="calendar"></div>
    <button id="prev" type="button">前の月</button>
    <button id="next" type="button">次の月</button>
    <div id="current_date"></div> <!-- 現在の年月を表示する要素 -->

    <script src="js/calendar.js"></script>

    <div id="registration">
        <p>今日の進捗: <input type="text"> ページ</p>
        <button type="button">保存</button>
    </div>

</body>
</html>
