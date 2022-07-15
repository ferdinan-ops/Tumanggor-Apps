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
    include "inc/config.php";
    if (!empty($_POST['teks'])) {
        $teks = $_POST['teks'];
    ?>
        <form class="menu-cari" method="POST" style="background-color: #fff;">
            <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="teks" placeholder="Cari Produk">
            </div>
            <div class="search-product">
                <input type="submit" value="Cari">
            </div>
        </form>
        <div class="list-kategori  search-section">
            <?php
            $sqlKategori = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
            while ($de = mysqli_fetch_array($sqlKategori)) {
            ?>
                <div class="kategori">
                    <a href="./?m=search&ktg=<?= $de["id"] ?>"><?= $de["nama_kategori"] ?></a>
                </div>
            <?php
            }
            ?>
        </div>
        <section class="list-product">
            <?php
            $sqlProduk = mysqli_query($konek, "SELECT * FROM barang WHERE nama_barang LIKE '%$teks%'");
            while ($k = mysqli_fetch_array($sqlProduk)) {
            ?>
                <div class="product">
                    <img src="barang/<?= $k['lokasi'] ?>" width="120px">
                    <div class="desc-product">
                        <div class="desc">
                            <a href="./?m=detail&id=<?= $k['id'] ?>" class="namaBarang">
                                <?= $k["nama_barang"] ?>
                            </a>
                            <span>Rp
                                <?= number_format($k["harga_jual"], 0, ",", ".") ?>
                            </span>
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
    <?php
    } elseif (!empty($_GET['ktg'])) {
    ?>
        <form class="menu-cari" method="POST" style="background-color: #fff;">
            <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="teks" placeholder="Cari Produk">
            </div>
            <div class="search-product">
                <input type="submit" value="Cari">
            </div>
        </form>
        <div class="list-kategori  search-section">
            <?php
            $sqlKategori = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
            while ($de = mysqli_fetch_array($sqlKategori)) {
            ?>
                <div class="kategori">
                    <a href="./?m=search&ktg=<?= $de["id"] ?>"><?= $de["nama_kategori"] ?></a>
                </div>
            <?php
            }
            ?>
        </div>
        <section class="list-product">
            <?php
            $sqlProduk = mysqli_query($konek, "SELECT * FROM barang WHERE id_kategori='$_GET[ktg]'");
            while ($k = mysqli_fetch_array($sqlProduk)) {
            ?>
                <div class="product">
                    <img src="barang/<?= $k['lokasi'] ?>" width="120px">
                    <div class="desc-product">
                        <div class="desc">
                            <a href="./?m=detail&id=<?= $k['id'] ?>" class="namaBarang">
                                <?= $k["nama_barang"] ?>
                            </a>
                            <span>Rp
                                <?= number_format($k["harga_jual"], 0, ",", ".") ?>
                            </span>
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
    <?php
    } else {
        header("Location: ./");
    }
    ?>
</body>

</html>