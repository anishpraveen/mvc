<?php
  class LoginController {
    public function login() {      
      require_once('views/login/login.php');
    }

    public function check() {
      /*if (!isset($_POST['inputUser']))
        return call('pages', 'error');*/
      //session_start();
      if (strcmp($_POST['inputUser'],"")!=0 && strcmp($_POST['inputPassword'],"")!=0){
          // =$_POST['inputUser'];
            $password=$_POST['inputPassword'];
            $username = $_POST['inputUser'];
            $last_name  = 'Snow';
          
          $validUser = User::find($username ,$password);
          if(!$validUser)
              return call('login', 'invalid');
              //$this->login();
          
              //require_once('views/login/welcome.php');
            else
              header("Location: index.php");
      }
      
    }
    public function invalid(){
        require_once('views/login/invalid.php');
    }
  }
?>