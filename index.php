<?php

include_once __DIR__ . '/vendor/autoload.php';
use App\Helpers;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<?= include_once __DIR__ . '/pages/components/navbar.php' ?>
    <div class="container">
        <h1>Перечень всех страниц</h1>
        <div class="pages">
        <?php
            $pages = scandir(__DIR__ . '/pages');
            foreach ($pages as $page) {
                $ext = pathinfo($page, PATHINFO_EXTENSION);
                if ($ext == 'php') {
                    echo "<a href='pages/{$page}' class='page'>$page</a>";
                }
            }
        ?>
        </div>
    </div>
</body>
</html>