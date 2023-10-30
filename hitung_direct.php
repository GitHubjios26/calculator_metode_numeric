</html>
<?php
include('header.php'); // Sisipkan header
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="direct.php">Metode Direct</a> -> <a href="hitung_direct.php">Hitung Direct</a></h4>

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
                $query_delete = "TRUNCATE TABLE direct";
                mysqli_query($koneksi, $query_delete);
            
                function g($x){
                    return pow ((30*$x),(1/3));
                }
                
                    $iterasi = 0;
                    
                    
                    echo "<table>";
                    echo "<tr><th>No</th><th>X1</th><th>X2</th><th>Error(%)</th></tr>";

                    do {
                        $iterasi++;
                        $X2 = g($X1);
                        $e = abs(($X2 - $X1)/$X2);
                        
                        $query = "INSERT INTO direct (`no`, `x1`, `x2`, `e`) VALUES ('$iterasi', '$X1', '$X2', '$e')";
                        $hasil = mysqli_query($koneksi, $query);
                        
                        echo("<tr>");
                        echo("<td>" . $iterasi . "</td>");
                        echo("<td>" . $X1 . "</td>");
                        echo("<td>" . $X2 . "</td>");
                        echo("<td>" . $e . "</td>");
                        echo("</tr>");
                        

                        if ($e >= $Tol){
                            $X1 = $X2;
                        
                    }} while (abs($e) >= $Tol && $iterasi < $N);

                    

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
                    if (abs($e) <= $Tol) {
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
include('footer.php'); // Sisipkan footer
?>
