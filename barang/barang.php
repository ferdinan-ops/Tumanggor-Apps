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
    <?php
    include "inc/config.php";
    if (isset($_GET['tipe'])) {
        if ($_GET['tipe'] == 'tambah') {
    ?>
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
        <?php
        } elseif ($_GET['tipe'] == 'edit') {
            $sqlEdit = mysqli_query($konek, "SELECT barang.*,kategori.nama_kategori,gudang.nama_rak 
            FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id 
            INNER JOIN gudang ON barang.id_rak=gudang.id
            WHERE barang.id='$_GET[id]'");
            $de = mysqli_fetch_array($sqlEdit);
        ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h4>Edit Barang</h4>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="form-tambah-barang">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $de["id"] ?>">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama" value="<?= $de["nama_barang"] ?>">
                    <label for="">Stok</label>
                    <input type="text" name="stok" value="<?= $de["stok"] ?>">
                    <label for="">Harga Modal</label>
                    <input type="text" name="modal" value="<?= $de["harga_modal"] ?>">
                    <label for="">Harga Jual</label>
                    <input type="text" name="jual" value="<?= $de["harga_jual"] ?>">
                    <label for="">Harga korting</label>
                    <input type="text" name="korting" value="<?= $de["harga_korting"] ?>">
                    <label for="">Punya</label>
                    <select name="punya">
                        <option value="<?= $de["punya"] ?>"><?= $de["punya"] ?></option>
                        <option value="Mamak">Mamak</option>
                        <option value="Bapak">Bapak</option>
                    </select>
                    <label for="">Letak</label>
                    <select name="rak">
                        <option value="<?= $de["id_rak"] ?>"><?= $de["nama_rak"] ?></option>
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
                        <option value="<?= $de["id_kategori"] ?>"><?= $de["nama_kategori"] ?></option>
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
        <?php
        }
    } elseif (isset($_GET['punya'])) {
        if ($_GET['punya'] == 'mamak') {
        ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h4>Punya Mamak</h4>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="product-table">
                <h4>Daftar Barang</h4>
                <section class="list-product" style="padding: 0;">
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
                                <div class="punya-barang">
                                    <a href="#">Edit</a>
                                    <a href="#">Hapus</a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </section>
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
        <?php
        } elseif ($_GET['punya'] == 'bapak') {
        ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h4>Punya Bapak</h4>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="product-table">
                <h4>Daftar Barang</h4>
                <div class="table-barang" style="overflow-x:auto;">
                    <table>
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Stok</th>
                                <th>Harga Jual</th>
                                <th>Harga Modal</th>
                                <th>Harga Korting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sqlBarang = mysqli_query($konek, "SELECT * FROM barang WHERE punya='Bapak' ORDER BY id DESC");
                            while ($k = mysqli_fetch_array($sqlBarang)) {
                            ?>
                                <tr>
                                    <td><?= $k["nama_barang"] ?></td>
                                    <td><?= $k["stok"] ?></td>
                                    <td>Rp <?= number_format($k["harga_jual"], 0, ",", ".") ?></td>
                                    <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                    <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                    <td>
                                        <a href="?m=barang&tipe=edit&id=<?= $k["id"] ?>">Edit</a>
                                        <a onclick="confirm('Anda yakin akan menghapus?')" href="barang/proses_hapus.php?id=$k[id]">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
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
        <?php
        }
    } else {
        ?>
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
            <div class="btn-barang">
                <a href="./?m=barang&tipe=tambah" class="tambah-barang">Tambah Barang</a>
                <a href="./?m=tambah-kategori" kategori" class="tambah-barang">Tambah Kategori</a>
            </div>
            <div class="punya-barang">
                <a class="mamak" href="./?m=barang&punya=mamak">
                    <i class="uil uil-shopping-bag shop"></i>
                    <p>Punya Mamak</p>
                </a>
                <a class="bapak" href="./?m=barang&punya=bapak">
                    <i class="uil uil-shopping-bag shop"></i>
                    <p>Punya Bapak</p>
                </a>
            </div>
        </section>
        <section class="product-table">
            <h4>Daftar Barang</h4>
            <div class="table-barang" style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Harga Modal</th>
                            <th>Harga Korting</th>
                            <th>Punya</th>
                            <th>Aksi</th>
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
                                <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                <td>Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                <td><?= $k["punya"] ?></td>
                                <td>
                                    <a href="?m=barang&tipe=edit&id=<?= $k["id"] ?>">Edit</a>
                                    <a onclick="confirm('Anda yakin akan menghapus?')" href="barang/proses_hapus.php?id=$k[id]">Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
    <?php
    }
    ?>
</body>

</html>