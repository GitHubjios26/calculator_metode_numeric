</html>
<?php
include('header.php'); // Sisipkan header
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="biseksi.php">Metode Biseksi</a> -> <a href="hitung_biseksi.php">Hitung Biseksi</a></h4>

    <div class= "hasil">
        <?php
            include ('conection.php');
        ?>
       <?php
        if(isset($_GET['X1']) && isset($_GET['X2']) && isset($_GET['Tol']) && isset($_GET['N']) && isset($_GET['akar'])){
            $akar = floatval($_GET['akar']);
            $X1 = floatval($_GET['X1']);
            $X2 = floatval($_GET['X2']);
            $Tol = floatval($_GET['Tol']);
            $N = intval($_GET['N']);
            if(empty($_GET['X1']) || empty($_GET['X2']) || empty($_GET['Tol']) || empty($_GET['N'])){
                echo "Lengkapi Data";
            } else {
                $query_delete = "TRUNCATE TABLE biseksi";
    mysqli_query($koneksi, $query_delete);
                function f($x, $akar)
                {
                    return pow($x, 2) - $akar;
                }

                // Check if there's a root in the given interval
                if (f($X1, $akar) * f($X2, $akar) > 0) {
                    echo "Akar tidak ada...";
                } else {
                    $iterasi = 0;
                    
                    echo "<table>";
                    echo "<tr><th>No</th><th>X1</th><th>X2</th><th>X</th><th>f(X)</th><th>f(X1)</th><th>Keterangan</th></tr>";

                    do {
                        $iterasi++;
                        $X = ($X1 + $X2) / 2;
                        $fX = f($X, $akar);
                        $fX1 = f($X1, $akar);

                        if (f($X, $akar) * f($X1, $akar) < 0) {
                            $keterangan = "Berlawanan tanda";
                        } else {
                            $keterangan = "Tidak berlawanan tanda";
                        }

                        $query = "INSERT INTO biseksi (`no`, `x1`, `x2`, `x`, `fx`, `fx1`, `keterangan`) VALUES ('$iterasi', '$X1', '$X2', '$X', '$fX', '$fX1', '$keterangan')";
                        $hasil = mysqli_query($koneksi, $query);
                        
                        echo("<tr>");
                        echo("<td>" . $iterasi . "</td>");
                        echo("<td>" . $X1 . "</td>");
                        echo("<td>" . $X2 . "</td>");
                        echo("<td>" . $X . "</td>");
                        echo("<td>" . $fX . "</td>");
                        echo("<td>" . $fX1 . "</td>");
                        echo("<td>" . $keterangan . "</td>");
                        echo("</tr>");
                        

                        if (f($X, $akar) * f($X1, $akar) < 0) {
                            $X2 = $X;
                        } else {
                            $X1 = $X;
                        }
                    } while (abs($fX) >= $Tol && $iterasi < $N);

                    

                    // Menampilkan data dari database
                    // while ($d = mysqli_fetch_object($data)) {
                    //     echo "<tr>";
                    //     echo "<td>" . $d->no . "</td>";
                    //     echo "<td>" . $d->x1 . "</td>";
                    //     echo "<td>" . $d->x2 . "</td>";
                    //     echo "<td>" . $d->x . "</td>";
                    //     echo "<td>" . $d->fx . "</td>";
                    //     echo "<td>" . $d->fx1 . "</td>";
                    //     echo "<td>" . $d->keterangan . "</td>";
                    //     echo "</tr>";
                    // }
                    echo("</table>");
                    if (abs($fX) < $Tol) {
                        echo("Maka Akar-nya adalah " . $X . "<br>");
                    } else {
                        echo("Iterasi maksimum tercapai.");
                    }
                }
            }
        } else {
            echo "";
        }
        ?>
        </div>
    </main>
<?php
include('footer.php'); // Sisipkan footer
?>
