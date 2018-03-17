<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php

$name = empty($_POST['name']) ? "名無し" : $_POST['name'];
$body = $_POST['body'];

if (empty($body)) {
    return http_response_code(403);
}

$pdo = new PDO(
    'mysql:host=localhost;dbname=bbs;charset=utf8','root','password',
    array(PDO::ATTR_EMULATE_PREPARES => false)
);

$stmt = $pdo->prepare('INSERT INTO entry (name, body) VALUES (?, ?)');

$stmt->bindValue(1, $name, PDO::PARAM_INT);
$stmt->bindValue(2, $body, PDO::PARAM_INT);

$stmt->execute();

echo "書き込みdone!<br>";
echo "<a href='/'>indexへ戻る<a>";

?>
</body>
