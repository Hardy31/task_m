<?php

session_start();
include 'function.php';

//обнуление
logout();

header('Location: index.php');
