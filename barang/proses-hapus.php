<?php
if (!empty($_GET['id'])) {
    $sql = "DELETE FROM barang WHERE id='$_GET[id]'";
    if ($konek->query($sql) === TRUE) {
        header("Location:.././");
    } else {
        echo "Error deleting record: " . $konek->error;
    }

    $konek->close();
}
