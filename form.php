<html>
    <body>
        <form method="GET" action="">
            Masukkan ID:
            <input type="text" name="id"> <br><br>
            Masukkan Nama:
            <input type="text" name="nama"> <br><br>
            Masukkan NRP:
            <input type="text" name="nrp"> <br><br>
            Masukkan Nomor HP:
            <input type="text" name="hp"> <br><br>
            <input type="submit" value="Push">
        </form>
        <?php 
        $koneksi = mysqli_connect("localhost", "root", "", "elka22");
        if(empty($_GET['nama']) || empty($_GET['id']) || empty($_GET['nrp']) || empty($_GET['hp'])){
            echo "Lengkapi data.";
        } else {
            $id = $_GET['id'];
            $nama = $_GET['nama'];
            $nrp = $_GET['nrp'];
            $hp = $_GET['hp'];
            
            $query = "INSERT INTO mhs (`id`, `nama`, `nrp`, `hp`) VALUES ('$id', '$nama', '$nrp', '$hp')";
            $hasil = mysqli_query($koneksi, $query);

            if($hasil){
                echo "Data tersimpan.";
            } else {
                echo "Gagal menyimpan data: " . mysqli_error($koneksi);
            }
        }
        ?>
    </body>
</html>
