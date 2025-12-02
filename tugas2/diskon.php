<?php

// Fungsi untuk menghitung diskon
function hitungDiskon($totalBelanja) {
    // Kondisi 1: Total belanja >= Rp. 100.000
    if ($totalBelanja >= 100000) {
        $diskon = $totalBelanja * 0.10; // Diskon 10%
    }
    // Kondisi 2: Total belanja >= Rp. 50.000 dan < Rp. 100.000
    elseif ($totalBelanja >= 50000 && $totalBelanja < 100000) {
        $diskon = $totalBelanja * 0.05; // Diskon 5%
    }
    // Kondisi 3: Total belanja < Rp. 50.000
    else {
        $diskon = 0; // Tidak ada diskon
    }
    
    return $diskon;
}

// Eksekusi program
echo "\n";
echo "    PROGRAM PERHITUNGAN DISKON\n";
echo "\n";

// Deklarasi variabel totalBelanja dengan contoh nilai Rp. 120.000
$totalBelanja = 120000;

// Panggil fungsi hitungDiskon dan simpan hasilnya
$diskon = hitungDiskon($totalBelanja);

// Hitung total yang harus dibayar
$totalBayar = $totalBelanja - $diskon;

// Tampilkan hasil dengan format yang rapi
echo "Total Belanja   : Rp. " . number_format($totalBelanja, 0, ',', '.') . "\n";
echo "Diskon          : Rp. " . number_format($diskon, 0, ',', '.') . "\n";
echo "Total Bayar     : Rp. " . number_format($totalBayar, 0, ',', '.') . "\n";
echo "\n";

// Contoh tambahan untuk menguji berbagai kondisi
echo "\nCONTOH LAIN:\n";
echo "\n";

// Test case 1: Total belanja Rp. 75.000
$test1 = 75000;
$diskon1 = hitungDiskon($test1);
$totalBayar1 = $test1 - $diskon1;
echo "Total Belanja   : Rp. " . number_format($test1, 0, ',', '.') . "\n";
echo "Diskon          : Rp. " . number_format($diskon1, 0, ',', '.') . "\n";
echo "Total Bayar     : Rp. " . number_format($totalBayar1, 0, ',', '.') . "\n";
echo "\n";

// Test case 2: Total belanja Rp. 40.000
$test2 = 40000;
$diskon2 = hitungDiskon($test2);
$totalBayar2 = $test2 - $diskon2;
echo "Total Belanja   : Rp. " . number_format($test2, 0, ',', '.') . "\n";
echo "Diskon          : Rp. " . number_format($diskon2, 0, ',', '.') . "\n";
echo "Total Bayar     : Rp. " . number_format($totalBayar2, 0, ',', '.') . "\n";
echo "\n";

?>  