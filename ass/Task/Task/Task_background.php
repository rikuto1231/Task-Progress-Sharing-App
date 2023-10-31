<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/task_background.css">
    <title>背景画像選択</title>
</head>
<body>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <div id="background" style="background-image: url('img/dog.jpeg');"></div>
    <form action="Task_home.html" method="post">
        <input type="hidden" id="backgroundPath" name="backgroundPath" value="img/dog.jpeg">
        <button type="submit" id="submit_next">背景を決定</button>
    </form>
    <button id="showBackgroundPath">現在の背景パスを表示</button>
    <script src="js/background_swipe.js"></script>
    <script>
        showBackgroundPathButton.addEventListener('click', function () {
            const backgroundPath = document.getElementById('backgroundPath').value;
            alert('現在の背景パス: ' + backgroundPath);
        });
    </script>
</body>
</html>
