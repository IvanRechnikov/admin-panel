<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Создание страницы</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/create.css">
</head>
<body>
    <?= include_once __DIR__ . '/../pages/components/navbar.php' ?>
    <form action="../assets/action/create.php" method="post" class="create-form container">
        <h3>Создание страницы</h3>
        <p>Название</p>
        <input type="text" name="page_name" id="page_name">
        <button type="submit">Создать</button>
    </form>
    <?php
        if (isset($_GET['success'])) {
            if ($_GET['success']) {
                $message = 'Страница успешно созданна, перейдите на страницу создания компонентов!<br>
                        (<a href="create_components.php">Перейти</a>)';
            } else {
                $message = 'Произошла ошибка, попробуйте добавить страницу снова!';
            }
            print $message;
        }
    ?>
</body>
</html>