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
var_dump($_GET);

//Получение данных из БД по ID поста
$tabl = 'tasks';
$key = 'id_post';
$value = $_GET['id_post'];
$result = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);
var_dump($result[0]);

//если картинку не выбралт то остается прежняя
$newName = md5 ($_FILES['image']['name']).'.jpg';
if ($newName == 'd41d8cd98f00b204e9800998ecf8427e.jpg') {
    $newName = $result[0]['post_picture'];
    }else{
    move_uploaded_file($_FILES['image']['tmp_name'],'assets/img/'.$newName);
}


//подготовка запроса

$tabl = 'tasks';
$data = [

    'post_name' => $_POST['get_post_name'],
    'post_descrip' => $_POST['get_post_descrip'],
    'post_status' => $_POST['get_post_status'],
    'post_picture' => $newName,
    'id_user' => $_SESSION['id_user'],
    'id_post' => $_POST['get_id_post'],
];
$key = 'id_post=:id_post';


//запись исправленных данных в БД
update ($sql, $access_root, $pw_root, $tabl, $data, $key);

//переадресация на станицу list.php
header('Location: /list.php');


?>