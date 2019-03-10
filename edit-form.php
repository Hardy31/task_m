<?php

session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include 'function.php';
include 'config.php';

//незарегистрированный в сесии пользователь возвращается на страницу login-form.php
if (!isset($_SESSION['id_user'])) {
    header('Location: /login-form.php');
    exit;
}

$tabl = 'tasks';
$key = 'id_post';
$value = $_GET['id_post'];
$result = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Edit Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="edit.php" method="post" novalidate enctype="multipart/form-data">
        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Изменить запись</h1>
        <input type="text"  id="inputEmail" class="form-control" placeholder="Название" required value=<?php echo $result[0]['id_user']; ?> name="get_id_users" hidden>
        <input type="text"  id="inputEmail" class="form-control" placeholder="Название" required value=<?php echo $result[0]['id_post']; ?> name="get_id_post" hidden>
        <label for="inputEmail" class="sr-only">Название</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Название" required value=<?php echo $result[0]['post_name']; ?> name="get_post_name">
        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea  class="form-control" cols="30" rows="10" placeholder="Описание" name="get_post_descrip"><?php echo $result[0]['post_descrip'];?></textarea>


        <input type="file" name="image" > <br>


          <select class="custom-select" name="get_post_status">
              <option selected>Open this select menu</option>
              <option selected value="draft"> draft</option>
              <option value="private">private</option>
              <option value="general">general</option>
          </select>



          <img src="assets/img/no-image.jpg" alt="" width="300" class="mb-3">
        <button class="btn btn-lg btn-success btn-block" type="submit">Редактировать</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
