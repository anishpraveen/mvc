<!DOCTYPE html>
<html>

<head>
    
   </head>

<body>
<?php 
    session_start();
 if(!isset($_SESSION['username']) ){
         header("Location: index.php");
        }
if ($_SERVER["REQUEST_METHOD"] == "POST"){

   
    session_destroy();
     echo "<script >";
     echo "alert('logged out');";
     echo "</script>";  

     $url='index.php';
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;  
    }

?>

        <div id="divContent" >
             
            
            <form id="formLogout" action="" method="POST" name="formLogout">
               <input type="submit" name="submit" value="Logout"><br>
            </form>
            <p id="pMessage"></p>
        </div>

</body>
</html>