</html>
<?php
include('header.php'); 
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="newton.php">Metode Newton</a> -> <a href="hitung_newton.php">Hitung Newton</a></h4>

    <div class= "hasil">
        <?php
            include ('conection.php');
        ?>
       <?php
        if(isset($_GET['X1']) && isset($_GET['Tol']) && isset($_GET['N']) && isset($_GET['akar'])){
            $akar = floatval($_GET['akar']);
            $X1 = floatval($_GET['X1']);
            $Tol = floatval($_GET['Tol']);
            $N = intval($_GET['N']);
            if(empty($_GET['X1']) || empty($_GET['Tol']) || empty($_GET['N'])){
                echo "Lengkapi Data";
            } else {
                $query_delete = "TRUNCATE TABLE newton";
                mysqli_query($koneksi, $query_delete);
                
                function f($x, $akar)
                {
                    return pow($x, 2) - $akar;
                }

                function f_aksen($x){
                    return 2*$x;
                }
                
                    $iterasi = 0;
                    
                    
                    echo "<table>";
                    echo "<tr><th>No</th><th>X1</th><th>X2</th><th>f(X1)</th><th>f(X2)</th></tr>";

                    do {
                        $iterasi++;
                        $X2 = $X1 - (f($X1, $akar) / f_aksen($X1));
                        $fX1 = f($X1, $akar);
                        $fX2 = f($X2, $akar);
                        

                        $query = "INSERT INTO newton (`no`, `x1`, `x2`, `fx1`, `fx2`) VALUES ('$iterasi', '$X1', '$X2', '$fX1', '$fX2')";
                        $hasil = mysqli_query($koneksi, $query);
                        
                        echo("<tr>");
                        echo("<td>" . $iterasi . "</td>");
                        echo("<td>" . $X1 . "</td>");
                        echo("<td>" . $X2 . "</td>");
                        echo("<td>" . $fX1 . "</td>");
                        echo("<td>" . $fX2 . "</td>");
                        echo("</tr>");
                        

                        if (f($X2, $akar) >= $Tol){
                            $X1 = $X2;
                        
                    }} while (abs($fX2) >= $Tol && $iterasi < $N);

                    

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
                    if (abs($fX2) <= $Tol) {
                        echo("Maka Akar-nya adalah " . $X2 . "<br>");
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
include('footer.php');
?>
