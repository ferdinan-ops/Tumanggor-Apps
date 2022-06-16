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
        <h4>Tambah Barang</h4>
        <div class="profile-picture">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </header>
    <section class="form-tambah-barang">
        <form action="barang/proses-tambah.php" method="POST" enctype="multipart/form-data">
            <label for="">Nama Barang</label>
            <input type="text" name="nama" id="">
            <label for="">Stok</label>
            <input type="text" name="stok" id="">
            <label for="">Harga Modal</label>
            <input type="text" name="modal" id="">
            <label for="">Harga Jual</label>
            <input type="text" name="jual" id="">
            <label for="">Harga korting</label>
            <input type="text" name="korting" id="">
            <label for="">Punya</label>
            <select name="punya" id="">
                <option value="Mamak">Mamak</option>
                <option value="Bapak">Bapak</option>
            </select>
            <label for="">Letak</label>
            <select name="rak">
                <?php
                $sqlRak = mysqli_query($konek, "SELECT * FROM gudang ORDER BY nama_rak ASC");
                while ($k = mysqli_fetch_array($sqlRak)) {
                ?>
                    <option value="<?= $k["id"] ?>"><?= $k["nama_rak"] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="">Kategori</label>
            <select name="kategori">
                <?php
                $sqlKategori = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
                while ($k = mysqli_fetch_array($sqlKategori)) {
                ?>
                    <option value="<?= $k["id"] ?>"><?= $k["nama_kategori"] ?></option>
                <?php
                }
                ?>
            </select>
            <label for="">Foto Barang</label>
            <input type="file" name="image" id="">
            <input type="submit" name="submit" value="Kirim">
        </form>
    </section>
</body>

</html>