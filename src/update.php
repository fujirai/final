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
		<title>データ更新</title>
	</head>
	<body>
    <table>
    <tr><th>番号</th><th>お茶名</th><th>価格</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
	$sql=$pdo->prepare('select * from tea where tea_id=?');
	$sql->execute([$_POST['id']]);
	foreach ($sql as $row) {
        echo '<tr>';
		echo '<form action="top.php" method="post">';
        echo '<td> ';
		echo '<input type="text" name="id" value="', $row['tea_id'], '">';
		echo '</td> ';
		echo '<td>';
		echo '<input type="text" name="name" value="', $row['tea_name'], '">';
		echo '</td> ';
		echo '<td>';
		echo ' <input type="text" name="price" value="', $row['price'], '">';
		echo '</td> ';
		echo '<td><input type="submit" value="更新"></td>';
		echo '</form>';
        echo '</tr>';
		echo "\n";
	}
?>
</table>
<button onclick="location.href='top.php'">トップへ戻る</button>
    </body>
</html>

