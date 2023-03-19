<?php

include_once __DIR__ . '/../database/connect.php';

global $dbh;

/*
 * @TODO: Валидация $page_name!!!
 */

$page_name = $_POST['page_name'];
$success = false;


$sth = $dbh->prepare("INSERT INTO pages (page) VALUES (?)");
if ($sth->execute([$page_name])) {
    $success = true;
}

$dir_element = __DIR__ . '/../../elements/';
$dir_page = __DIR__ . '/../../pages/';

//Создаем новую страницу
if ($success && !file_exists($dir_page . $page_name)) {
    $class_name =  ucfirst($page_name);
    $element = fopen($dir_element . $class_name . '.php', 'w+');
    $page = fopen($dir_page . $page_name . '.php', 'w+');

    $write_element = "
<?php
class {$class_name} {
}
";
    $write_page = "
<?php
    ";

    fwrite($element, $write_element);
    fwrite($page, $write_page);
    fclose($element);
    fclose($page);
}

header("Location:/../../../pages/create.php?success={$success}");