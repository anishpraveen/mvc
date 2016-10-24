<?php
  function call($controller, $action) {
    //echo ('controllers/' . $controller . '_controller.php'); echo ' '.  $action.'\n ';   
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        $controller = new PagesController();
        if(!isset($_SESSION['username']) ){
          $controller = 'login';
          require_once('controllers/' . $controller . '_controller.php');
          require_once('models/user.php');
          $controller = new LoginController();
          
          $action     = 'login';
        }
      break;
      case 'posts':
        // we need the model to query the database later in the controller
        require_once('models/post.php');
        $controller = new PostsController();
         if(!isset($_SESSION['username']) ){
          $controller = 'login';
          require_once('controllers/' . $controller . '_controller.php');
          require_once('models/user.php');
          $controller = new LoginController();
          
          $action     = 'login';
        }
      break;
      case 'login':   
        require_once('models/user.php');
        $controller = new LoginController();
      break;
      case 'register':   
        require_once('models/register.php');        
        $controller = new RegisterController();
      break;
    }

    $controller->{ $action }();
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'posts' => ['index', 'show', 'add', 'delete'],
                       'login'=> ['login','success','invalid','check'],
                       'register'=> ['registerPage','register']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>