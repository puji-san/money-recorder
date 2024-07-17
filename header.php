<?php
session_start();

if(empty($_SESSION['session_username'])){
    header('location: login.php');
} else{
    $username = $_SESSION['session_username'];
}

?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Money Record</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <!-- <script>
		function logoutValidate() {
			let text = "anda yakin mau logout?";
			if (confirm(text) == true) {
				window.location.href = './logout.php';
			} 
		}
	</script>  -->
        <header>
            <h1> Money Record </h1>
            <nav>
                <ul>
                    <li>
                        <a href="transaksi.php">Rekam Transaksi</a>
                    </li>
                    <li>
                        <a href="riwayat.php">Riwayat Transaksi</a>
                    </li>
                    <li>
                        <a href="profile.php">halo, <?php echo $username ?></a>
                    </li>
                    <li>
                        <a href="logout.php" class="logout-btn">Logout</a>
                    </li>
                </ul>
            </nav>
        </header>
    </body>
</html>