<?php
include "../inc/config.php";

$id = $_POST['id'];
$idBarang = $_POST['idBarang'];
$qty = $_POST['qty'];
$status = 'beli';
$stok = $_POST['stok'];
$qtyLama = $_POST['qtyLama'];

for ($x = 0; $x < count($id); $x++) {
    $updateQty = $qty[$x] - $qtyLama[$x];
    $updateStok = $stok[$x] - $updateQty;
    $sqlTransaksi = "UPDATE keranjang SET status='$status',qty='$qty[$x]' WHERE id='$id[$x]'";
    mysqli_query($konek, $sqlTransaksi);
    $sqlBarang = "UPDATE barang SET stok='$updateStok' WHERE id='$idBarang[$x]'";
    mysqli_query($konek, $sqlBarang);

    // if ($konek->query($sqlTransaksi) === TRUE) {
    //     $sqlBarang = "UPDATE barang SET stok='$updateStok' WHERE id='$idBarang[$x]'";
    //     if ($konek->query($sqlBarang) === TRUE) {
    //         // header('Location:./');
    //     } else {
    //         echo "Error: " . $sqlBarang . "<br>" . $konek->error;
    //     }
    //     $konek->close();
    // } else {
    //     echo "Error: " . $sqlTransaksi . "<br>" . $konek->error;
    // }
    // $konek->close();
}
