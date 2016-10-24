<?php
  class RegisterController {
     public function registerPage() {      
      require_once('views/register/register.php');
    }
    
    public function register() {
      /*if (!isset($_POST['inputUser']))
        return call('pages', 'error');*/
      //session_start();
      
     
      $password=$_POST['inputPassword'];
      $username = $_POST['inputUser'];
      $last_name  = 'Snow';
     
     $validUser = Register::insert($username ,$password);
     if(!$validUser){
        //echo "sd";
        return call('login', 'invalid');
        //$this->login();
     }
        
     
        //require_once('views/login/welcome.php');
        header("Location: index.php");
        
      
    }
    public function invalid(){
        require_once('views/login/invalid.php');
    }
  }
?>