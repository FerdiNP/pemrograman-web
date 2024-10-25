<?php
$tinggi = 5; // Tinggi piramida

for($i = 1; $i <= $tinggi; $i++) {
    // Cetak spasi
    for($j = $tinggi - $i; $j > 0; $j--) {
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
