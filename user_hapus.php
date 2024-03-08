<?php
$id = $_GET['id'];
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=0");
$query = mysqli_query($koneksi, "DELETE FROM user WHERE id_user=$id");
mysqli_query($koneksi, "SET FOREIGN_KEY_CHECKS=1");
?>
<script>
    alert('Akun Berhasil Dihapus')
    location.href ="index.php?page=user";
</script>