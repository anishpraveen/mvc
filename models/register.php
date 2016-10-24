<?php
  class Register {
    
    public $name;   

     public function registerPage() {      
      require_once('views/login/login.php');
    }

    public static function insert($name, $password) {
      $conn = mysqliDB::getConn();
      $sql=$conn->prepare(" INSERT INTO `user`(`login`, `password`) VALUES (?, ?)");
      $sql->bind_param('ss', $name,$password);               
      //echo "$conn";
      if ($sql->execute() === TRUE) {
          $id= $sql->insert_id;
          $pMessage= "Record Added successfully";
          $_SESSION['username']=$name;
          $_SESSION['userid']=$id;
          $conn->close();
          return TRUE;
      } else {
          $pMessage= "Error Adding record: " . $conn->error;
          return FALSE;
      }

      $conn->close();
      return $id;
      
    }
  }
?>