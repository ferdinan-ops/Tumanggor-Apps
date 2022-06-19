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
    <link rel="stylesheet" href="inc/style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="icon" type="icon/x-image" href="images/logo.png">
</head>

<body>
    <?php
    if (isset($_GET['m'])) {
        if ($_GET['m'] == 'barang') {
            include 'barang/barang.php';
        } elseif ($_GET['m'] == 'detail') {
            include 'detail.php';
        } elseif ($_GET['m'] == 'search') {
            include 'search.php';
        } elseif ($_GET['m'] == 'tambah-kategori') {
            include 'kategori/kategori.php';
        }
    } else {
    ?>
        <header>
            <div class="hamburger">
                <i class="uil uil-shopping-bag shop"></i>
            </div>
            <div class="profile-picture">
                <img src="images/logo.png" width="50px">
            </div>
        </header>
        <h2 class="judul">Produk</h2>

        <form action="search.php" class="search" method="POST">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="teks" placeholder="Cari Produk">
            </div>
            <div class="search-product">
                <input type="submit" value="Cari">
            </div>
        </form>
        <h3 class="judul" style="font-weight: 500;">Kategori</h3>
        <div class="list-kategori">
            <div class="kategori">
                <span>Helm</span>
            </div>
            <div class="kategori">
                <span>Baterai</span>
            </div>
            <div class="kategori">
                <span>Jok</span>
            </div>
            <div class="kategori">
                <span>Aksesoris</span>
            </div>
            <div class="kategori">
                <span>Seken</span>
            </div>
            <div class="kategori">
                <span>Seken</span>
            </div>
            <div class="kategori">
                <span>Seken</span>
            </div>
        </div>
        <section class="list-product">
            <?php
            $sqlProduk = mysqli_query($konek, "SELECT * FROM barang ORDER BY id DESC");
            while ($k = mysqli_fetch_array($sqlProduk)) {
            ?>
                <div class="product">
                    <img src="barang/<?= $k["lokasi"] ?>" width="120px">
                    <div class="desc-product">
                        <div class="desc">
                            <a href="./?m=detail&id=<?= $k['id'] ?>" class="namaBarang"><?= $k["nama_barang"] ?></a>
                            <span>Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?></span>
                        </div>
                        <div class="add">
                            <a href="#"><i class="fa-solid fa-plus"></i> Keranjang</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
        <section class="menu">
            <a href="#" class="menu-list">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </a>
            <a href="./?m=barang" class="menu-list">
                <i class="fa-solid fa-box"></i>
                <span>Barang</span>
            </a>
            <a href="#" class="menu-list">
                <i class="fa-solid fa-bag-shopping"></i>
                <span>Keranjang</span>
            </a>
            <a href="#" class="menu-list">
                <i class="fa-solid fa-file"></i>
                <span>Laporan</span>
            </a>
        </section>
    <?php
    }
    ?>
</body>

</html>