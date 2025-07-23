<?php
    $gambar = "gudanGg.jpg";

    if (file_exists($gambar)) {
        echo "<p>POTO-POTO GUDANG BAZZPACK</p>";
        echo "<img src='$gambar' alt='Gambar Contoh' width='1300'>";
    } else {
        echo "<p style='color:red;'>Gambar TIDAK ditemukan!</p>";
    }
?>
