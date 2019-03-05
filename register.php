<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'function.php';
include 'config.php';


//Получение данных из глобального массива $_POST
$get_name = $_POST['get_name'];
$get_email = $_POST['get_email'];
$get_passwored = $_POST['get_password'];


//Проверка данных на заполненность и вывод сообщения о том какая первая переменная пустая
foreach ($_POST as $key =>$input){
    if (empty($input)){
        $errorMessage = "незаполнено поле $key";
                include 'errors.php';
        exit;
    }
}


//Проверка пользователя на совподение name и EMail
$tabl = 'users';

$data = [
    'name' => $_POST['get_name'],
    'email' => $_POST['get_email']
];
foreach ($data as $key => $value){
    echo $key;
    echo '    ';
    echo $value;
    $result = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);
    //var_dump ($result);
    if (isset($result[0][$key]) ){
        $errorMessage = "Пользователь с таким  $key  уже существует!";
        include 'errors.php';
        exit;
    }
}



//Запись нового пользователя в БД

$tabl = 'users';

$data = [
    'name' => $_POST['get_name'],
    'email' => $_POST['get_email'],
    'pw' => md5 ($_POST['get_password'])
];
create ($sql, $access_root, $pw_root,$tabl, $data);

header('Location: /login-form.php');
exit;
?>
