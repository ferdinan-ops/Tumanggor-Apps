<?php
include "../inc/config.php";
if (!empty($_POST['id'])) {
    // proses insert cart
    $id_barang = $_POST['id'];
    $qty = $_POST['qty'];
    $custom = $_POST['harga_custom'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $hargaKorting = $_POST['hrg_korting'];
    $hargaJual = $_POST['hrg_jual'];
    $status = 'keranjang';
    $tgl = date("Y-m-d");

    $barang = mysqli_query($konek, "SELECT * FROM barang WHERE id='$id_barang'");

    if ($harga == 'harga_jual') {
        $sqlTambah = "INSERT INTO keranjang (id_barang,qty,harga,status,tgl) VALUES ('$id_barang','$qty','$hargaJual','$status','$tgl')";
        if ($konek->query($sqlTambah) === TRUE) {
            $updateStok = $stok - $qty;
            $sqlUpdateStok = "UPDATE barang SET stok='$updateStok' WHERE id='$id_barang'";
            if ($konek->query($sqlUpdateStok) === TRUE) {
                header('Location:../?m=keranjang');
            } else {
                echo "Error: " . $sqlUpdateStok . "<br>" . $konek->error;
            }
            $konek->close();
        } else {
            echo "Error: " . $sqlTambah . "<br>" . $konek->error;
        }
    } elseif ($harga == 'harga_korting') {
        $sqlTambah = "INSERT INTO keranjang (id_barang,qty,harga,status,tgl) VALUES ('$id_barang','$qty','$hargaKorting','$status','$tgl')";
        if ($konek->query($sqlTambah) === TRUE) {
            $updateStok = $stok - $qty;
            $sqlUpdateStok = "UPDATE barang SET stok='$updateStok' WHERE id='$id_barang'";
            if ($konek->query($sqlUpdateStok) === TRUE) {
                header('Location:../?m=keranjang');
            } else {
                echo "Error: " . $sqlUpdateStok . "<br>" . $konek->error;
            }
            $konek->close();
        } else {
            echo "Error: " . $sqlTambah . "<br>" . $konek->error;
        }
    } elseif ($harga == 'harga_custom') {
        if (!empty($custom)) {
            $sqlTambah = "INSERT INTO keranjang (id_barang,qty,harga,status,tgl) VALUES ('$id_barang','$qty','$custom','$status','$tgl')";
            if ($konek->query($sqlTambah) === TRUE) {
                $updateStok = $stok - $qty;
                $sqlUpdateStok = "UPDATE barang SET stok='$updateStok' WHERE id='$id_barang'";
                if ($konek->query($sqlUpdateStok) === TRUE) {
                    header('Location:../?m=keranjang');
                } else {
                    echo "Error: " . $sqlUpdateStok . "<br>" . $konek->error;
                }
                $konek->close();
            } else {
                echo "Error: " . $sqlTambah . "<br>" . $konek->error;
            }
        } else {
            echo "error";
        }
    }
} else {
    echo "error";
}
