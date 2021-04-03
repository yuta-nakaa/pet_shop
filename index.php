;<?php

    require_once __DIR__ . '/functions.php';

    $dbh = connectDb();

    ?>

<?php

require_once __DIR__ . '/functions.php';

$dbh = connectDb();

$sql = 'SELECT * FROM animals';

$stmt = $dbh->prepare($sql);

$stmt->execute();

$users = $stmt->fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>animals - SELECT</title>
</head>

<body>
    <h2>本日の動物ご紹介！</h2>
        <?php foreach ($animals as $animal) : ?>
            <?= h($animal['type']) . 'の',  h($animal['classification'] . 'ちゃん') ?><br>
            <?= h($animal['description'])  ?><br>
            <?= h($animal['birthday']) . '生まれ' ?><br>
            <?= h('出身地', $animal['birthplace'])   ?><br>
            <hr>
        <?php endforeach; ?>
</body>

</html>