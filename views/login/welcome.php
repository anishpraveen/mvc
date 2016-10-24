Welcome

<?php 

//session_start();
if(isset($_SESSION['username']) && !is_null($_SESSION['username'])){
 echo $_SESSION['username']; 

}

else{
    echo "Invalid";
    return call('pages', 'error');
}
?>