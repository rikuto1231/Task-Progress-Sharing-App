<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/date.css">
</head>
<body>
    <h3>終了日を選択してください</h3>
    <form action="Task_background.html" method="post">
    <div id="strat_date">
        <div id="current_date"></div> <!-- 現在の年月を表示する要素 -->
        <div id="calendar"></div>
        <button id="prev" type="button">前の月</button>
        <button id="next" type="button">次の月</button>

        <script src="js/calendar.js" type="text/javascript"></script>
        </div>

    <button type="submit" id="submit_next">次へ</button>
    </form>
</body>
</html>