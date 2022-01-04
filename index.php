<?php

require_once __DIR__ . '/vendor/autoload.php';

use Source\Database\Connect;

/*
 * GET PDO instance AND errors
 */
$connect = Connect::getInstance();
$error = Connect::getError();

/*
 * CHECK connection/errors
 */
if ($error) {
    echo $error->getMessage();
    exit;
}

/*
 * FETCH DATA
 */
$users = $connect->query("SELECT * FROM users LIMIT 5");
var_dump($users->fetchAll());