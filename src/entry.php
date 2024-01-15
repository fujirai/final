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
            <p>お茶名<input type="text" name="name"></p>
            <p>価格<input type="text" name="price"></p>
            <button type="submit">追加</button>
        </form>
    </body>
</html>