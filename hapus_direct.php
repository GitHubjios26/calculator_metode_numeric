<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE direct";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    header("Location: direct.php");
    exit; // Pastikan untuk keluar dari skrip setelah pengalihan
} else {
    // Jika terjadi kesalahan dalam penghapusan, Anda dapat menangani error sesuai kebutuhan
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
