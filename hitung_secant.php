</html>
<?php
include('header.php'); // Sisipkan header
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="secant.php">Metode Secant</a> -> <a href="hitung_secant.php">Hitung Secant</a></h4>

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
                $query_delete = "TRUNCATE TABLE secant";
                mysqli_query($koneksi, $query_delete);
                function f($x, $akar)
                {
                    return pow($x, 2) - $akar;
                }

                    $iterasi = 0;
                    
                    
                    echo "<table>";
                    echo "<tr><th>No</th><th>X1</th><th>X2</th><th>f(X1)</th><th>f(X2)</th><th>X3</th><th>f(X3)</th></tr>";

                    do {
                        $iterasi++;
                        $fX1 = f($X1, $akar);
                        $fX2 = f($X2, $akar);
                    
                        $X3 = $X2 - ($fX2 * (($X2 - $X1) / ($fX2 - $fX1)));
                        $fX3 = f($X3, $akar);
                        

                        $query = "INSERT INTO secant (`no`, `x1`, `x2`, `fx1`, `fx2`, `x3`, `fx3`) VALUES ('$iterasi', '$X1', '$X2', '$fX1', '$fX2', '$X3', '$fX3')";
                        $hasil = mysqli_query($koneksi, $query);
                    
                        echo("<tr>");
                        echo("<td>" . $iterasi . "</td>");
                        echo("<td>" . $X1 . "</td>");
                        echo("<td>" . $X2 . "</td>");
                        echo("<td>" . $fX1 . "</td>");
                        echo("<td>" . $fX2 . "</td>");
                        echo("<td>" . $X3 . "</td>");
                        echo("<td>" . $fX3 . "</td>");
                        echo("</tr>");
                        

                        $X1 = $X2;
                        $X2 = $X3;
                    } while (abs(f($X3, $akar)) > $Tol && $iterasi < $N);

                    echo("</table>");
                    if (abs($fX3) < $Tol) {
                        echo("Maka Akar-nya adalah " . $X3 . "<br>");
                    } else {
                        echo("Iterasi maksimum tercapai.");
                    }
                }
            }
         else {
            echo "";
        }
        ?>
        </div>
    </main>
<?php
include('footer.php'); // Sisipkan footer
?>
