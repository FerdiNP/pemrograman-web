<?php
$tinggi = 5; // Tinggi piramida

for($i = $tinggi; $i >= 1; $i--) {
    // Cetak spasi
    for($j = 0; $j < $tinggi - $i; $j++) {
        echo "&nbsp;&nbsp;";
    }

    // Cetak bintang
    for($k = 1; $k <= (2 * $i - 1); $k++) {
        echo "*";
    }

    // Pindah ke baris berikutnya
    echo "<br>";
}
?>
