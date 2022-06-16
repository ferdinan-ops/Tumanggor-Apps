<?php
include "inc/config.php";
if (isset($_GET['id'])) {
    $sql = mysqli_query($konek, "SELECT * FROM barang WHERE $_GET[id]=id");
    while ($k = mysqli_fetch_array($sql)) {
?>

        <body>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h4>Helm</h4>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="img-detail">
                <img src="barang/<?= $k["lokasi"] ?>" width="80%">
            </section>
            <section class="product-name">
                <h3><?= $k["nama_barang"] ?></h3>
                <span>Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?></span>
            </section>
            <section class="detail-product">
                <h4>Detail Produk</h4>
                <table cellspacing="0">
                    <tr>
                        <td>Stok</td>
                        <td><?= $k["stok"] ?></td>
                    </tr>
                    <tr>
                        <td>Lokasi</td>
                        <td>Rak 2</td>
                    </tr>
                    <tr>
                        <td>Punya</td>
                        <td><?= $k["punya"] ?></td>
                    </tr>
                    <tr>
                        <td>Harga Modal</td>
                        <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                    </tr>
                    <tr>
                        <td>Harga Jual</td>
                        <td>Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?></td>
                    </tr>
                    <tr>
                        <td>Harga Korting</td>
                        <td>Rp <?= number_format($k["harga_korting"], 0, ",", ".") ?></td>
                    </tr>
                </table>
            </section>
            <section class="menu-detail">
                <div class="container-menu-detail">
                    <a href="#">Edit Barang</a>
                    <a href="#">Tambah Stok</a>
                    <a href="#">Tambah Ke Keranjang</a>
                </div>
            </section>
        </body>

<?php
    }
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tumanggor Apps</title>
    <script src="https://kit.fontawesome.com/ca43952785.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="inc/style.css">
</head> -->


<!-- </html> -->