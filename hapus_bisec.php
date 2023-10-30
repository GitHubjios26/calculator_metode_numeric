<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE biseksi";
mysqli_query($koneksi, $query_delete);

if ($query_delete) {
    // Jika penghapusan berhasil, alihkan kembali ke biseksi.php
    header("Location: biseksi.php");
    exit; // Pastikan untuk keluar dari skrip setelah pengalihan
} else {
    // Jika terjadi kesalahan dalam penghapusan, Anda dapat menangani error sesuai kebutuhan
    echo "Terjadi kesalahan saat menghapus data.";
}
?>
