<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Daftar Pesanan</title>
<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>

<div class="table-container">
    <h2>Daftar Pesanan Paket Wisata</h2>

    <table class="styled-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemesan</th>
                <th>Total Tagihan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn,"SELECT * FROM pesanan");
        while($d = mysqli_fetch_array($data)){
            echo "
            <tr>
                <td>{$no}</td>
                <td>{$d['nama']}</td>
                <td>Rp ".number_format($d['total'],0,',','.')."</td>
                <td class='aksi'>
                    <a href='edit_pesanan.php?id={$d['id']}' class='btn-edit'>Edit</a>
                    <a href='hapus_pesanan.php?id={$d['id']}' 
                       class='btn-hapus'
                       onclick='return confirm(\"Hapus data ini?\")'>Hapus</a>
                </td>
            </tr>";
            $no++;
        }
        ?>
        </tbody>
    </table>

    <a href="index.php" class="back-link">← Kembali ke Beranda</a>
</div>

</body>
</html>
