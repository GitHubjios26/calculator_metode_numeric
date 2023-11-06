<?php
$koneksi = mysqli_connect("localhost", "root", "", "p_2122600061");

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
$query_check_table = "SHOW TABLES LIKE 'regresi_linear'";
            $result_check_table = mysqli_query($koneksi, $query_check_table);
            if (mysqli_num_rows($result_check_table) > 0) {
                
                $query = "SELECT * FROM regresi_linear";
                $result = mysqli_query($koneksi, $query);
                echo "<table>";
                echo "<tr><th>X</th><th>Y</th><th>XY</th><th>X^2</th><th>Y-Y(bar)</th><th>Yi-a-bXi</th></tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['x'] . "</td>";
                    echo "<td>" . $row['y'] . "</td>";
                    echo "<td>" . $row['xy'] . "</td>";
                    echo "<td>" . $row['x2'] . "</td>";
                    echo "<td>" . $row['yy'] . "</td>";
                    echo "<td>" . $row['yab'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Tabel 'biseksi' tidak ditemukan dalam database.";
            }
                echo "</table>";
echo "<br>";
echo "<br>";
echo("Maka Akar-nya adalah nilai X2 terakhir");

echo "<br>";
echo "<br>";
echo "<br>";


?>
