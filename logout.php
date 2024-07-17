<?php 
session_start();
session_unset();
session_destroy(); //destroy the session
if(empty($_SESSION['session_username'])){
    header("location:login.php");
}
exit();
?>