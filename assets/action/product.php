<?php

include_once __DIR__ . '/../database/connect.php';

$title = $_POST['title'];
$desc = $_POST['description'];
$price = $_POST['price'];

$sth = $dbh->prepare('INSERT INTO products (title, description, price) VALUES (?, ?, ?)');
$sth->execute([$title, $desc, $price]);