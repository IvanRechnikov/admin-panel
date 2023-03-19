<?php

include_once __DIR__ . '/database.php';

global $dbh;

$dbh = new PDO('mysql:host=' . $database['host'] . ';dbname=' . $database['dbname'], $database['user'], $database['password']);