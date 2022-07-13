<?php
include "inc/config.php";
if (isset($_POST['submit'])) {
    $bln = date($_POST['bulan']);

    if (!empty($bln)) {
        $sqlBarangMamak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND MONTH(tgl)='$bln' AND barang.punya='Mamak' ORDER BY tgl DESC");

        $sqlBarangBapak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND MONTH(tgl)='$bln' AND barang.punya='Bapak' ORDER BY tgl DESC");

        $sqlBarang = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND MONTH(tgl)='$bln' ORDER BY tgl DESC");
    } else {
        $sqlBarangMamak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Mamak' ORDER BY tgl DESC");

        $sqlBarangBapak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Bapak' ORDER BY tgl DESC");

        $sqlBarang = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
        FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' ORDER BY tgl DESC");
    }
} else {
    $sqlBarangMamak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
    FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Mamak' ORDER BY tgl DESC");

    $sqlBarangBapak = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
    FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' AND barang.punya='Bapak' ORDER BY tgl DESC");

    $sqlBarang = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.harga_modal,barang.punya
    FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='beli' ORDER BY tgl DESC");
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
    <!-- <link rel="stylesheet" href="inc/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="inc/laporan.css">
    <style>
        thead {
            background-color: #30ab76c2;
        }

        .product-table {
            padding: var(--padding-section);
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

        @media print {
            body {
                --padding-header: 0;
                --padding-section: 0;
            }

            thead th {
                padding: 5px !important;
            }

            .px-5 {
                padding: 0 !important;
                transform: translate(0, -5px) !important;
            }

            .nomor {
                transform: translate(0, 0) !important;

            }

            header,
            .hilang {
                display: none !important;
            }

            .print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php if (isset($_GET['jenis'])) {
        if ($_GET['jenis'] == 'm') { ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h6 class="fw-bold" style="font-size: 14px;">Laporan Mamak</h6>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="laporan">
                <form action="" method="POST" class="mb-4 d-flex justify-content-between align-items-center hilang">
                    <label for="waktu" class="fw-bold">Bulan :</label>
                    <select name="bulan" id="" style="width: 60%;height: 40px;" class="rounded bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-success cari">Cari</button>
                </form>
                <div class="detail-laporan">
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total</span>
                            <span class="total-jual">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Modal</span>
                            <span class="total-modal">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Untung</span>
                            <span class="total-untung">Rp. 20.000.000</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-table">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="head-bulan hilang">Tabel Laporan</h4>
                    <a href="#" class="text-light print" onclick="window.print()"><i class="uil uil-print"></i></a>
                </div>
                <div class="table-responsive">
                    <div class="table-barang">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center nomor" style="transform: translate(0,-12px);">No</th>
                                    <th scope="col" class="text-center" style="padding: 10px 120px;">Nama Barang</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Tanggal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Qty</th>
                                    <th scope="col" class="text-center px-5">Harga Modal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $totalModal = 0;
                                $totalJual = 0;
                                while ($k = mysqli_fetch_array($sqlBarangMamak)) {
                                ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i ?></th>
                                        <td class="text-center"><?= $k["nama_barang"] ?></td>
                                        <td class="text-center"><?= $k["tgl"] ?></td>
                                        <td class="text-center"><?= $k["qty"] ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga"], 0, ",", ".") ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                    $totalModal += $k['harga_modal'];
                                    $totalJual += $k['harga'];
                                }
                                $untung = $totalJual - $totalModal;

                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <span class="modal">Rp. <?= number_format($totalModal, 0, ",", ".") ?></span>
                <span class="jual">Rp. <?= number_format($totalJual, 0, ",", ".") ?></span>
                <span class="untung">Rp. <?= number_format($untung, 0, ",", ".") ?></span>
            </section>
            <script>
                const jual = document.querySelector('.jual');
                const modal = document.querySelector('.modal');
                const untung = document.querySelector('.untung');

                const totalJual = document.querySelector('.total-jual');
                const totalModal = document.querySelector('.total-modal');
                const totalUntung = document.querySelector('.total-untung');

                totalJual.innerHTML = jual.innerHTML;
                totalModal.innerHTML = modal.innerHTML;
                totalUntung.innerHTML = untung.innerHTML;

                jual.style.display = 'none';
                modal.style.display = 'none';
                untung.style.display = 'none';
            </script>
        <?php
        } elseif ($_GET['jenis'] == 'b') { ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h6 class="fw-bold" style="font-size: 14px;">Laporan Bapak</h6>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="laporan">
                <form action="" method="POST" class="mb-4 d-flex justify-content-between align-items-center hilang">
                    <label for="waktu" class="fw-bold">Bulan :</label>
                    <select name="bulan" id="" style="width: 60%;height: 40px;" class="rounded bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-success cari">Cari</button>
                </form>
                <div class="detail-laporan">
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total</span>
                            <span class="total-jual">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Modal</span>
                            <span class="total-modal">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Untung</span>
                            <span class="total-untung">Rp. 20.000.000</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-table">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="head-bulan">Tabel Laporan</h4>
                    <a href="#" class="text-light print" onclick="window.print()"><i class="uil uil-print"></i></a>
                </div>
                <div class="table-responsive">
                    <div class="table-barang">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center nomor" style="transform: translate(0,-12px);">No</th>
                                    <th scope="col" class="text-center" style="padding: 10px 120px;">Nama Barang</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Tanggal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Qty</th>
                                    <th scope="col" class="text-center px-5">Harga Modal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $totalModal = 0;
                                $totalJual = 0;
                                while ($k = mysqli_fetch_array($sqlBarangBapak)) {
                                ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i ?></th>
                                        <td class="text-center"><?= $k["nama_barang"] ?></td>
                                        <td class="text-center"><?= $k["tgl"] ?></td>
                                        <td class="text-center"><?= $k["qty"] ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga"], 0, ",", ".") ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                    $totalModal += $k['harga_modal'];
                                    $totalJual += $k['harga'];
                                }
                                $untung = $totalJual - $totalModal;

                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <span class="modal">Rp. <?= number_format($totalModal, 0, ",", ".") ?></span>
                <span class="jual">Rp. <?= number_format($totalJual, 0, ",", ".") ?></span>
                <span class="untung">Rp. <?= number_format($untung, 0, ",", ".") ?></span>
            </section>
            <script>
                const jual = document.querySelector('.jual');
                const modal = document.querySelector('.modal');
                const untung = document.querySelector('.untung');

                const totalJual = document.querySelector('.total-jual');
                const totalModal = document.querySelector('.total-modal');
                const totalUntung = document.querySelector('.total-untung');

                totalJual.innerHTML = jual.innerHTML;
                totalModal.innerHTML = modal.innerHTML;
                totalUntung.innerHTML = untung.innerHTML;

                jual.style.display = 'none';
                modal.style.display = 'none';
                untung.style.display = 'none';
            </script>
        <?php
        } elseif ($_GET['jenis'] == 'all') { ?>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h6 class="fw-bold" style="font-size: 14px;">Semua Laporan</h6>
                <div class="profile-picture">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </header>
            <section class="laporan">
                <form action="" method="POST" class="mb-4 d-flex justify-content-between align-items-center hilang">
                    <label for="waktu" class="fw-bold">Bulan :</label>
                    <select name="bulan" id="" style="width: 60%;height: 40px;" class="rounded bulan">
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <button type="submit" name="submit" class="btn btn-success cari">Cari</button>
                </form>
                <div class="detail-laporan">
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-money-check-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total</span>
                            <span class="total-jual">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-hand-holding-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Modal</span>
                            <span class="total-modal">Rp. 20.000.000</span>
                        </div>
                    </div>
                    <div class="total">
                        <div class="img-laporan">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="desc-laporan">
                            <span>Total Untung</span>
                            <span class="total-untung">Rp. 20.000.000</span>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product-table">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="head-bulan">Tabel Laporan</h4>
                    <a href="#" class="text-light print" onclick="window.print()"><i class="uil uil-print"></i></a>
                </div>
                <div class="table-responsive">
                    <div class="table-barang">
                        <table class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center nomor" style="transform: translate(0,-12px);">No</th>
                                    <th scope="col" class="text-center" style="padding: 10px 120px;">Nama Barang</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Tanggal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Qty</th>
                                    <th scope="col" class="text-center px-5">Harga Modal</th>
                                    <th scope="col" class="text-center px-5" style="transform: translate(0,-12px);">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $totalModal = 0;
                                $totalJual = 0;
                                while ($k = mysqli_fetch_array($sqlBarang)) {
                                ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?= $i ?></th>
                                        <td class="text-center"><?= $k["nama_barang"] ?></td>
                                        <td class="text-center"><?= $k["tgl"] ?></td>
                                        <td class="text-center"><?= $k["qty"] ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga_modal"], 0, ",", ".") ?></td>
                                        <td class="text-end">Rp <?= number_format($k["harga"], 0, ",", ".") ?></td>
                                    </tr>
                                <?php
                                    $i++;
                                    $totalModal += $k['harga_modal'];
                                    $totalJual += $k['harga'];
                                }
                                $untung = $totalJual - $totalModal;

                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                <span class="modal">Rp. <?= number_format($totalModal, 0, ",", ".") ?></span>
                <span class="jual">Rp. <?= number_format($totalJual, 0, ",", ".") ?></span>
                <span class="untung">Rp. <?= number_format($untung, 0, ",", ".") ?></span>
            </section>
            <script>
                const jual = document.querySelector('.jual');
                const modal = document.querySelector('.modal');
                const untung = document.querySelector('.untung');

                const totalJual = document.querySelector('.total-jual');
                const totalModal = document.querySelector('.total-modal');
                const totalUntung = document.querySelector('.total-untung');

                totalJual.innerHTML = jual.innerHTML;
                totalModal.innerHTML = modal.innerHTML;
                totalUntung.innerHTML = untung.innerHTML;

                jual.style.display = 'none';
                modal.style.display = 'none';
                untung.style.display = 'none';
            </script>
        <?php } ?>

    <?php } else { ?>
        <header>
            <div class="hamburger">
                <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
            </div>
            <h6 class="fw-bold" style="font-size: 14px;">Laporan</h6>
            <div class="profile-picture">
                <i class="fa-solid fa-ellipsis"></i>
            </div>
        </header>
        <section class="menu-laporan">
            <a href="./?m=laporan&jenis=m">
                <i class="fa-solid fa-person"></i>
                <h5>Laporan Mamak</h5>
            </a>
            <a href="./?m=laporan&jenis=b">
                <i class="fa-solid fa-person"></i>
                <h5>Laporan Bapak</h5>
            </a>
            <a href="./?m=laporan&jenis=all">
                <i class="fa-solid fa-file"></i>
                <h5>Semua Laporan</h5>
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