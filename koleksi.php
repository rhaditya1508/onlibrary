<?php
require("koneksi.php");
$id_user=$_SESSION['user']['id_user'];

if (isset($_GET['id'])) {
    $id_buku = $_GET['id'];

    $query_cek_koleksi = mysqli_query($koneksi, "SELECT * FROM koleksi WHERE id_buku = '$id_buku' AND id_user = '$id_user'");
    $jumlah_koleksi = mysqli_num_rows($query_cek_koleksi);

    if ($jumlah_koleksi > 0) {
        echo "<script>alert('Buku Sudah Ditambahkan ke Koleksi!');</script>";
        echo "<script>window.location.href='index.php?page=';</script>";
    } else {
        $query = "INSERT INTO koleksi (id_user, id_buku) VALUES ('$id_user', '$id_buku')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            echo "<script>alert('Buku berhasil ditambahkan ke koleksi!');</script>";
            header('location:index.php?page=koleksi_saya');
        } else {
            echo "<script>alert('Gagal menambahkan buku ke koleksi!');</script>";
            echo "<script>window.location.href='';</script>";
        }
    }
    
}
?>
