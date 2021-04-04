<?php

require_once __DIR__ . '/functions.php';

$dbh = connectDb();

$sql = 'SELECT * FROM animals';

$stmt = $dbh->prepare($sql);

$stmt->execute();

$animals = $stmt->fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ペットショップアプリ課題1</title>
</head>

<body>
    <h2>本日の動物ご紹介！</h2>
    <?php foreach ($animals as $animal): ?>
        <p><?= h($animal['type']) . 'の' . h($animal['classification'] . 'ちゃん') ?></p>
        <p><?= h($animal['description'])?></p>
        <p><?= h($animal['birthday']) . ' 生まれ'?></p>
        <p><?= h('出身地 ' . $animal['birthplace'])?></p><hr>
    <?php endforeach; ?>
</body>

</html>