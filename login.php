<?php
include("connect.php");
session_start();

//variable
$username = "";
$password = "";
$error = "";
$status = "";

function notifUp($notifClass,$notif){
    return "<div class = '$notifClass'>
    <p>$notif</p>
    </div>";
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $query = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($query);

    if(empty($result)){
        $error = notifUp("warning-msg", "Username Tidak Tersedia!");
    } elseif($result['password'] != md5($password)) {
        $error = notifUp("warning-msg", "Password Tidak Sesuai!");
    } else{
        $_SESSION['session_username'] = $username;
        $_SESSION['session_id'] = $result['id_user'];
        header("location:profile.php");
    }

}


?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="login-box">
            <h2>Login</h2>
            <p><?php echo $error?></p>
            <form action="" method="post">
                <label>Username</label>
                <input type="text" name="username" placeholder="Enter Username" required>
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" name="login" value="Login">
                <div>
                    <p>Belum punya akun? <a href="registrasi.php">Daftar!</a></p>
                </div>
            </form>
        </div>
    </body>
</html>