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
                <a href="./?m=tambah-kategori" class="tambah-barang">Tambah Kategori</a>
            </div>
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
                            <td><a href="?m=barang&tipe=edit&id=$k[id]' class='btn btn-primary'>Edit</a></td>
                        
                        <a onclick='confirm(\" Anda yakin akan menghapus?\")' href='kategori/proses_hapus.php?id=$k[id]' class='btn btn-danger'>Hapus</a>
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
    <?php
    }
    ?>
</body>

</html>