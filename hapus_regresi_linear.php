<?php
include('conection.php');
$query_delete = "TRUNCATE TABLE regresi_linear";
mysqli_query($koneksi, $query_delete);


if ($query_delete) {
    header("Location: regresi_linear.php");
    exit; 
} else {echo "Terjadi kesalahan saat menghapus data.";
}
?>
