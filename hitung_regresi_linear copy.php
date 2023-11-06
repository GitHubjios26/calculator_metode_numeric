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
            $sum_x = 0;
            $sum_y = 0;
            $sum_xy = 0;
            $sum_x2 = 0;

            while ($hitung < $baris) {
                $datax[$hitung] = floatval($_GET['x' . $hitung]);
                $datay[$hitung] = floatval($_GET['y' . $hitung]);

                $xy[$hitung] = $datax[$hitung] * $datay[$hitung];
                $x2[$hitung] = $datax[$hitung] * $datax[$hitung];
                $sum_x = $sum_x + $datax[$hitung];
                $sum_y = $sum_y + $datay[$hitung];
                $sum_xy = $sum_xy + $xy[$hitung];
                $sum_x2 = $sum_x2 + $x2[$hitung];

                $hitung++;
            }
            $x_bar = $sum_x / $baris;
            $y_bar = $sum_y / $baris;
            $b = (($baris * $sum_xy) - ($sum_x * $sum_y)) / (($baris * $sum_x2) - ($sum_x * $sum_x));
            $a = ($y_bar - ($b * $x_bar));

            $i = 0;
            while ($i < $baris) {
                $query = "INSERT INTO regresi_linear (`x`, `y`, `xy`, `x2`, `yy`, `yab`) VALUES ('$datax[$i]', '$datay[$i]', '$xy[$i]', '$x2[$i]', '".($datay[$i] - $y_bar) * ($datay[$i] - $y_bar)."', ".(($datay[$i] - $a - $b * $datax[$i]) * ($datay[$i] - $a - $b * $datax[$i])).")";

                $sum_yy = $sum_yy + (($datay[$i] - $y_bar) * ($datay[$i] - $y_bar));
                $sum_yab = $sum_yab + (($datay[$i] - $a - $b * $datax[$i]) * ($datay[$i] - $a - $b * $datax[$i]));
                $hasil = mysqli_query($koneksi, $query);
                $i++;
            }

            $korelasi = sqrt(($sum_yy - $sum_yab)/$sum_yy);
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
            echo "<tr>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "<td></td>";
            echo "</tr>";
            
                
                echo "<tr>";
                echo "<td>" . $sum_x. "</td>";
                echo "<td>" . $sum_y . "</td>";
                echo "<td>" . $sum_xy . "</td>";
                echo "<td>" . $sum_x2 . "</td>";
                echo "<td>" . $sum_yy . "</td>";
                echo "<td>" . $sum_yab . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";

                echo "<tr>";
                echo "<td>" . $x_bar . "</td>";
                echo "<td>" . $y_bar . "</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
                echo "</table>";

                echo "<br>";
                echo "<br>";
                echo "X(bar) = $x_bar";
                echo "<br>";
                echo "Y(bar) = $y_bar";
                echo "<br>";
                echo "nilai a = $a";
                echo "<br>";
                echo "nilai b = $b";
                echo "<br>";
                echo "<br>";
                echo "Maka persamaan di dapatkan = a + bx";
                echo "Ini bentuk angkanya = $a + ($b *x)";
                echo "<br>";
                echo "<br>";

                echo"Untuk memprediksi apakah garis regresi yang kita buat sudah mempunyai
                kesalahan yang sekecil mungkin, maka perlu dihitung suatu koefisien yang
                dinamakan koefisien korelasi (r).
                Koefisien korelasi mempunyai harga dari 0 - 1. Semakin mendekati nilai 1 maka
                r nya semakin baik.
                Rumus untuk menghitung r adalah akar dari Sigma Yi-y(bar) - Sigma Yi - a - bXi / Sigma Yi-y(bar)";
                echo "<br>";
                echo "<br>";
                echo"Maka di dapatkan korelasinya adalah = $korelasi";

                echo "<br>";
                echo "<br>";

                echo "<br>";
                echo "<br>";
            
        } else {
            echo "Data not provided.";
        }
        ?>
    </div>
</main>

<?php
include('footer.php'); 
?>
