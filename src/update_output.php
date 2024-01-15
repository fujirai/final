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
		<title>更新完了</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update tea set tea_name=?,price=? where tea_id=?');
    if (empty($_POST['name'])) {
        echo '<h1>商品名を入力してください。</h1>';
    } else
    if (!preg_match('/[0-9]+/', $_POST['price'])) {
        echo '<h1>価格を数字で入力してください。</h1>';
    } else
    if ($sql->execute([htmlspecialchars($_POST['name']),$_POST['price'],$_POST['id']])){
        echo '<h1>更新に成功しました。</h1>';
    }else{
        echo '<h1>更新に失敗しました。</h1>';
    }    
?>
        <hr>
        <table>
        <tr><th>番号</th><th>お茶名</th><th>価格</th></tr>
<?php
foreach ($pdo->query('select * from tea') as $row) {
    echo '<tr>';
    echo '<td>', $row['tea_id'], '</td>';
    echo '<td>', $row['tea_name'], '</td>';
    echo '<td>', $row['price'], '</td>';
    echo '</tr>';
    echo "\n";
}
?>
        </table>
        <br>
        <button onclick="location.href='top.php'">一覧画面へ戻る</button>
    </body>
</html>
