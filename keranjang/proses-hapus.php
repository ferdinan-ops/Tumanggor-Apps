<?php
include "../inc/config.php";
if (!empty($_GET['id'])) {

    $sqlKeranjang = mysqli_query($konek, "SELECT * FROM keranjang WHERE id='$_GET[id]'");
    $keranjang = mysqli_fetch_array($sqlKeranjang);
    $idBarang = $keranjang['id_barang'];
    $qty = $keranjang['qty'];

    $sqlBarang = mysqli_query($konek, "SELECT * FROM barang WHERE id='$idBarang'");
    $barang = mysqli_fetch_array($sqlBarang);
    $stok = $barang['stok'];
    $updateStok = $stok + $qty;

    $sqlUpdate = "UPDATE barang SET stok='$updateStok' WHERE id='$idBarang'";
    if ($konek->query($sqlUpdate) === TRUE) {
        $sqlDelete = "DELETE FROM keranjang WHERE id='$_GET[id]'";
        if ($konek->query($sqlDelete) === TRUE) {
            header("Location: .././?m=keranjang");
        } else {
            echo "Error deleting record: " . $konek->error;
        }
        // $konek->close();
    } else {
        echo "Error deleting record: " . $konek->error;
    }
    // $konek->close();
}
