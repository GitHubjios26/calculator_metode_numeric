<!DOCTYPE html>
<html>
<head>
    <title>Generate Tabel</title>
</head>
<body>
    <?php
    session_start();
    include('header.php'); 
    ?>

    <main>
        <h4><a href="regresi.php">Regresi</a> -> <a href="regresi_linear.php">Metode Regresi Linear</a> -> <a href="generate_tabel.php">Generate Tabel Metode Regresi Linear</a></h4>
        <?php
        $jumlahKolom = 2;
        
        if (isset($_POST['data'])) {
            $baris = (int)$_POST['data'];
            $_SESSION['baris'] = $baris;
            $i = 0;
        ?>
            <div class="form-container">
                <form method="GET" action="hitung_regresi_linear copy.php">
                    <label for="x">Masukkan Data X:</label>
                    <?php
                    while ($i < $baris) {
                        echo '<input type="text" name="x' . $i . '" id="x' . $i . '">';
                        $i++;
                    }
                    ?>
                    <label for="y">Masukkan Data Y:</label>
                    <?php
                    $i = 0;
                    while ($i < $baris) {
                        echo '<input type="text" name="y' . $i . '" id="y' . $i . '">';
                        $i++;
                    }
                    ?>
                    <input type="submit" value="Hitung">
                </form>
            </div>
        <?php    
        } else {
            echo "Data not provided.";
        }
        ?>
    </main>

    <?php
    include('footer.php'); 
    ?>
</body>
</html>
