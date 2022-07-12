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
    <link rel="stylesheet" href="inc/laporan.css">
    <style>
        * {
            outline: 1px solid red;

        }

        th {
            background-color: var(--primary-color);
        }

        .product-table {
            padding: var(--padding-section);
        }

        td {
            background-color: #30ab761c;
        }

        .menu .menu-list:nth-child(4) {
            color: var(--primary-color);
        }

        .menu .menu-list:nth-child(1) {
            color: var(--icon-color);
        }

        .menu .menu-list:nth-child(1):hover,
        .menu .menu-list:nth-child(3):hover,
        .menu .menu-list:nth-child(2):hover {
            color: var(--primary-color);
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['jenis'])) {
        if ($_GET['jenis'] == 'm') { ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <h5>Laporan Mamak</h5>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="laporan">
                <form action="">
                    <label for="waktu">Bulan :</label>
                    <input type="text" name="waktu" id="waktu">
                    <a href="#">Cari</a>
                </form>
                <div class="detail-laporan">
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <p>Total</p>
                            <span>Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <p>Total Modal</p>
                            <span>Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <p>Total Untung</p>
                            <span>Rp. 20.000.000</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-table">
                <h4>Tabel Laporan</h4>
                <div class="table-barang" style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Tangal</th>
                                <th>Qty</th>
                                <th>Harga Modal</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlBarang = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal
                            FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='keranjang' ORDER BY id DESC");
                            while ($k = mysqli_fetch_array($sqlBarang)) {
                            ?>
                                <tr>
                                    <td><?= $k["nama_barang"] ?></td>
                                    <td><?= $k["tgl"] ?></td>
                                    <td><?= $k["qty"] ?></td>
                                    <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                    <td>Rp <?= number_format($k["harga"], 0, ",", ".") ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        <?php } ?>

    <?php } else { ?>
        <header>
            <div class="hamburger">
                <i class="fa-solid fa-angle-left"></i>
            </div>
            <h5>Laporan</h5>
            <div class="profile-picture">
                <i class="fa-solid fa-ellipsis"></i>
            </div>
        </header>
        <section class="menu-laporan">
            <a href="./?m=laporan&jenis=m">
                <i class="fa-solid fa-person"></i>
                <h4>Laporan Mamak</h4>
            </a>
            <a href="#">
                <i class="fa-solid fa-person"></i>
                <h4>Laporan Bapak</h4>
            </a>
            <a href="#">
                <i class="fa-solid fa-file"></i>
                <h4>Semua Laporan</h4>
            </a>
        </section>
        <section class="menu">
            <a href="./" class="menu-list">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </a>
            <a href="./?m=barang" class="menu-list">
                <i class="fa-solid fa-box"></i>
                <span>Barang</span>
            </a>
            <a href="./?m=keranjang" class="menu-list">
                <i class="fa-solid fa-bag-shopping"></i>
                <span>Keranjang</span>
            </a>
            <a href="#" class="menu-list">
                <i class="fa-solid fa-file"></i>
                <span>Laporan</span>
            </a>
        </section>
    <?php } ?>
</body>

</html>