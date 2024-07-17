<?php
include('header.php');
include('connect.php');

$idUser = $_SESSION['session_id'];
$path = "http://localhost/money-recorder/";

$sql = "SELECT * FROM history WHERE id_user = '$idUser' ORDER BY  id_history DESC";
$query = mysqli_query($connect, $sql);
$result = mysqli_num_rows($query);
?>

<!DOCTYPE HTML>
<html>
    <head> 
        <title>Riwayat Transaksi</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <main>
        <h2>Riwayat Transaksi</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($result > 0){
                        $no = 0;
                        while ($data = mysqli_fetch_assoc($query)){
                            $no++;
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['date']; ?></td>
                                    <td><?php echo $data['detail']; ?></td>
                                    <td><?php echo $data['category']; ?></td>
                                    <td><?php echo "Rp.", $data['total']; ?></td>
                                    <td>
                                        <a href= <?php echo $path, 'edit.php?id=', $data['id_history']; ?> class ="edit">Edit</a> 
                                        <a href= <?php echo $path, 'delete.php?id=', $data['id_history']; ?> class ="delete">Hapus</a> 
                                    </td>
                                </tr>
                            <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </main>
    </body>
</html>