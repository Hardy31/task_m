<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

//незарегистрированный в сесии пользователь возвращается на страницу login-form.php
if (isset($_COOKIE['id_user'])) {
    header('Location: /login-form.php');
    exit;
}

include 'function.php';
include 'config.php';
var_dump($_POST);
var_dump($_FILES);

//работа скартинкой

$newName = md5 ($_FILES['image']['name']).'.jpg';
move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$newName);


//подготовка запроса

$tabl = 'tasks';
$data = [
    'post_name' => $_POST['get_post_name'],
    'post_descrip' => $_POST['get_post_descrip'],
    'post_status' => $_POST['get_post_status'],
    'post_picture' => $newName,
    'id_user' => $_SESSION['id_user']
];


//запись новой задачи в БД
create ($sql, $access_root, $pw_root,$tabl, $data);


//переадресация на станицу list.php
header('Location: /list.php');
exit;

?>