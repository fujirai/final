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
    <meta http-equiv="Cache-Control" content="no-cache">
    <link href="css/top.css" rel="stylesheet">
		<meta charset="UTF-8">
		<title>top</title>
	</head>
    <body>
	<table>
		<tr><th>商品番号</th><th>商品名</th><th>価格</th><th>カテゴリー名</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from tea,category where cate_id=?');
    foreach ($sql ->execute($_POST['cate'])) {
        echo '<tr>';
        echo '<td>',$row['tea_id'], '</td>';
        echo '<td>',$row['tea_name'], '</td>';
        echo '<td>',$row['price'], '</td>';
        echo '<td>',$row['cate_name'], '</td>';
        echo '</tr>';
        echo "\n";
    }
?> 
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>