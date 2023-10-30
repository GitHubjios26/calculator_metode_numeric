<!DOCTYPE html>
<html>
<body>
    <form method="GET" action="">
        Masukkan id: <input type="text" name="id"><br><br>
        Masukkan nama: <input type="text" name="nama"><br><br>
        Masukkan nrp: <input type="text" name="nrp"><br><br>
        Masukkan nomor hp: <input type="text" name="hp"><br><br>
        <input type="submit" value="Push">
    </form>

    <h1 style="background-color: yellow; color:Darkblue"><center>TABEL DATA</center></h1>
    <?php
        $koneksi = mysqli_connect("localhost", "root", "", "elka22");

        if (isset($_GET['nama']) && isset($_GET['id']) && isset($_GET['nrp']) && isset($_GET['hp'])) {
            $id = $_GET['id'];
            $nama = $_GET['nama'];
            $nrp = $_GET['nrp'];
            $hp = $_GET['hp'];

            if (empty($nama) || empty($id) || empty($nrp) || empty($hp)) {
                echo "Lengkapi data.";
            } else {
                $query = "INSERT INTO mhs (`id`, `nama`, `nrp`, `hp`) VALUES ('$id', '$nama', '$nrp', '$hp')";
                $hasil = mysqli_query($koneksi, $query);

                if ($hasil) {
                    echo "Data tersimpan.";
                    $data = mysqli_query($koneksi, "SELECT * FROM mhs");

                    echo "<table border='1'>";
                    echo "<tr>";
                    echo "<td>ID</td>";
                    echo "<td>Nama</td>";
                    echo "<td>NRP</td>";
                    echo "<td>No HP</td>";
                    echo "</tr>";

                    while ($d = mysqli_fetch_assoc($data)) {
                        echo "<tr>";
                        echo "<td>" . $d['id'] . "</td>";
                        echo "<td>" . $d['nama'] . "</td>";
                        echo "<td>" . $d['nrp'] . "</td>";
                        echo "<td>" . $d['hp'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                } else {
                    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
                }
            }
        }
    ?>
</body>
</html>
