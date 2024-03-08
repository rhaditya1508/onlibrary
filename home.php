<?php if ($_SESSION['user']['level'] != 'peminjam'): ?>
    <h1 class="mt-4">Beranda Admin</h1>
    <br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                    ?>
                    Jumlah Kategori
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=kategori">Lihat Kategori</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                    ?>
                    Jumlah Buku
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=buku">Lihat Buku</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                    ?>
                    Jumlah Ulasan
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=ulasan">Lihat Ulasan</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                    ?>
                    Jumlah Pengguna
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=user">Lihat Pengguna</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($_SESSION['user']['level'] == 'peminjam'): ?>
    <div class="row mt-4">
        <h1 text align="center">Daftar Buku</h1>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM buku");
    while ($data = mysqli_fetch_array($query)) {
    ?>
    <div class="col-md-2 mb-4">
    <div class="card mb-4" style="width: 235px; height: 400px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="card-body" style="padding: 15px;">
            <img class="card-img-top" src="./assets/img/<?php echo $data['gambar']; ?>" alt="Gambar Buku" style="width: 200px; height: 250px; border-radius: 10px;">
            <h5 class="card-title mt-2" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;"><?php echo $data['judul']; ?></h5>
            <?php
            $id_buku = $data['id_buku'];
            $queryUlasan = mysqli_query($koneksi, "SELECT AVG(rating) AS average_rating FROM ulasan WHERE id_buku='$id_buku'");
            $rating_data = mysqli_fetch_assoc($queryUlasan);
            $average_rating = $rating_data['average_rating'];
            ?>
            <p class="card-text">Rating: <?php echo number_format($average_rating, 1); ?></p>
        </div>
        <div class="card-footer">
            <a href="?page=detail&&id=<?php echo $data['id_buku']; ?>" class="btn btn-dark">
                <i class="fas fa-book" style="margin-right: 5px;"></i>Detail
            </a>
            <a href="koleksi.php?id=<?php echo $data['id_buku']; ?>" class="btn btn-success">
                <i class="fas fa-heart" style="margin-right: 5px;"></i>Favorit
            </a>
        </div>
    </div>
</div>

    <?php
    }
    ?>
</div>
<?php endif; ?>