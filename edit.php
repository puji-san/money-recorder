<?php
include("connect.php");
include("header.php");

//variable
$idTransaksi = $_GET['id'];
$tanggal = "";
$kategori = "";
$keterangan = "";
$jumlah = ""; 
$updateAt = date('y-m-d');
$idUser = $_SESSION["session_id"];
$error = "";
$status = "";
$massage = "";

function notifUp($notifClass,$notif){
    return "<div class = '$notifClass'>
    <p>$notif</p>
    </div>";
}

$sql1 = "SELECT * FROM history WHERE id_history = '$idTransaksi'";
$query1 = mysqli_query($connect, $sql1);
$result1 = mysqli_num_rows($query1);
$data = mysqli_fetch_assoc($query1);

$tanggal = $data['date'];
$kategori = $data['category'];
$keterangan = $data['detail'];
$jumlah = $data['total'];

function popAlert($text){
	echo "<script>alert('$text');</script>"; 
}

if(isset($_POST["perbarui"])){
    $tanggal = $_POST["date"];
    $kategori = $_POST["kategori"];
    $keterangan = $_POST["keterangan"];
    $jumlah = $_POST["jumlah"];

    $sql = "UPDATE history SET date='$tanggal', category='$kategori', 
            detail='$keterangan', total='$jumlah', updated_at='$updateAt'
            WHERE id_history='$idTransaksi'"; 
    $query = mysqli_query($connect, $sql);


    if(empty($query)){
        $status = "Failed";
    } else {
        $status = "Success";
    }

    if($status == "Success"){
        $massage = popAlert("Data transaksi berhasil diperbarui!");
        //header("location:riwayat.php");
    } else {
        $massage = popAlert("Terjadi kesalahan saat memperbarui data!");
    }
}
?>



<!DOCTYPE HTML>
<html>
    <head>
        <title>Edit Transaksi</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="transaction-box">
            <h2>Edit Transaksi</h2>
            <p><?php echo $error?></p>
            <form action="" method="post">

                <label>Tanggal Transaksi</label>
                <input type="date" name="date" value="<?php echo $tanggal ?>" required>

                <label>Kategori</label>
                <input type="text" name="kategori" value="<?php echo $kategori ?>" readonly>

                <label>Keterangan</label>
                <input type="text" name="keterangan" value="<?php echo $keterangan ?>" placeholder="tulis keterangan" required>
                
                <label>Jumlah</label>
                <input type="number" name="jumlah" value="<?php echo $jumlah ?>" placeholder="tulis keterangan" required>

                <input type="submit" name="perbarui" value="Perbarui Transaksi">
               
            </form>
        </div>
    </body>
</html>