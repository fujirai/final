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
        <h1>お茶一覧</h1>
        <hr>
        <button onclick="location.href='entry.php'">お茶登録</button>
        <button onclick="location.href='cate.php'">カテゴリー登録</button>
        <table>
    <tr><th>番号</th><th>お茶名</th><th>価格</th><th colspan="2">更新・削除</th></tr>
<?php
    $pdo=new PDO($connect, USER, PASS);
    foreach ($pdo->query('select * from tea') as $row) {
        echo '<tr>';
        echo '<td>', $row['tea_id'], '</td>';
        echo '<td>', $row['tea_name'], '</td>';
        echo '<td>', $row['price'], '</td>';
        echo '<td>';
        echo '<form action="update.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['tea_id'],'">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="id" value="',$row['tea_id'],'">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
?>
    </table>
    </body>
</html>
