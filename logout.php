<?php

session_start();

echo 'Это файл для обнулении СЕСИИ ';
echo '<br>';
var_dump($_SESSION);
echo '<br>';
//обнуление


if (!isset($_SESSION['user_id'])) {

    unset($_SESSION);
    session_destroy();
    echo "Выход осуществлен успешно." . "<br>";
}


var_dump($_SESSION);
echo '<br>';

header('Location: login-form.php');
