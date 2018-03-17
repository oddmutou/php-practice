<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

if (empty($_POST['name']) or empty($_POST['body'])) {
    return http_response_code(403);
}

$pdo = new PDO(
    'mysql:host=localhost;dbname=bbs;charset=utf8','root','password',
    array(PDO::ATTR_EMULATE_PREPARES => false)
);

$stmt = $pdo->prepare('INSERT INTO entry (name, body) VALUES (?, ?)');

$stmt->bindValue(1, $_POST['name'], PDO::PARAM_INT);
$stmt->bindValue(2, $_POST['body'], PDO::PARAM_INT);

$stmt->execute();

echo "書き込みdone!<br>";
echo "<a href='/'>indexへ戻る<a>";

?>
</body>
