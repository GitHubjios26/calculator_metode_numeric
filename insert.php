<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $hp = $_POST['hp'];

    $con = mysqli_connect("localhost", "root", "", "elka22");

    if (mysqli_connect_errno()) {
        die("Koneksi ke database gagal: " . mysqli_connect_error());
    }

    $query = "INSERT INTO `mhs` (`id`, `nrp`, `nama`, `hp`) VALUES ('$id', '$nrp', '$nama', '$hp')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input dan Tampil Tabel</title>
</head>
<body>
    <h2>Form Input Mahasiswa</h2>
    <form action="" method="POST">
        <label for="id">ID:</label>
        <input type="text" name="id" id="id" required><br><br>

        <label for="nrp">NRP:</label>
        <input type="text" name="nrp" id="nrp" required><br><br>
        
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br><br>
        
        <label for="hp">Nomor HP:</label>
        <input type="text" name="hp" id="hp" required><br><br>
        
        <input type="submit" name="Submit" value="Submit">
    </form>

    <hr>

    <h2>Tabel Mahasiswa</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NRP</th>
            <th>Nama</th>
            <th>Nomor HP</th>
        </tr>
        <?php
        $con = mysqli_connect("localhost", "root", "", "elka22");

        if (mysqli_connect_errno()) {
            die("Koneksi ke database gagal: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM mhs";
        $result = mysqli_query($con, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nrp'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['hp'] . "</td>";
            echo "</tr>";
        }

        mysqli_close($con);
        ?>
    </table>
</body>
</html>
