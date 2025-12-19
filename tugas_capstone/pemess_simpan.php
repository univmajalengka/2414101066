<?php
include 'koneksi.php';

// Tangkap data
$id        = isset($_POST['id']) ? $_POST['id'] : '';
$nama      = $_POST['nama'];
$hp        = $_POST['hp'];
$tanggal   = $_POST['tanggal'];
$hari      = $_POST['hari'];
$peserta   = $_POST['peserta'];
$harga     = $_POST['harga'];
$total     = $_POST['total'];
$pelayanan = 'Paket Wisata';

// JIKA EDIT (UPDATE)
if ($id != '') {

    $query = "UPDATE pesanan SET 
        nama='$nama',
        hp='$hp',
        tanggal='$tanggal',
        hari='$hari',
        peserta='$peserta',
        pelayanan='$pelayanan',
        harga='$harga',
        total='$total'
        WHERE id='$id'
    ";

    mysqli_query($conn, $query);

} 
// JIKA TAMBAH DATA (INSERT)
else {

    $query = "INSERT INTO pesanan 
        (nama, hp, tanggal, hari, peserta, pelayanan, harga, total)
        VALUES 
        ('$nama', '$hp', '$tanggal', '$hari', '$peserta', '$pelayanan', '$harga', '$total')
    ";

    mysqli_query($conn, $query);
}

// Kembali ke daftar
header("Location: modifikasi_pesanan.php");
exit;
?>
