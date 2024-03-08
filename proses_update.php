<?php
require("koneksi.php");

$id = $_SESSION['user']['id_user'];
if (isset($_GET['id_peminjaman'])) {
    $tanggal_sekarang = date("Y-m-d");
    $id_peminjaman = $_GET['id_peminjaman'];
    $query_update_status = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'Dikembalikan', tanggal_pengembalian = '$tanggal_sekarang' WHERE id_peminjaman = '$id_peminjaman'
");
    
    if ($query_update_status) {
        header("location:index.php?page=laporan");
    } else {
        echo "Gagal memperbarui status peminjaman: " . mysqli_error($koneksi);
    }
}
?>