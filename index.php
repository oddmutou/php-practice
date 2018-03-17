<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div style="padding: 3em;">
<form action="/post.php" method="POST">
<div class="form-group row">
    <label for="form-name" class="col-sm-2 col-form-label">名前</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="form-name" name="name">
    </div>
</div>
<div class="form-group row">
    <label for="form-body" class="col-sm-2 col-form-label">本文</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="form-body" name="body" required>
    </div>
</div>
<div class="text-center">
    <input type="submit" value="投稿" class="btn btn-primary">
</div>
</form>
<hr>
<ul class="list-group">
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
<li class="list-group-item">
    $id 
    <div>$body</div>
    <div class="text-right">
        <small>by $name ($timestamp)</small>
    </div>
</li>
EOF;
}

?>
</ul>
</div>
</body>
