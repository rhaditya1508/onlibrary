<?php
$id = $_SESSION['user']['id_user'];
$query = mysqli_query($koneksi, "SELECT * FROM peminjaman WHERE status_peminjaman = 'dipinjam' AND id_user='$id'");
?>

<h1 class="mt-5">Riwayat Buku yang Dipinjam</h1>
<br>
<div class="row">
    <?php
    while ($data = mysqli_fetch_array($query)) {
        if ($data['status_peminjaman'] == 'dipinjam') {
            $id_buku = $data['id_buku'];
            $query_buku = mysqli_query($koneksi, "SELECT judul, gambar FROM buku WHERE id_buku = '$id_buku'");
            $buku = mysqli_fetch_array($query_buku);
            
            $queryUlasan = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_buku='$id_buku'");
            $totalRating = 0;
            $totalUlasan = mysqli_num_rows($queryUlasan);
            while ($row = mysqli_fetch_assoc($queryUlasan)) {
                $totalRating += $row['rating'];
            }

            $average_rating = $totalUlasan > 0 ? $totalRating / $totalUlasan : 0;
    ?>
            <div class="col-md-2 mb-4">
                <div class="card mb-4 mt-3" style="width: 235px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 15px;">
                        <img src="./assets/img/<?php echo $buku['gambar']; ?>" class="card-img-top" alt="Card image cap" style="width: 200px; height: 250px; border-radius: 10px;">
                        <h5 class="card-title" style="margin-top: 10px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $buku['judul']; ?></h5>
                        <p class="card-text" style="color: #555;">
                            Rating: <?php echo number_format($average_rating, 1); ?><br>
                            Tanggal Pengembalian: <?php echo $data['tanggal_pengembalian']; ?><br>
                            Status Peminjaman: <?php echo $data['status_peminjaman']?>
                        </p>
                        <a href="ulasan_tambah.php?id=<?php echo $id_buku; ?>" class="btn btn-primary mt-1" style="background-color: #3498db; border-color: #3498db;">Beri Ulasan</a>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>
