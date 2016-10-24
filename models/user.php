<?php
  class User {
    
    public $name;
    public $author;
    public $content;   

    

    public static function find($name, $password) {
      $conn = mysqliDB::getConn();
      $name=$conn->real_escape_string($name);
      $password=$conn->real_escape_string($password);
     
      $sql=(" SELECT login,userid FROM  user WHERE login = '$name' AND password = '$password'");
      //$sql->mbind_param('s',$name);
       //$sql->mbind_param('s',$password);
      //$sql->bind_param('ss', $name,$password);         
      //echo "$conn";
       //
      $result = mysqli_query($conn, $sql);
       var_dump($result);         
      //$sql->bind_result($user);
      /*while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
         $_SESSION['username']=$row['login'];
    }*/

     if (mysqli_num_rows($result) > 0) {
       while($row = mysqli_fetch_assoc($result)){
         $_SESSION['username']=$row['login'];
         $_SESSION['userid']=$row['userid'];
       }
        //$_SESSION['username']=$name;
          	return true;
      }
      else {
          return false;
      } /*
      var_dump($result);
      if($sql->execute() === TRUE) {
        $_SESSION['username']=$name;
          	return true;
      }
      else {
          return false;
      }*/
      $sql->close();
      mysqli_close($conn);
      exit();
      
    }
  }
?>