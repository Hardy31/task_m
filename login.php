<?php
session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'function.php';
include 'config.php';


//Получение данных из глобального массива $_POST
//var_dump($_POST);

//Проверка пользователя на совподение name и EMail
$tabl = 'users';
$key = 'email';
$value = $_POST['get_email'];
$result = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);
//var_dump ($result);


if ($_POST['get_email']==$result[0]['email'] AND md5($_POST['get_password'])==$result[0]['pw']){

    //ввнесение данных в сессию
    $_SESSION['id_user'] = $result[0]['id_user'] ;
    $_SESSION['name'] = $result[0]['name'] ;
    $_SESSION['email'] =  $_POST['get_email'];
    $_SESSION['pw'] = md5($_POST['get_password']);
    //var_dump($_SESSION);


    //если галочка стоит создаю КУКИ
    if (isset($_POST['get_cooki'])){
        setcookie("id_user", $_SESSION['id_user'], time()+60);
        setcookie("name", $_SESSION['name'], time()+60);
        setcookie("email",  $_SESSION['email'], time()+60);
        setcookie("pw", $_SESSION['pw'], time()+60);
    }
    //var_dump($_COOKIE);

    header('Location: /list.php');
    exit;


}else{
    $errorMessage = "Вы ввели неправильный логин или пароль. Попробуйте еще раз! Огроничений по количеству раз нет!";
    include 'errors.php';
    exit;
}













/*
$i = 0;
foreach ($data as $key => $value){
    $i=$i+1;
   // echo $key;
    //echo '    ';
    //echo $value;
    $result = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);
    if ($result) {
        $flag [$i] = $result[0]['id_user'];
    }
    //var_dump ($result);
    //echo '    ';
    //echo $flag [$i];
}
//var_dump ($flag);
//echo count($flag);

if (count($flag) <= 1) {
    $errorMessage = "Вы ввели неправильный логин или пароль. Попробуйте еще раз! Огроничений по количеству раз нет!";
    include 'errors.php';
    exit;
} elseif (count($flag) == 2 and $flag[1] = $flag[2]) {
    echo "2 запись";

    //ввнесение данных в сессию
    $_SESSION['id_user'] = $result[0]['id_user'] ;
    //echo $nick;
    //echo '<br>';
    $_SESSION['name'] = $result[0]['name'] ;
    //echo $nick;
    //echo '<br>';
    $_SESSION['email'] =  $get_email;
    //echo $email;
    // echo '<br>';
    $_SESSION['pw'] = $get_password;
    // echo $pw;
    //echo '<br>';

    var_dump($_SESSION);
    //echo '<br>';





} elseif (count($flag) >= 3) {
    $errorMessage = "Непредвиденная ошибка!";
    include 'errors.php';
    exit;
}







