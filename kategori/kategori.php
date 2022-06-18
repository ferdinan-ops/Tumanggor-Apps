<?php
include "inc/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tumanggor Apps</title>
    <script src="https://kit.fontawesome.com/ca43952785.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="inc/style.css">
</head>

<body>
    <header>
        <div class="hamburger">
            <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
        </div>
        <h4>Tambah Kategori</h4>
        <div class="profile-picture">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </header>
    <section class="form-tambah-barang">
        <form action="kategori/proses-tambah.php" method="POST">
            <label for="">Nama Kategori</label>
            <input type="text" name="kategori" id="">
            <input type="submit" name="submit" value="Kirim">
        </form>
    </section>
</body>

</html>