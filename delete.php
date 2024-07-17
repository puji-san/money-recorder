<?php
include("connect.php");
include("header.php");

//variable
$idTransaksi = $_GET['id'];
$error = "";
$status = "";

function popAlert($text){
    echo "<script type='text/javascript'>";
    echo "alert('$text');" ;
    echo "window.location = 'riwayat.php';" ;
    echo "</script>" ;
}

$sql = "SELECT * FROM history WHERE id_history = '$idTransaksi'";
$query = mysqli_query($connect, $sql);
$result = mysqli_num_rows($query);
$data = mysqli_fetch_assoc($query);

if($_SESSION ['session_id'] == $data['id_user']){
    $sql = "DELETE FROM history WHERE id_history = '$idTransaksi'";
    $query1 = mysqli_query($connect, $sql);

    if($query1){
        $status = "Success";
    } else{
        $status = "Failed";
    }

    if($status =="Success"){
        $msg = popAlert ("Data Berhasil Dihapus!");
    } else{
        $msg = popAlert(" Terjadi Kesalahan Saat Menghapus Data!");
    }

} else{
    $msg = popAlert("Akses Terlarang!");
}
?>

<!DOCTYPE html>
<html>
    <header>
        <title>Delete Transaksi</title>
    </header>
<body>
    <?php $msg ?>
</body>
</html>