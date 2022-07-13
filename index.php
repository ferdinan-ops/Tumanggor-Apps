<?php
include "inc/config.php";
?>
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
    } elseif ($_GET['m'] == 'keranjang') {
        include 'keranjang/keranjang.php';
    } elseif ($_GET['m'] == 'laporan') {
        include 'laporan/laporan.php';
    } elseif ($_GET['m'] == 'cetak') {
        include 'laporan/cetak.php';
    }
} else {
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            .menu .menu-list:nth-child(1) {
                color: var(--primary-color);
            }

            .menu .menu-list:nth-child(2):hover,
            .menu .menu-list:nth-child(3):hover,
            .menu .menu-list:nth-child(4):hover {
                color: var(--primary-color);
            }

            a:hover {
                color: #333;
            }
        </style>
    </head>

    <body>

        <header>
            <div class="hamburger">
                <i class="uil uil-shopping-bag shop"></i>
            </div>
            <div class="profile-picture">
                <img src="images/logo.png" width="50px">
            </div>
        </header>
        <h2 class="judul fw-bold">Produk</h2>

        <form action="search.php" class="search" method="POST">
            <div class="search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" name="teks" placeholder="Cari Produk">
            </div>
            <div class="search-product">
                <input type="submit" value="Cari">
            </div>
        </form>
        <h4 class="judul fw-500">Kategori</h4>
        <div class="list-kategori">
            <?php
            $sqlKategori = mysqli_query($konek, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
            while ($de = mysqli_fetch_array($sqlKategori)) {
            ?>
                <div class="kategori">
                    <a class="text-success" href="./?m=search&ktg=<?= $de["id"] ?>"><?= $de["nama_kategori"] ?></a>
                </div>
            <?php
            }
            ?>
        </div>
        <section class="list-product">
            <?php
            $sqlProduk = mysqli_query($konek, "SELECT * FROM barang ORDER BY id DESC");
            $i = 1;
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
                            <a class="text-light" href="#" data-bs-toggle="modal" data-bs-target="#cartModal<?= $i ?>"><i class="fa-solid fa-plus"></i> Keranjang</a>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="cartModal<?= $i ?>" tabindex="-1" aria-labelledby="cartModal<?= $i ?>Label" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cartModal<?= $i ?>Label">Tambah ke Keranjang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <h4><?= $k["nama_barang"] ?></h4>
                                    <form action="keranjang/proses-tambah.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $k["id"] ?>">
                                        <input type="hidden" name="stok" value="<?= $k["stok"] ?>">
                                        <input type="hidden" name="hrg_jual" value="<?= $k["harga_jual"] ?>">
                                        <input type="hidden" name="hrg_korting" value="<?= $k["harga_korting"] ?>">
                                        <div class="mb-3">
                                            <label for="jlhHarga" class="form-label jlh-barang">Jumlah Barang</label>
                                            <input type="number" class="form-control" id="jlhHarga" name="qty" min="1" max="<?= $k['stok'] ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="" class="form-label">Harga:</label>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="harga" id="jual" min="1" value="harga_jual">
                                                <label class="form-check-label" for="jual">
                                                    Harga Jual (Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?>)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="harga" id="korting" value="harga_korting">
                                                <label class="form-check-label" for="korting">
                                                    Harga Korting (Rp <?= number_format($k["harga_korting"], 0, ",", ".") ?>)
                                                </label>

                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="harga" id="custom" value="harga_custom" data-bs-toggle="collapse" data-bs-target="#custom_harga" aria-expanded="false" aria-controls="custom_harga">
                                                <label class="form-check-label" for="custom" data-bs-toggle="collapse" data-bs-target="#custom_harga" aria-expanded="false" aria-controls="custom_harga">
                                                    Harga Custom
                                                </label>
                                                <div class="collapse mt-2" id="custom_harga">
                                                    <input type="number" class="form-control" name="harga_custom">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer mt-5">
                                            <button type="submit" class="btn add btn-success modal-keranjang-btn"><i class="fa-solid fa-plus"></i> Keranjang</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="cek-stok"><?= $k['stok'] ?></span>
            <?php
                $i++;
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
            <a href="./?m=keranjang" class="menu-list">
                <i class="fa-solid fa-bag-shopping"></i>
                <span>Keranjang</span>
            </a>
            <a href="./?m=laporan" class="menu-list">
                <i class="fa-solid fa-file"></i>
                <span>Laporan</span>
            </a>
        </section>

    <?php
}
    ?>

    <!-- Modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        const stokDisplay = document.querySelectorAll('.cek-stok');
        for (let i = 0; i < stokDisplay.length; i++) {
            stokDisplay[i].style.display = "none";
        }

        const stok = document.querySelectorAll(".modal-keranjang-btn");
        for (let i = 0; i < stok.length; i++) {
            if (stokDisplay[i].innerHTML == 0 || stokDisplay[i].innerHTML == "0") {
                stok[i].disabled = true;
            }
        }

        // const jlhBarang=document.querySelectorAll(".jlh-barang");
        // for (let i = 0; i < jlhBarang.length; i++) {

        // }

        if (stok == 0) {
            $(".modal-keranjang-btn").disabled = true;
        }
    </script>
    </body>

    </html>