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
    <style>
        .menu .menu-list:nth-child(2) {
            color: var(--primary-color);
        }

        .menu .menu-list:nth-child(1) {
            color: var(--icon-color);
        }

        .menu .menu-list:nth-child(1):hover,
        .menu .menu-list:nth-child(3):hover,
        .menu .menu-list:nth-child(4):hover {
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <header>
        <div class="hamburger">
            <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
        </div>
        <h5>Barang</h5>
        <!-- <h1>Barang</h1> -->
        <div class="profile-picture">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </header>
    <section class="barang">
        <a href="./?m=tambah-barang" class="tambah-barang">Tambah Barang</a>
        <div class="punya-barang">
            <a class="mamak" href="#">
                <i class="uil uil-shopping-bag shop"></i>
                <p>Punya Mamak</p>
            </a>
            <a class="bapak" href="#">
                <i class="uil uil-shopping-bag shop"></i>
                <p>Punya Bapak</p>
            </a>
        </div>
    </section>
    <section class="product-table">
        <h4>Daftar Barang</h4>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Punya</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlBarang = mysqli_query($konek, "SELECT * FROM barang ORDER BY id DESC");
                while ($k = mysqli_fetch_array($sqlBarang)) {
                ?>
                    <tr>
                        <td><?= $k["nama_barang"] ?></td>
                        <td><?= $k["stok"] ?></td>
                        <td>Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?></td>
                        <td><?= $k["punya"] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <section class="menu">
        <a href="./" class="menu-list">
            <i class="fa-solid fa-house"></i>
            <span>Beranda</span>
        </a>
        <a href="#" class="menu-list">
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
</body>

</html>