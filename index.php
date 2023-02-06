<?php

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require_once 'function.php';


$siswa = query("SELECT * FROM siswa");



//tombol cari ditekan 
if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>

    <a href="logout.php">Log Out</a>

    <br><br>

    <a href="tambah.php">Tambah Data</a>

    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40px" autofocus placeholder="masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari!</button>
    </form>

    <br>

    <div id="container">

        <table border="1">
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>Gambar</td>
                <td>Action</td>
            </tr>

            <?php
            $i = 1;
            foreach ($siswa as $value) {
            ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $value['nama']; ?></td>
                    <td><?= $value['alamat']; ?></td>
                    <td><img src="img/<?= $value['gambar']; ?>" alt="" width="50"></td>
                    <td>
                        <a href="edit.php?id=<?= $value['id']; ?>">Edit</a>
                        <a href="hapus.php?id=<?= $value['id']; ?>" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </table>

    </div>

    <script src="js/script.js"></script>

</body>

</html>