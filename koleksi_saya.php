<?php
$id_user = $_SESSION['user']['id_user'];
$query = "SELECT * FROM koleksi WHERE id_user = '$id_user'";
$result = mysqli_query($koneksi, $query);

?>
<h1 class="mt-4">Koleksi Pribadi</h1>
<br>
<div class="row">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $id_buku = $data['id_buku'];
            $query_buku = "SELECT * FROM buku WHERE id_buku = '$id_buku'";
            $result_buku = mysqli_query($koneksi, $query_buku);
            if ($result_buku && mysqli_num_rows($result_buku) > 0) {
                $buku_data = mysqli_fetch_assoc($result_buku);
                $query_rating = "SELECT AVG(rating) AS average_rating FROM ulasan WHERE id_buku = '$id_buku'";
                $result_rating = mysqli_query($koneksi, $query_rating);
                $rating_data = mysqli_fetch_assoc($result_rating);
                $average_rating = $rating_data['average_rating'];
    ?>
            <div class="col-md-2 mb-4">
                <div class="card mt-3" style="width: 235px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body" style="padding: 15px;">
                    <img src="./assets/img/<?php echo $buku_data['gambar']; ?>" class="card-img-top" alt="Gambar Buku" style="width: 200px; height: 250px; border-radius: 10px;">
                        <h5 class="card-title" style="margin-top: 10px; display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $buku_data['judul']; ?></h5>
                        <p class="card-text">
                            Rating: <?php echo number_format($average_rating, 1); ?><br>
                        </p>
                        <a href="?page=detail&&id=<?php echo $data['id_buku']; ?>" class="btn btn-dark">
                            <i class="fas fa-bookmark" style="margin-right: 5px;"></i>Detail
                        </a>
                        <a href="?page=koleksi_hapus&&id=<?php echo $data['id_koleksi']; ?>" class="btn btn-danger">
                            <i class="fas fa-trash" style="margin-right: 5px;"></i>Hapus
                        </a>
                    </div>
                </div>
            </div>
    <?php
            }
        }
    } else {
        echo "<p>Anda Belum Menambahkan Buku Apapun ke Koleksi.</p>";
    }
    ?>
</div>
