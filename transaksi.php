<?php
include("connect.php");
include("header.php");

//variable
$tanggal = "";
$kategori = "";
$keterangan = "";
$jumlah = ""; 
$createAt = date('y-m-d');
$idUser = $_SESSION["session_id"];
$error = "";

function notifUp($notifClass,$notif){
    return "<div class = '$notifClass'>
    <p>$notif</p>
    </div>";
}

if(isset($_POST["simpan"])){
    $tanggal = $_POST["date"];
    $kategori = $_POST["kategori"];
    $keterangan = $_POST["keterangan"];
    $jumlah = $_POST["jumlah"];

    $sql = "INSERT INTO history(id_user, date, detail, category, total, created_at, updated_at) 
                        VALUES ('$idUser','$tanggal','$keterangan','$kategori','$jumlah','$createAt','$createAt')";

    $query = mysqli_query($connect, $sql);

    
    if(empty($query)){
        $error = notifUp("warning-msg", "Terjadi Kesalahan Saat Input Data!");
    } else {
        header('Location: riwayat.php');
    }
}
?>



<!DOCTYPE HTML>
<html>
    <head>
        <title>Input Transaksi</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="transaction-box">
            <h2>Input Transaksi</h2>
            <p><?php echo $error?></p>
            <form action="" method="post">

                <label>Tanggal Transaksi</label>
                <input type="date" name="date" required>

                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="Uang Masuk">Uang Masuk</option>
                    <option value="Uang Keluar">Uang Keluar</option>
                </select>

                <label>Keterangan</label>
                <input type="text" name="keterangan" placeholder="tulis keterangan" required>
                
                <label>Jumlah</label>
                <input type="number" name="jumlah" placeholder="tulis keterangan" required>

                <input type="submit" name="simpan" value="Simpan Transaksi">
               
            </form>
        </div>
    </body>
</html>
