<?php
$koneksi = mysqli_connect("localhost", "root", "", "p_2122600061");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// $query_check_table = "SHOW TABLES LIKE 'biseksi'";
// $result_check_table = mysqli_query($koneksi, $query_check_table);

// if (mysqli_num_rows($result_check_table) > 0) {
//     // Tabel "biseksi" ada dalam database
//     $query = "SELECT * FROM biseksi";
//     $result = mysqli_query($koneksi, $query);

//     echo "<table>";
    
//     echo "<tr><th>No</th><th>X1</th><th>X2</th><th>X</th><th>f(X)</th><th>f(X1)</th><th>Keterangan</th></tr>";
//     // Tampilkan data sesuai kebutuhan
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "<tr>";
//         echo "<td>" . $d->no . "</td>";
//         echo "<td>" . $d->x1 . "</td>";
//         echo "<td>" . $d->x2 . "</td>";
//         echo "<td>" . $d->x . "</td>";
//         echo "<td>" . $d->fx . "</td>";
//         echo "<td>" . $d->fx1 . "</td>";
//         echo "<td>" . $d->keterangan . "</td>";
//         echo "</tr>";
//     }
// } else {
//     echo "Tabel 'biseksi' tidak ditemukan dalam database.";
// }
// echo "</table>";


?>
