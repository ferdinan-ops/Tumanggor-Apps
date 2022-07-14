<?php
include "../inc/config.php";

/*
 * fungsi untuk mengompres ukuran file gambar dan
 * mengupload ke server 
 */
function compressImage($source, $destination, $quality)
{
    // mendapatkan info gambar 
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // membuat gambar baru dari file sumber
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // menyimpan gambar 
    imagejpeg($image, $destination, $quality);

    // mengembalikan gambar yang dikompres 
    return $destination;
}

// path untuk file yang diupload
$uploadPath = "uploads/";

// jika form upload disubmit 
$status = $statusMsg = '';
if (isset($_POST["submit"])) {
    $status = 'error';
    if (!empty($_FILES["image"]["name"]) && !empty($_POST["nama"]) && !empty($_POST["stok"]) && !empty($_POST["punya"]) && !empty($_POST["modal"]) && !empty($_POST["jual"]) && !empty($_POST["korting"]) && !empty($_POST["rak"]) && !empty($_POST["kategori"])) {
        $namaBarang = $_POST["nama"];
        $stok = $_POST["stok"];
        $punya = $_POST["punya"];
        $hargaModal = $_POST["modal"];
        $hargaJual = $_POST["jual"];
        $hargaKorting = $_POST["korting"];
        $namaRak = $_POST["rak"];
        $kategori = $_POST["kategori"];

        // info file
        $fileName = basename($_FILES["image"]["name"]);
        $imageUploadPath = $uploadPath . $fileName;
        $lokasiBaru = "{$uploadPath}{$fileName}";
        $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);

        // hanya membolehkan format file tertentu 
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // sumber gambar sementara 
            $imageTemp = $_FILES["image"]["tmp_name"];

            // mengompres ukuran gambar 25% dan upload gambar 
            $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);

            if ($compressedImage) {
                $sqlTambah = "UPDATE barang SET nama_barang='$namaBarang',stok='$stok',punya='$punya',harga_modal='$hargaModal',harga_jual='$hargaJual',harga_korting='$hargaKorting',nama_foto='$fileName' ,lokasi='$lokasiBaru' WHERE id='$_POST[id]'";
                if ($konek->query($sqlTambah) === TRUE) {
                    header('Location:.././');
                } else {
                    echo "Error: " . $sqlTambah . "<br>" . $konek->error;
                }

                $konek->close();
            } else {
                $statusMsg = "Kompres gambar gagal!";
            }
        } else {
            $statusMsg = 'Maaf, hanya file JPG, JPEG, dan PNG yang dibolehkan untuk diupload.';
        }
    } elseif (empty($_FILES["images"]["name"])) {
        $sqlUpdate = "UPDATE barang SET nama_barang='$namaBarang',stok='$stok',punya='$punya',harga_modal='$hargaModal',harga_jual='$hargaJual',harga_korting='$hargaKorting' WHERE id='$_POST[id]'";
        if ($konek->query($sqlUpdate) === TRUE) {
            header('Location:.././');
        } else {
            echo "Error: " . $sqlUpdate . "<br>" . $konek->error;
        }

        $konek->close();
    } else {
        header("Location:.././");
    }
}
