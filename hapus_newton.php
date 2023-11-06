<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE newton";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    header("Location: newton.php");
    exit; 
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
