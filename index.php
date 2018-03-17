<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<form action="/post.php" method="POST">
<label>名前: </label><input type="text" name="name" required><br>
<label>本文: </label><input type="text" name="body" required><br>
<input type="submit" value="投稿">
</form>
<hr>
<?php

$pdo = new PDO(
    'mysql:host=localhost;dbname=bbs;charset=utf8','root','password',
    array(PDO::ATTR_EMULATE_PREPARES => false)
);

$stmt = $pdo->query("SELECT * FROM entry ORDER BY id DESC");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $id = $row["id"];
    $name = htmlspecialchars($row["name"]);
    $body = htmlspecialchars($row["body"]);
    $timestamp = $row["timestamp"];

    echo<<<EOF
    $id, $name, $body, $timestamp<br>
EOF;
}

?>

</body>
