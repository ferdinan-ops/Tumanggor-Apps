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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Harga Modal</th>
                            <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>@mdo</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        <?php } ?>

    <?php } ?>
    <!-- <section class="menu">
        <a href="#" class="menu-list">
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
    </section> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>