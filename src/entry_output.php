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
        <title>追加完了</title>
    </head>
<body>
    <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql=$pdo->prepare('insert into tea(tea_name, price) values(?, ?)');
        if(empty($_POST['name'])){
            echo '商品名を入力してください。';
        }else if(!preg_match('/^[0-9]+$/', $_POST['price'])) {
            echo '商品価格を整数で入力してください。';
        }else if($sql->execute($_POST['name'],$_POST['price'])){
            echo '<font color="red">追加に成功しました。</font>';
        }else{
            echo '<font color="red">追加に失敗しました。</font>';
        }
    ?>
    <br><hr><br>
    <table>
        <tr><th>番号</th><th>お茶名</th><th>価格</th></tr>
    <?php
        foreach($pdo->query('select * from tea') as $row) {
            echo '<tr>';
            echo '<td>',$row['tea_id'],'</td>';
            echo '<td>',$row['tea_name'],'</td>';
            echo '<td>',$row['price'], '</td>';
            echo '</tr>';
            echo "\n";
        }
    ?>
    </table>
    <form action="entry_input.php">
        <button type="submit">戻る</button>
    </form>
    <button onclick="location.href='top.php'">トップへ戻る</button>
</body>
</html>