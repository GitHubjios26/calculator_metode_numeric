<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE biseksi";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    header("Location: biseksi.php");
    exit;
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
