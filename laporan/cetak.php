<?php
include "inc/config.php";
if (!empty($_GET['punya']) && $_GET['bulan'] != "") {
    if ($_GET['punya'] = 'm') {
        $sqlBarangMamak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND MONTH(tgl)='$bln' AND barang.punya='Mamak' ORDER BY tgl DESC");
    } elseif ($_GET['punya'] = 'b') {
        $sqlBarangBapak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND MONTH(tgl)='$bln' AND barang.punya='Bapak' ORDER BY tgl DESC");
    }
} elseif (empty($_GET['bulan'])) {
    if ($_GET['punya'] = 'm') {
        $sqlBarangMamak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Mamak' ORDER BY tgl DESC");
    } elseif ($_GET['punya'] = 'b') {
        $sqlBarangBapak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Bapak' ORDER BY tgl DESC");
    }
}
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
    <link rel="icon" type="icon/x-image" href="images/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            /* outline: 1px solid red; */
        }

        body {
            font-family: 'Roboto', sans-serif;
        }

        p {
            margin: 0;
        }

        h1 {
            margin: 0;
        }

        td {
            padding: 5px;
        }

        table {
            margin-right: 100px;
        }

        span {
            display: block;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <header>
        <div class="container d-flex justify-content-between py-3">
            <div class="brand">
                <img src="../images/logo.png" height="100%">
            </div>
            <div class="ket text-center" style="width: 100%;">
                <h1>Tumanggor Jok</h1>
                <p>Jl. Besar Tj. Selamat, Tj. Anom, Kec. Pancur Batu, Kabupaten Deli Serdang, Sumatera Utara 20352</p>
                <p>085262618118</p>
            </div>
        </div>
    </header>
    <div class="container">
        <span></span>
        <span></span>
    </div>
    <div class="container d-flex mt-3">
        <table>
            <tr>
                <td><b>Bulan</b></td>
                <td>:</td>
                <td>Maret</td>
            </tr>
            <tr>
                <td><b>Total Modal</b></td>
                <td>:</td>
                <td>Rp. 1.500.000</td>
            </tr>
        </table>
        <table>
            <tr>
                <td><b>Total Penjualan</b></td>
                <td>:</td>
                <td>Rp. 2.150.000</td>
            </tr>
            <tr>
                <td><b>Total Keuntungan</b></td>
                <td>:</td>
                <td>Rp. 500.000</td>
            </tr>
        </table>
    </div>
    <div class="container mt-3">
        <table style="width: 100%;" class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Tanggal</th>
                    <th>Qty</th>
                    <th>Harga Modal</th>
                    <th>Harga</th>
                    <th>Jumlah Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($_GET['punya'] = 'm') {
                    $i = 0;
                    $total = 0;
                    while ($k = mysqli_fetch_array($sqlBarangMamak)) { ?>
                        <tr class="text-center">
                            <td><?= $i ?></td>
                            <td><?= $k['nama_barang'] ?></td>
                            <td><?= $k['tgl'] ?></td>
                            <td><?= $k['qty'] ?></td>
                            <td><?= $k['harga_modal'] ?></td>
                            <td><?= $k['harga'] ?></td>
                            <td><?= $totalHarga = $k['harga'] * $k['qty']; ?></td>
                        </tr>
                    <?php $total += $totalHarga;
                    } ?>
                <?php } ?>
                <tr class="text-center fw-bold">
                    <td colspan="6">Total</td>
                    <td>Rp. <?= $totalHarga ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>