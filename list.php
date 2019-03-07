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

//var_dump($_SESSION);
/*
echo 'ВарДамп SESSION';
var_dump($_SESSION);
echo 'ВарДамп COOKIE';
var_dump($_COOKIE);
*/


//подготовка запроса

$tabl = 'tasks';
$key ='id_user';
$value = $_SESSION['id_user'];
$tasks = select_condit ($sql, $access_root, $pw_root,$tabl, $key, $value);
//var_dump($tasks);

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <title>Tasks</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>

    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">О проекте</h4>
              <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white"> <?php echo $_SESSION['email']?> </h4>
                <h4 class="text-white"> <?php echo $_SESSION['name']?> </h4>
              <ul class="list-unstyled">
                <li><a href="show_general.php" class="text-white">посмотреть все общедоступные задачи</a></li>
                <li><a href="logout.php" class="text-white">Выйти</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
            <strong>Tasks    </strong>
            <strong><?php echo ' '.$_SESSION['name']?></strong>

          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">

      <section class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Проект Task-manager</h1>
          <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
          <p>
            <a href="create-form.php" class="btn btn-primary my-2">Добавить запись</a>
          </p>
        </div>
      </section>

     <?php foreach ($tasks as $task):?>
      <div class="album py-5 bg-light">
        <div class="container">

          <div class="row">
             <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/<?php echo $task['post_picture'];?>">
                <div class="card-body">
                  <p class="card-text"><?php echo $task['post_name'];?></p>
                    <p class="card-text"><?php echo $task['post_status'];?></p>
                    <p class="card-text"><?php echo $task['post_descrip'];?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="<?php echo "show.php?id_post=".$task['id_post']?>#" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                      <a href="<?php echo "edit-form.php?id_post=".$task['id_post']?>" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="<?php echo "delete.php?id_post=".$task['id_post']?>" class="btn btn-sm btn-outline-secondary" >Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--<div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <img class="card-img-top" src="assets/img/no-image.jpg">
                <div class="card-body">
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a href="#" class="btn btn-sm btn-outline-secondary">Просмотреть</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Изменить</a>
                      <a href="#" class="btn btn-sm btn-outline-secondary">Удалить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
     <?php endforeach;?>

    </main>

    <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Наверх</a>
        </p>
        <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
        <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>
