<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'config.php';


//функция удаления сессии
function logout ()
{
    if (!isset($_SESSION['user_id'])) {

        unset($_SESSION);
        session_destroy();
        echo "Выход осуществлен успешно." . "<br>";
    }
}

function error($verifiable, $messge)
{
    if ($verifiable){
        $errorMessage = "$messge";
        include 'errors.php';
        exit;
    }

}


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
    //echo $request;
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
    $statement = $pdo->prepare($request);
    $statement->execute();
    $arrs = $statement->fetchAll(PDO::FETCH_ASSOC);

    //var_dump($arrs);

    return $arrs;
}

//функция удаления из  БД
function delete ($sql, $access_root, $pw_root,$tabl, $key, $value)
{

    $pdo = new PDO($sql, $access_root, $pw_root);       //подключение к БД
//var_dump($pdo);

    $condition = $key.' = \''.$value.'\'';
   // echo $condition;
    $request = "DELETE FROM {$tabl} WHERE {$condition}";   //подготовили запрос
    //echo $request;
    $statement = $pdo->prepare($request);
    $statement->execute();


}


//функция функция изменения  в БД
//$data - массив содержащий все поля таблици
//$key - массив содержащий один элемент

function update ($sql, $access_root, $pw_root, $tabl, $data, $key)
{

    $pdo = new PDO($sql, $access_root, $pw_root);       //подключение к БД
    //echo 'ВарДамп $data';
    //var_dump($data);
    $glues ='';

    foreach ($data as  $key_data => $value_data){   //формирую запрос
        $glue = $key_data.'=:'.$key_data;
        $glues = $glues.", ".$glue;
        //echo $glues;
        //echo '<br>';

    }

    $glues = substr($glues,2);              //Удаляю первые два символа


    //echo $glues;
    //echo '<br>';
    $request = "UPDATE {$tabl} SET {$glues} WHERE {$key}";   //подготовили запрос
    //echo $request;
    $statement = $pdo->prepare($request);
    $statement->execute($data);
    //var_dump($statement);

}



?>
































