<?php
    const SERVER='mysql220.phy.lolipop.lan';
    const DBNAME='LAA1517484-final';
    const USER='LAA1517484';
    const PASS='Pass0125';

    $connect='mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="css/top.css" rel="stylesheet">
        <title>追加完了</title>
        <style>
            button{
                display: block;
                margin:15px auto;
                width:150px;
            }
        </style>    
        </head>
<body>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into category(cate_name) values( ?)');
        if(empty($_POST['cate'])){
            echo '<h1>商品名を入力してください。</h1>';
        }else if($sql->execute([$_POST['cate']])){
            echo '<h1>追加に成功しました。</h1>';
        }else{
            echo '<h1>追加に失敗しました。</h1>';
        }
    ?>
    <br><hr><br>
    <table>
        <tr><th>番号</th><th>カテゴリー名</th></tr>
    <?php
        foreach($pdo->query('select * from category') as $row) {
            echo '<tr>';
            echo '<td>',$row['cate_id'],'</td>';
            echo '<td>',$row['cate_name'],'</td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
    <form action="cate.php">
        <button type="submit">戻る</button>
    </form>
    <button onclick="location.href='top.php'">トップへ戻る</button>
</body>
</html>