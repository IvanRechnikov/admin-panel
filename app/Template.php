<?php
namespace App;

use App\Element;

abstract class Template
{
    /*
     * Генерация навбара
     * TODO: Добавить возможность добавлять собственные пункты меню
     */
    protected function renderNavbar(): void {
        ?>
        <nav>
            <div class="container menu">
                <a href="/">Главная</a>
                <div class="menu-points">
                    <a href="create.php">Создание страницы</a>
                    <a href="about.php">Описание</a>
                </div>
                <div class="contacts">
                    <a href="#">Обратная связь</a>
                </div>
            </div>
        </nav>
        <?php
    }

    /*
     * Генерация хедера с подключение стилей
     */
    protected function renderHeader(): void {
        ?>
        <!doctype html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title><?= $this->name() ?></title>
            <?php
            foreach ($this->styleLinks() as $styleLink) { ?>
                <link rel="stylesheet" href="/../assets/css/<?= $styleLink ?>">
            <?php }
            ?>
        </head>
        <?php
    }

    /*
     * Генерация формы для отправки в БД
     */

    protected function renderForm($fields): void
    {
        //Создаем файл для взаимодействия с формой если его нет (название берем из свойства type)
        $fileName = $this->type();
        $actionDir = __DIR__ . '/../assets/action/';
        if (!file_exists($actionDir . $fileName)) {
            $actionPage = fopen($actionDir . $fileName . '.php', 'w+');
            fwrite($actionPage, '<?php');
        }

        //Далее генерируем форму с элементами
        ?>
        <form action="/../assets/action/<?= $fileName ?>.php" method="post" id="<?= $fields['key'] ?>" class="container <?= $fields['key'] ?>">
            <?php
                foreach ($fields['elements'] as $element) {
                    $this->renderElement($element);
                }
            ?>
            <button type="submit" style="margin-top: 15px;">Создать</button>
        </form>
        <?php
    }
}