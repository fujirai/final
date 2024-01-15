<?php
    const SERVER = 'mysql220.phy.lolipop.lan';
    const DBNAME = 'LAA1517484-final';
    const USER = 'LAA1517484';
    const PASS = 'Pass0125';

    $connect = 'mysql:host='. SERVER . ';dbname='. DBNAME . ';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
        <link href="css/top.css" rel="stylesheet">
		<title>データ削除</title>
        <style>
            button{
                display: block;
                text-align:center;
            }
        </style>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from tea where tea_id=?');
    if ($sql->execute([$_POST['id']])){
        echo '<h1>削除に成功しました。</h1>';
    }else{
        echo '<h1>削除に失敗しました。</h1>';
    }
?>
    <br><hr><br>
	<table>
		<tr><th>商品番号</th><th>商品名</th><th>価格</th></tr>
<?php
    foreach ($pdo->query('select * from tea') as $row) {
        echo '<tr>';
        echo '<td>',$row['tea_id'], '</td>';
        echo '<td>',$row['tea_name'], '</td>';
        echo '<td>',$row['price'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

