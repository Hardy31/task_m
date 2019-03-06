<?php
session_start();

if (isset($_COOKIE['id_user'])) {
    header('Location: /login-form.php');
    exit;
}
/*
echo 'ВарДамп SESSION';
var_dump($_SESSION);
echo 'ВарДамп COOKIE';
var_dump($_COOKIE);
*/
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Create Task</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
      
    </style>
  </head>

  <body>
    <div class="form-wrapper text-center">
      <form class="form-signin" action="create.php" method="post">

        <img class="mb-4" src="assets/img/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Добавить запись</h1>

        <label for="inputEmail" class="sr-only">Название</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Название" name="get_post_name">

        <label for="inputEmail" class="sr-only">Описание</label>
        <textarea  class="form-control" cols="30" rows="10" placeholder="Описание" name="get_post_descrip"></textarea>

        <input type="file">

          <select class="custom-select" name="get_post_status">
              <option selected>Open this select menu</option>
              <option selected value="draft"> draft</option>
              <option value="private">private</option>
              <option value="general">general</option>
          </select>


        <button class="btn btn-lg btn-primary btn-block" type="submit">Отправить</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
      </form>
    </div>
  </body>
</html>
