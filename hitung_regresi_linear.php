</html>
<?php
session_start();
include('header.php'); // Include header
?>

<main>
    <h4><a href="regresi.php">Regresi</a> -> <a href="regresi_linear.php">Metode Regresi Linear</a> -> <a href="generate_tabel.php">Generate Tabel Metode Regresi Linear</a></h4>

    <div class="hasil">
        <?php
        include('conection.php');

        if (isset($_SESSION['baris'])) {
            $query_delete = "TRUNCATE TABLE regresi_linear";
            mysqli_query($koneksi, $query_delete);
            
            $baris = (int)$_SESSION['baris']; 
            $hitung = 0; 
            
        while ($hitung < $baris) {
            $datax = floatval($_GET['x' . $hitung]);
            $datay = floatval($_GET['y' . $hitung]);

            $xy = $datax * $datay;
            $x2 = $datax * $datax;
            $sum_x = $sum_x + $datax;
            $sum_y = $sum_y + $datay;
            $sum_xy = $sum_xy + $xy;
            $sum_x2 = $sum_x2 + $x2;
            $query = "INSERT INTO regresi_linear (`x`, `y`, `xy`, `x2`) VALUES ('$datax', '$datay', '$xy', '$x2')";

            $hasil = mysqli_query($koneksi, $query);
        
            $hitung++;
        }
        $x_bar = $sum_x / $baris;
        $y_bar = $sum_y/$baris;
        $b = (($baris * $sum_xy) - ($sum_x * $sum_y))/(($baris * $sum_x2)- ($sum_x * $sum_x));
        $a = $y_bar - ($b*$x_bar);
        
        $query_check_table = "SHOW TABLES LIKE 'regresi_linear'";
$result_check_table = mysqli_query($koneksi, $query_check_table);
if (mysqli_num_rows($result_check_table) > 0) {
    $query = "SELECT * FROM regresi_linear";
    $result = mysqli_query($koneksi, $query);
    echo "<table>";
    echo "<tr><th>X</th><th>Y</th><th>XY</th><th>X^2</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['x'] . "</td>";
        echo "<td>" . $row['y'] . "</td>";
        echo "<td>" . $row['xy'] . "</td>";
        echo "<td>" . $row['x2'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "Tabel 'biseksi' tidak ditemukan dalam database.";
}
echo "</table>";
    } else {
            echo "Data not provided.";}
        ?>
    </div>
</main>

<?php
include('footer.php'); 
?>
