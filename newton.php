</html>
<?php
include('header.php'); // Sisipkan header
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="newton.php">Metode Newton</a></h4>
    <div class="form-container">
        <form method="GET" action="hitung_newton.php">
            <label for="akar">Mencari Akar:</label>
            <input type="text" name="akar" id="akar">
            
            <label for="X1">Masukkan nilai A:</label>
            <input type="text" name="X1" id="X1">
            
            <label for="Tol">Toleransi:</label>
            <input type="text" name="Tol" id="Tol">
            
            <label for="N">Maksimum Iterasi:</label>
            <input type="text" name="N" id="N">
            
            <input type="submit" value="Hitung">
        </form>
    </div>
    <h4>Riwayat || <a href="hapus_newton.php"> hapus riwayat</a></h4>
    <?php include('conection_newton.php'); ?>
</main>
<?php
include('footer.php'); // Sisipkan footer
?>
