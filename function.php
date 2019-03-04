<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';

/*
//функция записи нового пользователя в БД

function add_new_user ($sql, $access_root, $pw_root,$get_name,$get_email,$get_passwoed)
{
    $pdo = new PDO($sql, $access_root, $pw_root);
    $request = 'INSERT INTO users( name, email, pw) VALUES (:name, :email, :pw)';
    $arry = [':name' => $get_name, ':email' => $get_email, ':pw' => $get_passwoed];

    var_dump($arry);
    $sth = $pdo->prepare($request);
    $sth->execute($arry);
    var_dump($sth);
}
*/

//функция записи в БД

function create ($sql, $access_root, $pw_root,$tabl, $data)
{

    $pdo = new PDO($sql, $access_root, $pw_root);       //подключение к БД

    // подготовка плейсходлера
    $key_data = array_keys($data);
    //var_dump($key_data);
    $key_name = implode(', ',$key_data);
    //var_dump($key_name);
    $key_value = ':'.implode(', :',$key_data);
    //var_dump($key_value);

    $request = "INSERT INTO {$tabl} ( {$key_name}) VALUES ({$key_value})";
    echo $request;
    $sth = $pdo->prepare($request);
    $sth->execute($data);
    //var_dump($sth);
}


//функция поиска в БД
function select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value)
{

$pdo = new PDO($sql, $access_root, $pw_root);       //подключение к БД
//var_dump($pdo);

    $condition = $key.' = \''.$value.'\'';
    //echo $condition;
    $request = "SELECT * FROM {$tabl} WHERE {$condition}";   //подготовили запрос
    //echo $request;
    $statement = $pdo->prepare($request);                     //Подготовленный запрос отправили в метод Препер объекта ПДО и результат присвоили переменной СТХ
    $statement->execute();
    $arrs = $statement->fetchAll(PDO::FETCH_ASSOC);

    var_dump($arrs);

    return $arrs;
}


?>