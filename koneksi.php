<?php
$koneksi = mysqli_connect("localhost", "root", "");
if(!$koneksi)
echo"Gagal";
$pilihdb= mysqli_select_db($koneksi, "test");
if($pilihdb == false){
echo"Tidak Ada Db";
}echo" Ada Db";

?>