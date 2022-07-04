<?php
include "inc/config.php";
if (isset($_GET['id'])) {
    $sql = mysqli_query($konek, "SELECT barang.*,kategori.nama_kategori 
            FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id 
            WHERE barang.id='$_GET[id]'");
    while ($k = mysqli_fetch_array($sql)) {
?>

        <body>
            <header>
                <div class="hamburger">
                    <i class="fa-solid fa-angle-left" onclick="history.back();"></i>
                </div>
                <h4><?= $k["nama_kategori"] ?></h4>
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
                    <p style="text-align: center;margin: 10px 0;">Qty</p>
                    <form class="qty">
                        <i class="uil uil-minus"></i>
                        <input type="text" name="qty" value="0" id="qty">
                        <i class="uil uil-plus" id="minus"></i>
                    </form>
                    <a href="#">Tambah Ke Keranjang</a>
                    <a href="#">Tambah Ke Laporan</a>
                </div>
            </section>
            <script>
                const minus = document.querySelector(".qty i:nth-child(1)");
                const plus = document.querySelector(".qty i:nth-child(3)");

                minus.style.cursor = "pointer";
                plus.style.cursor = "pointer";

                minus.addEventListener('click', function() {
                    if (document.getElementById("qty").value > 0) {
                        document.getElementById("qty").value--

                    } else {
                        document.getElementById("qty").value = 0
                    }
                });
                plus.addEventListener('click', function() {
                    document.getElementById("qty").value++
                });
            </script>
        </body>

<?php
    }
}
?>