<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tumanggor Apps</title>
    <script src="https://kit.fontawesome.com/ca43952785.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="inc/keranjang.css">
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
        <h5>Keranjang</h5>
        <div class="profile-picture">
            <i class="fa-solid fa-ellipsis"></i>
        </div>
    </header>
    <form class="list-keranjang" method="POST" action="keranjang/proses-transaksi.php">
        <?php
        $sqlCart = mysqli_query($konek, "SELECT keranjang.*,barang.nama_barang,barang.lokasi,barang.punya,barang.stok 
            FROM keranjang INNER JOIN barang ON keranjang.id_barang=barang.id WHERE keranjang.status='keranjang'");
        $total = 0;
        while ($cart = mysqli_fetch_array($sqlCart)) { ?>
            <input type="hidden" name="id[]" value="<?= $cart['id'] ?>">
            <input type="hidden" name="stok[]" value="<?= $cart['stok'] ?>">
            <input type="hidden" name="qtyLama[]" value="<?= $cart['qty'] ?>">
            <input type="hidden" name="idBarang[]" value="<?= $cart['id_barang'] ?>">
            <div class="keranjang">
                <img src="barang/<?= $cart['lokasi'] ?>" width="80px">
                <div class="detail">
                    <p><?= $cart['nama_barang'] ?></p>
                    <h4>Rp. <?= number_format($cart["harga"] * $cart['qty'], 0, ",", ".") ?></h4>
                    <div class="action">
                        <a onclick="return confirm('Anda Yakin Ingin Menghapus?')" href="keranjang/proses-hapus.php?id=<?= $cart['id'] ?>"><i class="uil uil-trash-alt"></i></a>
                        <div class="qty">
                            <i class="uil uil-minus minus"></i>
                            <input type="text" name="qty[]" value="<?= $cart['qty'] ?>" id="qty" min="1">
                            <i class="uil uil-plus plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        <?php $total += $cart['harga'];
        } ?>
        <section class="checkout">
            <div class="total-harga">
                <p>Total Harga</p>
                <h3>Rp. <?= number_format($total, 0, ",", ".") ?></h3>
            </div>
            <button type="submit">Beli</button>
        </section>
    </form>



    <script>
        const listKeranjang = document.querySelector(".list-keranjang");
        listKeranjang.addEventListener("click", function(e) {
            if (e.target.classList.contains("plus")) {
                document.getElementById("qty").value++
            } else if (e.target.classList.contains("minus")) {
                if (document.getElementById("qty").value > 0) {
                    document.getElementById("qty").value--

                } else {
                    document.getElementById("qty").value = 0
                }
            }
        });

        function hapus() {

        }
    </script>
</body>

</html>