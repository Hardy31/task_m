<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'function.php';
include 'config.php';
$tabl = 'tasks';
$key = 'id_post';
$value = $_GET['id_post'];
delete ($sql, $access_root, $pw_root,$tabl, $key, $value);
header('Location: /list.php');
exit;


?>
