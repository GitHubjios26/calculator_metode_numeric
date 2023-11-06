<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE regulafalsi";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    header("Location: regulafalsi.php");
    exit; 
} else {
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
