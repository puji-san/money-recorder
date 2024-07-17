<?php
include('header.php');
$username = "";
if(empty($_SESSION['session_username'])){
    header('location: login.php');
} else{
    $username = $_SESSION['session_username'];
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Profile Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="transaction-box">
            <h2>Profile</h2>
            <p><?php echo "halo ", $username, "!, Anda sudah login."; ?>
        </div>
    </body>
</html>