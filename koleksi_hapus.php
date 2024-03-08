<?php
require_once "koneksi.php";

$id = $_GET["id"];
$query = mysqli_query($koneksi, "DELETE FROM koleksi WHERE id_koleksi = '$id'");
echo "<script>location.href = '?page=koleksi_saya'</script>";