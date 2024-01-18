<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517484-final';
    const USER = 'LAA1517484';
    const PASS = 'Pass0125';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html long="ja">
    <head>
        <meta charset="UTF-8">
        <link href="css/entry.css" rel="stylesheet">
        <title>データ追加</title>
    </head>
    <body>
        <h1>商品を追加します。</h1>
        <form action="entry_output.php" method="post">
            <p>お茶名：<input type="text" name="name"></p>
            <p>価格：<input type="text" name="price"></p>
            <div class="box">
            <h2>カテゴリー：</h2>
            <select name="cate">
                <?php
                $pdo=new PDO($connect, USER, PASS);
                foreach ($pdo->query('select * from category') as $row) {
                    echo '<option value="',$row['cate_id'],'">',$row['cate_name'],'</option>';
                }
                ?>
                </select>
            </div>
            <br>
            <button type="submit">追加</button>
        </form>
    </body>
</html>