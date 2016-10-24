<?php
include_once 'nof5.phar';

  require_once('connection.php');
  session_start();
  //echo $_SESSION['username'];
  

{
  if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }
}
  require_once('views/layout.php');
?>
