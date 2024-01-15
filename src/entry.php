<!DOCTYPE html>
<html long="ja">
    <head>
        <meta charset="UTF-8">
        <link href="css/entry.css" rel="stylesheet">
        <title>データ追加</title>
    </head>
    <body backgroud="tea.jpg">
        <p>商品を追加します。</p>
        <form action="entry_output.php" method="post">
            お茶名<input type="text" name="name"></br>
            価格<input type="text" name="price"></br>
            <button type="submit">追加</button>
        </form>
    </body>
</html>