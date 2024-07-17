<?php
session_start();

if(empty($_SESSION['session_username'])){
    header("location:login.php");
}else{
    header("location:riwayat.php");
}
?>