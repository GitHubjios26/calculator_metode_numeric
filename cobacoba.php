<?php
$jumlahBaris = 5;
$jumlahKolom = 2;

echo '<table border="1">';

for ($i = 1; $i <= $jumlahBaris; $i++) {
    echo '<tr>';

    for ($j = 1; $j <= $jumlahKolom; $j++) {
        echo '<td>Baris ' . $i . ', Kolom ' . $j . '</td>';
    }
    
    echo '</tr>';
}

echo '</table>';
?>
