    <?php
        // 既存のJSONファイルを読み取り
        $filename = 'json/test.json';
        $currentData = file_get_contents($filename);

        // 既存のJSONデータをPHPの配列に変換
        $currentArray = json_decode($currentData, true);

        // データを追加・変更
        $currentArray['newKey'] = 'New Value'; // 例：新しいデータを追加

        // PHPの配列をJSON形式に変換
        $newData = json_encode($currentArray);

        // 変更後のJSONデータをファイルに書き込み
        file_put_contents($filename, $newData);
    ?>