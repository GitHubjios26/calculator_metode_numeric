<!DOCTYPE html>
<html>
<head>
    <title>Generated Table</title>
</head>
<body>
    <?php
    include('header.php');
    ?>

    <main>
        <h4><a href="regresi.php">Regresi</a> -> <a href="regresi_linear.php">Metode Regresi Linear</a></h4>
        <div class="form-container">
            <?php
            echo "<table>";
            echo "<tr><th>No</th><th>Data</th></tr>";
            for ($i = 1; $i <= $data; $i++) {
                echo "<tr><td>$i</td><td>Data $i</td></tr>";
            }
            echo "</table>";
            ?>
        </div>

        <h4>Riwayat || <a href="hapus_regulafalsi.php"> hapus riwayat</a></h4>
    </main>

    <?php
    include('footer.php');
    ?>
</body>
</html>
