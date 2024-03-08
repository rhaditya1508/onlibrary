<?php
require("koneksi.php");
$id=$_SESSION['user']['id_user'];

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];
    $query_cek_peminjaman = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE buku_id = '$id_buku' AND id_user = '$id' AND status_peminjaman = 'Dipinjam'");
    $jumlah_peminjaman = mysqli_num_rows($query_cek_peminjaman);

    if ($jumlah_peminjaman > 0) {
        echo "<script>alert('Buku Sudah Dipinjam!');</script>";
        echo "<script>window.location.href='index_peminjam.php?page=detail&&id= $buku_id';</script>";
    } else {
        $tanggal_peminjaman = date('Y-m-d');
        $tanggal_pengembalian = date('Y-m-d', strtotime($tanggal_peminjaman . ' + 7 days'));
        $query_simpan_peminjaman = mysqli_query($koneksi, "INSERT INTO peminjaman (id_user,id_buku, tanggal_peminjaman, tanggal_pengembalian, status_peminjaman) VALUES ('$id','$id_buku', '$tanggal_peminjaman', '$tanggal_pengembalian', 'Dipinjam')");

        if ($query_simpan_peminjaman) {
                echo "<script>alert('Buku berhasil dipinjam! Wajib Dikembalikan pada: $tanggal_pengembalian');</script>";
                echo "<script>window.location.href='index.php?page=detail&&id= $id_buku';</script>";
        } else {
            echo "<script>alert('Gagal meminjam buku!');</script>";
            echo "<script>window.location.href='';</script>";
        }
    }
}
?>
