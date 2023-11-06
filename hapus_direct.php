<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE direct";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    header("Location: direct.php");
    exit; 
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
