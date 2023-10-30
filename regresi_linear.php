<!DOCTYPE html>
<html>
<head>
    <title>Generate Tabel</title>
</head>
<body>
    <?php
    include('header.php'); 
    ?>

    <main>
        <h4><a href="regresi.php">Regresi</a> -> <a href="regresi_linear.php">Metode Regresi Linear</a></h4>
        <div class="form-container">
            <form method="POST" action="generate_table.php">
                <label for="data">Masukkan Banyaknya Data:</label>
                <input type="number" name="data" id="data">
                <input type="submit" value="Hitung">
            </form>
        </div>
        
        <h4>Riwayat || <a href="hapus_regulafalsi.php"> hapus riwayat</a></h4>
    </main>

    <?php
    include('footer.php'); 
    ?>
</body>
</html>
