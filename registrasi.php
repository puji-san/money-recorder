<?php
include("connect.php");
session_start();

//variable
$fullname = "";
$username = "";
$password = "";
$confPassword = "";
$error = "";
$status = "";

function notifUp($notifClass,$notif){
    return "<div class = '$notifClass'>
    <p>$notif</p>
    </div>";
}

if(isset($_POST['registration'])){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confPassword = $_POST['confpassword'];
    $hashPassword = md5($password);

    $sql1 = "SELECT * FROM users WHERE username='$username'";
    $query1 = mysqli_query($connect, $sql1);
    $result1 = mysqli_fetch_array($query1);

    if($result1) {
        $error = notifUp("warning-msg", "Username sudah terdaftar, Silakan login!");
    } else {
        if($password != $confPassword){
            $error = notifUp("warning-msg", "Konfirmasi Password Tidak sesuai");
        } else{        
            $sql = "INSERT INTO users(fullname, username, password) VALUES ('$fullname','$username','$hashPassword')";
            $result = mysqli_query($connect, $sql);

            if(empty($result)){
                $error = notifUp("warning-msg", "Terjadi Kesalahan Saat Input Data!");
            } else {
                header('Location: login.php');
            }
        }
    }    
}


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Registration Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="login-box">
            <h2>Daftar</h2>
            <p><?php echo $error?></p>
            <form action="" method="post">

                <label>Full Name</label>
                <input type="text" name="fullname" value="<?php echo $fullname ?>" placeholder="Enter Full Name" required>

                <label>Username</label>
                <input type="text" name="username" value="<?php echo $username ?>" placeholder="Enter Username" required>

                <label>Password</label>
                <input type="password" name="password" value="<?php echo $password ?>" placeholder="Enter Password" required>

                <label>Confirm Password</label>
                <input type="password" name="confpassword" value="<?php echo $confPassword ?>" placeholder="Enter Confirm Password" required>

                <input type="submit" name="registration" value="Daftar">
                <div>
                    <p>Sudah akun? <a href="login.php">Masuk!</a></p>
                </div>
            </form>
        </div>
    </body>
</html>