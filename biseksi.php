</html>
<?php
include('header.php'); 
?>
<main>
<h4><a href="mencari_akar.php">Mencari Akar</a> -> <a href="biseksi.php">Metode Biseksi</a></h4>
    <div class="form-container">
        <form method="GET" action="hitung_biseksi.php">
            <label for="akar">Mencari Akar:</label>
            <input type="text" name="akar" id="akar">
            
            <label for="X1">Masukkan nilai A:</label>
            <input type="text" name="X1" id="X1">
            
            <label for="X2">Masukkan nilai B:</label>
            <input type="text" name="X2" id="X2">
            
            <label for="Tol">Toleransi:</label>
            <input type="text" name="Tol" id="Tol">
            
            <label for="N">Maksimum Iterasi:</label>
            <input type="text" name="N" id="N">
            
            <input type="submit" value="Hitung">
        </form>
    </div>
    <h4>Riwayat || <a href="hapus_bisec.php"> hapus riwayat</a></h4>
    <?php include('conection_bisec.php'); ?>
</main>
<?php
include('footer.php');
?>
